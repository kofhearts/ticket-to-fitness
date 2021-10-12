<?php


class User extends Controller
{


    public function __construct()
    {
        $this->accountsModel = $this->model('Account');
        $this->userModel = $this->model('userModel');
        $this->gymModel = $this->model('GymModel');
        $this->adminModel = $this->model('Admin');
    }

    public function index($msg = NULL)
    {

        $data = [
            'title' => 'Dashboard',
            'user_id' => $_SESSION['user_id'],

        ];
        if (!empty($msg['error'])) {
            $data['error'] = $msg['error'];
        }
        if (!empty($msg['success'])) {
            $data['success'] = $msg['success'];
        }

        $user_credit = $this->userModel->userCredit($data);
        $user_activity_count = $this->userModel->userActivityCount($data);
        $user_allocation_count = $this->userModel->userAllocatedCount($data);
        $data['user_credit'] = $user_credit;
        $data['num_activities'] = $user_activity_count;
        $data['num_allocation'] = $user_allocation_count;

        if (isset($_SESSION['user_id'])) {
            
            $this->view('User/dashboard', $data);
            

        } else {
            redirect('Accounts/login');
        }
    }


    public function userProfile()
    {

        if (isset($_SESSION['user_id'])) {

            $userinfo = $this->accountsModel->fetchUserInformation($_SESSION['user_id']);

            if (!empty($userinfo)) {
                $data = [

                    'account_created' => $userinfo->account_created,
                    'firstname' => $userinfo->firstname,
                    'lastname' => $userinfo->lastname,
                    'email' => $userinfo->email,
                    'username' => $userinfo->username,
                    'photo' => $userinfo->photo,
                    'dob' => $userinfo->dob,
                    'gender' => $userinfo->gender,

                ];

                $this->view('User/userprofile', $data);
            }
        } else {
            redirect('Accounts/login');
        }
    }


    public function timetable($day = "monday", $data = NULL)
    {
        if (!empty($data['error'])) {
            $error = $data['error'];
        } else {
            $error = NULL;
        }

        if (!empty($data['success'])) {
            $success = $data['success'];
        } else {
            $success = NULL;
        }
        if (isset($_SESSION['user_id'])) {
            $data = [

                'user_id' => $_SESSION['user_id'],
                'day' => $day,
                'success' => $success,
                'error' => $error

            ];
            $useractivity = $this->userModel->viewtimeTable($data);


            if (!empty($useractivity)) {
                $data['user_activity'] = $useractivity;
                $this->view('User/timetable', $data);
            } else {
                $data['error'] = 'No activities at this time';
                $this->view('User/timetable', $data);
            }
        } else {
            $this->view('Account/login');
        }
    }

    public function checkUserBalance($userid, $cost)
    {
        $data['user_id'] = $userid;
        $data['cost'] = $cost;
        $balance = $this->userModel->userCredit($data);



        if ($cost < $balance->total_credit) {
            return true;
        } else {
            return false;
        }
    }


    public function allocation($timetableid)
    {
        //Need to check if the balance is enough
        //Deduct the balance
        //Send the balance to gym
        //Don't allow multiple times to allocate
        //Change color of card to orange

        //Get the cost of the activity

        $cost = $this->userModel->getCostActivity($timetableid);
        $checkSalePrice = $this->userModel->getSalesPrice($timetableid);
        if ($checkSalePrice != NULL) {
            $new_cost = $cost->credit - ($checkSalePrice->sale_percentage / 100 * $cost->credit);
        } else {
            $new_cost = $cost->credit;
        }

        $gymid = $this->gymModel->getGymId($timetableid);
        $activity_id = $this->gymModel->getActivityidfromtimetable($timetableid);
        //Check User Balance is enough to buy the activity

        if ($this->checkUserBalance($_SESSION['user_id'], $new_cost)) {
            if (!empty($timetableid)) {
                $data['user_id'] = $_SESSION['user_id'];
                $data['timetable_id'] = $timetableid;
                $data['total_cost'] = $new_cost;
                $data['gym_id'] = $gymid->gym_id;
                $data['activity_id'] = $activity_id->activity_id;
                date_default_timezone_set('UTC');

                $data['date'] = date('d-m-y h:i:s');

                $allocation = $this->userModel->allocation($data);
                if ($allocation) {
                    //Deduct the credit once allocated successfully!
                    if ($this->userModel->deductCredit($data)) {
                        //Calculate profit for admin
                        $data['admin_credit'] = 0.1 * $data['total_cost']; //10% off the sales made by gym
                        $data['total_cost'] =  $data['total_cost'] - $data['admin_credit']; //Remaining credit to the gym


                        //Add credit to the gym owner
                        if ($this->gymModel->addCredit($data) && $this->adminModel->addCredit($data)) {
                            $data['success'] = "Successfully Allocated! Please join the class during the allocated time";
                            $this->timetable($day = "monday", $data);
                        } else {
                            $data['error'] = "Something went wrong! Please try again later";
                            $this->timetable($day = "monday", $data);
                        }

                        //Add credit to Admin

                    } else {
                        $data['error'] = "Something went wrong! Please try again later";
                        $this->timetable($day = "monday", $data);
                    }
                } else {
                    $data['error'] = "Something went wrong! Please try again later";
                    $this->timetable($day = "monday", $data);
                }
            } else {
                $data['error'] = "Something went wrong! Please try again later";
                $this->timetable($day = "monday", $data);
            }
        } else {
            $this->creditsError();

            // $this->timetable($day = "monday", $data);
        }
    }

    public function creditsError()
    {

        $msg['error'] = "Not enough credits. Please buy more!";
        $this->index($msg);
    }

    public function cart()
    {
        if (isset($_SESSION['user_id'])) {

            $data = [

                'user_id' => $_SESSION['user_id'],
            ];

            $userCart = $this->userModel->viewCart($data);
            if (!empty($userCart)) {
                $data['cart_activities'] = $userCart;
                $count = 0;
                foreach ($data['cart_activities'] as $single) {
                    $count += 1;
                }
                $data['cart_count'] = $count;
                $this->view('User/cart', $data);
            } else {
                $data['cart_activities'] = NULL;
                $this->view('User/cart', $data);
            }
        } else {
            $data['loginError'] = 'Please login to view User Cart';
            $this->view('Landing/login', $data);
        }
    }

    public function removeCart($activity_id, $user_id)
    {

        if (isset($_SESSION['user_id'])) {

            $data = [

                'user_id' => $_SESSION['user_id'],
            ];

            if ($user_id != $data['user_id']) {
                $data['loginError'] = 'Please login to edit Cart';
                $this->view('Landing/login', $data);
            } else {
                $data['activity_id'] = $activity_id;
                $removeCart = $this->userModel->removeCart($data);

                if ($removeCart) {
                    $data['success'] = "Successfully Removed";
                    if ($_SESSION['CartCount'] >= 0) {
                        $_SESSION['CartCount'] -= 1;
                    }
                    $this->cart();
                } else {
                    $data['error'] = "Something'\s wrong! Please try again later";

                    $this->view('User/cart', $data);
                }
            }
        }
    }


    public function confirmActivity($user_id)
    {

        if (isset($_SESSION['user_id'])) {

            $data = [

                'user_id' => $_SESSION['user_id'],
            ];
            if ($user_id != $data['user_id']) {
                $data['loginError'] = 'Please login to confirm Cart';
                $this->view('Landing/login', $data);
            } else {
                $getUserCart = $this->userModel->viewCart($data);
                if (!empty($getUserCart)) {
                    foreach ($getUserCart as $single) {

                        $data['user_id'] = $single->user_id;
                        $data['activity_id'] = $single->activity_id;
                        $data['gym_id'] = $single->gym_id;


                        $addUserActivity = $this->userModel->addActivity($data);
                        $removecart = $this->userModel->removeCart($data);
                        $_SESSION['CartCount'] = 0;
                    }
                    $msg = 'Activity Added! Please allocate time on My Timetable Page';
                    $this->MyActivity($msg);
                }
            }
        } else {
            $data['loginError'] = 'Please login to view User Cart';
            $this->view('Landing/login', $data);
        }
    }


    public function MyActivity($msg = NULL)
    {
        if (isset($_SESSION['user_id'])) {

            if (!empty($msg['error'])) {
                $data['error'] = $msg['error'];
            }
            if (!empty($msg['success'])) {
                $data['success'] = $msg['success'];
            }

            $data['user_id'] = $_SESSION['user_id'];

            $useractivity = $this->userModel->manageActivitiesList($data);
            $data['myActivity'] = $useractivity;
            if (!empty($data['myActivity'])) {
                $this->view('User/myactivity', $data);
            } else {
                $data['error'] = 'No Activity Added!';
                $this->view('User/myactivity', $data);
            }
        } else {
            $data['loginError'] = 'Please login to view User Cart';
            $this->view('Landing/login', $data);
        }
    }

    public function removeActivity($activity_id)
    {
        if (isset($_SESSION['user_id'])) {

            $data = [

                'user_id' => $_SESSION['user_id'],
            ];

            $data['activity_id'] = $activity_id;
            $removeActivity = $this->userModel->removeActivity($data);

            if ($removeActivity) {
                $data['success'] = "Successfully Removed";

                $this->MyActivity();
            } else {
                $data['error'] = "Something'\s wrong! Please try again later";

                $this->MyActivity();
            }
        }
    }


    public function Credits()
    {
        if (isset($_SESSION['user_id'])) {

            $data = [

                'user_id' => $_SESSION['user_id'],
            ];

            $credits = $this->userModel->credits();
            $data['credits'] = $credits;
            $this->view('User/buycredits', $data);
        } else {

            $data['loginError'] = 'Please login to buy Credits';
            $this->view('Landing/login', $data);
        }
    }


    public function checkout($price, $total_credit)
    {

        if (isset($_SESSION['user_id'])) {

            $data = [
                'title' => 'Checkout',
                'cost' => $price,
                'total_credit' => $total_credit,

            ];

            $this->view('User/checkout', $data);
        } else {

            $data['loginError'] = 'Please login to buy Credits';
            $this->view('Landing/login', $data);
        }
    }


    public function confirmPurchase($cost, $credits)
    {

        if (isset($_SESSION['user_id'])) {

            $data = [
                'title' => 'Checkout',
                'cost' => $cost,
                'total_credit' => $credits,
                'user_id' => $_SESSION['user_id'],
            ];

            $confirmPurchase = $this->userModel->confirmPurchase($data);
            if ($confirmPurchase) {
                redirect('User');
            }

            $this->view('User/checkout', $data);
        } else {

            $data['loginError'] = 'Please login to buy Credits';
            $this->view('Landing/login', $data);
        }
    }
}

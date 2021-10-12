<?php


class GymModel
{


  private $db;

  public function __construct()
  {

    $this->db = new Database;
  }

  public function addActivity($data)
  {

    $this->db->query('INSERT INTO gym_activity (gym_id,activity_name,category,sessions_per_week,max_capacity,credit,description,status) VALUES (:gym_id,:activity_name,:category, :sessions_per_week, :max_capacity,:credit,:description,:status);
    SELECT LAST_INSERT_ID()');

    // Bind Values
    $this->db->bind(':gym_id', $data['gym_id']);
    $this->db->bind(':activity_name', $data['activity_name']);
    $this->db->bind(':category', $data['category']);
    $this->db->bind(':sessions_per_week', $data['sessions_per_week']);
    $this->db->bind(':max_capacity', $data['max_capacity']);
    $this->db->bind(':credit', $data['credit']);
    $this->db->bind(':description', $data['description']);
    $this->db->bind(':status', $data['status']);



    //Execute
    if ($this->db->execute()) {
      $data['activity_id'] = $this->db->lastid();
      $this->addactivityTime($data);
      return true;
    } else {
      return false;
    }
  }

  public function addactivityTime($data)
  {


    if (!empty($data['time_monday'])) {
      foreach ($data['time_monday'] as $mondaytime) {
        $this->db->query('INSERT INTO `gym_activity_timetable`(`activity_id`, `gym_id`, `day`, `time`)VALUES(:activity_id, :gym_id, :day, :time)');
        $this->db->bind(':activity_id', $data['activity_id']);

        $this->db->bind(':gym_id', $data['gym_id']);
        $this->db->bind(':day', 'monday');
        $this->db->bind(':time', $mondaytime);

        $this->db->execute();
      }
    }

    if (!empty($data['time_tuesday'])) {

      foreach ($data['time_tuesday'] as $tuesdaytime) {
        $this->db->query('INSERT INTO gym_activity_timetable (`activity_id`, `gym_id`, `day`, `time`) VALUES(:activity_id, :gym_id, :day, :time)');

        $this->db->bind(':activity_id', $data['activity_id']);
        $this->db->bind(':gym_id', $data['gym_id']);

        $this->db->bind(':day', 'tuesday');
        $this->db->bind(':time', $tuesdaytime);

        $this->db->execute();
      }
    }

    if (!empty($data['time_wednesday'])) {

      foreach ($data['time_wednesday'] as $wednesdaytime) {
        $this->db->query('INSERT INTO gym_activity_timetable (`activity_id`, `gym_id`, `day`, `time`) VALUES(:activity_id, :gym_id, :day, :time)');

        $this->db->bind(':activity_id', $data['activity_id']);
        $this->db->bind(':gym_id', $data['gym_id']);

        $this->db->bind(':day', 'wednesday');
        $this->db->bind(':time', $wednesdaytime);

        $this->db->execute();
      }
    }

    if (!empty($data['time_thursday'])) {

      foreach ($data['time_thursday'] as $thursdaytime) {
        $this->db->query('INSERT INTO gym_activity_timetable (`activity_id`, `gym_id`, `day`, `time`) VALUES(:activity_id, :gym_id, :day, :time)');

        $this->db->bind(':activity_id', $data['activity_id']);
        $this->db->bind(':gym_id', $data['gym_id']);

        $this->db->bind(':day', 'thursday');
        $this->db->bind(':time', $thursdaytime);

        $this->db->execute();
      }
    }

    if (!empty($data['time_friday'])) {

      foreach ($data['time_friday'] as $fridaytime) {
        $this->db->query('INSERT INTO gym_activity_timetable (`activity_id`, `gym_id`, `day`, `time`) VALUES(:activity_id, :gym_id, :day, :time)');

        $this->db->bind(':activity_id', $data['activity_id']);
        $this->db->bind(':gym_id', $data['gym_id']);

        $this->db->bind(':day', 'friday');
        $this->db->bind(':time', $fridaytime);
        $this->db->execute();
      }
    }

    if (!empty($data['time_saturday'])) {

      foreach ($data['time_saturday'] as $saturdaytime) {
        $this->db->query('INSERT INTO gym_activity_timetable (`activity_id`, `gym_id`, `day`, `time`) VALUES(:activity_id, :gym_id, :day, :time)');

        $this->db->bind(':activity_id', $data['activity_id']);
        $this->db->bind(':gym_id', $data['gym_id']);

        $this->db->bind(':day', 'saturday');
        $this->db->bind(':time', $saturdaytime);

        $this->db->execute();
      }
    }

    if (!empty($data['time_sunday'])) {

      foreach ($data['time_sunday'] as $sundaytime) {
        $this->db->query('INSERT INTO gym_activity_timetable (`activity_id`, `gym_id`, `day`, `time`) VALUES(:activity_id, :gym_id, :day, :time)');

        $this->db->bind(':gym_id', $data['gym_id']);
        $this->db->bind(':activity_id', $data['activity_id']);
        $this->db->bind(':day', 'sunday');
        $this->db->bind(':time', $sundaytime);
        $this->db->execute();
      }
    }
  }

  public function getActivityid($data)
  {
    $this->db->query('SELECT id FROM gym_activity WHERE gym_id = :gym_id and description = :description');
    $this->db->bind(':gym_id', $data['gym_id']);
    $this->db->bind(':description', $data['description']);
    $row = $this->db->resultSet();

    if ($this->db->rowCount() > 0) {

      return $row;
    }
  }

  public function numGymActivities($data)
  {
    $this->db->query('SELECT COUNT(*) AS `num_gym_activities` FROM `gym_activity` WHERE gym_id=:gym_id');
    $this->db->bind(':gym_id', $data['gym_id']);
    $row = $this->db->resultSet();

    if ($this->db->rowCount() > 0) {

      return $row;
    }
  }

  public function viewActivity($data)
  {

    $this->db->query('SELECT * FROM gym_activity WHERE gym_id = :gym_id');
    $this->db->bind(':gym_id', $data['gym_id']);
    $row = $this->db->resultSet();

    if ($this->db->rowCount() > 0) {

      return $row;
    }
  }

  public function manageActivity($data)
  {
    $this->db->query('SELECT DISTINCT gym_activity.activity_name, gym_activity.description, gym_activity.category, gym_activity.status, gym_activity.credit, gym_activity_timetable.day,gym_activity_timetable.id as timetable_id, gym_activity_timetable.sale_percentage, gym_activity_timetable.time,gym_activity_timetable.activity_id FROM gym_activity INNER JOIN gym_activity_timetable ON gym_activity_timetable.activity_id = gym_activity.id WHERE gym_activity.gym_id=:gym_id');
    $this->db->bind(':gym_id', $data['gym_id']);
    $row = $this->db->resultSet();

    if ($this->db->rowCount() > 0) {

      return $row;
    }
  }


  public function deleteActivity($data)
  {
    $this->db->query('DELETE FROM gym_activity where id=:activity_id');
    $this->db->bind(':activity_id', $data['activity_id']);


    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }




  public function editActivity($data)
  {
    $this->db->query('UPDATE gym_activity SET activity_name = :activity_name, category=:category, sessions_per_week=:sessions_per_week,
            max_capacity=:max_capacity, credit=:credit, description=:description where id = :activity_id');

    $this->db->bind(':activity_id', $data['activity_id']);
    $this->db->bind(':activity_name', $data['activity_name']);
    $this->db->bind(':category', $data['category']);
    $this->db->bind(':sessions_per_week', $data['sessions_per_week']);
    $this->db->bind(':max_capacity', $data['max_capacity']);
    $this->db->bind(':credit', $data['credit']);
    $this->db->bind(':description', $data['description']);


    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function updateStatus($data)
  {
    $this->db->query('UPDATE gym_activity SET status=:status where id = :activity_id');
    $this->db->bind(':status', $data['status']);
    $this->db->bind(':activity_id', $data['activity_id']);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function fetchActiveActivity()
  {
    $this->db->query('SELECT gym_activity.id, gym_activity.gym_id, gym_activity.activity_name, gym_activity.category,gym_activity.sessions_per_week,gym_activity.max_capacity, gym_activity.max_capacity, gym_activity.max_capacity, gym_activity.credit, gym_activity.description, gym_activity.status, gym_information.gym_name, gym_information.gym_address, gym_information.photo 
    FROM gym_activity 
    INNER JOIN gym_information 
    ON gym_information.gym_id=gym_activity.gym_id WHERE status = :status');

    $this->db->bind(':status', 1);
    $row = $this->db->resultSet();

    if ($this->db->rowCount() > 0) {

      return $row;
    }
  }

  public function totalGymMembers($data)
  {
    $this->db->query('SELECT DISTINCT users.firstname, users.lastname FROM users_activity JOIN users ON users_activity.user_id = users.id where users_activity.gym_id=:gym_id');
    $this->db->bind(':gym_id', $data['gym_id']);

    $row = $this->db->resultSet();

    if ($this->db->rowCount() > 0) {

      return $row;
    }
  }


  public function viewtimeTable($data)
  {

    $this->db->query('SELECT gym_activity_timetable.id, gym_activity_timetable.day, gym_activity_timetable.time, gym_activity.activity_name, gym_activity.category, gym_activity.sessions_per_week, gym_activity.max_capacity, gym_activity.credit FROM gym_activity_timetable INNER JOIN gym_activity ON gym_activity_timetable.activity_id = gym_activity.id where gym_activity_timetable.gym_id = :gym_id and gym_activity_timetable.day=:day');
    $this->db->bind(':gym_id', $data['gym_id']);
    $this->db->bind(':day', $data['day']);


    $row = $this->db->resultSet();

    if ($this->db->rowCount() > 0) {

      return $row;
    }
  }

  public function members($data)
  {

    $this->db->query('SELECT DISTINCT users.firstname, users.lastname FROM users_activity JOIN users ON users_activity.user_id = users.id where users_activity.gym_id=:gym_id');
    $this->db->bind(':gym_id', $data['gym_id']);

    $row = $this->db->resultSet();

    if ($this->db->rowCount() > 0) {

      return $row;
    }
  }

  public function allocatedusers($data)
  {
    $this->db->query('SELECT DISTINCT users.firstname, users.lastname, users.contact_number, users.gender, gym_activity.max_capacity FROM users_allocation INNER JOIN users ON users_allocation.user_id = users.id INNER JOIN gym_activity ON gym_activity.id = users_allocation.activity_id WHERE users_allocation.timetable_id = :timetable_id');
    $this->db->bind(':timetable_id', $data['timetable_id']);
    $row = $this->db->resultSet();

    if ($this->db->rowCount() > 0) {

      return $row;
    }
  }

  public function addCredit($data)
  {
    $this->db->query('INSERT INTO `gym_earnings`(`Date`, `gym_id`, `Credits`) VALUES (CURRENT_TIMESTAMP, :gym_id, :credits)');
    //$this->db->bind(':date', $data['date']);
    $this->db->bind(':gym_id', $data['gym_id']);
    $this->db->bind(':credits', $data['total_cost']);


    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function getGymId($timetableid)
  {
    $this->db->query('SELECT `gym_id` FROM `gym_activity_timetable` WHERE id = :timetable_id');
    $this->db->bind(':timetable_id', $timetableid);
    $row = $this->db->single();

    if ($this->db->rowCount() > 0) {

      return $row;
    }
  }

  public function getActivityidfromtimetable($timetableid)
  {
    $this->db->query('SELECT `activity_id` FROM `gym_activity_timetable` WHERE id = :timetable_id');
    $this->db->bind(':timetable_id', $timetableid);
    $row = $this->db->single();

    if ($this->db->rowCount() > 0) {

      return $row;
    }
  }

  public function getGymLogo($data)
  {
    $this->db->query('SELECT * FROM `gym_information` WHERE gym_id = :gym_id');
    $this->db->bind(':gym_id', $data['gym_id']);
    $row = $this->db->single();

    if ($this->db->rowCount() > 0) {

      return $row;
    }
  }

  public function totalEarnings($data)
  {

    $this->db->query('SELECT SUM(Credits) AS "total_credits" FROM gym_earnings WHERE gym_id = :gym_id');
    $this->db->bind(':gym_id', $data['gym_id']);
    $row = $this->db->resultSet();

    if ($this->db->rowCount() > 0) {

      return $row;
    }
  }

  public function earnings($data)
  {

    $this->db->query('SELECT Date, SUM(Credits) AS "Credits"
    FROM gym_earnings WHERE gym_id = :gym_id group by date(Date) ');
    $this->db->bind(':gym_id', $data['gym_id']);
    $row = $this->db->resultSet();

    if ($this->db->rowCount() > 0) {

      return $row;
    }
  }

  public function apple_sales($data)
  {

    $this->db->query('UPDATE gym_activity_timetable SET sale_percentage=:sale_percentage where id = :timetable_id');
    $this->db->bind(':sale_percentage', $data['sale_percentage']);
    $this->db->bind(':timetable_id', $data['timetable_id']);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function remove_sales($data)
  {

    $this->db->query('UPDATE gym_activity_timetable SET sale_percentage=NULL where id = :timetable_id');
    $this->db->bind(':timetable_id', $data['timetable_id']);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}

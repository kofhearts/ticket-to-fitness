<?php
//Example Model for User

    class Account{

        private $db;


        public function __construct(){
            $this->db = new Database;

        }

        /*
            Function to check if the username provided by the user exists in the database
            @Param1, username supplied by the user.
        */
        public function checkUsername($username){
            
            $this->db->query('SELECT * FROM users WHERE username = :username');
            $this->db->bind(':username', $username);
            $row=$this->db->single();
            
            if($this->db->rowCount() > 0) {
               
                return $row;
            }
        }
        /*
            Function to check if the email supplied by the user already exists in the database
            @Param1, email supplied by the user
        */
        public function checkEmailExists($email){
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', $email);
            $row=$this->db->single();
            
            if($this->db->rowCount() > 0) {
               
                return $row;
            }
        }
         /*
            Function to check if the Username supplied by the user already exists in the database
            @Param1, username supplied by the user
        */
        public function checkUsernameExists($username){
            $this->db->query('SELECT * FROM users WHERE username = :username');
            $this->db->bind(':username', $username);
            $row=$this->db->single();
            
            if($this->db->rowCount() > 0) {
               
                return $row;
            }

        }

        /*
            Function to register user account
            @Param1, data associative array of user information
        */
        public function registerAccount($data){
            $this->db->query('INSERT INTO users (username,firstname,lastname,email,password,activation_code,user_email_status) VALUES (:username,:firstname,:lastname, :email, :password,:activation_code,:user_email_status)');
      
            // Bind Values
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':firstname', $data['firstname']);
            $this->db->bind(':lastname', $data['lastname']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':activation_code', $data['activation_code']);
            $this->db->bind(':user_email_status', $data['user_email_status']);

            
         
            //Execute
            if($this->db->execute()){
              return true;
            } else {
              return false;
            }
        }



        public function updateEmalStatus($data){
            $this->db->query('UPDATE users SET user_email_status = :user_email_status where email = :email');
            $this->db->bind(':user_email_status', $data['user_email_status']);
            $this->db->bind(':email', $data['email']);

            //Execute
            if($this->db->execute()){
                return true;
              } else {
                return false;
              }

            
        }







        }



?>
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
    $this->db->query('INSERT INTO gym_activity (gym_id,activity_name,category,sessions_per_week,max_capacity,price_per_week,description,status) VALUES (:gym_id,:activity_name,:category, :sessions_per_week, :max_capacity,:price_per_week,:description,:status)');

    // Bind Values
    $this->db->bind(':gym_id', $data['gym_id']);
    $this->db->bind(':activity_name', $data['activity_name']);
    $this->db->bind(':category', $data['category']);
    $this->db->bind(':sessions_per_week', $data['sessions_per_week']);
    $this->db->bind(':max_capacity', $data['max_capacity']);
    $this->db->bind(':price_per_week', $data['price_per_week']);
    $this->db->bind(':description', $data['description']);
    $this->db->bind(':status', $data['status']);



    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
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
            max_capacity=:max_capacity, price_per_week=:price_per_week, description=:description where id = :activity_id');

    $this->db->bind(':activity_id', $data['activity_id']);
    $this->db->bind(':activity_name', $data['activity_name']);
    $this->db->bind(':category', $data['category']);
    $this->db->bind(':sessions_per_week', $data['sessions_per_week']);
    $this->db->bind(':max_capacity', $data['max_capacity']);
    $this->db->bind(':price_per_week', $data['price_per_week']);
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

  public function fetchActiveActivity(){
    $this->db->query('SELECT * FROM gym_activity WHERE status = :status');
    $this->db->bind(':status', 1);
    $row = $this->db->resultSet();

    if ($this->db->rowCount() > 0) {

      return $row;
    }
  }
}

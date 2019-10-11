<?php
require 'database.php';

class dashboard{
  public $db;
	function __construct() {
			$this->db = new database();
			session_start();
			header("Access-Control-Allow-Origin: *");
			header("Access-Control-Allow-Headers: *");
			header("Access-Control-Allow-Method: *");
			header('Content-Type: application/json');
  }

  public function intern_detail_display($id=NULL){
    if (!isset($_SESSION['userId'])) {
      $data = array(
        "error"=>1,
        "errorMessage" => "You are not Logged in",
        "report" =>"accountLoggedOut"
      );
    }
    else {
      $id=$_SESSION['userId'];
      $sql = "SELECT * FROM interns WHERE `userId` = $id;";
      $row = $this->db->select($sql);
      if ($row != 0 ) {
        $data = array(
          "error"=> 0,
          "theset" => $row,
          "report" =>"gotInternDetail"
        );
      }
      else {
        $data = array(
          "error"=> 1,
          "errorMessage" => "No Value for that intern.",
          "report" =>"noInternDetail"
        );
      }

      echo json_encode($data,true);
      $this->db->close();
    }

  }

  public function intern_current_stage_number($id=NULL){
    if (!isset($_SESSION['userId'])) {
      $data = array(
        "error"=>1,
        "errorMessage" => "You are not Logged in",
        "report" =>"accountLoggedOut"
      );
    }
    else {
      $id=$_SESSION['userId'];
      $sql = "SELECT `currentStage` FROM interns WHERE `userId` = $id;";
      $currstage = $this->db->select($sql);
      if($currstage){
        $data = array(
          "error" => 0,
          "theStage" => $currstage,
          "report" => "hasStageNumber"
        );
      }
        else{
          $data = array(
            "error"=> 1,
            "errorMessage" => "No Value for the intern.",
            "report" =>"noStageNumber"
          );
        }

    }
    echo json_encode($data,true);
    $this->db->close();
  }

  public function intern_team_display(){} 

  public function intern_mentors_display($id=NULL){
    if (!isset($_SESSION['userId'])) {
      $data = array(
        "error"=>1,
        "errorMessage" => "You are not Logged in",
        "report" =>"accountLoggedOut"
      );
    }
    else {
      $id=$_SESSION['userId'];
      $sql = "SELECT * FROM mentors;";
      $row = $this->db->select($sql);
      if ($row != 0 ) {
        $data = array(
          "error"=> 0,
          "theset" => $row,
          "report" =>"gotMentorlist"
        );
      }
      else {
        $data = array(
          "error"=> 1,
          "errorMessage" => "No Mentors.",
          "report" =>"noMentorlist"
        );
      }

      echo json_encode($data,true);
      $this->db->close();

    }
  }

  public function tasks_submit(){}

}

?>

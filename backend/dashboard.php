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

    public function intern_detail_display(){}

    public function intern_team_display(){}

    public function intern_mentors_display(){}

    public function intern_current_stage_number($id=NULL){
      $id=$_SESSION['userId'];
      
    }

    public function intern_completed_tasks_summary(){}

    public function intern_notifications_summary(){}

    public function intern_reports_summary(){}

    public function intern_notifications_display(){}

    public function intern_progress_display(){}

    public function intern_task_submit(){}

}

?>

<?php
/**
 * This file should handle the connections to the database
 * and serves as a mini query builder
 */
class database{
    public $conn;
	public function __construct() {
        //url of external database
        $url = '';
        $dbsets = parse_url($url);
		
		$hostname = $dbsets['host'];
		$username = $dbsets['user'];
		$password = $dbsets['pass'];
		$database = ltrim($dbsets['path'],'/');


		// Create connection
		$this->conn = new mysqli($hostname, $username, $password, $database);

		// Check connection
		if ($this->conn->connect_error) {
			die("Connection failed: " . $this->conn->connect_error);
		}
		//echo "Connection was successfully established!";
    }

    /** Function to run a custom query.
     * Returns boolean
     */
    public function query($sql) {
		if ($this->conn->query($sql) === true) {
			return true;
		}
		return false;
	}

    /** Function to select items from the database
     * returns result array, or 0
     */
    public function select($sql) {
		$result = $this->conn->query($sql);

		if ($result->num_rows > 0) {
			$resultToReturn = [];
			while ($row = $result->fetch_assoc()) {
				array_push($resultToReturn, $row);
			}
			return $resultToReturn;
		}
		return 0;
    }
    
    public function close() {
        $this->conn->close();
      }
    }
    
    $db = new database;
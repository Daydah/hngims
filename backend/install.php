<?php
$url = '';//Add remote database server url
$dbparts = parse_url($url);

$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'],'/'); // USING PRE-INSTALLED DATABASE ON SERVER.

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);
//If using local database, use the $conn line above to create your own connection script and comment out the one above.

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
echo "Connection was successfully established!"."<br/>";

//create users table
$sql = "CREATE TABLE users (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `firstname` varchar(128) NOT NULL,
    `lastname`  varchar(128) NOT NULL,
     `password`  varchar(128) NOT NULL,
    `username`  varchar(128) NOT NULL,
    `email` varchar(128) NOT NULL,
    `time` varchar(128) NOT NULL,
    PRIMARY KEY (id)
    )";
if ($conn->query($sql) === true) {
    echo "Users table created successfully"."<br/>";
  }
  else {
    echo "Error creating Users table: " . $conn->error."<br/>";
  }

//create mentors table
$sql = "CREATE TABLE mentors (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `userId` int(11) NOT NULL,
    `time` varchar(128) NOT NULL,
    `totalTasks` int(11)  NOT NULL,
    `failed` int(11)  NOT NULL,
    `passed` int(11),
    PRIMARY KEY (id)
)";
if ($conn->query($sql) === true) {
    echo "Mentors table created successfully"."<br/>";
  }
  else {
    echo "Error creating Mentors table: " . $conn->error."<br/>";
}

//create interns table
$sql = "CREATE TABLE interns (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `userId` int(11) NOT NULL,
    `time` varchar(128) NOT NULL,
    `totalTasks` int(11)  NOT NULL,
    `pendingTasks` int(11)  NOT NULL,
    `resolvedTasks` int(11),
		`currentStage` int(11),
    PRIMARY KEY (id)
)";
if ($conn->query($sql) === true) {
    echo "Interns table created successfully"."<br/>";
  }
  else {
    echo "Error creating Interns table: " . $conn->error."<br/>";
  }

//create tasks table
$sql = "CREATE TABLE tasks (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`userId` int(11) NOT NULL,
	`time` varchar(128) NOT NULL,
	`taskurl` varchar(128) NOT NULL,
	`status` int(11) NOT NULL,
	`gradingMentorId` int(11),
	`notes` varchar(128),
	PRIMARY KEY (id)
)";
if ($conn->query($sql) === true) {
    echo "Interns table created successfully"."<br/>";
  }
  else {
    echo "Error creating Interns table: " . $conn->error."<br/>";
  }


?>

<?php

//insert.php

// $connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");

// $query = "
// INSERT INTO tbl_sample 
// (first_name, last_name) 
// VALUES (:first_name, :last_name)
// ";

// for($count = 0; $count<count($_POST['hidden_first_name']); $count++)
// {
//  $data = array(
//   ':first_name' => $_POST['hidden_first_name'][$count],
//   ':last_name' => $_POST['hidden_last_name'][$count]
//  );
//  $statement = $connect->prepare($query);
//  $statement->execute($data);
// }

$servername = "localhost";
$username = "root";
$password = "";
$database = "result_management_2021_22";
$connect = mysqli_connect($servername, $username, $password, $database);

//$connect = new PDO("mysql:host=localhost;dbname=result_management_2021_22", "root", "");
$query = "insert into marks(`exam_id`, `student_id`,`subject_id`,`marks`)values(:exam_id, :student_id, :subject_id, :marks)";
for ($count = 1; $count <= count($_POST['student']); $count++) {
    $data = array(
        ':exam_id' => $_POST['exam'][$count],
        ':student_id' => $_POST['student'][$count],
        ':subject_id' => $_POST['subject'][$count],
        ':marks' => $_POST['marks'][$count]
    );
    $statement = $connect->prepare($query);
    $result = $statement->execute($data);
}

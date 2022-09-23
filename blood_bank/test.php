<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['tracker_id']) && isset($_POST['mybuilddate']) &&
        isset($_POST['mybuildbydate'])) {
        
        $tracker_id = $_POST['tracker_id'];
        $mybuilddate = $_POST['mybuilddate'];
        $mybuildbydate = $_POST['mybuildbydate'];
        

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "vehicle_tracking";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT tracker_id FROM tracker WHERE tracker_id = $tracker_id LIMIT 1";
            $Insert = "INSERT INTO tracker(tracker_id,build_date,build_by) values($tracker_id, $mybuilddate,$mybuildbydate)";

            $stmt = $conn->prepare($Select);
            $stmt->bind_param("i", $tracker_id);
            $stmt->execute();
            $stmt->bind_result($result_tracker_id);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;

            if ($rnum == 0) {
                $stmt->close();

                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("iss",$tracker_id, $mybuilddate, $mybuildbydate);
                if ($stmt->execute()) {
                    echo "New record inserted sucessfully.";
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "This Tracker_Id already exists.";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
else {
    echo "Submit button is not set";
}
?>
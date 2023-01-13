<?php
    function get_db() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gestion_absences";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        else{
            // echo "good";
        }
        return $conn;
    }
?>

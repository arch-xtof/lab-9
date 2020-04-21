<?php
    // Get credentials
    require('connect.db.php');

    // Create connection
    $db = new mysqli($servername, $username, $password);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    //echo "Connected successfully";
    echo '4';
    function listCourses(){
        echo '3';
        $query = "SELECT course_code, course_name, ects_credits FROM courses ORDER BY id ASC";
        $result = mysqli_query($db, $query);
        if(mysqli_num_rows($result) > 0){
            
            while($row = mysqli_fetch_array($result)){
                printf("%s\t %s\t %s", $row['course_code'], $row['course_name'], $row['ects_credits']);
                echo '1';
            }

            echo '2';
        }
    }

    listCourses();
?>
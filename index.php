<?php
    // Get credentials
    require('connect.db.php');

    // Create connection
    $db = mysqli_connect($server, $user, $password, $database);

    // Check connection
    if(!$db) die("Connnection to DB failed: " . mysqli_connect_error());

    function listCourses(){
        echo '3';
        $query = "SELECT course_code, course_name, ects_credits FROM courses ORDER BY id ASC";
        $result = mysqli_query($db, $query);
        echo mysqli_num_rows($result);
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

<?php
    // Get credentials
    include_once "connect.db.php";

    // Create connection
    //$db = mysqli_connect($server, $user, $password, $database);
    $db = mysqli_connect("anysql.itcollege.ee", "WT8", "CJuPlun24D", "WT8");
    // Check connection
    if(!$db) die("Connnection to DB failed: " . mysqli_connect_error());

    $sql = "SELECT * FROM courses";
    $result = mysqli_query($db, $sql);
    
    echo "this is ";

    if (!$result) {
        echo "weird";
    }

    if($result){
        echo "even more werid";
    }

    /*while ($row = mysql_fetch_row($result)) {
        echo "Table: {$row[0]}\n";
    }

    function listCourses(){
        
        $query = "SELECT * FROM courses";
        $result = mysqli_query($db, $query);
        echo "2";
        if(mysqli_num_rows($result) > 0){
            echo "1";
            while($row = mysqli_fetch_array($result)){
                printf("%s\t %s\t %s", $row['course_code'], $row['course_name'], $row['ects_credits']);
            }
        }
    }
    
    //listCourses();*/
?>

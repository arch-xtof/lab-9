<?php
    // Get credentials
    include_once "connect.db.php";

    // Create connection
    //$db = mysqli_connect($server, $user, $password, $database);
    $db = mysqli_connect("anysql.itcollege.ee", "WT8", "CJuPlun24D", "WT8");
    // Check connection
    if(!$db) die("Connnection to DB failed: " . mysqli_connect_error());

    function listCourses($sID, $search){

        //P - shittiest
        //H - lanugage
        //P - ever
        global $db;

        $query = "SELECT course_code, course_name, ects_credits, semester_name, Semesters_ID FROM courses C LEFT JOIN semesters_arch S ON C.Semesters_ID=S.ID WHERE Semesters_ID='$sID' AND ( course_name LIKE '%$search%' OR course_code LIKE '%$search%' )";
        $result = mysqli_query($db, $query);

        if(mysqli_num_rows($result) > 0){
            
            printf("<table> <tr> <th>Code</th> <th>Name</th> <th>Credits</th> <th>Semester</th> </tr>");
            while($row = mysqli_fetch_array($result)){
                printf("<tr> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> </tr>", $row['course_code'], $row['course_name'], $row['ects_credits'], $row['semester_name']);
            }
            printf("</table>");
        }
    }

    function semestrator(){

        global $db;

        $query = "SELECT * FROM semesters_arch";
        $result = mysqli_query($db, $query);

        printf("<ul>");
        while($row = mysqli_fetch_array($result)){
            printf("<li><a href=index.php?semester=%s>%s</a></li>", $row['ID'], $row['semester_name']);
        }
        printf("</ul>");

        printf("<form method=POST> <input name=search> <input type=submit> </form>");

        if(isset($_GET['semester'])){
            $semester = mysqli_real_escape_string($db, $_GET['semester']);
        }
        
        $search = 'yo';
        if(isset($POST['search'])){
            $search = $_POST['search'];
        }
        echo "search: ".$search;
        listCourses($semester, $search);
    }
    
    //semestrator();
    //listCourses();
    printf("<form method=POST> <input type=text name=search> <input type=submit> </form>");
    $search = "";
    if(isset($POST['search'])){
        $search = $_POST['search'];
    }
    echo "search: ".$search;
?>

<?php

if(empty($_POST['first_name'])&&empty($_POST['last_init'])){

    echo "<p>Please make sure to enter in your first name and last initial.
 Press your browser's back button to enter in the info.</p>";

}else{
    //set up credentials to get into sql server
    $user = "root";
    $password = "FrannyJenny2323!!";
    $host = "198.46.190.13";

    $p="";
    $u='root';

    $DBConnect = mysqli_connect($host,$user,$password);
    //error check the connection to the server
    if($DBConnect === FALSE){
        echo "<p>Unable to connect to database server.</p>16161616". "<p>Error code " . mysqli_errno() . ": " . mysqli_error() . "</p>";
    }else{
        //error check the creation of the database
        //if no error make new database
        $DBName = "anime";
        if(!mysqli_select_db($DBConnect,$DBName)){
            $SQLcommand = "CREATE DATABASE $DBName";
            $SQLResult = mysqli_query($DBConnect,$SQLcommand);
            if($SQLResult === FALSE){
                echo "<p>Unable to execute query.</p>" . "<p>Error Code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>";
            }
        }
        //connect to database and check to see if the table that is wanting to be used is already made
        mysqli_select_db($DBConnect,$DBName);

        $TableName = "results";
        $SQLcommand = "SHOW TABLES LIKE '$TableName'";
        $SQLResult = mysqli_query($DBConnect,$SQLcommand);
        //if there is no result for checking to see if there is a table
        //Then make the table with the correct value guides
        if(mysqli_num_rows($SQLResult)==0){
            $SQLcommand = "CREATE TABLE $TableName (countID SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY, first_name VARCHAR (40), last_init VARCHAR (5), question1 VARCHAR (150), question1a VARCHAR (150), question1b VARCHAR (150), question2 VARCHAR (150), question3 VARCHAR (100), question4 VARCHAR (150))";
            $SQLResult = mysqli_query($DBConnect,$SQLcommand);
            //error check to make sure the table was made
            if($SQLResult === FALSE){
                echo "<p>Unable to create table.</p>" . "<p>Error code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>";
            }
        }
        //receive the input and get it ready to be inserted
        $firstName = stripslashes($_POST['first_name']);
        $lastInit = stripslashes($_POST['last_init']);
        $q1 = stripslashes($_POST['question1']);
        $q1a = stripslashes($_POST['question1a']);
        $q1b = stripslashes($_POST['question1b']);
        $q2 = stripslashes($_POST['question2']);
        $q3 = $_POST['studio'];

        $q4 = stripslashes($_POST['question4']);

        //insert into the table all values but the value(s) for question 3
        $SQLcommand = "INSERT INTO $TableName VALUES (NULL,'$firstName','$lastInit','$q1','$q1a','$q1b','$q2',NULL,'$q4')";

        $SQLResult = mysqli_query($DBConnect,$SQLcommand);


        //a needed for loop to go through the checkbox inputs and get the data needed then insert it into the table
        //
        for ($i=0; $i<sizeof ($q3);$i++) {
            $SQLcommand="INSERT INTO results (question3) VALUES ('".$q3[$i]. "')";
            $SQLResult = mysqli_query($DBConnect,$SQLcommand);

        }

        //make sure the insertion was a success
        if($SQLResult === FALSE){
            echo "<p>Unable to execute the.</p>" . "<p>Error code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>";

        }else{
            echo"<body style='background-color: #a2ddff'>";
            echo"<div style='text-align: center;'>";
            echo "<h2>Thank you for submitting the survey form.</h2>";
            echo "<p><a href='results.php'>Results of question 3</a> </p>";
            echo "</div>";
            echo "</body>";


        }//close connection
        mysqli_close($DBConnect);

    }


}

?>
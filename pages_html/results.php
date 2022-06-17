
<?php
//sets up variables to get into the sql server
$user = "root";
$password = "FrannyJenny2323!!";
$host = "198.46.190.13";
//seperate variables to make sure results are not mixed up
$trigger = 0;
$kyoto = 0;
$madhouse = 0;
$toei = 0;
$bones = 0;
$pierrot = 0;
$ufotable = 0;
$result1 = 0;
$result2 = 0;
$result3 = 0;
$result4 = 0;
$result5 = 0;
$result6 = 0;
$result7 = 0;
$DBConnect = mysqli_connect($host,$user,$password);
//error check to see if connection to server was a success
if($DBConnect === FALSE){
    echo "<p>Unable to connect to the database server.</p>" . "<p>Error code " . mysqli_errno() . ": " . mysqli_error() . "</p>";

}else{
    //if success to get into server:
    //access the database made within submitSurvey.php
    $DBName = "anime";
    //check to see if the database is in the server
    if(!mysqli_select_db($DBConnect,$DBName)){
        echo "<p>No candidates have been interviewed.";
    }else{
        //look for the table created in submitSurvey.php
        $TableName = "results";
        $SQLCommand = "SELECT * FROM $TableName";
        $SQLResult = mysqli_query($DBConnect,$SQLCommand);
        if(mysqli_num_rows($SQLResult) == 0){
            //error if no entries
            echo "<p>There are no entries!";
            //the following seperates the checkbox inputed data for question 3 and counts how many selected each studio
            //that value is then placed into a results variable which is used to make the pie chart
        }else{
            $SQLCommand = "SELECT COUNT(question3) FROM results WHERE question3='Trigger'";
            $trigger = mysqli_query($DBConnect,$SQLCommand);
            $tRow = mysqli_fetch_array($trigger);
            $result1=($tRow[0]);

            $SQLCommand = "SELECT COUNT(question3) FROM results WHERE question3='Kyoto'";
            $kyoto = mysqli_query($DBConnect,$SQLCommand);
            $kRow = mysqli_fetch_array($kyoto);
            $result2=($kRow[0]);

            $SQLCommand = "SELECT COUNT(question3) FROM results WHERE question3='Madhouse'";
            $madhouse = mysqli_query($DBConnect,$SQLCommand);
            $mRow = mysqli_fetch_array($madhouse);
            $result3=($mRow[0]);

            $SQLCommand = "SELECT COUNT(question3) FROM results WHERE question3='Toei'";
            $toei = mysqli_query($DBConnect,$SQLCommand);
            $toRow = mysqli_fetch_array($toei);
            $result4=($toRow[0]);

            $SQLCommand = "SELECT COUNT(question3) FROM results WHERE question3='Bones'";
            $bones = mysqli_query($DBConnect,$SQLCommand);
            $bRow = mysqli_fetch_array($bones);
            $result5=($bRow[0]);

            $SQLCommand = "SELECT COUNT(question3) FROM results WHERE question3='Pierrot'";
            $pierrot = mysqli_query($DBConnect,$SQLCommand);
            $pRow = mysqli_fetch_array($pierrot);
            $result6=($pRow[0]);

            $SQLCommand = "SELECT COUNT(question3) FROM results WHERE question3='Ufotable'";
            $ufotable = mysqli_query($DBConnect,$SQLCommand);
            $uRow = mysqli_fetch_array($ufotable);
            $result7=($uRow[0]);




        }//cleans up memory
        mysqli_free_result($SQLResult);
    }//close database connection
    mysqli_close($DBConnect);
}

?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Results</title>
    <link rel="stylesheet" type="text/css"href="../styles/survey.css">
    <style type="text/css">
        body{
            background-color: #a2ddff;
            margin: .5in;
            text-align: center;
        }
    </style>

</head>
<body>
<h1>Results</h1>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    //transfers the results (the amount of picks for each studio) from php to JavaScript
    //makes the strings into integers for the chart
    var trigger = parseInt(<?php echo $result1?>)
    var kyoto = parseInt(<?php echo $result2?>)
    var madhouse = parseInt(<?php echo $result3?>)
    var toei = parseInt(<?php echo $result4?>)
    var bones = parseInt(<?php echo $result5?>)
    var pierrot = parseInt(<?php echo $result6?>)
    var ufotable = parseInt(<?php echo $result7?>)

    //Following from:https://developers.google.com/chart/interactive/docs/gallery/piechart
    // Load google charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Studio', 'Number of favorites'],
            ['Trigger', trigger],
            ['Kyoto', kyoto],
            ['Madhouse', madhouse],
            ['Toei', toei],
            ['Bones', bones],
            ['Pierrot', pierrot],
            ['Ufotable', ufotable],
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {'title':'Which of the studios which are discussed on the site did you feel most interests you? ', backgroundColor: 'transparent',  'width':700, 'height':700};

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>

<div id="piechart" align="center"></div>
<a href="index.html">HOME</a>
</body>
</html>

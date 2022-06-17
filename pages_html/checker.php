<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style type="text/css">
        body{
            background-color: #a2ddff;
            margin: .5in;
            text-align: center;
        }
    </style>
    <title>Last Chance</title>
</head>
<body>

<?php
//works to be a self check for the user to say which pages they have seen
//for the pages not checked the link for the show is given just in case they do want to check it

//checks the inputs from the pre-survey on the previous page (survey.html)
if(isset($_POST['trigger'])&&isset($_POST['kyoto'])&&isset($_POST['madhouse'])&&isset($_POST['toei'])&&isset($_POST['bones'])&&isset($_POST['pierrot'])&&isset($_POST['ufotable'])){
    echo "<p>Thank you for looking though all the pages!</p><p>Please hit 'NEXT' to continue, or 'home' to go back to the main hub.</p>";
}
if(!isset($_POST['trigger'])||!isset($_POST['kyoto'])||!isset($_POST['madhouse'])||!isset($_POST['toei'])||!isset($_POST['bones'])||!isset($_POST['pierrot'])||!isset($_POST['ufotable'])){
    echo "<p><strong> Would you like to view the page(s) again or, perhaps view them for the first time.</strong></p>";
}
if(!isset($_POST['trigger'])){
    echo "<p><a href='Trigger.html'>Click here to see Trigger's page</a></p>";
}
if(!isset($_POST['kyoto'])){
    echo "<p><a href='Kyoto.html'>Click here to see Kyoto Animation's page</a></p>";
}
if(!isset($_POST['madhouse'])){
    echo "<a href='Madhouse.html'>Click here to see Madhouse Animation's page</a>";
}
if(!isset($_POST['toei'])){
    echo "<p><a href='Toei.html'>Click here to see Toei Animation's page</a></p>";
}
if(!isset($_POST['bones'])){
    echo "<p><a href='Bones.html'>Click here to see Studio Bones's page</a></p>";
}
if(!isset($_POST['pierrot'])){
    echo "<p><a href='Pierrot.html'>Click here to see Pierrot's page</a></p>";
}
if(!isset($_POST['ufotable'])){
    echo "<p><a href='Ufotable.html'>Click here to see Ufotable's page</a></p>";
}
echo "<p><a href='Survey.php' >NEXT</a></p>";
echo "<p><a href='index.html' >Home</a></p>";



?>
</body>
</html>

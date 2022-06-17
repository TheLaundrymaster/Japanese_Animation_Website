<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Check</title>
    <link rel="stylesheet" href="../styles/question3.css">
    <style type="text/css">
        body{
            background-color: #a2ddff;
            margin: .5in;
            text-align: center;
        }
    </style>
</head>
<body>
<h1>Survey About Anime and Studios</h1>

<form action="submitSurvey.php" method="post">
    <p>Please enter in your first name and last initial: </p>
    <p><input type="text" name="first_name" placeholder="first name"></p>
    <p><input type="text" name="last_init" placeholder="last initial"></p>
    <p>Q1: Have you heard of anime before looking at this blog site? If so where?<br/> <input type="text" name="question1"></p>
    <p>Q1a: What is your opinion on anime before reading the blog? Has it changed?<br/><input type="text" name="question1a"></p>
    <p>Q1b(optional): If you answered yes to question 1... What is your favorite show?<br/> <input type="text" name="question1b"></p>
    <p>Q2: After going through the blog, are you interesting in watching anime?<br/> <input type="text" name="question2"></p>
    <p>Q3: Which of the studios which are discussed on the site did you feel most interests you? Choose all that apply:  </p>
    <div id="checkboxes"><p style="text-align: center "><input type="checkbox"  id="studio1" name="studio[]" value="Trigger">
        <label for="studio1"> Studio Trigger</label><br>
        <input type="checkbox" id="studio2" name="studio[]" value="Kyoto">
        <label for="studio2"> Kyoto Animation</label><br>
        <input type="checkbox" id="studio3" name="studio[]" value="Madhouse">
        <label for="studio3"> Madhouse</label><br>
        <input type="checkbox" id="studio4" name="studio[]" value="Toei">
        <label for="studio4"> Toei Animation</label><br>
        <input type="checkbox" id="studio5" name="studio[]" value="Bones">
        <label for="studio5"> Studio Bones</label><br>
        <input type="checkbox" id="studio6" name="studio[]" value="Pierrot">
        <label for="studio6"> Pierrot Animation</label><br>
        <input type="checkbox" id="studio7" name="studio[]" value="Ufotable">
        <label for="studio7"> Ufotable</label><br>
        </p></div>
    <p>Q4: Is there a specific show(s) that grabbed your attention from the studios that you liked?<br/><input type="text" name="question4"></p>
    <p><input type="submit" value="Submit" name="submit"><input type="reset" value="Reset"></p>

</form>


</body>
</html>
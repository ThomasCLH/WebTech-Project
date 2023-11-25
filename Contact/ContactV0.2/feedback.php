<html>
<head>
    <title>Feedback Received</title>
</head>
<body>
<?php

function feedback($email, $name, $subject, $comment)
{
    if (check($email) && check($name) && check($subject) && check($comment))
        insert($email, $name, $subject, $comment);
    else
        echo "Option cannot be blank";
}

function check($var)
{
    $len = strlen($var);
    if ($len > 0)
        return true;
    else
        return false;
}

function insert($dbemail, $dbname, $dbsubject, $dbcomment)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = "web_tech";
    $tablename = "feedback_data";
    $field1 = "email";
    $field2 = "name";
    $field3 = "subject";
    $field4 = "comment";

    $insert = "insert into $tablename ($field1, $field2, $field3, $field4) values ('$dbemail', '$dbname', '$dbsubject', '$dbcomment')";

    $database = new mysqli($servername, $username, $password, $databasename);

    if ($database->connect_error)    
        die("Could not connect to database") . $database->conncet_error;

    if($database->query($insert) === true)
        print("Your problem has be sent! We will contact you within 3 working days");
    else
        die("Could not execute insertion!" . mysqli_error($database));

    $database->close();
}
          
feedback($_POST["email"], $_POST["name"], $_POST["subject"], $_POST["comment"], $_POST["submit"]);
echo "</br><a href=\"index.html\">Index Page</a>";

?>
</body>
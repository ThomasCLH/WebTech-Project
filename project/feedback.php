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
        echo "Please fill in all fields.";
}

function check($var)
{
    $len = strlen($var);
    if ($len > 0)
        return true;
    else
        return false;
}

function insert($value1, $value2, $value3, $value4)
{
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "web_tech";
    $table = "feedback_data";
    $field1 = "email";
    $field2 = "name";
    $field3 = "subject";
    $field4 = "comment";

    $insert = "insert into $table ($field1, $field2, $field3, $field4) values ('$value1', '$value2', '$value3', '$value4')";

    $database = new mysqli($server, $user, $password, $db);

    if ($database->connect_error)    
        die("Could not connect to database") . $database->conncet_error;

    if($database->query($insert) === true)
        print("Your problem has be sent! We will contact you within 3 working days");
    else
        die("Could not execute insertion!" . mysqli_error($database));

    $database->close();
}

feedback($_POST["email"], $_POST["name"], $_POST["subject"], $_POST["comment"], $_POST["submit"]);
echo "</br><a href=\"welcome.html\">Welcome Page</a>";

?>
</body>

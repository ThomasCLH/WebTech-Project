<html>
<head>
    <title>Insert Data</title>
</head>
<body>
<?php

function insert($dbname, $dbcount)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = "web_tech";
    $tablename = "product_data";
    $field1 = "product";
    $field2 = "quantity";

    $insert = "insert into $table ($field1, $field2) values ('$dbname', '$dbcount')";

    $database = new mysqli($servername, $username, $password, $databasename);

    if ($database->connect_error)    
        die("Could not connect to database" . $database->conncet_error);

    if($database->query($insert) === true)
        print("Record inserted successfully!<br/>");
    else
        die("Could not execute insertion!" . mysqli_error($database));

    $database->close();
}

function data($name, $count)
{
    if ($name != "" && $count > 0)
    {
        echo "$name: $count<br/>";
        insert($name, $count);
    }
    else
        echo "Invalid input<br/>";
}

$product = $_POST["product"];
$quantity = $_POST["quantity"];

data($product, $quantity);

echo "<a href=\"index.html\">Previous Page</a>";

?>
</body>

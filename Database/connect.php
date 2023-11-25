<html>
<head>
    <title>Insert Data</title>
</head>
<body>
<?php

function insert($dbname, $dbcount)
{
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "web_tech";

    $insert = "insert into product_data (product, quantity) values ('$dbname', '$dbcount')";

    $sql = new mysqli($server, $username, $password, $database);

    if ($sql->connect_error)    
        die("Could not connect to database" . $sql->conncet_error);

    if($sql->query($insert) === true)
        print("Record inserted successfully!<br/>");
    else
        die("Could not execute insertion!" . mysqli_error($database));

    $sql->close();
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
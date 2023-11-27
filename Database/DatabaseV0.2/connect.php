<html>
<head>
    <title>Insert Data</title>
</head>
<body>
<?php

function addcart($product, $quantity)
{
    global $cart, $check;

    if ($product != "" && $quantity > 0 && $check)
    {
        echo "$product: $quantity<br/>";
        $cart += [$product => $quantity];
    }            
    else
    {
        echo "Invalid input<br/>";
        $check = false;
    }
}

function data($array)
{
    global $check;

    foreach($array as $name => $count)
        insert($name, $count);

    result($check);
}

function insert($dbname, $dbcount)
{
    global $check;
    $check = false;

    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = "web_tech";
    $tablename = "product_data";
    $field1 = "product";
    $field2 = "quantity";

    $insert = "insert into $tablename ($field1, $field2) values ('$dbname', '$dbcount')";

    $database = new mysqli($servername, $username, $password, $databasename);

    if ($database->connect_error)    
        die("Could not connect to database<br/>" . $database->conncet_error);

    if($database->query($insert) === true)
        $check = true;
    else
        die("Could not execute insertion!<br/>" . mysqli_error($database));

    $database->close();
}

function result($success)
{
    if ($success)
    {
        print("Record inserted successfully!<br/>");
        echo("Thank you!<br/>");
    }

    echo "<a href=\"index.html\">Previous Page</a>"; 
}

$cart = [];
$check = true;

addcart("A", $_POST["quantityA"]);
addcart("B", $_POST["quantityB"]);
addcart("C", $_POST["quantityC"]);

if ($check)
    data($cart);

?>
</body>

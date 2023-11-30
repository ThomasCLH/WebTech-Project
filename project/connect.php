<html>
<head>
    <title>Thank You</title>
</head>
<body>
<?php

function data($product, $price)
{
    if ($product != "" && $price != "")
    {
        echo "$product: $price<br/>";
        insert($product, $price);
    }
    else
        echo "Invalid input<br/>";
}

function insert($value1, $value2)
{
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "web_tech";
    $table = "cart_data";
    $field1 = "product";
    $field2 = "price";

    $insert = "insert into $table ($field1, $field2) values ('$value1', '$value2')";

    $database = new mysqli($server, $user, $password, $db);

    if ($database->connect_error)    
        die("Could not connect to database<br/>" . $database->conncet_error);

    if($database->query($insert) === true)
        result();
    else
        die("Could not execute insertion!<br/>" . mysqli_error($database));

    $database->close();
}

function result()
{    
    print("Record inserted successfully!<br/>");
    echo("Thank you!<br/>"); 
}

data($_POST["product"], $_POST["price"]);

echo "<a href=\"cart.html\">Previous Page</a>";

?>
</body>
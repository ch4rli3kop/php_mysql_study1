<?php
$conn = mysqli_connect('localhost', 'root', '971224');
mysqli_select_db($conn, 'opentutorials');
$name = mysqli_real_escape_string($conn, $_GET['name']);
$password = mysqli_real_escape_string($conn, $_GET['password']);

$sql = "SELECT * FROM user WHERE name='".$name."' AND password='".$password."'";
echo $sql;
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    if($result->num_rows == "0"){
        echo "get away!";
    } else {
        echo "hihi";
    }
    ?>
</body>
</html>
<?php
$name = $_POST['name'];
$number = $_POST['number'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$something = $_POST['something'];

//database connection
$conn = new mysqli('localhost','root','','test');
if ($conn->connect_error) {
    die('connection failed: ' . $conn->connect_error);}
else {
    $stmt = $conn->prepare("insert into register(name,number,gender,address,something) values(?,?,?,?,?)");
    $stmt->bind_param("sisss",$name,$number,$gender,$address,$something);
    $execval=$stmt->execute();
    echo $execval;
    echo "registration successful";
    $stmt->close();
    $conn->close();
}

?>
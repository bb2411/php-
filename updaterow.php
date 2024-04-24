<?php 
header("Content-type:application/json");
$rowid=$_REQUEST['rowid'];
$username=$_REQUEST['username'];
$password=$_REQUEST['password'];
$conn=new mysqli("localhost","root","root","phppractice");
if($conn->query("update user_lec set username='$username',password='$password' where username='$rowid'")){
    echo json_encode(['msg'=>"updated"]);
}else{
    echo json_encode(['msg'=>"something went wrong"]);
}
?>
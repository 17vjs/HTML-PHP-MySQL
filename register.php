<?php
error_reporting( error_reporting() & ~E_NOTICE );

$servername="localhost";
$username="root";
$password="";
$dbname="phptraining";

$conn= new mysqli($servername,$username,$password,$dbname);

$uname=$_POST["uname"];
$pass=$_POST["pass"];
$address1=$_POST["address1"];
$address2=$_POST["address2"];
$city=$_POST["city"];
$state=$_POST["state"];
$zip=$_POST["zip"];
$ch=$_POST["check"];
$insert=$_POST["insert"];
$select=$_POST["select"];
$update=$_POST["update"];
$delete=$_POST["delete"];
if($conn->connect_error){
echo "Connection error "."<br>"; 
}else{
echo "Connection successful"."<br>";
$query="create table users(uname varchar(255) primary key,pass varchar(255),address1 varchar(255),address2 varchar(255),city varchar(255), state varchar(255),zip int,ch varchar(255));";
if($conn->query($query)==TRUE){
echo "table created "."<br>";
}else{
echo $conn->error."<br>";
}

if($insert==TRUE){
$query="insert into users values('$uname','$pass','$address1','$address2','$city','$state','$zip','$ch')";
if($conn->query($query)==TRUE){
echo "Insert successful "."<br>";
}else{

echo $conn->error."<br>";
}
}

if($select==TRUE){
if($uname==TRUE){
$query="select * from users where uname='$uname'";}
else{
$query="select * from users";
}
$result=$conn->query($query);
if($result->num_rows>0){
while($row=$result->fetch_assoc()){
echo $row["uname"]."<br>".$row["pass"]."<br>".$row["address1"]."<br>".$row["address2"]."<br>".$row["city"]."<br>".$row["state"]."<br>".$row["zip"]."<br>".$row["ch"]."<br>";
}

}else{
echo "No records found"."<br>";
}
}

if($delete==TRUE){
$sqlquery="delete from users where uname='$uname'";
if($conn->query($sqlquery)==TRUE){
echo "Record deleted successfully<br>";
}else
echo $conn->error."<br>";
}

if($update==TRUE){
$sqlquery="update users set pass='$pass' where uname='$uname'";
if($conn->query($sqlquery)==TRUE){
echo "Record updated successfully"."<br>";
}else
echo "Record updation failed".$conn->error."<br>";
}

}

?>
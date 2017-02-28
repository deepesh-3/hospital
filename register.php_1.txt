<?php
require('connect.php');

$query = "INSERT INTO formdata (`first_name`, `last_name`, `depts`,
        `email`, `telephone`, `symptoms`) VALUES ('".$_POST['first_name']."', '".$_POST['last_name']."','".$_POST['depts']."','".$_POST['email']."','".$_POST['telephone']."','".$_POST['symptoms']."')";
$result = mysqli_query($connection, $query);
if(!$result) die("Query failed".mysql_error());
?>
<html>
<head>
<title>Y.D. Patel Hospital</title>
<style>
.center {
    margin-left: auto;
    margin-right: auto;
    width: 80%;
    background-color: lightgrey;

.center1 {
    margin-left: auto;
    margin-right: auto;
    width: 70%;
    background-color: white;
}

div {
    background-color: lightgrey;
    width: 1000px;
    padding: 40px;
    border: 25px red;
    margin-left: auto
    margin-right: auto;
}
p{ background-color:#D00000 align:"center" }
a{ color:#000000 align:"center" ;}
 ul{
        padding: 0;
        list-style: none;
    }
    ul li{
        float: left;
        width: 100px;
        text-align: center;
        line-height: 21px;
    }
    ul li a{
        display: block;
        padding: 5px 10px;
        color: #333;
        background: #f2f2f2;
        text-decoration: none;
    }
    ul li a:hover{
        color: #fff;
        background: #939393;
    }
    ul li ul{
        display: none;
    }
    ul li:hover ul{
        display: block; /* display the dropdown */
    }
</style>
</head>
<body background="pic.jpg">
<center>
<h1>
<font face="BankGothic Md BT" color=ffff66><marquee>Registration complete</marquee></font>

</h1>
</center>
</font>
</body>
</html>

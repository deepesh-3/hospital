
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
<font face="BankGothic Md BT" color=ffff66><marquee>Welcome to Y.D. Patel Hospital</marquee></font>

</h1>
</center>

<p><font face="BankGothic Md BT" color=black>
  <ul class="center">
        <li><a href="Home.html">Home</a></li>
        <li><a href="About us.htm">About</a></li>
        <li>
            <a href="#">Departments&#9662;</a>
            <ul>
                <li><a href="Surgery.html">Surgery</a></li>
                <li><a href="Ped.html">Pediatrics</a></li>
                <li><a href="Ortho.html">Orthopedics</a></li>
                <li><a href="ent.html">E.N.T.</a></li>
</ul>
        </li>
     
         <li><a href="Contact.html">Contact us</a></li>
    </ul>
</font>
</p>
 <div class="center" align="justify" style="top:20px; border:10px lightgrey;"><h2><center><font color="red"><br/><br/><br/>Appointment Form</font></center></h2>

<font color=0000cc face="BankGothic Md BT" size=3>
<form name="Appointment Form" method="post"  action="register.php">
<table width="500px">

&nbsp  <label>Patient's First Name *<br/></label>


 &nbsp  <input  type="text" name="first_name" maxlength="50" size="30">

 
<br/><br/>

&nbsp   <label>Patient's Last Name *<br/></label>

&nbsp   <input  type="text" name="last_name" maxlength="50" size="30">

<br/><br/>

&nbsp   <label>Gender *</label>


  &nbsp <label><input  type="radio" name="act" value="Male"/>Male</label>
 &nbsp  <label><input  type="radio" name="act" value="Female"/>Female</label>

<br/><br/>
&nbsp   <label>Doctor *<br/></label>

 &nbsp  <select name="depts">
<option>Dr.Ramesh Shetty(Surgery)</option>
<option>Dr.Suresh Patel(Pediatrics)</option>
<option>Dr.Abhirup Bhattacharya(Orthopedics)</option>
<option>Dr.Aman Chintagada(E.N.T.)</option>
</select>
</br><br/>

 &nbsp  <label >Email Address *<br/></label>
  &nbsp <input  type="text" name="email" maxlength="80" size="30">
<br/><br/>

&nbsp   <label>Telephone Number</br></label>
&nbsp   <input  type="text" name="telephone" maxlength="30" size="30">
<br/></br>
&nbsp   <label>Symptoms *<br/></label>


&nbsp   <textarea  name="symptoms" maxlength="1000" cols="25" rows="6"></textarea>

 <br/><br/>
 &nbsp&nbsp &nbsp   <input type="submit" value="Submit"><br/><br/>
</font>

</form>

</div> 

</body>
<style>
p{ background-color:#D00000 align:"center" }
a{ color:#000000 align:"center" ;}
 ul{
        padding: 0;
        list-style: none;
    }
    ul li{
        float: left;
        width: 266.6px;
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
</html>

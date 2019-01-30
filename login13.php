<!DOCTYPE html>
<html>
<head>

<style>

body
{

 background-size: 100%;
	
	

}
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}
h1
{
  text-decoration-color: red;
  color: red;

}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
table{
	 position: absolute;
    left: 700px;
    top: 250px;
    table-layout: 
}
</style>
</head>
<body
 background ="C:\Users\Vineet Agarwal\city-clipart-1.png">
<h1><center>ATTENDENCE AND PAYROLL MANAGEMENT SYSYEM</center></h1>
<TABLE>
<tr>
	<th>
<a href="file:///G:/project/login2.html"><button class="button" style="vertical-align:middle" id="button1"><span>LOGIN AS ADMIN </span>
</button></a></th></tr>
<tr>
	<th>
<a href="file:///G:/project/login4.html"><button class="button" style="vertical-align:middle" id="button2"><span>LOGIN AS WORKER </span>
</button></a></th></tr>
</TABLE>
</body>
</html>

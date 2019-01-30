<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="of.png" type="image/x-icon sizes="16x16"">
<title>
EAMS</title>
<style>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>

body
{


}
.button {
  display: inline-block;
  border-radius: 25px;
  background-color:#3ac46d;
  border:none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
   box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
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
<body background="maxresdefault.jpg" alt="building_image"  style="width:100%;height:100%;">
  <h1 align="center">ATTENDANCE AND PAYROLL MANAGEMENT</h1>
<table>
<tr>
	<th>
<a href="admin.php"><button class="button" style="vertical-align:middle" id="button1"><span>LOGIN AS ADMIN </span>
</button></a></th></tr>
<tr>
	<th>
<a href="employeelogin.php"><button class="button" style="vertical-align:middle" id="button2"><span>LOGIN AS WORKER </span>
</button></a></th></tr>
</table>
</body>
</html>

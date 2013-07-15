<html>
<body>
<?php

require_once('../library/odf.php');
require_once('database.php');

$odf = new odf("certnew.odt");

$col = $_POST["clg"];
$red = $_POST["cls"];
$pink = $_POST["ppp"];
$jot = $_POST["and"];
$yad = $_POST["img"];
$clg = $_POST["lib"];
$dat = $_POST["text"];
$var1 = $_POST["abc"];
$var2 = $_POST["tcc"];
$var3 = $_POST["class"];
$var4 = $_POST["nik"];
$var5 = $_POST["foo"];
$var6 = $_POST["abb"];

$odf -> setVars('title',$col);
$odf -> setVars('content',$red);
$odf -> setVars('text',$pink); 
$odf -> setVars('other',$jot);
$odf -> setVars('sub',$yad);
$odf -> setVars('heading',$clg);
$odf -> setVars('date',$dat);
$odf -> setVars('sign1',$var1);
$odf -> setVars('sign2',$var2);
$odf -> setVars('sign3',$var3);
$odf -> setVars('op1',$var4);
$odf -> setVars('op2',$var5);
$odf -> setVars('op3',$var6);
$odf->saveToDisk("aaa.odt");
echo "File Saved";

?>
<form action="ODTcertificate.php" method="post" enctype= "multipart/form-data">

Sal<input type="text" name="First"><br>
First Name <input type="text" name="Firstname"><br>
Middle Name <input type="text" name="mname"><br>
Last Name <input type="text" name="lname"><br>
institute <input type="text" name="ins"><br>
City <input type="text" name="cc"><br>
State <input type="text" name="st"><br>
<input type="file" name="pik"><br>
<input type="submit" name="submit" value="Submit">

</form>
</body>
</html>





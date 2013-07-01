<?php

require_once('../library/odf.php');
require_once('database.php')
;
$odf = new odf("certnew.odt");

$VAR = 0;
$Sal = $_POST["First"];
$Firstname = $_POST["Firstname"];
$Middlename = $_POST["mname"];
$Lastname = $_POST["lname"];
$institute = $_POST["ins"];
$City = $_POST["cc"];
$State = $_POST["st"];
$Photo = $_POST["pik"];
$col = $_POST["clg"];
$red = $_POST["cls"];
$pink = $_POST["ppp"];
$jot = $_POST["and"];
$yad = $_POST["img"];
$clg = $_POST["lib"];
$dat = $_POST["text"];

$odf -> setVars('title',$col);
$odf -> setVars('content',$red);
$odf -> setVars('text',$pink); 
$odf -> setVars('other',$jot);
$odf -> setVars('sub',$yad);
$odf -> setVars('heading',$clg);
$odf -> setVars('date',$dat);

$check = mysql_query("SELECT * FROM certificates");
while($row = mysql_fetch_array($check))
{
if($Sal == $row['sal'] && $Firstname == $row['1st_name'] && $Middlename == $row['middle_name'] && $Lastname == $row['last_name'] && $institute == $row['institute'] && $City == $row['city'] && $State == $row['state'] && $Photo == $row['photo'])
{
$VAR++;
}
}
if($VAR == 0)
{
mysql_query("INSERT INTO certificates VALUES('$Sal','$Firstname','$Middlename','$Lastname','$institute','$City','$State','$Photo')");
}






// My work
$article = $odf->setSegment('articles');
$result = mysql_query("SELECT * FROM certificates WHERE Sal='$Sal' AND 1st_name='$Firstname' AND middle_name='$Middlename' AND last_name='$Lastname' AND institute='$institute' AND City='$City' AND State='$State' AND Photo='$Photo'");
while($row = mysql_fetch_array($result))
{
	
		 //image

                $pic = "Photos/" . $row['photo'].".jpg";
                $article->setImage('pic',$pic,3,3);
		
		//name
                if($row['middle_name']==NULL)
		         $article->nameArticle(" ".$row['sal']." ".$row['1st_name']." ".$row['last_name']);
		else
                         $article->nameArticle(" ".$row['sal']." ".$row['1st_name']." ".$row['middle_name']." ".$row['last_name']); 
		//department
		$article->deptArticle($row['institute'].", ".$row['city']);
	
	$article->merge();			
}	

$odf->mergeSegment($article);

// We export the file
$odf->exportAsAttachedFile();
//$odf->exportAsAttachedPDF("Certificate"); 
?>

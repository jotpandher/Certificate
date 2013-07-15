<html>
<body>
<?php

require_once('../library/odf.php');
require_once('database.php');

$odf = new odf("aaa.odt");

//Selecting the user entered data from database and replacing with the tags in odt document. 

$result = mysql_query("SELECT * FROM `csv`");

$article = $odf->setSegment('articles');
while($row = mysql_fetch_array($result))
{
	
		 //image
            
                $pic = "Photos/" . $row['photo'].".jpg";
		if(!file_exists($pic))
                  {
                  $pic = "Photos/h.jpeg";
                 }

                $article->setImage('pic',$pic,4,4);
		
		//name
                if($row['middle_name']==NULL)
		         $article->nameArticle(" ".$row['sal']." ".$row['first_name']." ".$row['last_name']);
		else
                         $article->nameArticle(" ".$row['sal']." ".$row['first_name']." ".$row['middle_name']." ".$row['last_name']); 
		//department
		$article->deptArticle($row['institute'].", ".$row['city']);
	
	$article->merge();			
}	

$odf->mergeSegment($article);


// We save the file
$odf -> saveToDisk("cert.odt"); 
?>
<form action="cert.odt">
<input type="submit" value="Download ODT">
</form>

<form action="pdf.php">
<input type="submit" value="Download PDF">
</form>

<form action="index.html">
<input type="submit" value="Goto First Page">
</form>

</body>
</html>

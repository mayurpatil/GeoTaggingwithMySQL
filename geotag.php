<?php
 // just so we know it is broken
 error_reporting(E_ALL ^ E_DEPRECATED);
 // some basic sanity checks

     //connect to the db
    $con=mysql_connect('us-cdbr-iron-east-03.cleardb.net','b5ad0b67d00075','5ab48235')  or die ("Con Error".mysql_error());
    mysql_select_db('ad_490fe8dc6588505',$con);
     // get the image from the db
     $sql = "SELECT OfficeAddress, Mobile FROM GeoTag WHERE OfficeName ='" .$_GET['oname']."'";

     // the result of the query
     $result = mysql_query("$sql") or die("Invalid query: " . mysql_error());
     
	$row = mysql_fetch_array($result);
	//echo "<html><center>";
	
	$res=$row["OfficeAddress"]."@$#".$row["Mobile"];
    echo $res;
	//echo "</center></html>";
     // close the db link
     mysql_close($con);
 
?>

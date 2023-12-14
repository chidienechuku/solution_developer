<?php
    session_start();
require_once "../config.inc.php";
require_once "facility.inc.php";
$id = $_SESSION['id'];
$access=$_SESSION["access"];
$branch= $_SESSION['branch']; 
$dbh=fncOpenDBConn("tubmandb");
$num = $_POST['ticket'];
$today = date('Y-m-d');
$ccname= "Tubman University Intranet ";
		 $ccemail = "billing.system@tubmanu.edu.lr";
			   $toname =str_replace('@',' ',$row['name']);
			     $c = "SELECT a.requestby, a.id, c.name, c.email FROM facilityjobs a, staff c WHERE c.id=a.requestby and a.id='$num' LIMIT 1";
				 $r = mysql_query($c) or die(mysql_error());
				 $row1 = mysql_fetch_array($r);
				 $toname =  str_replace('@',' ',$row1['name']);
				 $email = $row1['email'];
				 $res=fncTicketReject($toname,$email,$ccname,$ccemail,$num);

$update = "update facilityjobs set status='RJ', rejectdate='$today', rejectby='$id' where id = '$num'";
$res = mysql_query($update);
if (!$res) {
    echo "Query did not run";
    exit;
}
?>
<script>alert("Facility help rejected with system update")</script>
<script>navigate("approve_jobs.php")</script>

<?php
  session_start();
require_once "../config.inc.php";
include "facility.inc.php" ;
$statacess= $_SESSION['stataccess'];
$id = $_SESSION['id'];
$access=$_SESSION["access"];
$branch= $_SESSION['branch']; 
$dbh=fncOpenDBConn("tubmandb");
$data = getjobrequest($id);
//$data = getstatAccessacfcstaff($id);

?>
<head>
        <title>Tubman University Intranet -- Facility Help system</title>
    </head>
    <body>
        <table border=0 width="100%" id=table1 cellspacing=0 cellpadding=0>
            <tr height=10>
                <td bgcolor=#336600>
                    <img border=0 src=../img/TU_logo_whit.gif></td>
                <td bgcolor=#336600 valing=bottom><p align=right>
                    <a target=_top href=../logout.php><b>
                    <font size="2" color="#88B1F" face="Century Schoolbook">
                    Logout&nbsp;&nbsp;
                    </font></b></a></p></font>
                 </td>
            </tr>
            <tr>
                <td valign=top colspan=2 bgcolor="#66cc66">
                    
                    <font size="2" color="#FFFFFF" face="Century Schoolbook">
                    HOME  
                    </font>
                   
                    <font size="2" color="#FFFFFF" face="Century Schoolbook">
                    -> 
                    </font>
                    <a href=main.php> 
                    <font size="2" color="#FFFFFF" face="Century Schoolbook">
                    Facility Help System 
                    </font>
                     </a>  
                </td>
            </tr>
        </table>
        <br>
        <?php
        $num = $data[0][0];
         if ($num < 1){
     echo "<br><br><font size=4 color=#336600 face='Century Schoolbook'>There are no facility help request to approve." ?> 
     
   <?php
 
 }
 
 else {
echo "<br><br><font size=4 color=#336600 face='Century Schoolbook'>Find below facility help requests to approve.
<br><br><table border=1 style='border-collapse: collapse'>
        <tr bgcolor=#336600 >
                 <td ><font size=2 color=#FFFFFF face='Century Schoolbook'>Line #</td>
                                 <td ><font size=2 color=#FFFFFF face='Century Schoolbook'>Ticket Number</td> 
                <td ><font size=2 color=#FFFFFF face='Century Schoolbook'>Requested By</td>
                    <td><font size=2 color=#FFFFFF face='Century Schoolbook'>Requested Date</td>
                        <td><font size=2 color=#FFFFFF face='Century Schoolbook'>Job Description</td>
                                
                                    <td><font size=2 color=#FFFFFF face='Century Schoolbook'>Requesting Division</td>
                                    
                                     <td><font size=2 color=#FFFFFF face='Century Schoolbook'>days</td>
                                                    <td><font size=2 color=#FFFFFF face='Century Schoolbook'>Reject</td>
                                                    <td><font size=2 color=#FFFFFF face='Century Schoolbook'>Approve</td>
        </tr>"  ;
        $j=1;                                     
for ($i=1; $i<=$data[0][0]; $i++) {
    $ticket = $data[$i][0];
    $screen = $data[$i][6];
    $dumpsc = "screenshots".$screen;
    
    echo "<tr>
             <td><font size=2 color=#336600 face='Century Schoolbook'>".$j."</td>
            <td><font size=2 color=#336600 face='Century Schoolbook'>".$data[$i][0]."</td>
            <td nowrap><font size=2 color=#336600 face='Century Schoolbook'>".str_replace('@', " ",$data[$i][4])."</td>
            <td><font size=2 color=#336600 face='Century Schoolbook'>".$data[$i][2]."</td>
            <td><font size=2 color=#336600 face='Century Schoolbook'>".$data[$i][1]."</td>
           
            
            <td><font size=2 color=#336600 face='Century Schoolbook'>".$data[$i][5]."</td> " ;
            echo "  <td><font size=2 color=#336600 face='Century Schoolbook'>".$data[$i][7]."</td> 
            <td valign=center><font size=2 color=#336600 face='Century Schoolbook'><form action=approve_jobs1.php method=post>
            <input type=hidden value='$ticket' name=ticket />
             <input type=submit value='Reject'></form></td>
                    <td valign=center><font size=2 color=#336600 face='Century Schoolbook'><form action=approve_jobs2.php method=post>
            <input type=hidden value='$ticket' name=ticket />
              <input type=submit value='Approve'></form></td>
           </tr> ";
           $j++;
}
echo "</table>" ;
 }
 
   
   ?>                                 

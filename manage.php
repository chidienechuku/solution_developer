<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Facility Management</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
	<link href="css/custom.css" rel="stylesheet">
	<link href="css/main8.css" rel="stylesheet">
  <link href="css/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/css/style.css" rel="stylesheet">
	
	
	<link href="css/css/addons/datatables.min.css" rel="stylesheet">
	
</head>
</head>
<?php

include "facility.inc.php";
	

	$id=$_SESSION['id'];
	$access=$_SESSION["access"];
	$acarray=explode("%",$access);
	$access2=fncGetAccess2("afcm",$id);
	$_SESSION["access2"]=$access2;
	$ac2array=explode("%",$access2);		
	$name=fncGetICTStaffName($id);	
	$records = fncGetAllOpenJobs();
	
echo "<TITLE>WFP South Sudan Intranet - Facility Management</title>
		
				</HEAD>				
				<body>				
	  				<table border=0 width=\"100%\" id=table2  bgcolor= #1f90ff cellspacing=0>
					<tr>
						<td bgcolor=#1f90ff>
							<img border=0 src=../img/WFP_logo_white.gif ></td>
						<td bgcolor=#1f90ff>&nbsp;</td>
					</tr>
				</table>";
?>

<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color">

  <!-- Navbar brand -->
  <a class="navbar-brand" href="#"></a>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
		
		<li class="nav-item">
			<a class="nav-link" href="main.php">Home</font></a></li><?php
						if (in_array("FZ",$ac2array)){
						?>							
						
						<li class="active"><a class="nav-link" href="manage.php" style="font-size:17px">Manage Request(s)</a></li>
						<li><a class="nav-link" href="reports.php" style="font-size:17px">Reports</a></li>
						<li><a class="nav-link" href="facility_category.php" style="font-size:17px">Configuration</a></li>
						<li><a class="nav-link" href="archive.php" style="font-size:17px">Completed Tickets</a></li>							
						<?php
						}
						?>
						
		<li><a class="nav-link" href="../logout.php" style="font-size:17px">Logout</a></li>	
     
    </ul>
    <!-- Links -->

    <form class="form-inline">
      <div class="md-form my-0">
       <!-- <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">-->
		  <font color=white>Welcome: <b><?php echo $name; ?></font>
      </div>
    </form>
  </div>
  <!-- Collapsible content -->

</nav>
<!--/.Navbar-->
<body><br>
	<h4>Facility Job Management</h4><br>
<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Job #

      </th>
      <th class="th-sm">Requestor

      </th>
      <th class="th-sm">Index Number

      </th>
      <th class="th-sm"># of Days

      </th>
      <th class="th-sm text-center">Assign

      </th>
      <th class="th-sm text-center">Update

      </th>
    </tr>
  </thead>
  <tbody>
<?php
	  $today = strtotime(date('Y-m-d'));
	  for ($i=1;$i<=$records[0][0];$i++){
		  $jdate = strtotime(htmlspecialchars($records[$i]["jdate"]));
				$now = $today-$jdate;
				$now = floor($now/(60*60*24));
		  if ($now >=10){ $now= "<b><p style='color:red;'>".$now."</p></b>"; }
				
		echo "<tr>
		  <td>".$records[$i]['id']."</td>
		  <td>".$records[$i][1]."</td>
		  <td>".$records[$i]['indexnumber']."</td>
		  <td>".$now."</td>
		  <td style='text-align:center !important'>" ?><a href="manage.php?ida=<?php echo $records[$i]["id"]; ?>"><span class="fas fa-user-tag"></span></a></td>
		  <td style='text-align:center !important'>
			<a href="manage.php?upda=<?php echo $records[$i]["id"]; ?>">
			<?php if ($records[$i]["picture"] == "images/assigned.jpg"){ ?>
				<img src="images/update.jpg" height="30" width="30" ></span></a>
	 <?php
		}
		echo "</td></tr>";
	  }
	  ?>
    
  </tfoot>
</table>
	

 
  
<?php
if (isset($_GET['upda'])){
			$type = $_GET['upda'];
			$info = fncGetStaffInfo($type);
			$jobinfo = fncGetJobInfo($type);
			$adminstaff = fncGetAdminStaff();
			//echo $adminstaff[0][0];
			//exit;
			
	?>
	
	<script>
		function VerifyForm(fmr){
										
						var msg="";
					 	var ok=1;
						if ((form2.status.value.length==0) || (form2.status.value==null)){
							msg = msg + "Status is not selected.\r\n";
							ok=0;
						}
						if ((form2.comments.value.length==0) || (form2.comments.value==null)){
							msg = msg + "Resolution comment is required.\r\n";
							ok=0;
						}
						if (ok==0){
							msg = "Error(s) found! \r\n" + msg;
							alert (msg);	
							document.getElementById("loadinga").style.visibility = "hidden";								
							return false;
						}
						
							  document.getElementById("loadinga").style.visibility = "visible"; 
							
		}
	</script>
<script type="text/javascript" src="datepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="datepicker.css">
<script src="js/jquery-2.1.1.min.js"></script>
</body>
<<!-- Modal: modalPoll -->
<div class="modal fade right" id="modalPoll-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading lead">Update Job Form
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
        	<font size=2 color=#336600>After updates notification will be send to the requestor of the update.<br></font>
						<form class="form-horizontal" role="form" name=form2 action=assign_jobs2.php method=post onSubmit="return VerifyForm(this);"><br>
						<table class="table-sm">
							<tr>
								<td class="fontsize" nowrap>Staff Name: </td>
								<td class="fontsize"><b><?php echo $info["NAME"]; ?><b></b></td>										
							</tr>
							<tr>
								<td class="fontsize">Duty Station: </td>
								<td class="fontsize"><b></b><?php echo $info["station"]; ?></b></td>										
							</tr>
							<tr>
								<td class="fontsize">Unit: </td>
								<td class="fontsize"><b><?php echo $info["AREA"]; ?></b></td>										
							</tr>
		  					<tr>
								<td class="fontsize">Title: </td>
								<td class="fontsize"><b><?php echo $info["title"]; ?></b></td>										
							</tr>
		  					<tr>
								<td class="fontsize">Request Category: </td>
								<td class="fontsize"><b><?php echo $jobinfo["category"]; ?></b></td>										
							</tr>
		  					<tr>
								<td class="fontsize">Request Type: </td>
								<td class="fontsize"><b><?php echo $jobinfo["listing"]; ?></b></td>										
							</tr>
		  					<tr>
								<td class="fontsize">Additional Request: </td>
								<td class="fontsize"><b><?php echo $jobinfo["description"]; ?></b></td>										
							</tr>
		 					<tr>
								<td class="fontsize" nowrap>Request Date/Time: </td>
								<td class="fontsize"><b><?php $date2 = date_create($jobinfo["jdate"]);	echo date_format($date2, 'j F Y')." ".$jobinfo["time_in"]; ?></b></td>										
							</tr>
		  					<tr>
								<td class="fontsize" nowrap>House / Office: </td>
								<td class="fontsize"><b><?php echo $jobinfo["rm_number"]; ?></b></td>										
							</tr>
		  					<tr>
								<td class="fontsize" nowrap>Assigned To: </td>
								<td class="fontsize"><b><?php echo fncGetICTStaffName($jobinfo["assign_to"]); ?></b></td>										
							</tr>
		  					<tr>
								<td class="fontsize" nowrap>Completion Date: </td>
								<td class="fontsize"><input type=text name="cdate" class='datepicker form-control'>	</td>										
							</tr>
		  					<tr>
								<td class="fontsize" nowrap>Status: </td>
								<td class="fontsize"><select name=status id="stat">
												<option value=''></option>
												<option value='C'>Close</option>
												<option value='P'>Park</option>												
											</select></td>										
							</tr>
		  					<tr>
								<td class="fontsize" nowrap>Material Used: </td>
								<td class="fontsize"><input type=checkbox name=mat value='In Stock' id=mat> In stock &nbsp;&nbsp;&nbsp;&nbsp;<input type=checkbox name=mat value='In Stock' id=po> Purchase Order		</td>										
							</tr>
						</table>
							
								<p style="font-size:10px"><b>Materials / Spare Used</b></p>
								<?php
								$adminitems = fncGetFacilityItems($type);
	
									echo "							
										<td>
									<div id=\"listingag\">
									<div id=listingg><font size=1>
									<table>
										";
									for($k=1; $k <= $adminitems[0][0]; $k++) {
										$s = $adminitems[$k][0];
										
											echo "<tr><td style='font-size:10px'>".$s."</td><td style='font-size:10px'> <input type=hidden name=item$k value='$s' />
															<input type=text name=qty$k  maxlength=4/></td></tr>
												
												";
									}
									echo "<input type=hidden name=itemnumber value='".$adminitems[0][0],"'/>";
								?>
								</table>
	  
	  							<table>
	  								<tr>
										<td class="fontsize">Purchase:</td>
										<td class="fontsize"><select name=ptype class="form-control" />
												<option value=''></option>
												<option value="PO">Purchase Order</option>
												<option value="PT">Petty Cash</option>
											</select></td>
									</tr>
	  								<tr>
										<td class="fontsize">Reference Number:</td>
										<td class="fontsize"><input type=text name=number class=form-control /></td>
									</tr>
									<tr>
										<td class="fontsize">Comments:</td>
										<td class="fontsize"><textarea name=comments class=form-control cols=100 rows=5 /></textarea></td>
									</tr>
									<tr>
										<td class="fontsize">Resolution:</td>
										<td class="fontsize"><textarea name=des class=form-control cols=100 rows=5 /></textarea></textarea></td>
									</tr>
	  							</table>
									
      						</div>
							<input type=hidden name=jobid value='<?php echo $type; ?>'/>
      <!--Footer-->
      <div class="modal-footer justify-content-center">
        <input type="submit" value="Update Job"/>
          <i class="fa fa-paper-plane ml-1"></i>
        </a>
        <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Cancel</a>
      </div>
    </div>
  </div>
</div>
<!-- Modal: modalPoll -->

<!-- Button trigger modal -->

<?php
}
if (isset($_GET['ida'])){
			$type = $_GET['ida'];
			$info = fncGetStaffInfo($type);
			$jobinfo = fncGetJobInfo($type);
			$adminstaff = fncGetAdminStaff();
			//echo $adminstaff[0][0];
			//exit;
	?>
<style>
	body .modal-dialog {
				/* new custom width */
				width: 50%;
				height: auto;
				
				/* must be half of the width, minus scrollbar on the left (30px) */
				
			}
		#loading {
			display:none;
	}
	</style>
	<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body mx-3">
					<font size=2 color=#336600>Update Job Request</font><br>
						<font size=2 color=#336600>After updates notification will be send to the requestor of the update.</font><br>
						<form class="form-horizontal" role="form" name=form1 action=assign_jobs1.php method=post onSubmit="return verify(this);"><br>
								<table class="table-sm">
									<tr>
										<td class="fontsize" nowrap>Staff Name: </td>
										<td class="fontsize"><b><?php echo $info["NAME"]; ?><b></b></td>										
									</tr>
									<tr>
										<td class="fontsize">Duty Station: </td>
										<td class="fontsize"><b></b><?php echo $info["station"]; ?></b></td>										
									</tr>
				  					<tr>
										<td class="fontsize">Unit: </td>
										<td class="fontsize"><b><?php echo $info["AREA"]; ?></b></td>										
									</tr>
									<tr>
										<td class="fontsize">Title: </td>
										<td class="fontsize"><b><?php echo $info["title"]; ?></b></td>										
									</tr>
									<tr>
										<td class="fontsize">Request Category: </td>
										<td class="fontsize"><b><?php echo $jobinfo["category"]; ?></b></td>										
									</tr>
									<tr>
										<td class="fontsize">Request Type: </td>
										<td class="fontsize"><b><?php echo $jobinfo["listing"]; ?></b></td>										
									</tr>
									<tr>
										<td class="fontsize">Additional Request: </td>
										<td class="fontsize"><b><?php echo $jobinfo["description"]; ?></b></td>										
									</tr>
									<tr>
										<td class="fontsize" nowrap>Request Date/Time: </td>
										<td class="fontsize"><b><?php $date2 = date_create($jobinfo["jdate"]);	echo date_format($date2, 'j F Y')." ".$jobinfo["time_in"]; ?></b></td>										
									</tr>
									<tr>
										<td class="fontsize" nowrap>House / Office: </td>
										<td class="fontsize"><b><?php echo $jobinfo["rm_number"]; ?></b></td>										
									</tr>
				  					<tr>
										<td class="fontsize" nowrap>Maintenance Type: </td>
										<td class="fontsize"><select name=mtype class="form-control" id="mtypea" >
										<option value=''></option>
										<option value='Routine Maintenance'>Routine Maintenance</option>
										<option value='Minor Repair'>Minor Repair</option>
										<option value='Work Request/Project'>Work Request/Project</option>
										<option value='Event Support'>Event Support</option>
									</select>	</td>										
									</tr>
				  					<tr>
										<td class="fontsize" nowrap>Assign To: </td>
										<td class="fontsize"><select name=staff class="form-control" id="staff">
										<option value=''></option>
										<?php
											for ($i=1;$i<=$adminstaff[0][0];$i++){
												echo "<option value='".$adminstaff[$i][0]."'>".$adminstaff[$i][1]."</option>";
											}
										?>										
									</select>	</td>										
									</tr>
				  					<tr>
										<td class="fontsize" nowrap>Priority: </td>
										<td class="fontsize"><select name=rating class=form-control id="rating">
										<option value=''></option>
										<option value='1'>1 High</option>
										<option value='2'>2 Medium</option>
										<option value='3'>3 Low</option>
									</select>	</td>										
									</tr>
							</table>
							
								<p> Upload Picture</p>
									 <?php
									 if ($jobinfo["upload"] != "N/A"){ ?>
									  <img src="uploads/<?php echo $jobinfo["upload"]; ?>" height="400px" width="400px" class="img-responsive">
									<?php
									 }
									 else { echo "<B>NO PICTURE UPLOADED</B>"; }

									?><br>
									<input type=hidden name=jobid value='<?php echo $type; ?>' />
									<input type=hidden name=requestby value='<?php echo $info["NAME"]; ?>' />
									<input type=hidden name=station value='<?php echo $info["station"]; ?>' />
									<input type=hidden name=area value='<?php echo $info["AREA"]; ?>' />
									<input type=hidden name=title value='<?php echo $info["title"]; ?>' />
									<input type=hidden name=type value='<?php echo $jobinfo["listing"]; ?>' />
									<input type=hidden name=description value='<?php echo $jobinfo["description"]; ?>' />
									<input type=hidden name=date value='<?php echo date_format($date2, 'j F Y')." ".$jobinfo["time_in"]; ?>' />
									<input type=submit value='Submit'  id="submit" />
									<input type=reset value="Clear Entry" />
									<input type="button"  value="close" onclick="window.location='manage1.php'">
								
						</div>
						
						 
						</div>
					</div>
			  </div>
			  
			</div>
		  </div>
		</div>


	
		 <?php
		}
?>
<script>
	$(function ($) {	
						$('#centralModalSuccess').modal();
						return false;							
				});
	
</script>
<script type="text/javascript" src="js/js/jquery-3.4.0.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/js/mdb.min.js"></script>
<script type="text/javascript" src="js/js/addons/datatables.min.js"></script>
	<script>
		$(document).ready(function () {
		 	$("#dtBasicExample").DataTable({

					"pagingType": "full_numbers" // "simple" option for Previous and Next buttons only
				  });
				  $(".dataTables_length").addClass("bs-select");
			
			
											
		});
		<?php
		if (isset($_GET['upda'])){?>
		$(document).ready(function () {
		 	
			$('#modalPoll-1').modal();
			return false;
			
											
		});
		<?php
								 
		} 
		if (isset($_GET['ida'])){?>
		$(document).ready(function () {
		 	
			$('#modalLoginForm').modal();
			return false;
			
											
		});
		<?php
		}
		
		?>
			
	</script>
</html>
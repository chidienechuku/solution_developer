<!DOCTYPE html>		
				<html ng-app="myApp" ng-app lang="en">
					<head>
					<meta charset=\"utf-8\">
					<meta name="viewport\" content="width=device-width, initial-scale=1.0">
					<link href="css/bootstrap.min.css" rel="stylesheet">
					<link href="css/custom.css" rel="stylesheet">
					<script type="text/javascript" src="js/respond.js"></script>
					
<?php
session_start();
include "../fncForms.inc.php";
include "facility.inc.php";
if (isset($_SESSION["access"])){	

	$id=$_SESSION['id'];
	$access=$_SESSION["access"];
	$acarray=explode("%",$access);
	//$access2=fncGetAccess2("acna",$id);
	//$_SESSION["access2"]=$access2;
	//$ac2array=explode("%",$access2);		
	$name=fncGetICTStaffName($id);	
	//$reqinfo = fncGetRequestToApproveDetialsCompleted();
	//$joblisting = fncJoblisting();
	//$ict = fndFindICTStaff($id);
	
echo "<TITLE>WFP South Sudan Intranet - Facility Management</title>
		
				</HEAD>				
				<body>				
	  				<table border=0 width=\"100%\" id=table2  bgcolor= #1f90ff cellspacing=0>
					<tr>
						<td bgcolor=#1f90ff>
							<img border=0 src=../img/WFP_logo_white.gif ></td>
						<td bgcolor=#1f90ff>&nbsp;</td>
					</tr>";
		?>
			<tr>
				<td bgcolor="#72b5f8">
					
					<ul class="nav nav-pills">
						<li><a href="main.php"><font size="4">Home</font></a></li>
						<li class="active"><a href="manage.php" style="font-size:17px">Manage Request(s)</a></li>
						<li><a href="reports.php" style="font-size:17px">Reports</a></li>	
						<li><a href="../logout.php" style="font-size:17px">Logout</a></li>						
					</ul>
					</td>
					<td bgcolor="#72b5f8" align=right>
					<font color=white>Welcome: <b><?php echo $name; ?>
			</tr>
            </table>

<div class="container">
	<div class="row">
        <ul class="breadcrumb">
            <li><a href="main.php"><i class="glyphicon glyphicon-home"></i></a></li>
            <li><a href="#">Manage Request(s) </a></li>
        </ul>
	</div>
<div ng-controller="customersCrtl">
<br/>
    <div class="row">
        <div class="col-md-2">PageSize:
            <select ng-model="entryLimit" class="form-control">
                <option>5</option>
                <option>10</option>
                <option>20</option>
                <option>50</option>
                <option>100</option>
            </select>
        </div>
        <div class="col-md-3">Filter:
            <input type="text" ng-model="search" ng-change="filter()" placeholder="Filter" class="form-control" />
        </div>
        <div class="col-md-4">
            <h5>Filtered {{ filtered.length }} of {{ totalItems}} total facility request(s)</h5>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12" ng-show="filteredItems > 0">
			<div class="CSSTableGenerator" >
				<table>
				<td>Job Number&nbsp;<a ng-click="sort_by('name');"><i class="glyphicon glyphicon-sort"></i></a></td>
				<td>Requester&nbsp;<a ng-click="sort_by('name');"><i class="glyphicon glyphicon-sort"></i></a></td>
				<td>Index Number&nbsp;<a ng-click="sort_by('indexnumber');"><i class="glyphicon glyphicon-sort"></i></a></td>
				<td>Email&nbsp;<a ng-click="sort_by('email');"><i class="glyphicon glyphicon-sort"></i></a></td>
				<td>Gender&nbsp;<a ng-click="sort_by('gender');"><i class="glyphicon glyphicon-sort"></i></a></td>
				<td>Assign</td>
				<td>Update</td>
					<tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
						<td>{{data.id}}&nbsp;&nbsp;&nbsp;<img src="{{data.picture}}" height="30" width="30"></td>
						<td>{{data.name}}</td>
						<td>{{data.indexnumber}}</td>
						<td>{{data.email}}</td>
						<td>{{data.gender}}</td>
						<td width=5%><a href="manage.php?ida={{data.id}}"><span class="glyphicon glyphicon-pencil" ></span></a></td>
						<td width=5%><a href="manage.php?upda={{data.id}}"><img src="images/update.jpg" height="30" width="30" ></span></a></td>
					</tr>
				</table>
			</div>
        </div>
        <div class="col-md-12" ng-show="filteredItems == 0">
            <div class="col-md-12">
                <h4>No Staff found</h4>
            </div>
        </div>
        <div class="col-md-12" ng-show="filteredItems > 0">    
            <div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
           
        </div>
    </div>
</div>
<script src="js/angular.min.js"></script>
<<script src="js/ui-bootstrap-tpls-0.10.0.min.js"></script>
<script src="app/app.js"></script>         
				
</table>
<?php
		if (isset($_GET['ida'])){
			$type = $_GET['ida'];
			$info = fncGetStaffInfo($type);
			$jobinfo = fncGetJobInfo($type);
			$adminstaff = fncGetAdminStaff();
			//echo $adminstaff[0][0];
			//exit;
	?>
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
				   <!-- <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
						
							<h4 class="modal-title background" id="myModalLabel">Staff Information and Request.</h4>
						
				  </div>
				  <div class="modal-body">
						<p><font size=4 color=#336600>Update Job Request</font></p>
						<p><font size=4 color=#336600>After updates notification will be send to the requestor of the update.</font></p>
						<form class="form-horizontal" role="form" name=form1 action=assign_jobs1.php method=post>
							<div class="form-group">
								<label class="control-label col-sm-3" for="email">Staff Name:</label>
								<div class="col-sm-9">
									<input type=text name="product" style='font-family: Comic Sans MS; font-size: 14px' class="form-control" disabled value='<?php echo $info["NAME"]; ?>' >
													
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="email">Duty Station:</label>
								<div class="col-sm-9">
									<input type=text name="product" style='font-family: Comic Sans MS; font-size: 14px' class="form-control" disabled value='<?php echo $info["station"]; ?>' >
													
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="email">Unit:</label>
								<div class="col-sm-9">
									<input type=text name="product" style='font-family: Comic Sans MS; font-size: 14px' class="form-control" disabled value='<?php echo $info["AREA"]; ?>' >
													
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="email">Title:</label>
								<div class="col-sm-9">
									<input type=text name="product" style='font-family: Comic Sans MS; font-size: 14px' class="form-control" disabled value='<?php echo $info["title"]; ?>' >
													
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="email">Request Category:</label>
								<div class="col-sm-9">
									<input type=text name="product" style='font-family: Comic Sans MS; font-size: 14px' class="form-control" disabled value='<?php echo $jobinfo["category"]; ?>' >
													
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="email">Request Type:</label>
								<div class="col-sm-9">
									<input type=text name="product" style='font-family: Comic Sans MS; font-size: 14px' class="form-control" disabled value='<?php echo $jobinfo["listing"]; ?>' >
													
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="pwd">Additional Request:</label>
								<div class="col-sm-9"> 
									<textarea name=rem class="form-control" disabled><?php echo $jobinfo["description"]; ?></textarea>	
									
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="email">Request Date:</label>
								<div class="col-sm-9">
								<?php
								$date2 = date_create($jobinfo["jdate"]);								
								?>
									<input type=text name="product" style='font-family: Comic Sans MS; font-size: 14px' class="form-control" disabled value='<?php echo date_format($date2, 'j F Y'); ?>' >
													
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="email">Request Time:</label>
								<div class="col-sm-9">
									<input type=text name="product" style='font-family: Comic Sans MS; font-size: 14px' class="form-control" disabled value='<?php echo $jobinfo["time_in"]; ?>' >
													
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="email">Assign To:</label>
								<div class="col-sm-9">
									<select name=staff class="form-control" id="staff">
										<option value=''></option>
										<?php
											for ($i=1;$i<=$adminstaff[0][0];$i++){
												echo "<option value='".$adminstaff[$i][0]."'>".$adminstaff[$i][1]."</option>";
											}
										?>										
									</select>	
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="email">Priority :</label>
								<div class="col-sm-9">
									<select name=rating class=form-control id="rating">
										<option value=''></option>
										<option value='1'>1</option>
										<option value='2'>2</option>
										<option value='3'>3</option>
									</select>	
								</div>
							</div>
							  <div class="form-group"> 
								<div class="col-sm-3">
								<img id="loading" src="images/download.gif" height=50px width=50px />
								</div>
								<div class="col-sm-9">
									<input type=hidden name=jobid value='<?php echo $type; ?>' />
									<input type=hidden name=requestby value='<?php echo $info["NAME"]; ?>' />
									<input type=hidden name=station value='<?php echo $info["station"]; ?>' />
									<input type=hidden name=area value='<?php echo $info["AREA"]; ?>' />
									<input type=hidden name=title value='<?php echo $info["title"]; ?>' />
									<input type=hidden name=type value='<?php echo $jobinfo["listing"]; ?>' />
									<input type=hidden name=description value='<?php echo $jobinfo["description"]; ?>' />
									<input type=hidden name=date value='<?php echo date_format($date2, 'j F Y')." ".$jobinfo["time_in"]; ?>' />
									<input type=submit value='Submit' class="btn btn-success" id="submit" />
									<input type=reset value="Clear Entry" class="btn btn-warning" />
									<button type="button" class="btn btn-danger" onclick="window.location='manage.php'">Close</button>
								</div>
							  </div>
						</form>
								
				 
				</div>
			  </div>
			</div>
				<script src="js/jquery-2.1.1.min.js"></script>
				<script src="js/bootstrap.min.js"></script>
				<script>
				$(function ($) {	
						$('#myModal').modal();
						return false;							
				});
				</script>
				<script src="jquery-2.0.2.min.js"></script>
				<script>
				$(function() {					
						  $('#loading').hide(); 
						  var msg='';
						  var val=0;
							$("#submit").click(function(){	
								var staff = $("#staff").val();
								if (!staff.trim()){
									val = 1;
									msg = msg + "Assigned staff not selected!\n";
								}
								var rating = $("#rating").val();
								if (!rating.trim()){
									val = 1;
									msg = msg + "Proirity not selected!\n";
								}
								if (val == 1){
									alert(msg);
									return false;
								}
								else { 
									$('#loading').show(); 	
								}
							});
							
					  
				});
		  
		 </script>
		 <?php
		}
		if (isset($_GET['upda'])){
			$type = $_GET['upda'];
			$info = fncGetStaffInfo($type);
			$jobinfo = fncGetJobInfo($type);
			$adminstaff = fncGetAdminStaff();
			//echo $adminstaff[0][0];
			//exit;
			if ($jobinfo["assign_to"] == null){
				echo "
						<script>
							alert('This Request has not been assigned!');
							window.location='manage.php';
						</script>
			";
			}
	?>
	<style>
	body .modal-dialog {
				/* new custom width */
				width: 960px;
				height: auto;
				/* must be half of the width, minus scrollbar on the left (30px) */
				
			}
			#listing
									{
										background:#ccc;
										width:300px;
										padding:10px;
										overflow-y:scroll;
										height:400px;
									}
	
	</style>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
				   <!-- <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
						
							<h4 class="modal-title background" id="myModalLabel">Staff Information and Request.</h4>
						
				  </div>
			<div class="modal-body">
						<p><font size=4 color=#336600>Update Job Request</font></p>
						<p><font size=4 color=#336600>After updates notification will be send to the requestor of the update.</font></p>
						<form class="form-horizontal" role="form" name=form1 action=assign_jobs2.php method=post>
				<div class=row>
							<div class="col-md-8">
									<div class="form-group">
										<label class="control-label col-sm-3" for="email">Staff Name:</label>
										<div class="col-sm-9">
											<input type=text name="product" style='font-family: Comic Sans MS; font-size: 14px' class="form-control" disabled value='<?php echo $info["NAME"]; ?>' >
															
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="email">Duty Station:</label>
										<div class="col-sm-9">
											<input type=text name="product" style='font-family: Comic Sans MS; font-size: 14px' class="form-control" disabled value='<?php echo $info["station"]; ?>' >
															
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="email">Unit:</label>
										<div class="col-sm-9">
											<input type=text name="product" style='font-family: Comic Sans MS; font-size: 14px' class="form-control" disabled value='<?php echo $info["AREA"]; ?>' >
															
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="email">Title:</label>
										<div class="col-sm-9">
											<input type=text name="product" style='font-family: Comic Sans MS; font-size: 14px' class="form-control" disabled value='<?php echo $info["title"]; ?>' >
															
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="email">Request Category:</label>
										<div class="col-sm-9">
											<input type=text name="product" style='font-family: Comic Sans MS; font-size: 14px' class="form-control" disabled value='<?php echo $jobinfo["category"]; ?>' >
															
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="email">Request Type:</label>
										<div class="col-sm-9">
											<input type=text name="product" style='font-family: Comic Sans MS; font-size: 14px' class="form-control" disabled value='<?php echo $jobinfo["listing"]; ?>' >
															
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="pwd">Additional Request:</label>
										<div class="col-sm-9"> 
											<textarea name=rem class="form-control" disabled><?php echo $jobinfo["description"]; ?></textarea>	
											
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="email">Request Date:</label>
										<div class="col-sm-9">
										<?php
										$date2 = date_create($jobinfo["jdate"]);								
										?>
											<input type=text name="product" style='font-family: Comic Sans MS; font-size: 14px' class="form-control" disabled value='<?php echo date_format($date2, 'j F Y'); ?>' >
															
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="email">Request Time:</label>
										<div class="col-sm-9">
											<input type=text name="product" style='font-family: Comic Sans MS; font-size: 14px' class="form-control" disabled value='<?php echo $jobinfo["time_in"]; ?>' >
															
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-sm-3" for="email">Status :</label>
										<div class="col-sm-9">
											<select name=status class=form-control id="stat">
												<option value=''></option>
												<option value='C'>Close</option>
												<option value='P'>Park</option>												
											</select>	
										</div>
									</div>
									  
							</div>
							<div class="col-md-4">
								<p>Materials / Spare Used</p>
								<?php
								$adminitems = fncGetFacilityItems();
									echo "							
										<td>
									<div id=listing>
									<table>
										<tr>
											<td>Items</td><td>Qty</td>
										</tr>";
									for($i=1; $i <= $adminitems[0][0]; $i++) {
										$s = $adminitems[$i][0];
										echo "
												<tr>
													<td><input type='checkbox' name=item$i value='$s' /> ".$s."<br/></td>
													<td width=5%><input type=text name=qty$i size=6 />
												</tr>
												";
									}
								?>
									</table>
									</div>
									<br>
									<p>Remarsk</p>
									<textarea name=comments cols=45 rows=4 id="rem"></textarea>	
							</div>	
				 
				</div>
				<div class="form-group"> 
										<div class="col-sm-3">
										<img id="loading" src="images/download.gif" height=50px width=50px />
										</div>
										<div class="col-sm-9">
											<input type=hidden name=num value='<?php echo $adminitems[0][0]; ?>' />
											<input type=hidden name=jobid value='<?php echo $type; ?>' />
											<input type=hidden name=requestby value='<?php echo $info["NAME"]; ?>' />
											<input type=hidden name=station value='<?php echo $info["station"]; ?>' />
											<input type=hidden name=area value='<?php echo $info["AREA"]; ?>' />
											<input type=hidden name=title value='<?php echo $info["title"]; ?>' />
											<input type=hidden name=type value='<?php echo $jobinfo["listing"]; ?>' />
											<input type=hidden name=description value='<?php echo $jobinfo["description"]; ?>' />
											<input type=hidden name=date value='<?php echo date_format($date2, 'j F Y')." ".$jobinfo["time_in"]; ?>' />
											<input type=submit value='Submit' class="btn btn-success" id="submita" />
											<input type=reset value="Clear Entry" class="btn btn-warning" />
											<button type="button" class="btn btn-danger" onclick="window.location='manage.php'">Close</button>
										</div>
				</div>
				</form>
			</div>
		</div>
</div>
				<script src="js/jquery-2.1.1.min.js"></script>
				<script src="js/bootstrap.min.js"></script>
				<script>
				$(function ($) {	
						$('#myModal').modal();
						return false;							
				});
				</script>
				<script src="jquery-2.0.2.min.js"></script>
				<script>
				$(function() {					
						  $('#loading').hide(); 
						  var msga='';
						  var vala=0;
							$("#submita").click(function(){	
								var stat = $("#stat").val();
								if (!stat.trim()){
									val = 1;
									msga = msga + "Status Update Required!\n";
								}
								var rem = $("#rem").val();
								if (!rem.trim()){
									vala = 1;
									msga = msga + "Update Comments Required!\n";
								}
								if (vala == 1){
									alert(msga);
									return false;
								}
								else { 
									$('#loading').show(); 	
								}
							});
							
					  
				});
		  
		 </script>
<?php

	}
}
else{
	fncDoFormNotLogged();
}
	
?>
</body>
</html>
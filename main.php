<?php 
session_start();
include "fncForms.inc.php";
include "fncUsers.inc.php";

if (isset($_SESSION['access'])){
 	$id=$_SESSION['id'];
	$verified=fncVerifiedStaff($id);
	$ver = "Access";
	$_SESSION[$ver]=$ver;
	if ($verified=='N'){
		echo"
		<script>
			window.location=\"hr/my_profile.php?v=N\";
		</script>";
	}
	else{
		$access=$_SESSION["access"];
				$acarray=preg_split('/\%/', $access, -1 , PREG_SPLIT_NO_EMPTY);
	$itstaff = fncITStaff($id);
	$staffSignID = fncStaffSignID($id);
	$checkstaff=fncVerifyIfSuboffice($id);
	$staffaccess = fncGetCBTAccess($id);
	//$staffaccess = substr_replace('%','',$staffaccess);
	$name=fncGetICTStaffName($id);
	?>
<!doctype html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap43.min.css" rel="stylesheet">
	<link href="css/wfpstyles.min.css" rel="stylesheet">
	<!-- <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet"> -->
	<script src="js/respond.js"></script>
	<script>
		function change(){
					
						document.getElementById("index").checked=true;
						document.getElementById("callsign").checked=true;
						document.getElementById("title").checked=true;
						document.getElementById("duty").checked=true;
						document.getElementById("unit").checked=true;
						document.getElementById("all").checked=true;
						document.getElementById("deall").checked=false;						
		}
		
		function changeA(){						
						document.getElementById("unit").checked=false;
						document.getElementById("duty").checked=false;
						document.getElementById("index").checked=false;
						document.getElementById("callsign").checked=false;
						document.getElementById("title").checked=false;
						document.getElementById("all").checked=false;
						document.getElementById("deall").checked=true;					
		}
		function verify(){
						document.getElementById("loadingd").style.display = 'block';
							return true;
					}
	
	</script>
<title>WFP South Sudan Intranet</title>
<link rel="stylesheet" type="text/css" href="css/menu.css">
<style type="text/css">
/* body {
	background-image: url(images/canvas.jpg);
	background-size: cover;
	
}
div.innerdiv{
	width:130px;
	height:100px;
	background-color:#ABEBC6;
	border-radius:15px;
	decoration:none;
	font-size:15pt;
}
.writing{
		font-size:15pt;
	}
.link{
	font-size:15pt;
}
div.outterdiv{
	padding:5px;position: absolute;
	left: 2px;
	top: 150px;
	width: 145px;
}
@media screen and (max-width: 4256px) and (min-width: 1900px) {
  div.innerdiv {
    font-size: 30pt;
    padding: 25px;
    border: 8px solid black;
    width: 300px;
	height: 300px;
  }
  div.outterdiv{
	padding:5px;
	position: absolute;
	left: 2px;
	top: 150px;
	width: 300px;
	height: 300px;
	font-size:30pt;
	}
	.writing{
		font-size:50pt;
	}
	.link{
		font-size:50pt;
	}
} */
</style>
</head>

<body>
<!-- <table border=0 width="100%" id=header cellspacing=0 cellpadding=0>
			<tr height=10>
				<td bgcolor=#1f90ff>
					<img border=0 src=img/WFP_logo_white.gif></td>
				<td bgcolor=#1f90ff valing=bottom><p align=right>
					<a target=_top href=logout.php><b>
					<font size="2" color="#88B1F" face="Calibri">
					Logout&nbsp;&nbsp;
					</font></b></a></p>
             	</td>
			</tr>
			<tr>
				<td bgcolor="#72b5f8" colspan=2>
					<font size="2" color="#FFFFFF" face="Calibri">
					HOME
					</font>
             	</td>
			</tr>
</table> -->
<div class="outterdiv">
	<a href='ssd_directory/' class='link'>
		<div align="center" class="innerdiv"><font color=white>SSD Contact
			Directory<br>
			<span class="glyphicon glyphicon-earphone writing" ></span>
			</font>
		</div>
	</a>
</div>
<!--<div class="navbar navbar-default">
  <div class="navbar-header">
	<?php /* if (in_array("TS",$acarray)){?>
		<a class="navbar-brand" href="main.php?staff=y"><img src="img/people.png" height=35px width=50px ></a>
	<?php } */ ?>
  </div>
   <ul class="nav navbar-nav">
     
  </ul>
  </div>-->

  <div class="wfp--theme-light wfp--theme-en">
  <div>
    <div class="wfp--main-navigation">
      <div class="wfp--wrapper wfp--wrapper--width-lg wfp--wrapper--width-mobile-full wfp--main-navigation__wrapper">
        <div class="wfp--main-navigation__logo-wrapper"><button tabindex="0" class="wfp--main-navigation__button wfp--btn wfp--btn--primary" type="button">Menu</button>
          <div class="wfp--main-navigation__logo"><h3>South Sudan Intranet</h3></div>
        </div>
        <ul class="wfp--main-navigation__list">
          <li class="wfp--main-navigation__item">
            <div class="wfp--main-navigation__trigger"><a href="http://communities.wfp.org" class="wfp--link" target="_blank"><?php echo $name; ?></a></div>
          </li>
          <li class="wfp--main-navigation__item">
            <!-- <div class="wfp--main-navigation__trigger wfp--main-navigation__trigger--has-sub"><a href="http://manuals.wfp.org" class="wfp--link" target="_blank">Section 2<svg class="wfp--main-navigation__trigger__icon" fill="#FFFFFF" fill-rule="evenodd" height="5" viewBox="0 0 10 5" width="10" aria-label="expand icon" alt="expand icon">
                  <title>expand icon</title>
                  <path d="M0 0l5 4.998L10 0z"></path>
                </svg></a></div> -->
            <div class="wfp--main-navigation__sub">
              <div>
                <div class="wfp--sub-navigation__header">
                  <div class="wfp--sub-navigation__title">The Title</div>
                  <div class="wfp--sub-navigation__link"><button tabindex="0" class="wfp--btn wfp--btn--sm wfp--btn--primary" type="button">The SubPage Link</button></div>
                  <div class="wfp--sub-navigation__filter">
                    <div class="wfp--form-item wfp--form-item--invalid wfp--number some-class wfp--search wfp--search--lg"><label for="search-2" class="wfp--label wfp--visually-hidden"></label>
                      <!-- <div class="wfp--input-wrapper wfp--search-input__wrapper"><svg class="wfp--search-magnifier" fill-rule="evenodd" height="16" viewBox="0 0 16 16" width="16" aria-label="Provide a description that will be used as the title" alt="Provide a description that will be used as the title">
                          <title>Provide a description that will be used as the title</title>
                          <path d="M11.435 10.063h-.728l-.251-.252a5.89 5.89 0 001.437-3.865 5.946 5.946 0 10-5.947 5.947 5.91 5.91 0 003.865-1.432l.252.251v.723L14.637 16 16 14.637l-4.565-4.574zm-5.489 0a4.117 4.117 0 110-8.234 4.117 4.117 0 010 8.234z"></path>
                        </svg> <input type="text" class="wfp--search-input" placeHolderText="Filter List" id="search-2" /><button class="wfp--search-close wfp--search-close--hidden" type="button"><svg fill-rule="evenodd" height="16" viewBox="0 0 16 16" width="16" aria-label="Provide a description that will be used as the title" alt="Provide a description that will be used as the title"> 
                            <title>Provide a description that will be used as the title</title>
                            <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm3.5 10.1l-1.4 1.4L8 9.4l-2.1 2.1-1.4-1.4L6.6 8 4.5 5.9l1.4-1.4L8 6.6l2.1-2.1 1.4 1.4L9.4 8l2.1 2.1z"></path>
                          </svg></button></div> -->
                    </div>
                  </div>
                </div>
                <div class="wfp--sub-navigation__content">
                  <div class="wfp--sub-navigation__list">
                    <div class="wfp--sub-navigation__group wfp--sub-navigation__group--columns">
                      <h3 class="wfp--sub-navigation__group__title">First List</h3>
                      <div>
                        <div class="wfp--sub-navigation__item"><a href="https://go.docs.wfp.org" class="wfp--link" target="_blank">Lorem Ipsum et jomen</a></div>
                        <div class="wfp--sub-navigation__item"><a href="https://go.docs.wfp.org" class="wfp--link" target="_blank">At vero eos</a></div>
                        <div class="wfp--sub-navigation__item"><a href="https://go.docs.wfp.org" class="wfp--link" target="_blank">Sadipscing elitr</a></div>
                        <div class="wfp--sub-navigation__item"><a href="https://go.docs.wfp.org" class="wfp--link" target="_blank">At vero eos</a></div>
                        <div class="wfp--sub-navigation__item"><a href="https://go.docs.wfp.org" class="wfp--link" target="_blank">Sadipscing elitr</a></div>
                        <div class="wfp--sub-navigation__item"><a href="https://go.docs.wfp.org" class="wfp--link" target="_blank">Dolore magna</a></div>
                        <div class="wfp--sub-navigation__item"><a href="https://go.docs.wfp.org" class="wfp--link" target="_blank">Sadipscing elitr</a></div>
                        <div class="wfp--sub-navigation__item"><a href="https://go.docs.wfp.org" class="wfp--link" target="_blank">Consetetur sadipscing</a></div>
                        <div class="wfp--sub-navigation__item"><a href="https://go.docs.wfp.org" class="wfp--link" target="_blank">Sadipscing elitr</a></div>
                      </div>
                    </div>
                    <div class="wfp--sub-navigation__group wfp--sub-navigation__group--columns">
                      <h3 class="wfp--sub-navigation__group__title">Second List of Items</h3>
                      <div>
                        <div class="wfp--sub-navigation__item"><a href="https://go.docs.wfp.org" class="wfp--link" target="_blank">At vero eos</a></div>
                        <div class="wfp--sub-navigation__item"><a href="https://go.docs.wfp.org" class="wfp--link" target="_blank">Sadipscing elitr</a></div>
                        <div class="wfp--sub-navigation__item"><a href="https://go.docs.wfp.org" class="wfp--link" target="_blank">At vero eos</a></div>
                        <div class="wfp--sub-navigation__item"><a href="https://go.docs.wfp.org" class="wfp--link" target="_blank">Nonumy eirmod</a></div>
                        <div class="wfp--sub-navigation__item"><a href="https://go.docs.wfp.org" class="wfp--link" target="_blank">Consetetur sadipscing</a></div>
                        <div class="wfp--sub-navigation__item"><a href="https://go.docs.wfp.org" class="wfp--link" target="_blank">Dolore magna</a></div>
                        <div class="wfp--sub-navigation__item"><a href="https://go.docs.wfp.org" class="wfp--link" target="_blank">Nonumy eirmod</a></div>
                        <div class="wfp--sub-navigation__item"><a href="https://go.docs.wfp.org" class="wfp--link" target="_blank">Dolore magna</a></div>
                        <div class="wfp--sub-navigation__item"><a href="https://go.docs.wfp.org" class="wfp--link" target="_blank">Sadipscing elitr</a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
         <!--  <li class="wfp--main-navigation__item">
            <div class="wfp--main-navigation__trigger"><a href="https://go.docs.wfp.org" class="wfp--link" target="_blank">Section 3</a></div>
          </li>
          <li class="wfp--main-navigation__item">
            <div class="wfp--main-navigation__trigger"><a href="http://opweb.wfp.org" class="wfp--link" target="_blank">Section 4</a></div>
          </li> -->
          <li class="wfp--main-navigation__item">
            <div class="wfp--main-navigation__trigger">
              <div class="wfp--form-item wfp--form-item--invalid wfp--number wfp--search wfp--search--main"><label for="search-2" class="wfp--label wfp--visually-hidden"></label>
               <!--  <div class="wfp--input-wrapper wfp--search-input__wrapper"><svg class="wfp--search-magnifier" fill-rule="evenodd" height="16" viewBox="0 0 16 16" width="16" aria-label="Provide a description that will be used as the title" alt="Provide a description that will be used as the title">
                    <title>Provide a description that will be used as the title</title>
                    <path d="M11.435 10.063h-.728l-.251-.252a5.89 5.89 0 001.437-3.865 5.946 5.946 0 10-5.947 5.947 5.91 5.91 0 003.865-1.432l.252.251v.723L14.637 16 16 14.637l-4.565-4.574zm-5.489 0a4.117 4.117 0 110-8.234 4.117 4.117 0 010 8.234z"></path>
                  </svg><input type="text" class="wfp--search-input" placeHolderText="Search" id="search-2" /><button class="wfp--search-close wfp--search-close--hidden" type="button"><svg fill-rule="evenodd" height="16" viewBox="0 0 16 16" width="16" aria-label="Provide a description that will be used as the title" alt="Provide a description that will be used as the title">
                      <title>Provide a description that will be used as the title</title>
                      <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm3.5 10.1l-1.4 1.4L8 9.4l-2.1 2.1-1.4-1.4L6.6 8 4.5 5.9l1.4-1.4L8 6.6l2.1-2.1 1.4 1.4L9.4 8l2.1 2.1z"></path>
                    </svg></button></div> -->
              </div>
            </div>
          </li>
          <li class="wfp--main-navigation__user wfp--main-navigation__item">
            <div class="wfp--main-navigation__trigger wfp--main-navigation__trigger--has-sub">
              <!-- <div class="wfp--user" title="Max Mustermann long name"><svg class="wfp--user__icon wfp--user__icon--empty" fill="#ffffff" fill-rule="evenodd" height="14" viewBox="0 0 16 16" width="14" title="Max Mustermann long name" aria-label="User Icon" alt="User Icon">
                  <title>User Icon</title>
                  <path d="M6.123 9.455a3.5 3.5 0 113.754 0c1.958.97 3.571 3.424 4.436 6.64-5.852-.027-6.488-.027-12.62-.027.867-3.203 2.477-5.645 4.43-6.613z"></path>
                </svg><span class="wfp--user__title wfp--user__title--ellipsis"><span></span></span><svg class="wfp--main-navigation__trigger__icon" fill="#FFFFFF" fill-rule="evenodd" height="5" viewBox="0 0 10 5" width="10" aria-label="expand icon" alt="expand icon">
                  <title>expand icon</title>
                  <path d="M0 0l5 4.998L10 0z"></path>
                </svg></div> -->
            </div>
            <div class="wfp--main-navigation__sub">
              <div>
                <h3>Hello World</h3>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquya.</p>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="wfp--secondary-navigation">
      <div class="wfp--wrapper wfp--wrapper--width-lg wfp--secondary-navigation__wrapper">
        <div class="wfp--secondary-navigation__list">
          <div class="wfp--breadcrumb wfp--breadcrumb--no-trailing-slash">
            <div class="wfp--breadcrumb-item"><a href="https://ssd.wfp.org" class="wfp--link"><svg class="wfp--breadcrumb-home" fill="#0b77c2" fill-rule="evenodd" height="14" viewBox="0 0 16 16" width="14" aria-label="Provide a description that will be used as the title" alt="Provide a description that will be used as the title">
                  <title></title>
                  <path d="M13.555 9.515v3.842a.654.654 0 01-.666.643H9.666a.329.329 0 01-.333-.322v-3.002a.329.329 0 00-.334-.322H7a.329.329 0 00-.333.322v3.002c0 .177-.15.322-.334.322H3.11a.654.654 0 01-.667-.643V9.515a.32.32 0 01.122-.25l5.223-4.149a.348.348 0 01.425 0l5.223 4.15c.075.062.12.153.12.25zm2.323-1.632l-2.323-1.847V2.323a.329.329 0 00-.333-.322h-1.556a.329.329 0 00-.333.322v1.946L8.846 2.294a1.37 1.37 0 00-1.694 0L.12 7.883a.315.315 0 00-.045.453l.709.83a.343.343 0 00.469.044l6.534-5.193a.348.348 0 01.425 0l6.534 5.193a.343.343 0 00.47-.043l.708-.831a.315.315 0 00-.047-.453z"></path>
                </svg></a></div>
            <div class="wfp--breadcrumb-item"><a target=_top href=logout.php>Logout</a><br></div>
            <!-- <div class="wfp--breadcrumb-item"><span> Breadcrumb 3</span></div> --><br>
          </div>
          <!-- <h1 class="wfp--secondary-navigation__title">The page title</h1>
          <nav class="wfp--tabs some-class">
            <div class="wfp--tabs__nav__bar"></div>
            <ul class="wfp--tabs__nav wfp--tabs__nav--inline">
              <li tabindex="-1" class="wfp--tabs__nav-item wfp--tabs__nav-item--selected another-class" selected=""><a href="http://www.de.wfp.org">Tab label 1</a></li>
              <li tabindex="-1" class="wfp--tabs__nav-item another-class"><a href="http://www.es.wfp.org">Tab label 2</a></li>
              <li tabindex="-1" class="wfp--tabs__nav-item another-class"><a href="http://www.us.wfp.org">Tab label 3</a></li>
              <li tabindex="-1" class="wfp--tabs__nav-item another-class"><a href="http://www.fr.wfp.org">Tab label 4</a></li>
            </ul>
          </nav> --><br>
        </div>
        <!-- <div class="wfp--secondary-navigation__additional">additional Information</div> -->
      </div>
    </div>
	<style>
			.content:hover p {
				transform: scaleY(0.80)
				}

				.content:hover {
				transform: scaleY(1.2);
				transform-origin: bottom;
				}
	</style>
    <div class="wfp--wrapper--background-lighter" >
      <div class="wfp--wrapper wfp--wrapper--width-lg wfp--wrapper--spacing-md">
        <div class="row">
          <div class="col-xs-12 col-md-12 col-lg-12 wfp--module" >
            <div class="wfp--module__inner" style="border-radius:15px;">
              <div class="wfp--module__header">
                <h1 class="wfp--module__title">South Sudan Intranet Links</h1>
              </div>
              <div class="wfp--module__content">
					<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 img-responsive" style="text-align:right;">
								<img src="img/wfpnewlogo.png" class="img-responsive">
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<div class="row">
									<div class="col-lg-6">
										<a href=tlph/main.php>
											<div class="content" style="padding:4; height:40px;background-color:#9DEAFF; width:400px;color:black; border-radius:7px;text-align:center;padding-top:7px;">							
													<p style="font-size:18px;"><b>Telphone Billing Management System</b></p>
											</div>
										</a><br>

										<a href=access/main.php>
											<div class="content" style="padding:4; height:40px;background-color:#005F9B; width:400px;color:white; border-radius:7px;text-align:center;padding-top:7px;">		
													<p style="font-size:18px;"><b>ICT Equipment Service(s) Request</b></p>
											</div>
										</a><br>
										<a href='travel/index.php'>
											<div class="content" style="padding:4; height:40px;background-color:#bdf9c4; width:400px;color:black; border-radius:7px;text-align:center;padding-top:7px;">		
												<p style="font-size:18px;"><b>LTA/RnR Request</b></p>
											</div>
										</a><br>
										<a href=sitrep/index.php>
											<div class="content" style="padding:4; height:40px;background-color:#319298; width:400px;color:white; border-radius:7px;text-align:center;padding-top:7px;">	
													<p style="font-size:18px;"><b>Sitrep Builder</b></p>
											</div>
										</a><br>
										
										<a href=PLS/step1.php>
											<div class="content" style="padding:4; height:40px;background-color:#319298; width:400px;color:white; border-radius:7px;text-align:center;padding-top:7px;">	
													<p style="font-size:18px;"><b>Proof of Life</b></p>
											</div>
										</a><br>
										<a href='admin/index.php'>
											<div class="content" style="padding:4; height:40px;background-color:#007DBC; color:white; width:400px;border-radius:7px;text-align:center;padding-top:7px;">	
														<p style="font-size:18px;"><b>Administration Services Request</b></p>
											</div>
										</a><br>
										<?php
										if ($checkstaff=='Y'){
												?>		
												<a href=icttracking/index.php>
												<div class="content" style="padding:4; height:40px;background-color:#00B485; width:400px;color:white; border-radius:7px;text-align:center;padding-top:7px;">	
															<p style="font-size:18px;"><b>SSD Staff Tracking</b></p>
													</div>
												</a><br>
												<?php
											}
											else {
											?>
												<a href=icttracking/index.php>
													<div class="content" style="padding:4; height:40px;background-color:#F47847; width:400px;color:white; border-radius:7px;text-align:center;padding-top:7px;">	
															<p style="font-size:18px;"><b>SSD Staff Tracking</b></p>
													</div>
												</a><br>
											<?php }
											?>
											<a href=logisticsdb/index.php>
												<div class="content" style="padding:4; height:40px;background-color:#B79F8D; width:400px;color:white; border-radius:7px;text-align:center;padding-top:7px;">	
														<p  style="font-size:18px;"><b>Air Operation Database</b></p>
												</div>
											</a>
											<br>
											<a href=ssd_directory/index.php>
												<div class="content" style="padding:4; height:40px;background-color:#ccdbcd; width:400px;color:white; border-radius:7px;text-align:center;padding-top:7px;">	
														<p style="font-size:18px;"><b>SSD Directory</b></p>
												</div>
											</a> <br>
											<a href="http://localhost/shuttle_system/?id=<?php echo $id ?>">
																<div class="content" style="padding:4; height:40px;background-color:#4AA1E2; color:white; width:400px;border-radius:7px;text-align:center;padding-top:7px;">	
																	<p  style="font-size:18px;"><b>Shuttle Service Subscription</b></p>
																</div>
															</a><br>
											<a href="http://127.0.0.1:8000/logsystem/?id=<?php echo $id ?>">
														<div class="content" style="padding:4; height:40px;background-color:#f7b825; width:400px;color:white; border-radius:7px;text-align:center;padding-top:7px;">	
																<p  style="font-size:18px;"><b>Logistics Contracting</b></p>												
														</div>
													</a><br>
									</div>
									<div class="col-lg-6">
										<?php  		
											if (in_array("HR",$acarray)){
												?>
												<a href=hr/main.php>
												<div class="content" style="padding:4; height:40px;background-color:#ccc; width:400px;color:white; border-radius:7px;text-align:center;padding-top:7px;">	
														<p style="font-size:18px;"><b>Staff Creation</b></p>
												</div>
												</a><br>
											<?php
											}
											if (in_array("TS",$acarray)){
												?>		
													<a href="http://127.0.0.1:8000/main/none?id=<?php echo $id; ?>">
														<div class="content" style="padding:4; height:40px;background-color:#f7b825; width:400px;color:white; border-radius:7px;text-align:center;padding-top:7px;">	
																<p  style="font-size:18px;"><b>TEC Projects</b></p>												
														</div>
													</a><br>
													<a href="callsignsdb/index.php">
														<div class="content" style="padding:4; height:40px;background-color:#f7b825; width:400px;color:white; border-radius:7px;text-align:center;padding-top:7px;">	
																<p  style="font-size:18px;"><b>Call Sign Management</b></p>												
														</div>
													</a><br>
												<?php
											}
											if (in_array("US",$acarray)){	
												?>
													<a href=users/main.php>
														<div class="content" style="padding:4; height:40px;background-color:#fcc30b; width:400px;color:white; border-radius:7px;text-align:center;padding-top:7px;">	
																<p  style="font-size:18px;"><b>User Management</b></p>
														</div>
													</a><br>
													
												<?php
											}
													
												?>
												<a href="http://selfservice.hr.wfp.org/" target="blank">
													<div class="content" style="padding:4; height:40px;background-color:#26bde2; width:400px;color:white; border-radius:7px;text-align:center;padding-top:7px;">	
														<p  style="font-size:18px;"><b>WFP - HR Self Service</b></p>
													</div>
												</a><br>
												<a href="https://wellbeing.wfp.org/login">
												<div class="content" style="padding:4; height:40px;background-color:#ccdbcd; width:400px;color:white; border-radius:7px;text-align:center;padding-top:7px;">	
														<p style="font-size:18px;"><b>Wellbeing Platform</b></p>
												</div>
											</a> <br>
												<a href="purchase/index.php">
													<div class="content" style="padding:4; height:40px;background-color:#fdedc9; width:400px;color:black; border-radius:7px;text-align:center;padding-top:7px;">	
														<p  style="font-size:18px;"><b>G&S Procurement Tracking</b></p>
													</div>
												</a><br>
												<a href="attendance/index.php">
													<div class="content" style="padding:4; height:40px;background-color:#982B56; width:400px;color:white; border-radius:7px;text-align:center;padding-top:7px;">	
														<p  style="font-size:18px;"><b>COVID-19 Attendance Register</b></p>
													</div>
												</a><br>
			
			
												<?php
													
														?>																	
																<a href="http://127.0.0.1:8000/?id=<?php echo $id ?>">
																	<div class="content" style="padding:4; height:40px;background-color:#ccc; width:400px;color:white; border-radius:7px;text-align:center;padding-top:7px;">	
																	<p  style="font-size:18px;"><b>Staff Shuttle Portal</b></p>
																	</div>
																</a><br>
													<?php
													
												?>
	
	
											<a href="http://localhost/EMIS/?id=<?php echo $id ?>">
												<div class="content" style="padding:4; height:40px;background-color:#00B485; width:400px;color:white; border-radius:7px;text-align:center;padding-top:7px;">	
													<p  style="font-size:18px;"><b>Engineering System</b></p>
												</div>
											</a><br>
										<?php
											if (in_array("FLA",$acarray)){
												?>	
															<a href="http://localhost/flasystem/?id=<?php echo $id ?>">
																<div class="content" style="padding:4; height:40px;background-color:#4AA1E2; color:white; width:400px;border-radius:7px;text-align:center;padding-top:7px;">	
																	<p  style="font-size:18px;"><b>FLA for Partners</b></p>
																</div>
															</a><br>
												<?php
												}
												?>
	
											<a href="wrm/Admin/process_warehouse.php">
												<div class="content" style="padding:4; height:40px;background-color:#367a96; width:400px;color:white; border-radius:7px;text-align:center;padding-top:7px;">	
													<p  style="font-size:18px;"><b>WRM</b></p>
												</div>
											</a><br>
											
											
														<a href="tableau_visuals/">
															<div class="content" style="padding:4; height:40px;background-color:#4AA1E2; width:400px;color:white; border-radius:7px;text-align:center;padding-top:7px;">
																<p  style="font-size:18px;"><b>Intranet Dashboard / Visuals / Reports</b></p>
															</div>
														</a><br>
											

									</div>
									<div>
			<?php
				if (in_array("CSI",$acarray)){	
			$allstaff=fncGetAllStaffAC();
			?>
			<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' style='padding:4;background-color:#ccc;border-radius:10px;'>
						<form method=get action='changestaff.php'>
							Change staff information
							<input name=names list=names class='form-control' style='width:300px;display:inline-block;margin-right:5px;' id='nameview'>
								<datalist id=names>
								<?php
									for ($i=1;$i<=$allstaff[0][0];$i++){
																	echo "<option value='".strtoupper(str_replace('.',' ',$allstaff[$i]['login']))."'>";
																}
								echo "</datalist>
								<input type=submit value='View Staff Inormation' class='btn btn-primary' style='width:200px;display:inline-block'/>
						</form>
					
				</div>	</div>";
			}
			
	?>

										</div>
								</div>
							</div>
					</div>
              </div>
            </div>
			
          </div>
          <!-- <div class="col-xs-12 col-md-6 col-lg-4 wfp--module">
            <div class="wfp--module__inner">
              <div class="wfp--module__header">
                <h1 class="wfp--module__title">Module Example</h1>
              </div>
              <div class="wfp--module__content">
                <p>Lorem Ipsum is dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#x27;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
              </div>
            </div>
          </div> -->
          <!-- <div class="col-xs-12 col-md-6 col-lg-4 wfp--module">
            <div class="wfp--module__inner">
              <div class="wfp--module__header">
                <h1 class="wfp--module__title">Module Example</h1>
              </div>
              <div class="wfp--module__content">
                <p>Lorem Ipsum is dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#x27;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
              </div>
            </div>
          </div> -->
          <!-- <div class="col-xs-12 col-md-6 col-lg-6 wfp--module">
            <div class="wfp--module__inner">
              <div class="wfp--module__header">
                <h1 class="wfp--module__title">Module Example</h1>
              </div>
              <div class="wfp--module__content">
                <p>Lorem Ipsum is dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#x27;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
              </div>
            </div>
          </div> -->
         <!--  <div class="col-xs-12 col-md-6 col-lg-6 wfp--module">
            <div class="wfp--module__inner">
              <div class="wfp--module__header">
                <h1 class="wfp--module__title">Module Example</h1>
              </div>
              <div class="wfp--module__content">
                <p>Lorem Ipsum is dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#x27;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
              </div>
            </div>
          </div>
        </div> -->
		
      </div>
    </div>
    <footer class="wfp--footer">
      <div class="wfp--wrapper wfp--wrapper--width-lg">
        <div class="wfp--footer__content">
          <div class="wfp--footer__info">
            <div class="wfp--footer__info">
              <div class="wfp--footer__info__item">
                <!-- <p class="wfp--footer__label">A label</p> -->
                <ul class="wfp--footer__list">
                  <!-- <li><a href="http://www.wfp.org" class="wfp--link">First Link</a></li>
                  <li><a href="http://www.wfp.org" class="wfp--link">Second Link</a></li> -->
                </ul>
              </div>
              <div class="wfp--footer__info__item">
               <!--  <p class="wfp--footer__label">Another label</p> -->
                <ul class="wfp--footer__list">
                 <!--  <li><a href="http://www.wfp.org" class="wfp--link">First Link</a></li>
                  <li><a href="http://www.wfp.org" class="wfp--link">Second Link</a></li> -->
                </ul>
              </div>
            </div>
          </div>
          <div class="wfp--footer__cta"><svg class="wfp--footer__cta-logo" fill-rule="evenodd" height="58" viewBox="0 0 132 58" width="132" alt="Provide a description that will be used as the title" aria-label="Provide a description that will be used as the title">
              <title>Provide a description that will be used as the title</title>
              <path d="M35.934 4.664h.548c.511 0 .895-.101 1.149-.304.254-.202.381-.497.381-.883 0-.39-.107-.678-.319-.865-.214-.186-.547-.28-1.002-.28h-.757v2.332zm3.76-1.246c0 .845-.265 1.491-.793 1.938-.528.449-1.279.672-2.253.672h-.714v2.793h-1.665V.969h2.508c.952 0 1.676.204 2.172.615.496.41.745 1.021.745 1.834zm-9.537 5.403h-1.638V.969h4.501v1.363h-2.863v2.026h2.664v1.359h-2.664v3.104zm-4.525 0h-1.896l-1.063-4.125c-.04-.147-.107-.45-.202-.91a10.34 10.34 0 01-.164-.927c-.021.194-.075.505-.16.932-.087.428-.153.734-.199.916l-1.059 4.114h-1.89L16.995.969h1.639l1.004 4.285c.176.792.302 1.478.381 2.058.022-.204.071-.52.148-.948.077-.429.15-.761.218-.996L21.529.969h1.573l1.144 4.399a23.19 23.19 0 01.36 1.944c.036-.28.093-.628.172-1.045.079-.417.15-.754.215-1.013l.999-4.285h1.638l-1.998 7.852zm-4.073 27.313c-3.051 0-5.009.724-5.544.949-.031.014-.057-.031-.032-.056 3.352-3.485 7.277-3.293 8.222-3.293h11.161c.563 0 1.019.537 1.019 1.201 0 .662-.456 1.199-1.019 1.199H21.559zm2.515 3.085c-3.288 0-4.246-1.868-9.222-.635-.034.009-.057-.038-.028-.058 2.774-1.903 5.791-1.73 7.011-1.73h13.531c.563 0 1.019.537 1.019 1.199s-.456 1.199-1.019 1.199c0 0-8.689.025-11.292.025zm.233 3.037c-3.374 0-3.644-2.49-8.646-3.051-.035-.004-.039-.056-.005-.064 4.109-1.028 5.638.715 8.037.715h11.673c.563 0 1.019.537 1.019 1.2 0 .663-.456 1.2-1.019 1.2H24.307zm-.732-9.183c-2.716 0-4.968 1.185-5.495 1.484-.03.016-.059-.019-.04-.046.441-.649 2.82-3.837 6.91-3.837h10.416c.563 0 1.019.537 1.019 1.2 0 .662-.456 1.199-1.019 1.199H23.575zm14.941-6.625a.753.753 0 00-.444-.205.74.74 0 00-.362.043c.047-.099.087-.205.102-.33a.85.85 0 00-.083-.512c-.336-.736.624-2.209.503-2.275-.115-.064-.661 1.56-1.191 2.216a.934.934 0 00-.2.489.923.923 0 00.087.513c.074.132.186.226.318.234a.295.295 0 00.107-.006.266.266 0 00-.018.059.453.453 0 00.142.388.718.718 0 00.441.207.77.77 0 00.493-.093c.719-.393 2.21-.781 2.178-.919-.029-.138-1.483.715-2.073.191zm1.099-1.074a.63.63 0 00-.406-.199.657.657 0 00-.268.043c.013-.046.031-.085.037-.131a.726.726 0 00-.103-.462c-.365-.677.588-1.956.465-2.019-.123-.064-.646 1.368-1.176 1.934a.69.69 0 00-.197.425.765.765 0 00.1.465c.084.123.199.21.338.229a.53.53 0 00.179-.021c-.003.007-.011.018-.008.026a.524.524 0 00.139.398c.1.107.244.181.404.195a.62.62 0 00.433-.117c.62-.447 2.037-.712 2-.856-.034-.138-1.391.611-1.937.09zm.964-.993a.552.552 0 00-.389-.104.541.541 0 00-.197.051c.011-.03.029-.054.04-.083a.7.7 0 00-.024-.43c-.231-.665.792-1.648.693-1.728-.1-.074-.764 1.117-1.31 1.536a.648.648 0 00-.231.354.648.648 0 00.021.428.438.438 0 00.265.255c.092.029.184.01.271-.027a.393.393 0 00-.024.17c.013.136.079.25.187.33a.567.567 0 00.752-.067c.491-.497 1.714-.962 1.665-1.081-.053-.12-1.152.765-1.719.396zm1.894-2.134c-.102-.151-.958.787-1.59.877a.66.66 0 00-.359.178.684.684 0 00-.221.361.38.38 0 00.055.324.325.325 0 00.299.109.64.64 0 00.365-.181.73.73 0 00.215-.356c.192-.643 1.312-1.214 1.236-1.312zm-17.694 1.27c-.025.093-.21.816-.21.816-.052.029-.272-.019-.33-.024-.422-.04-.8-.407-.638-.845.133-.358.404-.396.748-.412.143-.006.4.028.529.117 0 0-.051.165-.099.348zm-.485 2.182l-.039.247c-.263-.165-.417-.542-.291-.84.097-.226.337-.285.514-.295a49.8 49.8 0 00-.184.888zm-.378 2.696c-.033.185-.283.21-.454.261-.496.149-.966.085-1.118-.508-.165-.634.315-.901.83-1.025.28-.066.54-.011.732.226.048.059.105.112.118.168 0 0-.077.704-.108.878zm-1.561-3.122c.383-.092.779-.236 1.073.141.31.396.207 1.031-.291 1.199-.328.111-.725.207-1.005-.061-.368-.351-.341-1.148.223-1.279zm-.375-2.056c.403-.098.821-.247 1.131.149.322.414.215 1.084-.308 1.259-.346.114-.763.215-1.057-.067-.386-.366-.357-1.203.234-1.341zm-.376 4.445c-.105.37-.41.425-.729.502-.21-.257-.774-.909-.784-.986a.205.205 0 01.012-.09c.026-.077.115-.151.181-.194.192-.125.601-.217.822-.172.396.085.603.568.498.94zm-2.005-1.899c-.289-1.024 1.428-1.47 1.693-.466.273 1.032-1.459 1.47-1.693.466zm-.252-2.044c-.294-1.017 1.431-1.464 1.696-.465.273 1.033-1.462 1.472-1.696.465zm-.241-2.009c-.281-.948 1.338-1.368 1.585-.433.254.962-1.365 1.377-1.585.433zm-.166 3.867c-.079.047-.109.072-.136.072l-.77-.838c.009-.024.247-.196.327-.242.64-.356 1.167.662.579 1.008zm-1.461-1.887c-.381-.84 1.005-1.751 1.425-.845.385.834-1.001 1.761-1.425.845zm1.165-2.66c.438.779-.882 1.648-1.26.81-.336-.722.837-1.565 1.26-.81zm-1.108-1.815c.195-.172.42-.265.651-.154.37.178.381.733.058.954-.147.101-.396.226-.577.181-.397-.101-.473-.68-.132-.981zm.05-1.669c.16-.108.373-.205.557-.13.334.137.322.622.052.816-.124.088-.346.197-.496.157-.338-.085-.421-.634-.113-.843zm.887-2.378c.199-.107.486-.152.664.048a.468.468 0 01-.134.734c-.212.106-.498.146-.666-.051a.48.48 0 01.136-.731zm-.157 1.807c-.161-.595.842-.876 1.005-.271.181.587-.845.88-1.005.271zm1.616 1.039c.234.643-.855 1.007-1.068.372-.217-.643.877-1.01 1.068-.372zm.137-3.133c.208-.083.474-.173.706 0 .289.216.226.702-.105.853-.218.099-.496.165-.69-.008-.247-.22-.261-.705.089-.845zm-.192 5.381c-.294.069-.601.186-.845-.066-.312-.322-.223-.885.2-1.039.273-.104.619-.162.842.066.286.293.255.93-.197 1.039zm.005-3.284c-.188-.638.851-.965 1.05-.346.205.635-.871.973-1.05.346zm1.74 1.169c.244.728-.986 1.116-1.212.399-.228-.734 1.011-1.122 1.212-.399zm.066-1.95c.217-.058.446-.037.611.14.252.271.166.734-.207.803-.175.032-.446.019-.583-.101-.246-.218-.234-.731.179-.842zm1.05 1.528c.396 0 .596.582.365.871-.139.175-.439.186-.643.154-.378-.058-.62-.545-.365-.874.155-.199.42-.151.643-.151zm-1.903 2.396c-.244-.837 1.178-1.211 1.396-.38.221.845-1.209 1.217-1.396.38zm.872 1.071c.388-.04.792-.13 1.031.277.249.43.063 1.028-.441 1.129-.331.069-.732.101-.968-.192-.31-.387-.187-1.161.378-1.214zm1.974-1.864c.48.198.642.764.304 1.08-.182.165-.512.133-.735.088-.447-.088-.738-.758-.347-1.076.201-.163.56-.183.778-.092zm.755 2.018c.301.37.189 1.023-.339 1.055-.275.016-.635-.016-.821-.242-.299-.361-.186-1.039.341-1.057.276-.011.633.018.819.244zm2.039-6.664a.12.12 0 00-.134-.05c-.063.021-.105.09-.081.151 1.205 3.237-.334 4.831-.977 7.097-.771-1.841 1.785-3.573.468-6.929-.019-.043-.053-.078-.1-.085-.066-.009-.129.018-.139.106-.034.236-.189 2.096-1.698 3.186a3.015 3.015 0 00-.703-1.021c-.14-.627-.549-1.488-1.41-1.742-.129-.325-.388-.79-.887-1.04-.47-.234-1.013-.213-1.617.061-.729.085-1.231.37-1.495.845-.25.449-.205.938-.121 1.271-.614.656-.643 1.628-.627 2.009-.365.876-.16 1.899-.045 2.324-.436 1.191-.01 2.346.16 2.729 0 .104.005.202.011.3-1.428-1.562-4.677-3.497-5.918-4.235a.148.148 0 00-.181.021.154.154 0 00-.008.218c2.768 2.7 5.238 6.032 7.61 12.946 1.184-1.231 3.323-2.849 6.367-2.849h3.561c-2.262-8.428 1.032-11.444-2.036-15.313zm16.836 4.358c-.651-.17-4.808-.906-9.467 7.663.68-3.191 2.746-7.052 3.312-8.173v-.008a.153.153 0 00-.042-.192.136.136 0 00-.189.035c-3.078 5.133-4.159 8.091-4.797 11.63h1.929c.328-3.412 4.637-11.449 9.23-10.852h.005c.027.006.05-.016.053-.039.01-.03-.008-.059-.034-.064zm-9.262 28.232l-1.042-4.355h-1.774c.281 1.105.682 2.229 1.202 3.215a.16.16 0 00.16.083.165.165 0 00.134-.19c-.121-.922-.265-1.811-.402-2.699.376 1.395.882 2.758 1.565 4.013.018.039.057.057.094.045.05-.011.076-.064.063-.112zm1.793-1.977c-.182-.728-.371-1.621-.533-2.378h-.675c.263.808.617 1.709.932 2.479.031.075.102.112.17.093a.16.16 0 00.106-.194zm.225 2.561l-.005-.01c-.218-.609-.52-1.154-.759-1.738a23.462 23.462 0 01-.706-1.759c-.17-.449-.351-.964-.49-1.432h-.651c.184.545.423 1.132.646 1.658.49 1.188 1.057 2.352 1.779 3.393a.103.103 0 00.123.035c.058-.022.084-.088.063-.147zm.974-20.9c-.05-.075-.171-.091-.228-.03a13.313 13.313 0 00-2.147 3.069h.703c.352-.826 1.144-2.285 1.654-2.811l.005-.005a.183.183 0 00.013-.223zm-5.354-6.045c.651-1.069 1.617-1.887 2.436-2.875a.097.097 0 00-.009-.128.08.08 0 00-.117-.003c-.187.199-.381.386-.58.571-.087-.042-.307.043-.531.218-.175.139-.301.293-.346.404-.113-.026-.325.106-.517.351-.158.205-.249.42-.247.553-.121.01-.296.164-.446.409-.097.162-.16.319-.181.449a1.227 1.227 0 00-.309.353c-.134.224-.203.449-.182.579-.031.057-.063.11-.089.165l.016-.132c.192-1.513.469-3.011.892-4.456.425-1.441.934-2.894 1.808-4.061l.006-.005a.168.168 0 00-.016-.21.138.138 0 00-.205-.003 6.631 6.631 0 00-.785 1.05c-.099-.053-.309.144-.469.452-.147.278-.2.536-.144.635 0 0-.003.008-.009.005-.105-.045-.299.189-.417.502-.115.295-.136.566-.057.657-.006.005-.006.008-.009.013-.117-.043-.309.226-.427.606-.098.321-.108.6-.037.712.005.005 0 .019-.005.016-.121-.043-.305.234-.412.611-.108.364-.1.686.002.749-.118-.013-.283.263-.37.638-.078.324-.07.603.006.715-.116.034-.244.305-.31.656-.063.343-.032.627.052.718-.107.055-.217.334-.257.68-.039.343.011.624.1.715-.089.1-.176.339-.213.627-.036.273-.013.51.04.643-.097.082-.171.359-.174.691-.007.265.032.491.1.621a1.554 1.554 0 00-.089.542c-.005.279.039.518.11.643-.021.981-.008 2.025.045 3.008h2.118c.015-.765.066-1.6.141-2.357.15-1.35.373-2.721 1.048-3.874l.005-.008a.114.114 0 00-.013-.127c-.04-.035-.095-.035-.132.008-.916 1.063-1.317 2.506-1.553 3.89-.042.271-.076.544-.108.816.058-1.111.16-2.217.415-3.269.291-1.281.874-2.5 1.984-3.183a.097.097 0 00.039-.112.091.091 0 00-.11-.066c-.071.021-.136.058-.205.088-.073-.091-.343-.024-.622.153-.265.173-.441.386-.422.503 0 .005-.013.013-.013.002a.08.08 0 00-.013-.034c-.1-.082-.368.104-.594.42-.228.316-.317.646-.22.731.005.002.003.01-.002.01-.119-.048-.315.221-.439.596-.089.262-.11.504-.078.643 0 .004-.006.01-.006.01-.092.303-.168.609-.239.919.027-.438.066-.879.129-1.315.186-1.254.564-2.482 1.236-3.528zm6.663-3.498a.75.75 0 00-.485-.037.811.811 0 00-.326.17.925.925 0 00-.018-.345.838.838 0 00-.252-.449c-.572-.571-.179-2.291-.312-2.312-.131-.018-.084 1.696-.354 2.498a.92.92 0 00-.019.529.889.889 0 00.26.451c.113.099.249.144.378.104a.217.217 0 00.097-.043c0 .022 0 .043.002.064.03.141.129.25.266.314a.722.722 0 00.488.037.792.792 0 00.428-.26c.538-.625 1.803-1.515 1.727-1.634-.077-.117-1.145 1.195-1.88.913zm2.447-2.165c-.082-.117-1.095 1.065-1.785.77a.638.638 0 00-.452-.042.69.69 0 00-.236.133c-.003-.048 0-.091-.01-.133a.707.707 0 00-.255-.398c-.577-.505-.123-2.041-.26-2.057-.139-.016-.136 1.512-.436 2.229a.684.684 0 00-.036.468c.042.17.137.311.255.401a.482.482 0 00.393.093.495.495 0 00.16-.082c0 .008-.003.018 0 .026a.53.53 0 00.27.327.643.643 0 00.447.037.626.626 0 00.365-.26c.427-.64 1.661-1.39 1.58-1.512zm.249-1.48c-.09-.093-.816 1.124-1.475.978a.55.55 0 00-.399.04.517.517 0 00-.168.117c0-.03.008-.059.008-.091a.676.676 0 00-.171-.393c-.443-.542.173-1.825.055-1.865-.12-.035-.33 1.315-.698 1.902a.632.632 0 00-.094.412c.01.157.076.298.168.396.094.098.21.152.336.144a.377.377 0 00.244-.12c0 .053.01.111.036.167a.444.444 0 00.286.242c.124.04.271.029.402-.035a.595.595 0 00.284-.292c.288-.64 1.272-1.509 1.186-1.602zm-.436-1.69c-.149-.106-.624 1.076-1.189 1.384a.683.683 0 00-.275.295.718.718 0 00-.079.415c.013.125.071.231.163.284a.319.319 0 00.315-.002.668.668 0 00.28-.298.737.737 0 00.079-.412c-.042-.669.811-1.6.706-1.666zM30.252 42.917h-5.945c-.404 0-.769-.032-1.105-.093.003 0 .003.002.003.002.976 1.451 2.506 2.552 4.057 3.29.239 1.323.538 2.548.646 2.644.11.095 1.632-.343 1.68-.484.044-.14-.623-2.407-.623-2.407.801-1.374 1.048-2.185 1.287-2.952zm14.953 10.169c-1.501.593-3.459.642-5.057.218-3.661-1.14-7.726-3.3-11.629-1.507-3.902-1.793-7.967.367-11.628 1.507-1.598.424-3.556.375-5.057-.218a.038.038 0 00-.037.066c2.16 1.671 5.186 2.44 7.91 1.456 2.616-.815 4.829-3.587 7.928-2.404-2.454.959-4.748 2.729-6.519 4.399l1.288 1.058c1.609-1.873 3.42-3.746 5.47-4.886.28-.165.448-.231.645-.242.198.011.365.077.643.242 2.053 1.14 3.864 3.013 5.472 4.886l1.289-1.058c-1.771-1.67-4.065-3.44-6.519-4.399 3.099-1.183 5.312 1.589 7.928 2.404 2.724.984 5.75.215 7.91-1.456.034-.029.005-.082-.037-.066zm-24.129-2.525c-3.826-.927-4.873-4.514-8.072-6.071-.034-.018-.071.022-.05.053 1.008 1.658 1.554 4.198 4.459 5.764.024.012.011.05-.016.042-4.167-.802-5.918.313-10.285-1.661-.037-.016-.076.024-.052.059 1.435 2.083 4.841 3.507 9.508 3.114 1.68-.143 2.897-.85 4.508-1.227.04-.011.04-.065 0-.073zm-8.014-2.2c-1.454-1.905-1.04-5.972-4.323-9.695-.026-.029-.073-.006-.065.031.627 2.742.44 5.857 2.157 8.139.016.024-.008.048-.032.032-3.385-2.665-6.865-3.468-8.414-5.625-.023-.029-.07-.014-.065.024.383 2.792 5.747 7.145 10.713 7.153.029 0 .047-.034.029-.059zm-5.084-5.064c-1.559-2.891.304-7.302-1.464-11.588-.019-.045-.087-.034-.087.014-.052 2.34-1.506 5.835-.627 8.473.01.024-.021.037-.034.016-2.239-3.271-4.015-3.954-5.496-6.948-.021-.045-.089-.033-.092.015C.084 35.314.984 36.973 2 38.514a17.398 17.398 0 005.928 4.836c.035.016.066-.019.05-.053zM6.921 25.691c-.003-.048-.066-.064-.09-.022-1.189 2.224-3.306 3.994-3.375 6.931-.002.029-.034.031-.039.004-.386-2.266-2.309-4.806-2.393-8.088 0-.05-.071-.063-.09-.016-1.582 4.268.693 8.314 3.115 11.657.027.034.079.014.079-.032-.099-3.542 2.971-6.186 2.793-10.434zm1.511-5.522c-1.123 1.56-3.65 2.663-4.574 4.913-.013.032-.053.024-.047-.013.367-2.522-.607-5.45.307-8.8.013-.048-.047-.08-.076-.043-1.381 1.698-1.848 3.688-1.924 5.838-.094 2.641.834 4.567 1.294 6.358.01.043.065.04.076-.003.661-2.348 3.981-3.762 5.02-8.213.014-.047-.047-.077-.076-.037zm3.047-5.245c-1.847 1.448-4.669 2.843-5.275 3.85-.01.021-.042.005-.037-.016l.685-3.287c.307-1.395.572-2.731 1.344-3.98.024-.037-.021-.08-.055-.053-3.517 2.785-3.003 6.812-3.158 10.11-.002.035.04.051.064.027 2.07-2.246 5.445-3.553 6.49-6.606.013-.037-.027-.069-.058-.045zm2.617-5.049c-3.108.099-5.391 2.716-6.37 6.048-.005.019.021.035.037.024 4.281-3.138 4.041-4.483 6.359-5.976.042-.027.024-.096-.026-.096zm35.828 38.813c-4.364 1.974-6.117.859-10.285 1.661-.026.008-.039-.03-.016-.042 2.905-1.566 3.451-4.106 4.459-5.764.021-.031-.015-.071-.05-.053-3.196 1.557-4.243 5.144-8.072 6.071-.04.008-.04.062 0 .073 1.611.377 2.829 1.084 4.508 1.227 4.666.393 8.076-1.031 9.509-3.114.023-.035-.016-.075-.053-.059zm4.726-7.445c-1.548 2.157-5.028 2.96-8.413 5.625-.021.016-.047-.008-.029-.032 1.714-2.282 1.527-5.397 2.154-8.139.008-.037-.039-.06-.065-.031-3.281 3.723-2.869 7.79-4.32 9.695-.018.025-.003.059.029.059 4.965-.008 10.327-4.361 10.71-7.153.005-.038-.042-.053-.066-.024zm2.208-7.964c-.003-.048-.071-.06-.092-.015-1.48 2.994-3.257 3.677-5.493 6.948-.016.021-.045.008-.036-.016.878-2.638-.573-6.133-.628-8.473 0-.048-.068-.059-.086-.014-1.769 4.286.094 8.697-1.462 11.588-.019.034.013.069.047.053a17.389 17.389 0 005.928-4.836c1.016-1.541 1.916-3.2 1.822-5.235zm-.756-8.779c-.018-.047-.089-.034-.089.016-.084 3.282-2.008 5.822-2.394 8.088-.005.027-.036.025-.036-.004-.069-2.937-2.189-4.707-3.378-6.931-.024-.042-.087-.026-.087.022-.178 4.248 2.89 6.892 2.79 10.434 0 .046.055.066.081.032 2.42-3.343 4.695-7.389 3.113-11.657zm-1.184-2.436c-.076-2.15-.543-4.14-1.923-5.838-.029-.037-.087-.005-.076.043.913 3.35-.061 6.278.309 8.8.005.037-.036.045-.05.013-.923-2.25-3.451-3.353-4.574-4.913-.026-.04-.087-.01-.076.037 1.039 4.451 4.359 5.865 5.021 8.213.01.043.065.046.076.003.459-1.791 1.388-3.717 1.293-6.358zm-6.023-10.626c-.034-.027-.078.016-.055.053.772 1.249 1.037 2.585 1.344 3.98l.685 3.287c.005.021-.027.037-.037.016-.606-1.007-3.425-2.402-5.275-3.85-.029-.024-.071.008-.058.045 1.045 3.053 4.42 4.36 6.49 6.606.024.024.066.008.063-.027-.154-3.298.36-7.325-3.157-10.11zm-5.954-1.563c-.05 0-.066.069-.027.096 2.318 1.493 2.079 2.838 6.359 5.976.019.011.042-.005.037-.024-.979-3.332-3.262-5.949-6.369-6.048zm28.225 19.572h-2.232l-1.253-4.857c-.046-.173-.125-.53-.237-1.072a12.245 12.245 0 01-.193-1.091c-.025.227-.088.593-.189 1.097-.102.504-.18.864-.235 1.079l-1.245 4.844h-2.227l-2.359-9.246h1.929l1.183 5.047c.207.932.356 1.739.449 2.422.025-.24.083-.612.174-1.116.09-.504.176-.895.256-1.173l1.347-5.18h1.853l1.347 5.18c.059.231.133.586.222 1.062.088.477.156.885.202 1.227.042-.329.109-.738.203-1.231.092-.49.177-.887.253-1.191l1.176-5.047h1.929l-2.353 9.246m4.578-3.548c0 .701.114 1.229.345 1.587.229.359.603.538 1.122.538.514 0 .884-.178 1.11-.534.226-.356.338-.887.338-1.591 0-.7-.113-1.224-.341-1.575-.228-.349-.601-.524-1.12-.524-.514 0-.885.174-1.113.521-.227.348-.341.874-.341 1.578zm4.888 0c0 1.151-.303 2.051-.91 2.701-.607.649-1.453.974-2.536.974-.679 0-1.278-.149-1.796-.446a2.959 2.959 0 01-1.195-1.281c-.279-.556-.418-1.206-.418-1.948 0-1.155.301-2.053.904-2.694s1.451-.962 2.543-.962c.678 0 1.277.149 1.796.443.519.295.917.719 1.195 1.272.278.552.417 1.199.417 1.941zm5.376-3.656c.262 0 .479.02.652.058l-.146 1.808a2.208 2.208 0 00-.569-.063c-.615 0-1.095.158-1.438.474-.344.317-.516.759-.516 1.329v3.598h-1.929v-7.071h1.461l.284 1.189h.095c.22-.396.516-.715.889-.958a2.194 2.194 0 011.217-.364m1.749 7.204h1.929v-9.841h-1.929zm6.76-1.41c.493 0 .855-.144 1.085-.431.23-.286.355-.773.376-1.461v-.208c0-.759-.117-1.303-.351-1.631-.234-.33-.615-.494-1.142-.494-.43 0-.764.182-1.002.547-.238.365-.357.895-.357 1.591 0 .695.12 1.217.36 1.565.241.348.584.522 1.031.522zm-.677 1.537c-.831 0-1.483-.323-1.957-.968-.475-.645-.711-1.539-.711-2.681 0-1.16.241-2.064.724-2.71.482-.648 1.148-.972 1.995-.972.889 0 1.569.346 2.036 1.038h.064a7.897 7.897 0 01-.146-1.411v-2.264h1.935v9.841H96.3l-.373-.917h-.082c-.438.695-1.107 1.044-2.005 1.044zm11.17-.127h-1.929v-9.246h5.3v1.607h-3.371v2.383h3.137v1.601h-3.137v3.655m6.379-3.548c0 .701.115 1.229.345 1.587.229.359.604.538 1.122.538.514 0 .884-.178 1.11-.534.226-.356.338-.887.338-1.591 0-.7-.113-1.224-.341-1.575-.228-.349-.601-.524-1.12-.524-.514 0-.885.174-1.113.521-.227.348-.341.874-.341 1.578zm4.888 0c0 1.151-.303 2.051-.91 2.701-.607.649-1.453.974-2.536.974-.679 0-1.278-.149-1.796-.446a2.959 2.959 0 01-1.195-1.281c-.279-.556-.418-1.206-.418-1.948 0-1.155.301-2.053.904-2.694s1.451-.962 2.543-.962c.679 0 1.277.149 1.796.443.519.295.917.719 1.195 1.272.278.552.417 1.199.417 1.941zm3.01 0c0 .701.115 1.229.344 1.587.23.359.604.538 1.123.538.514 0 .884-.178 1.11-.534.225-.356.338-.887.338-1.591 0-.7-.113-1.224-.341-1.575-.228-.349-.601-.524-1.12-.524-.514 0-.885.174-1.113.521-.227.348-.341.874-.341 1.578zm4.888 0c0 1.151-.303 2.051-.91 2.701-.607.649-1.453.974-2.536.974-.679 0-1.278-.149-1.796-.446a2.967 2.967 0 01-1.196-1.281c-.278-.556-.417-1.206-.417-1.948 0-1.155.301-2.053.904-2.694s1.45-.962 2.543-.962c.678 0 1.277.149 1.796.443.519.295.917.719 1.195 1.272.278.552.417 1.199.417 1.941zm4.418 2.138c.493 0 .854-.144 1.084-.431.23-.286.355-.773.377-1.461v-.208c0-.759-.117-1.303-.351-1.631-.234-.33-.615-.494-1.142-.494-.43 0-.764.182-1.002.547-.239.365-.358.895-.358 1.591 0 .695.12 1.217.361 1.565.24.348.584.522 1.031.522zm-.677 1.537c-.831 0-1.483-.323-1.957-.968-.475-.645-.712-1.539-.712-2.681 0-1.16.241-2.064.724-2.71.483-.648 1.148-.972 1.995-.972.89 0 1.569.346 2.037 1.038h.064a7.805 7.805 0 01-.146-1.411v-2.264h1.935v9.841h-1.48l-.373-.917h-.082c-.438.695-1.107 1.044-2.005 1.044zM64.157 37.78h.645c.603 0 1.054-.119 1.354-.357.299-.238.449-.585.449-1.04 0-.46-.126-.799-.377-1.019-.251-.219-.643-.328-1.179-.328h-.892v2.744zm4.428-1.467c0 .995-.312 1.756-.933 2.284-.622.527-1.507.79-2.653.79h-.842v3.289h-1.96V33.43h2.953c1.122 0 1.975.241 2.559.723.584.484.876 1.203.876 2.16zm4.886-.841c.262 0 .479.019.653.057l-.146 1.809a2.215 2.215 0 00-.569-.064c-.616 0-1.096.159-1.44.475-.343.316-.514.759-.514 1.328v3.599h-1.93v-7.072h1.461l.285 1.19h.095c.219-.397.516-.716.889-.958a2.191 2.191 0 011.216-.364m2.905 3.656c0 .7.115 1.228.344 1.587.23.358.604.538 1.122.538.515 0 .885-.179 1.111-.534.225-.357.339-.887.339-1.591 0-.7-.115-1.225-.342-1.575-.228-.35-.601-.525-1.119-.525-.515 0-.886.174-1.114.522-.227.347-.341.874-.341 1.578zm4.888 0c0 1.15-.303 2.051-.91 2.7s-1.453.975-2.536.975c-.68 0-1.278-.15-1.797-.447a2.965 2.965 0 01-1.195-1.281c-.278-.555-.417-1.205-.417-1.947 0-1.155.301-2.054.904-2.694.603-.641 1.45-.962 2.542-.962.68 0 1.278.148 1.797.443a2.95 2.95 0 011.195 1.271c.279.552.417 1.2.417 1.942zm2.459-1.208c0 .384.088.687.263.91.175.224.441.336.801.336.362 0 .628-.112.797-.336.168-.223.253-.526.253-.91 0-.852-.351-1.278-1.05-1.278-.709 0-1.064.426-1.064 1.278zm-.701 5.755c0 .265.127.474.382.626.256.152.613.228 1.072.228.692 0 1.234-.096 1.626-.285.392-.189.588-.449.588-.777 0-.266-.116-.45-.348-.551-.232-.102-.59-.151-1.075-.151h-1c-.353 0-.65.083-.887.249-.239.167-.358.387-.358.661zm5.458-8.071v.981l-1.107.285c.203.316.303.67.303 1.063 0 .758-.264 1.349-.794 1.773-.528.424-1.263.636-2.204.636l-.347-.019-.284-.032c-.199.152-.298.321-.298.507 0 .277.354.417 1.062.417h1.202c.776 0 1.368.167 1.775.5.406.333.61.822.61 1.467 0 .826-.345 1.467-1.034 1.922-.69.455-1.68.683-2.97.683-.986 0-1.74-.172-2.261-.515-.521-.343-.781-.826-.781-1.445 0-.426.133-.782.399-1.069.265-.286.655-.492 1.17-.614a1.278 1.278 0 01-.519-.414.988.988 0 01-.222-.61c0-.27.078-.494.235-.674.156-.179.382-.355.677-.528a1.89 1.89 0 01-.883-.772c-.217-.353-.326-.771-.326-1.252 0-.771.251-1.368.753-1.79.501-.421 1.218-.632 2.151-.632.197 0 .432.018.705.053.271.036.445.063.521.079h2.467zm4.577-.132c.262 0 .479.019.653.057l-.146 1.809a2.215 2.215 0 00-.569-.064c-.616 0-1.096.159-1.44.475-.343.316-.514.759-.514 1.328v3.599h-1.93v-7.072h1.461l.285 1.19h.095c.219-.397.515-.716.888-.958a2.197 2.197 0 011.217-.364m5.159 3.927l-.747.026c-.56.016-.977.118-1.252.303-.274.186-.411.468-.411.848 0 .544.313.815.937.815.446 0 .804-.127 1.071-.385.268-.257.402-.599.402-1.025v-.582zm.569 3.277l-.373-.961h-.05c-.325.408-.659.692-1.003.85-.344.159-.792.238-1.344.238-.678 0-1.214-.195-1.603-.582-.39-.388-.585-.941-.585-1.658 0-.751.263-1.303.787-1.66.525-.356 1.316-.554 2.375-.592l1.227-.038v-.309c0-.717-.367-1.075-1.1-1.075-.566 0-1.23.17-1.992.512l-.639-1.302c.813-.426 1.716-.64 2.706-.64.949 0 1.677.207 2.183.62.506.413.758 1.042.758 1.885v4.712h-1.347zm9.053 0h-1.929v-4.13c0-.51-.086-.893-.257-1.149-.17-.255-.439-.381-.806-.381-.493 0-.851.18-1.075.544-.223.362-.335.958-.335 1.789v3.327h-1.93v-7.072h1.474l.26.906h.107c.19-.326.464-.579.823-.763a2.66 2.66 0 011.233-.275c1.058 0 1.774.345 2.15 1.038h.17c.191-.329.47-.584.839-.766a2.782 2.782 0 011.249-.272c.801 0 1.407.206 1.819.617.411.411.616 1.069.616 1.976v4.611h-1.936v-4.13c0-.51-.085-.893-.256-1.149-.171-.255-.439-.381-.806-.381-.472 0-.825.168-1.059.505-.234.337-.351.872-.351 1.607v3.548m12.114 0h-1.929v-4.13c0-.51-.086-.893-.257-1.149-.17-.255-.439-.381-.805-.381-.494 0-.852.18-1.076.544-.223.362-.335.958-.335 1.789v3.327h-1.929v-7.072h1.473l.26.906h.108c.189-.326.463-.579.822-.763a2.66 2.66 0 011.233-.275c1.058 0 1.775.345 2.151 1.038h.17c.19-.329.469-.584.838-.766a2.788 2.788 0 011.249-.272c.801 0 1.408.206 1.819.617.411.411.616 1.069.616 1.976v4.611h-1.936v-4.13c0-.51-.085-.893-.255-1.149-.171-.255-.44-.381-.807-.381-.472 0-.825.168-1.059.505-.234.337-.351.872-.351 1.607v3.548m8.755-5.831c-.409 0-.73.13-.962.388-.232.26-.364.627-.399 1.104h2.707c-.007-.477-.132-.844-.373-1.104-.24-.258-.564-.388-.973-.388zm.271 5.958c-1.138 0-2.028-.315-2.669-.943-.64-.629-.961-1.518-.961-2.669 0-1.185.296-2.101.889-2.748.592-.647 1.411-.971 2.457-.971.999 0 1.777.285 2.334.854.557.569.834 1.356.834 2.359v.936h-4.56c.022.548.184.977.488 1.284.303.308.729.461 1.277.461a5.28 5.28 0 001.208-.133c.38-.088.775-.229 1.189-.424v1.494a4.499 4.499 0 01-1.082.376 6.82 6.82 0 01-1.404.124z"></path>
            </svg><svg class="wfp--footer__cta-logo-small" fill-rule="evenodd" height="86" viewBox="0 0 57 86" width="57" aria-label="WFP" alt="WFP">
              <title>WFP</title>
              <path d="M2.535 79.1h.513c.479 0 .838-.095 1.076-.285.238-.189.357-.464.357-.827 0-.365-.1-.635-.3-.809-.199-.175-.512-.262-.937-.262h-.709V79.1zm3.52-1.167c0 .791-.247 1.396-.742 1.815-.494.419-1.197.629-2.11.629h-.668v2.615H.975V75.64h2.349c.892 0 1.57.191 2.035.575.464.385.696.957.696 1.718zm3.892-.669c.208 0 .38.015.518.045l-.116 1.438a1.783 1.783 0 00-.453-.05c-.489 0-.87.126-1.144.377-.273.252-.409.604-.409 1.057v2.861H6.809v-5.623H7.97l.227.945h.075c.174-.314.41-.568.706-.761.297-.193.62-.289.969-.289m2.306 2.907c0 .557.091.978.274 1.263.182.284.48.426.892.426.409 0 .704-.141.883-.424.179-.284.269-.706.269-1.265 0-.557-.09-.974-.271-1.253-.181-.277-.478-.417-.89-.417-.41 0-.705.139-.886.415-.181.276-.271.695-.271 1.255zm3.887 0c0 .915-.241 1.631-.724 2.147-.483.517-1.155.775-2.017.775-.539 0-1.015-.118-1.428-.355a2.367 2.367 0 01-.951-1.018c-.221-.443-.331-.959-.331-1.549 0-.919.239-1.633.719-2.143.479-.509 1.153-.764 2.022-.764.54 0 1.016.117 1.428.352.412.235.729.572.95 1.011.222.439.332.954.332 1.544zm1.954-.961c0 .306.069.547.209.725.139.177.351.266.636.266.288 0 .499-.089.633-.266.134-.178.201-.419.201-.725 0-.677-.278-1.016-.834-1.016-.564 0-.845.339-.845 1.016zm-.558 4.577c0 .211.101.377.304.498.203.12.487.181.852.181.55 0 .981-.075 1.293-.227.312-.15.467-.356.467-.618 0-.212-.092-.357-.276-.437-.184-.081-.47-.121-.855-.121h-.795c-.282 0-.517.066-.706.199a.609.609 0 00-.284.525zm4.34-6.418v.78l-.881.226c.162.252.242.533.242.846 0 .603-.21 1.073-.631 1.41-.421.337-1.005.506-1.753.506l-.276-.016-.226-.025c-.158.121-.237.255-.237.402 0 .222.281.332.845.332h.955c.617 0 1.087.133 1.411.398.324.264.485.654.485 1.167 0 .657-.273 1.167-.822 1.529-.548.361-1.335.543-2.361.543-.785 0-1.384-.137-1.798-.41-.414-.274-.621-.657-.621-1.15 0-.339.105-.622.317-.849.211-.228.521-.391.93-.489a1.007 1.007 0 01-.412-.329.777.777 0 01-.176-.485c0-.215.062-.393.186-.535.124-.143.303-.283.538-.42a1.514 1.514 0 01-.702-.614 1.875 1.875 0 01-.259-.996c0-.614.199-1.087.599-1.423.399-.335.969-.503 1.71-.503.157 0 .344.014.56.043.217.028.355.049.415.062h1.962zm3.638-.105c.208 0 .38.015.518.045l-.116 1.438a1.78 1.78 0 00-.452-.05c-.489 0-.871.126-1.144.377-.274.252-.41.604-.41 1.057v2.861h-1.534v-5.623h1.161l.227.945h.075c.175-.314.41-.568.707-.761a1.74 1.74 0 01.968-.289m4.103 3.123l-.593.02c-.447.014-.779.094-.996.241-.218.148-.327.373-.327.674 0 .433.248.65.744.65.356 0 .64-.103.853-.308.213-.204.319-.476.319-.814v-.463zm.453 2.605l-.297-.764h-.04c-.259.325-.524.55-.797.676-.274.126-.63.189-1.069.189-.54 0-.965-.155-1.275-.463-.31-.309-.465-.747-.465-1.318 0-.596.208-1.037.626-1.32.417-.283 1.047-.44 1.888-.471l.976-.029v-.247c0-.569-.291-.854-.875-.854-.449 0-.977.135-1.584.407l-.508-1.036a4.567 4.567 0 012.152-.508c.754 0 1.333.164 1.735.493.403.328.604.828.604 1.498v3.747H30.07zm7.197 0h-1.534v-3.284c0-.405-.068-.71-.203-.913-.136-.202-.35-.304-.642-.304-.392 0-.677.144-.855.433-.178.288-.266.763-.266 1.423v2.645h-1.534v-5.623h1.172l.206.72h.085c.151-.259.369-.46.654-.607.285-.145.612-.218.981-.218.841 0 1.412.275 1.71.825h.136c.15-.262.373-.465.666-.608.293-.145.624-.217.993-.217.637 0 1.12.164 1.446.49.327.327.49.852.49 1.572v3.666h-1.538v-3.284c0-.405-.068-.71-.204-.913-.136-.202-.349-.304-.641-.304-.376 0-.657.134-.843.403-.186.267-.279.693-.279 1.277v2.821m9.632 0h-1.534v-3.284c0-.405-.068-.71-.204-.913-.135-.202-.349-.304-.641-.304-.392 0-.677.144-.855.433-.178.288-.266.763-.266 1.423v2.645h-1.534v-5.623h1.171l.207.72h.085c.151-.259.369-.46.654-.607.285-.145.612-.218.981-.218.841 0 1.411.275 1.71.825h.135c.151-.262.373-.465.667-.608.293-.145.624-.217.993-.217.637 0 1.119.164 1.446.49.327.327.49.852.49 1.572v3.666h-1.538v-3.284c0-.405-.068-.71-.205-.913-.135-.202-.349-.304-.641-.304-.375 0-.656.134-.842.403-.186.267-.279.693-.279 1.277v2.821m6.96-4.637c-.325 0-.58.103-.764.309-.184.207-.29.499-.317.878h2.153c-.007-.379-.106-.671-.297-.878-.191-.206-.449-.309-.775-.309zm.217 4.738c-.906 0-1.613-.25-2.123-.749-.51-.5-.764-1.207-.764-2.123 0-.942.235-1.67.706-2.185.471-.515 1.123-.772 1.954-.772.795 0 1.414.226 1.856.678.442.454.664 1.079.664 1.876v.745h-3.626c.017.436.146.776.387 1.021.241.245.58.367 1.016.367.338 0 .659-.035.96-.105.302-.071.617-.183.946-.337v1.186a3.547 3.547 0 01-.86.3 5.376 5.376 0 01-1.116.098zM8.306 71.654H6.531l-.996-3.862c-.037-.138-.1-.422-.188-.853a9.897 9.897 0 01-.154-.867c-.019.181-.07.472-.15.872a19.25 19.25 0 01-.187.858l-.99 3.852h-1.77L.22 64.302h1.534l.94 4.012c.164.742.283 1.384.357 1.927.02-.191.066-.487.138-.887.073-.401.14-.712.203-.933l1.072-4.119h1.473l1.072 4.119c.047.184.105.466.176.845.071.379.123.704.161.975.034-.262.088-.588.161-.978.074-.391.14-.706.201-.949l.935-4.012h1.535l-1.872 7.352m3.586-2.821c0 .557.091.978.274 1.263.182.284.48.427.892.427.41 0 .705-.142.883-.425.18-.284.27-.705.27-1.265 0-.557-.091-.974-.272-1.253-.181-.277-.478-.417-.89-.417-.409 0-.704.139-.885.415-.182.276-.272.695-.272 1.255zm3.888 0c0 .915-.242 1.631-.724 2.147-.483.517-1.156.775-2.017.775-.54 0-1.016-.118-1.429-.355a2.365 2.365 0 01-.95-1.018c-.222-.442-.332-.959-.332-1.549 0-.919.239-1.633.719-2.143.479-.509 1.154-.764 2.022-.764.54 0 1.016.117 1.428.352.413.235.729.572.951 1.011.221.44.332.954.332 1.544zm4.211-2.907c.208 0 .38.015.518.045l-.116 1.438a1.783 1.783 0 00-.453-.05c-.489 0-.87.126-1.143.377-.274.252-.41.604-.41 1.057v2.861h-1.535v-5.623h1.163l.226.946h.075c.174-.315.41-.569.706-.762.297-.193.62-.289.969-.289m1.326 5.728h1.534v-7.825h-1.534zm5.311-1.121c.392 0 .679-.114.862-.343.183-.227.282-.615.3-1.161v-.166c0-.603-.094-1.036-.279-1.298-.187-.261-.49-.392-.909-.392a.9.9 0 00-.796.435c-.19.29-.285.712-.285 1.265 0 .554.096.968.286 1.245.192.277.465.415.821.415zm-.538 1.222c-.661 0-1.18-.257-1.557-.77-.377-.512-.565-1.223-.565-2.132 0-.922.191-1.64.575-2.155.384-.514.913-.772 1.587-.772.707 0 1.247.275 1.619.825h.051a6.294 6.294 0 01-.117-1.122v-1.8h1.54v7.825h-1.177l-.297-.729h-.066c-.348.554-.879.83-1.593.83zm8.593-.101h-1.534v-7.352h4.215v1.277h-2.681v1.896h2.496v1.272h-2.496v2.907m5.015-2.821c0 .557.092.978.275 1.263.182.284.48.427.892.427.409 0 .703-.142.883-.425.179-.284.268-.705.268-1.265 0-.557-.089-.974-.271-1.253-.181-.277-.477-.417-.89-.417-.409 0-.704.139-.885.415-.181.276-.272.695-.272 1.255zm3.888 0c0 .915-.241 1.631-.724 2.147-.483.517-1.155.775-2.017.775-.539 0-1.016-.118-1.428-.355a2.361 2.361 0 01-.951-1.018c-.221-.442-.331-.959-.331-1.549 0-.919.239-1.633.718-2.143.48-.509 1.154-.764 2.022-.764.54 0 1.016.117 1.429.352.412.235.729.572.95 1.011.221.44.332.954.332 1.544zm2.328 0c0 .557.091.978.273 1.263.183.284.481.427.893.427.409 0 .704-.142.883-.425.18-.284.269-.705.269-1.265 0-.557-.091-.974-.271-1.253-.182-.277-.479-.417-.891-.417-.409 0-.704.139-.884.415-.182.276-.272.695-.272 1.255zm3.888 0c0 .915-.242 1.631-.725 2.147-.482.517-1.155.775-2.016.775-.541 0-1.016-.118-1.429-.355a2.367 2.367 0 01-.951-1.018c-.221-.442-.332-.959-.332-1.549 0-.919.24-1.633.719-2.143.48-.509 1.155-.764 2.023-.764.54 0 1.015.117 1.428.352.412.235.729.572.951 1.011.22.44.332.954.332 1.544zm3.446 1.7c.392 0 .68-.114.863-.343.183-.227.283-.615.299-1.161v-.166c0-.603-.093-1.036-.279-1.298-.186-.261-.488-.392-.908-.392a.9.9 0 00-.797.435c-.19.29-.285.712-.285 1.265 0 .554.096.968.288 1.245.191.277.464.415.819.415zm-.538 1.222c-.66 0-1.179-.257-1.557-.77-.377-.512-.565-1.223-.565-2.132 0-.922.192-1.64.576-2.155.384-.514.912-.772 1.587-.772.707 0 1.247.275 1.619.825h.05a6.276 6.276 0 01-.115-1.122v-1.8h1.539v7.825h-1.177l-.297-.729h-.065c-.349.554-.88.83-1.595.83zM35.847 4.482h.548c.512 0 .895-.101 1.149-.303.254-.202.382-.497.382-.884 0-.39-.107-.678-.32-.864-.213-.186-.547-.28-1.002-.28h-.757v2.331zm3.76-1.246c0 .845-.264 1.492-.793 1.939-.528.448-1.278.672-2.253.672h-.714V8.64h-1.665V.787h2.508c.953 0 1.677.205 2.173.615.496.411.744 1.021.744 1.834zM30.071 8.64h-1.638V.787h4.5v1.364h-2.862v2.026h2.664v1.358h-2.664V8.64zm-4.526 0h-1.896l-1.063-4.126c-.04-.146-.107-.45-.201-.91a9.914 9.914 0 01-.164-.926c-.022.194-.076.504-.161.932-.086.427-.153.733-.199.915L20.803 8.64h-1.89L16.909.787h1.638l1.005 4.286c.175.791.302 1.477.38 2.057.022-.204.071-.52.148-.947a10.5 10.5 0 01.218-.997L21.442.787h1.573l1.145 4.399c.05.197.112.498.188.902.075.405.132.752.171 1.042.036-.279.094-.628.172-1.045.079-.416.151-.754.216-1.012l.998-4.286h1.638L25.545 8.64zm-4.072 27.312c-3.051 0-5.01.725-5.544.949-.032.014-.058-.031-.033-.055 3.352-3.486 7.278-3.293 8.222-3.293H35.28c.562 0 1.018.537 1.018 1.2 0 .662-.456 1.199-1.018 1.199H21.473zm2.514 3.085c-3.287 0-4.245-1.868-9.222-.635-.034.009-.057-.038-.028-.057 2.775-1.904 5.792-1.731 7.011-1.731H35.28c.562 0 1.018.537 1.018 1.199 0 .663-.456 1.2-1.018 1.2 0 0-8.69.024-11.293.024zm.234 3.037c-3.375 0-3.645-2.49-8.647-3.051-.035-.003-.039-.055-.005-.064 4.11-1.027 5.638.716 8.037.716H35.28c.562 0 1.018.537 1.018 1.199 0 .663-.456 1.2-1.018 1.2H24.221zm-.733-9.182c-2.716 0-4.968 1.184-5.495 1.483-.029.017-.059-.019-.04-.046.441-.648 2.82-3.837 6.911-3.837H35.28c.562 0 1.018.537 1.018 1.2 0 .662-.456 1.2-1.018 1.2H23.488zm14.941-6.625a.741.741 0 00-.443-.205.733.733 0 00-.363.042c.048-.098.087-.204.103-.329a.861.861 0 00-.084-.513c-.336-.736.624-2.208.504-2.275-.116-.063-.662 1.56-1.192 2.217a.922.922 0 00-.199.488.913.913 0 00.086.513c.074.133.187.226.318.234a.294.294 0 00.107-.005.322.322 0 00-.018.058.452.452 0 00.142.388.71.71 0 00.441.207.776.776 0 00.493-.092c.719-.394 2.21-.782 2.178-.92-.029-.138-1.483.715-2.073.192zm1.1-1.074a.63.63 0 00-.407-.199.64.64 0 00-.268.042c.014-.045.032-.085.037-.13a.721.721 0 00-.102-.463c-.365-.677.587-1.955.464-2.019-.123-.064-.645 1.368-1.176 1.934a.688.688 0 00-.196.426.768.768 0 00.099.465.5.5 0 00.339.228.512.512 0 00.179-.021c-.004.008-.011.019-.008.026a.526.526 0 00.139.399.628.628 0 00.404.194.613.613 0 00.433-.117c.619-.446 2.036-.712 2-.855-.035-.139-1.391.611-1.937.09zm.963-.994a.55.55 0 00-.389-.103.535.535 0 00-.196.05c.01-.029.029-.053.039-.083a.7.7 0 00-.024-.43c-.231-.664.793-1.647.693-1.727-.1-.074-.763 1.116-1.309 1.536a.64.64 0 00-.231.354.632.632 0 00.021.427.433.433 0 00.265.255.384.384 0 00.27-.026.408.408 0 00-.024.17c.013.135.079.25.187.329.102.08.241.12.386.109a.585.585 0 00.367-.175c.491-.497 1.714-.962 1.664-1.082-.052-.119-1.152.765-1.719.396zm1.895-2.134c-.102-.151-.958.787-1.591.877a.67.67 0 00-.359.178.704.704 0 00-.221.361.382.382 0 00.055.325.331.331 0 00.3.109.66.66 0 00.365-.181.742.742 0 00.215-.356c.191-.643 1.312-1.214 1.236-1.313zm-17.694 1.27c-.026.094-.21.816-.21.816-.052.03-.273-.018-.331-.024-.422-.04-.8-.406-.637-.845.132-.358.403-.396.748-.411.142-.007.399.027.528.116 0 0-.051.165-.098.348zm-.486 2.182l-.039.247c-.262-.164-.417-.542-.291-.84.097-.225.337-.285.514-.295a49.8 49.8 0 00-.184.888zm-.377 2.697c-.033.185-.284.21-.455.261-.495.148-.965.085-1.117-.508-.166-.635.315-.901.829-1.026.281-.066.54-.01.732.226.049.059.105.112.118.168 0 0-.076.705-.107.879zm-1.562-3.122c.383-.093.779-.237 1.073.141.31.395.208 1.031-.291 1.198-.328.111-.724.207-1.005-.061-.367-.351-.341-1.148.223-1.278zm-.375-2.057c.404-.098.821-.247 1.131.149.323.415.215 1.084-.307 1.259-.346.115-.764.216-1.058-.066-.386-.367-.357-1.204.234-1.342zm-.376 4.445c-.105.37-.409.426-.729.503-.21-.258-.773-.909-.784-.986a.202.202 0 01.012-.09c.026-.077.116-.152.181-.194.192-.125.601-.218.822-.173.396.085.603.569.498.94zm-2.004-1.899c-.29-1.023 1.427-1.47 1.692-.465.273 1.031-1.459 1.469-1.692.465zm-.252-2.043c-.294-1.018 1.43-1.465 1.695-.466.273 1.034-1.462 1.472-1.695.466zm-.242-2.009c-.281-.949 1.338-1.369 1.585-.433.255.962-1.364 1.376-1.585.433zm-.165 3.866c-.08.047-.11.072-.136.072l-.771-.838c.009-.023.248-.196.327-.241.64-.356 1.168.661.58 1.007zm-1.462-1.887c-.381-.84 1.005-1.751 1.425-.845.385.835-1 1.762-1.425.845zm1.165-2.659c.438.778-.882 1.647-1.26.81-.336-.723.838-1.565 1.26-.81zm-1.107-1.815c.194-.172.419-.266.65-.155.371.179.381.734.058.954-.147.102-.396.226-.577.181-.397-.101-.472-.679-.131-.98zm.049-1.669c.161-.108.373-.205.557-.13.334.136.323.621.052.815-.123.088-.346.197-.496.157-.338-.085-.421-.633-.113-.842zm.888-2.378c.198-.108.485-.152.664.048a.468.468 0 01-.134.733c-.213.107-.499.146-.667-.051a.48.48 0 01.137-.73zm-.158 1.806c-.16-.595.843-.876 1.005-.271.181.588-.845.88-1.005.271zm1.617 1.04c.233.643-.856 1.007-1.068.372-.218-.643.876-1.01 1.068-.372zm.136-3.133c.208-.084.474-.173.706 0 .289.216.226.701-.105.853-.218.098-.496.164-.69-.008-.247-.221-.26-.705.089-.845zm-.192 5.381c-.294.068-.6.186-.844-.067-.313-.322-.223-.885.199-1.039.273-.103.62-.162.843.066.285.293.254.931-.198 1.04zm.006-3.285c-.189-.637.85-.964 1.05-.345.204.635-.872.972-1.05.345zm1.74 1.169c.244.728-.987 1.117-1.213.399-.228-.733 1.011-1.121 1.213-.399zm.065-1.95c.217-.058.447-.037.612.141.252.271.165.733-.207.802-.176.032-.447.019-.583-.101-.247-.217-.235-.731.178-.842zm1.05 1.528c.396 0 .596.582.365.872-.139.175-.439.186-.643.154-.378-.059-.619-.545-.365-.875.155-.199.42-.151.643-.151zm-1.903 2.397c-.244-.837 1.179-1.212 1.397-.38.22.845-1.21 1.217-1.397.38zm.872 1.071c.388-.04.792-.131 1.031.276.25.43.063 1.028-.441 1.129-.33.069-.732.101-.968-.191-.31-.388-.186-1.162.378-1.214zm1.975-1.865c.479.198.641.765.303 1.081-.181.165-.512.132-.735.087-.446-.087-.738-.758-.346-1.076.2-.163.559-.182.778-.092zm.754 2.019c.302.369.189 1.022-.338 1.055-.276.015-.636-.016-.822-.242-.299-.362-.186-1.039.341-1.058.276-.01.633.019.819.245zm2.04-6.665a.122.122 0 00-.135-.05c-.063.021-.105.091-.081.152 1.205 3.236-.333 4.83-.976 7.097-.772-1.842 1.784-3.574.467-6.93a.135.135 0 00-.1-.085c-.065-.008-.128.019-.139.106-.034.237-.189 2.097-1.698 3.186a3.001 3.001 0 00-.703-1.02c-.139-.627-.548-1.488-1.409-1.743-.129-.324-.389-.79-.888-1.039-.469-.234-1.012-.213-1.616.061-.73.085-1.231.369-1.496.845-.249.449-.205.938-.121 1.27-.614.656-.643 1.629-.627 2.009-.365.876-.16 1.9-.045 2.325-.435 1.19-.01 2.346.16 2.729 0 .103.006.202.011.3-1.428-1.563-4.677-3.497-5.918-4.235a.148.148 0 00-.181.021.152.152 0 00-.008.217c2.769 2.7 5.238 6.032 7.611 12.946 1.184-1.23 3.322-2.849 6.367-2.849h3.561c-2.263-8.428 1.032-11.444-2.036-15.313zm16.835 4.358c-.651-.17-4.808-.906-9.466 7.663.679-3.191 2.745-7.052 3.312-8.173v-.008a.155.155 0 00-.042-.191.135.135 0 00-.189.034c-3.079 5.134-4.16 8.091-4.798 11.63h1.929c.328-3.411 4.638-11.449 9.23-10.851h.005c.027.005.05-.016.053-.04a.048.048 0 00-.034-.064zm-9.262 28.233l-1.042-4.356h-1.774c.281 1.106.682 2.23 1.202 3.215.035.059.098.094.161.083a.163.163 0 00.133-.189c-.121-.922-.265-1.812-.401-2.699.375 1.394.881 2.757 1.564 4.012.018.039.058.058.094.045.05-.011.076-.063.063-.111zm1.793-1.978c-.181-.727-.37-1.621-.533-2.378h-.674c.262.808.616 1.709.931 2.48.032.074.103.111.171.093a.161.161 0 00.105-.195zm.225 2.562l-.005-.011c-.218-.608-.519-1.153-.758-1.737a23.043 23.043 0 01-.706-1.759 21.001 21.001 0 01-.491-1.433h-.651c.184.545.423 1.132.646 1.659.491 1.187 1.058 2.351 1.779 3.392a.102.102 0 00.123.035c.058-.021.084-.088.063-.146zm.974-20.901c-.05-.074-.17-.09-.228-.029a13.347 13.347 0 00-2.147 3.068h.704c.351-.826 1.144-2.285 1.653-2.81l.005-.006a.18.18 0 00.013-.223zM31.6 20.729c.651-1.068 1.617-1.887 2.436-2.875a.099.099 0 00-.008-.128.083.083 0 00-.118-.002 12.49 12.49 0 01-.58.571c-.086-.043-.307.042-.53.218-.176.138-.302.292-.347.403-.112-.026-.325.107-.517.352-.157.204-.249.42-.246.552-.121.011-.297.165-.446.409a1.327 1.327 0 00-.182.449 1.247 1.247 0 00-.309.354c-.134.223-.202.449-.181.579-.032.056-.063.109-.09.165l.016-.133c.192-1.512.47-3.011.892-4.456.426-1.44.935-2.893 1.809-4.06l.005-.005a.166.166 0 00-.016-.21.138.138 0 00-.205-.003c-.302.321-.556.68-.784 1.049-.1-.053-.31.144-.47.452-.147.279-.199.537-.144.636 0 0-.003.007-.008.005-.105-.046-.299.188-.417.502-.116.295-.137.566-.058.656-.005.005-.005.008-.008.013-.118-.042-.31.226-.428.606-.097.322-.108.601-.037.713.006.004 0 .018-.005.015-.121-.042-.304.234-.412.611-.108.364-.1.686.003.749-.118-.013-.284.264-.37.638-.079.324-.071.604.005.715-.116.035-.244.306-.31.656-.063.343-.031.628.053.718-.108.056-.218.335-.258.68-.039.343.011.625.1.715-.089.101-.175.34-.212.627-.037.273-.014.51.039.643-.097.083-.17.359-.173.691-.008.266.031.491.1.622-.053.132-.09.327-.09.542-.005.279.04.518.11.643-.02.98-.007 2.025.045 3.007h2.118a30.77 30.77 0 01.142-2.356c.15-1.35.373-2.721 1.047-3.874l.005-.008a.115.115 0 00-.013-.128c-.039-.034-.095-.034-.131.008-.916 1.063-1.318 2.506-1.554 3.89-.042.271-.076.545-.107.816.057-1.111.16-2.216.414-3.268.292-1.281.874-2.501 1.984-3.184a.098.098 0 00.04-.111c-.014-.051-.066-.08-.111-.067-.071.022-.136.059-.204.088-.074-.09-.344-.024-.622.154-.265.173-.441.385-.423.502 0 .006-.013.014-.013.003-.002-.013-.005-.027-.013-.034-.1-.083-.367.103-.593.419-.228.316-.318.646-.221.731.006.002.003.011-.002.011-.118-.048-.315.22-.439.595-.089.263-.11.505-.078.643 0 .005-.006.01-.006.01-.091.304-.168.609-.238.92.026-.439.065-.88.128-1.315.187-1.255.565-2.482 1.236-3.529zm6.664-3.497a.74.74 0 00-.486-.037.8.8 0 00-.325.17.924.924 0 00-.018-.345.832.832 0 00-.253-.45c-.572-.571-.178-2.29-.312-2.311-.131-.019-.084 1.695-.354 2.497a.92.92 0 00-.019.529.896.896 0 00.26.452c.113.098.25.143.378.103a.227.227 0 00.097-.042c0 .021 0 .042.003.064.029.14.129.25.265.313a.71.71 0 00.488.037.777.777 0 00.428-.26c.538-.624 1.803-1.515 1.727-1.634-.076-.117-1.145 1.196-1.879.914zm2.446-2.166c-.082-.116-1.094 1.066-1.785.771a.637.637 0 00-.452-.043.685.685 0 00-.235.133c-.003-.048 0-.09-.011-.133a.706.706 0 00-.254-.398c-.578-.505-.124-2.041-.26-2.057-.139-.016-.137 1.512-.436 2.23a.687.687 0 00-.037.467.719.719 0 00.255.401.488.488 0 00.394.094.488.488 0 00.16-.083c0 .008-.003.019 0 .027.042.146.141.26.27.327a.64.64 0 00.446.037.634.634 0 00.365-.26c.427-.641 1.661-1.39 1.58-1.513zm.249-1.479c-.089-.093-.816 1.123-1.475.977a.561.561 0 00-.399.04.562.562 0 00-.168.117c0-.029.008-.058.008-.09a.672.672 0 00-.17-.394c-.444-.542.173-1.825.054-1.865-.12-.035-.33 1.316-.697 1.903a.625.625 0 00-.095.412.654.654 0 00.168.396c.095.098.21.151.336.143a.368.368 0 00.244-.12c0 .054.01.112.037.168.058.122.16.207.286.242.123.04.27.029.402-.035a.601.601 0 00.283-.292c.288-.641 1.273-1.509 1.186-1.602zm-.436-1.691c-.149-.106-.624 1.077-1.189 1.385a.683.683 0 00-.275.295.715.715 0 00-.079.414c.014.125.071.232.163.285a.316.316 0 00.315-.003.677.677 0 00.281-.297.747.747 0 00.078-.413c-.042-.669.811-1.599.706-1.666zM30.165 42.735h-5.944a6.256 6.256 0 01-1.102-.09c.976 1.451 2.506 2.551 4.057 3.29.239 1.323.538 2.547.645 2.643.11.096 1.632-.343 1.68-.483.044-.141-.622-2.408-.622-2.408.801-1.374 1.047-2.184 1.286-2.952zm14.954 10.169c-1.501.593-3.459.643-5.058.218-3.661-1.14-7.726-3.3-11.628-1.507-3.903-1.793-7.968.367-11.629 1.507-1.598.425-3.556.375-5.057-.218a.039.039 0 00-.037.067c2.16 1.671 5.186 2.439 7.91 1.456 2.617-.816 4.829-3.587 7.928-2.405-2.453.959-4.747 2.729-6.519 4.4l1.289 1.057c1.609-1.873 3.42-3.746 5.469-4.885.281-.165.449-.232.646-.242.197.01.365.077.643.242 2.052 1.139 3.863 3.012 5.472 4.885l1.288-1.057c-1.771-1.671-4.065-3.441-6.519-4.4 3.099-1.182 5.312 1.589 7.928 2.405 2.725.983 5.75.215 7.911-1.456.034-.03.005-.082-.037-.067zM20.99 50.38c-3.827-.928-4.873-4.515-8.073-6.071-.034-.019-.07.021-.049.052 1.007 1.659 1.553 4.199 4.458 5.764.024.013.011.051-.016.042-4.167-.802-5.918.313-10.285-1.66-.036-.017-.075.023-.052.058 1.436 2.083 4.842 3.507 9.508 3.115 1.68-.144 2.898-.851 4.509-1.228.039-.011.039-.064 0-.072zm-8.015-2.2c-1.454-1.906-1.039-5.973-4.322-9.696-.027-.029-.074-.005-.066.032.627 2.742.441 5.856 2.157 8.138.016.025-.008.048-.031.033-3.386-2.666-6.865-3.468-8.414-5.625-.024-.03-.071-.014-.066.023.384 2.793 5.748 7.145 10.713 7.153.029 0 .048-.034.029-.058zm-5.084-5.065c-1.558-2.89.305-7.302-1.464-11.588-.018-.045-.086-.034-.086.014-.053 2.341-1.507 5.835-.628 8.474.011.023-.021.037-.034.015-2.239-3.27-4.015-3.954-5.496-6.948-.02-.045-.088-.032-.091.016-.095 2.035.805 3.693 1.821 5.234a17.39 17.39 0 005.929 4.836c.034.017.065-.019.049-.053zM6.834 25.509c-.003-.048-.066-.064-.089-.021-1.189 2.224-3.307 3.993-3.375 6.93-.003.029-.035.031-.04.005-.385-2.267-2.309-4.807-2.393-8.089 0-.05-.071-.063-.089-.015-1.583 4.267.692 8.314 3.115 11.657.026.034.078.013.078-.033-.099-3.542 2.972-6.185 2.793-10.434zm1.512-5.522c-1.123 1.56-3.651 2.663-4.575 4.913-.013.033-.052.024-.047-.013.367-2.521-.606-5.45.307-8.8.013-.048-.047-.08-.076-.043-1.38 1.698-1.848 3.688-1.924 5.838-.094 2.641.835 4.568 1.294 6.359.01.042.065.039.076-.003.661-2.349 3.981-3.762 5.021-8.213.013-.048-.048-.077-.076-.038zm3.046-5.245c-1.847 1.448-4.669 2.843-5.274 3.851-.011.021-.042.005-.037-.016l.684-3.287c.308-1.395.573-2.732 1.344-3.981.024-.037-.021-.08-.055-.053-3.516 2.785-3.002 6.813-3.157 10.111-.003.034.039.05.063.026 2.071-2.245 5.446-3.553 6.49-6.605.013-.037-.026-.07-.058-.046zm2.617-5.048c-3.107.098-5.39 2.715-6.369 6.047-.006.019.021.035.036.024 4.281-3.138 4.042-4.482 6.359-5.975.042-.027.024-.096-.026-.096zm35.828 38.813c-4.364 1.973-6.117.858-10.285 1.66-.026.009-.039-.029-.016-.042 2.906-1.565 3.452-4.105 4.459-5.764.021-.031-.015-.071-.049-.052-3.197 1.556-4.244 5.143-8.073 6.071-.04.008-.04.061 0 .072 1.611.377 2.829 1.084 4.509 1.228 4.666.392 8.075-1.032 9.508-3.115.024-.035-.016-.075-.053-.058zm4.727-7.445c-1.549 2.157-5.028 2.959-8.414 5.625-.021.015-.047-.008-.029-.033 1.714-2.282 1.528-5.396 2.155-8.138.008-.037-.039-.061-.066-.032-3.28 3.723-2.868 7.79-4.32 9.696a.036.036 0 00.029.058c4.966-.008 10.327-4.36 10.711-7.153.005-.037-.042-.053-.066-.023zm2.207-7.964c-.002-.048-.071-.061-.092-.016-1.48 2.994-3.257 3.678-5.493 6.948-.015.022-.044.008-.036-.015.879-2.639-.573-6.133-.628-8.474 0-.048-.068-.059-.086-.014-1.769 4.286.094 8.698-1.462 11.588-.018.034.013.07.047.053a17.39 17.39 0 005.929-4.836c1.015-1.541 1.916-3.199 1.821-5.234zm-.756-8.779c-.018-.048-.089-.035-.089.015-.084 3.282-2.008 5.822-2.393 8.089-.006.026-.037.024-.037-.005-.068-2.937-2.189-4.706-3.378-6.93a.045.045 0 00-.086.021c-.179 4.249 2.889 6.892 2.789 10.434 0 .046.055.067.082.033 2.419-3.343 4.695-7.39 3.112-11.657zm-1.183-2.437c-.076-2.15-.544-4.14-1.924-5.838-.029-.037-.087-.005-.076.043.913 3.35-.061 6.279.309 8.8.006.037-.036.046-.049.013-.924-2.25-3.452-3.353-4.574-4.913-.027-.039-.087-.01-.077.038 1.039 4.451 4.359 5.864 5.021 8.213.01.042.065.045.076.003.459-1.791 1.388-3.718 1.294-6.359zm-6.024-10.626c-.034-.027-.078.016-.055.053.772 1.249 1.037 2.586 1.344 3.981l.685 3.287c.005.021-.026.037-.037.016-.606-1.008-3.424-2.403-5.274-3.851-.03-.024-.071.009-.059.046 1.045 3.052 4.42 4.36 6.491 6.605.024.024.066.008.063-.026-.155-3.298.36-7.326-3.158-10.111zm-5.954-1.562c-.05 0-.065.069-.027.096 2.318 1.493 2.079 2.837 6.359 5.975.019.011.042-.005.037-.024-.979-3.332-3.262-5.949-6.369-6.047z"></path>
            </svg></div>
        </div>
      </div>
      <div class="wfp--wrapper wfp--wrapper--width-lg wfp--footer__meta">
        <div class="wfp--footer__meta__content">WFP South Sudan intranet hosting locally developed applications. Kindly contact Juba ITService Desk  at juba.itservicedesk@wfp.org,<br> vsat - 2888,  whatsapps - +211926220767 and mobile - 0910682888 for any technical assistance.</div>
      </div>
    </footer>
  </div>
</div>



<script src="js/jquery-2.1.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
		<script>
			$(function ($) {
				$('#myModal').modal({show:true})
			});
			
		</script>
<?php
}

}
else{
	fncDoFormNotLogged();
}	
?>
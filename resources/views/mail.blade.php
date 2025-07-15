<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
?>

<title>Enquiry - Depal</title>
<?php $contact = "menu-active"; include"include/header.php";?>

		<section class="breadcrum content2">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2>Enquiry</h2>
						<a href="<?php echo $url;?>">home</a>
						<a href="#"><i class="fa fa-long-arrow-right"></i></a>
						<a href="#">contact</a>
					</div>
				</div>
			</div>
		</section>
		
		<section class="h-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<?php
						if(isset($_POST['submit'])){
						$name=$_POST['name'];
						$email=$_POST['email'];						
						$mobile=$_POST['mobile'];
						$message=$_POST['message'];
						
						$to = "avwebsolutioninfo@gmail.com";
						$subject = "New Enquiry";
						$messages =  "<table border='1' cellpadding='4'><tr><th align='left'>Name</th><td>".$name."</td></tr><tr><th align='left'>Email</th><td>".$email."</td></tr><tr><th align='left'>Mobile</th><td>".$mobile."</td></tr><tr><th align='left'>Message</th><td>".$message."</td></tr></table>";
						$headers = "From: $mobile" . "\r\n" ."Content-type:text/html;charset=UTF-8" . "\r\n";
						
						$retval = mail($to,$subject,$messages,$headers);
						
						if( $retval == true ) {
						echo "<h2 style='color:#0E6621;font-weight:600;margin: 0;'>Your Message has been sent successfully. We will contact you shortly.</h2>";	
						}else {
						echo "<h2 style='color:#8a2507;font-weight:600;margin: 0;'>Our Team is busy at the moment. Contact us directly</h2>";
						}
						}else{
							echo "<h2 style='color:#8a2507;font-weight:600;margin: 0;'>Our team is busy at the moment. Please contact us directly.</h2>";
						}?>				
					</div>
				</div>
			</div>
		</section>

<?php include"include/footer.php";?>
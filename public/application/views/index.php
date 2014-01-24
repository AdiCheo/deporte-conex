<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Deporte Conex</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-responsive.css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>styles.css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.countdown.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.css">
</head>
<body>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span4 center logo">
			<p class="text-center"><img src="img/logo.png" alt="" title="" /></p>
			<h2>COMING SOON</h2>
			<span id="time"></span>
		</div>

		<div class="span5 countdown center">
			<span id="time"></span>
			<div class="clearfix"></div>
		</div>

		<?php echo form_open('',array('id'=>'contact-form')); ?>
		<div class="span8 center body-container">
			<div class="span5 form-container">
				<div class="control-group">
					<label>Name: </label>
					<input name="txtName" type="text" class="input-block-level" required />
				</div>
				<div class="control-group">
					<label>Email: </label>
					<input name="txtEmail" type="text" class="input-block-level" required />
				</div>
				<div class="control-group">
					<label>Country: </label>
					<select name="selCountry" class="input-block-level" required>
						<option value=""></option>
						<?php foreach($country as $cty): ?>
							<option value="<?php echo $cty->id; ?>"><?php echo $cty->country_name; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="control-group" style="margin-bottom: 0;">
					<label>I am a: </label>
					<select name="selIma" class="input-block-level" required>
						<option value=""></option>
						<option value="Parent">Parent</option>
						<option value="Student-Athlete">Student-Athlete</option>
						<option value="High School Coach">High School Coach</option>
						<option value="University Coach">University Coach</option>
						<option value="Director/Executive">Director/Executive</option>
						<option value="Other">Other</option>
					</select>
					<br>
				</div>
				<div class="control-group">
					<label>High School/University: </label>
					<input name="txtSchool" type="text" class="input-block-level" required />
				</div>
				<div class="control-group">
					<label>Message: </label>
					<textarea name="txtMessage" class="input-block-level" cols="30" rows="10" required></textarea>
				</div>
				<div class="control-group">
					<input type="submit" name="btnSubmit" class="btnSubmit btn-block" value="Submit" />
				</div>
			</div>
			<div class="span7 text-container">
				<p style="font-style: italic;">Deporte Conex believes in providing opportunities for international student-athletes. We strive to provide talented student-athletes the exposure and opportunities they deserve. Most importantly, we believe no student-athlete should go unnoticed, or unrewarded, simply because of their physical location.</p>

				<p style="margin-top: 30px;">Ready to take the next step? Reserve your student-athlete profile before it is too late! Deporte Conex can only accept a certain amount of student-athlete profiles so reserve your spot now!"</p>

				<div class="span12 signup" style="margin-left:0;">
					<p class="text-center"><input type="button" name="btnSignup" class="btnSignUp" value="Sign Up Now"
					onclick="signup()" /></p>
				</div>
                <div class="span4 center social-container">
					<div class="span12">
						<p class="text-center">Like us on facebook</p>
						<p class="text-center"><a href="https://www.facebook.com/pages/Deporte-Conex/343228185822437" target="_blank"><div class="social"><i class="icon-facebook icon-large"></i></div></a></p>
					</div>
                </div>
				<div class="clearfix"></div>
				<div class="span7 center"><span class="toll-number">Call us at 1-855-983-2916</span></div>
			</div>
			<div class="clearfix"></div>
		</div>
		<?php echo form_close(); ?>
	</div>
	<span id="time"></span>
</div>
</body>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.countdown.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
<script type="text/javascript">
$('#time').countdown({until: new Date(2014, 2 , 0)});
$("#contact-form").validate();
function signup()
{
	window.location = '<?php echo base_url(); ?>signup';
}
</script>
</html>

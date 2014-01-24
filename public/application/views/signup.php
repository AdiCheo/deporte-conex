<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Deporte Conex</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-responsive.css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>style.css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.countdown.css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.css">
	
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
</head>
<body>
<?php echo form_open('',array('id'=>'signUpForm')); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span4 center logo">
			<p class="text-center"><img src="<?php echo base_url(); ?>img/logo.png" width="300" height="200" alt="" title="" /></p>
		</div>
		<div class="span5 center form-container">
			<div class="control-group">
				<label>Email-Address: </label>
				<input name="txtEmail" type="text" class="input-block-level" required />
			</div>
			<div class="control-group">
				<label>First Name: </label>
				<input name="txtFname" type="text" class="input-block-level" required />
			</div>
			<div class="control-group">
				<label>Last Name: </label>
				<input name="txtLname" type="text" class="input-block-level" required />
			</div>
			<div class="control-group">
				<label>Birthday: </label>
				<input name="txtBirthDate" id="birthdate" type="text" class="input-block-level" required />
			</div>
			<div class="control-group">
				<label>Expected Year of Graduate: </label>
				<?php 
				$months = array(
					'January',
					'February',
					'March',
					'April',
					'May',
					'June',
					'July ',
					'August',
					'September',
					'October',
					'November',
					'December',
				);
				?>
				<div class="span6" style="margin-left: 0;">
				<select name="month" required>
					<option value="">Month</option>
					<?php foreach($months as $month): ?>
					<option value="<?php echo $month; ?>"><?php echo $month; ?></option>
					<?php endforeach; ?>
				</select>
				</div>
				<div class="span6">
				<select name="year" required>
					<option value="">Year</option>
					<?php
					$currentYear = date("Y") - 1;
					for($i = date("Y") + 5; $i > $currentYear; $i--)
					{
					?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
					<?php
					}
					?>
				</select>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="control-group">
				<label>Phonenumber: </label>
				<input name="txtPhone" type="text" class="input-block-level" />
			</div>
			<div class="control-group">
				<div class="span6">
					<label>Mother's Name: </label>
					<input name="txtMother" type="text" class="input-block-level" required />
				</div>
				<div class="span6">
					<label>Email-Address: </label>
					<input name="txtMotherEmail" type="text" class="input-block-level" />
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="control-group">
				<div class="span6">
					<label>Father's Name: </label>
					<input name="txtFather" type="text" class="input-block-level" />
				</div>
				<div class="span6">
					<label>Email-Address: </label>
					<input name="txtFatherEmail" type="text" class="input-block-level" />
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="control-group">
				<fieldset>
					<legend>Home Address</legend>
					<div class="control-group">
						<label>Street Address: </label>
						<input name="txtStreet" type="text" class="input-block-level" />
					</div>
					<div class="control-group">
						<label>Address Line 2: </label>
						<input name="txtStreetTwo" type="text" class="input-block-level" />
					</div>
					<div class="control-group">
						<label>City: </label>
						<input name="txtCity" type="text" class="input-block-level" />
					</div>
					<div class="control-group">
						<label>State/Province/Region: </label>
						<input name="txtSPR" type="text" class="input-block-level" />
					</div>
					<div class="control-group">
						<label>Postal/Zip Code: </label>
						<input name="txtCode" type="text" class="input-block-level" />
					</div>
					<div class="control-group">
						<label>Country: </label>
						<select name="selCountry" class="input-block-level">
						<option value=""></option>
						<?php foreach($country as $cty): ?>
							<option value="<?php echo $cty->id; ?>"><?php echo $cty->country_name; ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</fieldset>
			</div>
			<br />
			<div class="control-group">
				<label>Sports: </label>
				<select name="selSports" class="input-block-level" required>
					<option value=""></option>
					<?php foreach($sports as $sport): ?>
						<option value="<?php echo $sport->sports_id; ?>"><?php echo $sport->sports_name; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="control-group">
				<label>High school (and jersey / uniform #): </label>
				<input name="txtHSNumber" type="text" class="input-block-level" required />
			</div>
			<div class="control-group">
				<label>Club team (and jersey / uniform #): </label>
				<input name="txtClubNumber" type="text" class="input-block-level" />
			</div>
			<div class="control-group">
				<label>Position: </label>
				<input name="txtPosition" type="text" class="input-block-level" required />
			</div>
			<div class="control-group">
				<label>Height in cm: </label>
				<input name="txtHeight" type="text" class="input-block-level" required />
			</div>
			<div class="control-group">
				<label>Weight in lbs: </label>
				<input name="txtWeight" type="text" class="input-block-level" required />
			</div>
			<div class="control-group">
				<label>Individual Awards and Recognitions: </label>
				<input name="txtAwards" type="text" class="input-block-level" />
			</div>
			<div class="control-group">
				<label>Team Awards and Accomplishments: </label>
				<input name="txtTeamAwards" type="text" class="input-block-level" />
			</div>
			<div class="control-group">
				<label>High school GPA: </label>
				<input name="txtHSGPA" type="text" class="input-block-level" />
			</div>
			<div class="control-group">
				<label>SAT Score(s): </label>
				<input name="txtSatScore" type="text" class="input-block-level" />
			</div>
			<div class="control-group">
				<label>TOEFL Score(s): </label>
				<input name="txtTOEFL" type="text" class="input-block-level" />
			</div>
			<div class="control-group">
				<label>ACT Score(s): </label>
				<input name="txtACT" type="text" class="input-block-level" />
			</div>
			<div class="control-group">
				<input type="submit" name="btnSubmit" class="btnSubmit btn-block" value="Submit" />
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="span6 center"><span class="toll-number">Call us at 1-855-983-2916</span></div>
	</div>
</div>
<?php echo form_close(); ?>
</body>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	$( "#birthdate" ).datepicker({
      changeMonth: true,
      changeYear: true,
	  yearRange: "-100:+0",
    });
	
	/** FORM VALIDATION **/
	$("#signUpForm").validate();
});
</script>
</html>
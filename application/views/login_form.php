<!--
Author: Franco Quiroz A.
-->
<!DOCTYPE html>
<html>	
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url()?>resources/css/style.css" rel='stylesheet' type='text/css' />
<!--webfonts-->
<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic|Oswald:400,300,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
<!--//webfonts-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body>
	<h1>Empresa Login</h1>
	<div class="login-form">
		<div class="head-info">
		
		</div>
		<div class="clear"></div>
		<div class="avtar">
			<img src="<?php echo base_url()?>resources/images/profile.png" style="width:50% ;height: 50%;margin-top: 10px;" />
		</div>
			
			 <?php echo form_open('verifylogin'); ?>
				<input type="text" class="text" name="username" value="Usuario" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Usuario';}" />
				<input type="password" value="Contraseña" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Contraseña';}" />	
				<h4><?php echo validation_errors(); ?></h4>
				<br/>
				<p><a href="<?php echo site_url('recovery');?>">Recuperar contraseña?</a></p>
				<br/>
				<div class="signin">
					<input type="submit" value="Ingresar" >
				</div>
			</form>
	</div>
	<div class="copy-rights">
		<p>Desing by <a href="#" target="_blank">FQ</a> </p>
	</div>
</body>
</html>
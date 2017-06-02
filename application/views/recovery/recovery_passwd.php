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
<script type="text/javascript">
	function email_reco()
	{
		if(document.getElementById("password1").value==document.getElementById("password2").value)
		{
			if(document.getElementById("password1").value.length>=5)
			{
				$('#submit_handle').click();
			}else
			{
				alert('Contraseñas minimo de 5 caracteres');
			}
		}else
		{
			alert('Contraseñas no son iguales');
		}
    }
</script>

</head>
<body>
	<h1>Ingresar Nueva Contraseña</h1>
	<div class="login-form">
		<div class="head-info">
		
		</div>
		<div class="clear"></div>
			 <?php echo form_open('password_change'); ?>
				<input type="password" class="text" name="password" value="password" id="password1" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}" required>
				<h4>Repetir Contraseña</h4>
				<input type="password" class="text" name="password2" value="password" id="password2" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}" required>
				<input type="hidden" class="text" name="email" value="<?=$email?>">
				<div class="clear"></div>
				<br/>
				<div class="signin">
				<button type="button" onclick="email_reco()" style="cursor:pointer;">Ingresar</button>
                <input id="submit_handle" type="submit" style="display: none">
				</div>
			</form>
	</div>
	<div class="copy-rights">
		<p>Desing by <a href="#" target="_blank">FQ</a> </p>
	</div>
</body>
</html>
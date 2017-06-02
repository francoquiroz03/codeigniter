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

		if(document.getElementById("username").value)
		{

			if(emailCheck(document.getElementById("email").value))
        	{

                $('#submit_handle').click();
        	}

		}else
		{
			alert('Por favor ingresar usuario');
		}

    }
</script>
<script type="text/javascript">
    function emailCheck (emailStr) { 
 
var emailPat=/^(.+)@(.+)$/; 
var specialChars="\\(\\)<>@,;:\\\\\\\"\\.\\[\\]"; 
var validChars="\[^\\s" + specialChars + "\]"; 
var quotedUser="(\"[^\"]*\")"; 
var ipDomainPat=/^[(d{1,3}).(d{1,3}).(d{1,3}).(d{1,3})]$/; 
var atom=validChars + '+'; 
var word="(" + atom + "|" + quotedUser + ")"; 
var userPat=new RegExp("^" + word + "(\\." + word + ")*$"); 
var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$"); 
var matchArray=emailStr.match(emailPat); 
if (matchArray==null) { 
    alert("Favor, ingrese una direcci\u00f3n de correo v\u00e1lida.")
    return false 
} 
var user=matchArray[1] 
var domain=matchArray[2] 
 
if (user.match(userPat)==null) { 
    alert("El nombre de usuario parece ser inv\u00e1lido, favor verifique.")
    return false 
} 
 
var IPArray=domain.match(ipDomainPat) 
if (IPArray!=null) { 
      for (var i=1;i<=4;i++) { 
        if (IPArray[i]>255) { 
            alert("La dirección IP de destino es inv\u00e1lida!") 
        return false 
        } 
    } 
    return true 
} 
 
var domainArray=domain.match(domainPat) 
if (domainArray==null) { 
    alert("El dominio no parece ser v\u00e1lido.") 
    return false 
} 
var atomPat=new RegExp(atom,"g") 
var domArr=domain.match(atomPat) 
var len=domArr.length 
if (domArr[domArr.length-1].length<2 ||  
    domArr[domArr.length-1].length>4) { 
   alert("Las direcciones deben terminar con dominios de dos, tres, o cuatro letras.") 
   return false 
} 
 
if (len<2) { 
   var errStr="Favor ingrese un dominio v\u00e1lido."; 
   alert(errStr) 
   return false 
} 
 
return true; 
}
</script>
</head>
<body>
	<h1>Recuperación Contraseña</h1>
	<div class="login-form">
		<div class="head-info">
		
		</div>
		<div class="clear"></div>
			
			 <?php echo form_open('email_recovery'); ?>
				<input type="text" class="text" name="username" value="Usuario" id="username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Usuario';}" required>
				<input type="text" value="Email" name="email" id="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required>	
				<div class="clear"></div>
				<h4><?php if(isset($errors)){echo $errors;} ?></h4>
				<br/>
				<div class="signin">
				<button type="button" onclick="email_reco()" style="cursor:pointer;">Enviar Correo</button>
                <input id="submit_handle" type="submit" style="display: none">
				</div>
			</form>
	</div>
	<div class="copy-rights">
		<p>Desing by <a href="#" target="_blank">FQ</a> </p>
	</div>
</body>
</html>
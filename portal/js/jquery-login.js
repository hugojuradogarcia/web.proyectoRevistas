$(document).ready(function(){

	$("div.loading").hide();
	$("div.message").hide();
	$("#btnLogin").click(function(){
		$(".message").show();
		error = "Se han encontrado los siguientes errores:<br /><br />";
		ban = 0;

		if($("#user").val() == ""){
			error += "\n - No ha proporcionado su usuario.<br />";
			ban++;
		}

		if($("#password").val() == ""){
			error += "\n - No ha proporcionado su contrase&ntilde;a.<br />";
			ban++;
		}

		if(ban > 0){
			$(".message").html(error);
			return false;
		}
	});

/***************************************************************************************/
	$("#frmLogin").submit(function(event){
		event.preventDefault(); //No se envia el formulario.
		$(".loading").show();
		$(".message").hide();

		//Enviamos el formulario por Metodo POST
		$.post("actions/login.php", $(this).serialize(), function(data){
			$(".message").show();
			$(".loading").hide();
			//$(".message").html(data);

			if(data == true){
				$(".message").html("<h1>Ingresando...</h1>");
				$(".loading").show();
				setTimeout(function(){
					window.location = "home.php";
				}, 2000);
			}else{
				$(".message").html("<h1>Usuario y/o Password Incorrecto.</h1>");
			}
		}); //Fin de $.post
	}); //Fin de .submit

/***************************************************************************************/
	/*
	$("#frmLogin").submit(function(event){
		event.preventDefault(); //No se envia el formulario.
		$(".loading").show();
		$(".message").hide();

		//Enviamos el formulario por Metodo POST
		$.post("actions/login.php", $(this).serialize(), function(resp){
			if(!resp.error){
				$("#loading").hide();
				window.location = "home.php";
			}else{
				$("#loading").hide();
				$("#mensaje").show();
				$("#mensaje").html("<h1>Usuario y/o Password Incorrecto.</h1>");
			}
		},"json"); //Fin de $.post
	}); //Fin de .submit
	*/
/***************************************************************************************/
});


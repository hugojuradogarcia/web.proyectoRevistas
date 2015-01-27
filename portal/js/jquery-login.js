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
		$(".loading").show();
		$(".message").show();
		event.preventDefault(); //No se envia el formulario.

		//Enviamos el formulario por Metodo POST
		$.post("actions/login.php", $(this).serialize(), function(data){
			/*
			if(!data.error){
				$("#loading").hide();
				window.location = "home.php";
			}else{
				$("#loading").hide();
				$("#mensaje").show();
				$("#mensaje").html("<h1>Usuario y/o Password Incorrecto.</h1>");
			}
			*/
			$(".message").html(data);
		}); //Fin de $.post
	}); //Fin de .submit


/***************************************************************************************/
	/*
	$("#frmLogin").submit(function(event){
		event.preventDefault(); //No se envia el formulario.
		//$("#loading").show();
		$("#mensaje").hide();

		//Enviamos el formulario por Metodo POST
		$.post("pages/login.php", $(this).serialize(), function(resp){
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


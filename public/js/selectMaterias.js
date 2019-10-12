$(document).ready(function(){

	httpRequest("selectMaterias_back.php",$('#plan').val(),function(){
		document.querySelector("#materia").innerHTML = this.responseText;
	});

	$('#plan').change(function(){
		httpRequest("selectMaterias_back.php",$('#plan').val(),function(){
			document.querySelector("#materia").innerHTML = this.responseText;
		});
	})
})




function httpRequest(url,idPlan, callback){
	//crear el objeto http
	http = new XMLHttpRequest();

	//se define el metodo de envio y la url que se va a cargar
	http.open("POST", url);

	http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


	//mandamos la solicitud
	http.send('idPlan='+idPlan);

	// validar que la solicitud http funciono correctamete 
	http.onreadystatechange = function(){

		if(this.readyState == 4 && this.status == 200){
			//mandamos la respuesta atravez de la variable callback con el parametro
			callback.apply(http);
		}


	}


}

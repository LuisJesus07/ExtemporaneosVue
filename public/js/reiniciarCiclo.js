const btnReiniciar = document.querySelector('.btn-reiniciar');
var respuesta;


btnReiniciar.addEventListener('click', function(){
	swal({
	  title: "Esta seguro?",
	  text: "Todos los registros de examenes anteriores se eliminaran!",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonClass: "btn-danger",
	  confirmButtonText: "Eliminar!",
	  closeOnConfirm: false
	},
	function(){
		//hacer la peticion al servidor
		httpRequestReiniciar("reiniciarCiclo_back.php", function(){

			//guardar la respuesta del servidor
			respuesta = this.responseText;

			//1=exitosa
			if(respuesta == 1){
				swal("Eliminados!", "El ciclo de extemporaneos se ha reiniciado con exito.", "success");
			}else{
				swal("Error!", "Ocurrio un error en el servidor, intentelo mas tarde.", "error");
			}

			
		})

	});
})


function httpRequestReiniciar(url,callback){

	http = new XMLHttpRequest();

	http.open("GET",url);

	http.send();

	http.onreadystatechange = function(){

		if(this.readyState == 4 && this.status == 200){
			callback.apply(http);
		}
	}
}
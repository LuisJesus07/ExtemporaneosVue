const app = new Vue({
	el: '#app',
	data: {
		materias:[],
		idPlan: 0
	},
	methods:{
		getMaterias: function(){
			//console.log(app.idPlan);
			axios.get('../../API/controllers/administrador/getMateriasByPlan.php?idPlan='+app.idPlan)
			.then(function(response){
				//console.log(response.data.materias);
				app.materias = response.data.materias;
			})
			.catch(function(error){
				console.log(error.data);
			})
		}
	}
})
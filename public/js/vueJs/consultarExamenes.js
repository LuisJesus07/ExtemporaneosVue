const app = new Vue({
	el: '#app',
	created: function(){
		this.getExamenes()
	},
	data: {
		examenes: []
	},
	methods:{
		getExamenes: function(){
			axios.get('http://localhost/ExtemporaneosVue/API/controllers/alumnos/getExamenes.php')
			.then(function(response){
				console.log(response.data.examenes);
				app.examenes = response.data.examenes;
			})
			.catch(function(error){
				console.log(error);
			});
		}
	}
})
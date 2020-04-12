new Vue({
	el :'#app',
	data:{
		data: '',
		faq:false,
	},
	methods:{
		ansQns : function(data){

			if(data == 1){
				this.data = "php artisan make:model Student -m & Teacher -m ";
				this.faq = true;
			}else if(data == 2){
				this.data = "run php artisan make:factory TeacherFactory <br> php artisan make:seeder TeachersTableSeeder <br> Inside TeacherFactory use Faker Generator to create dummy data like $faker->name etc <br> Register Factory to seeder and then call from database seeder";
				this.faq = true;
			}else if(data == 3){
				this.data = "All views of Student and Teacher are present inside View Folder which is located inside Resources ";
				this.faq = true;
			}else if(data == 4){
				this.data = "One To Many Relationship are used ($this->hasMany(Student::class))";
				this.faq = true;
			}else if(data == 5){
				this.data = "Laravel Valdiation are used in controller to validate data.";
				this.faq = true;
			}else if(data == 6){
				this.data = "For uploading image or avatar i'm using Laravel storage <br> and Link with public folder >> php artisan storage:link";
				this.faq = true;
			}else{
				this.data = "No Data Found";
				this.faq = true;
			}
		},
		backBtn:function () {
			this.faq =false;
		}
	}

});
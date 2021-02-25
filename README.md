# KLY Assessment

### Project Specification
1. Laravel 8.12
2. PHP >= 7.3
3. MySQL >= 5.8
4. Composer (Dependency Management for PHP)

### Plugins
- Server-side 
	- [Laravel Datatables v9.x](https://github.com/yajra/laravel-datatables)
- Client-side
	- [jQuery  v3.5.1](https://github.com/jquery/jquery)
	- [Tailwind CSS v2.0.3](https://github.com/tailwindlabs/tailwindcss)
	- [select2](https://github.com/select2/select2)
	- [bootstrap-fileinput](https://github.com/kartik-v/bootstrap-fileinput)
	- [DataTables](https://github.com/DataTables/DataTables)
	- [iziToast](https://github.com/marcelodolza/iziToast)

### Deployment
1. Make sure your machine meets the [project specifications](#project-specification).
2. Clone this project.  
`git clone https://github.com/willek/assessmment_kly.git`
4. Create new MySQL database.  
example: `assessment_kly`
4. Move inside project directory.
5. Install project dependency using Composer.  
`composer install`
7. Copy `.env.example` file to `.env`
8. Adjust the connection to the database with your MySQL Credentials inside `.env` file.  
	example:  
	> DB_DATABASE=assessment_kly  
	> DB_USERNAME=root  
	> DB_PASSWORD=12345678  
8.  Generate project APP_KEY  
`php artisan key:generate`
9. Migrate table  
`php artisan migrate`
10. Seed the initial user admin  
`php artisan db:seed --class=AdminSeeder`  
it will create user admin to log in  
	> username : admin  
	> password : 12345678
11.  Serve project  
`php artisan serve`
12. Open the project access url in your browser  
default: [127.0.0.1:8000](http://127.0.0.1:8000)
14.  The project is ready to be tested
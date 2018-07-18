<?php


//php artisan make:seeder UsersTableSeeder
//configurar run()
//DatabaseSeeder.php run(){$this->call(UsersTableSeeder::class);}
//php artisan db:seed
//ojo! cada vez que se ejecuta se llama a todos los archivos de nuevo
//se puede decir que archivo ejecutar
//php artisan db:seed --class=UsersTableSeeder

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jhon',
            'email' => 'jhon@gmail.com',
            'password' => bcrypt('123'),
        ]);
    }
}

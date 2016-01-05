<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Faker\Factory as Faker;

use CodeCommerce\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Limpa os dados da tabela de users
        DB::table('users')->truncate();

        // Cria os objetos para popular o banco
        //User::create([
        //    'name' => 'André',
        //	'email' => 'andrejrg@gmail.com',
        //	'password' => Hash::make(123456)
        //]);

        /*
        $faker = Faker::create();

	    foreach(range(1,10) as $i) {
	    	User::create([
                'name' => $faker->name(),
                'email' => $faker->email(),
	        	'password' => Hash::make($faker->word())
	        ]);
	    }
        */
        factory('CodeCommerce\User')->create([
            'name' => 'André',
            'email' => 'andrejrg@gmail.com',
            'password' => Hash::make(123456)
        ]);
        factory('CodeCommerce\User', 10)->create(); // cria 10 objetos no banco seguindo o modelo do Factory
    }
}

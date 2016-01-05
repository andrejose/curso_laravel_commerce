<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Faker\Factory as Faker;

use CodeCommerce\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Limpa os dados da tabela de categories
        DB::table('categories')->truncate();

        // Cria os objetos para popular o banco
        //for($i=1;$i<=10;$i++)
	    //    Category::create([
	    //    	'name' => 'Category '.$i,
	    //    	'description' => 'Description category '.$i
	    //    ]);

	    //$faker = Faker::create();

	    //foreach(range(1,15) as $i) {
	    //	Category::create([
	    //    	'name' => $faker->word(),
	    //    	'description' => $faker->sentence()
	    //    ]);
	    //}
        factory('CodeCommerce\Category', 15)->create(); // cria 10 objetos no banco seguindo o modelo do Factory
    }
}

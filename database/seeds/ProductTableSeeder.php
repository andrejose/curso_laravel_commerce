<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use CodeCommerce\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Limpa os dados da tabela de categories
        DB::table('products')->truncate();

        factory('CodeCommerce\Product', 40)->create(); // cria 10 objetos no banco seguindo o modelo do Factory
    }
}

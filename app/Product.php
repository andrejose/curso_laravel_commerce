<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Define o array com os campos do modelo que podem ser preenchidas massivamente
    /**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
    protected $fillable = [
    	'category_id',
    	'name',
    	'description',
    	'price'
    ];

    // Método que retorna a categoria de um produto
    public function category()
    {
    	return $this->belongsTo('CodeCommerce\Category');
    }

}

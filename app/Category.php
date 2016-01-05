<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Define o array com os campos do modelo que podem ser preenchidas massivamente
    /**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
    protected $fillable = ['name', 'description'];

    // Método que traz todos os produtos da categoria
    public function products ()
    {
    	return $this->hasMany('CodeCommerce\Product');
    }
}

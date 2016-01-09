<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //
    protected $fillable = [
    	'product_id',
    	'extension'
    ];

    // Função que retorna o produto ao qual a imagem pertence
    public function product(){
    	return $this->belongsTo('CodeCommerce\Product');
    }
}

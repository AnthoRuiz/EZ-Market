<?php
/**
 * Created by PhpStorm.
 * User: Jarvis
 * Date: 14/09/2016
 * Time: 02:56 PM
 */

namespace market\Transformers;


use League\Fractal\TransformerAbstract;
use market\Product;

class ProductTransformer extends TransformerAbstract
{
    public function transform(Product $product){
        return [
            'id' => $product->id,
            'nombre'=> $product->name,
            'categoria' => $product->categoryProduct->name,
            'descripcion'=> $product->description,
            'precio'=> $product->price,
            'imagen'=> $product->img,
        ];
    }

}
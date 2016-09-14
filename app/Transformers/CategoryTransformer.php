<?php

namespace market\Transformers;
use League\Fractal\TransformerAbstract;
use market\Category;

class CategoryTransformer extends TransformerAbstract
{
    public function transform(Category $category){
        return [
            'id' => $category->id,
            'nombre'=> $category->name,
            'descripcion'=> $category->description,
        ];
    }

}
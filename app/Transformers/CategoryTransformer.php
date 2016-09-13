<?php

namespace market\Transformer;
use League\Fractal\TransformerAbstract;
use market\Category;

class CategoryTransformer extends TransformerAbstract
{
    public function transform(Category $category){
        return [
            'id' => $category->id,
            'nombre'=> $category->nombre,
            'tarifa'=> $category->tarifa,
            'horario'=> $category->horario,
        ];
    }

}
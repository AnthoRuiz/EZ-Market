<?php

namespace market\Http\Controllers\Api;

use Illuminate\Http\Request;

use market\Category;
use market\Http\Requests;
use market\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use market\Transformers\CategoryTransformer;

class CategoryController extends Controller
{
    use Helpers;
    public function index()
    {
        return $this->response->collection(Category::all(), new CategoryTransformer());
    }

    public function store(Requests\CreateCategoryRequest $request)
    {
        try{
            $data = $request->all();
            $category = Category::where('name', $data['nombre'])->firstOrFail();
            if(!empty($category)){
                return $this->response->array(['message' =>'Nombre de Categoria Existente', 'status' => '400']);
            }else{
                $newCategory = new Category();
                $newCategory->name = $data['nombre'];
                $newCategory->description = $data['descripcion'];
                $newCategory->save();
                return $this->response->array(['message' =>'Creado', 'status' => '200']);
            }
        }catch (ModelNotFoundException $e){
            $newCategory = new Category();
            $newCategory->name = $data['nombre'];
            $newCategory->description = $data['descripcion'];
            $newCategory->save();
            return $this->response->array(['message' =>'Creado', 'status' => '200']);
        }
    }
}

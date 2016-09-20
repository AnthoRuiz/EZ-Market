<?php

namespace market\Http\Controllers\Api;

use Illuminate\Http\Request;

use market\Category;
use market\Http\Requests;
use market\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use market\Product;
use market\Transformers\ProductTransformer;

class ProductController extends Controller
{
    use Helpers;
    public function index()
    {
        return $this->response->collection(Product::all(), new ProductTransformer());
    }

    public function store(Requests\CreateProductRequest $request)
    {
        try{
            $data = $request->all();
            $category = Category::where('id', $data['categoria'])->firstOrFail();
            if(!empty($category)){
                $product = new Product();
                $product->name = $data['nombre'];
                $product->category_id = $data['categoria'];
                $product->description = $data['descripcion'];
                $product->price = $data['precio'];
                $product->img = $data['imagen'];
                $product->save();
                return $this->response->array(['message' =>'Creado', 'status' => '200']);
            }

        }catch (ModelNotFoundException $e){
            return $this->response->array(['message' =>'Categoria no Encontrada', 'status' => '404']);
        }
    }

    public function orderByCategory(){
        $products = Product::orderBy('category_id', 'asc')->get();
        return $this->response->collection($products, new ProductTransformer());
    }
}

<?php

namespace market\Http\Controllers\Api;

use Illuminate\Http\Request;

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
}

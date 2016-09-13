<?php

namespace market\Http\Controllers\Api;

use Illuminate\Http\Request;

use market\Category;
use market\Http\Requests;
use market\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
{
    use Helpers;
    public function index()
    {
        return $this->response->collection(Category::all(), new ParkingTransformer());
    }
}

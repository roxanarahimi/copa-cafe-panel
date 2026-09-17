<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function banners(){
        try{
            $data = Banner::where('visible',1)->get();
            return response($data ,200);
        }catch (\Exception $e){
            return $e;
        }

    }
    public function categories(){
        try{
            $data = Category::where('visible',1)->get();
            return response($data ,200);
        }catch (\Exception $e){
            return $e;
        }

    }
}

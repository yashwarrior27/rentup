<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(){
        try
        {
           $category= Category::where('status',1)->get()->map(function($collect){

            return [
                  'id'=>$collect->id,
                'image'=> !empty($collect->image)?url('assets/category').'/'.$collect->image:'',
                'title'=> $collect->title,
            'listings'=>$collect->listing->count()        ];

           });

           return \ResponseBuilder::success('success',$this->success,$category);


        }
        catch(\Exception $e)
        {
            return \ResponseBuilder::fail($e->getMessage(),$this->serverError);
        }
    }
}

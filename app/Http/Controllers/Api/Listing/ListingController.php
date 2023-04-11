<?php

namespace App\Http\Controllers\Api\Listing;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    protected $listingRepository;

    public function listing(){

        try
        {
           $listing=Listing::where('status',1)->get()->map(function ($collect){
             return [
                'id'=>$collect->id,
                'title'=>$collect->title,
                'image'=>!empty($collect->image)?url('assets/listing').'/'.$collect->image:'',
                'address'=>$collect->address,
                'price'=>$collect->price,
                'type'=>$collect->type,
                'category'=>$collect->category->title,
             ];
           });

           return \ResponseBuilder::success('success',$this->success,$listing);

        }
        catch(\Exception $e)
        {
            return \ResponseBuilder::fail($e->getMessage(),$this->serverError);
        }

    }
}

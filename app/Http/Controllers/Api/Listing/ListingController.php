<?php

namespace App\Http\Controllers\Api\Listing;

use App\Http\Controllers\Controller;
use App\Repositories\Interface\ListingInterface;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    protected $listingRepository;

       public function __construct(ListingInterface $listing)
       {
           $this->listingRepository=$listing;
       }

    public function listing(){

        try
        {
            $listing=$this->listingRepository->getListing();

               return \ResponseBuilder::success('sasd0',$this->success,$listing);

        }
        catch(\Exception $e)
        {
            return \ResponseBuilder::fail($e->getMessage(),$this->serverError);
        }

    }
}

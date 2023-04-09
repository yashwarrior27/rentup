<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $table='listings';
    protected $fillable=['title','image','address','price','type','content','category_id','status'];

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
}

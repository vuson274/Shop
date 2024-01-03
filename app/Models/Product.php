<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['category_id','name','quantity','price','main_image','second_image','variant_id','sold','origin','content'];
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function orderdetail(){
        return $this->belongsTo(OrderDetail::class);
    }
}

<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'user_id',
        'title',   
        'slug',   
        'post_date',   
        'image',   
        'description',   
        'tags',      
    ];	
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    // Joind with subcategory
    public function subcategory(){
        return $this->belongsTo(Subcategory::class,'subcategory_id');
    }

       // Joind with user
       public function user(){
        return $this->belongsTo(User::class,'user_id');
    }


}

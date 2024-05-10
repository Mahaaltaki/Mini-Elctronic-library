<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable=
    [
        'name',
        'public-category-id',
      
    ];
    public function publicCategories(){
        return $this->belongsTo(PublicCategory::class,'sub_id','id');
    }
    public function books(){
        return $this->hasMany(Book::class,'book_id','id');
    }
    
}

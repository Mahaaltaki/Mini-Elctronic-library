<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable=
    [
        'name',
        'sub_category_id',
        
    ];
    public function publicCategories(){
        return $this->belongsTo(SubCategory::class);
    }
    public function evaluation(){
        return $this->hasmany(Evaluation::class);
    }
}

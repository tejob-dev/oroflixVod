<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EbookCategory extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected static function newFactory()
    {
        return \Modules\Ebook\Database\factories\EbookCategoryFactory::new();
    }

    public function ebooks()   
    {
        return $this->hasMany('App\Ebook','category_id','id');
    }
}

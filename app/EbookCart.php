<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EbookCart extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected static function newFactory()
    {
        return \Modules\Ebook\Database\factories\EbookCartFactory::new();
    }

    public function ebook()   
    {
        return $this->hasOne('App\Ebook','id','ebook_id');
    }
}

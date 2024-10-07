<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EbookReview extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected static function newFactory()
    {
        return \Modules\Ebook\Database\factories\EbookReviewFactory::new();
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function ebook()   
    {
        return $this->hasOne('App\Ebook','id','ebook_id');
    }
    
}

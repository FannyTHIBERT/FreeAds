<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    
    use HasFactory;
    
protected $fillable =["title","description","user_id","category_id","price","img1","img2","img3","zipcode","city", "status"];

protected $garded = [];

    public function user()
{
    return $this->belongsTo(User::class);
}

    public function categories()
    {
    return $this->belongsTo(Categories::class);
    }






}






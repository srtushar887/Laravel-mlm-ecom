<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_sub_category extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->hasOne(category::class,'id','category_id');
    }

    public function sub_cat()
    {
        return $this->hasOne(sub_category::class,'id','sub_category_id');
    }
}

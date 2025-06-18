<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class category extends Model
{
    protected $table = "categories";
    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'category');
    }
}

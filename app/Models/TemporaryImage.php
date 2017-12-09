<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemporaryImage extends Model
{
    protected $table = "temporary_images";
    protected $fillable = ['id','image','status'];
}

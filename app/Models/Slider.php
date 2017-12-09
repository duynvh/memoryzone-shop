<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected           $table      = "sliders";
    protected           $title      = "Slider";
    protected           $route      = "slider";
    protected           $view       = "admin.pages.slider.";
    protected static    $key_cache  = "sliders";
    protected           $fillable  = ['id', 'name', 'image', 'description','status', 'order_by'];

    public function getInfo() {
        return [
            'route' => $this->route,
            'view'  => $this->view,
            'title' => $this->title
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected           $table      = "tags";
    protected           $title      = "Tag";
    protected           $route      = "tag";
    protected           $view       = "admin.pages.tag.";
    protected static    $key_cache  = "tags";
    protected           $fillable  = ['id', 'name', 'alias','status', 'order_by'];

    public function getInfo() {
        return [
            'route' => $this->route,
            'view'  => $this->view,
            'title' => $this->title
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    protected           $table      = "type_products";
    protected           $title      = "Loại sản phẩm";
    protected           $route      = "type-product";
    protected           $view       = "admin.pages.type-product.";
    protected static    $key_cache  = "type_products";
    protected           $fillable  = ['id', 'name', 'alias', 'status', 'order_by', 'type_product_group_id'];

    public function typeProductGroup() {
        return $this->belongsTo("App\Models\TypeProductGroup",'type_product_group_id', 'id');
    }

    public function product() {
        return $this->hasMany("App\Models\Product");
    }

    public function getInfo() {
        return [
            'route' => $this->route,
            'view'  => $this->view,
            'title' => $this->title
        ];
    }
}

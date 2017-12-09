<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeProductGroup extends Model
{
    protected           $table      = "type_product_groups";
    protected           $title      = "Nhóm sản phẩm";
    protected           $route      = "type-product-group";
    protected           $view       = "admin.pages.type-product-group.";
    protected static    $key_cache  = "type_product_groups";
    protected           $fillable   = ['id', 'name', 'alias', 'status', 'order_by'];

    public function getInfo() {
        return [
            "route" => $this->route,
            "view" => $this->view,
            "title" => $this->title,
        ];
    }

    public function typeProduct() {
        return $this->hasMany("App\Models\TypeProduct");
    }
}

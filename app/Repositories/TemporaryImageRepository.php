<?php
/**
 * Created by PhpStorm.
 * User: hoangduy
 * Date: 12/9/17
 * Time: 9:38 AM
 */

namespace App\Repositories;
use App\Models\TemporaryImage;

class TemporaryImageRepository
{
    protected $model;

    public function __construct(TemporaryImage $model)
    {
        $this->model = $model;
    }

    public function store($data)
    {
        return $this->model->create($data);
    }


    public function delete($key, $value)
    {
        $model = $this->model->where($key, $value);
        return $model->delete();
    }
}
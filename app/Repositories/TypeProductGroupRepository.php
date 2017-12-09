<?php
/**
 * Created by PhpStorm.
 * User: hoangduy
 * Date: 12/8/17
 * Time: 11:22 PM
 */
namespace App\Repositories;

use App\Models\TypeProductGroup;
class TypeProductGroupRepository
{
    private $model;

    public function __construct(TypeProductGroup $model)
    {
        return $this->model = $model;
    }

    public function getAllTypeGroup()
    {
        return $this->model->all();
    }

    public function getInfoBasic()
    {
        return $this->model->getInfo();
    }

    public function getModel()
    {
        return $this->model;
    }

    public function lists() {
        return $this->model->pluck('name', 'id')->all();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function update($data, $id)
    {
        $model = $this->find($id);
        return $model->update($data);
    }

    public function destroy($id)
    {
        $model = $this->find($id);
        return $model->destroy($id);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: hoangduy
 * Date: 12/9/17
 * Time: 1:02 AM
 */

namespace App\Services\Admin;

use App\Repositories\TypeProductRepository;
use App\Repositories\TypeProductGroupRepository;
class TypeProductService
{
    private $typeProductRepository;
    private $typeProductGroupRepository;
    private $infoBasic;

    public function __construct(TypeProductRepository $typeProductRepository,
                                TypeProductGroupRepository $typeProductGroupRepository)
    {
        $this->typeProductRepository = $typeProductRepository;
        $this->typeProductGroupRepository = $typeProductGroupRepository;
        $this->infoBasic = $this->typeProductRepository->getInfoBasic();
    }

    public function index()
    {
        $data = $this->typeProductRepository->getAllType();
        return [
            'data'      => $data,
            'infoBasic' => $this->infoBasic,
        ];
    }

    public function create()
    {
        $data = $this->typeProductRepository->getModel();
        $menuTypeGroup = $this->typeProductGroupRepository->lists();
        return [
            'infoBasic' => $this->infoBasic,
            'data'      => $data,
            'menuTypeGroup' => $menuTypeGroup,
        ];
    }

    public function store($request)
    {
        $data = [
            'name'     => $request->name,
            'alias'    => convert2Slug($request->name),
            'status'   => checkInputData($request->status),
            'order_by' => checkInputData($request->order_by),
            'type_product_group_id' => $request->type_product_group_id
        ];

        $this->typeProductRepository->store($data);

        if ($request->remember == 'on') {
            return redirect()
                ->back()
                ->with(['noticeMassage' => 'Stored!, Your data has been stored., success']);
        }
        else {
            return redirect()
                ->route($this->infoBasic['route'] . '.index')
                ->with(['noticeMassage' => 'Stored!, Your data has been stored., success']);
        }
    }

    public function edit($id)
    {
        $data = $this->typeProductRepository->find($id);
        $menuTypeGroup = $this->typeProductGroupRepository->lists();
        return [
            'infoBasic' => $this->infoBasic,
            'data'      => $data,
            'menuTypeGroup' => $menuTypeGroup,
        ];
    }

    public function update($request, $id)
    {
        $data = [
            'name'     => $request->name,
            'alias'    => convert2Slug($request->name),
            'status'   => checkInputData($request->status),
            'order_by' => checkInputData($request->order_by),
            'type_product_group_id' => $request->type_product_group_id
        ];
        $this->typeProductRepository->update($data, $id);
        if ($request->remember == 'on') {
            return redirect()
                ->back()
                ->with(['noticeMassage' => 'Updated!, Your data has been updated., success']);
        }
        else {
            return redirect()
                ->route($this->infoBasic['route'] . '.index')
                ->with(['noticeMassage' => 'Updated!, Your data has been updated., success']);
        }
    }
    public function destroy($id)
    {
        $this->typeProductRepository->destroy($id);
        return redirect()
            ->route($this->infoBasic['route'] . '.index')
            ->with(['noticeMassage' => 'Deleted!, Your data has been deleted., success']);
    }
}
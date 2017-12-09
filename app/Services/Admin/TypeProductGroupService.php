<?php
/**
 * Created by PhpStorm.
 * User: hoangduy
 * Date: 12/8/17
 * Time: 11:25 PM
 */
namespace App\Services\Admin;

use App\Repositories\TypeProductGroupRepository;

class TypeProductGroupService
{
    private $typeProductGroupRepository;
    private $infoBasic;

    public function __construct(TypeProductGroupRepository $typeProductGroupRepository)
    {
        $this->typeProductGroupRepository = $typeProductGroupRepository;
        $this->infoBasic = $this->typeProductGroupRepository->getInfoBasic();
    }

    public function index()
    {
        $data = $this->typeProductGroupRepository->getAllTypeGroup();
        return [
            'data'      => $data,
            'infoBasic' => $this->infoBasic,
        ];
    }

    public function create()
    {
        $data = $this->typeProductGroupRepository->getModel();
        return [
            'infoBasic' => $this->infoBasic,
            'data'      => $data,
        ];
    }

    public function store($request)
    {
        $data = [
            'name'     => $request->name,
            'alias'    => convert2Slug($request->name),
            'status'   => checkInputData($request->status),
            'order_by' => checkInputData($request->order_by),
        ];

        $this->typeProductGroupRepository->store($data);
        return redirect()->route($this->infoBasic['route'] . '.index');

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
        $data = $this->typeProductGroupRepository->find($id);
        return [
            'infoBasic' => $this->infoBasic,
            'data'      => $data,
        ];
    }

    public function update($request, $id)
    {
        $data = [
            'name'     => $request->name,
            'alias'    => convert2Slug($request->name),
            'status'   => checkInputData($request->status),
            'order_by' => checkInputData($request->order_by),
        ];
        $this->typeProductGroupRepository->update($data, $id);
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
        $this->typeProductGroupRepository->destroy($id);
        return redirect()
            ->route($this->infoBasic['route'] . '.index')
            ->with(['noticeMassage' => 'Deleted!, Your data has been deleted., success']);
    }
}
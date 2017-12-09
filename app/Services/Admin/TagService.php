<?php
/**
 * Created by PhpStorm.
 * User: hoangduy
 * Date: 12/9/17
 * Time: 2:22 AM
 */

namespace App\Services\Admin;
use App\Repositories\TagRepository;

class TagService
{
    private $tagRepository;
    private $infoBasic;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
        $this->infoBasic = $this->tagRepository->getInfoBasic();
    }

    public function index()
    {
        $data = $this->tagRepository->getAllTag();
        return [
            'data'      => $data,
            'infoBasic' => $this->infoBasic,
        ];
    }

    public function create()
    {
        $data = $this->tagRepository->getModel();
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

        $this->tagRepository->store($data);
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
        $data = $this->tagRepository->find($id);
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
        $this->tagRepository->update($data, $id);
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
        $this->tagRepository->destroy($id);
        return redirect()
            ->route($this->infoBasic['route'] . '.index')
            ->with(['noticeMassage' => 'Deleted!, Your data has been deleted., success']);
    }
}
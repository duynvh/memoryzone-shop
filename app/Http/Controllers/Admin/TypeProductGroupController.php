<?php
/**
 * Created by PhpStorm.
 * User: hoangduy
 * Date: 12/8/17
 * Time: 11:33 PM
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeProductGroupRequest;
use App\Services\Admin\TypeProductGroupService;
class TypeProductGroupController extends Controller
{
    private $typeProductGroupService;

    public function __construct(TypeProductGroupService $typeProductGroupService) {
        $this->typeProductGroupService = $typeProductGroupService;
    }

    public function index(){
        $variables = $this->typeProductGroupService->index();
        if($variables['data'] == null){
            $variables['data'] = [];
        }
        return view('admin.layouts.index',[
            'data_table'  => $variables['data'],
            'infoBasic'   => $variables['infoBasic'],
        ]);
    }

    public function create(){
        $variables = $this->typeProductGroupService->create();
        return view('admin.layouts.create', [
                'infoBasic'     => $variables['infoBasic'],
                'data_one'      => $variables['data'],
            ]
        );
    }

    public function store(TypeProductGroupRequest $request){
        return $this->typeProductGroupService->store($request);
    }

    public function edit($id){
        $variables = $this->typeProductGroupService->edit($id);
        return view('admin.layouts.edit', [
                'infoBasic'     => $variables['infoBasic'],
                'data_one'      => $variables['data'],
            ]
        );
    }

    public function update(TypeProductGroupRequest $request, $id) {
        return $this->typeProductGroupService->update($request, $id);
    }

    public function destroy($id) {
        return $this->typeProductGroupService->destroy($id);
    }
}
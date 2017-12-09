<?php
/**
 * Created by PhpStorm.
 * User: hoangduy
 * Date: 12/9/17
 * Time: 1:15 AM
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeProductRequest;
use App\Services\Admin\TypeProductService;

class TypeProductController extends Controller
{
    private $typeProductService;

    public function __construct(TypeProductService $typeProductService) {
        $this->typeProductService = $typeProductService;
    }

    public function index(){
        $variables = $this->typeProductService->index();
        if($variables['data'] == null){
            $variables['data'] = [];
        }
        return view('admin.layouts.index',[
            'data_table'  => $variables['data'],
            'infoBasic'   => $variables['infoBasic'],
        ]);
    }

    public function create(){
        $variables = $this->typeProductService->create();
        return view('admin.layouts.create', [
                'infoBasic'     => $variables['infoBasic'],
                'data_one'      => $variables['data'],
                'menuTypeGroup' => $variables['menuTypeGroup'],
            ]
        );
    }

    public function store(TypeProductRequest $request){
        return $this->typeProductService->store($request);
    }

    public function edit($id){
        $variables = $this->typeProductService->edit($id);
        return view('admin.layouts.edit', [
                'infoBasic'     => $variables['infoBasic'],
                'data_one'      => $variables['data'],
                'menuTypeGroup' => $variables['menuTypeGroup'],
            ]
        );
    }

    public function update(TypeProductRequest $request, $id) {
        return $this->typeProductService->update($request, $id);
    }

    public function destroy($id) {
        return $this->typeProductService->destroy($id);
    }
}
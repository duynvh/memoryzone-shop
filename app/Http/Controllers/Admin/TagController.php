<?php
/**
 * Created by PhpStorm.
 * User: hoangduy
 * Date: 12/9/17
 * Time: 2:30 AM
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Services\Admin\TagService;


class TagController extends Controller
{
    private $tagService;

    public function __construct(TagService $tagService) {
        $this->tagService = $tagService;
    }

    public function index(){
        $variables = $this->tagService->index();
        if($variables['data'] == null){
            $variables['data'] = [];
        }
        return view('admin.layouts.index',[
            'data_table'  => $variables['data'],
            'infoBasic'   => $variables['infoBasic'],
        ]);
    }

    public function create(){
        $variables = $this->tagService->create();
        return view('admin.layouts.create', [
                'infoBasic'     => $variables['infoBasic'],
                'data_one'      => $variables['data'],
            ]
        );
    }

    public function store(TagRequest $request){
        return $this->tagService->store($request);
    }

    public function edit($id){
        $variables = $this->tagService->edit($id);
        return view('admin.layouts.edit', [
                'infoBasic'     => $variables['infoBasic'],
                'data_one'      => $variables['data'],
            ]
        );
    }

    public function update(TagRequest $request, $id) {
        return $this->tagService->update($request, $id);
    }

    public function destroy($id) {
        return $this->tagService->destroy($id);
    }
}
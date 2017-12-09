<?php
/**
 * Created by PhpStorm.
 * User: hoangduy
 * Date: 12/9/17
 * Time: 2:29 AM
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Services\Admin\SliderService;

class SliderController extends Controller
{
    private $sliderService;

    public function __construct(SliderService $sliderService) {
        $this->sliderService = $sliderService;
    }

    public function index(){
        $variables = $this->sliderService->index();
        if($variables['data'] == null){
            $variables['data'] = [];
        }
        return view('admin.layouts.index',[
            'data_table'  => $variables['data'],
            'infoBasic'   => $variables['infoBasic'],
        ]);
    }

    public function create(){
        $variables = $this->sliderService->create();
        return view('admin.layouts.create', [
                'infoBasic'     => $variables['infoBasic'],
                'data_one'      => $variables['data'],
            ]
        );
    }

    public function store(SliderRequest $request){
        return $this->sliderService->store($request);
    }

    public function edit($id){
        $variables = $this->sliderService->edit($id);
        return view('admin.layouts.edit', [
                'infoBasic'     => $variables['infoBasic'],
                'data_one'      => $variables['data'],
            ]
        );
    }

    public function update(SliderRequest $request, $id) {
        return $this->sliderService->update($request, $id);
    }

    public function destroy($id) {
        return $this->sliderService->destroy($id);
    }
}
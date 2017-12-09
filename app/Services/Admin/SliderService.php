<?php
/**
 * Created by PhpStorm.
 * User: hoangduy
 * Date: 12/9/17
 * Time: 2:19 AM
 */

namespace App\Services\Admin;

use App\Repositories\SliderRepository;
use Illuminate\Support\Facades\File;
class SliderService
{
    private $sliderRepository;
    private $infoBasic;

    public function __construct(SliderRepository $sliderRepository)
    {
        $this->sliderRepository = $sliderRepository;
        $this->infoBasic = $this->sliderRepository->getInfoBasic();
    }

    public function index()
    {
        $data = $this->sliderRepository->getAllSlider();
        return [
            'data'      => $data,
            'infoBasic' => $this->infoBasic,
        ];
    }

    public function create()
    {
        $data = $this->sliderRepository->getModel();
        return [
            'infoBasic' => $this->infoBasic,
            'data'      => $data,
        ];
    }

    public function store($request)
    {
        if ($request->exists('image')) {
            $image_name           = $this->infoBasic['route'] . '-' . time();
            $image_file           = $request->image;
            $image_name_temporary = $image_file->getClientOriginalName();
            $image_full_name      = $image_name . '.' . $image_file->getClientOriginalExtension();

            if (!is_dir('public/uploads/images/' . $this->infoBasic['route'])) {
                mkdir('public/uploads/images/' . $this->infoBasic['route']);
            }

            rename('public/uploads/images/temporary/' . $image_name_temporary, 'public/uploads/images/' . $this->infoBasic['route'] . '/' . $image_full_name);
        };
        $data = [
            'name'     => $request->name,
            'image'    => $image_full_name,
            'description' => checkInputString($request->description),
            'status'   => checkInputData($request->status),
            'order_by' => checkInputData($request->order_by),
        ];

        $this->sliderRepository->store($data);
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
        $data = $this->sliderRepository->find($id);
        return [
            'infoBasic' => $this->infoBasic,
            'data'      => $data,
        ];
    }

    public function update($request, $id)
    {
        $slider = $this->sliderRepository->find($id);

        if ($request->exists('image')) {
            $image_name           = $this->infoBasic['route'] . '-' . time();
            $image_file           = $request->image;
            $image_name_temporary = $image_file->getClientOriginalName();
            $image_full_name      = $image_name . '.' . $image_file->getClientOriginalExtension();

            if (!is_dir('public/uploads/images/' . $this->infoBasic['route'])) {
                mkdir('public/uploads/images/' . $this->infoBasic['route']);
            }

            rename('public/uploads/images/temporary/' . $image_name_temporary, 'public/uploads/images/' . $this->infoBasic['route'] . '/' . $image_full_name);


            $image_old = 'public/uploads/images/' . $this->infoBasic['route'] . '/' . $slider->image;
            if (File::exists($image_old)) {
                File::delete($image_old);
            }
        }
        else {
            $image_full_name = $slider->image;
        }
        $data = [
            'name'     => $request->name,
            'image'    => $image_full_name,
            'description' => checkInputString($request->description),
            'status'   => checkInputData($request->status),
            'order_by' => checkInputData($request->order_by),
        ];
        $this->sliderRepository->update($data, $id);
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
        $slider = $this->sliderRepository->find($id);

        $image = 'public/uploads/images/' . $this->infoBasic['route'] . '/' . $slider->image;

        if (File::exists($image)) {
            File::delete($image);
        }

        $this->sliderRepository->destroy($id);
        return redirect()
            ->route($this->infoBasic['route'] . '.index')
            ->with(['noticeMassage' => 'Deleted!, Your data has been deleted., success']);
    }
}
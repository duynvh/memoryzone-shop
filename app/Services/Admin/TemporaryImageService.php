<?php
/**
 * Created by PhpStorm.
 * User: hoangduy
 * Date: 12/9/17
 * Time: 9:40 AM
 */

namespace App\Services\Admin;

use App\Repositories\TemporaryImageRepository;
use Illuminate\Support\Facades\File;
class TemporaryImageService
{
    private $repository;

    public function __construct(TemporaryImageRepository $repository) {
        $this->repository               = $repository;
    }

    public function uploadAjax($request) {
        if ($request->ajax()) {
            if ($request->hasFile('file')) {
                $image_file = $request->file('file');
                $image_name = $image_file->getClientOriginalName();
                $image_link = 'public/uploads/images/temporary/' . $image_name;
                $image_file->move('public/uploads/images/temporary/', $image_name);
                $this->repository->store([
                        'image' => $image_name,
                    ]
                );
                $rs = "<img width='200px' height='200px' src='" . asset($image_link) . "' alt='" . $image_name . "'>";
                return $rs;
            }
            else {
                return "no file";
            }
        }
        else {
            return "no ajax";
        }
    }

    public function deleteAjax($request) {
        if ($request->ajax()) {
            if ($request->hasFile('file')) {
                $image_file = $request->file('file');
                $image_name = $image_file->getClientOriginalName();
                $img        = 'public/upload/images/temporary/' . $image_name;
                if (File::exists($img)) {
                    File::delete($img);
                }
                return "true";
            }
            else {
                if ($request->has('action')) {
                    return "true";
                }
            }
        }
        else {
            return "no ajax";
        }
    }
}
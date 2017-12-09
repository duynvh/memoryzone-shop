<?php
/**
 * Created by PhpStorm.
 * User: hoangduy
 * Date: 12/9/17
 * Time: 9:43 AM
 */

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\TemporaryImageService;

class TemporaryImageController extends Controller
{
    private $temporaryImageService;
    public function __construct(TemporaryImageService $temporaryImageService) {
        $this->temporaryImageService = $temporaryImageService;
    }

    /**
     * @param Request $request
     *
     * @return string
     */
    public function uploadImageFile(Request $request) {
        return $this->temporaryImageService->uploadAjax($request);
    }

    /**
     * @param Request                   $request
     * @return string
     */
    public function deleteImageFile(Request $request) {
        return $this->temporaryImageService->deleteAjax($request);
    }
}
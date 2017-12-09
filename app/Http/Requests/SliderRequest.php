<?php
/**
 * Created by PhpStorm.
 * User: hoangduy
 * Date: 12/9/17
 * Time: 2:24 AM
 */

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'name'        => 'required|unique:sliders,name',
                    'image'       => 'required',
                    'description' => 'required',
                ];
                break;
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name'        => 'required|unique:sliders,name,' . $this->route('slider'),
                    'description' => 'required',
                ];
                break;
            }
            default:
                break;
        }
    }

    public function messages() {
        return [
            'name.required' => 'Tên không được bỏ trống.',
            'name.unique'   => 'Tên không được trùng.',
            'image.required' => 'Hình ảnh không được bỏ trống',
            'description.required' => 'Mô tả không được bỏ trống'
        ];
    }

}
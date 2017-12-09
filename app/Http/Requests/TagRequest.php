<?php
/**
 * Created by PhpStorm.
 * User: hoangduy
 * Date: 12/9/17
 * Time: 2:27 AM
 */

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
{
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
                    'name'                  => 'required|unique:tags,name',
                ];
                break;
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => 'required|unique:tags,name,' . $this->route('tag'),
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
        ];
    }
}
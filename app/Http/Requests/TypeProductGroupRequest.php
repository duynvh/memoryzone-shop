<?php
/**
 * Created by PhpStorm.
 * User: hoangduy
 * Date: 12/8/17
 * Time: 11:31 PM
 */
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeProductGroupRequest extends FormRequest
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
                    'name'                  => 'required|unique:type_product_groups,name',
                ];
                break;
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => 'required|unique:type_product_groups,name,' . $this->route('type_product_group'),
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
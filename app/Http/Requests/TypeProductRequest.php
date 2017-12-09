<?php
/**
 * Created by PhpStorm.
 * User: hoangduy
 * Date: 12/9/17
 * Time: 1:08 AM
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeProductRequest extends FormRequest
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
                    'name'                  => 'required|unique:type_products,name',
                    'type_product_group_id' => 'required'
                ];
                break;
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => 'required|unique:type_products,name,' . $this->route('type_product'),
                    'type_product_group_id' => 'required'
                ];
                break;
            }
            default:
                break;
        }
    }

    public function messages() {
        return [
            'name.required'                     => 'Tên không được bỏ trống.',
            'name.unique'                       => 'Tên không được trùng.',
            'type_product_group_id.required'    => 'Nhóm sản phẩm không được bỏ trống'
        ];
    }

}
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        if(request()->isMethod('post')){
            return [

                'Name'=>'required|string|max:258',
                'PicturePath'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'BarCode'=>'required|string|max:258',
                'PurchasPrice'=>'required',
                'Price'=>'required',
                'StockAlerte'=>'required',
                'category_id'=>'required',
                'unite_of_sale_id'=>'required',

            ];
        }
        else{
            return [

                'Name'=>'required|string|max:258',
                'PicturePath'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'BarCode'=>'required|string|max:258',
                'PurchasPrice'=>'required',
                'Price'=>'required',
                'StockAlerte'=>'required',
                'category_id'=>'required',
                'unite_of_sale_id'=>'required',

            ];

        }
    }


    public function messages()
    {
        if(request()->isMethod('post')){
            return [

                'Name.required'=>'taxe_id is required',
                'PicturePath.required'=>'taxe_id is required',
                'BarCode.required'=>'taxe_id is required',
                'PurchasPrice.required'=>'taxe_id is required',
                'Price.required'=>'taxe_id is required',
                'StockAlerte.required'=>'taxe_id is required',
                'category_id.required'=>'taxe_id is required',
                'unite_of_sale_id.required'=>'taxe_id is required',
            ];
        }
        else{
            return [
                'Name.required'=>'taxe_id is required',
                'PicturePath.required'=>'taxe_id is required',
                'BarCode.required'=>'taxe_id is required',
                'PurchasPrice.required'=>'taxe_id is required',
                'Price.required'=>'taxe_id is required',
                'StockAlerte.required'=>'taxe_id is required',
                'category_id.required'=>'taxe_id is required',
                'unite_of_sale_id.required'=>'taxe_id is required',
            ];

        }
    }
}

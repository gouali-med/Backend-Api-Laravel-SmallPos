<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
                'taxe_id'=>'required',
                'Name'=>'required|string|max:258',
                'Picture'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ];
        }
        else{
            return [
                'taxe_id'=>'required',
                'Name'=>'required|string|max:258',
                'Picture'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ];

        }
    }


    public function messages()
    {
        if(request()->isMethod('post')){
            return [
                'taxe_id.required'=>'taxe_id is required',
                'Name.required'=>'Name is required',
                'Picture.required'=>'Picture is required'

            ];
        }
        else{
            return [
                'taxe_id.required'=>'taxe_id is required',
                'Name.required'=>'Name is required',
                'Picture.required'=>'Picture is required'
            ];

        }
    }
}

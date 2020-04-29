<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateItemsRequest extends FormRequest
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
        return [
            'title'       => 'required|max:20|string',
            'brand'       => 'required|max:20|string',
            'model_name'=>'required|max:20|string',
            'category'=>'required|numeric|integer',
            'description' => 'required|string',
            'country' => 'nullable|string|max:30',
            'city' => 'nullable|string|max:50',
            'street_adress' => 'nullable|string|max:50',
            'phone' => 'nullable|integer|numeric',
            'email' => 'nullable|email',
            // 'image'       => 'required|image|mimes:jpeg,png,jpg,gif',
            //            'text_input'   => 'required',
            //            'select_input' => 'required',
            
            
        ];
    }
     public function messages()
    {
        return [
            'category.required' => 'You have not created or chosen category',
            
        ];
    }
}

        
       
      
       
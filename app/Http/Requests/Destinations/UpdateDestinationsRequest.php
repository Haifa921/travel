<?php

namespace App\Http\Requests\Destinations;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDestinationsRequest extends FormRequest
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
            'name' =>'required',
            'description' =>'required',
            'schedule' =>'required',
            'tourist_place_id'=>'required',
            'seats'=>'required',
            'price'=>'required',
            'takeoff_date'=>'required',
            'duration'=>'required',
        ];
    }
}

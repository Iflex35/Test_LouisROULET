<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimalUpdateRequest extends FormRequest
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
        $id = $this->animal;
		return [
			'name' => 'required|min:2|max:50|alpha|unique:animals,name,' . $id,
            'type' => 'required',
            'descr' => 'required|min:5|max:100'
		];
    }
}

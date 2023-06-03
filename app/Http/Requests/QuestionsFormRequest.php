<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class QuestionsFormRequest extends FormRequest
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
        $rules = [
            'label' => 'required',
            'answer' => 'required|string|min:1|max:255',
            'options' => 'required',
        ];

        return $rules;
    }

    /**
     * Get the request's data from the request.
     *
     *
     * @return array
     */
    public function getData()
    {
        $data = $this->only(['label', 'answer', 'options']);
        return $data;
    }

}

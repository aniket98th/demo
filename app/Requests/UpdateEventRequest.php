<?php

namespace App\Requests;

use App\Bases\BaseFormRequest;

class UpdateEventRequest extends BaseFormRequest
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
            'batch_name' => ['required'],
            'teacher_id' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'start_time' => ['required'],
            //'recurence' => ['required'],
            'capacity_number'=>['required'],
            'recurence.*' => ['required']
        ];
    }

    public function messages() {
        $messages = array(
            'required' => 'The :attribute field is required.'
        );
        return $messages;
    }
}


<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use StarterKit\Core\Http\Requests\MessagesTrait;
use Illuminate\Support\Facades\Auth;

class ArticleRequest extends FormRequest
{
    use MessagesTrait;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('admins')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title.ru' => 'required',
            'position' => 'required|integer'
        ];
    }
}

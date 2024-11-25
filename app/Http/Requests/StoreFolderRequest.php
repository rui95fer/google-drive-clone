<?php

namespace App\Http\Requests;

use App\Models\File;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class StoreFolderRequest extends ParentIdBaseRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'folderName' => [
                'required',
                Rule::unique(File::class, 'name')
                    ->where('created_by_user', Auth::id())
                    ->where('parent_id', $this->parent_id)
                    ->where('deleted_at', null)
            ]
        ]);
    }

    public function messages()
    {
        return [
            'name.unique' => 'The name has already been taken',
        ];
    }
}

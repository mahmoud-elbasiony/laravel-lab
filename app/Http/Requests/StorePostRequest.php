<?php

namespace App\Http\Requests;
use App\Models\post;
use App\Models\user;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StorePostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        // dd($this->user_id);
        return [
            "title" => ["required",
            "min:3",
            "unique:posts,title,".$this->post
        ],
            "description" => ["required","min:10"],
            "user_id" => ["required",
            'exists:users,id'
        ],
        
        "image"=>[
            File::types(['png', 'jpg'])
            ->min(400)
            ->max(12 * 1024),
        ]
        

        ];
    }
}

<?php

namespace App\Http\Requests\Profile;

use App\Models\Profile;
use App\Rules\Profile\HandlerRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

/**
 * @property-read \Illuminate\Http\UploadedFile|null $picture
 */
class UpdateRequest extends FormRequest
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
        /** @var User $profile */
        $user = Auth::user();
        $profile = $user->profile;

        return [
            'picture' => ['nullable','image','max:2048'], // 2MB max
            'handler' => [
                'required',
                'string',
                'max:255',
                Rule::unique(Profile::class)->ignore($profile),
                new HandlerRule()
            ],
            'description' => ['required','string','max:255']
        ];
    }
}

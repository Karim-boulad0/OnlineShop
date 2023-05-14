<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ProductStoreUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {

        return Auth::user()->type == 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'nullable|string',
            'category_id' => 'required|numeric|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'discount_price' => 'nullable|string',
            'quantite' => 'required|string',

        ];
    }
}

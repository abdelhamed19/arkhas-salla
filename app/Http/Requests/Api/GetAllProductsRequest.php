<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\BaseRequest;

class GetAllProductsRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable'],
            'category' => ['nullable', 'exists:categories,id'],
            'price_order' => ['nullable', 'in:ASC,DESC']
        ];
    }
}

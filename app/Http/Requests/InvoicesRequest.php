<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoicesRequest extends FormRequest
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
            'invoice_number' => 'required',
            'invoice_date' => 'required',
            'due_date' => 'required',
            'product_id' => 'required|exists:products,id',
            'category_id' => 'required|exists:categories,id',
            'Amount_collection' => 'required',
            'amount_Commission' => 'required',
            'discount' => 'required',
            'Rate_vat' => 'required',
        ];
    }
}

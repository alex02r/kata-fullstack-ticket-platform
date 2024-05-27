<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
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
        return [
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'operator_id' => 'required|exists:operators,id',
            'priority_id' => 'required|exists:priorities,id',
            'description' => 'required|string',
            'notes' => 'nullable|string',
            'date' => 'nullable|date',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio.',
            'title.string' => 'Il titolo deve essere una stringa.',
            'title.max' => 'Il titolo non può superare i 255 caratteri.',
            'category_id.required' => 'La categoria è obbligatoria.',
            'category_id.exists' => 'La categoria selezionata non è valida.',
            'operator_id.required' => 'L\'operatore è obbligatorio.',
            'operator_id.exists' => 'L\'operatore selezionato non è valido.',
            'priority_id.required' => 'La priorità è obbligatoria.',
            'priority_id.exists' => 'La priorità selezionata non è valida.',
            'description.required' => 'La descrizione è obbligatoria.',
            'description.string' => 'La descrizione deve essere una stringa.',
            'notes.string' => 'Le note devono essere una stringa.',
            'date.date' => 'La data non è valida.',
        ];
    }
}

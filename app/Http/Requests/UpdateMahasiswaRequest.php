<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMahasiswaRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $mahasiswa = $this->route('mahasiswa');

        return [
            'nim' => [
                'required',
                'string',
                'max:50',
                Rule::unique('mahasiswas', 'nim')->ignore($mahasiswa?->id_mahasiswa, 'id_mahasiswa'),
            ],
            'nama' => ['required', 'string', 'max:255'],
            'id_jurusan' => ['required', Rule::exists('jurusans', 'id_jurusan')],
        ];
    }
}

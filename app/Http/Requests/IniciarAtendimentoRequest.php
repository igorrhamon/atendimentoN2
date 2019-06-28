<?php

namespace App\Http\Requests;

use App\Atendimento;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class IniciarAtendimentoRequest extends FormRequest
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
            'hardDrive_id' => 'nullable',
//            @todo: Número do chamado está aceitando ocorrencias com número menor que 16;
            'numeroChamado' =>'digits:16',
            'location_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'numeroChamado.required' => 'Obrigatório o preenchimento do Número do Chamado',
            'numeroChamado.max' => 'Número do Chamado pode ter no máximo 16 números',
            'numeroChamado.digits' => 'Número do Chamado pode ter no máximo 16 números',
            'numeroChamado.numeric' => 'Número do Chamado deve conter somente números',
            'location_id.required'  => 'Escolha a localização de seu próximo atendimento',
        ];
    }
}

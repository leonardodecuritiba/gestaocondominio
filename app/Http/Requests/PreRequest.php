<?php

namespace App\Http\Requests;

use App\Models\Pre;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;


class PreRequest extends FormRequest
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
        $Data = Pre::find($this->pre);
        $id = count($Data) ? $Data->id : 0;
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
                break;
            }
            case 'POST': {
                return [
                    //VERIFICAR DADOS - LANÇAMENTO - PRE - RECEBIMENTO
                    //LANÇAMENTO: idtipo_lancamento, descricao, valor, (data_vencimento: SERÁ NULL, POIS SERÁ ANEXADO AO BOLETO DA PRÓXIMA TAXA ASSOCIATIVA)
                    'idtipo_lancamento' => 'required|exists:tipo_lancamentos,id',
                    'descricao' => 'required|min:3|max:100',
                    'valor' => 'required',

                    //RECEBIMENTO: idconta_bancaria, idlayout_arquivo, idimovel
                    'idconta_bancaria' => 'required|exists:conta_bancarias,id',
                    'idimovel' => 'required|exists:imovels,id',
                ];
                break;
            }
            case 'PUT':
            case 'PATCH': {
                return [
                ];
                break;
            }
            default:
                break;
        }
    }

    /**
     * Get the response that handle the request errors.
     *
     * @param  array $errors
     * @return array
     */
    public function response(array $errors)
    {
        if ($this->is('api/*')) {
            return response()->error($errors);
        } else {
            return \Redirect::back()->withErrors($errors)->withInput();
        }
    }
}

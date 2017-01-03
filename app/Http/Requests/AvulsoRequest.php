<?php

namespace App\Http\Requests;

use App\Models\Avulso;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;


class AvulsoRequest extends FormRequest
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
        $Data = Avulso::find($this->avulso);
        $id = count($Data) ? $Data->id : 0;
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
                break;
            }
            case 'POST': {
                return [
                    //VERIFICAR DADOS - LANÇAMENTO - AVULSO - RECEBIMENTO
                    //LANÇAMENTO: idtipo_lancamento, descricao, valor, data_vencimento
                    'idtipo_lancamento' => 'required|exists:tipo_lancamentos,id',
                    'descricao' => 'required|min:3|max:100',
                    'valor' => 'required',
                    'data_vencimento' => 'required',
                    //RECEBIMENTO: idconta_bancaria, idlayout_arquivo, idimovel
                    'idconta_bancaria' => 'required|exists:conta_bancarias,id',
                    'idlayout_arquivo' => 'required|exists:layout_arquivos,id',
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

<?php

namespace App\Http\Requests;

use App\Models\ContaBancaria;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;


class ContaBancariaRequest extends FormRequest
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
        $Data = ContaBancaria::find($this->conta_bancaria);
        $id = count($Data) ? $Data->id : 0;
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
                break;
            }
            case 'POST': {
                return [
                    'idbanco' => 'required|exists:bancos,id',
                    'agencia' => 'required',
                    'conta' => 'required',
                    'tipo' => 'required',
                    'operacao' => 'required',
                    'relatorio' => 'required',
                    'saldo' => 'required',
                ];
                break;
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'idbanco' => 'required|exists:bancos,id',
                    'agencia' => 'required',
                    'conta' => 'required',
                    'tipo' => 'required',
                    'operacao' => 'required',
                    'relatorio' => 'required',
                    'saldo' => 'required',
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

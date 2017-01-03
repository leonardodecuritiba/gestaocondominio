<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvulsoRequest;
use App\Models\Avulso;
use App\Models\Lancamento;
use App\Models\Recebimento;

class AvulsoController extends Controller
{
    private $name = 'Lançamento Avulso';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Data = Avulso::complete();
        if (count($Data)) {
            return response()->success($Data);
        }
        return response()->error(trans('messages.crud.MAE', ['name' => $this->name]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AvulsoRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AvulsoRequest $request)
    {
        try {
            /*
                    //VERIFICAR DADOS - LANÇAMENTO - AVULSO - RECEBIMENTO
                    //LANÇAMENTO: idtipo_lancamento, descricao, valor, data_vencimento
                    'idtipo_lancamento' => 'required|exists:tipo_lancamentos,id',
                    'descricao' => 'required|min:3|max:100',
                    'valor' => 'required',
                    //AVULSO: data_vencimento
                    'data_vencimento' => 'required',
                    //RECEBIMENTO: idconta_bancaria, idlayout_arquivo, idimovel
                    'idconta_bancaria' => 'required|exists:conta_bancarias,id',
                    'idlayout_arquivo' => 'required|exists:layout_arquivos,id',
                    'idimovel' => 'required|exists:imovels,id',
            */
            $data = $request->all();
            $Lancamento = Lancamento::create($data);
            $data['idlancamento'] = $Lancamento->id;
            Avulso::create($data);
            Recebimento::create($data);
        } catch (Exception $e) {
            return response()->error($e->getMessage);
        }
        return response()->success(trans('messages.crud.MSS', ['name' => $this->name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Data = Avulso::complete($id);
        if (count($Data)) {
            return response()->success($Data);
        } else {
            return response()->error(trans('messages.crud.MGE', ['name' => $this->name]));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AvulsoRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AvulsoRequest $request, $id)
    {
        $Data = Avulso::find($id);
        if (count($Data)) {
            try {
                $data = $request->all();
                $Data->update($data);
            } catch (Exception $e) {
                return response()->error($e->getMessage);
            }
            return response()->success(trans('messages.crud.MUS', ['name' => $this->name]));
        } else {
            return response()->error(trans('messages.crud.MGE', ['name' => $this->name]));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Data = Avulso::find($id);
        if (count($Data)) {
            try {
                $Data->delete();
            } catch (Exception $e) {
                return response()->error($e->getMessage);
            }
            return response()->success(trans('messages.crud.MDS', ['name' => $this->name]));
        } else {
            return response()->error(trans('messages.crud.MGE', ['name' => $this->name]));
        }
    }
}

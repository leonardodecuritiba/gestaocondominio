<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoLancamentoRequest;
use App\Models\TipoLancamento;

class TipoLancamentoController extends Controller
{
    private $name = 'Tipo de Lançamento';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Data = TipoLancamento::all();
        if (count($Data)) {
            return response()->success($Data);
        }
        return response()->error(trans('messages.crud.MAE', ['name' => $this->name]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TipoLancamentoRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoLancamentoRequest $request)
    {
        try {
            $data = $request->all();
            $Data = TipoLancamento::create($data);
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
        $Data = TipoLancamento::find($id);
        if (count($Data)) {
            return response()->success($Data);
        } else {
            return response()->error(trans('messages.crud.MGE', ['name' => $this->name]));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TipoLancamentoRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipoLancamentoRequest $request, $id)
    {
        $Data = TipoLancamento::find($id);
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
        $Data = TipoLancamento::find($id);
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

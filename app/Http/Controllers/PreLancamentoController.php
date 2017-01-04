<?php

namespace App\Http\Controllers;

use App\Http\Requests\PreLancamentoRequest;
use App\Models\PreLancamento;
use App\Models\Lancamento;
use App\Models\Recebimento;

class PreLancamentoController extends Controller
{
    private $name = 'Pré-Lançamento';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Data = PreLancamento::complete();
        if (count($Data)) {
            return response()->success($Data);
        }
        return response()->error(trans('messages.crud.MAE', ['name' => $this->name]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PreLancamentoRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PreLancamentoRequest $request)
    {
        try {
            PreLancamento::create($request->all());
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
        $Data = PreLancamento::complete($id);
        if (count($Data)) {
            return response()->success($Data);
        } else {
            return response()->error(trans('messages.crud.MGE', ['name' => $this->name]));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PreLancamentoRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PreLancamentoRequest $request, $id)
    {
        $Data = PreLancamento::find($id);
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
        $Data = PreLancamento::find($id);
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

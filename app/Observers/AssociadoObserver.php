<?php

namespace App\Observers;

use App\Models\Associado;

class AssociadoObserver
{
    /**
     * Listen to the Associado created event.
     *
     * @param  Associado $data
     * @return void
     */
    public function created(Associado $data)
    {
        //
    }

    /**
     * Listen to the Associado deleting event.
     *
     * @param  Associado $data
     * @return void
     */
    public function deleting(Associado $data)
    {
        //REMOVER EMAILS
        //REMOVER TELEFONES
        //REMOVER DEPENDENTES
        $data->contato()->delete(); //deleting contatos
    }
}
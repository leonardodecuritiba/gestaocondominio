<?php

namespace App\Observers;

use App\Models\Contato;

class ContatoObserver
{
    /**
     * Listen to the Contato created event.
     *
     * @param  Contato $data
     * @return void
     */
    public function created(Contato $data)
    {
        //
    }

    /**
     * Listen to the Contato deleting event.
     *
     * @param  Contato $data
     * @return void
     */
    public function deleting(Contato $data)
    {
        $data->emails()->delete(); //deleting emails
        $data->telefones()->delete(); //deleting telefones
    }
}
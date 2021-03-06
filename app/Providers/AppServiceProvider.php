<?php

namespace App\Providers;

use App\Models\Associado;
use App\Models\Contato;
use App\Models\Imovel;
use App\Observers\AssociadoObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Associado::observe(AssociadoObserver::class);
        Contato::observe(ContatoObserver::class);
        Imovel::observe(ImovelObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

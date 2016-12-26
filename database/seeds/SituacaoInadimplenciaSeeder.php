<?php

use Illuminate\Database\Seeder;

class SituacaoInadimplenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //php artisan db:seed --class=SituacaoInadimplenciaSeeder
        $start = microtime(true);
        echo "*** Iniciando os Seeders SituacaoInadimplenciaSeeder ***";
        $data = [
            ['idtipo_inadimplencia' => 1, 'descricao' => 'Falta de limpeza'],
            ['idtipo_inadimplencia' => 1, 'descricao' => 'Estacionamento incorreto'],
            ['idtipo_inadimplencia' => 2, 'descricao' => 'Uso incorreto'],
            ['idtipo_inadimplencia' => 2, 'descricao' => 'Som alto']
        ];
        foreach ($data as $dt) {
            \App\SituacaoInadimplencia::create($dt);
        }
        echo "\n*** Completo em " . round((microtime(true) - $start), 3) . "s ***";
    }
}

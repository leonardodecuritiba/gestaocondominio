<?php

use Illuminate\Database\Seeder;

class GrupoLancamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //php artisan db:seed --class=GrupoLancamentoSeeder
        $start = microtime(true);
        echo "*** Iniciando os Seeders GrupoLancamentoSeeder ***";
        $data = [
            ['descricao' => 'ISSQN'],
            ['descricao' => 'IR'],
            ['descricao' => 'IPVA'],
            ['descricao' => 'IPTU']
        ];
        foreach ($data as $dt) {
            \App\GrupoLancamento::create($dt);
        }
        echo "\n*** Completo em " . round((microtime(true) - $start), 3) . "s ***";
    }
}

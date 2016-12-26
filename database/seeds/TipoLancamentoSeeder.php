<?php

use Illuminate\Database\Seeder;

class TipoLancamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //php artisan db:seed --class=TipoLancamentoSeeder
        $start = microtime(true);
        echo "*** Iniciando os Seeders TipoLancamentoSeeder ***";
        $data = [
            ['idgrupo_lancamento' => 1, 'descricao' => 'TAXA 2', 'fluxo' => 'RECEITA'],
            ['idgrupo_lancamento' => 1, 'descricao' => 'TAXA X', 'fluxo' => 'DESPESA'],
            ['idgrupo_lancamento' => 2, 'descricao' => 'TAXA Y', 'fluxo' => 'RECEITA'],
            ['idgrupo_lancamento' => 2, 'descricao' => 'TAXA TESTE', 'fluxo' => 'DESPESA'],
            ['idgrupo_lancamento' => 3, 'descricao' => 'TAXA', 'fluxo' => 'RECEITA'],
            ['idgrupo_lancamento' => 4, 'descricao' => 'TAXA OUTRA', 'fluxo' => 'DESPESA']
        ];
        foreach ($data as $dt) {
            \App\Models\TipoLancamento::create($dt);
        }
        echo "\n*** Completo em " . round((microtime(true) - $start), 3) . "s ***";
    }
}

<?php

use Illuminate\Database\Seeder;

class AvulsoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //php artisan db:seed --class=AvulsoSeeder
        $start = microtime(true);
        echo "*** Iniciando os Seeders AvulsoSeeder ***";
        //Lançamento
        $data = [
            ['idtipo_lancamento' => 1, 'descricao' => 'Lançamento 1', 'valor' => 10000, 'tipo' => 'AVULSO', 'observacao' => ''],
            ['idtipo_lancamento' => 1, 'descricao' => 'Lançamento 2', 'valor' => 120045, 'tipo' => 'AVULSO', 'observacao' => ''],
            ['idtipo_lancamento' => 1, 'descricao' => 'Lançamento 3', 'valor' => 4120, 'tipo' => 'AVULSO', 'observacao' => 'Observação teste'],
            ['idtipo_lancamento' => 1, 'descricao' => 'Lançamento 4', 'valor' => 200, 'tipo' => 'AVULSO', 'observacao' => 'Observação teste'],
            ['idtipo_lancamento' => 1, 'descricao' => 'Lançamento 5', 'valor' => 15220, 'tipo' => 'AVULSO', 'observacao' => ''],
            ['idtipo_lancamento' => 1, 'descricao' => 'Lançamento 6', 'valor' => 120, 'tipo' => 'AVULSO', 'observacao' => 'Observação teste'],
            ['idtipo_lancamento' => 1, 'descricao' => 'Lançamento 7', 'valor' => 5000, 'tipo' => 'AVULSO', 'observacao' => 'Observação teste'],
        ];
        foreach ($data as $dt) {
            \App\Models\Lancamento::create($dt);
        }
        $data = [
            ['idlancamento' => 1],
            ['idlancamento' => 2],
            ['idlancamento' => 3],
            ['idlancamento' => 4],
            ['idlancamento' => 5, 'cancelamento' => 1, 'motivo_cancelamento' => 'Morador não existe mais'],
            ['idlancamento' => 6],
            ['idlancamento' => 7],
        ];
        foreach ($data as $dt) {
            \App\Models\Avulso::create($dt);
        }
        $data = [
            ['idlancamento' => 1, 'idconta_bancaria' => 1, 'idlayout_arquivo' => 1, 'idimovel' => 1, 'data_vencimento' => '15/01/2017'],
            ['idlancamento' => 2, 'idconta_bancaria' => 1, 'idlayout_arquivo' => 1, 'idimovel' => 1, 'data_vencimento' => '10/01/2017'],
            ['idlancamento' => 3, 'idconta_bancaria' => 1, 'idlayout_arquivo' => 1, 'idimovel' => 1, 'data_vencimento' => '09/01/2017'],
            ['idlancamento' => 4, 'idconta_bancaria' => 1, 'idlayout_arquivo' => 1, 'idimovel' => 1, 'data_vencimento' => '06/01/2017'],
            ['idlancamento' => 5, 'idconta_bancaria' => 1, 'idlayout_arquivo' => 1, 'idimovel' => 1, 'data_vencimento' => '01/01/2017'],
            ['idlancamento' => 6, 'idconta_bancaria' => 1, 'idlayout_arquivo' => 1, 'idimovel' => 1, 'data_vencimento' => '19/01/2017'],
            ['idlancamento' => 7, 'idconta_bancaria' => 1, 'idlayout_arquivo' => 1, 'idimovel' => 1, 'data_vencimento' => '06/01/2017'],
        ];
        foreach ($data as $dt) {
            \App\Models\Recebimento::create($dt);
        }
        echo "\n*** Completo em " . round((microtime(true) - $start), 3) . "s ***";
    }
}

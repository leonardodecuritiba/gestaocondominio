<?php

use Illuminate\Database\Seeder;

class ContaBancariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //php artisan db:seed --class=ContaBancariaSeeder
        $start = microtime(true);
        echo "*** Iniciando os Seeders ContaBancariaSeeder ***";
        $data = [
            ['idbanco' => 1, 'agencia' => '1212', 'conta' => '31315', 'operacao' => '2', 'relatorio' => 1, 'saldo' => 5355.21],
            ['idbanco' => 1, 'agencia' => '1442', 'conta' => '789989', 'operacao' => '2', 'relatorio' => 1, 'saldo' => 1254.21],
            ['idbanco' => 1, 'agencia' => '1234', 'conta' => '46563', 'operacao' => '0', 'relatorio' => 0, 'saldo' => 453587.21],
            ['idbanco' => 2, 'agencia' => '1257', 'conta' => '236536', 'operacao' => '1', 'relatorio' => 1, 'saldo' => 7333.21],
            ['idbanco' => 2, 'agencia' => '3468', 'conta' => '32523', 'operacao' => '3', 'relatorio' => 0, 'saldo' => 523544.21],
            ['idbanco' => 2, 'agencia' => '8568', 'conta' => '235235', 'operacao' => '5', 'relatorio' => 0, 'saldo' => 3899.21],
            ['idbanco' => 2, 'agencia' => '5435', 'conta' => '235236', 'operacao' => '1', 'relatorio' => 1, 'saldo' => 45324.21],
        ];
        foreach ($data as $dt) {
            \App\Models\ContaBancaria::create($dt);
        }
        echo "\n*** Completo em " . round((microtime(true) - $start), 3) . "s ***";
    }
}

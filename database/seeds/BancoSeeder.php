<?php

use Illuminate\Database\Seeder;

class BancoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //php artisan db:seed --class=BancoSeeder
        $start = microtime(true);
        echo "*** Iniciando os Seeders BancoSeeder ***";
        $data = [
            ['codigo' => '000', 'descricao' => 'CAIXA ECONÔMICA FEDERAL', 'url' => 'www.caixa.com.br'],
            ['codigo' => '100', 'descricao' => 'BANCO DO BRASIL', 'url' => 'www.bb.com.br']
        ];
        foreach ($data as $dt) {
            \App\Models\Banco::create($dt);
        }
        echo "\n*** Completo em " . round((microtime(true) - $start), 3) . "s ***";
    }
}

<?php

use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //php artisan db:seed --class=DepartamentoSeeder
        $start = microtime(true);
        echo "*** Iniciando os Seeders DepartamentoSeeder ***";
        $data = [
            ['descricao' => 'Escritório'],
            ['descricao' => 'Jardinagem'],
            ['descricao' => 'Financeiro'],
            ['descricao' => 'Limpeza'],
        ];
        foreach ($data as $dt) {
            \App\Models\Departamento::create($dt);
        }
        echo "\n*** Completo em " . round((microtime(true) - $start), 3) . "s ***";
    }
}

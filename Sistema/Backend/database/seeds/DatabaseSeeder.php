<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $loja = DB::table('lojas')->insertGetId([
            'nome' => 'Loja Seed',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $user = DB::table('users')->insertGetId([
            'name'      => 'Usuário de Seed',
            'email'     => 'teste@teste.com',
            'password'  => '$2y$10$xMD9DsNkvTE6i8KdG8quge/Qk3K2EfMZQIQYcaa.LyFS8pp2tNHfq',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $produto1 = DB::table('produtos')->insertGetId([
            'nome'      => 'Produto Seed',
            'unidade'   => 'ad',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $produto2 = DB::table('produtos')->insertGetId([
            'nome'      => 'Produto Seed 2',
            'unidade'   => 'ad',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $estoque1 = DB::table('estoques')->insertGetId([
            'fk_id_produto' => $produto1,
            'fk_id_loja'    => $loja,
            'quantidade'    => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $estoque1 = DB::table('estoques')->insertGetId([
            'fk_id_produto' => $produto2,
            'fk_id_loja'    => $loja,
            'quantidade'    => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}

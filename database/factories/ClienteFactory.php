<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class ClienteFactory extends Factory
{


    protected $model = Cliente::class;

    public static string $senhaPadrao = 'teste123';

    public function withPessoa( Pessoa $objPessoa) {
        $this->objPessoa = $objPessoa;
        return $this;
    }
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('pt_BR');

        $objPessoa = $this->objPessoa ?? Pessoa::factory()->create();

        return [
            'nome_cliente'  => $faker->userName(),
            'senha'         => Hash::make( self::$senhaPadrao),
            'pessoa_id'     => $objPessoa->id,
        ];
    }
}

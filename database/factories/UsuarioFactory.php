<?php

namespace Database\Factories;

use App\Models\Pessoa;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UsuarioFactory extends Factory
{

    protected $model = Usuario::class;

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
            'nome_usuario'  => $faker->userName(),
            'senha'         => Hash::make( self::$senhaPadrao),
            'pessoa_id'     => $objPessoa->id,
        ];
    }
}

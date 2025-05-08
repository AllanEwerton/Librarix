<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Classes;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classes>
 */
class ClassesFactory extends Factory
{
    protected $model = Classes::class;

    public function definition()
    {
        $seriesFundamental = ['1º', '2º', '3º', '4º', '5º' , '6º' , '7º' , '8º' , '9º'];
        $seriesMedio = ['1ª', '2ª', '3ª'];
        $turnos = ['manhã', 'tarde', 'noite'];
        $niveis = ['Fundamental', 'Médio', 'EJA'];
        $letras = ['A', 'B', 'C', 'D', 'E'];

        return [
            'nome' => ($niveis == 'Fundamental' ?
            $this->faker->randomElement($seriesFundamental) :
            $this->faker->randomElement($seriesMedio)) . ' Ano ' . $this->faker->randomElement($letras),
            'ano' => now()->year,
            'turno' => $this->faker->randomElement($turnos),
            'nivel' => $this->faker->randomElement($niveis),
            'status' => 'ativo',
        ];
    }
}

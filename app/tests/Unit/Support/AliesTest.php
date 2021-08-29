<?php

namespace Tests\Unit\Support;

use App\Support\Alies;
use PHPUnit\Framework\TestCase;

class AliesTest extends TestCase
{

    public function test_must_return_the_first_name()
    {
        $full_name = " maria vitoria de alencar";
        $first_name = Alies::firstName($full_name);
        self::assertEquals('Maria', $first_name);
    }

    public function test_must_return_composite_name()
    {
        $full_name = " maria vitoria de alencar";
        $compound_name = Alies::getCompoundName($full_name);
        self::assertEquals('Maria Vitoria', $compound_name);
    }

    public function dataProviderUsers(): array
    {
        return [
            ['Everaldo da Costa Filho', 'Everaldo'],
            ['Lucas Almeida', 'Lucas'],
            ['Amanda Almeida', 'Amanda'],
            [' Joãozinho da Silva', 'Joãozinho'],
            [' Joãozinho  da Silva', 'Joãozinho'],
            [' joãozinho da Silva', 'Joãozinho'],
            [' Maria vitoria de Alencar', 'Maria Vitoria'],
            ["Everaldo da costa Filho", "Everaldo"],
            ["Maria Eduarda Costa", "Maria Eduarda"],
            [" Jubileu Silva de Alencar", "Jubileu"],
            ["lucas brabo de souza", "Lucas"],
            [" Victor  hugo", "Victor Hugo"],
            ["maria clara silva", "Maria Clara"],
            ["   ", null],
            ["", null],
            ["téo de alencar", "Téo"]
        ];
    }
}

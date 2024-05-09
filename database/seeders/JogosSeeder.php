<?php

namespace Database\Seeders;

use App\Models\Jogos;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class JogosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $descriptions = [
            'É um jogo incrível com gráficos e jogabilidade fantásticos.',
            'Um imprescindível para fãs do gênero.',
            'Uma aventura épica que vai mantê-lo na beira da cadeira.',
            'Um jogo único e inovador que estica os limites da mídia.',
            'Um jogo divertido e adictivo que não conseguirá largar.' 
        ];

        $classifications = [
            '12+',
            '16+',
            '18+',
            'Livre',
        ];

        $platforms = [
            'PC',
            'PS5',
            'Xbox',
            'Nintendo Switch',
            'iOS',
            'Android',
        ];

        $developers = [
            'Desenvolvedor 1',
            'Desenvolvedor 2',
            'Desenvolvedor 3',
            'Desenvolvedor 4',
            'Desenvolvedor 5',
        ];

        $distributors = [
            'Distribuidor 1',
            'Distribuidor 2',
            'Distribuidor 3',
            'Distribuidor 4',
            'Distribuidor 5',
        ];

        $categories = [
            'Ação',
            'Aventura',
            'RP',
            'Estratégia',
            'Simulação',
            'Esporte',
            'Puzzle',
            'Console',
            'Luta',
            'Tiro',
        ];
        for ($i = 0; $i < 999 ; $i++) {
            $numberOfPlatforms = rand(1, count($platforms));
            $randomPlatforms = array_rand($platforms, $numberOfPlatforms);
            $randomPlatforms = is_array($randomPlatforms) ? $randomPlatforms : [$randomPlatforms];
            $platformsValues = array_map(function ($index) use ($platforms) {
                return $platforms[$index];
            }, $randomPlatforms);
            Jogos::create([
                'nome' => 'Game ' . $i,
                'preco' => rand(19.99, 99.99),
                'descricao' => $descriptions[array_rand($descriptions)],
                'classificacao' => $classifications[array_rand($classifications)],
                'plataformas' => implode(', ', $platformsValues),
                'desenvolvedor' => $developers[array_rand($developers)],
                'distribuidora' => $distributors[array_rand($distributors)],
                'categoria' => $categories[array_rand($categories)],
            ]);
        }
    }
}

// executar: php artisan db:seed --class=JogosSeeder
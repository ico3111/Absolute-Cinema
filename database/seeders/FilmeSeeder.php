<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Filme;
class FilmeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Filme::create([
            'id_categoria' => '7',
            'nome' => 'Duna 2',
            'sinopse' => 'Paul Atreides se une a Chani e aos Fremen enquanto busca vingança contra os conspiradores que destruíram sua família. Enfrentando uma escolha entre o amor de sua vida e o destino do universo, ele deve evitar um futuro terrível que só ele pode prever.',
            'ano' => '2024',
            'imagem' => 'https://br.web.img3.acsta.net/pictures/23/05/26/17/47/1900372.jpg',
            'trailer' => 'https://www.youtube.com/watch?v=Way9Dexny3w'
        ]);

        Filme::create([
            'id_categoria' => '2',
            'nome' => 'Corra!',
            'sinopse' => 'Chris é um jovem fotógrafo negro que está prestes a conhecer os pais de Rose, sua namorada caucasiana. Na luxuosa propriedade dos pais dela, Chris percebe que a família esconde algo muito perturbador.',
            'ano' => '2017',
            'imagem' => 'https://br.web.img3.acsta.net/pictures/17/04/19/21/08/577190.jpg',
            'trailer' => 'https://www.youtube.com/watch?v=sRfnevzM9kQ'
        ]);

        Filme::create([
            'id_categoria' => '1',
            'nome' => 'Batman: O Cavaleiro das Trevas Ressurge',
            'sinopse' => 'Após ser culpado pela morte de Harvey Dent e passar de herói a vilão, Batman desaparece. As coisas mudam com a chegada de uma ladra misteriosa, a Mulher-Gato, e Bane, um terrorista mascarado, que fazem Batman abandonar seu exílio forçado.',
            'ano' => '2012',
            'imagem' => 'https://br.web.img3.acsta.net/medias/nmedia/18/90/57/96/20121842.jpg',
            'trailer' => 'https://www.youtube.com/watch?v=q8ncjHylG6c'
        ]);

        Filme::create([
            'id_categoria' => '3',
            'nome' => 'Indiana Jones e o Templo da Perdição',
            'sinopse' => 'Indiana Jones tem como missão resgatar uma pedra roubada por um cruel feiticeiro na Índia. Ele descobre uma mina onde crianças são escravizadas e se depara com cultos de sacrifício humano nas catacumbas de um antigo palácio.',
            'ano' => '1984',
            'imagem' => 'https://br.web.img2.acsta.net/medias/nmedia/18/91/98/02/20172661.jpg',
            'trailer' => 'https://www.youtube.com/watch?v=x5eeVvNl11A'
        ]);

        Filme::create([
            'id_categoria' => '3',
            'nome' => 'Jumanji: Bem-vindo à Selva',
            'sinopse' => 'Spencer volta ao mundo fantástico de Jumanji. Os amigos Martha, Fridge e Bethany entram no jogo e tentam trazê-lo para casa. A turma descobre ainda mais obstáculos e perigos a serem superados.',
            'ano' => '2019',
            'imagem' => 'https://br.web.img3.acsta.net/pictures/20/01/28/22/12/4169305.jpg',
            'trailer' => 'https://www.youtube.com/watch?v=rBxcF-r9Ibs'
        ]);

        Filme::create([
            'id_categoria' => '2',
            'nome' => 'O Enigma de Outro Mundo',
            'sinopse' => 'Na Antártida, um grupo isolado de cientistas norte-americanos encontra os restos congelados de um organismo alienígena. Quando a criatura assume a forma de um dos cachorros da base de pesquisas, os cientistas descobrem que ela pode simular a aparência de qualquer ser vivo. A equipe corre contra o tempo em uma batalha desesperada para destruir o extraterrestre antes que seja tarde demais.',
            'ano' => '1982',
            'imagem' => 'https://media.fstatic.com/LE8eGDlG4pN3_ygDfyfO9_uz3UY=/322x478/smart/filters:format(webp)/media/movies/covers/2019/09/add_por_funeste_Sh2q2q1.jpg',
            'trailer' => 'https://www.youtube.com/watch?v=zIYzgajZ5KU'
        ]);

        Filme::create([
            'id_categoria' => '2',
            'nome' => 'Nosferatu',
            'sinopse' => 'O corretor de imóveis Hutter precisa vender um castelo cujo proprietário é o excêntrico conde Graf Orlock. O conde, na verdade, é um vampiro milenar que espalha o terror na região de Bremen, na Alemanha e se interessa por Ellen, a mulher de Hutter.',
            'ano' => '1922',
            'imagem' => 'https://images.justwatch.com/poster/310180895/s718/nosferatu.jpg',
            'trailer' => 'https://www.youtube.com/watch?v=_UnDFjdKAWk'
        ]);
    }
}

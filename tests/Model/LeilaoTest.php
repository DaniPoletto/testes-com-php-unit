<?php
namespace Alura\Leilao\Tests\Model;

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use PHPUnit\Framework\TestCase;

class LeilaoTest extends TestCase
{
    /**
     * @dataProvider geraLances
     */
    public function testLeilaoDeveReceberLances(
        int $qtddDeLances, 
        Leilao $leilao, 
        array $valores
    ) {
        static::assertCount($qtddDeLances, $leilao->getLances());

        foreach ($valores as $i => $valorEsperado) {
            static::assertEquals($valores[$i], $leilao->getLances()[$i]->getValor());
        }
    }

    public function geraLances()
    {
        $joao = new Usuario('João');
        $maria = new Usuario('Maria');

        $leilaoCom2Lances = new Leilao('Fiat');

        $leilaoCom2Lances->recebeLance(new Lance($maria, 1000));
        $leilaoCom2Lances->recebeLance(new Lance($joao, 2000));

        $leilaoCom1Lance = new Leilao('Fusca');
        $leilaoCom1Lance->recebeLance(new Lance($maria, 5000));

        return [
            "2-lances" => [2, $leilaoCom2Lances, [1000, 2000]],
            "1-lance" => [1, $leilaoCom1Lance, [5000]],
        ];
    }
}
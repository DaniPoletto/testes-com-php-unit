<?php
namespace Alura\Leilao\Tests\Model;

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use PHPUnit\Framework\TestCase;

class LeilaoTest extends TestCase
{
    public function testLeilaoNaoDeveReceberLancesRepetidos()
    {
        $leilao = new Leilao('Variant');
        $ana = new Usuario('Ana');

        $leilao->recebeLance(new Lance($ana, 1000));
        $leilao->recebeLance(new Lance($ana, 1500));

        static::assertCount(1, $leilao->getLances());
        static::assertEquals(1000, $leilao->getLances()[0]->getValor());
    }

    public function testLeilaoNaoDeveAceitarMaisDe5LancesPorUsuario()
    {
        $leilao = new Leilao('Brasília Amarela');

        $joao = new Usuario('joao');
        $maria = new Usuario('maria');

        $leilao->recebeLance(new Lance($joao, 1000));
        $leilao->recebeLance(new Lance($maria, 1500)); 
        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($maria, 2500)); 
        $leilao->recebeLance(new Lance($joao, 3000));
        $leilao->recebeLance(new Lance($maria, 3500)); 
        $leilao->recebeLance(new Lance($joao, 4000));
        $leilao->recebeLance(new Lance($maria, 4500)); 
        $leilao->recebeLance(new Lance($joao, 5000));
        $leilao->recebeLance(new Lance($maria, 5500));

        $leilao->recebeLance(new Lance($joao, 6000));

        static::assertCount(10, $leilao->getLances());
        static::assertEquals(5500, $leilao->getLances()[array_key_last($leilao->getLances())]->getValor());
    }

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
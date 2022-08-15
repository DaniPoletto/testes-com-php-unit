<?php
namespace Alura\Leilao\Tests\Service;

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use PHPUnit\Framework\TestCase;
use Alura\Leilao\Service\Avaliador;

class AvaliadorTest extends TestCase
{
    /** 
    * @dataProvider leilaoEmOrdemCrescente
    * @dataProvider leilaoEmOrdemDecrescente
    * @dataProvider leilaoEmOrdemAleatoria
    */
    public function testAvaliadorDeveEncontrarOMaiorValorDeLances(Leilao $leilao)
    {
        $leiloeiro = new Avaliador();

        // Act - When
        $leiloeiro->avalia($leilao);

        $maiorValor = $leiloeiro->getMaiorValor();

        // Assert - Then
        self::assertEquals(2500, $maiorValor);
    }

    /** 
    * @dataProvider leilaoEmOrdemCrescente
    * @dataProvider leilaoEmOrdemDecrescente
    * @dataProvider leilaoEmOrdemAleatoria
    */
    public function testAvaliadorDeveEncontrarOMenorValorDeLances(Leilao $leilao)
    {
        $leiloeiro = new Avaliador();

        // Act - When
        $leiloeiro->avalia($leilao);

        $menorValor = $leiloeiro->getMenorValor();

        // Assert - Then
        self::assertEquals(1700, $menorValor);
    }

    /** 
    * @dataProvider leilaoEmOrdemCrescente
    * @dataProvider leilaoEmOrdemDecrescente
    * @dataProvider leilaoEmOrdemAleatoria
    */
    public function testAvaliadorDeveBuscarOs3MaioresValores(Leilao $leilao)
    {
        $leiloeiro = new Avaliador();
        $leiloeiro->avalia($leilao);

        $maiores = $leiloeiro->getMaioresLances();

        self::assertCount(3, $maiores);
        self::assertEquals(2500, $maiores[0]->getValor());
        self::assertEquals(2000, $maiores[1]->getValor());
        self::assertEquals(1700, $maiores[2]->getValor());
    }

    public function leilaoEmOrdemCrescente()
    {
        $leilao = new Leilao('Fiat 147 0KM');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');
        $ana = new Usuario('Ana');

        $leilao->recebeLance(new Lance($ana, 1700));
        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($maria, 2500));

        return [
            [$leilao]
        ];
    }

    public function leilaoEmOrdemDecrescente()
    {
        $leilao = new Leilao('Fiat 147 0KM');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');
        $ana = new Usuario('Ana');

        $leilao->recebeLance(new Lance($ana, 2500));
        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($maria, 1700));

        return [
            [$leilao]
        ];
    }

    public function leilaoEmOrdemAleatoria()
    {
        $leilao = new Leilao('Fiat 147 0KM');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');
        $ana = new Usuario('Ana');

        $leilao->recebeLance(new Lance($ana, 2500));
        $leilao->recebeLance(new Lance($joao, 1700));
        $leilao->recebeLance(new Lance($maria, 2000));

        return [
            [$leilao]
        ];
    }
}
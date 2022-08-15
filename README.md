# Testes com [PHP Unit 9](https://phpunit.de)

Para gerar o autoload do composer
```
composer dump
```

Instalação do Php unit
```
composer require --dev phpunit/phpunit ^9
```

Varificar versão intalada do Php unit
```
vendor\bin\phpunit --version
```

### Convensões do PHP Unit
- Criar uma pasta "tests" na raiz
- Dentro da pasta "tests" criar uma pasta "Service" porque a classe a ser testada está na pasta "Service" dentro de src
- Nomear o arquivo com NomeDaClasse + sufixo "Teste". Ex: AvaliadorTest.php
- Nomes de métodos devem começar com "test" ou ter a anotação @test

### Classe de teste

Toda classe de teste precisa estender TestCase. 

É importante das nomes descritivos ao métodos dessa classe. 

```
<?php
namespace Alura\Leilao\Tests\Service;

use PHPUnit\Framework\TestCase;

class AvaliadorTest extends TestCase
{

}
```

Verifica se os valores são iguais
```
$this->assertEquals(2500, $maiorValor);
```

Verificar se há 3 no array
```
static::assertCount(3, $maiores);
```

[Outros métodos de asserções](https://phpunit.readthedocs.io/en/8.5/assertions.html)

Executar os testes da pasta tests
```
vendor\bin\phpunit tests
```

Excecutar os testes com cores
```
vendor\bin\phpunit --colors tests
```

### Classes de equivalência e análise de valores de fronteira
https://testwarequality.blogspot.com/p/tenicas-de-teste.html?fbclid=IwAR1OfYyzuwLkkulGVkF6S1LxkJtVuL9BeuIkAaSoqhsuMNV7roEPf_6H1HE

### Data Provider
Uma forma de fornecer dados pros testes. A anotação faz com que o teste seja executado utilizando os parâmetros passados pelo método entregaLeiloes() 3x (uma utilizando dados em ordem crescente, outra descrescente e uma aleatória. 

```
    /** 
    * @dataProvider entregaLeiloes
    */
    public function testAvaliadorDeveEncontrarOMaiorValorDeLances()
    {
      ...
    }
    
    public function entregaLeiloes()
    {
        return [
            [$this->leilaoEmOrdemCrescente()],
            [$this->leilaoEmOrdemDecrescente()],
            [$this->leilaoEmOrdemAleatoria()],
        ];
    }
```






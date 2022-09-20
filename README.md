# Testes com [PHP Unit 9](https://phpunit.de)

### Especificações do Projeto
- [x] Os usuários podem dar lances em um leilão
- [x] Um leiloeiro avalia o leilão informando qual o maior valor de lance, qual o menor valor e os 3 maiores lances
- [x] Um usuário não pode dar dois lances consecutivos
- [x] Um usuário só pode dar no máximo 5 lances
- [x] Testes devem ser criados para verificar essas especificações

### Composer
Para gerar o autoload do composer
```
composer dump
```

### Instalação do Php unit
```
composer require --dev phpunit/phpunit ^9
```

### Verificar versão instalada do Php unit
```
vendor\bin\phpunit --version
```

### Convensões do PHP Unit
- [x] Criar uma pasta "tests" na raiz
- [x] Dentro da pasta "tests" criar uma pasta "Service" porque a classe a ser testada está na pasta "Service" dentro de src
- [x] Nomear o arquivo com NomeDaClasse + sufixo "Test". Ex: AvaliadorTest.php
- [x] Nomes de métodos devem começar com "test" ou ter a anotação @test

### Classe de teste

Toda classe de teste precisa estender TestCase. 

É importante dar nomes descritivos ao métodos dessa classe. 

```
<?php
namespace Alura\Leilao\Tests\Service;

use PHPUnit\Framework\TestCase;

class AvaliadorTest extends TestCase
{

}
```

### Verifica se os valores são iguais
```
$this->assertEquals(2500, $maiorValor);
```

### Verificar se há 3 no array
```
static::assertCount(3, $maiores);
```

[Outros métodos de asserções](https://phpunit.readthedocs.io/en/8.5/assertions.html)

### Executar os testes da pasta tests
```
vendor\bin\phpunit tests
```

![[Testes](https://github.com/DaniPoletto/testes-com-php-unit/blob/main/img/testes2.jpg)](https://github.com/DaniPoletto/testes-com-php-unit/blob/main/testes2.jpg)

### Excecutar os testes com cores
```
vendor\bin\phpunit --colors tests
```

### Classes de equivalência e análise de valores de fronteira
https://testwarequality.blogspot.com/p/tenicas-de-teste.html?fbclid=IwAR1OfYyzuwLkkulGVkF6S1LxkJtVuL9BeuIkAaSoqhsuMNV7roEPf_6H1HE

### Data Provider
Uma forma de fornecer dados pros testes. A anotação faz com que o teste seja executado utilizando os parâmetros passados pelo método entregaLeiloes() 3x (uma utilizando dados em ordem crescente, outra descrescente e uma aleatória). 

```
    /** 
    * @dataProvider entregaLeiloes
    */
    public function testAvaliadorDeveEncontrarOMaiorValorDeLances($leilao)
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

Outra forma
```
    /** 
    * @dataProvider leilaoEmOrdemCrescente
    * @dataProvider leilaoEmOrdemDecrescente
    * @dataProvider leilaoEmOrdemAleatoria
    */
    public function testAvaliadorDeveEncontrarOMaiorValorDeLances(Leilao $leilao)
    {
        ...
    }
    
    public function leilaoEmOrdemAleatoria()
    {
        ...
        return [
            [$leilao]
        ];
    }
    
    public function leilaoEmOrdemCrescente()
    {
        ...
        return [
            [$leilao]
        ];
    }
    
    public function leilaoEmOrdemDecrescente()
    {
        ...
        return [
            [$leilao]
        ];
    }
 ```
 
 ### Método setUp
 Método executado antes de cada teste.
 ```
     protected function setUp() : void
    {
        $this->leiloeiro = new Avaliador();
    }
```

### Método tearDown
Método executado após cada teste.

### Método setUpBeforeClass
Método executado antes de todos os testes. 

### Método tearDownBeforeClass
Método executado depois de todos os testes.

### Configurações com XML
É possivel configurar algumas coisas, como, por exemplo, habilitar as cores e qual diretório de testes.

```
<phpunit colors="true">
    <testsuites>
        <testsuite name="unit">
            <directory>tests</directory>
        </testsuite>
    </testsuites>
</phpunit>
```
[Mais configurações](https://phpunit.readthedocs.io/en/9.5/configuration.html)

### Executar os testes após configuração do xml
```
vendor\bin\phpunit
```

#### Para gerar um arquivo de relatório de testes
```
    <logging>
        <log type="testdox-text" target="testes-executados.txt"/>
    </logging>
```

![[Testes](https://github.com/DaniPoletto/testes-com-php-unit/blob/main/img/testes.jpg)](https://github.com/DaniPoletto/testes-com-php-unit/blob/main/testes.jpg)

### TDD
Ciclo de desenvolvimento guiado a testes. 
Primeiro criar um teste, depois implementar a funcionalidade e depois refatorar. 

### Testes de exceções
Verifica se foi lançada uma exceção do tipo DomainException com a seguinte mensagem:
```
        $this->expectException(\DomainException::class);
        $this->expectExceptionMessage('Não é possivel avaliar leilão vazio.');
```


 






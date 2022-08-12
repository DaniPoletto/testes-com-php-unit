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




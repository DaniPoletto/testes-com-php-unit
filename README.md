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

### Classe de teste

Toda classe de teste precisa estender TestCase.

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

Executar os testes da pasta tests
```
vendor\bin\phpunit tests
```

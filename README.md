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


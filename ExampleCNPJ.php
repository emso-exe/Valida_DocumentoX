<?php

require_once "vendor/autoload.php";

use Emso\ValidaDocumentoX\ValidateCNPJ;

$cnpj = new ValidateCNPJ;

echo "<pre>\n---------------------- CNPJ 1 ----------------------\n";

$resultado = $cnpj->cnpj('60.872.504/0001-23');

var_dump($resultado);

echo "\n---------------------- CNPJ 2 ----------------------\n";

$resultado = $cnpj->cnpj('00000000000000');

var_dump($resultado);

echo "</pre>";
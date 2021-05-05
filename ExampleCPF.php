<?php

require_once "vendor/autoload.php";

use Emso\ValidaDocumentoX\ValidateCPF;

$cpf = new ValidateCPF;

echo "<pre>\n---------------------- CPF 1 ----------------------\n";

$resultado = $cpf->cpf('');

var_dump($resultado);

echo "\n---------------------- CPF 2 ----------------------\n";

$resultado = $cpf->cpf('111.111.111-11');

var_dump($resultado);

echo "</pre>";
<?php

require_once "vendor/autoload.php";

use Emso\ValidaDocumentoX\ValidateCPF;
use Emso\ValidaDocumentoX\ValidateCNPJ;

$cpf = new ValidateCPF;
$cnpj = new ValidateCNPJ;

echo "<pre>\n---------------------- CPF ----------------------\n";

$resultado = $cpf->cpf('12345678910'); #insira um cpf válido

var_dump($resultado);

echo "</pre>";

echo "<pre>\n---------------------- CNPJ ----------------------\n";

$resultado = $cnpj->cnpj('60.872.504/0001-23');

var_dump($resultado);

echo "</pre>";
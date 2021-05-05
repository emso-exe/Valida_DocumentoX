<?php

namespace Emso\ValidaDocumentoX;

/**
 * Classe ValidateCNPJ
 * Classe final para validação de CNPJ
 * @author Estênio Mariano <dev.emso.exe@gmail.com>
 * @version 1.0.0
 */

final class ValidateCNPJ
{

    /**
     * Método checkCNPJ
     * Método privado, estático para tratamento de CNPJ, removendo caracteres não numéricos, verificando
     * a quantidade, se é uma sequência de números idênticos e validando se o CNPJ é válido.
     * @param string $cnpj
     * Parâmetro para recebimento de CNPJ.
     * @return int $cnpj
     */
    private static function checkCNPJ(string $cnpj): int
    {
        $cnpj = preg_replace('/[^0-9]/im', '', $cnpj);

        if (strlen($cnpj) != 14) {
            die('CNPJ deve conter 14 números.');
        }

        if (preg_match('/([0-9])\1{10}/', $cnpj)) {
            die('CNPJ com sequência de números idênticos.');
        }

        $cnpj_original          = $cnpj;
        $primeiros_numeros_cnpj = substr($cnpj, 0, 12);

        function multiplica_cnpj($cnpj, $posicao = 5)
        {
            $calculo = 0;

            for ($i = 0; $i < strlen($cnpj); $i++) {

                $calculo = $calculo + ($cnpj[$i] * $posicao);
                $posicao--;

                if ($posicao < 2) {
                    $posicao = 9;
                }
            }
            return $calculo;
        }

        $primeiro_calculo = multiplica_cnpj($primeiros_numeros_cnpj);
        $primeiro_digito  = ($primeiro_calculo % 11) < 2 ? 0 : 11 - ($primeiro_calculo % 11);

        $primeiros_numeros_cnpj .= $primeiro_digito;

        $segundo_calculo = multiplica_cnpj($primeiros_numeros_cnpj, 6);
        $segundo_digito  = ($segundo_calculo % 11) < 2 ? 0 : 11 - ($segundo_calculo % 11);

        $cnpj = $primeiros_numeros_cnpj . $segundo_digito;

        if ($cnpj !== $cnpj_original) {
            die('CNPJ inválido');
        }

        return (int) $cnpj;

    }

    /**
     * Método cnpj
     * Método público que ao ser instanciado, recebe o CNPJ, retornando o mesmo
     * se for válido ou caso contrário uma mensagem de erro.
     * @param string $cNPJ
     * Parâmetro para recebimento de CNPJ que será tratado no método checkCNPJ.
     * @return int
     */
    public function cnpj(string $cnpj)
    {
        return self::checkCNPJ($cnpj);
    }

}

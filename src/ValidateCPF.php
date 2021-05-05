<?php

namespace Emso\ValidaDocumentoX;

/**
 * Classe ValidateCPF
 * Classe final para validação de CPF
 * @author Estênio Mariano <dev.emso.exe@gmail.com>
 * @version 1.0.0
 */

final class ValidateCPF
{

    /**
     * Método checkCPF
     * Método privado, estático para tratamento de CPF, removendo caracteres não numéricos, verificando
     * a quantidade, se é uma sequência de números idênticos e validando se o CPF é válido.
     * @param string $cpf
     * Parâmetro para recebimento de CPF.
     * @return int $cpf
     */
    private static function checkCPF(string $cpf): int
    {
        $cpf = preg_replace('/[^0-9]/im', '', $cpf);

        if (strlen($cpf) != 11) {
            die('CPF deve conter 11 números.');
        }

        if (preg_match('/([0-9])\1{10}/', $cpf)) {
            die('CPF com sequência de números idênticos.');
        }

        $qtde_loop = [9, 10];

        foreach ($qtde_loop as $n) {

            $soma                    = 0;
            $numero_para_multiplicar = $n + 1;

            for ($i = 0; $i < $n; $i++) {
                $soma += $cpf[$i] * ($numero_para_multiplicar--);
            }

            $resultado = (($soma * 10) % 11);

            if ($cpf[$n] != $resultado) {
                die('CPF inválido');
            }
        }

        return (int) $cpf;
    }

    /**
     * Método cpf
     * Método público que ao ser instanciado, recebe o CPF, retornando o mesmo
     * se for válido ou caso contrário uma mensagem de erro.
     * @param string $cpf
     * Parâmetro para recebimento de CPF que será tratado no método checkCPF.
     * @return int
     */
    public function cpf(string $cpf)
    {
        return self::checkCPF($cpf);
    }

}

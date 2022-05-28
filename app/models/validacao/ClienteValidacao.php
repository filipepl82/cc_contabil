<?php
namespace app\models\validacao;

use app\core\Validacao;

class ClienteValidacao {
    public static function salvar($cliente) {
        $validacao = new Validacao();

        $validacao->setData("cliente", $cliente->cliente);

        $validacao->getData("cliente")->isVazio();

        return $validacao;
    }
}
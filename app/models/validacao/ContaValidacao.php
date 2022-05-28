<?php
namespace app\models\validacao;

use app\core\Validacao;

class ContaValidacao {
    public static function salvar($conta) {
        $validacao = new Validacao();

        $validacao->setData("codigo", $conta->codigo);
        $validacao->setData("conta", $conta->conta);
        $validacao->setData("id_plano_conta", $conta->id_plano_conta);

        $validacao->getData("codigo")->isVazio();
        $validacao->getData("conta")->isVazio();
        $validacao->getData("id_plano_conta")->isVazio();

        return $validacao;
    }
}
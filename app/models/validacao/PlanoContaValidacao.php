<?php
namespace app\models\validacao;

use app\core\Validacao;

class PlanoContaValidacao {
    public static function salvar($plano_conta) {
        $validacao = new Validacao();

        $validacao->setData("titulo", $plano_conta->titulo);
        $validacao->setData("id_empresa", $plano_conta->id_empresa);

        $validacao->getData("titulo")->isVazio();
        $validacao->getData("id_empresa")->isVazio();

        return $validacao;
    }
}
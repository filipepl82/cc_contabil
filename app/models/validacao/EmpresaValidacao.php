<?php
namespace app\models\validacao;

use app\core\Validacao;

class EmpresaValidacao {
    public static function salvar($empresa) {
        $validacao = new Validacao();

        $validacao->setData("empresa", $empresa->empresa);

        $validacao->getData("empresa")->isVazio();

        return $validacao;
    }
}
<?php
namespace app\models\service;

use app\models\dao\PlanoContaDao;
use app\models\validacao\PlanoContaValidacao;

class PlanoContaService {

    public static function lista() {
        $dao = new PlanoContaDao();
        return $dao->lista();
    }

    public static function salvar($plano_conta, $campo, $tabela) {
        $validacao = PlanoContaValidacao::salvar($plano_conta);
        return Service::salvar($plano_conta, $campo, $validacao->listaErros(), $tabela);
    }
}
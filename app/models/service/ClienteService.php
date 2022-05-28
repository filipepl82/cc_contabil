<?php
namespace app\models\service;

use app\models\dao\ClienteDao;
use app\models\validacao\ClienteValidacao;

class ClienteService {

    public static function lista() {
        $dao = new ClienteDao();
        return $dao->lista();
    }

    public static function salvar($cliente, $campo, $tabela) {
        $validacao = ClienteValidacao::salvar($cliente);
        return Service::salvar($cliente, $campo, $validacao->listaErros(), $tabela);
    }

    public static function getCliente($id_cliente) {
        $dao = new ClienteDao();
        return $dao->getCliente($id_cliente);
    }
}
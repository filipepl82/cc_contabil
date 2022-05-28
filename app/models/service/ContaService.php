<?php
namespace app\models\service;

use app\models\dao\ContaDao;
use app\models\validacao\ContaValidacao;

class ContaService {

    public static function lista($id_plano_conta, $tipo = null) {
        $dao = new ContaDao();
        return $dao->lista($id_plano_conta, $tipo);
    }

    public static function salvar($conta, $campo, $tabela) {
        $validacao = ContaValidacao::salvar($conta);
        return Service::salvar($conta, $campo, $validacao->listaErros(), $tabela);
    }

    public static function proximoCodigo($id_plano_conta, $contapai) {
        $dao = new ContaDao();
        $pai = $dao->proximoCodigo($id_plano_conta, $contapai);
        
        if($pai) {
            $array = explode(".", $pai->codigo);
            $ultimo = end($array);
            $proximo = $ultimo + 1;
            $zeros = (count($array) >= 4) ? count($array) - 1 : 0;
        } else {
            $array = explode(".", $contapai);
            $proximo = 1;
            $zeros = (count($array) >= 3) ? count($array) : 0;
        }
        $cod = array(
            "proximo" => $contapai . "." . str_pad($proximo, $zeros, '0', STR_PAD_LEFT),
            "id_pai" => Service::get("conta", "codigo", $contapai)->id_conta
        );
        return $cod;
    }

    public static function proximoPai($id_plano_conta) {
        $dao = new ContaDao();
        $ultimo = $dao->proximoPai($id_plano_conta);
        if(!$ultimo) {
            $proximo = 1;
        } else {
            $proximo = $ultimo->codigo + 1;
        }
        return $proximo;
    }
}
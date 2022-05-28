<?php
namespace app\models\dao;

use app\core\Model;

class ContaDao extends Model {

    public function lista($id_plano_conta, $tipo) {
        if($tipo) {
            $sql = "SELECT * FROM conta WHERE id_plano_conta = $id_plano_conta 
            AND tipo = '$tipo' ORDER BY codigo";
        } else {
            $sql = "SELECT * FROM conta WHERE id_plano_conta = $id_plano_conta 
            ORDER BY codigo";
        }
        return $this->select($this->db, $sql);
    }

    public function proximoCodigo($id_plano_conta, $pai) {
        $sql = "SELECT * FROM conta WHERE id_pai = 
        (SELECT id_conta FROM `conta` WHERE codigo = '$pai' AND id_plano_conta = $id_plano_conta) 
        ORDER BY codigo DESC LIMIT 1";
     
        return $this->select($this->db, $sql, false);
    }

    public function proximoPai($id_plano_conta) {
        $sql = "SELECT * FROM conta WHERE (id_pai IS NULL OR id_pai = '0') 
        AND id_plano_conta = $id_plano_conta 
        ORDER BY codigo DESC LIMIT 1";

        return $this->select($this->db, $sql, false);
    }
}
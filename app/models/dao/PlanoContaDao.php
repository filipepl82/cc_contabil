<?php
namespace app\models\dao;

use app\core\Model;

class PlanoContaDao extends Model {
    public function lista() {
        $sql = "SELECT * FROM plano_conta p, empresa e WHERE p.id_empresa = e.id_empresa";
        return $this->select($this->db, $sql);
    }
}
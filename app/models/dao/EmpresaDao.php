<?php
namespace app\models\dao;

use app\core\Model;

class EmpresaDao extends Model {
    public function lista() {
        $sql = "SELECT * FROM empresa";
        return $this->select($this->db, $sql);
    }
}
<?php
namespace app\models\dao;

use app\core\Model;

class ClienteDao extends Model {
    public function lista() {
        $sql = "SELECT * FROM cliente";
        return $this->select($this->db, $sql);
    }

    public function getCliente($id_cliente) {
        $sql = "SELECT * FROM cliente WHERE id_cliente = $id_cliente AND id_conta IS NULL";
        return $this->select($this->db, $sql, false);
    }
}
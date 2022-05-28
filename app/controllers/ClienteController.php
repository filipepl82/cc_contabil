<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\models\service\ClienteService;
use app\core\Flash;
use app\models\service\ContaService;
use stdClass;

class ClienteController extends Controller {

    private $tabela = "cliente";
    private $campo = "id_cliente";

    public function index() {
        $dados["lista"] = Service::lista($this->tabela);
        $dados["view"] = "Cliente/Index";
        $this->load("template", $dados);
    }

    public function create() {
        $dados["clientes"] = ClienteService::lista();
        $dados["view"] = "Cliente/Create";
        $this->load("template", $dados);
    }

    public function edit($id) {
        $cliente = Service::get($this->tabela, $this->campo, $id);
        if(!$cliente) {
            $this->redirect(URL_BASE . "cliente");
        }
        $dados["clientes"] = ClienteService::lista();
        $dados["cliente"] = $cliente;
        $dados["view"] = "Cliente/Create";
        $this->load("template", $dados);
    }

    public function salvar() {
        $cliente = new stdClass();

        $cliente->id_cliente = ($_POST["id_cliente"]) ? $_POST["id_cliente"] : null;
        $cliente->cliente = $_POST["cliente"];

        Flash::setForm($cliente);
        if(ClienteService::salvar($cliente, $this->campo, $this->tabela)) {
            $this->redirect(URL_BASE . "cliente");
        } else {
            $this->redirect(URL_BASE . "cliente/create");
        }
    }

    public function excluir($id) {
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE . "cliente");
    }

    public function teste() {
        $dados["clientes"] = ClienteService::lista();
        $dados["view"] = "Cliente/Teste";
        $this->load("template", $dados);
    }

    public function venda() {
        $id_cliente = $_POST["id_cliente"];
        $cliente = ClienteService::getCliente($id_cliente);      
 
        if(!$cliente->id_conta) {
            $contaPai = Service::get("conta", "alias", "cliente");
            $conta = new \stdClass();

            $conta->id_conta = null;
            $conta->id_plano_conta = $contaPai->id_plano_conta;
            $conta->conta = $cliente->cliente;
            $conta->tipo = "A";
            $conta->natureza = "D";
            $conta->id_pai = $contaPai->id_conta;
            $codigo = ContaService::proximoCodigo($contaPai->id_plano_conta, $contaPai->codigo);
            
            $conta->codigo = $codigo["proximo"];
            $id = Service::inserir(objToArray($conta), "conta");
            if($id) {
                Service::editar(["id_conta" => $id, "id_cliente" => $cliente->id_cliente], "id_cliente", "cliente");
            }
        }
    }
}
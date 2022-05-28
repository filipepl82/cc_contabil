<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\models\service\ContaService;
use app\core\Flash;
use stdClass;

class ContaController extends Controller {

    private $tabela = "conta";
    private $campo = "id_conta";

    public function index($id_plano_conta) {
        $dados["lista"] = ContaService::lista($id_plano_conta, "S");
        $dados["plano_conta"] = Service::get("plano_conta", "id_plano_conta", $id_plano_conta);
        $dados["view"] = "Conta/Index";
        $this->load("template", $dados);
    }

    public function create($id_plano_conta) {
        $dados["contas"] = ContaService::lista($id_plano_conta, "S");
        $dados["id_plano_conta"] = $id_plano_conta;
        $dados["view"] = "Conta/Create";
        $this->load("template", $dados);
    }

    public function edit($id_plano_conta, $id) {
        $conta = Service::get($this->tabela, $this->campo, $id);
       
        if(!$conta) {
            $this->redirect(URL_BASE . "conta");
        }
        $dados["contas"] = ContaService::lista($conta->id_plano_conta, "S");
        $dados["id_plano_conta"] = $id_plano_conta;
        $dados["conta"] = $conta;
        $dados["view"] = "Conta/Create";
        $this->load("template", $dados);
    }

    public function salvar() {
        $conta = new stdClass();

        $conta->id_conta = ($_POST["id_conta"]) ? $_POST["id_conta"] : null;
        $conta->id_plano_conta = $_POST["id_plano_conta"];
        $conta->codigo = $_POST["codigo"];
        $conta->conta = $_POST["conta"];
        $conta->tipo = (strlen($conta->codigo) > 10) ? "A" : "S";
        $conta->alias = $_POST["alias"];
        $conta->natureza = $_POST["natureza"];
        $eh_pai = $_POST["eh_pai"];
        $conta->id_pai = $_POST["id_pai"];

        if($eh_pai == "S") {
            $conta->codigo = ContaService::proximoPai($conta->id_plano_conta);
            $conta->id_pai = null;
        }

        Flash::setForm($conta);
        if(ContaService::salvar($conta, $this->campo, $this->tabela)) {
            $this->redirect(URL_BASE . "conta/index/" . $conta->id_plano_conta);
        } else {
            $this->redirect(URL_BASE . "conta/create/" . $conta->id_plano_conta);
        }
    }

    public function excluir($id) {
        $conta = Service::get($this->tabela, $this->campo, $id);
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE . "conta/index/" . $conta->id_plano_conta);
    }

    public function proximoCodigo($id_plano_conta, $pai) {
        $codigo = ContaService::proximoCodigo($id_plano_conta, $pai);
        echo json_encode($codigo);
    }
}
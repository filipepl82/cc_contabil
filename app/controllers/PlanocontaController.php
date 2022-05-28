<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\models\service\PlanoContaService;
use app\core\Flash;
use app\models\service\EmpresaService;
use stdClass;

class PlanocontaController extends Controller {

    private $tabela = "plano_conta";
    private $campo = "id_plano_conta";

    public function index() {
        $dados["lista"] = PlanoContaService::lista();
        $dados["view"] = "PlanoConta/Index";
        $this->load("template", $dados);
    }

    public function create() {
        $dados["plano_contas"] = PlanoContaService::lista();
        $dados["empresas"] = EmpresaService::lista();
        $dados["view"] = "PlanoConta/Create";
        $this->load("template", $dados);
    }

    public function edit($id) {
        $plano_conta = Service::get($this->tabela, $this->campo, $id);
        if(!$plano_conta) {
            $this->redirect(URL_BASE . "planoconta");
        }
        $dados["empresas"] = EmpresaService::lista();
        $dados["plano_contas"] = PlanoContaService::lista();
        $dados["plano_conta"] = $plano_conta;
        $dados["view"] = "PlanoConta/Create";
        $this->load("template", $dados);
    }

    public function salvar() {
        $plano_conta = new stdClass();

        $plano_conta->id_plano_conta = ($_POST["id_plano_conta"]) ? $_POST["id_plano_conta"] : null;
        $plano_conta->id_empresa = $_POST["id_empresa"];
        $plano_conta->titulo = $_POST["titulo"];

        Flash::setForm($plano_conta);
        if(PlanoContaService::salvar($plano_conta, $this->campo, $this->tabela)) {
            $this->redirect(URL_BASE . "planoconta");
        } else {
            $this->redirect(URL_BASE . "planoconta/create");
        }
    }

    public function excluir($id) {
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE . "planoconta");
    }
}
<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\models\service\EmpresaService;
use app\core\Flash;
use stdClass;

class EmpresaController extends Controller {

    private $tabela = "empresa";
    private $campo = "id_empresa";

    public function index() {
        $dados["lista"] = Service::lista($this->tabela);
        $dados["view"] = "Empresa/Index";
        $this->load("template", $dados);
    }

    public function create() {
        $dados["empresas"] = EmpresaService::lista();
        $dados["view"] = "Empresa/Create";
        $this->load("template", $dados);
    }

    public function edit($id) {
        $empresa = Service::get($this->tabela, $this->campo, $id);
        if(!$empresa) {
            $this->redirect(URL_BASE . "empresa");
        }
        $dados["empresas"] = EmpresaService::lista();
        $dados["empresa"] = $empresa;
        $dados["view"] = "Empresa/Create";
        $this->load("template", $dados);
    }

    public function salvar() {
        $empresa = new stdClass();

        $empresa->id_empresa = ($_POST["id_empresa"]) ? $_POST["id_empresa"] : null;
        $empresa->empresa = $_POST["empresa"];

        Flash::setForm($empresa);
        if(EmpresaService::salvar($empresa, $this->campo, $this->tabela)) {
            $this->redirect(URL_BASE . "empresa");
        } else {
            $this->redirect(URL_BASE . "empresa/create");
        }
    }

    public function excluir($id) {
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE . "empresa");
    }
}
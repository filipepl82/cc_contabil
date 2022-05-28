<div class="caixa pb-3">
    <div class="caixa">
        <div class="p-2 bg-title text-light text-uppercase h5 mb-0 text-branco d-flex justify-content-space-between">
            <span><i class="fas fa-plus-circle" aria-hidden="true"></i> Cadastrar Cliente</span>
            <a href="<?php echo URL_BASE . "cliente" ?>" class="btn btn-verde btn-pequeno"><i class="fas fa-arrow-left" aria-hidden="true"></i>  Voltar</a>
        </div>
    </div> 
    <div class="p-1">
        <?php
            $this->verErro();
            $this->verMsg();
        ?>              
        <form action="<?php echo URL_BASE ."cliente/salvar"?>" method="post">
            <span class="d-block mt-4 mb-4 h5 border-bottom text-uppercase px-4">Informações básicas</span>	
            <div class="p-2 px-4">
                <div class="rows">										
                    <div class="col-12 mb-3">
                        <label class="text-label">Cliente</label>	
                        <input type="text" name="cliente" id="cliente" value="<?php echo isset($cliente->cliente) ? $cliente->cliente : null ?>" class="form-campo" placeholder="Digite o nome da plano">
                    </div>		
                </div>
                <div class="col-12 text-center pb-4">
                    <input type="hidden" name="id_cliente" value="<?php echo isset($cliente->id_cliente) ? $cliente->id_cliente : null ?>">
                    <input type="submit" value="Salvar" class="btn btn-azul m-auto">
                </div>
            </div>
        </form>
    </div>
</div>
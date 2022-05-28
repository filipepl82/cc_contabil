<div class="caixa pb-3">
    <div class="caixa">
        <div class="p-2 bg-title text-light text-uppercase h5 mb-0 text-branco d-flex justify-content-space-between">
            <span><i class="fas fa-plus-circle" aria-hidden="true"></i> Venda</span>
            <a href="<?php echo URL_BASE . "cliente" ?>" class="btn btn-verde btn-pequeno"><i class="fas fa-arrow-left" aria-hidden="true"></i>  Voltar</a>
        </div>
    </div> 
    <div class="p-1">
        <?php
            $this->verErro();
            $this->verMsg();
        ?>              
        <form action="<?php echo URL_BASE ."cliente/venda"?>" method="post">
            <span class="d-block mt-4 mb-4 h5 border-bottom text-uppercase px-4">Informações básicas</span>	
            <div class="p-2 px-4">
                <div class="rows">
                    <div class="col-6">
                            <label class="text-label">Cliente</label>
                            <select class="form-campo" name="id_cliente" id="id_cliente">
                                <?php
                                    foreach($clientes as $c) {
                                        echo "<option value='$c->id_cliente'>$c->cliente</option>";
                                    }
                                ?>                                                     
                            </select>
                        </div>												
                    </div>
                    <div class="col-12 text-center pb-4">
                        <input type="submit" value="Vender" class="btn btn-azul m-auto">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
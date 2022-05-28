<div class="caixa pb-3">
    <div class="caixa">
        <div class="p-2 bg-title text-light text-uppercase h5 mb-0 text-branco d-flex justify-content-space-between">
            <span><i class="fas fa-plus-circle" aria-hidden="true"></i> Cadastrar plano</span>
            <a href="<?php echo URL_BASE . "conta" ?>" class="btn btn-verde btn-pequeno"><i class="fas fa-arrow-left" aria-hidden="true"></i>  Voltar</a>
        </div>
    </div> 
    <div class="p-1">
        <?php
            $this->verErro();
            $this->verMsg();
        ?>              
        <form action="<?php echo URL_BASE ."conta/salvar"?>" method="post">
            <span class="d-block mt-4 mb-4 h5 border-bottom text-uppercase px-4">Informações básicas</span>	
            <div class="p-2 px-4">
                <div class="rows">										
                    <div class="col-9">
                        <label class="text-label">Grupo/Subgrupo</label>
                        <select class="form-campo" name="id_c" id="id_conta" onchange="proximoCodigo()">
                            <option value="">CONTA PAI</option>
                            <?php
                                foreach($contas as $c) {
                                    echo "<option value='$c->codigo'>$c->codigo - $c->conta</option>";
                                }
                            ?>                                                     
                        </select>
                    </div> 
                    <div class="col-3 mb-3">
                        <label class="text-label">Conta</label>	
                        <input type="text" name="codigo" id="codigo" value="<?php echo $conta->codigo ?>" readonly="readonly" class="form-campo" placeholder="Digite o nome da plano">
                    </div>		
                    <div class="col-6 mb-3 ">
                        <label class="text-label">Descrição</label>	
                        <input type="text" name="conta" value="<?php echo $conta->conta ?>" class="form-campo" placeholder="Digite o nome da plano">
                    </div>
                    <div class="col-2 mb-3">
                        <label class="text-label">Aliás</label>	
                        <input type="text" name="alias" value="<?php echo $conta->alias ?>" class="form-campo" placeholder="Digite o nome da plano">
                    </div>
                    <?php 
                        $natureza = isset($conta->natureza) ? $conta->natureza : null;

                    ?>
                    <div class="col-2 mb-3">
                        <label class="text-label">Natureza</label>	
                        <select class="form-campo" name="natureza">
                            <option value="D" <?php echo ($natureza=='D') ? 'selected' : '' ?>> Devedora</option>
                            <option value="C" <?php echo ($natureza=='C') ? 'selected' : '' ?>> Credora</option>
                        </select>
                    </div>
                    <div class="col-2 mb-3">
                        <label class="text-label">Conta Pai</label>	
                        <select class="form-campo" name="eh_pai">
                            <option value="S"> SIM</option>
                            <option value="N"> NÃO</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 text-center pb-4">
                    <input type="hidden" name="id_conta" id="id_conta" value="<?php echo isset($conta->id_conta) ? $conta->id_conta : null ?>">
                    <input type="hidden" name="id_plano_conta" id="id_plano_conta" value="<?php echo $id_plano_conta ?>">
                    <input type="hidden" name="id_pai" id="id_pai" value="<?php echo isset($conta->id_pai) ? $conta->id_pai : null ?>">
                    <input type="submit" value="Salvar" class="btn btn-azul m-auto">
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function proximoCodigo() {
        var id_conta = $("#id_conta").val();
        var id_plano_conta = <?php echo $id_plano_conta ?>;
        $.ajax({
            url: base_url + "conta/proximoCodigo/" + id_plano_conta +"/"+ id_conta,
            type: "get",
            dataType: "Json",
            success: function(data) {
                $("#codigo").val(data.proximo);
                $("#id_pai").val(data.id_pai);
            }
        });
    }
</script>
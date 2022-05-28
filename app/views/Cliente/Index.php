<div class="caixa pb-3">
    <div class="rows">	
        <div class="col-12">
            <div class="p-2 py-1 bg-title text-light text-uppercase h5 mb-0 text-escuro d-flex justify-content-space-between">
				<span class="d-flex center-middle"><i class="far fa-list-alt mr-1"></i> Lista de Cliente </span>
				<div>
					<a href="<?php echo URL_BASE . "cliente/create" ?>" class="btn btn-verde mx-1 d-inline-block btn-medio"><i class="fas fa-plus-circle"></i> Adicionar novo</a>
				</div>
            </div>
            <?php
                $this->verMsg();
            ?>
            <form name="busca" action="" method="get">
                    <div class="px-2 pt-2">	
						<div class="mostraFiltro bg-padrao mt-2 p-2 radius-4">
							<div class="rows">
                                <div class="col-8">	
                                    <label class="text-label d-block text-escuro">Nome </label>
                                    <input type="text" name="" value="" class="form-campo">
                                </div>
                                <div class="col-2">	
                                    <label class="text-label d-block text-escuro">Ativo </label>
                                    <select name="ativo" class="form-campo">
                                        <option value="S">Sim</option>                                                 
                                        <option value="N">Não</option>                                                 
                                    </select>
                                </div>
                                <div class="col-2 mt-1 pt-1">
                                    <input type="submit" value="Pesquisar" class="btn btn-azul text-uppercase">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12">
			    <div class="px-2">		
                    <div class="tabela-responsiva pb-4 mt-3">
                        <table cellpadding="0" cellspacing="0"  width="100%" id="dataTable">
                            <thead>
                                <tr>
                                    <th align="center">Id</th>
                                    <th align="center">Cliente</th>
                                    <th align="center">Editar</th>
                                    <th align="center">Excluir</th>
                                </tr>
                            </thead>
                            <tbody>  
                                <?php foreach($lista as $cliente) { ?>                                        
                                    <tr>
                                        <td align="center"><?php echo $cliente->id_cliente ?></td>
                                        <td align="center"><?php echo $cliente->cliente ?></td>												
                                        <td align="center"><a href="<?php echo URL_BASE . "cliente/edit/" . $cliente->id_cliente ?>" class="d-inline-block btn btn-outline-roxo btn-pequeno"><i class="fas fa-edit"></i> Editar</a>                              </td>									
                                        <td align="center"><a href="javascript:;" onclick="return excluir(this)" data-entidade ="cliente" data-id="<?php echo $cliente->id_cliente ?>" class="d-inline-block btn btn-outline-vermelho btn-pequeno"><i class="fas fa-trash-alt"></i> Excluir</a>                                </td>
                                    </tr>
                                <?php } ?>                                                     						
                            </tbody>
                        </table>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
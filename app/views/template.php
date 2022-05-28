<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Sistema de Contabilidade</title>
		<link rel="shortcut icon" href="" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale =1">		
		<!--css-->		
		<link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/js/datatables/css/jquery.dataTables.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/js/datatables/css/responsive.dataTables.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/js/datatables/css/style_dataTable.css">
		<link rel="stylesheet" href="<?php echo URL_BASE ?>assets/css/auxiliar.css">
		<link rel="stylesheet" href="<?php echo URL_BASE ?>assets/css/grade.css">
		<link rel="stylesheet" href="<?php echo URL_BASE ?>assets/css/style.css">
		<script >
			var base_url ="<?php echo URL_BASE ?>";
		</script>
		<script src="<?php echo URL_BASE ?>assets/js/jquery.min.js"></script>	
	</head>	
<body>
    <?php include "cabecalho.php" ?>
	<div class="rows mx-0 mt-2">	
		<div class="col-2 position-relative">
            <?php include "menu.php" ?>
        </div>		
        <div class="col-10 mb-3">
			<?php $this->load($view, $viewData); ?>
	    </div>		
    </div>	
		<!--font icones-->
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="https://kit.fontawesome.com/9480317a2f.js"></script>
		<script src="<?php echo URL_BASE ?>assets/js/datatables/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo URL_BASE ?>assets/js/datatables/js/dataTables.responsive.min.js"></script>			
		<script src="<?php echo URL_BASE ?>assets/js/componentes/js_data_table.js"></script>
		<script src="<?php echo URL_BASE ?>assets/js/componentes/js_modal.js"></script>	
		<script src="<?php echo URL_BASE ?>assets/js/js.js"></script>	
	<div id="fundo"></div>
</body>
</html>
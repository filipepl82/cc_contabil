$(function () {
	/*** modal **/
	$("a[rel=modal]").click( function(ev){
        ev.preventDefault();
 
        var id = $(this).attr("href");                 
         tela(id);	
		
    });
 
    $("#fundo").click( function(){
        $(this).hide();
        $(".window").hide();
    });
 
    $('.fechar').click(function(ev){
        ev.preventDefault();
        $("#fundo").hide();
        $(".window").hide();
    });
	
	/*** fim modal 	**/ 

});	

function abrirModal(id){
    var alturaTela = $(document).height();
    var larguraTela = $(window).width();

    //colocando o fundo preto
    $('#fundo').css({'width':larguraTela,'height':alturaTela});
    $('#fundo').fadeIn(1000);	
    $('#fundo').fadeTo("slow",0.8);

    var left = ($(window).width() /2) - ( $(id).width() / 2 );
    var top = ($(window).height() / 2) - ( $(id).height() / 2 );

    $(id).css({'top':top,'left':left});
    $(id).show();
	$(window).scrollTop(0) ;
}

function fecharModal(){
	//inicio();	
	$("#fundo").hide();
    $(".window").hide();
}
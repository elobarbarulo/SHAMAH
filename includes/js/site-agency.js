/*!
 * Start Bootstrap - Agency Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
  
    
    
    //MASCARA DE LOGIN
    $('.cpf').mask('999.999.999-99');
    $('.cpf').keyup(function(){
        login($('.cpf').val())
    });
    
    
    
});

// Highlight the top nav as scrolling occurs
$('body').scrollspy({
    target: '.navbar-fixed-top'
})

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});


function TestaCPF(strCPF) { 
    var Soma; 
    var Resto; 
    Soma = 0; 
    if (
            strCPF == "00000000000" ||
            strCPF == "11111111111" ||
            strCPF == "22222222222" ||
            strCPF == "33333333333" ||
            strCPF == "44444444444" ||
            strCPF == "55555555555" ||
            strCPF == "66666666666" ||
            strCPF == "77777777777" ||
            strCPF == "88888888888" ||
            strCPF == "99999999999" 
       ) 
        return false; 
    for (i=1; i<=9; i++) 
    Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i); 
    Resto = (Soma * 10) % 11; 
    if ((Resto == 10) || (Resto == 11)) 
    Resto = 0; 
    if (Resto != parseInt(strCPF.substring(9, 10)) ) 
    return false; Soma = 0; 
    for (i = 1; i <= 10; i++) 
    Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i); 
    Resto = (Soma * 10) % 11; 
    if ((Resto == 10) || (Resto == 11)) Resto = 0; 
    if (Resto != parseInt(strCPF.substring(10, 11) ) ) 
        return false; 
    return true; 
} 
    
/**
 * TIRA TODOS OS CARACTERES E DEIXA APENAS NUMEROS
 * @param {type} string
 * @returns {unresolved}
 */
function apenasNumeros(string) 
{
    var numsStr = string.replace(/[^0-9]/g,'');
    return parseInt(numsStr);
}

function login(cpf){
            
            var link_padrao = $('#link_padrao').val();
            var caminho =  link_padrao+'login';
            
            var cpf = $('.cpf').val();
            cpf = cpf.replace('_','');
            cpf = cpf.replace('/','');
	    cpf = cpf.replace('.','');
	    cpf = cpf.replace('.','');
	    cpf = cpf.replace('-','');
            if(cpf.length == '11'){
                var valida = TestaCPF(cpf);
                
                if(valida){                    
                    $.ajax({
                        url: caminho,
                        type: 'POST',
                        data: {cpf:cpf},
                         success:function(data){
                            ret = obj = JSON && JSON.parse(data) || $.parseJSON(data);
                            //alert(ret.status);
                             if(ret.status == '0'){
                                alert(ret.mensagem);
                            }else{
                                //alert('redireciona');
                                window.location.href = link_padrao+"usuarios";
                            }
                             
                           
                        },
                        error: function(){
                            alert("Falha na requisição");
                        }
                    });
                    
                }else{
                    alert('O cpf digitado não é valido!');
                }
           }
}

 
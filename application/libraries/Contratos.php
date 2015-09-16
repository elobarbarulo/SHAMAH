<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Contratos {
    public function __construct(){
    
        
    }
 
    public function contrato_prestacao_servicos_cnh_isencoes(){
        $mensagem = '';
        $mensagem.='<div id="impressao">'
                . '<h2>CONTRATO DE PRESTAÇÃO DE SERVIÇOS</h2>'
                .'</div>';
                
        
        return $mensagem;
    }
}
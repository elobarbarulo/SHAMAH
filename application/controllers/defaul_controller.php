<?php

$this->load->model('usuarios_model');
$this->load->model('estado_model');
$this->load->model('cidade_model');
$this->load->model('servicos_model');

//POROTEÇÂO DA PAGINA SE NAO TIVER SESSAO REDIRECIONA PRO LOGIN

//$session = $this->session->all_userdata();
//if(isset($session['usuario']) == ""){
//    redirect('login/tela');
//}    
<?php 
    	
$controler 	= $this->uri->segment(1);

$dados['status'] = array();
$dados['status'][0] = "Inativo";
$dados['status'][1] = "Ativo";

$dados['tipo_usurio'] = array();
$dados['tipo_usurio'][1] = "Master";
$dados['tipo_usurio'][2] = "Usuario";
$dados['tipo_usurio'][3] = "Concessionaria";

$consulta = $this->usuarios_model->get();
$dados['registros'] = $consulta;
//PREENCHER FORM NO HTML
if($this->uri->segment(3) == ''){
	$dados['form']['nome'] 		= '';
	$dados['form']['email'] 	= '';
	$dados['form']['senha'] 	= '';
	$dados['form']['status'] 	= '1';
	$dados['form']['cpf']           = '';
	$dados['form']['tipo_usurio'] 	= '';
	$dados['bt'] 			= 'Adicionar';
}else{
	$dad_form = $this->usuarios_model->get($id = $this->uri->segment(3), $nome = '' , $email = '' , $senha = '', $status = '');
	
	$dados['form']['nome']          = $dad_form->nome;
	$dados['form']['email']         = $dad_form->email;
	$dados['form']['senha']         = '';
	$dados['form']['status']        = $dad_form->status;
        $dados['form']['cpf']           = $dad_form->cpf;
	$dados['form']['tipo_usurio'] 	= $dad_form->tipo_usurio;
	$dados['bt']                    = 'Alterar';
}

//VALIDA OS CAMPOS
$this->form_validation->set_rules('nome'	, 'Nome'	, 'required');
$this->form_validation->set_rules('email'	, 'E-mail'	, 'valid_email|required');
//$this->form_validation->set_rules('senha'	, 'Senha'	, 'required');
$this->form_validation->set_rules('status'	, 'Status'	, 'required');
$this->form_validation->set_rules('cpf'         , 'CPF'         , 'required');
$this->form_validation->set_rules('tipo_usurio'	, 'Tipo Usuario', 'required');

$this->form_validation->set_message('required', '%s, Por favor o campo não pode ser vazio');
$this->form_validation->set_message('valid_email', '%s, esta com erro!');


//RECEBE OS CAMPOS
$post = $this->input->post();
$dados['mensagem_form'] = 0;
$dados['mensagem_erro'] = '';
if($post){
        
        
        //debug($post['cpf'],true);
        //if(valida_cpf($post['cpf']) == 'false'){
        //    $dados['mensagem_form'] = 1;
        //    $dados['mensagem_erro'] = 'O CPF Não é valido, não pode prosegir';      
        //}
       
            if ($this->form_validation->run() == FALSE){
		$dados['mensagem_form'] = 1;                
                
            }else{
                //$salvar['razao_social'] 	= strtoupper($post['razao_social']);
                if($this->uri->segment(3) == "" ){

                   $post['senha'] = md5($post['senha']);
                   $post['cpf'] = str2int($post['cpf']);
                   //debug($post,true);
                   $this->usuarios_model->inserir($post);
                }else{
                    $post['senha'] = md5($post['senha']);
                    $post['cpf'] = str2int($post['cpf']);
                    //debug($post,true);
                    $alterar = $this->usuarios_model->atualizar($post,array('id' => $this->uri->segment(3)));
                }
                redirect('usuarios');
            }		

        
        
    
	
}		
?>
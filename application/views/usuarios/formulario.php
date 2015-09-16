<!-- Padrão -->
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
  			<div class="panel-heading"><h4>Usuarios</h4></div>
			<div class="panel-body">
  				<!-- Daqui pra baixo pode mudar -->

				<?php 
		          if($dados['mensagem_form'] > 0){
		            echo reprovado(validation_errors() . '<br>' .$dados['mensagem_erro']); 
                            
		          } //$this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$this->uri->segment(4)
		            echo form_open();
		  			echo SubTitulo('Cadastro de Usuario');
  					echo monta_input($tamanho = 6 ,$label = 'Nome',$tipo_campo = 'txt',$nome = 'nome',$value = $dados['form']['nome'],$maxlength = "50" , $classes = "nome");
  					echo monta_input($tamanho = 6 ,$label = 'Email',$tipo_campo = 'txt',$nome = 'email',$value = $dados['form']['email'],$maxlength = "150" , $classes = "email");
  					echo SubTitulo('');
  					echo monta_input($tamanho = 6 ,$label = 'CPF',$tipo_campo = 'txt',$nome = 'cpf',$value = formatarCPF_CNPJ($dados['form']['cpf']),$maxlength = "14" , $classes = "cnpj_cpf");
  					echo monta_input($tamanho = 6 ,$label = 'Senha',$tipo_campo = 'txt',$nome = 'senha',$value = $dados['form']['senha'],$maxlength = "50" , $classes = "senha");
                                        echo SubTitulo('');
                                        echo monta_select($tamanho = '6',$label = 'Status' ,$nome ='status',$dados['status'],$dados['form']['status']);
                                        echo monta_select($tamanho = '6',$label = 'Tipo Usuario' ,$nome ='tipo_usurio',$dados['tipo_usurio'],$dados['form']['tipo_usurio']);
		            echo bt_form('11','1',$dados['bt']);
		            echo form_close();

  				?> 

  		<div class="row"><div class="col-md-12"><hr></div></div>
  		<table class="table table-hover registros">
			<thead>	
				<tr>
					<th>Nome</th>
					<th>Email</th>
					<th>Status</th>
					<th>ação</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($dados['registros'] as $key => $value) {
				echo '
				<tr>
					<td>'.$value['nome'].'</td>
					<td>'.$value['email'].'</td>
					<td>'.$value['status'].'</td>
					<td> 
						'.anchor('usuarios/formulario/'.$value['id'],'<i class="fa fa-pencil"></i>').' | 
						'.anchor('usuarios/excluir/'.$value['id'],'<i class="fa fa-user-times"></i>').' 
					</td>
				</tr>
				';
				} ?>
			</tbody>
		</table>		

 				<!-- Daqui pra cima pode mudar -->
  			</div>
 		</div>
	</div>
</div>	



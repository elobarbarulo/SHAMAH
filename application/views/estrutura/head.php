<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $dados['titulo']; ?></title>
      
    <!-- Bootstrap -->
    <link href="<?php echo site_url(); ?>includes/css/bootstrap.css" rel="stylesheet">
    <!-- Icones -->
    <link href="<?php echo site_url(); ?>includes/css/font-awesome.css" rel="stylesheet">
    <!-- Personalização do cliente -->
    <link href="<?php echo site_url(); ?>includes/css/sistema.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>includes/css/impresao.css" media="print" />


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
 <input type="hidden" id="link_padrao" value="<?php echo base_url(); ?>">
 <nav class="navbar navbar-default">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" id="menu_top">
    <!--   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button> -->

      <a class="navbar-brand" href="<?php echo site_url();?>">
        <img src="<?php echo site_url();?>/includes/img/logo1.png" id="logo">
      </a>
    </div>


    <?php 
    $session = $this->session->all_userdata();
    
    
        if( $this->uri->segment(1) == "login" && $this->uri->segment(2) == "tela"){

            echo'  
            <form class="navbar-form navbar-right" role="search" method="post" action="'.site_url().$this->uri->segment(1).'/'.$this->uri->segment(2).'/">
               <div class="form-group">'.
               monta_input('6','Email','txt','email',$dados['form']['email']).
               monta_input('6','Senha','password','senha',$dados['form']['senha']).'
               </div>
               <button type="submit" class="btn btn-default">Entrar</button> 
            </form>
        ';
                  
            if ($dados['mensagem_form'] > 0) {
                //echo reprovado(validation_errors().$dados['mensagem_retorno']);
            }
        }else{
    ?>
    
       
       
    

      <ul class="nav navbar-nav navbar-right menu_topo">
   
      

         <li><?php echo anchor('usuarios/', '<i class="fa  fa-user"></i> Usuarios'); ?></li> 
         <li><?php echo anchor('servicos/', '<i class="fa fa-cogs"></i> Serviços'); ?></li> 
         <li><?php echo anchor('#', '<i class="fa fa-university"></i> Clientes'); ?></li> 
         <li><?php echo anchor('#', '<i class="fa fa-cog fa-spin"></i> Processos'); ?></li> 
         <li><?php echo anchor('#', '<i class="fa fa-bars"></i> Tarefas'); ?></li> 
         <li><?php echo anchor('#', '<i class="fa fa-file-text"></i> Cartão de ponto'); ?></li> 
         <li><?php echo anchor('#', '<i class="fa fa-money"></i> Financeiro'); ?></li> 
       
        
        <li class="dropdown ">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa  fa-user"></i> <?php echo $session['usuario']['nome']; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><?php echo anchor('site/sair', 'Sair'); ?></li>
          </ul>
        </li>


      </ul>
    
        <?php 
        
        } //Fecha o if do login
        ?>
    
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid">
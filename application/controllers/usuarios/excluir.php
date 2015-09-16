<?php 
  if($this->uri->segment(4) == ""){
         echo '
             <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
             decisao = confirm("Deseja realmente apagar o usuarios?");
             if (decisao){
               location.href="'.site_url().$this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$this->uri->segment(3).'";
             } else {
                location.href="'.site_url().$this->uri->segment(1).'/formulario/";
             }
             </SCRIPT>;
         ';   
    }else{
    	
        $this->usuarios_model->excluir($this->uri->segment(3));
		redirect($this->uri->segment(1).'/formulario/');

    }
exit();
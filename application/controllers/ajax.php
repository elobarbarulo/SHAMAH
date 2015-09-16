<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
 
    public function __construct(){
        parent::__construct();
        include 'defaul_controller.php';
    }

    private function busca_campos_produtos($campo){
        $ret = "";
        $consulta = $this->produtos_model->get_auto_compelte($campos = $this->uri->segment(2),$id = '', $descricao = $campo);
        foreach ($consulta as $key => $value) {
           $v ='set_item("'.$this->uri->segment(2).'","'.$value[$this->uri->segment(2)].'")';
           $ret.="<li onclick='".$v."'>".$value[$this->uri->segment(2)]."</li>";
         }
        return $ret;
    }

    /**
     * 
     * @param type $texto
     * @return string
     */
    private function busca_produtos_ajax($texto = ''){
        $ret = "";
        $consulta = $this->produtos_model->get($campos = 'id,descricao,quantidade,valor,id_tipo_produto,id_marca,proc_tipo_maquina',$id = '', $descricao = $texto);

        if(count($consulta) == 0){
          $ret.= '<tr><td colspan="3">'.reprovado("Nunhume Produto encotrado!").'</td></tr>';
        }
        
        foreach ($consulta as $key => $value) {
            if($value['id_tipo_produto'] == 4){
                $link = anchor('produtos/form_processador/'.$value['id_tipo_produto'].'/'.$value['id_marca'].'/'.$value['proc_tipo_maquina'].'/'.$value['id'].'/2','<i class="fa fa-share"></i></i>');
            }
            if($value['id_tipo_produto'] == 1){
                 $link = anchor('produtos/ver/'.$value['id_tipo_produto'].'/'.$value['id_marca'].'/'.$value['id'],'<i class="fa fa-share"></i></i>');
            }            
           
           $texto = strtoupper ($texto);
           $novo_texto = str_replace($texto, '<span class="destaque_busca"> <b> '.$texto.'</b></span>', $value['descricao']);

           $ret.="<tr><td>".$novo_texto."</td><td>".$value['quantidade']."</td><td>".decimal2str($value['valor'])."</td><td>".$link."</td></tr>";            
           
        }
        return $ret;
    }
    /***************************************************************************
     * Busca todas a empresa e monta o padrão de retorno
     * @param type $texto
     * @return string
    ***************************************************************************/
    private function busca_empresas_ajax($texto = ''){
        $ret = "";
        $consulta = $this->empresas_model->get_ajax($texto);
        
        if(count($consulta) == 0){
          $ret.= '<tr><td colspan="4">'.reprovado("Nunhume Empresa encotrado!").'</td></tr>';
        }
        
        foreach ($consulta as $key => $value) {
           $link_editar = anchor('empresas/formulario/'.$value['id'],'<i class="fa fa-pencil"><b> Editar </b></i>');
           $link_contatos = anchor('empresas/contatos/'.$value['id'],' | <i class="fa fa-users"><b> Contatos </b></i> ');
           $texto = strtoupper ($texto);
           $ret.=""
                . "<tr>"
                   . "<td>".$value['razao_social']."</td>"
                   . "<td>".$value['nome_fantasia']."</td>"
                   . "<td>".$value['cnpj_cpf']."</td>"
                   . "<td>".$link_editar."|".$link_contatos."</td>"
                . "</tr>";            
        }
        return $ret;
    }

    /***************************************************************************
     * Busca todas a empresa e monta o padrão de retorno
     * @param type $texto
     * @return string
    ***************************************************************************/
    private function busca_compras_ajax($texto = ''){
        $ret = "";
        $consulta = $this->compras_model->get($id = '', $data = '' ,$limite = '', $busca = $texto);        
        if(count($consulta) == 0){
          $ret.= '<tr><td colspan="6">'.reprovado("Nunhuma compra encotrada!").'</td></tr>';
        }        
        foreach ($consulta as $key => $value) {
           $link_editar = anchor('compras/form/'.$value['id'],'<i class="fa fa-pencil"><b> Editar </b></i>');
           //$texto = strtoupper ($texto);
           $ret.=""
                . "<tr>"
                   . "<td>".$value['nome_fornecedor']."</td>"
                   . "<td>".$value['descricao']."</td>"
                   . "<td>".$value['valor']."</td>"
                   . "<td>".$value['quant']."</td>"
                   . "<td>".  data_br($value['data'])."</td>"                   
                   . "<td>".$link_editar."</td>"
                . "</tr>";            
        }
        return $ret;
    }

    


    private function busca_estado($uf = ''){
        $ret = "";
        $consulta = $this->estado_model->get('',$uf);
        foreach ($consulta as $key => $value) {
           $v ='set_item("estado","'.$value['uf'].'")';
           $ret.="<li onclick='".$v."'>".$value['uf']."</li>";
        }
        return $ret;
    }

    private function busca_cidade($nome = ''){
        $ret = "";
        $consulta = $this->cidade_model->get('',$nome);
        foreach ($consulta as $key => $value) {
           $v ='set_item("cidade","'.$value['nome'].'")';
           $ret.="<li onclick='".$v."'>".$value['nome']."</li>";
        }
        return $ret;
    }
    




	public function pn_gaveta(){
        $post = $this->input->post();
        echo $this->busca_campos_produtos($post['keyword']);
	}

    public function pn_model_fabricante(){
        $post = $this->input->post();
        echo $this->busca_campos_produtos($post['keyword']);
    }

    public function pn_fabricante(){
        $post = $this->input->post();
        echo $this->busca_campos_produtos($post['keyword']);
    }

    public function pn_model(){
        $post = $this->input->post();
        echo $this->busca_campos_produtos($post['keyword']);
    }

    public function pn_hp(){
        $post = $this->input->post();
        echo $this->busca_campos_produtos($post['keyword']);
    }

    public function gpn(){
        $post = $this->input->post();
        echo $this->busca_campos_produtos($post['keyword']);
    }
    
    public function pn_dell(){
        $post = $this->input->post();
        echo $this->busca_campos_produtos($post['keyword']);
    }

    public function busca_produtos(){
        $post = $this->input->post();
        echo $this->busca_produtos_ajax($post['keyword']);
    }
    public function busca_empresa(){
        $post = $this->input->post();
        echo $this->busca_empresas_ajax($post['keyword']);    
    }
    
    
    public function busca_compras(){
        $post = $this->input->post();
        echo $this->busca_compras_ajax($post['keyword']);    
    }
    public function estado(){
        $post = $this->input->post();
        echo $this->busca_estado($post['keyword']);
    }
    public function cidade(){
        $post = $this->input->post();
        echo $this->busca_cidade($post['keyword']);
    }

}


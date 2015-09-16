<?php 
class Usuarios_model extends CI_Model {
    private $tabela = 'usuarios';
    
    public function __construct(){
        $this->load->database();
    }

    /****************************************************************************************
     * 
     * @param type $campos
     * @return type
    ****************************************************************************************/
    public function inserir($campos){
        return $this->db->insert($this->tabela, $campos);
    }


    /******************************************************************************************
     * 
     * @param type $campos
     * @param type $condicao
     * @return type
    *****************************************************************************************/
    public function atualizar($campos,$condicao){
        return $this->db->update($this->tabela, $campos,$condicao);
    }

    /******************************************************************************************
     * 
     * @param type $id
     * @param type $nome
     * @param type $email
     * @param type $senha
     * @param type $status
     * @return type
    *****************************************************************************************/
    public function get($id = '', $nome = '' , $email = '' , $senha = '', $status = ''){
        
        $this->db->select('*');
        $this->db->from($this->tabela);       

        if($id){
            $this->db->where('id', $id);
        }
        
        if($nome){
            $this->db->where('nome', $nome);
        }

        if($email){
            $this->db->where('email', $email);
        }
        
        if($senha){
            $this->db->where('senha', $senha);
        }
       
        if($status){
            $this->db->where('status', $status);
        }
         
      
        $query = $this->db->get();
        
        if($id){
          return $query->row();
        } else {
          return $query->result_array();
        }
        
    }

    public function  login($cpf,$status=""){
        $this->db->select('*');
        $this->db->from($this->tabela);       

        $this->db->where('cpf', $cpf);
        
        if($status != ""){
            $this->db->where('status', $status);
        }
        $query = $this->db->get();
        return array('quant' => $query->num_rows(), 'valor' => $query->result_array());
        
      
    }
    
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function excluir($id){
        return $this->db->delete($this->tabela, array('id' => $id));
    }


}
?>
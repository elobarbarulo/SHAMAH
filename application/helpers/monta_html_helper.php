<?php 
/*****************************************************************************************************
 * 
 * @param type $tamanho
 * @param type $label
 * @param type $tipo_campo
 * @param type $nome
 * @param type $value
 * @param type $maxlength
 * @param type $classes
 * @return string
 *****************************************************************************************************/
function monta_input($tamanho,$label,$tipo_campo,$nome,$value = '',$maxlength = "" , $classes = ""){	
	$valor = $value != ""  ? $value : set_value($nome);
	$maxla = $maxlength != ""  ? $maxlength : "";
	$classe = $classes != ""  ? $classes : "";


	$ret = '';
	$ret.='<div class="col-md-'.$tamanho.'">';
	$ret.='<div class="input-group">';
	$ret.='<span class="input-group-addon" id="basic-addon1">'.$label.'</span>';
	$ret.='<input type="'.$tipo_campo.'" class="form-control  ' . $nome . ' ' . $classe .' "  name="'.$nome.'" value="'.$valor.'" placeholder="'.$label.'" aria-describedby="basic-addon1" maxlength="'.$maxlength.'">';
	$ret.='</div>';
	$ret.='<ul  class=" ul_'.$nome.'_list col-md-12 ul_autocomplete"></ul>';
	$ret.='</div>';
	return $ret;
}
/******************************************************************************************************
 * 
 * @param type $tamanho
 * @param type $label
 * @param type $nome
 * @param type $valores
 * @param type $selecionado
 * @return string
 *****************************************************************************************************/
function monta_select($tamanho,$label,$nome,$valores,$selecionado,$id = ""){	
	if($selecionado == '' || $selecionado == 0){
		$selec = set_value($nome);
	}else{
		$selec = $selecionado;
	}

	$ret = '';
	$ret.='<div class="col-md-'.$tamanho.'">';
	$ret.='<div class="input-group">';
	$ret.='<span class="input-group-addon" id="basic-addon1">'.$label.'</span>';
	$ret.='<select class="form-control '. $nome.' " name="'.$nome.'" id ="'.$id.'">';
	//$ret.='<option value = "">'.$label.'</option>';
		foreach ($valores as $key => $value) {
	    	if($selec == $key){
	          $selected = " selected='selected' ";
	        }else{
	          $selected = "  ";
	    	}
		$ret.='<option  ' . $selected . ' value = "'.$key.'">'.$value.'</option>';
	    }
	$ret.='</select>';
	$ret.='</div>';
	$ret.='</div>';

	return $ret;

} 
 


/******************************************************************************************************
 * 
 * @param type $tamanho
 * @param type $label
 * @param type $tipo_campo
 * @param type $nome
 * @param type $value
 * @return string
 *****************************************************************************************************/
function monta_input_ver($tamanho,$label,$tipo_campo,$nome,$value = ''){	
	$valor = $value != ""  ? $value : set_value($nome);

	$ret = '';
	$ret.='<div class="col-md-'.$tamanho.'">';
	$ret.='<div class="input-group">';
	$ret.='<span class="input-group-addon" id="basic-addon1">'.$label.'</span>';
	$ret.='<input disabled type="'.$tipo_campo.'" class="form-control  ' . $nome . ' "  name="'.$nome.'" value="'.$valor.'" placeholder="'.$label.'">';
	$ret.='</div>';
	$ret.='</div>';
	return $ret;
}
/******************************************************************************************************
 * 
 * @param type $tamanho
 * @param type $label
 * @param type $nome
 * @param type $valores
 * @param type $selecionado
 * @return string
 *****************************************************************************************************/
function monta_select_ver($tamanho,$label,$nome,$valores,$selecionado,$id = ""){	
	if($selecionado == '' || $selecionado == 0){
		$selec = set_value($nome);
	}else{
		$selec = $selecionado;
	}

	$ret = '';
	$ret.='<div class="col-md-'.$tamanho.'">';
	$ret.='<div class="input-group">';
	$ret.='<span class="input-group-addon" id="basic-addon1">'.$label.'</span>';
	$ret.='<select disabled class="form-control '. $nome.' " name="'.$nome.'"  id ="'.$id.'">';
	//$ret.='<option value = "">'.$label.'</option>';
		foreach ($valores as $key => $value) {
	    	if($selec == $key){
	          $selected = " selected='selected' ";
	        }else{
	          $selected = "  ";
	    	}
		$ret.='<option  ' . $selected . ' value = "'.$key.'">'.$value.'</option>';
	    }
	$ret.='</select>';
	$ret.='</div>';
	$ret.='</div>';

	return $ret;

} 

/******************************************************************************************************
 * 
 * @param type $controle
 * @param type $tipo_produto
 * @param type $marca
 * @param type $id_produto
 * @return type
 *****************************************************************************************************/
function navegacao_produtos($controle,$tipo_produto,$marca,$id_produto){

        return '<table class="table">
          <tr>
            <td>'.bt_link($link = $controle.'/add_estoque/'.$tipo_produto.'/'.$marca.'/'.$id_produto,  $texto = '<i class="fa fa-plus-circle fa-4x"></i><br>Estoque').'</td>
            <td>'.bt_link($link = $controle.'/form/'.$tipo_produto.'/'.$marca.'/'.$id_produto,$texto = '<i class="fa fa-pencil-square-o fa-4x"></i><br>Editar').'</td>
            <td>'.bt_link($link = $controle.'/ver/'.$tipo_produto.'/'.$marca.'/'.$id_produto, $texto = '<i class="fa fa-search fa-4x"></i><br>Ver').'</td>
          </tr>
        </table>';
}

/******************************************************************************************************
 * 
 * @param type $controle
 * @param type $tipo_produto
 * @param type $marca
 * @param type $id_produto
 * @return type
 *****************************************************************************************************/
function navegacao_produtos_processador($controle,$tipo_produto,$marca,$tipo_maquina,$id_produto,$navegacao){

        $link = $controle.'/form_processador/'.$tipo_produto.'/'.$marca.'/'.$tipo_maquina.'/'.$id_produto;
    
        return '<table class="table">
          <tr>
            <td>'.bt_link($link.'/3',  $texto = '<i class="fa fa-plus-circle fa-4x"></i><br>Estoque').'</td>
            <td>'.bt_link($link.'/1',  $texto = '<i class="fa fa-pencil-square-o fa-4x"></i><br>Editar').'</td>
            <td>'.bt_link($link.'/2',  $texto = '<i class="fa fa-search fa-4x"></i><br>Ver').'</td>
          </tr>
        </table>';
}

/******************************************************************************************************
 * 
 * @param type $link
 * @param type $texto
 * @return type
 *****************************************************************************************************/
function bt_link($link,$texto){
	$ret ='';
	// $ret.= '<div class="col-md-12"><br></div>';
	$ret.=anchor($link,'<span class="btn btn-primary">'.$texto.'</span>');
	return $ret;
}
/******************************************************************************************************
 * 
 * @param type $texto
 * @return string
 *****************************************************************************************************/
function SubTitulo($texto){
	$ret ='';
	$ret.= '<div class="col-md-12"><h4>'.$texto.'</h4></div>';
	return $ret;
}
/******************************************************************************************************
 * 
 * @param type $tamanho_espaco
 * @param type $tamanho_bt
 * @param type $texto
 * @return string
 *****************************************************************************************************/
function bt_form($tamanho_espaco,$tamanho_bt,$texto,$id=""){
	$ret ='';
	$ret.= '<div class="col-md-12"><br></div>';
	$ret.= '<div class="col-md-'.$tamanho_espaco.'"></div>';
	$ret.= '<div class="col-md-'.$tamanho_bt.'"><button type="submit" class="btn btn-primary" id="'.$id.'">'.$texto.'</button></div>';
	return $ret;
}
/********************************************************************************************************
 * 
 * @param type $tamanho_espaco
 * @param type $tamanho_bt
 * @param type $texto
 * @return string
 *******************************************************************************************************/
function bt_form_tr($tamanho_bt,$texto){
	$ret ='';
	$ret.= '<div class="col-md-'.$tamanho_bt.'"><button type="submit" class="btn btn-primary">'.$texto.'</button></div>';
	return $ret;
}
/******************************************************************************************************
 * 
 * @param type $mensagem
 * @return string
 *****************************************************************************************************/
function reprovado($mensagem){
	$ret ='';
	$ret.= '<div class="alert alert-danger alert-dismissible" role="alert">';
	$ret.= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	$ret.= $mensagem;
	$ret.= '</div>';
	return $ret;
}
/******************************************************************************************************
 * 
 * @param type $mensagem
 * @return string
 *****************************************************************************************************/
function mensagem_alerta($mensagem){
	$ret ='';
	$ret.= '<div class="alert alert-info alert-dismissible" role="alert">';
	$ret.= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	$ret.= $mensagem;
	$ret.= '</div>';
	return $ret;
}

?>
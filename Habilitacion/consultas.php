<?php
include_once('../registro.php');
$query = new Registro();
$tp = $_POST['tp'];//tipo de consulta

if($tp == 'marca'){
    $cte = $_POST['cte'];
    $rs = $query->Consultar("*","FCAT_MARCA","ID_CLIENTE=".$cte,"");
    echo "<select class='custom-select' id='cmbmarca' name='ncmbmarca' onchange='Buscar_Orden();' tabindex='2'><option value='0'></option>";//onchange='Buscar_Linea();'
    echo "<optgroup>";
    while(!$rs->EOF){
        echo "<option value='".$rs->fields['ID_MARCA']."'>".$rs->fields['MARCA']."</option>";//".($mc==$rs->fields['ID_MARCA']?"selected":"")."
        $rs->MoveNext();
    }
    echo "</optgroup>";
    echo "</select>"; 
}else if($tp=='orden'){
    $cte = $_POST['cte'];
    $marca = $_POST['marca'];
    $rs = $query->Consultar("*","FFICHA","ID_CLIENTE= ".$cte." AND ID_MARCA = ".$marca."","");
    //if($rs->RecordCount()>0){
    echo "<select class='custom-select' id='cmborden' name='ncmborden' onchange='Buscar_Etiquetas();' tabindex='3'><option value='0'></option>";//onchange='Buscar_Linea();'
    echo "<optgroup>";
    while(!$rs->EOF){
        echo "<option value='".$rs->fields['ID_FICHA']."'>".$rs->fields['ORDEN']."</option>";//".($mc==$rs->fields['ID_MARCA']?"selected":"")."
        $rs->MoveNext();
    }
    echo "</optgroup>";
    echo "</select>";
}else if($tp == 'etiq'){
    $cte = $_POST['cte'];
    $marca = $_POST['marca'];
    $rs = $query->Consultar("*","CAT_ETIQUETAS","ID_CLIENTE=".$cte." AND ID_MARCA = ".$marca." AND PADRE = 1","");
    //if($rs->RecordCount()>0){
        echo "<select class='custom-select' id='cmbetiqueta' name='ncmbetiqueta' onchange='Buscar_Campos();' tabindex='4'><option value='0'></option>";//onchange='Buscar_Linea();'
        echo "<optgroup>";
        while(!$rs->EOF){
            echo "<option value='".$rs->fields['ID_CAT_ETIQUETA']."'>".$rs->fields['NOMBRE']."</option>";//".($mc==$rs->fields['ID_MARCA']?"selected":"")."
            $rs->MoveNext();
        }
        echo "</optgroup>";
        echo "</select>";
    //}else echo 0;
}else if($tp == 'campos'){
    $id_etiq = $_POST['id_etiq'];
    $campos = "";
    $rs = $query->Consultar("*","CAT_ETIQUETAS","IDENTIFICADOR=".$id_etiq,"ID_CAT_ETIQUETA");
    $cont = 0;
    while(!$rs->EOF){
        $cont++;
        //echo "<option value='".$rs->fields['ID_MARCA']."'>".$rs->fields['MARCA']."</option>";//".($mc==$rs->fields['ID_MARCA']?"selected":"")."
        $campos.= "<div class='col-md-1'><div class='form-group'><label style='width:200px;'>".$rs->fields['NOMBRE']."</label><br>";
        $campos.= "<input style='width:100px;' class='tinput'id='campo_".$cont."' type='text''></div></div>";
        
        $rs->MoveNext();
        /*
                                        
                                            
                                            <div id="dv_etiquetas"><select class="custom-select" id="cmbetiqueta" name="ncmbetiqueta" tabindex="3">
                                                <optgroup>
                                                </optgroup>
                                                
                                            </select>
                                            </div>
                                        </div>
                                        
                                    </div>
         */
    }
    
    $campos.= "";
    echo $campos."|".$cont;
    /*echo "</optgroup>";
    echo "</select>";*/ 
}else if($tp=='addCampos'){
    $cont=$_POST['cont'];
    $campos = "";
    for($i=1;$i<=$cont;$i++){
        $campos.= "<div class='col-md-1 grid'><div class='form-group'><input style='width:100px;' class='tinput'id='campo_".$i."' type='text''></div></div>";
        $cont+1;
    }
    //$res=$cont+$i;
    $campos.="";
    $campos.="<a style='width:30px;'href='#' onclick='Agregar_Campos();'><i class='fas fa-plus'></i></a>";
    echo $campos."|".$cont;
    /*
    $cont=$_POST['cont'];
    $id_etiq = $_POST['id_etiq'];
    $campos="";
    $rs = $query->Consultar("*","CAT_ETIQUETAS","IDENTIFICADOR=".$id_etiq,"ID_CAT_ETIQUETA");
    while(!$rs->EOF){
        $cont++;
        $campos.="<input style='width:100px;' class='tinput'id='campo_".$cont."' type='text''>";
        $rs->MoveNext();
    }
    $campos.="<a style='width:30px;'href='#' onclick='Agregar_Campos();'><i class='fas fa-plus'></i></a>";
    echo $campos."|".$cont;*/
}
    
?>
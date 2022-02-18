<?php
include_once('../registro.php');
$query = new Registro();
$tp = $_POST['tp'];//tipo de consulta
use Shuchkin\SimpleXLSX;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);


if($tp == 'marca'){
    $cte = $_POST['cte'];
    $rs = $query->Consultar("*","FCAT_MARCA","ID_CLIENTE=".$cte,"");
    echo "<select class='custom-select' id='cmbmarca' name='ncmbmarca' onchange='Buscar_Orden()' tabindex='2'><option value='0'></option>";//onchange='Buscar_Linea();'
    echo "<optgroup>";
    while(!$rs->EOF){
        echo "<option value='".$rs->fields['ID_MARCA']."'>".$rs->fields['MARCA']."</option>";//".($mc==$rs->fields['ID_MARCA']?"selected":"")."
        $rs->MoveNext();
    }
    echo "</optgroup>";
    echo "</select>"; 
    echo "";
}else if($tp=='orden'){
    $cte = $_POST['cte'];
    $marca = $_POST['marca'];
    $rs = $query->Consultar("*","FFICHA","ID_CLIENTE= ".$cte." AND ID_MARCA = ".$marca."","");
    //if($rs->RecordCount()>0){
    echo "<select class='custom-select' id='cmborden' name='ncmborden' onchange='Buscar_Etiquetas();' tabindex='3'><option value='0'></option>";//onchange='Buscar_Linea();'
    echo "<optgroup>";
    while(!$rs->EOF){
        echo "<option value='".$rs->fields['ORDEN']."'>".$rs->fields['ORDEN']."</option>";//".($mc==$rs->fields['ID_MARCA']?"selected":"")."
        $rs->MoveNext();
    }
    echo "</optgroup>";
    echo "</select>";
}else if($tp == 'etiq'){
    $cte = $_POST['cte'];
    $marca = $_POST['marca'];
    $rs = $query->Consultar("*","CAT_ETIQUETAS","ID_CLIENTE=".$cte." AND ID_MARCA = ".$marca." AND PADRE = 1","");
    //if($rs->RecordCount()>0){
        echo "<select class='custom-select' id='cmbetiqueta' name='ncmbetiqueta' onchange='Buscar_Campos(); ' tabindex='4'><option value='0'></option>";//onchange='Buscar_Linea();'
        echo "<optgroup>";
        while(!$rs->EOF){
            echo "<option value='".$rs->fields['ID_CAT_ETIQUETA']."'>".$rs->fields['NOMBRE']."</option>";//".($mc==$rs->fields['ID_MARCA']?"selected":"")."
            $rs->MoveNext();
        }
        echo "</optgroup>";
        echo "</select>";
    //}else echo 0;
}else if($tp == 'campos'){
    $orden=$_POST['orden'];
    $qry="FP.PENUM, SUBSTRING(FP.PENUM, 1, 6)AS ORDEN, FI.ICOD, FI.IRAIZ, SUM(FL.PLCANT)AS CANTIDAD, SUM(FL.PLSURT)AS SURTIDO, FL.PLTALLA, FL.PLTIPMV, PR.PRVCOD, FP.PEMAQUILERO";
    $inner="FPENC FP INNER JOIN FPLIN FL ON FL.PESEQ = FP.PESEQ INNER JOIN FINV FI ON FI.ISEQ = FL.ISEQ INNER JOIN FPRV PR ON PR.PRVSEQ = FP.PRVSEQ ";
    $id_etiq = $_POST['id_etiq'];
    $campos = "";
    $campos1 = "";
    $rs = $query->Consultar("*","CAT_ETIQUETAS","IDENTIFICADOR=".$id_etiq,"ID_CAT_ETIQUETA");
    $rs1=$query->Consultar_Proscai($qry,$inner,"FP.PENUM LIKE 'E00407%' GROUP BY SUBSTRING(FP.PENUM, 1, 6), FL.PLTALLA","");
    $cont = 0;
    
    while(!$rs->EOF){
        $cont++;
        //echo "<option value='".$rs->fields['ID_MARCA']."'>".$rs->fields['MARCA']."</option>";//".($mc==$rs->fields['ID_MARCA']?"selected":"")."
        $campos.= "<div class='col-md-1'><div class='form-group'><label style='width:200px;'>".$rs->fields['NOMBRE']."</label>";
        while(!$rs1->EOF){
            $campos.= "<input style='width:100px;' class='tinput'id='campo_".$cont."' type='text''>";
            $rs1->MoveNext();
        }
        $campos.="</div></div>";
        $rs->MoveNext();
    }
    
    //$campos.= "<input style='width:100px;' class='tinput'id='campo_".$cont."' type='text''>";
    
    

    
    
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
/*else{
    //$archivo=$_POST['file'];
    echo var_dump($_FILES);
    $contador=1;
    //$rs=$query->Insertar("","fchequera","","","","","");
    if (isset($_FILES['fichero'])) {
        if ( $xlsx = SimpleXLSX::parse( $_FILES['fichero']['tmp_name'] ) ) {

            echo '<table border="1" cellpadding="3" style="border-collapse: collapse">';

            $dim = $xlsx->dimension();
            //$dim[1]=filas
            //$dim[0]=columnas
            $cols = $dim[0];
            $filas= $dim[1];
            //echo $cols;
            foreach ( $xlsx->rows() as $k => $r ) {
                if ($k == 0) continue; // skip first row
                //echo '<tr>';
                echo '<tr>';
                for ( $i = 0; $i < $cols; $i ++ ) {
                    //$modelo=$r[$i[]];
                    
                    echo '<td>' . ( $r[ $i ]  ) . '</td>';
                }
                echo '</tr>';
                }
            //echo $contador;
            echo '</table>';
            echo $modelo;
        } else {
            echo SimpleXLSX::parseError();
        }
       // print_r( $xlsx->rows() );
    }
}*/
    
?>
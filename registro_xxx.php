<?php
include_once("adodb/adodb.inc.php");
include_once("adodb/adodb-errorhandler.inc.php");
include_once("conn.php");
$ruta="DisenoPammy/log";

class Registro
{
	public function Consultar($campos,$tablas,$criterios,$orden)
	{
		$query = new Sentencias();
		$rs = $query->Consultar($query, $campos,$tablas, $criterios, $orden);
		return $rs;
	}
    public function Consultar_Proscai($campos,$tablas,$criterios,$orden)
    {
        $query = new Proscai();
        $rs = $query->Consultar($query, $campos,$tablas, $criterios, $orden);
        return $rs;
    }
	public function Registrar_Modelo($cte, $marca, $lin, $pren, $talla, $ord, $mod, $ped, $sem, $temp, $corrida, $dis, $pat, $mues, $grad, $desc, $igual, $cant){
			$query = new Sentencias();
			$db = $query->Iniciar_Transaccion($query);

			$sql = "INSERT INTO FFICHA(ID_CLIENTE, ID_MARCA, ID_LINEA, ID_PRENDA, ID_TALLA, ORDEN, MODELO, PEDIDO, SEMANA, TEMPORADA, CORRIDA, DISENADORA, PATRONISTA, MUESTRISTA, GRADUADORA, DESCRIPCION, IGUAL, FECHA, CANTIDAD, STATUS) ";
			$sql.= "VALUES(".$cte.", ".$marca.", ".$lin.", ".$pren.", ".$talla.", '".$ord."', '".$mod."', '".$ped."', '".$sem."', '".$temp."', '".$corrida."', '".$dis."', '".$pat."', '".$mues."','".$grad."','".$desc."','".$igual."', CURDATE(), '".$cant."', 1)";
			$sql = $this->InjectSQL_registro($sql,1);
			$rs = $db->Execute($sql);
            $id = $db->Insert_ID();

			if($query->Finalizar_Transaccion($db)){
				return $id;
			}else
				return 0;
	}
    public function Modificar_Modelo($ord, $ficha, $cte, $marca, $lin, $pren, $temp, $talla, $dis, $pat, $mues, $grad, $igual, $cant, $desc){
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "UPDATE FFICHA SET ID_CLIENTE = ".$cte.", ID_MARCA = ".$marca.", ID_LINEA = ".$lin.", ID_PRENDA = ".$pren.", ID_TALLA = ".$talla.", ORDEN = '".$ord."', TEMPORADA = '".$temp."', DISENADORA = '".$dis."', PATRONISTA = '".$pat."', ";
        $sql.= "MUESTRISTA = '".$mues."', GRADUADORA = '".$grad."', IGUAL = '".$igual."', CANTIDAD = '".$cant."', DESCRIPCION = '".$desc."' WHERE ID_FICHA =".$ficha;
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);

        if($query->Finalizar_Transaccion($db)){
            return 1;
        }else
            return 0;
    }
    public function Registrar_Foto($id, $foto){
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "INSERT INTO FFOTO(ID_FICHA, FOTO, STATUS) ";
        $sql.= "VALUES(".$id.", 'fotos/".$foto.".jpg', 1)";
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);

        if($query->Finalizar_Transaccion($db)){
            return 1;
        }else
            return 0;
    }
    public function Registrar_Medida($id, $ct_med, $talla, $med, $tol){
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "INSERT INTO FMEDIDAS(ID_FICHA, ID_CAT_MED, TALLA, MEDIDA, TOLERANCIA, STATUS) ";
        $sql.= "VALUES(".$id.", ".$ct_med.", '".$talla."', '".$med."', '".$tol."', 1)";
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);

        if($query->Finalizar_Transaccion($db)){
            return 1;
        }else
            return 0;
    }
    public function Actualizar_Medida($id, $med, $tipo, $tol){
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "UPDATE FMEDIDAS ";
        $sql.= " SET MEDIDA = '".$med."', ID_CAT_MED = ".$tipo.", TOLERANCIA = '".$tol."' WHERE ID_MEDIDA = ".$id." ";
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);

        if($query->Finalizar_Transaccion($db)){
            return 1;
        }else
            return 0;
    }
    /*public function Registrar_Combinacion($id, $tipo, $icod, $descr, $compos){
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "INSERT INTO FCOMBINACIONES(ID_FICHA, ID_CAT_COMBINACION, ICOD, DESCRIPCION, COMPOSICION, STATUS) ";
        $sql.= "VALUES(".$id.", ".$tipo.", '".$icod."', '".$descr."', '".$compos."', 1)";
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);
        $id = $db->Insert_ID();

        if($query->Finalizar_Transaccion($db)){
            return $id;
        }else
            return 0;
    }*/
    public function Registrar_Combinacion($id, $tipo, $descr, $comp){
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "INSERT INTO FCOMBINACIONES(ID_FICHA, ID_CAT_COMBINACION, DESCRIPCION, COMPOSICION, STATUS) ";
        $sql.= "VALUES(".$id.", ".$tipo.", '".$descr."', '".$comp."',  1)";
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);
        $id = $db->Insert_ID();

        if($query->Finalizar_Transaccion($db)){
            return $id;
        }else
            return 0;
    }
    public function Actualizar_Combinacion($id, $comb){//$id, $comp
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "UPDATE FCOMBINACIONES";
        $sql.= " SET ID_CAT_COMBINACION = ".$comb." WHERE ID_COMBINACION = ".$id;
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);

        if($query->Finalizar_Transaccion($db)){
            return 1;
        }else
            return 0;
    }
    /*public function Registrar_Variante($id, $color, $fact){
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "INSERT INTO FVARIANTES(ID_COMBINACION, COLOR, PRV_FACT, STATUS) ";
        $sql.= "VALUES(".$id.", '".$color."', '".$fact."', 1)";
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);

        if($query->Finalizar_Transaccion($db)){
            return 1;
        }else
            return 0;
    }*/
    public function Registrar_Variante($id, $icod, $idescr, $compos, $color, $fact){
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "INSERT INTO FVARIANTES(ID_COMBINACION, ICOD, IDESCR, COMPOSICION, COLOR, PRV_FACT, STATUS) ";
        $sql.= "VALUES(".$id.", '".$icod."', '".$idescr."','".$compos."', '".$color."', '".$fact."', 1)";
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);

        if($query->Finalizar_Transaccion($db)){
            return 1;
        }else
            return 0;
    }
    public function Registrar_VarianteN($id, $var, $color, $icod1, $idescr1, $comp1, $fact1, $icod2, $idescr2, $comp2, $fact2){
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "INSERT INTO FVARIANTES(ID_COMBINACION, VARIANTE, COLOR, ICOD, IDESCR, COMPOSICION, PRV_FACT, ICOD2, IDESCR2, COMPOSICION2, PRV_FACT2, STATUS) ";
        $sql.= "VALUES(".$id.", ".$var.", '".$color."', '".$icod1."', '".$idescr1."', '".$comp1."', '".$fact1."', '".$icod2."', '".$idescr2."', '".$comp2."', '".$fact2."', 1)";
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);

        if($query->Finalizar_Transaccion($db)){
            return 1;
        }else
            return 0;
    }
    public function Modificar_VarianteN($id, $color, $icod1, $idescr1, $comp1, $fact1, $icod2, $idescr2, $comp2, $fact2){
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "UPDATE FVARIANTES ";
        $sql.= "SET COLOR = '".$color."', ICOD = '".$icod1."', IDESCR = '".$idescr1."', COMPOSICION = '".$comp1."', PRV_FACT = '".$fact1."', ICOD2 = '".$icod2."', IDESCR2 = '".$idescr2."', COMPOSICION2 = '".$comp2."', PRV_FACT2 = '".$fact2."' WHERE ID_VARIANTE =".$id;
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);

        if($query->Finalizar_Transaccion($db)){
            return 1;
        }else
            return 0;
    }
    public function Actualizar_Variante($id, $comp){
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "UPDATE FVARIANTES ";
        $sql.= " SET COMPOSICION = '".$comp."' WHERE ID_VARIANTE = ".$id;
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);

        if($query->Finalizar_Transaccion($db)){
            return 1;
        }else
            return 0;
    }
    public function Update_Variante($id, $icod, $idescr, $comp, $color, $fact){
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "UPDATE FVARIANTES ";
        $sql.= " SET ICOD = '".$icod."', IDESCR = '".$idescr."', COMPOSICION = '".$comp."', COLOR = '".$color."', PRV_FACT = '".$fact."' WHERE ID_VARIANTE = ".$id;
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);

        if($query->Finalizar_Transaccion($db)){
            return 1;
        }else
            return 0;
    }
    public function Eliminar_Otro($id){
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "DELETE FROM FCOMBINACIONES WHERE ID_COMBINACION =".$id;
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);

        if($query->Finalizar_Transaccion($db)){
            return 1;
        }else
            return 0;
    }
    public function Eliminar_Combinacion($id){
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "DELETE FROM FCOMBINACIONES WHERE ID_COMBINACION =".$id;
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);

        if($query->Finalizar_Transaccion($db)){
            $sql = "DELETE FROM FCOMPOSICIONES WHERE ID_COMBINACION =".$id;
            $sql = $this->InjectSQL_registro($sql,1);
            $rs = $db->Execute($sql);
            return 1;
        }else
            return 0;
    }
    public function Eliminar_Variante($id){
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "DELETE FROM FVARIANTES WHERE ID_COMBINACION = ".$id;
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);

        if($query->Finalizar_Transaccion($db)){
            return 1;
        }else
            return 0;
    }
    public function Registrar_Habilitacion($id, $icod, $descr){
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "INSERT INTO FHABILITACION(ID_FICHA, ICOD, DESCRIPCION, STATUS) ";
        $sql.= "VALUES(".$id.", '".$icod."', '".$descr."', 1)";
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);
        $id = $db->Insert_ID();

        if($query->Finalizar_Transaccion($db)){
            return $id;
        }else
            return 0;
    }
    public function Eliminar_Habil($id){
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "DELETE FROM FHABILITACION WHERE ID_HABILITACION =".$id;
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);

        if($query->Finalizar_Transaccion($db)){
            $sql = "DELETE FROM FHABIL_VARIANTE WHERE ID_HABIL =".$id;
            $sql = $this->InjectSQL_registro($sql,1);
            $rs = $db->Execute($sql);

            $sql = "DELETE FROM FHABIL_TALLAS WHERE ID_HABIL =".$id;
            $sql = $this->InjectSQL_registro($sql,1);
            $rs = $db->Execute($sql);
            return 1;
        }else
            return 0;
    }
    public function Eliminar_Medidas($id){
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "DELETE FROM FMEDIDAS WHERE ID_FICHA =".$id;
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);

        if($query->Finalizar_Transaccion($db)){
            return 1;
        }else
            return 0;
    }
    public function Nueva_Medida($med){
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "INSERT INTO FCAT_MEDIDA(DESCRIPCION, STATUS) ";
        $sql.= "VALUES('".$med."', 1)";
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);

        if($query->Finalizar_Transaccion($db)){
            return 1;
        }else
            return 0;
    }
    public function Registrar_HabilVariante($id, $var, $habil){
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "INSERT INTO FHABIL_VARIANTE(ID_HABIL, VARIANTE, HABIL, STATUS) ";
        $sql.= "VALUES(".$id.", '".$var."', '".$habil."', 1)";
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);
        $id = $db->Insert_ID();

        if($query->Finalizar_Transaccion($db)){
            return $id;
        }else
            return 0;
    }
    public function Actualizar_Habil_Variante($id, $habil){
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "UPDATE FHABIL_VARIANTE ";
        $sql.= " SET HABIL = '".$habil."' WHERE ID_HABIL_VAR = ".$id;
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);

        if($query->Finalizar_Transaccion($db)){
            return 1;
        }else
            return 0;
    }
    public function Registrar_HabilTalla($id, $talla, $habil){
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "INSERT INTO FHABIL_TALLAS(ID_HABIL, TALLA, HABIL, STATUS) ";
        $sql.= "VALUES(".$id.", '".$talla."', '".$habil."', 1)";
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);
        $id = $db->Insert_ID();

        if($query->Finalizar_Transaccion($db)){
            return $id;
        }else
            return 0;
    }
    public function Actualizar_Habil_Talla($id, $habil){
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "UPDATE FHABIL_TALLAS ";
        $sql.= " SET HABIL = '".$habil."' WHERE ID_HABIL_TALLA = ".$id;
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);

        if($query->Finalizar_Transaccion($db)){
            return 1;
        }else
            return 0;
    }
    public function Registrar_Composicion($id, $comp){
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "INSERT INTO FCOMPOSICIONES(ID_COMBINACION, DESCRIPCION, STATUS) ";
        $sql.= "VALUES(".$id.", '".$comp."', 1)";
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);

        if($query->Finalizar_Transaccion($db)){
            return 1;
        }else
            return 0;
    }
    public function Actualizar_Composicion($id, $comp){
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "UPDATE FCOMPOSICIONES ";
        $sql.= "SET DESCRIPCION = '".$comp."' WHERE ID_COMPOSICION = ".$id;
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);

        if($query->Finalizar_Transaccion($db)){
            return 1;
        }else
            return 0;
    }
    public function Registrar_Piezas($id, $comb, $desc, $cant){
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "INSERT INTO FPIEZAS(ID_FICHA, ID_CAT_COMBINACION, DESCRIPCION, CANTIDAD, STATUS) ";
        $sql.= "VALUES(".$id.", ".$comb.", '".$desc."', '".$cant."', 1)";
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);

        if($query->Finalizar_Transaccion($db)){
            return 1;
        }else
            return 0;
    }
    public function Eliminar_Pieza($id){
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "DELETE FROM FPIEZAS WHERE ID_PIEZA = ".$id;
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);

        if($query->Finalizar_Transaccion($db)){
            return 1;
        }else
            return 0;
    }
    public function Registrar_Indicacion($id, $ind, $ind2, $ind3, $ind4, $ind5){
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "INSERT INTO FINDICACIONES(ID_FICHA, INDICACION, INDICACION2, INDICACION3, INDICACION4, INDICACION5, STATUS) ";
        $sql.= "VALUES(".$id.", '".$ind."', '".$ind2."', '".$ind3."', '".$ind4."', '".$ind5."', 1)";
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);

        if($query->Finalizar_Transaccion($db)){
            return 1;
        }else
            return 0;
    }
    public function Modificar_Indicacion($id, $ind, $ind2, $ind3, $ind4, $ind5){
        $query = new Sentencias();
        $db = $query->Iniciar_Transaccion($query);

        $sql = "UPDATE FINDICACIONES ";
        $sql.= "SET INDICACION = '".$ind."', INDICACION2 = '".$ind2."', INDICACION3 = '".$ind3."', INDICACION4 = '".$ind4."', INDICACION5 = '".$ind5."' WHERE ID_INDICACION = ".$id;
        $sql = $this->InjectSQL_registro($sql,1);
        $rs = $db->Execute($sql);

        if($query->Finalizar_Transaccion($db)){
            return 1;
        }else
            return 0;
    }
	public function Modificar_Empleado($id,$user,$contrato,$nvl,$area,$agencia,$partida,$sup,$hor,$empleado,$nom,$pat,$mat,$edad,$curp,$rfc,$nss,$cuenta,$banco,$sx,$tel1,$tel2,$cor1,$cor2,$fch_nac,$fch_ing,$vig,$fch_baja,$nac,$civil,$prof,$razon,$calle,$numint,$numext,$col,$cp,$mun,$estado,$mov,$tipo_mov){
			$query = new Sentencias();
			$db = $query->Iniciar_Transaccion($query);

			/*REGISTRAR HISTORICO*/
			$sql = "SELECT E.ID_EMPLEADO, E.ID_USUARIO, E.ID_CONTRATO, E.ID_NIVEL, E.ID_AREA, E.ID_AGENCIA, E.ID_PARTIDA, A.ID_ACTIVIDAD, A.STATUS FROM EMPLEADOS E INNER JOIN ACTIVIDADES A ON E.ID_EMPLEADO = A.ID_EMPLEADO WHERE E.ID_EMPLEADO =".$id;
			$rs = $db->Execute($sql);
			$id_user = $rs->fields[1];
			$id_cont = $rs->fields[2];
			$id_nvl = $rs->fields[3];
			$id_ar = $rs->fields[4];
			$id_ag = $rs->fields[5];
			$id_part = $rs->fields[6];
			$id_act = $rs->fields[7];

			if($id_cont != $contrato || $id_nvl != $nvl || $id_ar != $area || $id_ag != $agencia || $id_part != $partida){
				$sql = "INSERT INTO HISTORICO(ID_EMPLEADO,ID_USUARIO,ID_CONTRATO,ID_NIVEL,ID_AREA,ID_AGENCIA,ID_PARTIDA,ID_ACTIVIDAD,FCH_MOVIMIENTO,FCH_INGRESO,STATUS) VALUES(".$id.",".$id_user.",".$id_cont.",".$id_nvl.",".$id_ar.",".$id_ag.",".$id_part.",".($tipo_mov != ''?0:$id_act).",'".$mov."',GETDATE(),1)";
				$sql = $this->InjectSQL_registro($sql,1);
				$rs = $db->Execute($sql);
			}
			/**************/

			$sql = "UPDATE EMPLEADOS";
			$sql.= " SET ID_USUARIO = ".$user.",ID_CONTRATO = ".$contrato.",ID_NIVEL = ".$nvl.",ID_AREA = ".$area.",ID_AGENCIA = ".$agencia.",ID_PARTIDA = ".$partida.",ID_SUPERVISOR = ".$sup.",ID_HORARIO = ".$hor.",EMPLEADO = '".$empleado."',NOMBRE = '".$nom."',APE_PATERNO = '".$pat."',APE_MATERNO = '".$mat."',NOMBRECOMPLETO = '".$pat." ".$mat." ".$nom."',EDAD = '".$edad."',CURP = '".$curp."',RFC = '".$rfc."',NSS = '".$nss."',CUENTACLABE = '".$cuenta."',BANCO = '".$banco."',SEXO = ".$sx.",TEL_CASA = '".$tel1."',TEL_OFICINA = '".$tel2."',CORREO_INST = '".$cor1."',CORREO_PERSONAL = '".$cor2."',FCH_NAC = '".$fch_nac."',FCH_INGRESO = '".$fch_ing."',FCH_VIGENCIA = '".$vig."',FCH_BAJA = '".$fch_baja."',NACIONALIDAD = '".$nac."',ESTADO_CIVIL = '".$civil."',PROFESION = '".$prof."',RAZON_SOCIAL = '".$razon."',CALLE = '".$calle."',NUMINT = '".$numint."',NUMEXT = '".$numext."',COLONIA = '".$col."',CP = '".$cp."',MUNICIPIO = '".$mun."',ESTADO = '".$estado."' WHERE ID_EMPLEADO=".$id;
			$sql = $this->InjectSQL_registro($sql,1);
			$rs = $db->Execute($sql);

			if($query->Finalizar_Transaccion($db)){
				return 1;
			}else
				return 0;
	}
	public function Status_Empleado($id_emp, $st){
			$query = new Sentencias();
			$db = $query->Iniciar_Transaccion($query);

			$sql = "UPDATE EMPLEADOS";
			if($st == 1)
				$sql.= " SET FCH_BAJA = GETDATE(),";
			else
				$sql.= " SET FCH_BAJA = NULL,";
		    $sql.= "STATUS = (CASE WHEN STATUS = '0' THEN '1' WHEN STATUS = '1' THEN '0' END) WHERE ID_EMPLEADO=".$id_emp;
			$sql = $this->InjectSQL_registro($sql,1);
			$rs = $db->Execute($sql);

			if($query->Finalizar_Transaccion($db)){
				return 1;
			}else
				return 0;
	}
	public function Ingresar_Actividad($id_emp, $fch_mov, $act){
		$query = new Sentencias();
		$db = $query->Iniciar_Transaccion($query);

		$sql = "SELECT * FROM ACTIVIDADES WHERE ID_EMPLEADO = ".$id_emp;
		$rs = $db->Execute($sql);
		if($rs->RecordCount()>0){
			$sql = "SELECT ID_HISTORICO, ID_EMPLEADO, ID_ACTIVIDAD FROM HISTORICO WHERE ID_EMPLEADO = ".$id_emp." AND FCH_MOVIMIENTO = '".$fch_mov."' AND ID_ACTIVIDAD = 0";
				$rs = $db->Execute($sql);
				if($rs->RecordCount()>0){
					$id_his = $rs->fields[0];
					//UPDATE HISTORICO - MODIFICACION DATOS DE EMPLEADO Y ACTIVIDAD.
					$sql = "UPDATE HISTORICO SET ID_ACTIVIDAD = (SELECT MAX(ID_ACTIVIDAD) FROM ACTIVIDADES WHERE ID_EMPLEADO = ".$id_emp.") WHERE ID_HISTORICO = ".$id_his;
					$rs = $db->Execute($sql);
				}else{
					/*REGISTRAR HISTORICO - MODIFICACION SOLO DE ACTIVIDAD*/
					$sql = "SELECT E.ID_EMPLEADO, E.ID_USUARIO, E.ID_CONTRATO, E.ID_NIVEL, E.ID_AREA, E.ID_AGENCIA, E.ID_PARTIDA, MAX(A.ID_ACTIVIDAD) AS ID_ACT FROM EMPLEADOS E INNER JOIN ACTIVIDADES A ON E.ID_EMPLEADO = A.ID_EMPLEADO WHERE E.ID_EMPLEADO = ".$id_emp." GROUP BY E.ID_EMPLEADO, E.ID_USUARIO, E.ID_CONTRATO, E.ID_NIVEL, E.ID_AREA, E.ID_AGENCIA, E.ID_PARTIDA";
					$rs = $db->Execute($sql);
					if($rs->RecordCount()>0){
						$id_user = $rs->fields[1];
						$id_cont = $rs->fields[2];
						$id_nvl = $rs->fields[3];
						$id_ar = $rs->fields[4];
						$id_ag = $rs->fields[5];
						$id_part = $rs->fields[6];
						$id_act = $rs->fields[7];

						$sql = "INSERT INTO HISTORICO(ID_EMPLEADO,ID_USUARIO,ID_CONTRATO,ID_NIVEL,ID_AREA,ID_AGENCIA,ID_PARTIDA,ID_ACTIVIDAD,FCH_MOVIMIENTO,FCH_INGRESO,STATUS) VALUES(".$id_emp.",".$id_user.",".$id_cont.",".$id_nvl.",".$id_ar.",".$id_ag.",".$id_part.",".$id_act.",'".$fch_mov."',GETDATE(),1)";
						$sql = $this->InjectSQL_registro($sql,1);
						$rs = $db->Execute($sql);
					}
				}
		}
		$sql = "INSERT INTO ACTIVIDADES(ID_EMPLEADO, ACTIVIDADES, FCH_MOVIMIENTO, FCH_INGRESO, STATUS) ";
		$sql.= "VALUES(".$id_emp.",'".$act."','".$fch_mov."',GETDATE(),1)";
		$sql = $this->InjectSQL_registro($sql,1);
		$rs = $db->Execute($sql);

		if($query->Finalizar_Transaccion($db)){
			return 1;
		}else
			return 0;
	}
	public function Modificar_Actividad($id, $id_emp, $fch_mov, $act){
			$query = new Sentencias();
			$db = $query->Iniciar_Transaccion($query);

			$sql = "UPDATE ACTIVIDADES";
			$sql.= " SET ID_EMPLEADO = ".$id_emp.",ACTIVIDADES = '".$act."',FCH_MOVIMIENTO = '".$fch_mov."' WHERE ID_ACTIVIDAD=".$id;
			$sql = $this->InjectSQL_registro($sql,1);
			$rs = $db->Execute($sql);

			if($query->Finalizar_Transaccion($db)){
				return 1;
			}else
				return 0;
	}
	public function Status_Actividad($id_act, $st){
			$query = new Sentencias();
			$db = $query->Iniciar_Transaccion($query);

			$sql = "UPDATE ACTIVIDADES";
			if($st == 1)
				$sql.= " SET FCH_BAJA = GETDATE(),";
			else
				$sql.= " SET FCH_BAJA = NULL,";
		    $sql.= "STATUS = (CASE WHEN STATUS = '0' THEN '1' WHEN STATUS = '1' THEN '0' END) WHERE ID_ACTIVIDAD=".$id_act;
			$sql = $this->InjectSQL_registro($sql,1);
			$rs = $db->Execute($sql);

			if($query->Finalizar_Transaccion($db)){
				return 1;
			}else
				return 0;
	}
	public function Ingresar_Reporte($id_emp, $anio, $mes, $tipo, $nombre){
			$query = new Sentencias();
			$db = $query->Iniciar_Transaccion($query);

			$sql = "INSERT INTO REPORTES(ID_EMPLEADO,ANIO,PERIODO,REPORTE,UBICACION,FCH_INGRESO,STATUS) ";
			$sql.= "VALUES(".$id_emp.",'".$anio."','".$mes."','".$tipo."','".$nombre."',GETDATE(),1)";
			$sql = $this->InjectSQL_registro($sql,1);
			$rs = $db->Execute($sql);

			if($query->Finalizar_Transaccion($db)){
				return 1;
			}else
				return 0;
	}
	public function Modificar_Reporte($id,$nombre){
			$query = new Sentencias();
			$db = $query->Iniciar_Transaccion($query);

			$sql = "UPDATE REPORTES";
			$sql.= " SET FCH_INGRESO = GETDATE(), UBICACION = '".$nombre."' WHERE ID_REPORTE=".$id;
			$sql = $this->InjectSQL_registro($sql,1);
			$rs = $db->Execute($sql);

			if($query->Finalizar_Transaccion($db)){
				return 1;
			}else
				return 0;
	}
	public function Modificar_Recibo($id_rec,$nombre){
			$query = new Sentencias();
			$db = $query->Iniciar_Transaccion($query);

			$sql = "UPDATE RECIBOS";
			$sql.= " SET UBICACION_FIRMADO = '".$nombre."' WHERE ID_RECIBO=".$id_rec;
			$sql = $this->InjectSQL_registro($sql,1);
			$rs = $db->Execute($sql);

			if($query->Finalizar_Transaccion($db)){
				return 1;
			}else
				return 0;
	}
	private function InjectSQL_registro($valor, $tipo){
		if($tipo==0){
			$palabras = array('"',"EXEC","LIKE","\x00","\n","\r","\???","\x1a","???","???","#",
			"UPDATE","SELECT","DELETE","INSERT","VALUES","inner","HTML","\x00","\x0a","\x0d","\x1a","\x09","xp_","--");
		}else{
			$palabras = array("EXEC","LIKE","\x00","\n","\r","\???","\x1a","???","#","inner",
			"HTML","\x00","\x0a","\x0d","\x1a","\x09","xp_","--");//,"???"
		}

		for ($i=0; $i<count($palabras);$i++){$valor = str_replace($palabras[$i],"",$valor);}
		return $valor;
	}
}
?>
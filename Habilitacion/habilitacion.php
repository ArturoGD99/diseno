<?php
/*include_once("../adodb/adodb.inc.php");
    include_once("../adodb/adodb-errorhandler.inc.php");*/
    //include_once("../conn.php");
    include_once('../registro.php');
    //include 'includes/header.php';
    $query = new Registro();
    $campos="FF.ORDEN,FF.MODELO,FF.PEDIDO,FC.CLIENTE,FP.PRENDA,FM.MARCA";
    $tablas="FFICHA FF,FCAT_CLIENTE FC,FCAT_PRENDA FP, FCAT_MARCA FM";
    $criterios="FF.ID_CLIENTE= FC.ID_CLIENTE AND FF.ID_PRENDA=  FP.ID_PRENDA  AND FC.ID_CLIENTE= FM.ID_CLIENTE AND FC.ID_CLIENTE= FF.ID_CLIENTE AND FF.ID_MARCA=   FM.ID_MARCA";
    $rs=$query->Consultar($campos,$tablas,$criterios,"");
?>

<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">
<link rel="stylesheet" type="text/css" href="css/stilos.css">
<style>
    .myFont{
        font-size:11px;
    }
</style>
<br>
<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-tag"></i>  Etiquetas</h3><!--fas fa-tshirt-->
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#Etiquetas" data-toggle="tab">Etiquetas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Catalogo" data-toggle="tab">Catalogo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Orden" data-toggle="tab">Orden</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-content p-0" style="border: solid 0px blue">
                    <div class="tab-pane fade show active" id="Etiquetas" style="position: relative; border: solid 0px purple;">
                        <br><br>
                        <form id="fmodelo">
                            <div class="row container">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Cliente</label>
                                        <select id="cmbcliente" class="custom-select" name="ncmbcliente" onchange="Buscar_Marcas();" tabindex="1"><!--onchange="Mostrar(this.value)"-->
                                        <option value="0">Seleccione el cliente</option>
                                            <?php
                                                $rs=$query->Consultar('*','FCAT_CLIENTE',"","CLIENTE");
                                                while(!$rs->EOF){
                                                    echo "<option value='".$rs->fields['ID_CLIENTE']."'>".$rs->fields['CLIENTE']."</option>";
                                                    $rs->MoveNext();
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Marca</label>
                                        <div id="dv_marca"><select class="custom-select" id="cmbmarca" name="ncmbmarca" tabindex="2">
                                            <optgroup>
                                                <option value="0">Seleccione la marca</option>
                                            </optgroup>
                                        </select></div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <div id="dv_orden"><select class="custom-select" id="cmborden" name="ncmborden" tabindex="3">
                                            <optgroup>
                                                <option value="0">Seleccione la orden</option>
                                            </optgroup>
                                        </select></div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Etiqueta</label>
                                            <div id="dv_etiquetas"><select class="custom-select" id="cmbetiqueta" name="ncmbetiqueta" tabindex="4">
                                                <optgroup>
                                                    <option value="0">Seleccione la etiqueta</option>
                                                </optgroup>
                                                
                                            </select>
                                            </div>
                                    </div>
                                    
                                </div>
                                <div class="container">
                                    <div id="excelFiles" class="mb-3">
                                    <input class="form-control" type="file" id="infile" onchange="Subir_Archivo();">
                                    <div id="result"></div>
                                    </div>
                                </div>
                                <!--<div class="col-md-2">
                                    <label >Agregar</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <a href="#" id="add_campo">
                                                <i class="fas fa-plus-circle"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>-->
                            </div> 
                            <input id="tcontador" type="text"> 
                            <div class="row" id="dv_campos"></div><br>
                            <input id="tprueba" type="text">
                            
                            <!--<div class="row">
                                <div class="col-md-5"></div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-primary" id="btn_cat" onclick="Registrar_Catalogo();">Guardar</button>
                                </div>
                                <div id="dv_duplicar" class="col-md-1">
                                    <button type="button" style="display: none;" class="btn btn-success" id="btn_duplicarCat" onclick="Duplicar_Cat();">Duplicar</button>
                                </div>
                                <div class="col-md-5"></div>
                            </div>-->
                        </form>
                    </div>
                    <div class="tab-pane fade" id="Catalogo" style="position: relative;">
                        <title>Etiquetas</title>
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <section class="col-lg-12">
                                        <div class="card-body">
                                            <div class="container">
                                                <div class="container contenedor">
                                                    <h1>Ingresa el número de orden</h1>
                                                    <div class="busqueda input-group input-group-sm mb-3">

                                                        <div class="input-group">
                                                            <input style="width: 85px" id="tbuscar" type="text" class="form-control" placeholder="Buscar" aria-label="Search" aria-describedby="basic-addon2" autocomplete="off" maxlength="7" autofocus="autofocus">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><a href="#" id="btn_buscar" onclick="Buscar_Pedido();"><i class="fas fa-search"></i></a></span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="table-responsive ">
                                                        <table class="ordenes table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Orden</th>
                                                                    <th>Modelo</th>
                                                                    <th>Pedido</th>
                                                                    <th>Cliente</th>
                                                                    <th>Generar</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                                $criterios="FF.ID_CLIENTE= FC.ID_CLIENTE AND FF.ID_PRENDA=FP.ID_PRENDA AND FC.ID_CLIENTE=FM.ID_CLIENTE AND FC.ID_CLIENTE= FF.ID_CLIENTE AND FF.ID_MARCA=FM.ID_MARCA LIMIT 20";
                                                                $rs=$query->Consultar($campos,$tablas,$criterios,""); 
                                                                while( !$rs->EOF ):      
                                                            ?>
                                                            <tr>
                                                                <td ><?php echo $rs->fields['ORDEN'] ?></td>
                                                                <td ><?php echo $rs->fields['MODELO'];?></td>
                                                                <td><?php echo $rs->fields['PEDIDO'];?> </td>
                                                                <td><?php echo $rs->fields['CLIENTE']; ?></td>
                                                                <td>
                                                                    <form method="POST">
                                                                    <input type="hidden" name="id_eliminar" value="<?php  ?>">
                                                                    <!--<input type="submit" href="/admin/propiedades/borrar.php" class="boton boton-rojo" value="Generar">-->
                                                                    </form>
                                                                    <a href="habilitacion/modelos/generar.php?id=<?php echo $rs->fields['ORDEN'] ?>" id="GenerarBase" class="btn btn-primary" class="btn btn-primary">Generar Base</a>
                                                                    <a href="/admin/propiedades/actualizar.php?id=<?php  ?>" class="btn btn-secondary">Generar PDF</a>
                                                                </td>
                                                            </tr>
                                                            <?php $rs->MoveNext();
                                                                endwhile; 
                                                            
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </section>
                                </div>
                            </div>       
                        </section>
                    </div>
                    <div class="tab-pane fade" id="Orden" style="position: relative;">
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label >Etiqueta</label>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Orden</label>
                                                <div id="dv_orden"><select class="custom-select" id="cmborden" name="ncmborden" onchange="Buscar_Orden();" tabindex="3">
                                                    <optgroup>
                                                        <option value="0">Seleccione la orden</option>
                                                    </optgroup>
                                                </select></div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>      
                        </section>
                    </div>
                </div>
            <br>
            </div>
            <div class="card-footer" align="center"></div>
            <div class="container"><?php include_once('../modal_pdf.php')?></div>
            <div class="container"><?php include_once('../modal_variante.php')?></div>
            <div class="container"><?php include_once('../modal_med.php')?></div>
        </div>
    </div>
</section>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>-->
<script type="text/javascript">
    function Buscar_Marcas() {
        var param ='cte='+$('#cmbcliente').val()+'&tp=marca';

        $.ajax({
            url: 'habilitacion/consultas.php',
            cache:false,
            type: 'POST',
            data:param,
            success: function(data){
                $('#dv_marca').html(data);
            },
            error: function (request, status, error) {alert(request.responseText);}
        });
    }
    function Buscar_Orden(){
        var param='cte='+$('#cmbcliente').val()+'&marca='+$('#cmbmarca').val()+'&tp=orden';
        $.ajax({
            url: 'habilitacion/consultas.php',
            cache:false,
            type: 'POST',
            data:param,
            success:function(data){
                $('#dv_orden').html(data);
            },
            error: function (request, status, error) {alert(request.responseText);}
        })
    }
    function Buscar_Etiquetas() {
        var param ='cte='+$('#cmbcliente').val()+'&marca='+$('#cmbmarca').val()+'&tp=etiq';
        $.ajax({
            url: 'habilitacion/consultas.php',
            cache:false,
            type: 'POST',
            data:param,
            success: function(data){
                $('#dv_etiquetas').html(data);
            },
            error: function (request, status, error) {alert(request.responseText);}
        });
    }
    function Buscar_Campos() {
        var param ='id_etiq='+$('#cmbetiqueta').val()+'&orden='+$('#cmborden').val()+'&tp=campos';
        alert(param);
        $.ajax({
            url: 'habilitacion/consultas.php',
            cache:false,
            type: 'POST',
            data:param,
            success: function(data){
                alert(data);
                var ft = data.split('|');
                $('#tcontador').val(ft[1]);
                $('#dv_campos').html(ft[0]);
            },
            error: function (request, status, error) {alert(request.responseText);}
        });
    }
    function Agregar_Campos(){
        var param='cont='+$('#tcontador').val()+'&tp=addCampos';
        $.ajax({
            url:'habilitacion/consultas.php',
            cache:false,
            type:'POST',
            data:param,
            success:function(data){
                var ft = data.split('|');
                $('#tcontador').val(ft[1]);
                var element=document.createElement("DIV");
                $(element).html(ft[0]);
            },
            error: function (request, status, error) {alert(request.responseText);}
        });
    }
    function Subir_Archivo(){
        var archivo=$('#infile')[0].files[0];//se recibe los valores de la global $_files por parte del archivo
        var arr=archivo.name;//se obtiene el nombre del archivo

        var datos=new FormData();
        datos.append('fichero',archivo);
        datos.append('nombre',arr);
        alert(datos+'&tp=upload');
        $.ajax({
            url:'habilitacion/consultas.php',
            cache:false,
            type:'POST',
            dataType:"html",
            data:datos,
            cache: false,
            contentType: false,
	        processData: false,
            success:function(data){
                alert(data);
                $('#result').html(data);
            }
        })
        /*
        var param='file='+$('#infile').val()+'&tp=upload';
        alert(param);
        $.ajax({
            url:'habilitacion/consultas.php',
            cache:false,
            type:'POST',
            data:param,
            success:function(data){
                alert(data);
                $('#result').html(data);
            }
        })*/
    }
    function GenerarBase(){
        var param= 'idord='+$('#tdorden').val();
        $.ajax({
            url: 'habilitacion/generar.php',
            cache:false,
            type: 'POST',
            data:param,
            success: function(data){
                alert("Archivo generado correctamente");
            },
            error: function (request, status, error) {alert(request.responseText);}
        });
    }
</script>
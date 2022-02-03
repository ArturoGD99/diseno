<?php
    include_once("../adodb/adodb.inc.php");
    include_once("../adodb/adodb-errorhandler.inc.php");
    include_once("../conn.php");
    include_once('../registro.php');
    $query = new Registro();
    $ruta="../log";
    $campos="FF.ORDEN,FF.MODELO,FF.PEDIDO,FC.CLIENTE,FP.PRENDA,FM.MARCA";
    $tablas="FFICHA FF,FCAT_CLIENTE FC,FCAT_PRENDA FP, FCAT_MARCA FM";
    $criterios="FF.ID_CLIENTE= FC.ID_CLIENTE AND FF.ID_PRENDA=  FP.ID_PRENDA  AND FC.ID_CLIENTE= FM.ID_CLIENTE AND FC.ID_CLIENTE= FF.ID_CLIENTE AND FF.ID_MARCA=   FM.ID_MARCA";
    $rs=$query->Consultar($campos,$tablas,$criterios,"");
    /*if($rs->RecordCount()>0){
        echo "error";
    }*/
?>

<title>Etiquetas</title>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12"><!-- connectedSortable-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-tag"></i>  Habilitación</h3>
                <div class="card-tools">
                  <!--<ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#registro" data-toggle="tab">Registro</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#consultar" data-toggle="tab">Consultar</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#documentos" data-toggle="tab">Documentos</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#asistencias" data-toggle="tab">Asistencias</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#seguimiento" data-toggle="tab">Seguimiento</a>
                    </li>
                  </ul>-->
                  <li class="nav-item">
                            <div class="input-group">
                                <input style="width: 85px" id="tbuscar" type="text" class="form-control" placeholder="Buscar" aria-label="Search" aria-describedby="basic-addon2" autocomplete="off" maxlength="7" autofocus="autofocus">
                                <div class="input-group-append">
                                    <span class="input-group-text"><a href="#" id="btn_buscar" onclick="Buscar_Pedido();"><i class="fas fa-search"></i></a></span>
                                </div>
                            </div>
                        </li>
                </div>
              </div>
              <div class="card-body">
                <!--<div class="tab-content p-0">
                  <div class="chart tab-pane active" id="registro" style="position: relative; border: solid 0px purple;">
                      <canvas id="registro-canvas" style="border: solid 0px red; height: 90%; width: 100%"></canvas>
                   </div>
                  <div class="chart tab-pane" id="consultar" style="position: relative;">
                    <canvas id="consultar-canvas" height="auto" style="border: solid 0px blue; height: 90%; width: 100%"></canvas>
                  </div>
                  <div class="chart tab-pane" id="documentos" style="position: relative;">
                    <canvas id="documentos-canvas" height="auto" style="border: solid 0px green; height: 90%; width: 100%"></canvas>
                  </div>
                  <div class="chart tab-pane" id="asistencias" style="position: relative;">
                    <canvas id="asistencias-canvas" height="auto" style="border: solid 0px yellow; height: 90%; width: 100%"></canvas>
                  </div>
                  <div class="chart tab-pane" id="seguimiento" style="position: relative;">
                    <canvas id="seguimiento-canvas" height="auto" style="border: solid 0px orange; height: 90%; width: 100%"></canvas>
                  </div>
                </div>-->
              </div>
                <div class="container">
                  <div class="container contenedor">
                    <h1>Ingresa el número de orden</h1>
                      <div class="busqueda input-group input-group-sm mb-3">
                          <input type="text" id="b_orden" placeholder="Buscar orden" class="form-control">
                          <input type="submit" class="btn btn-primary" value="Buscar">
                      </div>
                    <div id="resultadoBusqueda"></div>
                  <div class="table-responsive hidden">
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
                        <?php while( !$rs->EOF ): ?>
                        <tr>
                          <td><?php echo $rs->fields['ORDEN'] ?></td>
                          <td><?php echo $rs->fields['MODELO'];?></td>
                          <td><?php echo $rs->fields['PEDIDO'];?> </td>
                          <td><?php echo $rs->fields['CLIENTE']; ?></td>
                          <td>
                            <form method="POST">
                              <input type="hidden" name="id_eliminar" value="<?php  ?>">
                              <!--<input type="submit" href="/admin/propiedades/borrar.php" class="boton boton-rojo" value="Generar">-->
                            </form>
                            <a href="Habilitacion/modelos/wallmart.php?id=<?php echo $rs->fields['ORDEN'];  ?>" class="btn btn-secondary">Generar Base</a>
                            <a href="/admin/propiedades/actualizar.php?id=<?php  ?>" class="btn btn-warning">Generar PDF</a>
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
<script>
  function buscar() {
      var textoBusqueda = $("input#b_orden").val();
      if (textoBusqueda != "") {
        $.post("buscar.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
            $("#resultadoBusqueda").html(mensaje);
        }); 
      } else { 
        ("#resultadoBusqueda").html('');
	    };
  };
</script>

<?php
    include "includes/footer.php";
?>
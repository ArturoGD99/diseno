<?php
    $orden=$_POST['ORDEN'];
    $criterios="FF.ID_CLIENTE= FC.ID_CLIENTE AND FF.ID_PRENDA=FP.ID_PRENDA AND FF.ORDEN=${'ORDEN'} AND FC.ID_CLIENTE=FM.ID_CLIENTE AND FC.ID_CLIENTE= FF.ID_CLIENTE AND FF.ID_MARCA=FM.ID_MARCA LIMIT 20";
    $rs=$query->Consultar($campos,$tablas,$criterios,""); 
    while( !$rs->EOF ): 
?>
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
        <a href="Habilitacion/modelos/wallmart.php?id=<?php echo $rs->fields['ORDEN'];  ?>" class="btn btn-primary">Generar Base</a>
        <a href="/admin/propiedades/actualizar.php?id=<?php  ?>" class="btn btn-secondary">Generar PDF</a>
    </td>
</tr>
<?php $rs->MoveNext();
    endwhile; 
?>
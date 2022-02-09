<div class="container" style="height: auto;"><br>
    <div class="row justify-content-center">
        <div class="col-md-8"><div align="center"><img src="dist/img/Logo.png" class="img-fluid"/></div><br>
            <div class="card">
                <div class="card-header">Ingreso</div>
                <div class="card-body">
                    <form>
                        <div class="form-group row">
                            <label for="tusuario" class="col-md-4 col-form-label text-md-right">Usuario</label>
                            <div class="col-md-6">
                                <input type="text" id="tusuario" class="form-control" name="nusuario" style="text-transform: none" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
                            <div class="col-md-6">
                                <input type="password" id="tpass" class="form-control" name="npass">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="remember"> Recuerdame</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-4">
                            <button id="btn_ingresar" type="button" class="btn btn-primary" onclick="Validar_Sesion();">Ingresar</button>
                            <a href="#" class="btn btn-link"> Olvidaste la contraseña?</a>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function Validar_Sesion(){
        $('#btn_ingresar').blur();

        if($('#tusuario').val()==''){
            ($('#tusuario').focus());
            return;
        }
        if($('#tpass').val()==''){
            $('#tpass').focus();
            return;
        }

        var param = 'user='+$.trim($('#tusuario').val());
        param+= '&pwd='+$.trim($('#tpass').val());

        $.ajax({
            url: 'valida_sesion.php',
            cache:false,
            type: 'POST',
            data:param,
            success: function(data){
                if(data.search('Ingreso')!=-1){
                    res = data.split('|');
                    $('#id_user').val(res[0]);
                    $('#id_perfil').val(res[1]);
                    //swal({title: "*****BIENVENIDO*****", text: res[2], timer: 3000, showConfirmButton: false});
                    if(res[0]!='2')
						swal({title: "*****BIENVENIDO*****", text: res[2], timer: 3000, showConfirmButton: false});
					else
						swal({title: "BIENVENIDA MI AMOR.!!", text: res[2], timer: 4000, showConfirmButton: false});
                    $('#dv_login').hide();
                    $('#dv_menu').show();
                    $('#info_user').html(res[2]);
                    //$('#msg').html("Bienvenido(a): "+res[2]);//+", Usuario: "+res[3]
                    /*if($('#tp_us').val() == 2){
                        $('#administracion').hide();
                        $('#dv_admin').hide();
                        $('#dv_admin').removeClass('topbar-divider d-none d-sm-block');
                        ('#transporte').hide();
                        $('#div_transp').hide();
                        $('#div_transp').removeClass('topbar-divider d-none d-sm-block');
                        $('#pagos').hide();
                        $('#dv_pagos').hide();
                        $('#dv_pagos').removeClass('topbar-divider d-none d-sm-block');
                    }else if($('#tp_us').val() == 3){
                        $('#administracion').hide();
                        $('#dv_admin').hide();
                        $('#dv_admin').removeClass('topbar-divider d-none d-sm-block');
                        $('#transporte').hide();
                        $('#div_transp').hide();
                        $('#div_transp').removeClass('topbar-divider d-none d-sm-block');
                        $('#entregas').hide();
                        $('#dv_entregas').hide();
                        $('#dv_entregas').removeClass('topbar-divider d-none d-sm-block');
                    }else if($('#tp_us').val() == 4){
                        $('#transporte').hide();
                        $('#div_transp').hide();
                        $('#div_transp').removeClass('topbar-divider d-none d-sm-block');
                    }else if($('#tp_us').val() == 5){
                        $('#administracion').hide();
                        $('#dv_admin').hide();
                        $('#dv_admin').removeClass('topbar-divider d-none d-sm-block');
                        $('#entregas').hide();
                        $('#dv_entregas').hide();
                        $('#dv_entregas').removeClass('topbar-divider d-none d-sm-block');
                        $('#pagos').hide();
                        $('#dv_pagos').hide();
                        $('#dv_pagos').removeClass('topbar-divider d-none d-sm-block');
                        $('#consultar').hide();
                        $('#dv_consultas').hide();
                        $('#dv_consultas').removeClass('topbar-divider d-none d-sm-block');
                    }*/
                }else if(data.search('Inactivo')!=-1){
                    $('#tusuario').val('');
                    $('#tpass').val('');
                    swal({title: "Usuario inactivo.!!", timer: 1000, showConfirmButton: false});
                    $('#trfc').focus();
                }else if(data.search('Incorrecto')!=-1){
                    $('#tusuario').val('');
                    $('#tpass').val('');
                    swal({title: "Datos Incorrectos.!!", timer: 1000, showConfirmButton: false});
                    $('#tusuario').focus();
                }
            },
            error: function (request, status, error) {alert(request.responseText);}
        });
    }
</script>


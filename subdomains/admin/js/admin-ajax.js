$(document).ready(function() {


    $('#crear-admin').on('submit', function(e) {
        e.preventDefault();
        var datos = $(this).serializeArray();
        let password_viejo = $('#contraseña').val();
        let password_nuevo = $('#repetir-contraseña').val();

        if (password_nuevo != password_viejo) {
            alertify.error('Las contraseñas deben ser iguales');
        } else {
            $.ajax({
                type: $(this).attr('method'),
                data: datos,
                url: $(this).attr('action'),
                dataType: 'json',
                success: function(data) {
                    var resultado = data;
                    if (resultado.respuesta == 'exito') {
                        alertify.success('Administrador agregado exitosamente');
                        $("#crear-admin input").each(function(index, element) {
                            element.value = "";
                        });
                    } else {
                        alertify.error('Verifique que haya llenado los campos correctamente');
                    }
                }
            })
        }
    });

    $('#editar-admin').on('submit', function(e) {
        e.preventDefault();
        let password_viejo = $('#contraseña').val();
        let password_nuevo = $('#repetir-contraseña').val();
        let datos = $(this).serializeArray();
        if (password_nuevo != password_viejo) {
            alertify.error('Las contraseñas deben ser iguales');
        } else {
            $.ajax({
                type: $(this).attr('method'),
                data: datos,
                url: $(this).attr('action'),
                dataType: 'json',
                success: function(data) {
                    var resultado = data;
                    if (resultado.respuesta == 'exito') {
                        alertify.success('Administrador editado exitosamente');
                    } else {
                        alertify.error('Verifique que haya llenado los campos correctamente');
                    }
                }
            })
        }
    });


    $('#crear-reunion').on('submit', function(e) {
        e.preventDefault();
        var datos = $(this).serializeArray();
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data) {
                var resultado = data;
                if (resultado.respuesta == 'exito') {
                    alertify.success('Reunión creada exitosamente');
                    $("#crear-reunion input").each(function(index, element) {
                        element.value = "";
                    });
                } else if (resultado.respuesta == 'cambiado') {
                    alertify.success('Reunion editada exitosamente');
                } else {
                    alertify.error('Verifique que haya llenado los campos correctamente');
                }
            }
        })

    });


    $('#crear-modulo').on('submit', function(e) {
        e.preventDefault();
        var datos = $(this).serializeArray();
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data) {
                var resultado = data;
                if (resultado.respuesta == 'exito') {
                    alertify.success('Modulo creado exitosamente');
                    $("#crear-modulo input").each(function(index, element) {
                        element.value = "";
                        element.removeAttribute('checked');
                    });
                } else if (resultado.respuesta == 'cambiado') {
                    alertify.success('Modulo editado exitosamente');
                } else {
                    alertify.error('Verifique que haya llenado los campos correctamente');
                }
            }
        })
    });

    $('#crear-casoExito').on('submit', function(e) {
        e.preventDefault();
        var datos = $(this).serializeArray();
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data) {
                var resultado = data;
                if (resultado.respuesta == 'exito') {
                    alertify.success('Caso de éxito creado exitosamente');
                    $("#crear-casoExito input").each(function(index, element) {
                        element.value = "";
                    });
                } else if (resultado.respuesta == 'cambiado') {
                    alertify.success('Caso de éxito editado exitosamente');
                } else {
                    alertify.error('Verifique que haya llenado los campos correctamente');
                }
            }
        })
    });

    $('#crear-noticia').on('submit', function(e) {
        e.preventDefault();
        var datos = $(this).serializeArray();
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data) {
                var resultado = data;
                if (resultado.respuesta == 'exito') {
                    alertify.success('Noticia creada exitosamente');
                    $("#crear-noticia input").each(function(index, element) {
                        element.value = "";
                    });
                } else if (resultado.respuesta == 'cambiado') {
                    alertify.success('Noticia editada exitosamente');
                } else {
                    alertify.error('Verifique que haya llenado los campos correctamente');
                }
            }
        })
    });

    $('#crear-telefono').on('submit', function(e) {
        e.preventDefault();
        var datos = $(this).serializeArray();
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data) {
                var resultado = data;
                if (resultado.respuesta == 'exito') {
                    alertify.success('Telefono creado exitosamente');
                    $("#crear-telefono input").each(function(index, element) {
                        element.value = "";
                    });
                } else if (resultado.respuesta == 'cambiado') {
                    alertify.success('Telefono editado exitosamente');
                } else {
                    alertify.error('Verifique que haya llenado los campos correctamente');
                }
            }
        })
    });


    $('.borrar_registro').on('click', function(e) {
        e.preventDefault();
        var temp = $(this);
        alertify.confirm("¿Realmente desea eliminar el registro?",
            function() {
                let id = temp.attr('data-id');
                let tipo = temp.attr('data-tipo');
                $.ajax({
                    type: 'post',
                    data: {
                        'id': id,
                        'tabla': tipo,
                    },
                    url: 'eliminar.php',
                    success: function(data) {
                        var resultado = JSON.parse(data);
                        if (resultado.respuesta == 'exito') {
                            alertify.success('Registro eliminado exitosamente');
                            jQuery('[data-id="' + resultado.id_eliminado + '"]').parents('tr').remove()
                        } else {
                            alertify.error('Hubo un error');
                        }
                    }
                })
            },
            function() {
                alertify.error('Cancelado');
            });
    });

    $('.borrar_registro_telefono').on('click', function(e) {
        e.preventDefault();
        var temp = $(this);
        alertify.confirm("¿Realmente desea eliminar el registro?",
            function() {
                let id = temp.attr('data-id');
                let tipo = temp.attr('data-tipo');
                var telefono = temp.attr('data-id2');
                $.ajax({
                    type: 'post',
                    data: {
                        'id': id,
                        'tabla': tipo,
                        'telefono': telefono
                    },
                    url: 'eliminar.php',
                    success: function(data) {
                        var resultado = JSON.parse(data);
                        if (resultado.respuesta == 'exito') {
                            alertify.success('Registro eliminado exitosamente');
                            jQuery('[data-id="' + resultado.id_eliminado + '"][data-id2="' + resultado.telefono_eliminado + '"]').parents('tr').remove()
                        } else {
                            alertify.error("error");
                        }
                    }
                })
            },
            function() {
                alertify.error('Cancelado');
            });

    });


    $('#login-admin').on('submit', function(e) {
        e.preventDefault();
        var datos = $(this).serializeArray();
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data) {
                var resultado = data;
                if (resultado.respuesta == 'si') {
                    alertify.success('Login exitoso');
                    setTimeout(function() {
                        window.location.href = 'admin_area.php';
                    }, 800);
                } else if (resultado.respuesta == 'faltan_datos') {
                    alertify.error('llene todos los campos');
                } else {
                    alertify.error("Usuario o Contraseña equivocados");
                }
            }
        })
    });


    $('a [href="#"]').on('click', function(e) {
      e.preventDefault();
    });

});

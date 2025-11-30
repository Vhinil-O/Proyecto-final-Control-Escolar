<?php
include '../../app/config.php';
include '../../admin/layout/parte1.php';
include '../../app/controllers/docentes/listado_de_docentes.php';
include '../../app/controllers/niveles/listadoNiveles.php';
include '../../app/controllers/grados/listado_de_grados.php';
include '../../app/controllers/materias/listado_de_materias.php';
include '../../app/controllers/docentes/listado_de_asignaciones.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Listado del personal docente asignado a las materias</h1>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Docentes asignados</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_asignacion">
                                    <i class="bi bi-plus-square"></i> Asignar materias
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Nro</th>
                                        <th style="text-align: center;">Nombres del usuario</th>
                                        <th style="text-align: center;">NUE</th>
                                        <th style="text-align: center;">Fecha de nacimiento</th>
                                        <th style="text-align: center;">Correo</th>
                                        <th style="text-align: center;">Estado</th>
                                        <th style="text-align: center;">Materias asignadas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador_docente = 0;
                                    foreach ($docentes as $docente) {
                                        $id_docente = $docente['id_docente'];
                                        $contador_docente++;
                                    ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $contador_docente; ?></td>
                                            <td><?= $docente['nombres'] . " " . $docente['apellidos']; ?></td>
                                            <td><?= $docente['NUE_NUA']; ?></td>
                                            <td><?= $docente['fecha_nacimiento']; ?></td>
                                            <td><?= $docente['email']; ?></td>
                                            <td style="text-align: center;">
                                                <?php
                                                if ($docente['estado'] == 1) {
                                                    echo "ACTIVO";
                                                } else {
                                                    echo "INACTIVO";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <center>
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_materias<?= $id_docente; ?>">
                                                        <i class="bi bi-postcard"></i> Ver materias
                                                    </button>
                                                </center>
                                                <div class="modal fade" id="modal_materias<?= $id_docente; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"><b>Materias asignadas</b></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <b>Docente: <?= $docente['apellidos'] . " " . $docente['nombres'] ?></b>
                                                                <hr>
                                                                <table class="table table-bordered table-striped table-sm table-hover">
                                                                    <tr>
                                                                        <th>
                                                                            <center>Nro</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Nivel</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Turno</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Grado</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Paralelo</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Materia</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Acciones</center>
                                                                        </th>
                                                                    </tr>
                                                                    <?php
                                                                    $contador = 0;
                                                                    foreach ($asignaciones as $asignacione) {
                                                                        $id_asignacion = $asignacione['id_asignacion'];
                                                                        if ($asignacione['docente_id'] == $id_docente) {
                                                                            $contador = $contador + 1;
                                                                    ?>
                                                                            <tr>
                                                                                <td>
                                                                                    <center><?= $contador ?></center>
                                                                                </td>
                                                                                <td>
                                                                                    <center><?= $asignacione['nivel'] ?></center>
                                                                                </td>
                                                                                <td>
                                                                                    <center><?= $asignacione['turno'] ?></center>
                                                                                </td>
                                                                                <td>
                                                                                    <center><?= $asignacione['curso'] ?></center>
                                                                                </td>
                                                                                <td>
                                                                                    <center><?= $asignacione['paralelo'] ?></center>
                                                                                </td>
                                                                                <td>
                                                                                    <center><?= $asignacione['nombre_materia'] ?></center>
                                                                                </td>
                                                                                <td style="text-align: center;">
                                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                                        <a data-toggle="modal" data-target="#modal_edicion<?= $id_asignacion; ?>"
                                                                                            type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                                                                        <div class="modal fade" id="modal_edicion<?= $id_asignacion; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                            <div class="modal-dialog">
                                                                                                <div class="modal-content">
                                                                                                    <div class="modal-header">
                                                                                                        <h5 class="modal-title" id="exampleModalLabel"><b>Asignación de materias</b></h5>
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                            <span aria-hidden="true">&times;</span>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                    <form action="<?= APP_URL; ?>/app/controllers/docentes/update_asignaciones.php" method="post">
                                                                                                        <div class="modal-body">
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12">
                                                                                                                    <div class="form-group">
                                                                                                                        <input type="text" name="id_asignacion" value="<?= $id_asignacion ?>" hidden>
                                                                                                                        <label style="text-align: left !important;" for="">Nivel</label>
                                                                                                                        <select class="form-control" name="id_nivel" id="">
                                                                                                                            <?php
                                                                                                                            foreach ($niveles as $nivele) {
                                                                                                                                $id_nivel = $nivele['id_nivel']; ?>
                                                                                                                                <option value="<?= $id_nivel ?>" <?= $nivele['id_nivel'] == $asignacione['nivel_id'] ? 'selected' : ""; ?>><?= $nivele['nivel'] . " - " . $nivele['turno'] ?></option>
                                                                                                                            <?php
                                                                                                                            }
                                                                                                                            ?>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-12">
                                                                                                                    <div class="form-group">
                                                                                                                        <label for="">Grados</label>
                                                                                                                        <select class="form-control" name="id_grado" id="">
                                                                                                                            <?php
                                                                                                                            foreach ($grados as $grado) {
                                                                                                                                $id_grado = $grado['id_grado']; ?>
                                                                                                                                <option value="<?= $id_grado ?>" <?= $grado['id_grado'] == $asignacione['grado_id'] ? 'selected' : ""; ?>><?= $grado['curso'] . " | " . $grado['paralelo'] ?></option>
                                                                                                                            <?php
                                                                                                                            }
                                                                                                                            ?>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-12">
                                                                                                                    <div class="form-group">
                                                                                                                        <label for="">Materias</label>
                                                                                                                        <select class="form-control" name="id_materia" id="">
                                                                                                                            <?php
                                                                                                                            foreach ($materias as $materia) {
                                                                                                                                $id_materia = $materia['id_materia']; ?>
                                                                                                                                <option value="<?= $id_materia ?>" <?= $materia['id_materia'] == $asignacione['materia_id'] ? 'selected' : ""; ?>><?= $materia['nombre_materia'] ?></option>
                                                                                                                            <?php
                                                                                                                            }
                                                                                                                            ?>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="modal-footer">
                                                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                                                            <button type="submit" class="btn btn-success">Modificar</button>
                                                                                                        </div>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <form action="<?= APP_URL; ?>/app/controllers/docentes/delete_asignaciones.php" onclick="preguntar<?= $id_asignacion; ?>(event)" method="post" id="miFormulario<?= $id_asignacion; ?>">
                                                                                            <input type="text" name="id_asignacion" value="<?= $id_asignacion ?>" hidden>
                                                                                            <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px;"><i class="bi bi-trash"></i></button>
                                                                                        </form>
                                                                                        <script>
                                                                                            function preguntar<?= $id_asignacion; ?>(event) {
                                                                                                event.preventDefault();
                                                                                                Swal.fire({
                                                                                                    title: 'Eliminar registro',
                                                                                                    text: "Desea eliminar este registro?",
                                                                                                    icon: 'question',
                                                                                                    showDenyButton: true,
                                                                                                    confirmButtonText: 'Eliminar',
                                                                                                    confirmButtonColor: '#a5161d',
                                                                                                    denyButtonColor: '#270a0a',
                                                                                                    denyButtonText: 'Cancelar'
                                                                                                }).then((result) => {
                                                                                                    if (result.isConfirmed) {
                                                                                                        var form = $('#miFormulario<?= $id_asignacion; ?>');
                                                                                                        form.submit();
                                                                                                    }
                                                                                                })
                                                                                            }
                                                                                        </script>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include '../layout/parte2.php';
include '../../layout/mensajes.php';
?>

<script>
    $(function() {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                processing: "Procesando...",
                lengthMenu: "Mostrar _MENU_ registros",
                zeroRecords: "No se encontraron resultados",
                emptyTable: "Ningún dato disponible en esta tabla",
                infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                infoFiltered: "(filtrado de un total de _MAX_ registros)",
                search: "Buscar:",
                loadingRecords: "Cargando...",
                paginate: {
                    first: "Primero",
                    last: "Último",
                    next: "Siguiente",
                    previous: "Anterior",
                },
                aria: {
                    sortAscending: ": Activar para ordenar la columna de manera ascendente",
                    sortDescending: ": Activar para ordenar la columna de manera descendente",
                },
                buttons: {
                    copy: "Copiar",
                    colvis: "Visibilidad",
                    collection: "Colección",
                    colvisRestore: "Restaurar visibilidad",
                    copyKeys: "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                    copySuccess: {
                        1: "Copiada 1 fila al portapapeles",
                        _: "Copiadas %ds fila al portapapeles",
                    },
                    copyTitle: "Copiar al portapapeles",
                    csv: "CSV",
                    excel: "Excel",
                    pageLength: {
                        "-1": "Mostrar todas las filas",
                        _: "Mostrar %d filas",
                    },
                    pdf: "PDF",
                    print: "Imprimir",
                    renameState: "Cambiar nombre",
                    updateState: "Actualizar",
                    createState: "Crear Estado",
                    removeAllStates: "Remover Estados",
                    removeState: "Remover",
                    savedStates: "Estados Guardados",
                    stateRestore: "Estado %d",
                },
                autoFill: {
                    cancel: "Cancelar",
                    fill: "Rellene todas las celdas con <i>%d<\/i>",
                    fillHorizontal: "Rellenar celdas horizontalmente",
                    fillVertical: "Rellenar celdas verticalmente",
                },
                decimal: ",",
                searchBuilder: {
                    add: "Añadir condición",
                    button: {
                        0: "Constructor de búsqueda",
                        _: "Constructor de búsqueda (%d)",
                    },
                    clearAll: "Borrar todo",
                    condition: "Condición",
                    conditions: {
                        date: {
                            before: "Antes",
                            between: "Entre",
                            empty: "Vacío",
                            equals: "Igual a",
                            notBetween: "No entre",
                            not: "Diferente de",
                            after: "Después",
                            notEmpty: "No Vacío",
                        },
                        number: {
                            between: "Entre",
                            equals: "Igual a",
                            gt: "Mayor a",
                            gte: "Mayor o igual a",
                            lt: "Menor que",
                            lte: "Menor o igual que",
                            notBetween: "No entre",
                            notEmpty: "No vacío",
                            not: "Diferente de",
                            empty: "Vacío",
                        },
                        string: {
                            contains: "Contiene",
                            empty: "Vacío",
                            endsWith: "Termina en",
                            equals: "Igual a",
                            startsWith: "Empieza con",
                            not: "Diferente de",
                            notContains: "No Contiene",
                            notStartsWith: "No empieza con",
                            notEndsWith: "No termina con",
                            notEmpty: "No Vacío",
                        },
                        array: {
                            not: "Diferente de",
                            equals: "Igual",
                            empty: "Vacío",
                            contains: "Contiene",
                            notEmpty: "No Vacío",
                            without: "Sin",
                        },
                    },
                    data: "Data",
                    deleteTitle: "Eliminar regla de filtrado",
                    leftTitle: "Criterios anulados",
                    logicAnd: "Y",
                    logicOr: "O",
                    rightTitle: "Criterios de sangría",
                    title: {
                        0: "Constructor de búsqueda",
                        _: "Constructor de búsqueda (%d)",
                    },
                    value: "Valor",
                },
                searchPanes: {
                    clearMessage: "Borrar todo",
                    collapse: {
                        0: "Paneles de búsqueda",
                        _: "Paneles de búsqueda (%d)",
                    },
                    count: "{total}",
                    countFiltered: "{shown} ({total})",
                    emptyPanes: "Sin paneles de búsqueda",
                    loadMessage: "Cargando paneles de búsqueda",
                    title: "Filtros Activos - %d",
                    showMessage: "Mostrar Todo",
                    collapseMessage: "Colapsar Todo",
                },
                select: {
                    cells: {
                        1: "1 celda seleccionada",
                        _: "%d celdas seleccionadas",
                    },
                    columns: {
                        1: "1 columna seleccionada",
                        _: "%d columnas seleccionadas",
                    },
                    rows: {
                        1: "1 fila seleccionada",
                        _: "%d filas seleccionadas",
                    },
                },
                thousands: ".",
                datetime: {
                    previous: "Anterior",
                    hours: "Horas",
                    minutes: "Minutos",
                    seconds: "Segundos",
                    unknown: "-",
                    amPm: ["AM", "PM"],
                    months: {
                        0: "Enero",
                        1: "Febrero",
                        10: "Noviembre",
                        11: "Diciembre",
                        2: "Marzo",
                        3: "Abril",
                        4: "Mayo",
                        5: "Junio",
                        6: "Julio",
                        7: "Agosto",
                        8: "Septiembre",
                        9: "Octubre",
                    },
                    weekdays: {
                        0: "Dom",
                        1: "Lun",
                        2: "Mar",
                        4: "Jue",
                        5: "Vie",
                        3: "Mié",
                        6: "Sáb",
                    },
                    next: "Próximo",
                },
                editor: {
                    close: "Cerrar",
                    create: {
                        button: "Nuevo",
                        title: "Crear Nuevo Registro",
                        submit: "Crear",
                    },
                    edit: {
                        button: "Editar",
                        title: "Editar Registro",
                        submit: "Actualizar",
                    },
                    remove: {
                        button: "Eliminar",
                        title: "Eliminar Registro",
                        submit: "Eliminar",
                        confirm: {
                            _: "¿Está seguro de que desea eliminar %d filas?",
                            1: "¿Está seguro de que desea eliminar 1 fila?",
                        },
                    },
                    error: {
                        system: 'Ha ocurrido un error en el sistema (<a target="\\" rel="\\ nofollow" href="\\">Más información&lt;\\\/a&gt;).<\/a>',
                    },
                    multi: {
                        title: "Múltiples Valores",
                        restore: "Deshacer Cambios",
                        noMulti: "Este registro puede ser editado individualmente, pero no como parte de un grupo.",
                        info: "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, haga clic o pulse aquí, de lo contrario conservarán sus valores individuales.",
                    },
                },
                info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                stateRestore: {
                    creationModal: {
                        button: "Crear",
                        name: "Nombre:",
                        order: "Clasificación",
                        paging: "Paginación",
                        select: "Seleccionar",
                        columns: {
                            search: "Búsqueda de Columna",
                            visible: "Visibilidad de Columna",
                        },
                        title: "Crear Nuevo Estado",
                        toggleLabel: "Incluir:",
                        scroller: "Posición de desplazamiento",
                        search: "Búsqueda",
                        searchBuilder: "Búsqueda avanzada",
                    },
                    removeJoiner: "y",
                    removeSubmit: "Eliminar",
                    renameButton: "Cambiar Nombre",
                    duplicateError: "Ya existe un Estado con este nombre.",
                    emptyStates: "No hay Estados guardados",
                    removeTitle: "Remover Estado",
                    renameTitle: "Cambiar Nombre Estado",
                    emptyError: "El nombre no puede estar vacío.",
                    removeConfirm: "¿Seguro que quiere eliminar %s?",
                    removeError: "Error al eliminar el Estado",
                    renameLabel: "Nuevo nombre para %s:",
                },
                infoThousands: ".",
            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": [{
                    extend: "collection",
                    text: 'Reportes',
                    orientation: 'landscape',
                    buttons: [{
                        text: 'Copiar',
                        extend: 'copy',
                    }, {
                        extend: 'pdf'
                    }, {
                        extend: 'csv'
                    }, {
                        extend: 'excel'
                    }, {
                        text: 'Imprimir',
                        extend: 'print'
                    }]
                },
                {
                    extend: 'colvis',
                    text: 'Visor de columnas',
                    collectionLayout: 'fixed three-column'
                }
            ]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<div class="modal fade" id="modal_asignacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Asignación de materias</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= APP_URL; ?>/app/controllers/docentes/create_asignaciones.php" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Docentes</label>
                                <select class="form-control" name="id_docente" id="">
                                    <?php
                                    foreach ($docentes as $docente) {
                                        $id_docente = $docente['id_docente']; ?>
                                        <option value="<?= $id_docente ?>"><?= $docente['apellidos']; ?> <?= $docente['nombres'] ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nivel</label>
                                <select class="form-control" name="id_nivel" id="">
                                    <?php
                                    foreach ($niveles as $nivele) {
                                        $id_nivel = $nivele['id_nivel']; ?>
                                        <option value="<?= $id_nivel ?>"><?= $nivele['nivel'] . " - " . $nivele['turno'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Grados</label>
                                <select class="form-control" name="id_grado" id="">
                                    <?php
                                    foreach ($grados as $grado) {
                                        $id_grado = $grado['id_grado']; ?>
                                        <option value="<?= $id_grado ?>"><?= $grado['curso'] . " |  " . $grado['paralelo'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Materias</label>
                                <select class="form-control" name="id_materia" id="">
                                    <?php
                                    foreach ($materias as $materia) {
                                        $id_materia = $materia['id_materia']; ?>
                                        <option value="<?= $id_materia ?>"><?= $materia['nombre_materia'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
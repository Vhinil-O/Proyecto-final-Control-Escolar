<?php
$id_grado_get = $_GET['id_grado'];
$id_docente_get = $_GET['id_docente'];
$id_materia_get = $_GET['id_materia'];

include '../../app/config.php';
include '../../admin/layout/parte1.php';
include '../../app/controllers/estudiantes/listado_de_estudiantes.php';
include '../../app/controllers/calificaciones/listado_de_calificaciones.php';

$curso = "";
$paralelo = "";
foreach ($estudiantes as $estudiante) {
    if ($id_grado_get == $estudiante['id_grado']) {
        $curso = $estudiante['curso'];
        $paralelo = $estudiante['paralelo'];
    }
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h2>Listado de estudiantes del grado: <?= $curso ?> paralelo: <?= $paralelo ?></h2>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Estudiantes registrados</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Nro</th>
                                        <th style="text-align: center;">Apellidos y nombres</th>
                                        <th style="text-align: center;">Nivel</th>
                                        <th style="text-align: center;">Turno</th>
                                        <th style="text-align: center;">Grado</th>
                                        <th style="text-align: center;">Grupo</th>
                                        <th style="text-align: center;">1er trimestre</th>
                                        <th style="text-align: center;">2do trimestre</th>
                                        <th style="text-align: center;">3er trimestre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador_estudiante = 0;
                                    foreach ($estudiantes as $estudiante) {
                                        if ($id_grado_get == $estudiante['id_grado']) {
                                            $id_estudiante = $estudiante['id_estudiante'];
                                            $contador_estudiante++;
                                    ?>
                                            <tr>
                                                <td style="text-align: center;">
                                                    <input type="text" id="estudiante_<?= $contador_estudiante ?>" hidden value="<?= $id_estudiante ?>">
                                                    <?= $contador_estudiante; ?>
                                                </td>
                                                <td><?= $estudiante['apellidos'] . " " . $estudiante['nombres']; ?></td>
                                                <td style="text-align: center;"><?= $estudiante['nivel']; ?></td>
                                                <td style="text-align: center;"><?= $estudiante['turno']; ?></td>
                                                <td style="text-align: center;"><?= $estudiante['curso']; ?></td>
                                                <td style="text-align: center;"><?= $estudiante['paralelo']; ?></td>

                                                <?php
                                                $nota1 = "";
                                                $nota2 = "";
                                                $nota3 = "";
                                                foreach ($calificaciones as $calificacione) {
                                                    if (($calificacione['docente_id'] == $id_docente_get) &&
                                                        ($calificacione['estudiante_id'] == $id_estudiante) &&
                                                        ($calificacione['materia_id'] == $id_materia_get)
                                                    ) {
                                                        $nota1 = $calificacione['nota1'];
                                                        $nota2 = $calificacione['nota2'];
                                                        $nota3 = $calificacione['nota3'];
                                                    }
                                                }
                                                ?>
                                                <td>
                                                    <input style="text-align: center;" value="<?= $nota1; ?>" id="nota1_<?= $contador_estudiante ?>" type="number" class="form-control">
                                                </td>
                                                <td>
                                                    <input style="text-align: center;" value="<?= $nota2; ?>" id="nota2_<?= $contador_estudiante ?>" type="number" class="form-control">
                                                </td>
                                                <td>
                                                    <input style="text-align: center;" value="<?= $nota3; ?>" id="nota3_<?= $contador_estudiante ?>" type="number" class="form-control">
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    $contador_estudiante = $contador_estudiante;
                                    ?>

                                </tbody>
                            </table>
                            <hr>
                            <button class="btn btn-primary btn-lg" id="btn_guardar">Guardar notas</button>
                            <script>
                                $('#btn_guardar').click(function() {
                                    var n = '<?= $contador_estudiante ?>';
                                    var i = 1;
                                    var id_docente = '<?= $id_docente_get ?>'
                                    var id_materia = '<?= $id_materia_get ?>'


                                    for (i = 1; i <= n; i++) {
                                        var a = '#nota1_' + i;
                                        var nota1 = $(a).val();

                                        var b = '#nota2_' + i;
                                        var nota2 = $(b).val();

                                        var c = '#nota3_' + i;
                                        var nota3 = $(c).val();

                                        var d = '#estudiante_' + i;
                                        var id_estudiante = $(d).val();
                                        //alert("id_docente:"+id_docente+"-id_estudiante:"+id_estudiante+" - "+"id_materia:"+id_materia);
                                        var url = "../../app/controllers/calificaciones/create.php";
                                        $.get(url, {
                                            id_docente: id_docente,
                                            id_estudiante: id_estudiante,
                                            id_materia: id_materia,
                                            nota1: nota1,
                                            nota2: nota2,
                                            nota3: nota3
                                        }, function(datos) {

                                            $('#respuesta').html(datos);
                                            //alert("mando calificaciones");
                                        });
                                    }
                                    Swal.fire({
                                        position: "top-end",
                                        icon: "success",
                                        title: "Se actualizó las notas",
                                        showConfirmButton: false,
                                        timer: 3000
                                    });
                                });
                            </script>
                            <div id="respuesta" hidden></div>
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
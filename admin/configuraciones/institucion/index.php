<?php
  include '../../../app/config.php';
  include '../../../admin/layout/parte1.php';
  include '../../../app/controllers/configuraciones/institucion/listadoInstituciones.php'


?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
     <br>
    <div class="content">
      <div class="container">
        <div class="row">
          <h1>Listado de Instituciones</h1>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Instituciones Registradas</h3>
                <div class="card-tools">
                  <a href="create.php" class="btn btn-secondary">
                    <i class="bi bi-plus-square"></i>
                    Agregar una Institucion</a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Nro</th>
                <th>Nombres de la Institucion</th>
                <th>Logo</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Celular</th>
                <th>Email</th>
                <th>Fecha de creacion</th>
                <th>Estado</th>
                <th>Acciones</th>

              </tr>
            </thead>
            <tbody>
              <?php
              $contadorInstucion = 0;
                foreach ($instituciones as $institucione) {
                  $id_config_institucion = $institucione['id_config_institucion'];
                  $contadorinstitucion++;
                  ?>
                  <tr>
                    <td><?= $contadorinstitucion; ?></td>
                    <td><?= $institucione['nombre_institucion'] ?></td>
                    <td><?= $institucione['logo'] ?></td>
                    <td><?= $institucione['direccion'] ?></td>
                    <td><?= $institucione['telefono'] ?></td>
                    <td><?= $institucione['celular'] ?></td>
                    <td><?= $institucione['email'] ?></td>
                    <td><?= $institucione['fyh_creacion'] ?></td>
                    <td><?= $institucione['estado'] ?></td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="show.php?id=<?= $id_config_institucion ?>" type="button" class="btn btn-secondary btn-sm"><i class="bi bi-eye-fill"></i>
                        </a>
                        <a href="edit.php?id=<?= $id_config_institucion ?>" type="button" class="btn btn-secondary btn-sm btn-success"><i class="bi bi-pencil-fill"></i>
                        </a>
                        <form id="deleteForm<?= $id_config_institucion ?>" action="<?= APP_URL;?>/app/controllers/usuarios/deleteUsuarios.php" method="post">
                          <input type="text" name="idUser" value="<?= $id_config_institucion ?>" hidden>
                          <button type="button" class="btn btn-secondary btn-sm btn-danger delete-btn" style="border-radius: 0px 5px 0px" data-id="<?= $id_config_institucion ?>">
                            <i class="bi bi-trash3-fill"></i>
                          </button>
                        </form>
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
    include '../../../admin/layout/parte2.php';
    include '../../../layout/mensajes.php';
  ?>

  <script>
  $(function () {
    $("#example1").DataTable({
      "pageLength": 5,
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "pageLength": 5,
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    // SweetAlert para eliminar roles
    $('.delete-btn').click(function() {
      const roleId = $(this).data('id');
      
      Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esta acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, ¡eliminar!',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
          // Envía el formulario correspondiente
          $('#deleteForm' + roleId).submit();
        }
      });
    });
  });
</script>

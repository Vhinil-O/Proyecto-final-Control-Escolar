<?php
  include '../../app/config.php';
  include '../../admin/layout/parte1.php';

  include '../../app/controllers/roles/listadoRoles.php';

if ($rol_usuario_sesion != 1) {
    //echo "No tienes permisos para ver esta página.";
    // Opcional: Redirigirlo a su panel correspondiente
    header('Location: '.APP_URL.'/login'); 
    exit;
}
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
     <br>
    <div class="content">
      <div class="container">
        <div class="row">
          <h1>Listado de roles</h1>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Roles Registrados</h3>
                <div class="card-tools">
                  <a href="create.php" class="btn btn-secondary">
                    <i class="bi bi-plus-square"></i>
                    Crear Nuevo Rol</a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Nro</th>
                <th>Nombre del Rol</th>
                <th>Accion</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $contadorRol = 0;
                foreach ($roles as $role) {
                  $idRol = $role['id_rol'];
                  $contadorRol++;
                  ?>
                  <tr>
                    <td><?= $contadorRol; ?></td>
                    <td><?= $role['nombre_rol'] ?></td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="show.php?id=<?= $idRol ?>" type="button" class="btn btn-secondary btn-sm"><i class="bi bi-eye-fill"></i>
                        </a>
                        <a href="edit.php?id=<?= $idRol ?>" type="button" class="btn btn-secondary btn-sm btn-success"><i class="bi bi-pencil-fill"></i>
                        </a>
                        <form id="deleteForm<?= $idRol ?>" action="<?= APP_URL;?>/app/controllers/roles/deleteRoles.php" method="post">
                          <input type="text" name="idRol" value="<?= $idRol ?>" hidden>
                          <button type="button" class="btn btn-secondary btn-sm btn-danger delete-btn" style="border-radius: 0px 5px 0px" data-id="<?= $idRol ?>">
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
    include '../../admin/layout/parte2.php';
    include '../../layout/mensajes.php';
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
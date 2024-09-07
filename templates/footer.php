<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">

</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo $url_base;?>templates/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo $url_base;?>templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo $url_base;?>templates/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $url_base;?>templates/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo $url_base;?>templates/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo $url_base;?>templates/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo $url_base;?>templates/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo $url_base;?>templates/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo $url_base;?>templates/plugins/chart.js/Chart.min.js"></script>



<!-- DataTables  & Plugins -->
<script src="<?php echo $url_base;?>templates/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $url_base;?>templates/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo $url_base;?>templates/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo $url_base;?>templates/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo $url_base;?>templates/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo $url_base;?>templates/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo $url_base;?>templates/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo $url_base;?>templates/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo $url_base;?>templates/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo $url_base;?>templates/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo $url_base;?>templates/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo $url_base;?>templates/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Page specific script -->
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "paging": true,
        "pageLength": 5, 
        "buttons": [
            'copy',
            {
                extend: 'csv',
                className: 'button-class',
                exportOptions: {
                    columns: ':not(:last-child)' 
                }
            },
            {
                extend: 'excel',
                className: 'button-class',
                exportOptions: {
                    columns: ':not(:last-child)' 
                }
            },
            {
                extend: 'pdf',
                className: 'button-class',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            },
            'print',
            'colvis'
        ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});

$(document).ready(function() {
    $('#example2').DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "paging": true,
        "pageLength": 5,
        "lengthMenu": [5, 10, 15, 20, 30, 50, 100],
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros por página",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
});

</script>

<script>
function borrar(id) {

    Swal.fire({
        title: 'Desea borrar el registro?',
        showCancelButton: true,
        confirmButtonText: 'Sí, borrar',

    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            window.location = "index.php?id=" + id;
        }
    })

}
</script>

<script>
  $(document).ready(function() {
    $(".nav-item a").click(function() {
    
      $(".nav-item a").not("#modulos-link").removeClass("active");

    
      $(this).addClass("active");

      if ($(this).closest(".nav-treeview").length) {
        $(this).closest(".nav-treeview").parent().addClass("menu-open");
      }
    });

  
    var currentUrl = window.location.href;

   
    $(".nav-sidebar .nav-link").each(function() {
  
      if (currentUrl.indexOf($(this).attr("href")) !== -1) {
        
        $(this).addClass("active");

   
        if ($(this).closest(".nav-item").length) {
          $(this).closest(".nav-item").addClass("active");
        }

   
        if ($(this).closest(".nav-treeview").length) {
          $(this).closest(".nav-treeview").parent().addClass("menu-open");
        }
      }
    });
  });
</script>


</body>

</html>
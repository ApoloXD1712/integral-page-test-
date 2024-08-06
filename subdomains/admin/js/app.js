
  $(function () {

    $("#registros").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "language": {
        paginate: {
          next: "siguiente",
          previous: "anterior",
          last: "ultimo",
          first: "primero"
        },
        info: "Mostrando _START_ a _END_ de _TOTAL_",
        emptyTable: "No hay registros",
        infoEmpty: '0 registros',
        search: "Buscar:",
        zeroRecords: "no se encontraron coincidencias",
        infoFiltered: "(filtrado entre _MAX_ resultados)",
        lengthMenu: "Mostrando _MENU_ resultados por página"
      }
    });
  });

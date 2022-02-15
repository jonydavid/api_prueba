
<!DOCTYPE html>
<html>
<head>
    <title>Ciudades || API</title>
    <meta charset="utf-8" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.css"> 
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
      .offer-alert 
      {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        width: 100%;
        text-align: left;
        padding: 1rem 0;
        background-color: #0a1f44;
        color: #ffff;
        font-size: .9rem;
        z-index: 1;
      }

      .table-container
      {
        margin-top: 45px;
      }
    </style>
</head>
<body>
  <div class="offer-alert">
      <ul class="nav justify-content-end">
          <a class="nav-link btn btn-default" onclick="cerrar_sesion()">Cerrar Sesión</a>
      </ul>
    </div>
    <div class="container table-container">
        <div class="row">
          <div class="col-12 mt-5">
              <table id="dataGRID" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered border-0 responsive" width="100%"></table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            if(sessionStorage.getItem('user') == null)
            {
              location.href ='./index.html';
            }

             dataGRID = $("#dataGRID").DataTable(
             {
              "language":
              {
                "search":"Buscar",
                "lengthMenu": "Mostrar _MENU_ items",
                "emptyTable": "No hay datos",
                "info": "_START_ al _END_ de _TOTAL_",
                "infoEmpty": "Sin registros<span class='hidden-xs'> para mostrar</span>",
                "infoFiltered": '(Filtado de _MAX_ registros)',
                "thousands": ".",
                "loadingRecords": "Cargando...",
                "zeroRecords": "<span class='hidden-xs'>No se encontraron registros coincidentes</span><span class='visible-xs'>Sin registros</span>",
                "processing": "",
                "paginate":
                { 
                  "next"    : '>',
                  "previous"  : '<'
                }
              },
              "data": [],
              "columnDefs": 
              [
                  //{ "targets": [0], "visible": false }
              ],
              "columns": [
                  { "sTitle": "id" },
                  { "sTitle": "Ciudad" },
                  { "sTitle": "Pais" }
              ]
          });

          listar_datos();
        });

        function listar_datos()
        {
          $.ajax(
            {
              url: 'http://127.0.0.1/api_prueba/api.php', //reemplazar por la ubicacion del archivo.
              type: 'GET',
              success: function(datos, textStatus, jQxhr)
              {
                dataGRID.clear().draw();

                dataGRID.rows.add(datos).draw();
              },
              error: function(jqXhr, textStatus, errorThrown)
              {  
                Swal.fire('Error. Intentelo nuevamente');
              }
            });
        }

        function cerrar_sesion()
        {
          sessionStorage.removeItem('user');
          location.href ='./index.html';
        }
    </script>
</body>
</html>
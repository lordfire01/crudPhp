<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ejemplo con bootstrap</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

	<!-- jQuery and JS bundle w/ Popper.js -->
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

	<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"></script>

	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript"></script>

	<script src="resources/js/jquery.mask.js" type="text/javascript"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	  	<a class="navbar-brand" href="#">Navbar</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>

  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
    		<ul class="navbar-nav mr-auto">
      			<li class="nav-item active">
        			<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      			</li>
      			<li class="nav-item">
        			<a class="nav-link" href="#">Link</a>
      			</li>
      			<li class="nav-item dropdown">
        			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          				Dropdown
        			</a>
        			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
          				<a class="dropdown-item" href="#">Action</a>
          				<a class="dropdown-item" href="#">Another action</a>
          				<div class="dropdown-divider"></div>
          				<a class="dropdown-item" href="#">Something else here</a>
        			</div>
      			</li>
      			<li class="nav-item">
        			<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      			</li>
    		</ul>
    		<form class="form-inline my-2 my-lg-0">
      			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      			<button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    		</form>
  		</div>
	</nav>

	<div class="container-fluid" style="margin-top: 30px;">
		<div class="row">
			<div class="col-sm-12 text-right">
				<button class="btn btn-primary btn-sm" id="nuevo">Agregar</button>
			</div>
		</div><br>

		<table id="myTable" class="table table-bordered table-hover table-sm">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>A. Paterno</th>
					<th>A. Materno</th>
					<th>Fecha Nacimiento</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				
			</tbody>
		</table>
		<div class="modal" tabindex="-1" id="modalFormulario">
		  	<div class="modal-dialog modal-lg">
		    	<div class="modal-content">
		      		<div class="modal-header">
		       	 		<h5 class="modal-title" id="titulo"></h5>
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          			<span aria-hidden="true">&times;</span>
		        		</button>
		      		</div>
		      		<div class="modal-body">
		      			<form id="formulario">
		      				<input type="hidden" name="row[id]" id="row_id">
		      				<div class="container">
		      					<div class="row">
		      						<div class="col-sm-12">
		      							<div class="form-group">
		      								<label>Nombre</label>
		      								<input type="text" name="row[nombre]" id="row_nombre" class="form-control">
		      							</div>
		      							<div class="form-group">
		      								<label>A. Paterno</label>
		      								<input type="text" name="row[paterno]" id="row_paterno" class="form-control">
		      							</div>
		      							<div class="form-group">
		      								<label>A. Materno</label>
		      								<input type="text" name="row[materno]" id="row_materno" class="form-control">
		      							</div>
		      							<div class="form-group">
		      								<label>Fecha Nacimiento</label>
		      								<input type="text" name="row[fecha_nacimiento]" id="row_fecha_nacimiento" class="form-control date">
		      							</div>
		      							<div class="form-group">
		      								<label>Telefono</label>
		      								<input type="text" name="row[telefono]" id="row_telefono" class="form-control phone">
		      							</div>
		      						</div>
		      					</div>
		      				</div>
		      			</form>
		      		</div>
		      		<div class="modal-footer">
		        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
		        		<button type="button" class="btn btn-primary" id="guardar">Guardar</button>
		      		</div>
		    	</div>
		  	</div>
		</div>

		<div class="modal" id="modale" tabindex="-1">
	        <div class="modal-dialog modal-lg">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <h5 class="modal-title">Eliminar</h5>
	                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                        <span aria-hidden="true">&times;</span>
	                    </button>
	                </div>
	                <div class="modal-body">
	                    <div class="container">
	                        <div class="row">
	                            <form id="forme">
	                                <input type="hidden" name="row[id]" id="rowide">
	                                <input type="hidden" name="row[nombre]" id="rowne">
	                            </form>
	                            <div class="col col-sm-12">
	                                <label id="nombree"></label>
	                            </div>
	                            <div class="col col-sm-12">
	                                <button type="button" class="btn btn-danger" id="eliminar">Eliminar</button>
	                            </div>
	                        </div>
	                    </div> 
	                </div>
	                <div class="modal-footer">
	                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	
	<script type="text/javascript">

		toastr.options = {
		  	"closeButton": false,
		  	"debug": false,
		  	"newestOnTop": false,
		  	"progressBar": false,
		  	"positionClass": "toast-top-right",
		  	"preventDuplicates": false,
		  	"onclick": null,
		  	"showDuration": "300",
		  	"hideDuration": "1000",
		  	"timeOut": "5000",
		  	"extendedTimeOut": "1000",
		  	"showEasing": "swing",
		  	"hideEasing": "linear",
		  	"showMethod": "fadeIn",
		  	"hideMethod": "fadeOut"
		}

		$(document).ready(function() {

			$('.phone').mask('(000) 000-00-00', {'placeholder': '(000) 000-00-00'});
			$('.date').mask('00-00-0000', {'placeholder': 'DD-MM-AAAA'});


			var miTabla = $('#myTable').DataTable({
				"ajax": 'crud.php?tipo=listado',
				"columns": [
					{"data": "nombre"},
					{"data": "paterno"},
					{"data": "materno"},
					{"data": "fecha_nacimiento"},
					{"data": "acciones"}
				],
				"language": {
					sProcessing: "Procesando...",
					sLengthMenu: "Mostrar _MENU_ registros",
					sZeroRecords: "No se encontraron resultados",
					sEmptyTable: "Ningún dato disponible en esta tabla",
					sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
					sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
					sInfoPostFix: "",
					sSearch: "Buscar:",
					sUrl: "",
					sInfoThousands: ",",
					sLoadingRecords: "Cargando...",
					oPaginate: {
						sFirst: "Primero",
						sLast: "Último",
						sNext: "Siguiente",
						sPrevious: "Anterior"
					},
					oAria: {
						sSortAscending: ": Activar para ordenar la columna de manera ascendente",
						sSortDescending: ": Activar para ordenar la columna de manera descendente"
					}
				}
			});

			$('#nuevo').on('click', function() {
				$(':input').val('')
				$('#titulo').html('Creando Alumno Nuevo');
				$("#modalFormulario").modal('show');
			});

			$('#guardar').on('click', function() {
				var data = $('#formulario').serialize();
				$.ajax({
					url: 'crud.php',
					type: 'POST',
					dataType: 'json',
					data: data,
					success: function(r) {
						if (r.exito) {
							$('#modalFormulario').modal('hide');
							toastr['success'](r.mensaje);
							miTabla.ajax.reload();
						} else {
							for(var i = 0; i < r.mensaje.length; i++)
							{
								toastr['error'](r.mensaje[i]);
							}
						}
					}
				});
			});

			$('#eliminar').on('click', function()
            {
                var data = $('#forme').serialize();
                $.ajax({
                    url: 'crud.php',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success:function(r)
                    {
                        $('#modale').modal('hide');
                        if (r.exito)
                        {
                            toastr['success'](r.mensaje);
                            miTabla.ajax.reload(); 
                        }
                        else
                        {
                            toastr['error'](r.mensaje);
                        }
                    }
                });
            });
		});

		function eliminar(id)
        {
            $.ajax({
                url: 'crud.php',
                type: 'GET',
                dataType: 'json',
                data: {tipo: 'eliminar', id: id},
                success: function(r)
                {
                    if (r.exito)
                    {
                        $('#rowide').val(r.row.id);
                        $('#rowne').val('eliminar');
                        $('#nombree').html('¿Eliminar a '+r.row.nombre+' '+r.row.apellidop+' '+r.row.apellidom+'?');
                        $('#modale').modal('show');
                    }
                    else
                    {
                        toastr['error'](r.mensaje);
                    }
                }
            })
        }

		function editar(id) {
			$('#titulo').html('Editar Alumno');
			$(':input').val('');
			$.ajax({
				url: 'crud.php',
				type: 'GET',
				dataType: 'json',
				data: {tipo: 'show', id: id},
				success: function(r) {
					if (r.exito) {
						$('#row_nombre').val(r.row.nombre);
						$('#row_paterno').val(r.row.paterno);
						$('#row_materno').val(r.row.materno);
						$('#row_fecha_nacimiento').val(r.row.fecha_nacimiento);
						$('#row_id').val(r.row.id)
						$('#modalFormulario').modal('show');
					} else {
						toastr["error"](r.mensaje);
					}
				}
			});
			
		}		
	</script>
</body>
</html>

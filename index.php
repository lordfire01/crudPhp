<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ejemplo con bootstrap</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

	<!-- jQuery and JS bundle w/ Popper.js -->
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

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
		      								<input type="text" name="row[fecha_nacimiento]" id="row_fecha_nacimiento" class="form-control">
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
		        		<button type="button" class="btn btn-primary" id="guardar">Guardar cambios</button>
		      		</div>
		    	</div>
		  	</div>
		</div>
	</div>

	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLabel">Segundo Modal</h5>
	      		</div>
	      		<div class="modal-body">
	        		Mostrando segundo modal
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-secondary" id="close">Close</button>
	        		<button type="button" class="btn btn-primary">Save changes</button>
	      		</div>
	    	</div>
	  	</div>
	</div>
</body>
</html>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/
	font-awesome/5.11.2/css/all.min.css">

    <title>Hello, world!</title>
  </head>
  <body>
	<div class="container">
		<div class="row">
		<div class="col-md-12 mt-5">
			<h1 class="text-center">Codeigniter Ajax Crud</h1>
			<hr style="background-color: black; color: black; neight: 1px;">	
		</div>
	</div>
		<div class="row">
			<div class="col-md-12 mt-2">
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
				Add Records
				</button>

				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="" method="post" id="form">
							<div class="form-group">
								<label for="">Name</label>
								<input type="text" id="name" class="form-control">
							</div>
							<div class="form-grpup">
								<label for="">Email</label>
								<input type="email" id="email" class="form-control">
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" id="add">Add</button>
					  </div>
					</div>
				 </div>
		     </div>

			 <!--Edit Modal -->
			 <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Modal</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="" method="post" id="edit_form">
							 <input type="hidden" id="edit_modal_id" value="">
							<div class="form-group">
								<label for="">Name</label>
								<input type="text" id="edit_name" class="form-control">
							</div>
							<div class="form-grpup">
								<label for="">Email</label>
								<input type="email" id="edit_email" class="form-control">
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" id="update">Update</button>
					  </div>
					</div>
				 </div>
		     </div>


	    </div>
    </div>
	<div class="row">
		<div class="col-md-12 mt-3">
			<table class="table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody id="tbodoy">

				</tbody>
			</table>
		</div>
	</div>
</div>

	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
	 integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
	  crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
	 integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
	  crossorigin="anonymous"></script>
	  <script> src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"</script>
	  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
	  <script>
		  $(document).on("click","#add", function(e){
			  e.preventDefault();

			  var name = $("#name").val();
			  var email = $("#email").val();

			  if (name == "" || email == "" ) {
				  alert("both field is required");
			  }else{


			  $.ajax({
				url: "<?php echo base_url(); ?>insert",
				type: "post",
				dataType: "json",
				data: {
					name: name,
					email: email
				},
				success: function(data){
					fetch();
					

					if (data.responce == "success") {
						toastr["success"](data.responce); 

						toastr.options = {
						"closeButton": true,
						"debug": false,
						"newestOnTop": false,
						"progressBar": true,
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
					 $('#exampleModal').modal('hide');
					}else{
						toastr["error"](data.message); 

						toastr.options = {
						"closeButton": true,
						"debug": false,
						"newestOnTop": false,
						"progressBar": true,
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
					}

				}
			  });
			  }
			  $("#form")[0].reset();
		  });

		  function fetch(){
			  $.ajax({
				  url: "<?php echo base_url();?>fetch",
				  type: "post",
				  datatype: "json"
				  success: function(data){
					 var tbody = "";
					 var i = "1";

					 for(var key in data){
						 tbody += "<tr>";
						 tbody += "<td>"= i++ +"</td>";
						 tbody += "<td>"= data[key]['name'] +"</td>";
						 tbody += "<td>"= data[key]['email'] +"</td>";
						 tbody += '<td>
						  <a href="#" id="del" class="btn btn-sm btn-outline-danger"
						  value="${data[key]['id']}"><i
						  class="fas fa-trash-alt"></i></a>
						  <a href="#" id="edit" class="btn btn-sm btn-outline-danger"
						   value="${data[key]['id']}"><i
						  class="fas fa-edit"></i></a>
						 </td>';
						 tbody += "</tr>";
					 }
					 $("#tbody").html(tbody);
				  }
			  });
		  }
		  fetch();

		  $(document).on("click", "#del", function(e){
			e.preventDefault();

			var del_id = $(this).attr("value");

			if (del_id == "") {
				alert("Delete id required");
			}else{
			 const swalWithBootstrapButtons = Swal.mixin({
				customClass: {
					confirmButton: 'btn btn-success',
					cancelButton: 'btn btn-danger mr-2'
				},
				buttonsStyling: false
				})

				swalWithBootstrapButtons.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Yes, delete it!',
				cancelButtonText: 'No, cancel!',
				reverseButtons: true
				}).then((result) => {
				if (result.value) {

					$.ajax({
						url: "<?php echo base_url();?>Delete",
						type: "post",
						dataType: "json",
						data: {
							del_id: del_id
						},
						success: function(data){
							fetch();
							if (date.responce == "success") {
								swalWithBootstrapButtons.fire(
									'Deleted!',
									'Your file has been deleted.',
									'success'
									)
							}
						}
					}); 

					
				} else if (
					/* Read more about handling dismissals below */
					result.dismiss === Swal.DismissReason.cancel
				) {
					swalWithBootstrapButtons.fire(
					'Cancelled',
					'Your imaginary file is safe :)',
					'error'
					)
				}
				})

			}
		  });
		  $(document).on("click","#edit", function(e){
			  e.preventDefault();

			  var edit_id = $(this).attr("value");

			  if (edit_id == ""){
				  alert("Edit id required");
			  }else{
				  $.ajax({
					  url: "<?php echo base_url(); ?>edit",
					  type: "post",
					  dataType: "json",
					  data: {
						  edit_id: edit_id
					  },
					  success: function(data){
						  if (data.responce == "success") {
							$('#editModal').modal('show');
							$("#edit_modal_id").val(data.post.id);
							$("#edit_name").val(data.post.name);
							$("#edit_email").val(data.post.email);
						  }else{
							toastr["error"](data.message); 

							toastr.options = {
							"closeButton": true,
							"debug": false,
							"newestOnTop": false,
							"progressBar": true,
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
						  }
					  }
				  });
			  }
		  });

		  $(document).on("click", "#update", function(e){
			e.preventDefault();

			var edit_id = $("#edit_modal_id").val();
			var edit_name = $("#edit_name").val();	
			var edit_email = $("#edit_email").val();	

			if (edit_id == ""|| edit_name == "" || edit_email == "") {
				alert("both field is required");
			}else{
				$.ajax({
					url:"<?php echo base_url(); ?>update",
					type: "post",
					dataType: "json",
					data: {
						edit_id: edit_id,
						edit_name:edit_name,
						edit_email:edit_email
					},
					success: function(data){
						fetch();
						if (data.responce == "success") {
							$('#editModal').modal('hide');
							toastr["success"](data.message); 

							toastr.options = {
							"closeButton": true,
							"debug": false,
							"newestOnTop": false,
							"progressBar": true,
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
						}else{
							toastr["error"](data.message); 

							toastr.options = {
							"closeButton": true,
							"debug": false,
							"newestOnTop": false,
							"progressBar": true,
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
						}
					}
				});
			}
		  });
	  </script>
  </body>
</html> 
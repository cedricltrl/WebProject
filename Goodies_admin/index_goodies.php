<html>
	<head>
		<title>Webslesson Demo - PHP PDO Ajax CRUD with Data Tables and Bootstrap Modals</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<style>
			body
			{
				margin:0;
				padding:0;
				background-color:#f1f1f1;
			}
			.box
			{
				width:1270px;
				padding:20px;
				background-color:#fff;
				border:1px solid #ccc;
				border-radius:5px;
				margin-top:25px;
			}
		</style>
	</head>
	<body>
		<div class="container box">
			<h1 align="center">Goodies Admin</h1>
			<br />
			<div class="table-responsive">
				<br />
				<div align="right">
					<button type="button" id="add_button" data-toggle="modal" data-target="#goodiesModal" class="btn btn-info btn-lg">Add</button>
				</div>
				<br /><br />
				<table id="goodies_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="5%">goodies_photo</th>
						<th width="5%">goodies_name</th>
 			       <th width="5%">goodies_description</th>
 			       <th width="5%">goodies_in_stock</th>
 			       <th width="5%">goodies_category</th>
 			       <th width=5%>order_number</th>
 			       <th width="5%">goodies_cost</th>
 			       <th width="5%">Edit</th>
 			       <th width="5%">Delete</th>
						</tr>
					</thead>
				</table>

			</div>
		</div>
	</body>
</html>

<div id="goodiesModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="goodies_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Goodies</h4>
				</div>
				<div class="modal-body">
					<label for="goodies_name">Enter goodies_name</label>
					<input type="text" name="goodies_name" id="goodies_name" class="form-control" />
					<br />
					<label for="goodies_description">Enter goodies_description</label>
					<input type="text" name="goodies_description" id="goodies_description" class="form-control" />
					<br />
					<br />
		      <label for="goodies_in_stock">goodies_in_stock</label>
		      <input type="text" name="goodies_in_stock" id="goodies_in_stock" class="form-control" />
		      <br />
		      <label for="goodies_category">goodies_category</label>
		      <input type="text" name="goodies_category" id="goodies_category" class="form-control" />
		      <br />
		      <label for="order_number">order_number</label>
		      <input type="text" name="order_number" id="order_number" class="form-control" />
		      <br />
					<label>Select goodies Image</label>
					<input type="file" name="goodies_photo" id="goodies_photo" />
					<span id="goodies_uploaded_image"></span>
		      <label for="goodies_cost">goodies_cost</label>
		      <input type="text" name="goodies_cost" id="goodies_cost" class="form-control" />
		      <br />
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id_goodies" id="id_goodies" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	$('#add_button').click(function(){
		$('#goodies_form')[0].reset();
		$('.modal-title').text("Add Goodies");
		$('#action').val("Add");
		$('#operation').val("Add");
			$('#goodies_uploaded_image').html('');
	});

	var dataTable = $('#goodies_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetch_goodies.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 3, 4],
				"orderable":false,
			},
		],

	});

	$(document).on('submit', '#goodies_form', function(event){
		event.preventDefault();
		var goodiesid = $('#goodies_id').val();
		var goodiesname = $('#goodies_name').val();
		var goodiesdescription = $('#goodies_description').val();
		var goodiesinstock = $('#goodies_in_stock').val();
		var goodiescategory = $('#goodies_category').val();
		var ordernumber = $('#order_number').val();
		var goodiescost = $('#goodies_cost').val();
		if(null !== extension)
		{
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
			{
				alert("Invalid Image File");
				$('#goodies_photo').val('');
				return false;
			}
		}
		if(null!==(goodiesname && goodiesdescription && goodiesinstock && goodiescategory && ordernumber && goodiescost ))
		//	if(goodies_name != '' && goodies_description != ''&& goodies_in_stock != ''&& goodies_category != ''&& order_number != ''&& goodies_cost != ''&& password != '')
		{
			$.ajax({
				url:"insert_goodies.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					//Popup avec les data insérées
					alert(data);
					$('#goodies_form')[0].reset();
					$('#goodiesModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Both Fields are Required");
		}
	});

	$(document).on('click', '.update', function(){
		var id_goodies = $(this).attr("goodies_id");
		$.ajax({
			url:"fetch_single_goodies.php",
			method:"POST",
			data:{id_goodies:id_goodies},
			dataType:"json",
			success:function(data)
			{
				$('#goodiesModal').modal('show');
				$('#goodies_name').val(data.goodies_name);
				$('#goodies_description').val(data.goodies_description);
				$('#goodies_in_stock').val(data.goodies_in_stock);
		    $('#goodies_category').val(data.goodies_category);
		    $('#order_number').val(data.order_number);
				$('#goodies_uploaded_image').html(data.goodies_photo);
		    $('#goodies_cost').val(data.goodies_cost);
				$('.modal-title').text("Edit goodies");
				$('#id_goodies').val(id_goodies);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});

	$(document).on('click', '.delete', function(){
		var id_goodies = $(this).attr("goodies_id");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"delete_goodies.php",
				method:"POST",
				data:{id_goodies:id_goodies},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;
		}
	});


});
</script>

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
			<h1 align="center">picture Admin</h1>
			<br />
			<div class="table-responsive">
				<br />
				<div align="right">
					<button type="button" id="add_button" data-toggle="modal" data-target="#pictureModal" class="btn btn-info btn-lg">Add</button>
				</div>
				<br /><br />
				<table id="picture_data" class="table table-bordered table-striped">
					<thead>
						<tr>
						<th width="5%">picture_name</th>
 			       <th width="5%">picture_description</th>
 			       <th width="5%">likes</th>
 			       <th width="5%">Edit</th>
 			       <th width="5%">Delete</th>
						</tr>
					</thead>
				</table>

			</div>
		</div>
	</body>
</html>

<div id="pictureModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="picture_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add picture</h4>
				</div>
				<div class="modal-body">
					<label for="picture_name">Enter picture_name</label>
					<input type="text" name="picture_name" id="picture_name" class="form-control" />
					<br />
					<label for="picture_description">Enter picture_description</label>
					<input type="text" name="picture_description" id="picture_description" class="form-control" />
					<br />
					<br />
		      <label for="likes">likes</label>
		      <input type="text" name="likes" id="likes" class="form-control" />
		      <br />
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id_picture" id="id_picture" />
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
		$('#picture_form')[0].reset();
		$('.modal-title').text("Add Goodies");
		$('#action').val("Add");
		$('#operation').val("Add");
			$('#picture_uploaded_image').html('');
	});

	var dataTable = $('#picture_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetch_picture.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 3, 4],
				"orderable":false,
			},
		],

	});

	$(document).on('submit', '#picture_form', function(event){
		event.preventDefault();
		var pictureid = $('#picture_id').val();
		var picturename = $('#picture_name').val();
		var picturedescription = $('#picture_description').val();
		var likes = $('#likes').val();
		if(null!==(picturename && picturedescription && likes ))
		//	if(picture_name != '' && picture_description != ''&& likes != ''&& picture_category != ''&& order_number != ''&& picture_cost != ''&& password != '')
		{
			$.ajax({
				url:"insert_picture.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					//Popup avec les data insérées
					alert(data);
					$('#picture_form')[0].reset();
					$('#pictureModal').modal('hide');
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
		var id_picture = $(this).attr("picture_id");
		$.ajax({
			url:"fetch_single_picture.php",
			method:"POST",
			data:{id_picture:id_picture},
			dataType:"json",
			success:function(data)
			{
				$('#pictureModal').modal('show');
				$('#picture_name').val(data.picture_name);
				$('#picture_description').val(data.picture_description);
				$('#likes').val(data.likes);
				$('.modal-title').text("Edit picture");
				$('#id_picture').val(id_picture);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});

	$(document).on('click', '.delete', function(){
		var id_picture = $(this).attr("picture_id");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"delete_picture.php",
				method:"POST",
				data:{id_picture:id_picture},
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

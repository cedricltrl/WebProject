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
					<button type="button" id="add_button" data-toggle="modal" data-target="#commentaryModal" class="btn btn-info btn-lg">Add</button>
				</div>
				<br /><br />
				<table id="commentary_data" class="table table-bordered table-striped">
					<thead>
						<tr>
						<th width="5%">comment</th>
 			       <th width="5%">Edit</th>
 			       <th width="5%">Delete</th>
						</tr>
					</thead>
				</table>

			</div>
		</div>
	</body>
</html>

<div id="commentaryModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="commentary_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Goodies</h4>
				</div>
				<div class="modal-body">
					<label for="comment">Enter comment</label>
					<input type="text" name="comment" id="comment" class="form-control" />
					<br />
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id_commentary" id="id_commentary" />
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
		$('#commentary_form')[0].reset();
		$('.modal-title').text("Add commentary");
		$('#action').val("Add");
		$('#operation').val("Add");
	});

	var dataTable = $('#commentary_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetch_commentary.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 3, 4],
				"orderable":false,
			},
		],

	});

	$(document).on('submit', '#commentary_form', function(event){
		event.preventDefault();
		var commentaryid = $('#commentary_id').val();
		var commentaryname = $('#comment').val();
		if(null!==(commentaryname))
		//	if(comment != '' && commentary_description != ''&& commentary_in_stock != ''&& commentary_category != ''&& order_number != ''&& commentary_cost != ''&& password != '')
		{
			$.ajax({
				url:"insert_commentary.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					//Popup avec les data insérées
					alert(data);
					$('#commentary_form')[0].reset();
					$('#commentaryModal').modal('hide');
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
		var id_commentary = $(this).attr("commentary_id");
		$.ajax({
			url:"fetch_single_commentary.php",
			method:"POST",
			data:{id_commentary:id_commentary},
			dataType:"json",
			success:function(data)
			{
				$('#commentaryModal').modal('show');
				$('#comment').val(data.comment);
				$('.modal-title').text("Edit commentary");
				$('#id_commentary').val(id_commentary);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});

	$(document).on('click', '.delete', function(){
		var id_commentary = $(this).attr("commentary_id");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"delete_commentary.php",
				method:"POST",
				data:{id_commentary:id_commentary},
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

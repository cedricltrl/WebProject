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
			<h1 align="center">activity Admin</h1>
			<br />
			<div class="table-responsive">
				<br />
				<div align="right">
					<button type="button" id="add_button" data-toggle="modal" data-target="#activityModal" class="btn btn-info btn-lg">Add</button>
				</div>
				<br /><br />
				<table id="activity_data" class="table table-bordered table-striped">
					<thead>
						<tr>
						<th width="5%">activity_name</th>
 			       <th width="5%">activity_dated</th>
 			       <th width="5%">activity_description</th>
 			       <th width="5%">activity_time</th>
 			       <th width=5%>activity_cost</th>
 			       <th width="5%">recurring</th>
 			       <th width="5%">Edit</th>
 			       <th width="5%">Delete</th>
						</tr>
					</thead>
				</table>

			</div>
		</div>
	</body>
</html>

<div id="activityModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="activity_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add activity</h4>
				</div>
				<div class="modal-body">
					<label for="activity_name">Enter activity_name</label>
					<input type="text" name="activity_name" id="activity_name" class="form-control" />
					<br />
					<label for="activity_dated">Enter activity_dated</label>
					<input type="text" name="activity_dated" id="activity_dated" class="form-control" />
					<br />
					<br />
		      <label for="activity_description">activity_description</label>
		      <input type="text" name="activity_description" id="activity_description" class="form-control" />
		      <br />
		      <label for="activity_time">activity_time</label>
		      <input type="text" name="activity_time" id="activity_time" class="form-control" />
		      <br />
		      <label for="activity_cost">activity_cost</label>
		      <input type="text" name="activity_cost" id="activity_cost" class="form-control" />
		      <br />
		      <label for="recurring">recurring</label>
		      <input type="text" name="recurring" id="recurring" class="form-control" />
		      <br />
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id_activity" id="id_activity" />
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
		$('#activity_form')[0].reset();
		$('.modal-title').text("Add activity");
		$('#action').val("Add");
		$('#operation').val("Add");
	});

	var dataTable = $('#activity_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetch_activity.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 3, 4],
				"orderable":false,
			},
		]

	});

	$(document).on('submit', '#activity_form', function(event){
		event.preventDefault();
		var activityid = $('#activity_id').val();
		var activityname = $('#activity_name').val();
		var activitydescription = $('#activity_dated').val();
		var activityinstock = $('#activity_description').val();
		var activitycategory = $('#activity_time').val();
		var activitycost = $('#activity_cost').val();
		var recurring = $('#recurring').val();
		if(null!==(activityname && activitydescription && activityinstock && activitycategory && activitycost && recurring ))
		//	if(activity_name != '' && activity_dated != ''&& activity_description != ''&& activity_time != ''&& activity_cost != ''&& recurring != ''&& password != '')
		{
			$.ajax({
				url:"insert_activity.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					//Popup avec les data insérées
					alert(data);
					$('#activity_form')[0].reset();
					$('#activityModal').modal('hide');
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
		var id_activity = $(this).attr("activity_id");
		$.ajax({
			url:"fetch_single_activity.php",
			method:"POST",
			data:{id_activity:id_activity},
			dataType:"json",
			success:function(data)
			{
				$('#activityModal').modal('show');
				$('#activity_name').val(data.activity_name);
				$('#activity_dated').val(data.activity_dated);
				$('#activity_description').val(data.activity_description);
		    $('#activity_time').val(data.activity_time);
		    $('#activity_cost').val(data.activity_cost);
		    $('#recurring').val(data.recurring);
				$('.modal-title').text("Edit activity");
				$('#id_activity').val(id_activity);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});

	$(document).on('click', '.delete', function(){
		var id_activity = $(this).attr("activity_id");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"delete_activity.php",
				method:"POST",
				data:{id_activity:id_activity},
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

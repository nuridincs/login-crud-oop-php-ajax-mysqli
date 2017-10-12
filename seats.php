<title>Reservation</title>
<script src="assets/js/bootstrap/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">
<script src="assets/js/bootstrap/bootstrap.min.js"></script>
<link rel="stylesheet" href="assets/bower_components/bootstrap-sweetalert/dist/sweetalert.css">
<script src="assets/bower_components/bootstrap-sweetalert/dist/sweetalert.min.js"></script>
<head>
</head>
<script>
function act(id){     
	swal({
	  title: "Are you sure choice Seats " + id +"?",
	  text: "You will not be able to recover this imaginary file!",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonClass: "btn-danger",
	  confirmButtonText: "Yes, delete it!",
	  cancelButtonText: "No, cancel plx!",
	  closeOnConfirm: false,
	  closeOnCancel: false
	},
	function(isConfirm) {
	  if (isConfirm) {
	    swal("Deleted!", "Your imaginary file has been deleted.", "success");
	  } else {
	    swal("Cancelled", "Your imaginary file is safe :)", "error");
	  }
	});
}
</script>
</head>

<body>
	<div class="container" align="center">
		<div>
			<h1>Reservation</h1>
		</div>
		<?php
			$rows = 20; // define number of rows
			$cols = 5;// define number of columns
			$icon = "<img src='assets/img/seat.png' width='40'>";
			$no = 1;

			echo "<table class='' border='0' width=500>";

			for($tr = 1; $tr <= $rows; $tr++){
			    echo "<tr>";
			        for($td = 1; $td <= $cols; $td++){
		        		if($td == 3){
		        			echo "<td onclick='' id=''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
		        		}else{
		        			echo "<td onclick='act(this.id)' data-toggle='modal' data-target='#myModal1' id='$tr - $td'>" .$icon. "<br><span>Seat ". $no . "</span></td>";	
		        		}
		        		$no++;
			        }
			    echo "</tr>";
			}

			echo "</table>";
		?>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Booking Ticket</h4>
			</div>
			<div class="modal-body">
				<div>Are you sure reservation ?</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Booking</button>
			</div>
		</div>

		</div>
	</div>
</body>
</html>

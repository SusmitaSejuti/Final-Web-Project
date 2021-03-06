<?php
session_start();
?>
<?php
if (!isset($_GET["rid"])) {
	header("location:home.php");
} else {
	$curdate = date("Y/m/d");
	include('db.php');
	$id = $_GET['rid'];

	$sql = "Select * from roombook where id = '$id'";
	$re = mysqli_query($con, $sql);
	while ($row = mysqli_fetch_array($re)) {
		$title = $row['Title'];
		$fname = $row['FName'];
		$lname = $row['LName'];
		$email = $row['Email'];
		$nat = $row['National'];
		$country = $row['Country'];
		$Phone = $row['Phone'];
		$troom = $row['TRoom'];
		$nroom = $row['NRoom'];
		$bed = $row['Bed'];
		$non = $row['NRoom'];
		$meal = $row['Meal'];
		$cin = $row['cin'];
		$cout = $row['cout'];
		$sta = $row['stat'];
		$days = $row['nodays'];
	}
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Administrator </title>
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	<link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
	<link href="assets/css/custom-styles.css" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
	<div id="wrapper">
		<nav class="navbar navbar-default top-navbar" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="home.php">MAIN MENU </a>
			</div>
			</ul>
		</nav>
		<nav class="navbar-default navbar-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav" id="main-menu">

					<li>
						<a href="settings.php"><i class="fa fa-dashboard"></i>Room Status</a>
					</li>
					<li>
						<a href="room.php"><i class="fa fa-plus-circle"></i>Add Room</a>
					</li>
					<li>
						<a href="roomdel.php"><i class="fa fa-pencil-square-o"></i> Delete Room</a>
					</li>
					<li>
						<a href="roombook.php"><i class="fa fa-bar-chart-o"></i> Reservation Info</a>
					</li>
					<li>
						<a href="payment.php"><i class="fa fa-qrcode"></i> Customer Information</a>
					</li>
					<li>
						<a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
					</li>

			</div>

		</nav>

		<!-- /. NAV SIDE  -->
		<div id="page-wrapper">
			<div id="page-inner">


				<div class="row">
					<div class="col-md-12">
						<h1 class="page-header">
							Room Booking
						</h1>
					</div>


					<div class="col-md-8 col-sm-8">
						<div class="panel panel-info">
							<div class="panel-heading">
								Booking Confirmation
							</div>
							<div class="panel-body">

								<div class="table-responsive">
									<table class="table">
										<tr>
											<th>DESCRIPTION</th>
											<th>INFORMATION</th>

										</tr>
										<tr>
											<th>Name</th>
											<th><?php echo $title . $fname . $lname; ?> </th>

										</tr>
										<tr>
											<th>Email</th>
											<th><?php echo $email; ?> </th>

										</tr>
										<tr>
											<th>Nationality </th>
											<th><?php echo $nat; ?></th>

										</tr>
										<tr>
											<th>Country </th>
											<th><?php echo $country;  ?></th>

										</tr>
										<tr>
											<th>Phone No </th>
											<th><?php echo $Phone; ?></th>

										</tr>
										<tr>
											<th>Type Of the Room </th>
											<th><?php echo $troom; ?></th>

										</tr>
										<tr>
											<th>No Of the Room </th>
											<th><?php echo $nroom; ?></th>

										</tr>
										<tr>
											<th>Meal Plan </th>
											<th><?php echo $meal; ?></th>

										</tr>
										<tr>
											<th>Bedding </th>
											<th><?php echo $bed; ?></th>

										</tr>
										<tr>
											<th>Check-in Date </th>
											<th><?php echo $cin; ?></th>

										</tr>
										<tr>
											<th>Check-out Date</th>
											<th><?php echo $cout; ?></th>

										</tr>
										<tr>
											<th>No of days</th>
											<th><?php echo $days; ?></th>

										</tr>
										<tr>
											<th>Status Level</th>
											<th><?php echo $sta; ?></th>

										</tr>





									</table>
								</div>
							</div>
							<div class="panel-footer">
								<form method="post">
									<div class="form-group">
										<label>Select the Confirmation</label>
										<select name="conf" class="form-control">
											<option value selected> </option>
											<option value="Confirm">Confirm</option>

										</select>
									</div>
									<input type="submit" name="co" value="Confirm" class="btn btn-success">

								</form>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

	</div>

	</div>
	</div>
	</div>
	<script src="assets/js/jquery-1.10.2.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.metisMenu.js"></script>
	<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
	<script src="assets/js/morris/morris.js"></script>
	<script src="assets/js/custom-scripts.js"></script>


</body>

</html>

<?php
if (isset($_POST['co'])) {
	$st = $_POST['conf'];

	if ($st == "Confirm") {
		$urb = "UPDATE `roombook` SET `stat`='$st' WHERE id = '$id'";

		if ($f1 == "NO") {
			echo "<script type='text/javascript'> alert('Sorry! Not Available Superior Room ')</script>";
		} else if ($f2 == "NO") {
			echo "<script type='text/javascript'> alert('Sorry! Not Available Guest House')</script>";
		} else if ($f3 == "NO") {
			echo "<script type='text/javascript'> alert('Sorry! Not Available Single Room')</script>";
		} else if ($f4 == "NO") {
			echo "<script type='text/javascript'> alert('Sorry! Not Available Deluxe Room')</script>";
		} else if (mysqli_query($con, $urb)) {
			//echo "<script type='text/javascript'> alert('Guest Room booking is conform')</script>";
			//echo "<script type='text/javascript'> window.location='home.php'</script>";
			$type_of_room = 0;
			if ($troom == "Superior Room") {
				$type_of_room = 5000; 
			} else if ($troom == "Deluxe Room") {
				$type_of_room = 4000;
			} else if ($troom == "Guest House") {
				$type_of_room = 3000;
			} else if ($troom == "Single Room") {
				$type_of_room = 2000;
			}




			if ($bed == "Single") {
				$type_of_bed = $type_of_room * 1 / 10;
			} else if ($bed == "Double") {
				$type_of_bed = $type_of_room * 2 / 10;
			} else if ($bed == "Triple") {
				$type_of_bed = $type_of_room * 3 / 10;
			} else if ($bed == "Quad") {
				$type_of_bed = $type_of_room * 4 / 10;
			}



			if ($meal == "Room only") {
				$type_of_meal = $type_of_bed * 0;
			} else if ($meal == "Breakfast") {
				$type_of_meal = $type_of_bed * 2;
			} else if ($meal == "Half Board") {
				$type_of_meal = $type_of_bed * 3;
			} else if ($meal == "Full Board") {
				$type_of_meal = $type_of_bed * 4;
			}


			$ttot = $type_of_room * $days * $nroom; //room type
			$mepr = $type_of_meal * $days;  // meal
			$btot = $type_of_bed * $days; //bed

			$fintot = $ttot + $mepr + $btot; //total

			//echo "<script type='text/javascript'> alert('$count_date')</script>";
			$psql = "INSERT INTO `payment`(`id`, `title`, `fname`, `lname`, `troom`, `tbed`, `nroom`, `cin`, `cout`, `ttot`,`meal`, `mepr`, `btot`,`fintot`,`noofdays`) VALUES ('$id','$title','$fname','$lname','$troom','$bed','$nroom','$cin','$cout','$ttot','$meal','$mepr','$btot','$fintot','$days')";

			//confirm er sathe sathe status  NOT-FREE hoye jay room table e
			if (mysqli_query($con, $psql)) {
				$notfree = "NotFree";
				$rpsql = "UPDATE `room` SET `place`='$notfree',`cusid`='$id' where bedding ='$bed' and type='$troom' ";
				if (mysqli_query($con, $rpsql)) {
					echo "<script type='text/javascript'> alert('Booking Confirm')</script>";
					echo "<script type='text/javascript'> window.location='roombook.php'</script>";
				}
			}
		}
	}
}
?>
<?php
	// This is the index page.
	include 'insert.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<!-- Bootstrap MaxCDN -->
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/myFavoritePlaces/css/style.css">
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyCT2hpnHS-9uutIKMPKW9MolhDGqCU04NE"></script>
	</head>
	<body>
	<div class="container" style="margin-right:24%; margin-top:3%;">
			<div class="logo"><a href="sqltojson.php"><img src="/myFavoritePlaces/images/logo.png" width="600px"></a></div>
			<form class="form-horizontal" action="" method="post">

				<div class="form-group">
					<label class="control-label col-sm-2" for="placeName">Name for place:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="placeName" name="placeName" required>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2" for="streetAddress">Street Address:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="streetAddress" name="streetAddress" required>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2" for="description">Description of place:</label>
					<div class="col-sm-10">
						<textarea rows="10" class="form-control" id="description" name="description"></textarea>
					</div>
				</div>

				<div class="col-sm-12" style="text-align:right;">
					<button type="submit" class="btn btn-default" style="margin-bottom: 10px; box-shadow: 0px 0px 30px red;">Submit</button> <!-- button to submit form -->
				</div>

			</form>


	</div>
	<!-- Scripts that shouldnt effect page load go right before the closing body tag -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>

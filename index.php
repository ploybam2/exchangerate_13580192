<!DOCTYPE html>
<html>
	<head>
		<title>Calculator</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-select.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">


		<script src="js/jquery.min.js"></script>
  		<script type="text/javascript" src="js/bootstrap.min.js"></script>
  		<script src="js/bootstrap-select.js"></script>
	</head>
	<body>
		<div class="container" style="padding-top: 10px">
			<div class="row">
				<div class="col-xs-12">
					<form name="frm" action="calculate-result.php" method="POST">
						<div class="form-group">
							<label for="thai">จำนวนเงินไทย</label>
							<input type="number" class="form-control" name="thb" id="thai" id="replyNumber" min="0" data-bind="value:replyNumber">
						</div>
						<label for="exampleSelect1">สกุลเงินที่ต้องการคำนวณ</label>
						<select name="type" class="selectpicker" id="exampleSelect1">
							<option value="usd" data-icon="usd">USD</option>
							<option value="jyp" data-icon="jyp">JYP</option>
							<option value="krw" data-icon="krw">KRW</option>
							<option value="gbp" data-icon="gbp" >GBP</option>
							<option value="eur" data-icon="eur">EUR</option>
						</select>
						<br>
						<button type="submit" class="btn btn-success">Calculate</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>

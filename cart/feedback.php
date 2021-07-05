<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="text-center text1">Form Feedback</h2>

		</div>
		<?php
		if ($_GET['order_id'] == 0) {
			echo "<script>document.location = '../index.php?p=listfeedback' </script>";
		} else {
			$sql = "SELECT f.order_id as p FROM `orders` as o LEFT JOIN feedback as f ON f.ordeR_id = o.order_id WHERE o.order_id = '" . $_GET['order_id'] . "'";
			$query1 = mysqli_query($conn, $sql);
			$data1 = mysqli_fetch_row($query1);
			if ($data1[0] !== NULL) {
				$message = "anda sudah memberikan feedback pada order ini.";
				echo "<script type='text/javascript'>alert('$message');</script>";
				echo "<script>document.location = '../index.php?p=listfeedback' </script>";
			} else {
				if (isset($_POST['submitfeedback'])) { //check if form was submitted
					$kritik = $_POST['kritik'];
					$saran = $_POST['saran'];
					$name = $_POST['name'];
					$order_id = $_GET['order_id'];
					$order_detail = "INSERT INTO feedback (order_id, fullname, kritik, saran) VALUES ('" . $order_id . "','" . $name . "','" . $kritik . "','" . $saran . "')";
					if (mysqli_query($conn, $order_detail)) {
						$message = "anda berhasil memberikan feedback untuk nomor order " . $order_id . ".";
						echo "<script type='text/javascript'>alert('$message');</script>";
						echo "<script>document.location = '../index.php?p=listfeedback' </script>";
					}
				}
			}

			$sql = "SELECT fullname FROM members WHERE member_id='" . $_SESSION['member_id'] . "' ";
			$query = mysqli_query($conn, $sql);
			$data = mysqli_fetch_row($query);
		}
		?>
		<div class="col-md-8 center-block">
			<form action="" class="form-horizontal" method="POST">
				<div class="form-group">
					<input type="hidden" name="name" class="form-control" value="<?php echo $data[0] ?>">
					<div class="form-group">
						<label class="col-md-2 control-label">Kritik</label>
						<div class="col-md-9">
							<textarea name="kritik" class="form-control"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Saran</label>
						<div class="col-md-9">
							<textarea name="saran" class="form-control"></textarea>
						</div>
					</div>
					</label>
				</div>
		</div>
		<center>
			<div class="form-group">
				<button type="submit" class="btn btn-warning" name="submitfeedback">Simpan</button>
			</div>
		</center>
		</form>
	</div>
</div>
</div>
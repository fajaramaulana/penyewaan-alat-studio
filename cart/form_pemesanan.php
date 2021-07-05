<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="text-center text1">Form Pemesanan</h2>
		</div>
		<?php
		echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
		$query = mysqli_query($conn, "SELECT * FROM members WHERE member_id = '" . $member . "'");
		$data = mysqli_fetch_array($query);
		if (!$query) {
			printf("Error: %s\n", mysqli_error($conn));
			exit();
		}
		$error = false;
		$name = $email = $address = $city = $state = $postcode = $phone = $owner = $cardbank = $cardnumber = $pay = $namaacara = $tempatacara = "";
		$nameErr = $emailErr = $addressErr = $cityErr = $stateErr = $postcodeErr = $phoneErr = $ownerErr = $cardbankErr = $cardnumberErr = $payErr = $namaacaraErr = $tempatacaraErr = "";

		if (isset($_POST['konfirmasipemesanan'])) {
			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				if (empty($_POST['name'])) {
					$error = true;
					$nameErr = "Masukkan isi nama pertama Anda";
				} else {
					$name = $_POST['name'];
					if (!preg_match("/^[a-zA-Z .\-']*$/", $_POST['name'])) {
						$error = true;
						$nameErr = "Isi nama harus menggunakan huruf, karakter dan spasi";
					}
				}

				if (empty($_POST['email'])) {
					$error = true;
					$emailErr = "Masukkan isi alamat email Anda";
				} else {
					$email = $_POST['email'];
					if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9.]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/", $_POST['email'])) {
						$error = true;
						$emailErr = "Isi alamat email dengan benar";
					}
				}

				if (empty($_POST['address'])) {
					$error = true;
					$addressErr = "Masukkan isi alamat Anda";
				} else {
					$address = $_POST['address'];
				}

				if (empty($_POST['city'])) {
					$error = true;
					$cityErr = "Masukkan isi nama kota atau kabupaten";
				} else {
					$city = $_POST['city'];
					if (!preg_match("/^[a-zA-Z -'&]*$/", $_POST['city'])) {
						$error = true;
						$cityErr = "Isi nama kota atau kabupaten harus menggunakan huruf, karakter dan spasi";
					}
				}

				if (empty($_POST['state'])) {
					$error = true;
					$stateErr = "Masukkan isi provinsi";
				} else {
					$state = $_POST['state'];
					if (!preg_match("/^[a-zA-Z ,']*$/", $_POST['state'])) {
						$error = true;
						$stateErr = "Isi provinsi harus menggunakan huruf, karakter dan spasi";
					}
				}

				if (empty($_POST['postcode'])) {
					$error = true;
					$postcodeErr = "Masukkan isi kode pos";
				} else {
					$postcode = $_POST['postcode'];
					if (!is_numeric($postcode)) {
						$error = true;
						$postcodeErr = "Isi kode pos hanya menggunakan angka";
					}
				}

				if (empty($_POST['phone'])) {
					$error = true;
					$phoneErr = "Masukkan isi nomor telepon Anda";
				} else {
					$phone = $_POST['phone'];
				}

				if (empty($_POST['owner'])) {
					$error = true;
					$ownerErr = "Masukkan isi nama pemilik Anda";
				} else {
					$owner = $_POST['owner'];
					if (!preg_match("/^[a-zA-Z .\-']*$/", $_POST['owner'])) {
						$error = true;
						$ownerErr = "Isi nama pemilik harus menggunakan huruf dan spasi";
					}
				}

				if (empty($_POST['nama_acara'])) {
					$error = true;
					$namaacaraErr = "Masukkan nama acara anda";
				} else {
					$namaacara = $_POST['nama_acara'];
					if (!preg_match("/^[a-zA-Z .\-']*$/", $_POST['nama_acara'])) {
						$error = true;
						$namaacaraErr = "Nama acara anda harus menggunakan huruf dan spasi";
					}
				}

				if (empty($_POST['tempat_acara'])) {
					$error = true;
					$tempatacaraErr = "Masukkan tempat acara anda";
				} else {
					$tempatacara = $_POST['tempat_acara'];
					if (!preg_match("/^[a-zA-Z .\-']*$/", $_POST['tempat_acara'])) {
						$error = true;
						$tempatacaraErr = "Tempat acara anda harus menggunakan huruf dan spasi";
					}
				}

				if (empty($_POST['tanggal_acara'])) {
					$error = true;
					$tanggalacaraErr = "Masukkan tanggal acara anda";
				} else {
					$tanggalacara = $_POST['tanggal_acara'];
				}

				if (trim($_POST['card_bank']) == "blank") {
					$error = true;
					$cardbankErr = "Pilih salah satu nama bank asal";
				} else {
					$cardbank = $_POST['card_bank'];
					if ($cardbank == "Bank BCA") {
						$A = "selected";
					} elseif ($cardbank == "Bank Mandiri") {
						$B = "selected";
					} elseif ($cardbank == "Bank BNI") {
						$C = "selected";
					} elseif ($cardbank == "Bank BRI") {
						$D = "selected";
					} else {
						echo '
						<option value="Bank BCA">Bank BCA</option>
						<option value="Bank Mandiri">Bank Mandiri</option>
						<option value="Bank BNI">Bank BNI</option>
						<option value="Bank BRI">Bank BRI</option>';
					}
				}

				if (empty($_POST['card_number'])) {
					$error = true;
					$cardnumberErr = "Masukkan isi nomor rekening Anda";
				} else {
					$cardnumber = $_POST['card_number'];
					if (!is_numeric($cardnumber)) {
						$error = true;
						$cardnumberErr = "Isi nomor rekening hanya menggunakan angka";
					}
				}

				if (empty($_POST['pay'])) {
					$error = true;
					$payErr = "Masukkan isi total pembayaran";
				} else {
					$pay = $_POST['pay'];
					if (!is_numeric($pay)) {
						$error = true;
						$payErr = "Isi total pembayaran hanya menggunakan angka";
					}
				}

				if ($_POST['pay'] != $_POST['hidden_total']) {
					echo '<div class="modal fade" id="totals" role="dialog" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title">Pemberitahuan</h4>
											</div>
											<div class="modal-body">
												<h3>Isi total tersebut tidak boleh di kurangi. Mohon silakan di bayar harus sama dengan total sementara.</h3>
											</div>
											<div class="modal-footer">
												<a href="../index.php?p=form_pemesanan" class="btn btn-info">Ya</a>
											</div>
										</div>
									</div>
								</div>';
				}

				if (!$error) {
					date_default_timezone_set('Asia/Jakarta');
					// $id = autoNumber('order_id', 'orders');
					$regdate = date('Y-m-d');
					$regtime = date('G:i:s');


					$result = mysqli_query($conn, "INSERT INTO orders(customer_id, owner_name, nama_acara, tempat_acara, cardbank_type, card_number, payment_status, totals, creation_date, creation_time, order_status, order_date) 
					VALUES('" . $member . "','" . $owner . "','" . $namaacara . "','" . $tempatacara . "','" . $cardbank . "','" . $cardnumber . "','UNPAID','" . $pay . "','" . $regdate . "','" . $regtime . "','PENDING','" . $tanggalacara . "')");
					if ($result) {
						$query = mysqli_query($conn, "SELECT order_id FROM orders WHERE order_id = LAST_INSERT_ID();");
						$data = mysqli_fetch_array($query);
						// var_dump($data['order_id']);
						$order_id = $data['order_id'];
						$insertToTransaksiTable = mysqli_query($conn, "INSERT INTO transaksi (order_id, member_id, total_harga, bukti) VALUES ('" . $order_id . "','" . $member . "','" . $pay . "','UNPAID')");
						if (!$result && !$insertToTransaksiTable) {
							die('Invalid query:' . mysqli_error($conn));
						}
						$order_detail = '';
						$_SESSION["order_id"] = $order_id;
						foreach ($_SESSION["cart"] as $keys => $values) {
							$order_detail = "INSERT INTO order_detail VALUES (NULL,'" . $order_id . "','" . $values['item_img'] . "','" . $values['product_id'] . "','" . $values['item_name'] . "','" . $values['color'] . "','" . $values['size'] . "','" . $values['qty'] . "','" . $values['disc'] . "','" . $values['price'] . "')";
							if (mysqli_query($conn, $order_detail)) {
								unset($_SESSION['pesanan']);
								echo "<script>document.location = '../index.php?p=invoice'; </script>";
							}
							mysqli_query($conn, "UPDATE items SET stock = stock -'" . $values['qty'] . "' WHERE item_id = '" . $values['product_id'] . "'");
							$qry = mysqli_query($conn, "SELECT * FROM items WHERE stock='0' AND item_id = '" . $values['product_id'] . "'");
							$data = mysqli_fetch_array($qry);
							if ($data['available']) {
								mysqli_query($conn, "UPDATE items SET available = 'Habis' WHERE item_id = '" . $values['product_id'] . "'");
							}
						}
						mysqli_query($conn, "UPDATE members SET fullname = '" . $name . "', address = '" . $address . "', city = '" . $city . "', state = '" . $state . "', zip_code = '" . $postcode . "', phone = '" . $phone . "', email = '" . $email . "' WHERE member_id = '" . $member . "'");
					}else{
						echo "<div class='alert alert-danger'>Somethings happend, please tell our developer to resolve this error!</div>";
					}
				} else {
					echo "<div class='alert alert-danger'>Isian form anda ada yang kosong atau anda menyalahi aturan inputan, mohon dicek terlebih dahulu!</div>";
				}
			}
		}

		?>

		<div class="col-md-8 center-block">

			<form action="" class="form-horizontal" method="POST">
				<legend>Data Diri</legend>
				<div class="form-group">
					<label class="col-md-2 control-label">Nama Lengkap</label>
					<div class="col-md-9">
						<input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $_POST['name'] : $data['fullname']; ?>">
						<span class="text-danger msg-error"><?php echo $nameErr; ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Alamat Email</label>
					<div class="col-md-9">
						<input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $_POST['email'] : $data['email']; ?>">
						<span>Example: yourname@mail.com</span>
						<span class="text-danger msg-error"><?php echo $emailErr; ?></span>
					</div>
				</div>
				<legend>Detail Alamat</legend>
				<div class="form-group">
					<label class="col-md-2 control-label">Alamat</label>
					<div class="col-md-9">
						<input type="text" name="address" class="form-control" value="<?php echo isset($_POST['address']) ? $_POST['address'] : $data['address']; ?>">
						<span class="text-danger msg-error"><?php echo $addressErr; ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Kota / Kabupaten</label>
					<div class="col-md-9">
						<input type="text" name="city" class="form-control" value="<?php echo isset($_POST['city']) ? $_POST['city'] : $data['city']; ?>">
						<span class="text-danger msg-error"><?php echo $cityErr; ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Provinsi</label>
					<div class="col-md-9">
						<input type="text" name="state" class="form-control" value="<?php echo isset($_POST['state']) ? $_POST['state'] : $data['state']; ?>">
						<span class="text-danger msg-error"><?php echo $stateErr; ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Kode Pos</label>
					<div class="col-md-9">
						<input type="text" name="postcode" class="form-control" value="<?php echo isset($_POST['postcode']) ? $_POST['postcode'] : $data['zip_code']; ?>">
						<span class="text-danger msg-error"><?php echo $postcodeErr; ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Nomor Telepon</label>
					<div class="col-md-9">
						<input type="text" name="phone" class="form-control" maxlength="14" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : $data['phone']; ?>">
						<span class="text-danger msg-error"><?php echo $phoneErr; ?></span>
					</div>
				</div>
				<legend>Detail Acara</legend>
				<div class="form-group">
					<label class="col-md-2 control-label">Nama Acara</label>
					<div class="col-md-9">
						<input type="text" name="nama_acara" class="form-control" placeholder="Masukkan nama acara" value="<?php echo isset($namaacara) ? $namaacara : ' '; ?>">
						<span class="text-danger msg-error"><?php echo $namaacaraErr; ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Tempat Acara</label>
					<div class="col-md-9">
						<input type="text" name="tempat_acara" class="form-control" placeholder="Masukkan nama tempat acara" value="<?php echo isset($tempatacara) ? $tempatacara : ' '; ?>">
						<span class="text-danger msg-error"><?php echo $tempatacaraErr; ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Tanggal Acara</label>
					<div class="col-md-9">
						<input type="date" name="tanggal_acara" class="form-control" placeholder="Masukkan tanggal acara" value="<?php echo isset($tanggalacara) ? $tanggalacara : ' '; ?>">
						<span class="text-danger msg-error"><?php echo $tanggalacaraErr; ?></span>
					</div>
				</div>
				<legend>Metode Pembayaran</legend>
				<div class="form-group">
					<label class="col-md-2 control-label">Nama Pemilik Rekening</label>
					<div class="col-md-9">
						<input type="text" name="owner" class="form-control" placeholder="Masukkan nama pemilik rekening bank" value="<?php echo isset($owner) ? $owner : ' '; ?>">
						<span class="text-danger msg-error"><?php echo $ownerErr; ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Bank Tujuan</label>
					<div class="col-md-3">
						<select name="card_bank" id="card_bank" class="form-control">
							<option value="blank">-- Pilih Bank Asal--</option>
							<option value="Bank BCA" <?php echo $A; ?>>Bank BCA</option>
							<option value="Bank Mandiri" <?php echo $B; ?>>Bank Mandiri</option>
							<option value="Bank BNI" <?php echo $C; ?>>Bank BNI</option>
							<option value="Bank BRI" <?php echo $D; ?>>Bank BRI</option>
						</select>
						<span class="text-danger msg-error"><?php echo $cardbankErr; ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Nomor Rekening</label>
					<div class="col-md-9">
						<input type="text" name="card_number" id="card_number" class="form-control" value="<?php echo isset($cardnumber) ? $cardnumber : ' '; ?>">
						<span class="text-danger msg-error"><?php echo $cardnumberErr; ?></span>
					</div>
				</div>
				<legend>Ringkasan Pembayaran</legend>
				<div class="form-group">
					<label class="col-md-2 control-label">Total transaksi</label>
					<div class="col-md-3">
						<label class="control-label" style="padding-left: 0;">
							<?php
							if (!empty($_SESSION["cart"])) {
								$total = 0;
								foreach ($_SESSION["cart"] as $keys => $values) {
									$totalDisc = $values['price'] - ($values['price'] * $values['disc'] / 100);
									$total = $total + ($values['qty'] * $totalDisc);
								}
							}
							echo 'Rp ' . number_format($total, 0, ".", ".");
							?>
						</label>
						<input type="hidden" name="hidden_total" value="<?php echo ($total); ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Jumlah Bayar Sekarang</label>
					<div class="col-md-2">
						<input type="text" name="pay" class="form-control" value="<?php echo $total; ?>">
						<span class="text-danger msg-error"><?php echo $payErr; ?></span>
					</div>
				</div>
				<center>
					<div class="form-group">
						<button type="submit" class="btn btn-warning" name="konfirmasipemesanan">Selanjutnya</button>
						<a href="../index.php"><button type="button" class="btn btn-link">Batal</button></a>
					</div>
				</center>
			</form>
		</div>
	</div>
</div>
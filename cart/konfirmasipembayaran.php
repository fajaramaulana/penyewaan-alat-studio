<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="text-center text1">Konfirmasi Pembayaran</h2>
		</div>
		<?php
		$error = false;

		if (isset($_POST['save'])) {
			// Ambil Data yang Dikirim dari Form
			$orderId = $_SESSION['order_id'];
			$nama_file = rand(10, 100) . "-" . $orderId . $_FILES['gambar']['name'];
			$ukuran_file = $_FILES['gambar']['size'];
			$tipe_file = $_FILES['gambar']['type'];
			$tmp_file = $_FILES['gambar']['tmp_name'];
			// Set path folder tempat menyimpan gambarnya
			$path = "bukti_transfer/" . $nama_file;


			$lokasi = "bukti_transfer";

			if (!is_dir($lokasi)) {
				mkdir($lokasi);
			}
			if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") { // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
				// Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
				if ($ukuran_file <= 1000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
					// Jika ukuran file kurang dari sama dengan 1MB, lakukan :
					// Proses upload
					if (move_uploaded_file($tmp_file, $path)) { // Cek apakah gambar berhasil diupload atau tidak
						// Jika gambar berhasil diupload, Lakukan :  
						// Proses simpan ke Database
						// Eksekusi/ Jalankan query dari variabel $query
						$statusPembayaran = "UPDATE orders SET payment_status='Menunggu Konfrimasi Pembayaran Oleh Admin' where orders.order_id='$orderId'";
						var_dump($statusPembayaran);
						$updateStatusPembayaran = mysqli_query($conn, $statusPembayaran);

						if ($updateStatusPembayaran) { // Cek jika proses simpan ke database sukses atau tidak
							// Jika Sukses, Lakukan :
							$query = "UPDATE transaksi SET bukti='$nama_file' where transaksi.order_id='$orderId'";
							$updateBuktiTransaksiPathImage = mysqli_query($conn, $query);
							unset($_SESSION['order_id']);
							unset($_SESSION['cart']);
							echo "<script>document.location = '../index.php?&p=order_detail&invoice=" . $orderId . "'; </script>";
						} else {
							// Jika Gagal, Lakukan :
							echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
							echo "<br><a href='invoice.php'>Kembali Ke Form</a>";
						}
					} else {
						// Jika gambar gagal diupload, Lakukan :
						echo "Maaf, Gambar gagal untuk diupload.";
						echo "<br><a href='invoice.php'>Kembali Ke invoice</a>";
					}
				} else {
					// Jika ukuran file lebih dari 1MB, lakukan :
					echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
					echo "<br><a href='invoice.php'>Kembali Ke invoice</a>";
				}
			} else {
				// Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
				echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
				echo "<br><a href='invoice.php'>Kembali Ke invoice</a>";
			}
		}
		?>
		<div class="col-md-8 center-block">
			<form action="../index.php?p=konfirmasipembayaran" class="form-horizontal" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<h4 class="text-center">Upload bukti pembayaran Anda</h4>
				</div>
				<div class="well">
					<div class="container">
						<div class="form-group">
							<h5><b>
									<p>Pembayaran dapat dilakukan melalui rekening</p>
									<p>Bank Kami:</p>
									<p>BCA KCP Taman Melati Margonda Depok</p>
									<p>Acc 5465-083-988</p>
									<p>An PT Ornamen Inti Makmur</p>
								</b>
							</h5>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Bukti Transaksi</label>
							<div class="col-md-10">
								<div id="image-preview-div"></div>
								<input type="file" name="gambar" accept="image/*">
								<span class="text-danger"><?php echo $bgImgErr; ?></span>
								<div id="message"></div>
							</div>
						</div>
						<center>
							<div class="form-group">
								<button type="save" class="btn btn-warning" name="save">Simpan</button>
							</div>
						</center>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
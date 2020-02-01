<div class="container">
	<h1>Dekripsi</h1>
	<div class="row">
<!-- 	m : margin, x : sumbu horizontal, auto : otomatis
		col : kolom, 7 untuk grid(total grid 1 layar = 12) -->
		<div class="col-7 mx-auto">
			<form action="Bismillah/file_upload" class="dropzone" enctype="multipart/form-data">
				
				<!-- <button type="submit" name="submit" class="btn btn-primary">Kirim</button> -->
				<button type="reset" name="reset" class="btn btn-warning">Hapus</button>
			</form>
				
				<!-- my : margin vertical, mx : margin horizontal -->
				<button type="button" name="button" class="btn btn-primary my-3" onclick="menungguProses()">Kirim</button>

		</div>
		<div class="col-7 mx-auto">
			<div class="lead text-center" id="waiting"></div>
		</div>
	</div>
</div>

<script type="text/javascript">
	// let : bisa digunakan untuk merubah isi variable tapi tdk bisa deklarasi ulang
	let waiting = document.getElementById('waiting');

	// const : hanya bisa dideklarasi 1 kali & tdk bisa diinisialisasi ulang
	// asyn : menjalankan program secara asyncronus (secara bersamaan)
	const ambilData = async () => {
		// await : proses menunggu asyncronus selesai, axios : library u/ komunikasi antar data
		return await axios.get('<?= base_url('Bismillah/proses_enkripsi') ?>').then(res => {
			return res.data;
		})
	}

	const menungguProses = async () => {
		waiting.innerText = "Sedang menunggu proses enkripsi";

		waiting.innerText = await ambilData().then(res => {
			return res;
		})
	}

</script>
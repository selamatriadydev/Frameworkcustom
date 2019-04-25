<div class="container mt-3">
	<div class="row">
		<div class="col-6">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#gasModal">
			  Tambah data Mahasiswa
			</button>
			<br><br>
			<h3>Data Mahasiswa</h3>
			<ul class="list-group">
			<?php foreach ($data['mhs'] as $mhs): ?>
				<li class="list-group-item d-flex justify-content-between align-items-center">
					<?= $mhs['nama']; ?>
					<a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge badge-primary">detail</a>
				</li>
			<?php endforeach; ?>
			</ul>
				<!-- <ul>
					<li><?= $mhs['nama']; ?></li>
					<li><?= $mhs['nrp']; ?></li>
					<li><?= $mhs['email']; ?></li>
					<li><?= $mhs['jurusan']; ?></li>
				</ul> -->
			
		</div>
	</div> 
</div>





<!-- Modal -->
<div class="modal fade" id="gasModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
        	<!-- form -->
		  <div class="form-group">
		    <label for="nama">Nama</label>
		    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama">
		  </div>

		  <div class="form-group">
		    <label for="nrp">nrp</label>
		    <input type="text" class="form-control" id="nrp" name="nrp" placeholder="Masukan nrp">
		  </div>

		  <div class="form-group">
		    <label for="email">email</label>
		    <input type="email" class="form-control" id="email" name="email" placeholder="Masukan email">
		  </div>

		  <div class="form-group">
		    <label for="jurusan">Jurusan</label>
		    <select class="form-control" id="jurusan" name="jurusan" placeholder="Pilih Jurusan">
		      <option value="Teknik Informatika">Teknik Informatika</option>
		      <option value="Teknik Informatika">Teknik Geomatika</option>
		      <option value="Teknik Informatika">Teknik pangan</option>
		      <option value="Teknik Informatika">Teknik industri</option>
		      <option value="Teknik Informatika">Teknik lingkungan</option>
		      <option value="Teknik Informatika">Teknik marketing</option>
		    </select>
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
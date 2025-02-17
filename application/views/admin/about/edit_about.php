<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-md-7">
                <div class="p-5">
                    <div class="text">
                        <h1 class="h4 text-gray-900 mb-4">Edit Data About</h1>
                    </div>
                    <?= $this->session->flashdata('pesan'); ?>
                    <form class="user" action="<?= base_url('About/update') ?>" method="post"
                        enctype="multipart/form-data">

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="id_about"
                                id="exampleInputEmail" placeholder="about" value="<?= $about['id_about'] ?>" hidden>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="judul"
                                id="exampleInputEmail" placeholder="judul" value="<?= $about['judul'] ?>" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="latest"
                                id="exampleInputEmail" placeholder="judul" value="<?= $about['gambar'] ?>" hidden>
                        </div>

                        <div class="form-group">
                            <label for="">Deskripsi</label><br>
                            <textarea type="text" class="form-control" rows="10" name="deskripsi" id="exampleInputEmail"
                                required><?= $about['deskripsi'] ?>
                                    </textarea>
                        </div>

                        <div class="form-group">
                            <label for="filefoto">Gambar</label><br>
                            <input type="file" name="gambar" id="exampleInputEmail" placeholder="Image" id="filefoto">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-md-7">
                <div class="p-5">
                    <div class="text">
                        <h1 class="h4 text-gray-900 mb-4">Edit Data Contact</h1>
                    </div>
                    <?= $this->session->flashdata('pesan'); ?>
                    <form class="user" action="<?= base_url('Contact/update') ?>" method="post"
                        enctype="multipart/form-data">

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="id_contact"
                                id="exampleInputEmail" placeholder="contact" value="<?= $contact['id_contact'] ?>"
                                hidden>
                        </div>

                        <input type="hidden" name="latest" value="<?= $contact['gambar'] ?>">

                        <div class="form-group">
                            <label for="">Deskripsi :</label>
                            <textarea name="deskripsi" class="form-control" required id="" cols="30"
                                rows="10"><?= $contact['deskripsi'] ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Alamat :</label>
                            <textarea name="alamat" class="form-control" id="" required cols="30"
                                rows="10"><?= $contact['alamat'] ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Telepon :</label>

                            <input type="number" class="form-control form-control-user" name="telp"
                                id="exampleInputEmail" placeholder="telp" value="<?= $contact['telp'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="">Email :</label>
                            <input type="text" class="form-control form-control-user" name="email"
                                id="exampleInputEmail" placeholder="email" value="<?= $contact['email'] ?>" required>
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
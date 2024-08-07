<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-md-7">
                <div class="p-5">
                    <div class="text">
                        <h1 class="h4 text-gray-900 mb-4">Edit Data Bank</h1>
                    </div>
                    <?= $this->session->flashdata('pesan'); ?>
                    <form class="user" action="<?= base_url('Bank/update') ?>" method="post"
                        enctype="multipart/form-data">

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="id_bank"
                                id="exampleInputEmail" placeholder="contact" value="<?= $bank['id_bank'] ?>" hidden>
                        </div>



                        <div class="form-group">
                            <label for="">Atas Nama :</label>
                            <input type="text" class="form-control form-control-user" name="atas_nama"
                                id="exampleInputEmail" placeholder="Atas Nama" value="<?= $bank['atas_nama'] ?>"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="">Nama Bank :</label>
                            <input type="text" class="form-control form-control-user" name="nama_bank"
                                id="exampleInputEmail" placeholder="Nama Bank" value="<?= $bank['nama_bank'] ?>"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="">No Rekening :</label>
                            <input type="number" class="form-control form-control-user" name="no_rek"
                                id="exampleInputEmail" placeholder="Nomor Rekening" value="<?= $bank['no_rek'] ?>"
                                required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
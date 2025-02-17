<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-md-7">
                <div class="p-5">
                    <div class="text">
                        <h1 class="h4 text-gray-900 mb-4">Edit Data Media</h1>
                    </div>
                    <form class="user" action="<?= base_url('Media/update') ?>" method="post"
                        enctype="multipart/form-data">

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="id_media"
                                id="exampleInputEmail" placeholder="media" value="<?= $media['id_media'] ?>" hidden>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="nama" id="exampleInputEmail"
                                placeholder="media" value="<?= $media['nama'] ?>">
                        </div>

                        <!-- <div class="form-group">
                                    <label for="filefoto">Gambar</label><br>
                                    <input type="file"  name="gambar" id="exampleInputEmail"
                                        placeholder="Image" id="filefoto" >
                                </div> -->

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="link" id="exampleInputEmail"
                                placeholder="link" value="<?= $media['link'] ?>" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
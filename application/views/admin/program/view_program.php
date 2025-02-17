<style>
    .display_none {
        display: none;
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Program</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= base_url('Program/form_tambah') ?>" class="float-right btn btn-primary">Tambah</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Program</th>
                            <th>Deskripsi</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $program = $this->Program_m->select();
                        foreach ($program as $row) {
                            ?>
                            <tr>
                                <td>
                                    <?= $no++ ?>
                                </td>
                                <td>
                                    <?= $row->program; ?>
                                </td>
                                <td>
                                    <div class="read">
                                        <p class="read_more" id="<?= $row->id_program ?>"><?= substr($row->deskripsi, 0, 500) . '...'; ?>
                                            <a class="text_more" style="cursor:pointer;">Read more</a>
                                        </p>
                                        <p class="read_more_full display_none">
                                            <?= $row->deskripsi ?>
                                            <a class="text_hide" style="cursor:pointer;">Hide</a>
                                        </p>
                                    </div>
                                </td>
                                <td><img src="<?= base_url('./assets/images/program/' . $row->gambar) ?>" alt=""
                                        style="width:auto" height='150'></td>
                                <td>
                                    <a href="<?= base_url('Program/form_edit/' . $row->id_program) ?>"
                                        class="btn btn-warning">Edit</a>
                                    <a href="<?= base_url('Program/delete/' . $row->id_program . '/' . $row->gambar) ?>"
                                        class="btn btn-danger" onclick="return confirm('Apakah anda yakin')">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>

<script>
    $(document).on('click', '.text_more ,.text_hide', function (e) {
        var selector = $(this).closest(".read")
        //check if a has class
        if ($(this).hasClass("text_more")) {
            //remove class from full and add class to rating
            selector.find(".read_more_full").removeClass("display_none");
            selector.find(".read_more").addClass("display_none");

        } else {
            selector.find(".read_more_full").addClass("display_none");
            selector.find(".read_more").removeClass("display_none");
        }
    });
</script>
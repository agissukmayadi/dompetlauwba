<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Donasi</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
            </h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Bank Penerima</th>
                            <th>No Rek Pengirim</th>
                            <th>Atas Nama Pengirim</th>
                            <th>Email</th>
                            <th>Nominal</th>
                            <th>Bukti Transfer</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $donasi = $this->Donasi_m->select();
                        foreach ($donasi as $row) {
                            ?>
                            <tr>
                                <td>
                                    <?= $no++ ?>
                                </td>
                                <td>
                                    <?= $row->nama_bank . " - " . $row->no_rek . "(" . $row->atas_nama . ")"; ?>
                                </td>
                                <td>
                                    <?= $row->no_rek_pengirim; ?>
                                </td>
                                <td>
                                    <?= $row->atas_nama_pengirim; ?>
                                </td>
                                <td>
                                    <?= $row->email; ?>
                                </td>
                                <td>
                                    <?= number_format($row->nominal, 2, ',', '.'); ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#bukti-<?= $row->id_donation; ?>">
                                        Lihat Bukti
                                    </button>
                                </td>
                                <!--                                 
                                <td>Rp.
                                    <?= number_format($row->donasi, 2, ',', '.'); ?>
                                </td> -->
                                <td>
                                    <?= $row->tanggal; ?>
                                </td>
                                <td>
                                    <?php
                                    if ($row->status == 'CHECK') {
                                        echo '<span class="badge badge-info">' . $row->status . '</span>';
                                    } elseif ($row->status == 'SUCCESS') {
                                        echo '<span class="badge badge-success">' . $row->status . '</span>';
                                    } elseif ($row->status == 'FAILED') {
                                        echo '<span class="badge badge-danger">' . $row->status . '</span>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($row->status == 'CHECK') {
                                        ?>
                                        <a href="<?= base_url('Donasi/success/' . $row->id_donation) ?>" class="btn btn-success"
                                            onclick="return confirm('Apakah anda yakin')"><i class="fas fa-check"></i></a>
                                        <a href="<?= base_url('Donasi/failed/' . $row->id_donation) ?>" class="btn btn-danger"
                                            onclick="return confirm('Apakah anda yakin')"><i class="fas fa-times"></i></a>
                                        <?php
                                    }
                                    ?>
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

<?php

foreach ($donasi as $row) {
    ?>
    <!-- Modal -->
    <div class="modal fade" id="bukti-<?= $row->id_donation; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="<?= base_url('assets/images/bukti_transfer/') . $row->bukti_transfer; ?>" class="img-fluid"
                        alt="Responsive image">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php
} ?>
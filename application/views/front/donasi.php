<!--/breadcrumb-bg-->
<div class="breadcrumb-bg w3l-inner-page-breadcrumb py-5">
    <div class="container pt-lg-5 pt-md-3 p-lg-4 pb-md-3 my-lg-3">
        <h2 class="title pt-5">Donasi</h2>
        <ul class="breadcrumbs-custom-path mt-3 text-center">
            <li><a href="<?= base_url('Front/index') ?>">Home</a></li>
            <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Donasi </li>
        </ul>
    </div>
</div>
<!--//breadcrumb-bg-->
<!-- banner bottom shape -->
<div class="position-relative">
    <div class="shape overflow-hidden">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- banner bottom shape -->
<!--/serices-6-->
<section class="w3l-serices-6 py-5" id="services1">
    <div class="container py-lg-5 py-md-4 py-2">
        <div class="title-content text-center">
            <h6 class="title-subhny text-center">
                Lauwba
            </h6>
            <h3 class="title-w3l mb-sm-5 mb-4 pb-sm-o pb-2 text-center">Donasi</h3>
        </div>
        <hr style="border: 1px solid black;">
        <div class="content-info-in row">
            <div class="col-12">
                <?= $this->session->flashdata('message') ?>
                <form action="<?= base_url("front/aksi_donasi") ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <h4>Form Donasi</h4>
                    </div>
                    <div class="mb-3">
                        <div class="mb-2">Pilih akun bank tujuan :</div>
                        <?php
                        $banks = $this->Bank_m->select();
                        foreach ($banks as $bank) {
                            ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="<?= $bank->id_bank ?>" name="id_bank"
                                    id="<?= $bank->id_bank ?>?" <?php
                                      if (set_value('id_bank') == $bank->id_bank) {
                                          echo "checked";
                                      }
                                      ?>>
                                <label class="form-check-label" for="<?= $bank->id_bank ?>?">
                                    <?= "$bank->atas_nama - $bank->no_rek ($bank->nama_bank)" ?>
                                </label>
                            </div>
                            <?php
                        }
                        ?>
                        <?= form_error("id_bank", "<small class=' text-danger'>"), "</small>" ?>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email :</label>
                        <input type="text" class="form-control" name="email" id="email"
                            value="<?= set_value("email") ?>">
                        <?= form_error("email", "<small class=' text-danger'>"), "</small>" ?>
                    </div>
                    <div class="mb-3">
                        <label for="no_rek_pengirim" class="form-label">Nomor Rekening :</label>
                        <input type="text" class="form-control" name="no_rek_pengirim" id="no_rek_pengirim"
                            value="<?= set_value("no_rek_pengirim") ?>">
                        <?= form_error("no_rek_pengirim", "<small class=' text-danger'>"), "</small>" ?>
                    </div>
                    <div class=" mb-3">
                        <label for="atas_nama_pengirim" class="form-label">Atas Nama Rekening :</label>
                        <input type="text" class="form-control" name="atas_nama_pengirim" id="atas_nama_pengirim"
                            value="<?= set_value("atas_nama_pengirim") ?>">
                        <?= form_error("atas_nama_pengirim", "<small class=' text-danger'>"), "</small>" ?>
                    </div>
                    <div class="mb-3">
                        <label for="nominal" class="form-label">Nominal Donasi : </label>
                        <input type="number" class="form-control" name="nominal" id="nominal"
                            value="<?= set_value("nominal") ?>">
                        <?= form_error("nominal", "<small class=' text-danger'>"), "</small>" ?>

                    </div>
                    <div class="mb-3">
                        <label for="bukti_transfer" class="form-label">Bukti Transfer :</label>
                        <input required class="form-control" type="file" name="bukti_transfer" id="bukti_transfer">
                        <?php if (isset($error["bukti_transfer"])) {
                            echo $error["bukti_transfer"];
                        } ?>

                    </div>
                    <div class="mb-3">
                        <button class="custom-btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="w3l-content-4 py-5" id="cekDonasi">
    <div class="content-4-main py-lg-5 py-md-4">
        <div class="container">
            <div class="title-content text-center">
                <h3 class="title-w3l" style="font-size:25px;">Cek Donasi</h3>
                <hr style="border: 1px solid black;">
            </div>
            <div class="content-info-in row">
                <div class="d-flex mb-3">
                    <input type="text" class=" flex-grow-1 custom-input" id="kode_donasi" placeholder="Kode Donasi"
                        aria-label="Kode Donasi" aria-describedby="button-addon2">
                    <button class="custom-btn-outline-primary group" type="button" id="btn_check_donasi">Cek</button>
                </div>
            </div>
            <div id="table-cek-donasi">
                
            </div>
        </div>
    </div>
</section>


<!--//services-6-->
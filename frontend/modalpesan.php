<div class="modal fade" id="modalmakanan<?= $getdata['id_paket_makanan'] ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <form action="frontend/olahdata/pesan_makanan.php" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Pesan Makanan</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group has-feedback">
                        <label>Nama Paket</label>
                        <input type="text" class="form-control" name="nama_paket_makanan" data-required-error="Data tidak boleh kosong" value="<?= $getdata['nama_paket_makanan'] ?>" required readonly>
                        <input type="hidden" value="<?= $getdata['id_paket_makanan'] ?>" name="id_paket_makanan">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label>Harga</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="text" class="form-control harga" name="harga" data-required-error="Data tidak boleh kosong" value="<?= $getdata['harga'] ?>" required readonly>
                        </div>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label>Qty</label>
                        <input type="number" class="form-control qty" name="qty" data-required-error="Data tidak boleh kosong" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group">
                        <label>Metode Pembayaran</label>
                        <div class="text-center">
                            <label class="mt-2"><img src="frontend/assets/img/ovo.png" alt="OVO" width="80px">
                                <input style="display:block; margin: auto;" type="radio" name="pembayaran" value="OVO" required />
                            </label>
                            <label class="mt-2 ml-5"><img src="frontend/assets/img/gopay.png" alt="GOPAY" width="100px">
                                <input style="display:block; margin: auto;margin-top: 7px" type="radio" name="pembayaran" value="GOPAY" required />
                            </label>
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" data-required-error="Data tidak boleh kosong" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>



                    <?php if (empty($_SESSION['login_customer'])) : ?>
                        <div class="form-group has-feedback">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" data-required-error="Data tidak boleh kosong" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <span class="help-block with-errors"></span>
                        </div>
                    <?php else : ?>
                        <div class="form-group has-feedback">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" data-required-error="Data tidak boleh kosong" value="<?= $_SESSION['email_customer'] ?>" required readonly>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <span class="help-block with-errors"></span>
                        </div>
                    <?php endif ?>

                    <div class="form-group">
                        <span class="text-danger" style="font-size: 13px;">* Email digunakan untuk mencetak tiket, silahkan gunakan email aktif anda.</span>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm">Pesan</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </form>
    </div>
</div>
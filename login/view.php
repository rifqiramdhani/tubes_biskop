<!-- login -->
<div class="col-md-5" id="form-login">
    <div class="card-group">
        <div class="container-fluid">
            <!-- show sweet alert -->
            <?php if (isset($_SESSION['message'])) : ?>
                <div class="flash-data" data-flashdata="<?= $_SESSION['message'] ?>" data-title="<?= $_SESSION['title'] ?>" data-type="<?= $_SESSION['type'] ?>"></div>
            <?php
                unset($_SESSION['message']);
                unset($_SESSION['title']);
                unset($_SESSION['type']);
            endif;
            ?>
        </div>

        <div class="card">
            <form action="proses_login.php" method="POST" data-toggle="validator" role="form">
                <div class="card-body">
                    <h1>Login</h1>
                    <p class="text-muted">Masuk ke akun anda</p>
                    <div class="form-group has-feedback">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-envelope"></i>
                                </span>
                            </div>
                            <input type="email" id="email" name="email" class="form-control" data-type-error="Email tidak valid" placeholder="Email" data-data-required-error="Data tidak boleh kosong" required-error="Email Tidak Boleh Kosong" data-required-error="Data tidak boleh kosong" required>
                        </div>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </div>
                            <input type="password" name="password" placeholder="Kata sandi" class="form-control" data-data-required-error="Data tidak boleh kosong" required-error="Kata sandi tidak boleh kosong" data-required-error="Data tidak boleh kosong" required>
                        </div>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-lg-7 mt-3">
                            <button type="submit" name="login" value="login" class="btn btn-sm btn-primary text-white">Masuk</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('frontend/template/header.php') ?>


<?php
$query = mysqli_query($koneksi, "SELECT * FROM film ORDER BY id_film ASC")
// var_dump($_SESSION);
?>
<!-- show sweet alert -->
<?php if (isset($_SESSION['message'])) : ?>
    <div class="flash-data" data-flashdata="<?= $_SESSION['message'] ?>" data-title="<?= $_SESSION['title'] ?>" data-type="<?= $_SESSION['type'] ?>"></div>
<?php
    unset($_SESSION['message']);
    unset($_SESSION['title']);
    unset($_SESSION['type']);
endif;
?>


<body>
    <div class="content">
        <?php require_once('frontend/template/navbar.php') ?>
        <div class="main-content">
            <div class="header">
                <div class="top-header">
                    <div class="logo"><a href="index.php"><img src="frontend/assets/img/logo.png"></a></div>
                </div>
                <div class="info-header">
                    <h1>Big Hero 6</h1>
                    <p>Don Hall, Chris Williams<br></p>
                    <p>Rating &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp; 8,5/10<br></p>
                    <p>Genre &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; Animation, Action, Comedy<br></p>
                    <p>Release &nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp; 7 November 2014<br></p>
                    <p>The special bond that develops between plus-sized inflatable robot Baymax, and prodigy Hiro Hamada, who team up with a group of friends to form a band of high-tech heroes.<br></p><a href="#film" class="book-ticket"><i class="logo-book"></i><strong>BOOK TICKET</strong><br></a>
                </div>
            </div>
            <div class="container list-film" id="film">
                <h3 class="text-center mb-4">
                    Pilih Film
                </h3>
                <div class="row d-flex justify-content-center">
                    <?php while ($getdata = mysqli_fetch_assoc($query)) : ?>
                        <div class="col-md-2 card-film">
                            <a class="card-image" href="?page=detail-film&id=<?= $getdata['id_film'] ?>">
                                <img class="img-fluid" src="assets/img/film/<?= $getdata['direktori'] ?>">
                            </a>
                            <div class="card-desc">
                                <div class="card-desc-title">
                                    <h5><?= $getdata['judul'] ?></h5>
                                </div>
                                <div class="card-desc-bottom">
                                    <p class="left"><?= tgl_indo($getdata['tanggal_tayang']) ?></p>
                                    <p class="right"><i class="fa fa-star" style="color: orange"></i><?= rand(7, 9) . '.' . rand(0, 9) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile ?>
                </div>
            </div>

            <?php require_once('frontend/template/footer.php') ?>
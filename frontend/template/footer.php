<div class="footer-basic">
    <footer>
        <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
        <p class="copyright">Copyright © 2020 |&nbsp;RIYORUKI&nbsp;<br></p>
    </footer>
</div>
</div>
</div>
<script src="frontend/assets/js/jquery.min.js"></script>
<script src="frontend/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="frontend/assets/js/main.js"></script>
<script src="frontend/assets/js/owl.carousel.min.js"></script>
<!-- form validation -->
<script src="<?php echo BASE_URL . 'assets/node_modules/bootstrap-validator/dist/validator.min.js'; ?>"></script>
<!-- fontawesome -->
<script src="<?= BASE_URL . 'assets/js/all.min.js'; ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?= BASE_URL . 'assets/js/custom.js'; ?>" type="text/javascript" charset="utf-8"></script>
<!-- sweetaler 2 -->
<script src="<?= BASE_URL . 'assets/js/sweetalert2.all.min.js' ?>"></script>
<!-- datatables -->
<script src="<?= BASE_URL . 'assets/vendors/datatables/datatables.min.js' ?>"></script>

<script>
    $(document).ready(function() {
        // sweetalert
        const flashdata = $('.flash-data').data('flashdata');
        const title = $('.flash-data').data('title');
        const type = $('.flash-data').data('type');

        if (flashdata) {
            Swal.fire({
                title: title,
                text: flashdata,
                icon: type
            })
        }

        //show modal lupa password
        $("#lupapassword").click(() => {
            $("#modal_login").modal('hide')

            setTimeout(() => {
                $("#modal_lupa_password").modal('show')
            }, 500);

        })

        //smooth scrolling
        let anchorlinks = document.querySelectorAll('a[href^="#"]')

        for (let item of anchorlinks) { // relitere 
            item.addEventListener('click', (e) => {
                let hashval = item.getAttribute('href')
                if (hashval != "#") {
                    let target = document.querySelector(hashval)
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    })
                    history.pushState(null, null, hashval)
                    e.preventDefault()
                }
            })
        }

        //total harga
        $("#jumlah").on("change", function() {
            var jumlah = $(this).val()
            var harga = 35000
            var total_harga = 0
            var diskon = 0

            if (jumlah == 5) {
                diskon = (harga * jumlah) * 0.2
                total_harga = (harga * jumlah) - diskon
            } else {
                total_harga = harga * jumlah
            }

            $("#total_harga").val("Rp. " + total_harga)
        })

        //datamakanan
        $("#datamakanan").dataTable()
        $('#datamakanan').on('click', 'input[name="qty"]', function(e) {
            e.preventDefault();
            alert('ha')
        });
    })
</script>
</body>

</html>
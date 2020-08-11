<footer class="app-footer">
    <div>
        <span>&copy; 2020 Copyright <a href="#">Riyoruki Bioskop</a> </span>
    </div>
    <div class="ml-auto">
        <span>Developed by</span>
        <a href="#">Riyoruki</a>
    </div>
</footer>

<script src="<?= BASE_URL . 'assets/vendors/jquery/js/jquery.min.js'; ?>">
</script>
<script src="<?= BASE_URL . 'assets/vendors/bootstrap/js/bootstrap.min.js'; ?>"></script>
<script src="<?= BASE_URL . 'assets/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js'; ?>"></script>
<script src="<?= BASE_URL . 'assets/vendors/pace-progress/js/pace.min.js' ?>"></script>
<script src="<?= BASE_URL . 'assets/vendors/@coreui/coreui/js/coreui.min.js' ?>"></script>
<!-- form validation -->
<script src="<?= BASE_URL . 'assets/node_modules/bootstrap-validator/dist/validator.min.js'; ?>"></script>
<!-- datatables -->
<script src="<?= BASE_URL . 'assets/vendors/datatables/datatables.min.js' ?>"></script>
<!-- custom js -->
<script src="<?= BASE_URL . 'assets/js/custom.js'; ?>" type="text/javascript" charset="utf-8"></script>
<!-- fontawesome -->
<script src="<?= BASE_URL . 'assets/js/all.min.js'; ?>" type="text/javascript" charset="utf-8"></script>
<!-- smartwizard multistep form -->
<script src="<?= BASE_URL . 'assets/js/jquery.smartWizard.min.js' ?>"></script>
<!-- sweetaler 2 -->
<script src="<?= BASE_URL . 'assets/js/sweetalert2.all.min.js' ?>"></script>
<!-- custom file input -->
<script src="<?= BASE_URL . 'assets/node_modules/bs-custom-file-input/dist/bs-custom-file-input.min.js' ?>"></script>
<!-- gijgo datepicker -->
<script src="<?= BASE_URL . 'assets/node_modules/gijgo/js/gijgo.min.js' ?>"></script>
<!-- lightbox -->
<script src="<?= BASE_URL . 'assets/node_modules/lightbox/dist/ekko-lightbox.min.js' ?>"></script>

<script>
    // Setup datatables 
    $(document).ready(function() {

        // lightbox
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });

        //init custom file input
        bsCustomFileInput.init()

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

        $('#timepicker').timepicker({
            uiLibrary: 'bootstrap4',
            format: 'HH:MM',
            mode: '24hr',
            modal: true
        });

        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: "dd-mm-yyyy",
            todayBtn: "linked",
            language: "id",
            todayHighlight: true,
            modal: true,
            footer: true
        });

        $('#tanggal_buka .input-group.date').datepicker({
            format: "dd-mm-yyyy",
            todayBtn: "linked",
            language: "id",
            todayHighlight: true,
            autoclose: true
        });

        $('#tanggal_tutup .input-group.date').datepicker({
            format: "dd-mm-yyyy",
            todayBtn: "linked",
            language: "id",
            todayHighlight: true,
            autoclose: true
        });

        //datacustomer
        $("#datacustomer").dataTable()

        //datadetailkriteria
        $("#datadetailkriteria").dataTable()

        //penilaiankaryawan
        $("#penilaiankaryawan").dataTable()

        //datasubkriteria
        $("#datasubkriteria").dataTable()

        //data admin
        $("#dataadmin").dataTable()
        $('#dataadmin').on('click', '.remove', function(e) {
            e.preventDefault();
            var id = $(this).data('id')
            var nama = $(this).data('nama')

            hapusdata('Data Admin', "?page=admin&action=deletedata&id=", id, nama)
        });

        //datastudio
        $("#datastudio").dataTable()
        $("#datastudio").on('click', '.remove', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data Studio', "?page=studio&action=deletedata&id=", id, nama)
        })

        //datamakanan
        $("#datamakanan").dataTable()
        $("#datamakanan").on('click', '.remove', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data Paket Makanan', "?page=paket-makanan&action=deletedata&id=", id, nama)
        })

        //datajadwal
        $("#datajadwal").dataTable()
        $("#datajadwal").on('click', '.remove', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data Jadwal', "?page=jadwal&action=deletedata&id=", id, nama)

        })

        //datafilm
        $("#datafilm").dataTable()
        $("#datafilm").on('click', '.remove', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data Film', "?page=film&action=deletedata&id=", id, nama)
        })

        //datadetailjadwal
        $("#datadetailjadwal").dataTable()
        $("#datadetailjadwal").on('click', '.remove', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data Detail Jadwal', "?page=detail-jadwal&action=deletedata&id=", id, nama)
        })

        $("#ubahadmin").on('click', function() {
            var nama = $(this).data('nama')
            var form = $(this).parents('form')
            ubahdata(nama, form)
        })

        $("#ubahfilm").on('click', function() {
            var nama = $(this).data('nama')
            var form = $(this).parents('form')
            ubahdata(nama, form)
        })

        $("#ubahmakanan").on('click', function() {
            var nama = $(this).data('nama')
            var form = $(this).parents('form')
            ubahdata(nama, form)
        })

        $("#ubahstudio").on('click', function() {
            var nama = $(this).data('nama')
            var form = $(this).parents('form')
            ubahdata(nama, form)
        })

        $("#ubahjadwal").on('click', function() {
            var nama = $(this).data('nama')
            var form = $(this).parents('form')
            ubahdata(nama, form)
        })

        $("#ubahdetailjadwal").on('click', function() {
            var nama = $(this).data('nama')
            var form = $(this).parents('form')
            ubahdata(nama, form)
        })



    });
</script>
</body>

</html>
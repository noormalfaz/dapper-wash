<!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-light">
                <h5 class="modal-title" id="exampleModalLabel"><strong>Apakah Anda Ingin Logout?</strong></h5>
                <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body font-weight-bold text-dark">Tekan "Logout" jika anda yakin ingin meangkhiri sesi anda saat ini.</div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="<?= base_url(); ?>auth/logout">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>
<script src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url(); ?>assets/js/demo/datatables-demo.js"></script>

<script>
    $(".custom-file-input").on("change", function() {
        let fileName = $(this).val().split("\\").pop();
        $(this).next(".custom-file-label").addClass("selected").html(fileName);
    });

    $(".form-check-input").on("click", function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url("admin/changeaccess"); ?>",
            type: "post",
            data: {
                menuId: menuId,
                roleId: roleId
            },

            success: function() {
                document.location.href = '<?= base_url("admin/roleaccess/"); ?>' + roleId;
            }
        });
    });

    const flashSuccess = $(".success-data").data("success");
    const flashError = $(".error-data").data("error");

    if (flashSuccess) {
        Swal.fire({
            title: "Selamat",
            text: flashSuccess,
            icon: "success",
        });
    }

    if (flashError) {
        Swal.fire({
            title: "Maaf",
            text: flashError,
            icon: "error",
        });
    }

    // tombol-hapus
    $(".tombol-hapus").on("click", function(e) {
        e.preventDefault();
        const href = $(this).attr("href");

        Swal.fire({
            title: "Apakah anda yakin",
            text: "Data akan dihapus",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus Data!",
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        });
    });

    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>

</body>

</html>
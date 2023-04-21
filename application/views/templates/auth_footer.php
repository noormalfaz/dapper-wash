    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
    <script>
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
    </script>
    </body>

    </html>
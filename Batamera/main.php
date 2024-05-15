<?php
    //session_start();
    if(empty ($_SESSION['username_batamera'])) {
        header ("location:login");
    }
    
include "proses/koneksi.php";
  $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$_SESSION[username_batamera]'");
    $hasil = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terra Garden Website</title>
    <link rel="stylesheet" href="../bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.cs">
    <link rel="stylesheet" href="../Batamera/style.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>

<body style="height : 300px; background-color: #ebf2f7;">
    <!-- header -->
    <?php include "header.php"; ?>
    <!-- end header -->
    <div class="container-fluid">
        <div class="row">
            <!-- sidebar -->
            <?php include "sidebar.php"; ?>
            <!-- end sidebar -->
            
            <!-- content -->
            <?php
                include $page;
            ?>
            <!-- end content -->

        </div>
        <div class="fixed-bottom text-center bg-dark text-white py-2">
            &copy;copyright 2024 Terra Garden
        </div>
    </div>
    <script src="../bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>

</html>
<?php

session_start();
ob_flush();
include('koneksi.php');
if(!$_SESSION['nit']) {
    header("location: index.php");
}
$nit = $_SESSION['nit'];
$user = $mysqli->query("select * from users where nit = '$nit'");
$datanya = $user->fetch_assoc();

$cek = $mysqli->query("SELECT * FROM pemilihan WHERE nit = '$nit'");
$cekk = $cek->num_rows;

                            if ($cekk > 0) { ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        showError();
    });

    function showError() {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Anda sudah menggunakan hak pilih.',
            padding: '2em',
            confirmButtonText: 'OK'  // Menampilkan tombol "OK"
        }).then((result) => {
            if (result.isConfirmed) {
                // Arahkan ke index.php jika tombol "OK" ditekan
                window.location.href = 'index.php';
            }
        });
    }
</script>

<?php
}


include('header.php');
?>
        <!-- sidebar menu overlay -->
        <div x-cloak class="fixed inset-0 z-50 bg-[black]/60 lg:hidden" :class="{'hidden' : !$store.app.sidebar}" @click="$store.app.toggleSidebar()"></div>

        <!-- screen loader -->
        <div class="screen_loader animate__animated fixed inset-0 z-[60] grid place-content-center bg-[#fafafa] dark:bg-[#060818]">
            <svg width="64" height="64" viewBox="0 0 135 135" xmlns="http://www.w3.org/2000/svg" fill="#4361ee">
                <path
                    d="M67.447 58c5.523 0 10-4.477 10-10s-4.477-10-10-10-10 4.477-10 10 4.477 10 10 10zm9.448 9.447c0 5.523 4.477 10 10 10 5.522 0 10-4.477 10-10s-4.478-10-10-10c-5.523 0-10 4.477-10 10zm-9.448 9.448c-5.523 0-10 4.477-10 10 0 5.522 4.477 10 10 10s10-4.478 10-10c0-5.523-4.477-10-10-10zM58 67.447c0-5.523-4.477-10-10-10s-10 4.477-10 10 4.477 10 10 10 10-4.477 10-10z"
                >
                    <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="-360 67 67" dur="2.5s" repeatCount="indefinite" />
                </path>
                <path
                    d="M28.19 40.31c6.627 0 12-5.374 12-12 0-6.628-5.373-12-12-12-6.628 0-12 5.372-12 12 0 6.626 5.372 12 12 12zm30.72-19.825c4.686 4.687 12.284 4.687 16.97 0 4.686-4.686 4.686-12.284 0-16.97-4.686-4.687-12.284-4.687-16.97 0-4.687 4.686-4.687 12.284 0 16.97zm35.74 7.705c0 6.627 5.37 12 12 12 6.626 0 12-5.373 12-12 0-6.628-5.374-12-12-12-6.63 0-12 5.372-12 12zm19.822 30.72c-4.686 4.686-4.686 12.284 0 16.97 4.687 4.686 12.285 4.686 16.97 0 4.687-4.686 4.687-12.284 0-16.97-4.685-4.687-12.283-4.687-16.97 0zm-7.704 35.74c-6.627 0-12 5.37-12 12 0 6.626 5.373 12 12 12s12-5.374 12-12c0-6.63-5.373-12-12-12zm-30.72 19.822c-4.686-4.686-12.284-4.686-16.97 0-4.686 4.687-4.686 12.285 0 16.97 4.686 4.687 12.284 4.687 16.97 0 4.687-4.685 4.687-12.283 0-16.97zm-35.74-7.704c0-6.627-5.372-12-12-12-6.626 0-12 5.373-12 12s5.374 12 12 12c6.628 0 12-5.373 12-12zm-19.823-30.72c4.687-4.686 4.687-12.284 0-16.97-4.686-4.686-12.284-4.686-16.97 0-4.687 4.686-4.687 12.284 0 16.97 4.686 4.687 12.284 4.687 16.97 0z"
                >
                    <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="360 67 67" dur="8s" repeatCount="indefinite" />
                </path>
            </svg>
        </div>

        <!-- scroll to top button -->
        <div class="fixed bottom-6 z-50 ltr:right-6 rtl:left-6" x-data="scrollToTop">
            <template x-if="showTopButton">
                <button
                    type="button"
                    class="btn btn-outline-primary animate-pulse rounded-full bg-[#fafafa] p-2 dark:bg-[#060818] dark:hover:bg-primary"
                    @click="goToTop"
                >
                    <svg width="24" height="24" class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            opacity="0.5"
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M12 20.75C12.4142 20.75 12.75 20.4142 12.75 20L12.75 10.75L11.25 10.75L11.25 20C11.25 20.4142 11.5858 20.75 12 20.75Z"
                            fill="currentColor"
                        />
                        <path
                            d="M6.00002 10.75C5.69667 10.75 5.4232 10.5673 5.30711 10.287C5.19103 10.0068 5.25519 9.68417 5.46969 9.46967L11.4697 3.46967C11.6103 3.32902 11.8011 3.25 12 3.25C12.1989 3.25 12.3897 3.32902 12.5304 3.46967L18.5304 9.46967C18.7449 9.68417 18.809 10.0068 18.6929 10.287C18.5768 10.5673 18.3034 10.75 18 10.75L6.00002 10.75Z"
                            fill="currentColor"
                        />
                    </svg>
                </button>
            </template>
        </div>

        <!-- start theme customizer section -->
        
        <!-- end theme customizer section -->

        <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
            <!-- start sidebar section -->
    <?php include ('sidebar.php'); ?>
            <!-- end sidebar section -->

            <div class="main-content flex min-h-screen flex-col">
                <!-- start header section -->
                <?php include ('headerbar.php'); ?>
                <!-- end header section -->

                <div class="animate__animated p-6" :class="[$store.app.animation]">
                    <!-- start main content section -->
                    <ul class="mb-6 flex space-x-2 rtl:space-x-reverse">
                            <li>
                                <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
                            </li>
                            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                                <span>Pemilihan</span>
                            </li>
                        </ul>
                    <div x-data="sales">
                        <ul class="flex space-x-2 rtl:space-x-reverse">
                            
                        <?php if ($_GET) {


$danyon = $_GET['danyon'];
$kadem = $_GET['kadem'];
$wakadem = $_GET['wakadem'];

if ($danyon != 1 && $danyon != 2 && $danyon != 3) {
    ?>
   <script>
        document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: 'Invalid Option.',
        padding: '2em'
    });
});
            </script>
<?php

} else if($cekk > 0) { ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            showError();
        });

        function showError() {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Anda sudah menggunakan hak pilih.',
                padding: '2em',
                confirmButtonText: 'OK'  // Menampilkan tombol "OK"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Arahkan ke index.php jika tombol "OK" ditekan
                    window.location.href = 'index.php';
                }
            });
        }
    </script>
<?php
} else if ($kadem != 1 && $kadem != 2 && $kadem != 3) {
    
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: 'Invalid Option.',
        padding: '2em'
    });
});
            </script>
<?php

} else if ($wakadem != 1 && $wakadem != 2 && $wakadem != 3) {
    
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: 'Invalid Option.',
        padding: '2em'
    });
});
            </script>
<?php
}
else {
$query = $mysqli->query("insert into pemilihan values ('','$nit','$danyon','$kadem','$wakadem','$waktu')");
if ($query) {
?>Sukses<?php
} else {
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: 'Gagal.',
        padding: '2em'
    });
});
            </script>
            <?php
}
    
}
} ?>

                        </ul>
                        <form action="" method="post">

                        <div class="pt-5">
                            <div class="mb-1 grid gap-1 xl:grid-cols-1">
                                <div class="panel h-full xl:col-span-2">
                                    <div class="mb-5 flex items-center dark:text-white-light">
                                        <h4 class="text-lg font-semibold">Voting Calon Komandan Batalyon</h4>
                                        <hr>
                                    </div>
                                    <div class="flex justify-center">
    <div class="max-w-[19rem] w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none">
        <div class="py-7 px-6">
            <div class="-mt-7 mb-7 -mx-6 rounded-tl rounded-tr h-[215px] overflow-hidden">
                <img src="http://www.ambmedan.ac.id/wp-content/uploads/2022/05/truna-karton-1.png" alt="image" class="w-full h-full object-cover" />
            </div>
            <div style="text-align: center;">
    <h4 class="badge inline-block" style="background-color: gold; border-radius: 50%; padding: 8px 12px; font-size: 24px; color: black;">
        1
    </h4>
</div>
<p style="text-align: center; font-weight: bold;">
Abda Zuljiva Aslam - TEP2A<br>
                Abda Zuljiva Aslam - TEP2A
            </p><br><br>
            <div style="text-align: center;">
    <label class="inline-flex" style="font-size: 18px;">
        <input type="radio" name="danyon" id="danyon" value="1" class="form-radio" />
        <span style="margin-left: 8px;">Pilih Paslon 1</span>
    </label>
</div>
       </div>
    </div>
    &nbsp;&nbsp;
    &nbsp;&nbsp;
    <!-- Card kedua -->    &nbsp;&nbsp;
    &nbsp;&nbsp;
    &nbsp;&nbsp;
    &nbsp;&nbsp;

    <div class="max-w-[19rem] w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none">
        <div class="py-7 px-6">
            <div class="-mt-7 mb-7 -mx-6 rounded-tl rounded-tr h-[215px] overflow-hidden">
                <img src="http://www.ambmedan.ac.id/wp-content/uploads/2022/05/truna-karton-1.png" alt="image" class="w-full h-full object-cover" />
            </div>
            <div style="text-align: center;">
    <h4 class="badge inline-block" style="background-color: gold; border-radius: 50%; padding: 8px 12px; font-size: 24px; color: black;">
        2
    </h4>
</div>
<p style="text-align: center; font-weight: bold;">
Abda Zuljiva Aslam - TEP2A<br>
                Abda Zuljiva Aslam - TEP2A
            </p>           
            <br><br>
            <div style="text-align: center;">
    <label class="inline-flex" style="font-size: 18px;">
        <input type="radio" name="danyon" id="danyon" value="2" class="form-radio" />
        <span style="margin-left: 8px;">Pilh Paslon 2</span>
    </label>
</div>
        </div>
    </div>
    &nbsp;&nbsp;
    &nbsp;&nbsp;
    <!-- Card kedua -->    &nbsp;&nbsp;
    &nbsp;&nbsp;
    &nbsp;&nbsp;
    &nbsp;&nbsp;

    <!-- Card ketiga -->
    <div class="max-w-[19rem] w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none">
        <div class="py-7 px-6">
            <div class="-mt-7 mb-7 -mx-6 rounded-tl rounded-tr h-[215px] overflow-hidden">
                <img src="http://www.ambmedan.ac.id/wp-content/uploads/2022/05/truna-karton-1.png" alt="image" class="w-full h-full object-cover" />
            </div>
            <div style="text-align: center;">
    <h4 class="badge inline-block" style="background-color: gold; border-radius: 50%; padding: 8px 12px; font-size: 24px; color: black;">
        3
    </h4>
</div>

<p style="text-align: center; font-weight: bold;">
Abda Zuljiva Aslam - TEP2A<br>
                Abda Zuljiva Aslam - TEP2A
            </p><br><br>
            <div style="text-align: center;">
    <label class="inline-flex" style="font-size: 18px;">
        <input type="radio" name="danyon" id="danyon" value="3" class="form-radio"/>
        <span style="margin-left: 8px;">Pilih Paslon 3</span>
    </label>
</div>
        </div>
    </div>
</div>

    </div>
    <div class="mb-1 grid gap-1 xl:grid-cols-1">
        <br><br>
                                <div class="panel h-full xl:col-span-2">
                                    <div class="mb-5 flex items-center dark:text-white-light">
                                        <h4 class="text-lg font-semibold">Voting Calon Ketua Demustar</h4>
                                        <hr>
                                    </div>
                                    <div class="flex justify-center">
                                        
    <div class="max-w-[19rem] w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none">
        <div class="py-7 px-6">
            <div class="-mt-7 mb-7 -mx-6 rounded-tl rounded-tr h-[215px] overflow-hidden">
                <img src="http://www.ambmedan.ac.id/wp-content/uploads/2022/05/truna-karton-1.png" alt="image" class="w-full h-full object-cover" />
            </div>
            <div style="text-align: center;">
    <h4 class="badge inline-block" style="background-color: gold; border-radius: 50%; padding: 8px 12px; font-size: 24px; color: black;">
        1
    </h4>
</div>
<p style="text-align: center; font-weight: bold;">
Abda Zuljiva Aslam - TEP2A<br>
                Abda Zuljiva Aslam - TEP2A
            </p><br><br>
            <div style="text-align: center;">
    <label class="inline-flex" style="font-size: 18px;">
        <input type="radio" name="kadem" id="kadem" value="1" class="form-radio" />
        <span style="margin-left: 8px;">Pilih Paslon 1</span>
    </label>
</div>
       </div>
    </div>
    &nbsp;&nbsp;
    &nbsp;&nbsp;
    <!-- Card kedua -->    &nbsp;&nbsp;
    &nbsp;&nbsp;
    &nbsp;&nbsp;
    &nbsp;&nbsp;

    <div class="max-w-[19rem] w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none">
        <div class="py-7 px-6">
            <div class="-mt-7 mb-7 -mx-6 rounded-tl rounded-tr h-[215px] overflow-hidden">
                <img src="http://www.ambmedan.ac.id/wp-content/uploads/2022/05/truna-karton-1.png" alt="image" class="w-full h-full object-cover" />
            </div>
            <div style="text-align: center;">
    <h4 class="badge inline-block" style="background-color: gold; border-radius: 50%; padding: 8px 12px; font-size: 24px; color: black;">
        2
    </h4>
</div>
<p style="text-align: center; font-weight: bold;">
Abda Zuljiva Aslam - TEP2A<br>
                Abda Zuljiva Aslam - TEP2A
            </p>           
            <br><br>
            <div style="text-align: center;">
    <label class="inline-flex" style="font-size: 18px;">
        <input type="radio" name="kadem" id="kadem" value="2" class="form-radio" />
        <span style="margin-left: 8px;">Pilh Paslon 2</span>
    </label>
</div>
        </div>
    </div>
    &nbsp;&nbsp;
    &nbsp;&nbsp;
    <!-- Card kedua -->    &nbsp;&nbsp;
    &nbsp;&nbsp;
    &nbsp;&nbsp;
    &nbsp;&nbsp;

    <!-- Card ketiga -->
    <div class="max-w-[19rem] w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none">
        <div class="py-7 px-6">
            <div class="-mt-7 mb-7 -mx-6 rounded-tl rounded-tr h-[215px] overflow-hidden">
                <img src="http://www.ambmedan.ac.id/wp-content/uploads/2022/05/truna-karton-1.png" alt="image" class="w-full h-full object-cover" />
            </div>
            <div style="text-align: center;">
    <h4 class="badge inline-block" style="background-color: gold; border-radius: 50%; padding: 8px 12px; font-size: 24px; color: black;">
        3
    </h4>
</div>

<p style="text-align: center; font-weight: bold;">
Abda Zuljiva Aslam - TEP2A<br>
                Abda Zuljiva Aslam - TEP2A
            </p><br><br>
            <div style="text-align: center;">
    <label class="inline-flex" style="font-size: 18px;">
        <input type="radio" name="kadem" id="kadem" value="3" class="form-radio"/>
        <span style="margin-left: 8px;">Pilih Paslon 3</span>
    </label>
</div>
        </div>
    </div>
</div>

</div>
<div class="mb-1 grid gap-1 xl:grid-cols-1">
        <br><br>
                                <div class="panel h-full xl:col-span-2">
                                    <div class="mb-5 flex items-center dark:text-white-light">
                                        <h4 class="text-lg font-semibold">Voting Calon Wakil Ketua Demustar</h4>
                                        <hr>
                                    </div>
                                    <div class="flex justify-center">
                                        
    <div class="max-w-[19rem] w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none">
        <div class="py-7 px-6">
            <div class="-mt-7 mb-7 -mx-6 rounded-tl rounded-tr h-[215px] overflow-hidden">
                <img src="http://www.ambmedan.ac.id/wp-content/uploads/2022/05/truna-karton-1.png" alt="image" class="w-full h-full object-cover" />
            </div>
            <div style="text-align: center;">
    <h4 class="badge inline-block" style="background-color: gold; border-radius: 50%; padding: 8px 12px; font-size: 24px; color: black;">
        1
    </h4>
</div>
<p style="text-align: center; font-weight: bold;">
Abda Zuljiva Aslam - TEP2A<br>
                Abda Zuljiva Aslam - TEP2A
            </p><br><br>
            <div style="text-align: center;">
    <label class="inline-flex" style="font-size: 18px;">
        <input type="radio" name="wakadem" id="wakadem" value="1" class="form-radio" />
        <span style="margin-left: 8px;">Pilih Paslon 1</span>
    </label>
</div>
       </div>
    </div>
    &nbsp;&nbsp;
    &nbsp;&nbsp;
    <!-- Card kedua -->    &nbsp;&nbsp;
    &nbsp;&nbsp;
    &nbsp;&nbsp;
    &nbsp;&nbsp;

    <div class="max-w-[19rem] w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none">
        <div class="py-7 px-6">
            <div class="-mt-7 mb-7 -mx-6 rounded-tl rounded-tr h-[215px] overflow-hidden">
                <img src="http://www.ambmedan.ac.id/wp-content/uploads/2022/05/truna-karton-1.png" alt="image" class="w-full h-full object-cover" />
            </div>
            <div style="text-align: center;">
    <h4 class="badge inline-block" style="background-color: gold; border-radius: 50%; padding: 8px 12px; font-size: 24px; color: black;">
        2
    </h4>
</div>
<p style="text-align: center; font-weight: bold;">
Abda Zuljiva Aslam - TEP2A<br>
                Abda Zuljiva Aslam - TEP2A
            </p>           
            <br><br>
            <div style="text-align: center;">
    <label class="inline-flex" style="font-size: 18px;">
        <input type="radio" name="wakadem" id="wakadem" value="2" class="form-radio" />
        <span style="margin-left: 8px;">Pilh Paslon 2</span>
    </label>
</div>
        </div>
    </div>
    &nbsp;&nbsp;
    &nbsp;&nbsp;
    <!-- Card kedua -->    &nbsp;&nbsp;
    &nbsp;&nbsp;
    &nbsp;&nbsp;
    &nbsp;&nbsp;

    <!-- Card ketiga -->
    <div class="max-w-[19rem] w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none">
        <div class="py-7 px-6">
            <div class="-mt-7 mb-7 -mx-6 rounded-tl rounded-tr h-[215px] overflow-hidden">
                <img src="http://www.ambmedan.ac.id/wp-content/uploads/2022/05/truna-karton-1.png" alt="image" class="w-full h-full object-cover" />
            </div>
            <div style="text-align: center;">
    <h4 class="badge inline-block" style="background-color: gold; border-radius: 50%; padding: 8px 12px; font-size: 24px; color: black;">
        3
    </h4>
</div>

<p style="text-align: center; font-weight: bold;">
Abda Zuljiva Aslam - TEP2A<br>
                Abda Zuljiva Aslam - TEP2A
            </p><br><br>
            <div style="text-align: center;">
    <label class="inline-flex" style="font-size: 18px;">
        <input type="radio" name="wakadem" id="wakadem" value="3" class="form-radio"/>
        <span style="margin-left: 8px;">Pilih Paslon 3</span>
    </label>
</div>
        </div>
    </div>
</div></div>
<div style="display: flex; justify-content: center; margin-top: 50px;">

    <button type="reset" class="btn btn-warning">Reset</button>
   &nbsp;&nbsp;
    <button type="button" name="submit" class="btn btn-success" @click="showAlert()">Submit</button>
    <script>
    function showAlert() {
        const danyon = document.querySelector('input[name="danyon"]:checked');
        const kadem = document.querySelector('input[name="kadem"]:checked');
        const wakadem = document.querySelector('input[name="wakadem"]:checked');
        if (!danyon || !kadem || !wakadem) {
            // Jika salah satu input radio tidak dipilih
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Please select both Danyon and Kadem/Wakadem.',
                padding: '2em'
            });
        } else {
            // Saat pengguna mengonfirmasi pemilihan, kirim data ke halaman PHP
            Swal.fire({
                icon: 'warning',
                title: 'Konfirmasi:',
                text: `Apakah kamu yakin dengan pilihanmu?`,
                showCancelButton: true,
                confirmButtonText: 'Submit',
                padding: '2em',
            }).then((result) => {
                if (result.value) {
                    // Redirect ke halaman PHP dengan mengirim data menggunakan query string
                    window.location.href = `voting.php?danyon=${danyon.value}&kadem=${kadem.value}&wakadem=${wakadem.value}`;
                }
            });
    }
}
    </script>
</div>


</form>
                                        
                                    
                                    
                                </div>
                                

                                
</div>

<!-- script -->
<script>
document.addEventListener("alpine:init", () => {
    Alpine.data("countdown", () => ({
        timer2: null,
        demo2: {
            days: null,
            hours: null,
            minutes: null,
            seconds: null,
        },
        
        setTimerDemo2(endDate) {
            let countDownDate = new Date(endDate).getTime();

            this.timer2 = setInterval(() => {
                let now = new Date().getTime();

                let distance = countDownDate - now;

                this.demo2.days = Math.floor(distance / (1000 * 60 * 60 * 24));
                this.demo2.hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                this.demo2.minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                this.demo2.seconds = Math.floor((distance % (1000 * 60)) / 1000);

                if (distance < 0) {
                    clearInterval(this.timer2);
                }
            }, 500);
        },
    }));
});
</script>

</div>

<!-- script -->

                                    
                                

                <?php include ('footer.php'); ?>
    </body>

</html>

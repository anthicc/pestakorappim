<?php
session_start();
include('koneksi.php');
include('header.php');

if(!$_SESSION['nit']) {
header("Location: login.php");
}

$nit = $_SESSION['nit'];
$user = $mysqli->query("select * from users where nit = '$nit'");
$datanya = $user->fetch_assoc();

if($datanya['level'] !== "admin") {
header("location: index.php");
}

$hasildanyon1 = $mysqli->query("select * from pemilihan where danyon = '1'");
$jumlahdanyon1 = $hasildanyon1->num_rows;

$hasildanyon2 = $mysqli->query("select * from pemilihan where danyon = '2'");
$jumlahdanyon2 = $hasildanyon2->num_rows;

$hasildanyon3 = $mysqli->query("select * from pemilihan where danyon = '3'");
$jumlahdanyon3 = $hasildanyon3->num_rows;

$hasilkadem1 = $mysqli->query("select * from pemilihan where kadem = '1'");
$jumlahkadem1 = $hasilkadem1->num_rows;

$hasilkadem2 = $mysqli->query("select * from pemilihan where kadem = '2'");
$jumlahkadem2 = $hasilkadem2->num_rows;

$hasilkadem3 = $mysqli->query("select * from pemilihan where kadem = '3'");
$jumlahkadem3 = $hasilkadem3->num_rows;

$hasilwakadem1 = $mysqli->query("select * from pemilihan where kadem = '1'");
$jumlahwakadem1 = $hasilkadem1->num_rows;

$hasilwakadem2 = $mysqli->query("select * from pemilihan where kadem = '2'");
$jumlahwakadem2 = $hasilkadem2->num_rows;

$hasilwakadem3 = $mysqli->query("select * from pemilihan where kadem = '3'");
$jumlahwakadem3 = $hasilkadem3->num_rows;


if($jumlahdanyon1 > $jumlahdanyon2 && $jumlahdanyon1 > $jumlahdanyon3) {
    $jumlahdanyon = $jumlahdanyon1;
    $danyon = "CADANYON 1 - PRODI<br> CAWADANYON 1 - PRODI";
    $urutdanyon = "1";
} else if($jumlahdanyon2 > $jumlahdanyon3 && $jumlahdanyon2 > $jumlahdanyon3) {
    $jumlahdanyon = $jumlahdanyon2;
    $danyon = "CADANYON 2 - PRODI<br> CAWADANYON 2 - PRODI";
    $urutdanyon = "2";
} else {
    $jumlahdanyon = $jumlahdanyon3;
    $danyon = "CADANYON 3 - PRODI<br> CAWADANYON 3 - PRODI";
    $urutdanyon = "3";
}

if($jumlahkadem1 > $jumlahkadem2 && $jumlahkadem1 > $jumlahkadem3) {
    $jumlahkadem = $jumlahkadem1;
    $kadem = "CAKADEM 1 - PRODI";
    $urutkadem = "1";
} else if($jumlahkadem2 > $jumlahkadem1 && $jumlahkadem2 > $jumlahkadem3) {
    $jumlahkadem = $jumlahkadem2;
    $kadem = "CAKADEM 2 - PRODI";
    $urutkadem = "2";
} else {
    $jumlahkadem = $jumlahkadem3;
    $kadem = "CAKADEM 3 - PRODI";
    $urutkadem = "3";
}

if($jumlahwakadem1 > $jumlahwakadem2 && $jumlahwakadem1 > $jumlahwakadem3) {
    $jumlahwakadem = $jumlahwakadem1;
    $wakadem = "CAWAKADEM 1 - PRODI";
    $urutwakadem = "1";
} else if($jumlahwakadem2 > $jumlahwakadem1 && $jumlahwakadem2 > $jumlahwakadem3) {
    $jumlahwakadem = $jumlahwakadem2;
    $wakadem = "CAWAKADEM 2 - PRODI";
    $urutwakadem = "2";
} else {
    $jumlahwakadem = $jumlahwakadem3;
    $wakadem = "CAWAKADEM 3 - PRODI";
    $urutwakadem = "3";
}

$seluruh = $mysqli->query("select * from pemilihan");
$jumlahseluruh = $seluruh->num_rows;

$usernya = $mysqli->query("select * from users");
$jumlahuser = $usernya->num_rows;

$jumlahtidakmemilih = $jumlahuser - $jumlahseluruh;
?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                    <div>
                        <ul class="mb-6 flex space-x-2 rtl:space-x-reverse">
                            <li>
                                <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
                            </li>
                            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                                <span>Hasil Pemilihan</span>
                            </li>
                        </ul>
                        <div class="grid grid-cols-1 gap-8 lg:grid-cols-2" x-data="chart">
                            <div class="panel flex items-center overflow-x-auto whitespace-nowrap p-3 text-primary lg:col-span-2">
                                <div class="rounded-full bg-primary p-1.5 text-white ring-2 ring-primary/30 ltr:mr-3 rtl:ml-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5">
                                        <path
                                            d="M19.0001 9.7041V9C19.0001 5.13401 15.8661 2 12.0001 2C8.13407 2 5.00006 5.13401 5.00006 9V9.7041C5.00006 10.5491 4.74995 11.3752 4.28123 12.0783L3.13263 13.8012C2.08349 15.3749 2.88442 17.5139 4.70913 18.0116C9.48258 19.3134 14.5175 19.3134 19.291 18.0116C21.1157 17.5139 21.9166 15.3749 20.8675 13.8012L19.7189 12.0783C19.2502 11.3752 19.0001 10.5491 19.0001 9.7041Z"
                                            stroke="currentColor"
                                            stroke-width="1.5"
                                        />
                                        <path
                                            opacity="0.5"
                                            d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C14.0775 22 15.845 20.7478 16.5 19"
                                            stroke="currentColor"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                        />
                                    </svg>
                                </div>
                                <span class="ltr:mr-3 rtl:ml-3">Live Count Pemilihan</span>
                                <a href="#" class="block hover:underline"
                                    ></a
                                >
                            </div></div></div>
                            <br>



                            <div class="pt-5">
                            <div class="mb-1 grid gap-1 xl:grid-cols-1">
                                <div class="panel h-full xl:col-span-2">
                                    <div class="mb-5 flex items-center dark:text-white-light">
                                        <h4 class="text-lg font-semibold">Pengaturan Waktu</h4>
                                        <hr>
                                        
                                    </div>
                                    
                                    <style>

.form-container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #4caf50;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #4caf50;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        .form-group .time-input {
            display: flex;
            align-items: center;
        }

        .form-group .time-input input {
            flex: 1;
            margin-right: 10px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .countdown {
            font-size: 18px;
            margin-top: 10px;
        }

    </style>
    <center>
    <div class="form-container">
    <div class="form-group">
        <label>Status Voting:</label>
        <label class="toggle-switch">
            <input type="checkbox" id="statusVoting" name="status_voting" value="0">
            <span class="slider"></span>
        </label>
    </div>

    <div class="form-group">
        <label>Waktu:</label>
        <div class="time-input">
            <input type="number" id="waktu" name="waktu" class="form-input ltr:rounded-l-none rtl:rounded-r-none" required>
            <span>menit</span>
        </div>
    </div>

    <div class="countdown" id="countdown"></div>
</div>

<script>
    const statusVotingCheckbox = document.getElementById('statusVoting');
    const waktuInput = document.getElementById('waktu');
    const countdownElement = document.getElementById('countdown');

    let countdownInterval;

    function startCountdown(duration) {
        let timer = duration * 60;
        countdownInterval = setInterval(function () {
            const minutes = Math.floor(timer / 60);
            const seconds = timer % 60;

            countdownElement.textContent = `${minutes}:${seconds}`;

            if (--timer < 0) {
                clearInterval(countdownInterval);
                countdownElement.textContent = 'Waktu Habis';
                statusVotingCheckbox.checked = false;
                statusVotingCheckbox.disabled = true;

                const statusVoting = statusVotingCheckbox.checked ? 1 : 0;
                const waktu = waktuInput.value;

                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'update_status.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        console.log(xhr.responseText);
                        // Tambahkan logika lain sesuai kebutuhan setelah status diupdate
                    }
                };
                xhr.send(`status=${statusVoting}&waktu=${waktu}`);
            }
        }, 1000);
    }

    statusVotingCheckbox.addEventListener('change', function () {
        const statusVoting = this.checked ? 1 : 0;
        const waktu = waktuInput.value;

        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_status.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
                // Tambahkan logika lain sesuai kebutuhan setelah status diupdate
            }
        };
        xhr.send(`status=${statusVoting}&waktu=${waktu}`);

        if (this.checked) {
            const waktu = parseInt(waktuInput.value);
            startCountdown(waktu);
        } else {
            clearInterval(countdownInterval);
            countdownElement.textContent = '';
        }
    });
</script>
</center>
    </div>          
</div>

    </div>
    <div class="mb-1 grid gap-1 xl:grid-cols-1">
                                <div class="panel h-full xl:col-span-2">
                                    <div class="mb-5 flex items-center dark:text-white-light">
                                        <h4 class="text-lg font-semibold">Live Count Pemilihan</h4>
                                        <hr>
                                    </div>
                                    <div class="flex justify-center">
    <div class="text-center">
        <p class="font-semibold">Komandan Batalyon</p>
        <canvas id="pieChart1" class="rounded-lg bg-white dark:bg-black"></canvas>
    </div>

    <div class="text-center">
        <p class="font-semibold">Ketua Demustar</p>
        <canvas id="pieChart2" class="rounded-lg bg-white dark:bg-black"></canvas>
    </div>

    <div class="text-center">
        <p class="font-semibold">Wakil Ketua Demustar</p>
        <canvas id="pieChart3" class="rounded-lg bg-white dark:bg-black"></canvas>
    </div>

    <div class="text-center">
        <p class="font-semibold">Statistik Pemilihan</p>
        <canvas id="pieChart4" class="rounded-lg bg-white dark:bg-black"></canvas>
    </div>

</div>

</div>
</div></div>
<br><br>
<div class="mt-auto p-6 pt-0 text-center dark:text-white-dark ltr:sm:text-left rtl:sm:text-right">
                    © <span id="footer-year">2023</span>. Made with <span style="color: red;">🔥</span> by Tim Humas Pestakora.
                </div>
                <!-- end footer section -->
            </div>
        </div>
        <script src="assets/js/alpine-collaspe.min.js"></script>
        <script src="assets/js/alpine-persist.min.js"></script>
        <script defer src="assets/js/alpine-ui.min.js"></script>
        <script defer src="assets/js/alpine-focus.min.js"></script>
        <script defer src="assets/js/alpine.min.js"></script>
        <script src="assets/js/highlight.min.js"></script>
        <script src="assets/js/custom.js"></script>
        <script defer src="assets/js/apexcharts.js"></script>

        <script src="main.js"></script>
    </body>

<!-- Mirrored from html.vristo.sbthemes.com/charts.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Sep 2023 00:45:07 GMT -->
</html>

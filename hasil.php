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
                                <span class="ltr:mr-3 rtl:ml-3">Perbaruan Terakhir: </span>
                                <a href="#" class="block hover:underline"
                                    ><?php echo $waktu; ?></a
                                >
                            </div></div></div>
                            <br>



                            <div class="pt-5">
                            <div class="mb-1 grid gap-1 xl:grid-cols-1">
                                <div class="panel h-full xl:col-span-2">
                                    <div class="mb-5 flex items-center dark:text-white-light">
                                        <h4 class="text-lg font-semibold">Hasil Pemilihan</h4>
                                        <hr>
                                    </div>
                                    <div class="flex justify-center">
    <div class="max-w-[19rem] w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none">
        <div class="py-7 px-6">
            <div class="-mt-7 mb-7 -mx-6 rounded-tl rounded-tr h-[215px] overflow-hidden">
                <img src="icon.png" alt="image" class="w-full h-full object-cover" />
            </div>
            <div style="text-align: center;">
            <p class="text-primary text-m mb-1.5 font-bold">Paslon Komandan Batalyon Terpilih</p>

    <h4 class="badge inline-block" style="background-color: blue; border-radius: 50%; padding: 8px 12px; font-size: 24px; color: red;">
        <?php echo $urutdanyon; ?>
    </h4>
</div>
<p style="text-align: center; font-weight: bold;">
<?php echo $danyon; ?>
            </p><br><br>
            <div style="text-align: center;">
            <label class="inline-flex" style="font-size: 14px;">
    <p class="text-white-dark ">Total Suara: <b><?php echo $jumlahdanyon; ?> Suara</b></p>

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
                <img src="icon.png" alt="image" class="w-full h-full object-cover" />
            </div>
            <div style="text-align: center;">
            <p class="text-primary text-m mb-1.5 font-bold">Ketua Demustar Terpilih</p>

    <h4 class="badge inline-block" style="background-color: red; border-radius: 50%; padding: 8px 12px; font-size: 24px; color: white;">
        <?php echo $urutkadem; ?>
    </h4>
</div>
<p style="text-align: center; font-weight: bold;">
<?php echo $kadem; ?>            </p>           
            <br><br>
            <div style="text-align: center;">
            <label class="inline-flex" style="font-size: 14px;">
    <p class="text-white-dark ">Total Suara: <b><?php echo $jumlahkadem; ?> Suara</b></p>

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
                <img src="icon.png" alt="image" class="w-full h-full object-cover" />
            </div>
            <div style="text-align: center;">
            <p class="text-primary text-m mb-1.5 font-bold">Wakil Ketua Demustar Terpilih</p>

    <h4 class="badge inline-block" style="background-color: #FAFAD2; border-radius: 50%; padding: 8px 12px; font-size: 24px; color: red;">
        <?php echo $urutwakadem; ?>
    </h4>
</div>

<p style="text-align: center; font-weight: bold;">
CAWAKADEM 1 - PRODI
            </p><br><br>
            <div style="text-align: center;">
    <label class="inline-flex" style="font-size: 14px;">
    <p class="text-white-dark ">Total Suara: <b><?php echo $jumlahwakadem; ?> Suara</b></p>

    </label>
</div>
        </div>
    </div>
</div>

    </div>
    <div class="mb-1 grid gap-1 xl:grid-cols-1">
                                <div class="panel h-full xl:col-span-2">
                                    <div class="mb-5 flex items-center dark:text-white-light">
                                        <h4 class="text-lg font-semibold">Hasil Pemilihan</h4>
                                        <hr>
                                    </div>
                                    <div class="flex justify-center">
    <div class="text-center">
        <p class="font-semibold">Danyon</p>
        <div x-ref="pieChart" class="rounded-lg bg-white dark:bg-black overflow-hidden"></div>
    </div>

    <div class="text-center">
        <p class="font-semibold">Kadem</p>
        <div x-ref="pieChart2" class="rounded-lg bg-white dark:bg-black overflow-hidden"></div>
    </div>

    <div class="text-center">
        <p class="font-semibold">Wakadem</p>
        <div x-ref="pieChart3" class="rounded-lg bg-white dark:bg-black overflow-hidden"></div>
    </div>

    <div class="text-center">
        <p class="font-semibold">Pemilih</p>
        <div x-ref="donutChart" class="rounded-lg bg-white dark:bg-black overflow-hidden"></div>
    </div>
</div>

</div>
</div></div>
<br><br>
<div class="mt-auto p-6 pt-0 text-center dark:text-white-dark ltr:sm:text-left rtl:sm:text-right">
                    © <span id="footer-year">2023</span>. Made with <span style="color: red;">❤️</span> by Tim Humas Pestakora.
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

        <script>
            document.addEventListener('alpine:init', () => {
                // main section
                Alpine.data('scrollToTop', () => ({
                    showTopButton: false,
                    init() {
                        window.onscroll = () => {
                            this.scrollFunction();
                        };
                    },

                    scrollFunction() {
                        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                            this.showTopButton = true;
                        } else {
                            this.showTopButton = false;
                        }
                    },

                    goToTop() {
                        document.body.scrollTop = 0;
                        document.documentElement.scrollTop = 0;
                    },
                }));

                // theme customization
                Alpine.data('customizer', () => ({
                    showCustomizer: false,
                }));

                // sidebar section
                Alpine.data('sidebar', () => ({
                    init() {
                        const selector = document.querySelector('.sidebar ul a[href="' + window.location.pathname + '"]');
                        if (selector) {
                            selector.classList.add('active');
                            const ul = selector.closest('ul.sub-menu');
                            if (ul) {
                                let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                                if (ele) {
                                    ele = ele[0];
                                    setTimeout(() => {
                                        ele.click();
                                    });
                                }
                            }
                        }
                    },
                }));

                // header section
                Alpine.data('header', () => ({
                    init() {
                        const selector = document.querySelector('ul.horizontal-menu a[href="' + window.location.pathname + '"]');
                        if (selector) {
                            selector.classList.add('active');
                            const ul = selector.closest('ul.sub-menu');
                            if (ul) {
                                let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                                if (ele) {
                                    ele = ele[0];
                                    setTimeout(() => {
                                        ele.classList.add('active');
                                    });
                                }
                            }
                        }
                    },

                    notifications: [
                        {
                            id: 1,
                            profile: 'user-profile.jpeg',
                            message: '<strong class="text-sm mr-1">John Doe</strong>invite you to <strong>Prototyping</strong>',
                            time: '45 min ago',
                        },
                        {
                            id: 2,
                            profile: 'profile-34.jpeg',
                            message: '<strong class="text-sm mr-1">Adam Nolan</strong>mentioned you to <strong>UX Basics</strong>',
                            time: '9h Ago',
                        },
                        {
                            id: 3,
                            profile: 'profile-16.jpeg',
                            message: '<strong class="text-sm mr-1">Anna Morgan</strong>Upload a file',
                            time: '9h Ago',
                        },
                    ],

                    messages: [
                        {
                            id: 1,
                            image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-success-light dark:bg-success text-success dark:text-success-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg></span>',
                            title: 'Congratulations!',
                            message: 'Your OS has been updated.',
                            time: '1hr',
                        },
                        {
                            id: 2,
                            image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-info-light dark:bg-info text-info dark:text-info-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></span>',
                            title: 'Did you know?',
                            message: 'You can switch between artboards.',
                            time: '2hr',
                        },
                        {
                            id: 3,
                            image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-danger-light dark:bg-danger text-danger dark:text-danger-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>',
                            title: 'Something went wrong!',
                            message: 'Send Reposrt',
                            time: '2days',
                        },
                        {
                            id: 4,
                            image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-warning-light dark:bg-warning text-warning dark:text-warning-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">    <circle cx="12" cy="12" r="10"></circle>    <line x1="12" y1="8" x2="12" y2="12"></line>    <line x1="12" y1="16" x2="12.01" y2="16"></line></svg></span>',
                            title: 'Warning',
                            message: 'Your password strength is low.',
                            time: '5days',
                        },
                    ],

                    languages: [
                        {
                            id: 1,
                            key: 'Chinese',
                            value: 'zh',
                        },
                        {
                            id: 2,
                            key: 'Danish',
                            value: 'da',
                        },
                        {
                            id: 3,
                            key: 'English',
                            value: 'en',
                        },
                        {
                            id: 4,
                            key: 'French',
                            value: 'fr',
                        },
                        {
                            id: 5,
                            key: 'German',
                            value: 'de',
                        },
                        {
                            id: 6,
                            key: 'Greek',
                            value: 'el',
                        },
                        {
                            id: 7,
                            key: 'Hungarian',
                            value: 'hu',
                        },
                        {
                            id: 8,
                            key: 'Italian',
                            value: 'it',
                        },
                        {
                            id: 9,
                            key: 'Japanese',
                            value: 'ja',
                        },
                        {
                            id: 10,
                            key: 'Polish',
                            value: 'pl',
                        },
                        {
                            id: 11,
                            key: 'Portuguese',
                            value: 'pt',
                        },
                        {
                            id: 12,
                            key: 'Russian',
                            value: 'ru',
                        },
                        {
                            id: 13,
                            key: 'Spanish',
                            value: 'es',
                        },
                        {
                            id: 14,
                            key: 'Swedish',
                            value: 'sv',
                        },
                        {
                            id: 15,
                            key: 'Turkish',
                            value: 'tr',
                        },
                        {
                            id: 16,
                            key: 'Arabic',
                            value: 'ae',
                        },
                    ],

                    removeNotification(value) {
                        this.notifications = this.notifications.filter((d) => d.id !== value);
                    },

                    removeMessage(value) {
                        this.messages = this.messages.filter((d) => d.id !== value);
                    },
                }));

                Alpine.data('chart', () => ({
                    // highlightjs
                    codeArr: [],
                    toggleCode(name) {
                        if (this.codeArr.includes(name)) {
                            this.codeArr = this.codeArr.filter((d) => d != name);
                        } else {
                            this.codeArr.push(name);

                            setTimeout(() => {
                                document.querySelectorAll('pre.code').forEach((el) => {
                                    hljs.highlightElement(el);
                                });
                            });
                        }
                    },

                    lineChart: null,
                    areaChart: null,
                    columnChart: null,
                    simpleColumnStacked: null,
                    barChart: null,
                    mixedChart: null,
                    radarChart: null,
                    pieChart: null,
                    pieChart2: null,
                    pieChart3: null,

                    donutChart: null,
                    polarAreaChart: null,
                    radialBarChart: null,
                    bubbleChart: null,

                    init() {
                        isDark = this.$store.app.theme === 'dark' || this.$store.app.isDarkMode ? true : false;
                        isRtl = this.$store.app.rtlClass === 'rtl' ? true : false;

                        setTimeout(() => {
                            this.lineChart = new ApexCharts(this.$refs.lineChart, this.lineChartOptions);
                            this.lineChart.render();

                            this.areaChart = new ApexCharts(this.$refs.areaChart, this.areaChartOptions);
                            this.areaChart.render();

                            this.columnChart = new ApexCharts(this.$refs.columnChart, this.columnChartOptions);
                            this.columnChart.render();

                            this.simpleColumnStacked = new ApexCharts(this.$refs.simpleColumnStacked, this.simpleColumnStackedOptions);
                            this.simpleColumnStacked.render();

                            this.barChart = new ApexCharts(this.$refs.barChart, this.barChartOptions);
                            this.barChart.render();

                            this.mixedChart = new ApexCharts(this.$refs.mixedChart, this.mixedChartOptions);
                            this.mixedChart.render();

                            this.radarChart = new ApexCharts(this.$refs.radarChart, this.radarChartOptions);
                            this.radarChart.render();

                            this.pieChart = new ApexCharts(this.$refs.pieChart, this.pieChartOptions);
                            this.pieChart.render();

                            this.pieChart2 = new ApexCharts(this.$refs.pieChart2, this.pieChart2Options);
                            this.pieChart2.render();

                            this.pieChart3 = new ApexCharts(this.$refs.pieChart3, this.pieChart3Options);
                            this.pieChart3.render();

                            this.donutChart = new ApexCharts(this.$refs.donutChart, this.donutChartOptions);
                            this.donutChart.render();

                            this.polarAreaChart = new ApexCharts(this.$refs.polarAreaChart, this.polarAreaChartOptions);
                            this.polarAreaChart.render();

                            this.radialBarChart = new ApexCharts(this.$refs.radialBarChart, this.radialBarChartOptions);
                            this.radialBarChart.render();

                            this.bubbleChart = new ApexCharts(this.$refs.bubbleChart, this.bubbleChartOptions);
                            this.bubbleChart.render();
                        }, 300);

                        this.$watch('$store.app.theme', () => {
                            this.refreshOptions();
                        });

                        this.$watch('$store.app.rtlClass', () => {
                            this.refreshOptions();
                        });
                    },

                    refreshOptions() {
                        isDark = this.$store.app.theme === 'dark' || this.$store.app.isDarkMode ? true : false;
                        isRtl = this.$store.app.rtlClass === 'rtl' ? true : false;
                        this.lineChart.updateOptions(this.lineChartOptions);
                        this.areaChart.updateOptions(this.areaChartOptions);
                        this.columnChart.updateOptions(this.columnChartOptions);
                        this.simpleColumnStacked.updateOptions(this.simpleColumnStackedOptions);
                        this.barChart.updateOptions(this.barChartOptions);
                        this.mixedChart.updateOptions(this.mixedChartOptions);
                        this.radarChart.updateOptions(this.radarChartOptions);
                        this.pieChart.updateOptions(this.pieChartOptions);
                        this.pieChart2.updateOptions(this.pieChart2Options);
                        this.pieChart3.updateOptions(this.pieChart3Options);
                        this.donutChart.updateOptions(this.donutChartOptions);
                        this.polarAreaChart.updateOptions(this.polarAreaChartOptions);
                        this.radialBarChart.updateOptions(this.radialBarChartOptions);
                        this.bubbleChart.updateOptions(this.bubbleChartOptions);
                    },

                    get lineChartOptions() {
                        return {
                            chart: {
                                height: 300,
                                type: 'line',
                                toolbar: false,
                            },
                            colors: ['#4361ee'],
                            tooltip: {
                                marker: false,
                                y: {
                                    formatter(number) {
                                        return '$' + number;
                                    },
                                },
                            },
                            stroke: {
                                width: 2,
                                curve: 'smooth',
                            },
                            xaxis: {
                                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June'],
                                axisBorder: {
                                    color: isDark ? '#191e3a' : '#e0e6ed',
                                },
                            },
                            yaxis: {
                                opposite: isRtl ? true : false,
                                labels: {
                                    offsetX: isRtl ? -20 : 0,
                                },
                            },
                            series: [
                                {
                                    name: 'Sales',
                                    data: [45, 55, 75, 25, 45, 110],
                                },
                            ],
                            grid: {
                                borderColor: isDark ? '#191e3a' : '#e0e6ed',
                            },
                            tooltip: {
                                theme: isDark ? 'dark' : 'light',
                            },
                        };
                    },

                    get areaChartOptions() {
                        return {
                            series: [
                                {
                                    name: 'Income',
                                    data: [16800, 16800, 15500, 17800, 15500, 17000, 19000, 16000, 15000, 17000, 14000, 17000],
                                },
                            ],
                            chart: {
                                type: 'area',
                                height: 300,
                                zoom: {
                                    enabled: false,
                                },
                                toolbar: {
                                    show: false,
                                },
                            },
                            colors: ['#805dca'],
                            dataLabels: {
                                enabled: false,
                            },
                            stroke: {
                                width: 2,
                                curve: 'smooth',
                            },
                            xaxis: {
                                axisBorder: {
                                    color: isDark ? '#191e3a' : '#e0e6ed',
                                },
                            },
                            yaxis: {
                                opposite: isRtl ? true : false,
                                labels: {
                                    offsetX: isRtl ? -40 : 0,
                                },
                            },
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                            legend: {
                                horizontalAlign: 'left',
                            },
                            grid: {
                                borderColor: isDark ? '#191e3a' : '#e0e6ed',
                            },
                            tooltip: {
                                theme: isDark ? 'dark' : 'light',
                            },
                        };
                    },

                    get columnChartOptions() {
                        return {
                            series: [
                                {
                                    name: 'Net Profit',
                                    data: [44, 55, 57, 56, 61, 58, 63, 60, 66],
                                },
                                {
                                    name: 'Revenue',
                                    data: [76, 85, 101, 98, 87, 105, 91, 114, 94],
                                },
                            ],
                            chart: {
                                height: 300,
                                type: 'bar',
                                zoom: {
                                    enabled: false,
                                },
                                toolbar: {
                                    show: false,
                                },
                            },
                            colors: ['#805dca', '#e7515a'],
                            dataLabels: {
                                enabled: false,
                            },
                            stroke: {
                                show: true,
                                width: 2,
                                colors: ['transparent'],
                            },
                            plotOptions: {
                                bar: {
                                    horizontal: false,
                                    columnWidth: '55%',
                                    endingShape: 'rounded',
                                },
                            },
                            grid: {
                                borderColor: isDark ? '#191e3a' : '#e0e6ed',
                            },
                            xaxis: {
                                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                                axisBorder: {
                                    color: isDark ? '#191e3a' : '#e0e6ed',
                                },
                            },
                            yaxis: {
                                opposite: isRtl ? true : false,
                                labels: {
                                    offsetX: isRtl ? -10 : 0,
                                },
                            },
                            tooltip: {
                                theme: isDark ? 'dark' : 'light',
                                y: {
                                    formatter: function (val) {
                                        return val;
                                    },
                                },
                            },
                        };
                    },

                    get simpleColumnStackedOptions() {
                        return {
                            series: [
                                {
                                    name: 'PRODUCT A',
                                    data: [44, 55, 41, 67, 22, 43],
                                },
                                {
                                    name: 'PRODUCT B',
                                    data: [13, 23, 20, 8, 13, 27],
                                },
                            ],
                            chart: {
                                height: 300,
                                type: 'bar',
                                stacked: true,
                                zoom: {
                                    enabled: false,
                                },
                                toolbar: {
                                    show: false,
                                },
                            },
                            colors: ['#2196f3', '#3b3f5c'],
                            responsive: [
                                {
                                    breakpoint: 480,
                                    options: {
                                        legend: {
                                            position: 'bottom',
                                            offsetX: -10,
                                            offsetY: 5,
                                        },
                                    },
                                },
                            ],
                            plotOptions: {
                                bar: {
                                    horizontal: false,
                                },
                            },
                            xaxis: {
                                type: 'datetime',
                                categories: ['01/01/2011 GMT', '01/02/2011 GMT', '01/03/2011 GMT', '01/04/2011 GMT', '01/05/2011 GMT', '01/06/2011 GMT'],
                                axisBorder: {
                                    color: isDark ? '#191e3a' : '#e0e6ed',
                                },
                            },
                            yaxis: {
                                opposite: isRtl ? true : false,
                                labels: {
                                    offsetX: isRtl ? -20 : 0,
                                },
                            },
                            grid: {
                                borderColor: isDark ? '#191e3a' : '#e0e6ed',
                            },
                            legend: {
                                position: 'right',
                                offsetY: 40,
                            },
                            tooltip: {
                                theme: isDark ? 'dark' : 'light',
                            },
                            fill: {
                                opacity: 0.8,
                            },
                        };
                    },

                    get barChartOptions() {
                        return {
                            series: [
                                {
                                    name: 'Sales',
                                    data: [44, 55, 41, 67, 22, 43, 21, 70],
                                },
                            ],
                            chart: {
                                height: 300,
                                type: 'bar',
                                zoom: {
                                    enabled: false,
                                },
                                toolbar: {
                                    show: false,
                                },
                            },
                            dataLabels: {
                                enabled: false,
                            },
                            stroke: {
                                show: true,
                                width: 1,
                            },
                            colors: ['#4361ee'],
                            xaxis: {
                                categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat'],
                                axisBorder: {
                                    color: isDark ? '#191e3a' : '#e0e6ed',
                                },
                            },
                            yaxis: {
                                opposite: isRtl ? true : false,
                                reversed: isRtl ? true : false,
                            },
                            grid: {
                                borderColor: isDark ? '#191e3a' : '#e0e6ed',
                            },
                            plotOptions: {
                                bar: {
                                    horizontal: true,
                                },
                            },
                            fill: {
                                opacity: 0.8,
                            },
                        };
                    },

                    get mixedChartOptions() {
                        return {
                            series: [
                                {
                                    name: 'TEAM A',
                                    type: 'column',
                                    data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30],
                                },
                                {
                                    name: 'TEAM B',
                                    type: 'area',
                                    data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43],
                                },
                                {
                                    name: 'TEAM C',
                                    type: 'line',
                                    data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39],
                                },
                            ],
                            chart: {
                                height: 300,
                                // stacked: false,
                                zoom: {
                                    enabled: false,
                                },
                                toolbar: {
                                    show: false,
                                },
                            },
                            colors: ['#2196f3', '#00ab55', '#4361ee'],
                            stroke: {
                                width: [0, 2, 2],
                                curve: 'smooth',
                            },
                            plotOptions: {
                                bar: {
                                    columnWidth: '50%',
                                },
                            },
                            fill: {
                                opacity: [1, 0.25, 1],
                            },

                            labels: [
                                '01/01/2022',
                                '02/01/2022',
                                '03/01/2022',
                                '04/01/2022',
                                '05/01/2022',
                                '06/01/2022',
                                '07/01/2022',
                                '08/01/2022',
                                '09/01/2022',
                                '10/01/2022',
                                '11/01/2022',
                            ],
                            markers: {
                                size: 0,
                            },
                            xaxis: {
                                type: 'datetime',
                                axisBorder: {
                                    color: isDark ? '#191e3a' : '#e0e6ed',
                                },
                            },
                            yaxis: {
                                title: {
                                    text: 'Points',
                                },
                                min: 0,
                                opposite: isRtl ? true : false,
                                labels: {
                                    offsetX: isRtl ? -10 : 0,
                                },
                            },
                            grid: {
                                borderColor: isDark ? '#191e3a' : '#e0e6ed',
                            },
                            tooltip: {
                                shared: true,
                                intersect: false,
                                theme: isDark ? 'dark' : 'light',
                                y: {
                                    formatter: (y) => {
                                        if (typeof y !== 'undefined') {
                                            return y.toFixed(0) + ' points';
                                        }
                                        return y;
                                    },
                                },
                            },
                            legend: {
                                itemMargin: {
                                    horizontal: 4,
                                    vertical: 8,
                                },
                            },
                        };
                    },

                    get radarChartOptions() {
                        return {
                            series: [
                                {
                                    name: 'Series 1',
                                    data: [80, 50, 30, 40, 100, 20],
                                },
                            ],
                            chart: {
                                height: 300,
                                type: 'radar',
                                zoom: {
                                    enabled: false,
                                },
                                toolbar: {
                                    show: false,
                                },
                            },
                            colors: ['#4361ee'],
                            xaxis: {
                                categories: ['January', 'February', 'March', 'April', 'May', 'June'],
                            },
                            plotOptions: {
                                radar: {
                                    polygons: {
                                        strokeColors: isDark ? '#191e3a' : '#e0e6ed',
                                        connectorColors: isDark ? '#191e3a' : '#e0e6ed',
                                    },
                                },
                            },
                            tooltip: {
                                theme: isDark ? 'dark' : 'light',
                            },
                        };
                    },

                    get pieChartOptions() {
                        return {
                            series: [<?php echo $jumlahdanyon1; ?>, <?php echo $jumlahdanyon2; ?>, <?php echo $jumlahdanyon3; ?>, <?php echo $jumlahtidakmemilih; ?>],
                            chart: {
                                height: 300,
                                type: 'pie',
                                zoom: {
                                    enabled: false,
                                },
                                toolbar: {
                                    show: false,
                                },
                            },
                            labels: ['Paslon 1', 'Paslon 2', 'Paslon 3', 'Tidak memilih'],
                            colors: ['#4361ee', '#e7515a', '#e2a03f', '#a4aba7'],
                            responsive: [
                                {
                                    breakpoint: 480,
                                    options: {
                                        chart: {
                                            width: 600,
                                            height: 600
                                        },
                                    },
                                },
                            ],
                            stroke: {
                                show: false,
                            },
                            legend: {
                                position: 'bottom',
                            },
                        };
                    },

                    get pieChart2Options() {
                        return {
                            series: [<?php echo $jumlahkadem1; ?>, <?php echo $jumlahkadem2; ?>, <?php echo $jumlahkadem3; ?>, <?php echo $jumlahtidakmemilih; ?>],
                            chart: {
                                height: 300,
                                type: 'pie',
                                zoom: {
                                    enabled: false,
                                },
                                toolbar: {
                                    show: false,
                                },
                            },
                            labels: ['Calon A', 'Calon B', 'Calon C', 'Tidak memilih'],
                            colors: ['#4361ee', '#e7515a', '#e2a03f', '#a4aba7'],
                            responsive: [
                                {
                                    breakpoint: 480,
                                    options: {
                                        chart: {
                                            width: 600,
                                            height: 600
                                        },
                                    },
                                },
                            ],
                            stroke: {
                                show: false,
                            },
                            legend: {
                                position: 'bottom',
                            },
                        };
                    },

                    get pieChart3Options() {
                        return {
                            series: [<?php echo $jumlahwakadem1; ?>, <?php echo $jumlahwakadem2; ?>, <?php echo $jumlahwakadem3; ?>, <?php echo $jumlahtidakmemilih; ?>],
                            chart: {
                                height: 300,
                                type: 'pie',
                                zoom: {
                                    enabled: false,
                                },
                                toolbar: {
                                    show: false,
                                },
                            },
                            labels: ['Calon A', 'Calon B', 'Calon C', 'Tidak memilih'],
                            colors: ['#4361ee', '#e7515a', '#e2a03f', '#a4aba7'],
                            responsive: [
                                {
                                    breakpoint: 480,
                                    options: {
                                        chart: {
                                            width: 600,
                                            height: 600
                                        },
                                    },
                                },
                            ],
                            stroke: {
                                show: false,
                            },
                            legend: {
                                position: 'bottom',
                            },
                        };
                    },


                    get donutChartOptions() {
                        return {
                            series: [<?php echo $jumlahseluruh; ?>, <?php echo $jumlahtidakmemilih; ?>],
                            chart: {
                                height: 300,
                                type: 'donut',
                                zoom: {
                                    enabled: false,
                                },
                                toolbar: {
                                    show: false,
                                },
                            },
                            stroke: {
                                show: false,
                            },
                            labels: ['Taruna Memilih', 'Taruna Tidak Memilih'],
                            colors: ['#4361ee', '#e2a03f'],
                            responsive: [
                                {
                                    breakpoint: 480,
                                    options: {
                                        chart: {
                                            width: 200,
                                        },
                                    },
                                },
                            ],
                            legend: {
                                position: 'bottom',
                            },
                        };
                    },

                    get polarAreaChartOptions() {
                        return {
                            series: [14, 23, 21, 17, 15, 10, 12, 17, 21],
                            chart: {
                                height: 300,
                                type: 'polarArea',
                                zoom: {
                                    enabled: false,
                                },
                                toolbar: {
                                    show: false,
                                },
                            },
                            colors: ['#4361ee', '#805dca', '#00ab55', '#e7515a', '#e2a03f', '#2196f3', '#3b3f5c'],
                            stroke: {
                                show: false,
                            },
                            responsive: [
                                {
                                    breakpoint: 480,
                                    options: {
                                        chart: {
                                            width: 200,
                                        },
                                    },
                                },
                            ],
                            plotOptions: {
                                polarArea: {
                                    rings: {
                                        strokeColor: isDark ? '#191e3a' : '#e0e6ed',
                                    },
                                    spokes: {
                                        connectorColors: isDark ? '#191e3a' : '#e0e6ed',
                                    },
                                },
                            },
                            legend: {
                                position: 'bottom',
                            },
                            fill: {
                                opacity: 0.85,
                            },
                        };
                    },

                    get radialBarChartOptions() {
                        return {
                            series: [44, 55, 41],
                            chart: {
                                height: 300,
                                type: 'radialBar',
                                zoom: {
                                    enabled: false,
                                },
                                toolbar: {
                                    show: false,
                                },
                            },
                            colors: ['#4361ee', '#805dca', '#e2a03f'],
                            grid: {
                                borderColor: isDark ? '#191e3a' : '#e0e6ed',
                            },
                            plotOptions: {
                                radialBar: {
                                    dataLabels: {
                                        name: {
                                            fontSize: '22px',
                                        },
                                        value: {
                                            fontSize: '16px',
                                        },
                                        total: {
                                            show: true,
                                            label: 'Total',
                                            formatter: function (w) {
                                                // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                                                return 249;
                                            },
                                        },
                                    },
                                },
                            },
                            labels: ['Apples', 'Oranges', 'Bananas'],
                            fill: {
                                opacity: 0.85,
                            },
                        };
                    },

                    get bubbleChartOptions() {
                        return {
                            series: [
                                {
                                    name: 'Bubble1',
                                    data: this.generateData(new Date('11 Feb 2017 GMT').getTime(), 20, {
                                        min: 10,
                                        max: 60,
                                    }),
                                },
                                {
                                    name: 'Bubble2',
                                    data: this.generateData(new Date('11 Feb 2017 GMT').getTime(), 20, {
                                        min: 10,
                                        max: 60,
                                    }),
                                },
                            ],
                            chart: {
                                height: 300,
                                type: 'bubble',
                                zoom: {
                                    enabled: false,
                                },
                                toolbar: {
                                    show: false,
                                },
                            },
                            colors: ['#4361ee', '#00ab55'],
                            dataLabels: {
                                enabled: false,
                            },
                            xaxis: {
                                tickAmount: 12,
                                type: 'category',
                                axisBorder: {
                                    color: isDark ? '#191e3a' : '#e0e6ed',
                                },
                            },
                            yaxis: {
                                max: 70,
                                opposite: isRtl ? true : false,
                                labels: {
                                    offsetX: isRtl ? -10 : 0,
                                },
                            },
                            grid: {
                                borderColor: isDark ? '#191e3a' : '#e0e6ed',
                            },
                            tooltip: {
                                theme: isDark ? 'dark' : 'light',
                            },
                            stroke: {
                                colors: isDark ? ['#191e3a'] : ['#e0e6ed'],
                            },
                            fill: {
                                opacity: 0.85,
                            },
                        };
                    },

                    generateData(baseval, count, yrange) {
                        var i = 0;
                        var series = [];
                        while (i < count) {
                            var x = Math.floor(Math.random() * (750 - 1 + 1)) + 1;
                            var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
                            var z = Math.floor(Math.random() * (75 - 15 + 1)) + 15;

                            series.push([x, y, z]);
                            baseval += 86400000;
                            i++;
                        }
                        return series;
                    },
                }));
            });
        </script>
    </body>

<!-- Mirrored from html.vristo.sbthemes.com/charts.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Sep 2023 00:45:07 GMT -->
</html>

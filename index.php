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

$cek = $mysqli->query("select * from pemilihan where nit = '$nit'");
$cekk = $cek->num_rows;
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
        <script>
export default {
  mounted() {
    // Set nilai awal menu menjadi horizontal
    this.$store.app.menu = 'horizontal';
  },
  // ...
};
</script>
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
                    <div x-data="sales">
                    <ul class="mb-6 flex space-x-2 rtl:space-x-reverse">
                            <li>
                                <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
                            </li>
                            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                                <span>Dashboard</span>
                            </li>
                        </ul>

                        <div class="pt-5">
                            <div class="mb-4 grid gap-4 xl:grid-cols-3">
                                <div class="panel h-full xl:col-span-2">
                                    <div class="mb-5 flex items-center dark:text-white-light">
                                        <h5 class="text-lg font-semibold">Dashboard</h5>
                                        
                                    </div>
                                    <p class="text-lg dark:text-white-light/90">Selamat datang di <span class="ml-2 text-primary">PESTAKORA 2023</span></p>
                                    <p class="text-lg dark:text-white-light/120">Detail akun: <span class="ml-2 text-danger"><?php echo $datanya['nama']; ?></span> / <span class="ml-2 text-danger"><?php echo $datanya['prodi']; ?></span></p>
                                    <?php if($cekk > "0") { ?>
                                   <p class="text-lg dark:text-white-light/100">Status: <span class="ml-2 text-success">Sudah Memilih</span></p>

                                  <?php  } else { ?>
                                    <p class="text-lg dark:text-white-light/100">Status: <span class="ml-2 text-warning">Belum memilih</span></p>
                                    <?php } ?>
                                    <div class="relative overflow-hidden">
                                        
                                    </div>
                                </div>

                                <div class="panel h-full">
                                    <div class="mb-5 flex items-center">
                                        <h5 class="text-lg font-semibold dark:text-white-light">Waktu Mulai</h5>
                                    </div>
                                    <div class="overflow-hidden">
                                    <div x-data="countdown">
    <div class="mb-5 grid grid-cols-4 justify-items-center gap-3" x-init="setTimerDemo2('2023-11-21T20:00:00')">
    <div>
        <div class="w-13 h-13 sm:w-16 sm:h-16 shadow-[1px_2px_12px_0_rgba(31,45,61,0.10)] rounded-full border border-[#e0e6ed] dark:border-[#1b2e4b] flex justify-center flex-col">
            <h1 class="text-primary sm:text-3xl text-xl text-center" x-text="demo2.days"></h1>
        </div>
        <h4 class="text-[#3b3f5c] text-[15px] mt-4 text-center dark:text-white-dark font-semibold">Days</h4>
    </div>
    <div>
        <div class="w-13 h-13 sm:w-16 sm:h-16 shadow-[1px_2px_12px_0_rgba(31,45,61,0.10)] rounded-full border border-[#e0e6ed] dark:border-[#1b2e4b] flex justify-center flex-col">
            <h1 class="text-primary sm:text-3xl text-xl text-center" x-text="demo2.hours"></h1>
        </div>
        <h4 class="text-[#3b3f5c] text-[15px] mt-4 text-center dark:text-white-dark font-semibold">Hours</h4>
    </div>
    <div>
        <div class="w-13 h-13 sm:w-16 sm:h-16 shadow-[1px_2px_12px_0_rgba(31,45,61,0.10)] rounded-full border border-[#e0e6ed] dark:border-[#1b2e4b] flex justify-center flex-col">
            <h1 class="text-primary sm:text-3xl text-xl text-center" x-text="demo2.minutes"></h1>
        </div>
        <h4 class="text-[#3b3f5c] text-[15px] mt-4 text-center dark:text-white-dark font-semibold">Mins</h4>
    </div>
    <div>
        <div class="w-13 h-13 sm:w-16 sm:h-16 shadow-[1px_2px_12px_0_rgba(31,45,61,0.10)] rounded-full border border-[#e0e6ed] dark:border-[#1b2e4b] flex justify-center flex-col">
            <h1 class="text-primary sm:text-3xl text-xl text-center" x-text="demo2.seconds"></h1>
        </div>
        <h4 class="text-[#3b3f5c] text-[15px] mt-4 text-center dark:text-white-dark font-semibold">Sec</h4>
    </div>
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
        
        setTimerDemo2() {
            let date = new Date();
            date.setFullYear(date.getFullYear() + 1);
            let countDownDate = date.getTime();

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
    });
 });
 </script>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- end main content section -->
                </div>

                <?php include ('footer.php'); ?>
    </body>

</html>

<?php
session_start();
include('koneksi.php');
include('header.php');
ob_start(); // Memulai output buffering

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
                    <div x-data="sales">
                        <ul class="flex space-x-2 rtl:space-x-reverse">
                            
                           
                        </ul>
                        <div class="pt-5">
                        <div class="grid grid-cols-1 gap-4 xl:grid-cols-2">
                                <!-- default -->
                                <div class="panel">
                                    <div class="mb-5 flex items-center justify-between">
                                        <h5 class="text-lg font-semibold dark:text-white-light">Login Taruna</h5>
                                       
                                    </div>
                                    <div class="mb-5">
                            <?php
                            if(isset($_POST['submit'])) {
                            $nit = mysqli_real_escape_string($mysqli, $_POST['nit']);
                            $password = mysqli_real_escape_string($mysqli, $_POST['password']);
                            if(empty($nit) || empty($password)) {
                            ?>
                            <div class="flex items-center p-2 rounded text-sm text-danger bg-danger-light dark:bg-danger-dark-light">
    <span class="ltr:pr-1 rtl:pl-1"><strong class="ltr:mr-0.5 rtl:ml-0.5">Gagal!</strong> NIT / Password tidak boleh kosong.</span>
    <button type="button" class="p-1 ltr:ml-auto rtl:mr-auto hover:opacity-80">
        <svg width="12" height="12"> <!-- Ubah ukuran SVG sesuai kebutuhan -->
            <!-- Isi SVG Anda -->
        </svg>
    </button>
</div>

                            <?php
                            } else {
                            $query = $mysqli->query("select * from users where nit = '$nit' AND password = '$password'");
                            $cek = $query->num_rows;
                            if($cek < 1) {
                            ?>
                            <div class="flex items-center p-2 rounded text-sm text-danger bg-danger-light dark:bg-danger-dark-light">
    <span class="ltr:pr-1 rtl:pl-1"><strong class="ltr:mr-0.5 rtl:ml-0.5">Gagal!</strong> NIT / Password salah.</span>
    <button type="button" class="p-1 ltr:ml-auto rtl:mr-auto hover:opacity-80">
        <svg width="12" height="12"> <!-- Ubah ukuran SVG sesuai kebutuhan -->
            <!-- Isi SVG Anda -->
        </svg>
    </button>
</div>
<?php 
                            } else {
                            $_SESSION['nit'] = $nit;
                            header("Location: index.php");

                            }
                            }
                            }
                            ?>
                                        <form action="" method="post">
                                        <div class="mb-5">
                                            <label for="iconLeft">NIT</label>
                                            <div class="flex">
                                                <div class="flex items-center justify-center border border-[#e0e6ed] bg-[#eee] px-3 font-semibold ltr:rounded-l-md ltr:border-r-0 rtl:rounded-r-md rtl:border-l-0 dark:border-[#17263c] dark:bg-[#1b2e4b]">
                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white-dark">
    <circle cx="12" cy="9" r="7" stroke="currentColor" stroke-width="1.5"></circle>
    <path d="M12 12V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
    <path d="M19.0001 9.7041V9C19.0001 5.13401 15.8661 2 12.0001 2C8.13407 2 5.00006 5.13401 5.00006 9V9.7041C5.00006 10.5491 4.74995 11.3752 4.28123 12.0783L3.13263 13.8012C2.08349 15.3749 2.88442 17.5139 4.70913 18.0116C9.48258 19.3134 14.5175 19.3134 19.291 18.0116C21.1157 17.5139 21.9166 15.3749 20.8675 13.8012L19.7189 12.0783C19.2502 11.3752 19.0001 10.5491 19.0001 9.7041Z" stroke="currentColor" stroke-width="1.5"></path>
    <path d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C14.0775 22 15.845 20.7478 16.5 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
    <path d="M12 6V10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
</svg>
                                                </div>
                                                <input id="iconLeft" type="text" placeholder="NIT" name="nit" class="form-input ltr:rounded-l-none rtl:rounded-r-none">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="iconRight">Password</label>
                                            <div class="flex">
                                            <div class="flex items-center justify-center border border-[#e0e6ed] bg-[#eee] px-3 font-semibold ltr:rounded-l-md ltr:border-r-0 rtl:rounded-r-md rtl:border-l-0 dark:border-[#17263c] dark:bg-[#1b2e4b]">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white-dark">
    <path d="M12 2C7.02944 2 3 6.02944 3 11V15C3 19.9706 7.02944 24 12 24C16.9706 24 21 19.9706 21 15V11C21 6.02944 16.9706 2 12 2Z" stroke="currentColor" stroke-width="1.5"></path>
    <path d="M7.29999 10.0001L9.89999 12.6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
    <path d="M12 16H12.01" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
</svg>
                                                </div>
                                                <input id="iconLeft" type="password" placeholder="Password" name="password" class="form-input ltr:rounded-l-none rtl:rounded-r-none">
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="flex justify-end space-x-4">
    <button type="reset" class="btn btn-warning">Reset</button>
    <button type="submit" name="submit" class="btn btn-primary">Login</button>
</div></form>
                                </div>
                                        

                                <!-- simple icon -->
                                <div class="panel">
                                    <div class="mb-5 flex items-center justify-between">
                                        <h5 class="text-lg font-semibold dark:text-white-light">PESTAKORA 2023</h5>
                                        
                                    </div>
                                    <div class="mb-5">
                                        <div class="mb-5">
                                            <p>
                                             PESTAKORA adalah akronim dari PESTA DEMOKRASI TARUNA PPI MADIUN
                                             <br>Taruna Bisa Taruna Bersuara   
                                            </p>
                                        </div>
                                    </div>
                                    <template x-if="codeArr.includes('code2')">
                                        <pre class="code overflow-auto rounded-md !bg-[#191e3a] p-4 text-white">&lt;!-- left --&gt;
&lt;div class="flex"&gt;
    &lt;div class="bg-[#eee] flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border ltr:border-r-0 rtl:border-l-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]"&gt;
        &lt;svg&gt; ... &lt;/svg&gt;
    &lt;/div&gt;
    &lt;input id="iconLeft" type="text" placeholder="Notification" class="form-input ltr:rounded-l-none rtl:rounded-r-none" /&gt;
&lt;/div&gt;

&lt;!-- right --&gt;
&lt;div class="flex"&gt;
    &lt;input id="iconRight" type="text" placeholder="Notification" class="form-input ltr:rounded-r-none rtl:rounded-l-none" /&gt;
    &lt;div class="bg-[#eee] flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border ltr:border-l-0 rtl:border-r-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]"&gt;
        &lt;svg&gt; ... &lt;/svg&gt;
    &lt;/div&gt;
&lt;/div&gt;
</pre>
                                    </template>
                                </div>

                                <!-- spinning Icon -->
                                

                                <!-- dropdown icon -->
                               

                                <!-- checkbox -->
                                

                                <!-- radio -->
                               

                                <!-- switch -->
                             
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

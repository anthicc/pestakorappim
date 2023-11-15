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

$sql = $mysqli->query("select * from users");
$data = array();
while($row = $sql->fetch_assoc()) {
     // Anda dapat mengisi tombol delete sesuai kebutuhan
     $data[] = array(
        $row['id'],
        $row['nit'],
        $row['nama'],
        $row['prodi'],
        $row['password'],
        "ya",
        "ga"

     );
}

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
        <div x-data="customizer">
            <div
                class="fixed inset-0 z-[51] hidden bg-[black]/60 px-4 transition-[display]"
                :class="{'!block': showCustomizer}"
                @click="showCustomizer = false"
            ></div>

            <nav
                class="fixed top-0 bottom-0 z-[51] w-full max-w-[400px] bg-white p-4 shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] transition-[right] duration-300 ltr:-right-[400px] rtl:-left-[400px] dark:bg-[#0e1726]"
                :class="{'ltr:!right-0 rtl:!left-0' : showCustomizer}"
            >
                <a
                    href="javascript:;"
                    class="absolute top-0 bottom-0 my-auto flex h-10 w-12 cursor-pointer items-center justify-center bg-primary text-white ltr:-left-12 ltr:rounded-tl-full ltr:rounded-bl-full rtl:-right-12 rtl:rounded-tr-full rtl:rounded-br-full"
                    @click="showCustomizer = !showCustomizer"
                >
                    <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 animate-[spin_3s_linear_infinite]"
                    >
                        <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.5" />
                        <path
                            opacity="0.5"
                            d="M13.7654 2.15224C13.3978 2 12.9319 2 12 2C11.0681 2 10.6022 2 10.2346 2.15224C9.74457 2.35523 9.35522 2.74458 9.15223 3.23463C9.05957 3.45834 9.0233 3.7185 9.00911 4.09799C8.98826 4.65568 8.70226 5.17189 8.21894 5.45093C7.73564 5.72996 7.14559 5.71954 6.65219 5.45876C6.31645 5.2813 6.07301 5.18262 5.83294 5.15102C5.30704 5.08178 4.77518 5.22429 4.35436 5.5472C4.03874 5.78938 3.80577 6.1929 3.33983 6.99993C2.87389 7.80697 2.64092 8.21048 2.58899 8.60491C2.51976 9.1308 2.66227 9.66266 2.98518 10.0835C3.13256 10.2756 3.3397 10.437 3.66119 10.639C4.1338 10.936 4.43789 11.4419 4.43786 12C4.43783 12.5581 4.13375 13.0639 3.66118 13.3608C3.33965 13.5629 3.13248 13.7244 2.98508 13.9165C2.66217 14.3373 2.51966 14.8691 2.5889 15.395C2.64082 15.7894 2.87379 16.193 3.33973 17C3.80568 17.807 4.03865 18.2106 4.35426 18.4527C4.77508 18.7756 5.30694 18.9181 5.83284 18.8489C6.07289 18.8173 6.31632 18.7186 6.65204 18.5412C7.14547 18.2804 7.73556 18.27 8.2189 18.549C8.70224 18.8281 8.98826 19.3443 9.00911 19.9021C9.02331 20.2815 9.05957 20.5417 9.15223 20.7654C9.35522 21.2554 9.74457 21.6448 10.2346 21.8478C10.6022 22 11.0681 22 12 22C12.9319 22 13.3978 22 13.7654 21.8478C14.2554 21.6448 14.6448 21.2554 14.8477 20.7654C14.9404 20.5417 14.9767 20.2815 14.9909 19.902C15.0117 19.3443 15.2977 18.8281 15.781 18.549C16.2643 18.2699 16.8544 18.2804 17.3479 18.5412C17.6836 18.7186 17.927 18.8172 18.167 18.8488C18.6929 18.9181 19.2248 18.7756 19.6456 18.4527C19.9612 18.2105 20.1942 17.807 20.6601 16.9999C21.1261 16.1929 21.3591 15.7894 21.411 15.395C21.4802 14.8691 21.3377 14.3372 21.0148 13.9164C20.8674 13.7243 20.6602 13.5628 20.3387 13.3608C19.8662 13.0639 19.5621 12.558 19.5621 11.9999C19.5621 11.4418 19.8662 10.9361 20.3387 10.6392C20.6603 10.4371 20.8675 10.2757 21.0149 10.0835C21.3378 9.66273 21.4803 9.13087 21.4111 8.60497C21.3592 8.21055 21.1262 7.80703 20.6602 7C20.1943 6.19297 19.9613 5.78945 19.6457 5.54727C19.2249 5.22436 18.693 5.08185 18.1671 5.15109C17.9271 5.18269 17.6837 5.28136 17.3479 5.4588C16.8545 5.71959 16.2644 5.73002 15.7811 5.45096C15.2977 5.17191 15.0117 4.65566 14.9909 4.09794C14.9767 3.71848 14.9404 3.45833 14.8477 3.23463C14.6448 2.74458 14.2554 2.35523 13.7654 2.15224Z"
                            stroke="currentColor"
                            stroke-width="1.5"
                        />
                    </svg>
                </a>
                <div class="perfect-scrollbar h-full overflow-y-auto overflow-x-hidden">
                    <div class="relative pb-5 text-center">
                        <a
                            href="javascript:;"
                            class="absolute top-0 opacity-30 hover:opacity-100 ltr:right-0 rtl:left-0 dark:text-white"
                            @click="showCustomizer = false"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24px"
                                height="24px"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="h-5 w-5"
                            >
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </a>
                        <h4 class="mb-1 dark:text-white">TEMPLATE CUSTOMIZER</h4>
                        <p class="text-white-dark">Set preferences that will be cookied for your live preview demonstration.</p>
                    </div>
                    <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
                        <h5 class="mb-1 text-base leading-none dark:text-white">Color Scheme</h5>
                        <p class="text-xs text-white-dark">Overall light or dark presentation.</p>
                        <div class="mt-3 grid grid-cols-3 gap-2">
                            <button
                                type="button"
                                class="btn"
                                :class="[$store.app.theme === 'light' ? 'btn-primary' :'btn-outline-primary']"
                                @click="$store.app.toggleTheme('light')"
                            >
                                <svg
                                    width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2"
                                >
                                    <circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="1.5"></circle>
                                    <path d="M12 2V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path d="M12 20V22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path d="M4 12L2 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path d="M22 12L20 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path
                                        opacity="0.5"
                                        d="M19.7778 4.22266L17.5558 6.25424"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                    ></path>
                                    <path
                                        opacity="0.5"
                                        d="M4.22217 4.22266L6.44418 6.25424"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                    ></path>
                                    <path
                                        opacity="0.5"
                                        d="M6.44434 17.5557L4.22211 19.7779"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                    ></path>
                                    <path
                                        opacity="0.5"
                                        d="M19.7778 19.7773L17.5558 17.5551"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                    ></path>
                                </svg>
                                Light
                            </button>
                            <button
                                type="button"
                                class="btn"
                                :class="[$store.app.theme === 'dark' ? 'btn-primary' :'btn-outline-primary']"
                                @click="$store.app.toggleTheme('dark')"
                            >
                                <svg
                                    width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2"
                                >
                                    <path
                                        d="M21.0672 11.8568L20.4253 11.469L21.0672 11.8568ZM12.1432 2.93276L11.7553 2.29085V2.29085L12.1432 2.93276ZM21.25 12C21.25 17.1086 17.1086 21.25 12 21.25V22.75C17.9371 22.75 22.75 17.9371 22.75 12H21.25ZM12 21.25C6.89137 21.25 2.75 17.1086 2.75 12H1.25C1.25 17.9371 6.06294 22.75 12 22.75V21.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75V1.25C6.06294 1.25 1.25 6.06294 1.25 12H2.75ZM15.5 14.25C12.3244 14.25 9.75 11.6756 9.75 8.5H8.25C8.25 12.5041 11.4959 15.75 15.5 15.75V14.25ZM20.4253 11.469C19.4172 13.1373 17.5882 14.25 15.5 14.25V15.75C18.1349 15.75 20.4407 14.3439 21.7092 12.2447L20.4253 11.469ZM9.75 8.5C9.75 6.41182 10.8627 4.5828 12.531 3.57467L11.7553 2.29085C9.65609 3.5593 8.25 5.86509 8.25 8.5H9.75ZM12 2.75C11.9115 2.75 11.8077 2.71008 11.7324 2.63168C11.6686 2.56527 11.6538 2.50244 11.6503 2.47703C11.6461 2.44587 11.6482 2.35557 11.7553 2.29085L12.531 3.57467C13.0342 3.27065 13.196 2.71398 13.1368 2.27627C13.0754 1.82126 12.7166 1.25 12 1.25V2.75ZM21.7092 12.2447C21.6444 12.3518 21.5541 12.3539 21.523 12.3497C21.4976 12.3462 21.4347 12.3314 21.3683 12.2676C21.2899 12.1923 21.25 12.0885 21.25 12H22.75C22.75 11.2834 22.1787 10.9246 21.7237 10.8632C21.286 10.804 20.7293 10.9658 20.4253 11.469L21.7092 12.2447Z"
                                        fill="currentColor"
                                    ></path>
                                </svg>
                                Dark
                            </button>
                            <button
                                type="button"
                                class="btn"
                                :class="[$store.app.theme === 'system' ? 'btn-primary' :'btn-outline-primary']"
                                @click="$store.app.toggleTheme('system')"
                            >
                                <svg
                                    width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2"
                                >
                                    <path
                                        d="M3 9C3 6.17157 3 4.75736 3.87868 3.87868C4.75736 3 6.17157 3 9 3H15C17.8284 3 19.2426 3 20.1213 3.87868C21 4.75736 21 6.17157 21 9V14C21 15.8856 21 16.8284 20.4142 17.4142C19.8284 18 18.8856 18 17 18H7C5.11438 18 4.17157 18 3.58579 17.4142C3 16.8284 3 15.8856 3 14V9Z"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                    ></path>
                                    <path opacity="0.5" d="M22 21H2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path opacity="0.5" d="M15 15H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                </svg>
                                System
                            </button>
                        </div>
                    </div>

                    <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
                        <h5 class="mb-1 text-base leading-none dark:text-white">Navigation Position</h5>
                        <p class="text-xs text-white-dark">Select the primary navigation paradigm for your app.</p>
                        <div class="mt-3 grid grid-cols-3 gap-2">
                            <button
                                type="button"
                                class="btn"
                                :class="[$store.app.menu === 'horizontal' ? 'btn-primary' :'btn-outline-primary']"
                                @click="$store.app.toggleMenu('horizontal')"
                            >
                                Horizontal
                            </button>
                            <button
                                type="button"
                                class="btn"
                                :class="[$store.app.menu === 'vertical' ? 'btn-primary' :'btn-outline-primary']"
                                @click="$store.app.toggleMenu('vertical')"
                            >
                                Vertical
                            </button>
                            <button
                                type="button"
                                class="btn"
                                :class="[$store.app.menu === 'collapsible-vertical' ? 'btn-primary' :'btn-outline-primary']"
                                @click="$store.app.toggleMenu('collapsible-vertical')"
                            >
                                Collapsible
                            </button>
                        </div>
                        <div class="mt-5 text-primary">
                            <label class="mb-0 inline-flex">
                                <input
                                    x-model="$store.app.semidark"
                                    type="checkbox"
                                    :value="true"
                                    class="form-checkbox"
                                    @change="$store.app.toggleSemidark()"
                                />
                                <span>Semi Dark (Sidebar & Header)</span>
                            </label>
                        </div>
                    </div>
                    <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
                        <h5 class="mb-1 text-base leading-none dark:text-white">Layout Style</h5>
                        <p class="text-xs text-white-dark">Select the primary layout style for your app.</p>
                        <div class="mt-3 flex gap-2">
                            <button
                                type="button"
                                class="btn flex-auto"
                                :class="[$store.app.layout === 'boxed-layout' ? 'btn-primary' :'btn-outline-primary']"
                                @click="$store.app.toggleLayout('boxed-layout')"
                            >
                                Box
                            </button>
                            <button
                                type="button"
                                class="btn flex-auto"
                                :class="[$store.app.layout === 'full' ? 'btn-primary' :'btn-outline-primary']"
                                @click="$store.app.toggleLayout('full')"
                            >
                                Full
                            </button>
                        </div>
                    </div>
                    <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
                        <h5 class="mb-1 text-base leading-none dark:text-white">Direction</h5>
                        <p class="text-xs text-white-dark">Select the direction for your app.</p>
                        <div class="mt-3 flex gap-2">
                            <button
                                type="button"
                                class="btn flex-auto"
                                :class="[$store.app.rtlClass === 'ltr' ? 'btn-primary' :'btn-outline-primary']"
                                @click="$store.app.toggleRTL('ltr')"
                            >
                                LTR
                            </button>
                            <button
                                type="button"
                                class="btn flex-auto"
                                :class="[$store.app.rtlClass === 'rtl' ? 'btn-primary' :'btn-outline-primary']"
                                @click="$store.app.toggleRTL('rtl')"
                            >
                                RTL
                            </button>
                        </div>
                    </div>

                    <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
                        <h5 class="mb-1 text-base leading-none dark:text-white">Navbar Type</h5>
                        <p class="text-xs text-white-dark">Sticky or Floating.</p>
                        <div class="mt-3 flex items-center gap-3 text-primary">
                            <label class="mb-0 inline-flex">
                                <input x-model="$store.app.navbar" type="radio" value="navbar-sticky" class="form-radio" @change="$store.app.toggleNavbar()" />
                                <span>Sticky</span>
                            </label>
                            <label class="mb-0 inline-flex">
                                <input
                                    x-model="$store.app.navbar"
                                    type="radio"
                                    value="navbar-floating"
                                    class="form-radio"
                                    @change="$store.app.toggleNavbar()"
                                />
                                <span>Floating</span>
                            </label>
                            <label class="mb-0 inline-flex">
                                <input x-model="$store.app.navbar" type="radio" value="navbar-static" class="form-radio" @change="$store.app.toggleNavbar()" />
                                <span>Static</span>
                            </label>
                        </div>
                    </div>

                    <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
                        <h5 class="mb-1 text-base leading-none dark:text-white">Router Transition</h5>
                        <p class="text-xs text-white-dark">Animation of main content.</p>
                        <div class="mt-3">
                            <select x-model="$store.app.animation" class="form-select border-primary text-primary" @change="$store.app.toggleAnimation()">
                                <option value="">None</option>
                                <option value="animate__fadeIn">Fade</option>
                                <option value="animate__fadeInDown">Fade Down</option>
                                <option value="animate__fadeInUp">Fade Up</option>
                                <option value="animate__fadeInLeft">Fade Left</option>
                                <option value="animate__fadeInRight">Fade Right</option>
                                <option value="animate__slideInDown">Slide Down</option>
                                <option value="animate__slideInLeft">Slide Left</option>
                                <option value="animate__slideInRight">Slide Right</option>
                                <option value="animate__zoomIn">Zoom In</option>
                            </select>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- end theme customizer section -->

        <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
            <!-- start sidebar section -->
            <?php include ('sidebar.php'); ?>
            <!-- end sidebar section -->

            <div class="main-content flex flex-col min-h-screen">
                <!-- start header section -->
                <?php include ('headerbar.php'); ?>

                <!-- end header section -->

                <div class="animate__animated p-6" :class="[$store.app.animation]">
                    <!-- start main content section -->
                    <div x-data="multipleTable">
                        <div class="panel flex items-center overflow-x-auto whitespace-nowrap p-3 text-primary">
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
                            <span class="ltr:mr-3 rtl:ml-3">Documentation: </span>
                            <a href="https://www.npmjs.com/package/simple-datatables" target="_blank" class="block hover:underline">
                                https://www.npmjs.com/package/simple-datatables
                            </a>
                        </div>
                        <div class="panel mt-6">
                            <h5 class="mb-5 text-lg font-semibold dark:text-white-light md:absolute md:top-[25px] md:mb-0">Table 1</h5>
                            <table id="myTable1" class="whitespace-nowrap"></table>
                        </div>
                       
                    </div>
                    <!-- end main content section -->

                </div>

                <!-- start footer section -->
                <div class="p-6 pt-0 mt-auto text-center dark:text-white-dark ltr:sm:text-left rtl:sm:text-right">
                    © <span id="footer-year">2022</span>. Vristo All rights reserved.
                    
                </div>
                <!-- end footer section -->
            </div>
        </div>

        <script src="assets/js/highlight.min.js"></script>
        <script src="assets/js/alpine-collaspe.min.js"></script>
        <script src="assets/js/alpine-persist.min.js"></script>
        <script defer src="assets/js/alpine-ui.min.js"></script>
        <script defer src="assets/js/alpine-focus.min.js"></script>
        <script defer src="assets/js/alpine.min.js"></script>
        <script src="assets/js/custom.js"></script>
        <script src="assets/js/simple-datatables.js"></script>
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

                   

                    

                    removeNotification(value) {
                        this.notifications = this.notifications.filter((d) => d.id !== value);
                    },

                    removeMessage(value) {
                        this.messages = this.messages.filter((d) => d.id !== value);
                    },
                }));

                Alpine.data('multipleTable', () => ({
                    datatable1: null,
                    datatable2: null,
                    init() {
                        this.datatable1 = new simpleDatatables.DataTable('#myTable1', {
                            data: {
                                headings: ['No', 'NIT', 'Nama', 'Prodi', 'Password', 'Edit', 'Delete'],
                                data: <?php echo json_encode($data); ?>,
                            },
                            searchable: true,
                            perPage: 10,
                            perPageSelect: [10, 20, 30, 50, 100],
                            columns: [
                                {
                                    select: 0,
                                    render: (data, cell, row) => {
                                        return `<div class="flex items-center w-max"><img class="w-9 h-9 rounded-full ltr:mr-2 rtl:ml-2 object-cover" src="assets/images/profile-${
                                            row.dataIndex + 1
                                        }.jpeg" />${data}</div>`;
                                    },
                                    sort: 'asc',
                                },
                                {
                                    select: 3,
                                    render: (data, cell, row) => {
                                        return this.formatDate(data);
                                    },
                                },
                                {
                                    select: 6,
                                    render: (data, cell, row) => {
                                        return '<span class="badge bg-' + this.randomColor() + '">' + this.randomStatus() + '</span>';
                                    },
                                },
                                {
                                    select: 7,
                                    sortable: false,
                                    render: (data, cell, row) => {
                                        return '<div class="text-center"><button type="button" x-tooltip="Delete"> <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"> <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" /> <path d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /> </svg> </button></div>';
                                    },
                                },
                            ],
                            firstLast: true,
                            firstText:
                                '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                            lastText:
                                '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M11 19L17 12L11 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M6.99976 19L12.9998 12L6.99976 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                            prevText:
                                '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                            nextText:
                                '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                            labels: {
                                perPage: '{select}',
                            },
                            layout: {
                                top: '{search}',
                                bottom: '{info}{select}{pager}',
                            },
                        });

                        this.datatable2 = new simpleDatatables.DataTable('#myTable2', {
                            data: {
                                headings: ['Name', 'Progress', 'Company', 'Start Date', 'Email', 'Phone No.', 'Action'],
                                data: [
                                    ['Caroline Jensen', 39, 'POLARAX', '2004-05-28', 'carolinejensen@zidant.com', '+1 (821) 447-3782', ''],
                                    ['Celeste Grant', 32, 'MANGLO', '1989-11-19', 'celestegrant@polarax.com', '+1 (838) 515-3408', ''],
                                    ['Tillman Forbes', 26, 'APPLIDECK', '2016-09-05', 'tillmanforbes@manglo.com', '+1 (969) 496-2892', ''],
                                    ['Daisy Whitley', 21, 'VOLAX', '1987-03-23', 'daisywhitley@applideck.com', '+1 (861) 564-2877', ''],
                                    ['Weber Bowman', 26, 'ORBAXTER', '1983-02-24', 'weberbowman@volax.com', '+1 (962) 466-3483', ''],
                                    ['Buckley Townsend', 40, 'OPPORTECH', '2011-05-29', 'buckleytownsend@orbaxter.com', '+1 (884) 595-2643', ''],
                                    ['Latoya Bradshaw', 24, 'GORGANIC', '2010-11-23', 'latoyabradshaw@opportech.com', '+1 (906) 474-3155', ''],
                                    ['Kate Lindsay', 24, 'AVIT', '1987-07-02', 'katelindsay@gorganic.com', '+1 (930) 546-2952', ''],
                                    ['Marva Sandoval', 28, 'QUILCH', '2010-11-02', 'marvasandoval@avit.com', '+1 (927) 566-3600', ''],
                                    ['Decker Russell', 27, 'MEMORA', '1994-04-21', 'deckerrussell@quilch.com', '+1 (846) 535-3283', ''],
                                    ['Odom Mills', 34, 'ZORROMOP', '2010-01-24', 'odommills@memora.com', '+1 (995) 525-3402', ''],
                                    ['Sellers Walters', 28, 'ORBOID', '1975-11-12', 'sellerswalters@zorromop.com', '+1 (830) 430-3157', ''],
                                    ['Wendi Powers', 31, 'SNORUS', '1979-06-02', 'wendipowers@orboid.com', '+1 (863) 457-2088', ''],
                                    ['Sophie Horn', 22, 'XTH', '2018-09-20', 'sophiehorn@snorus.com', '+1 (885) 418-3948', ''],
                                    ['Levine Rodriquez', 27, 'COMTRACT', '1973-02-08', 'levinerodriquez@xth.com', '+1 (999) 565-3239', ''],
                                    ['Little Hatfield', 33, 'ZIDANT', '2012-01-03', 'littlehatfield@comtract.com', '+1 (812) 488-3011', ''],
                                    ['Larson Kelly', 20, 'SUREPLEX', '2010-06-14', 'larsonkelly@zidant.com', '+1 (892) 484-2162', ''],
                                    ['Kendra Molina', 31, 'DANJA', '2002-07-19', 'kendramolina@sureplex.com', '+1 (920) 528-3330', ''],
                                    ['Ebony Livingston', 33, 'EURON', '1994-10-18', 'ebonylivingston@danja.com', '+1 (970) 591-3039', ''],
                                    ['Kaufman Rush', 39, 'ILLUMITY', '2011-07-10', 'kaufmanrush@euron.com', '+1 (924) 463-2934', ''],
                                    ['Frank Hays', 31, 'SYBIXTEX', '2005-06-15', 'frankhays@illumity.com', '+1 (930) 577-2670', ''],
                                    ['Carmella Mccarty', 21, 'ZEDALIS', '1980-03-06', 'carmellamccarty@sybixtex.com', '+1 (876) 456-3218', ''],
                                    ['Massey Owen', 40, 'DYNO', '2012-03-01', 'masseyowen@zedalis.com', '+1 (917) 567-3786', ''],
                                    ['Lottie Lowery', 36, 'MULTIFLEX', '1982-10-10', 'lottielowery@dyno.com', '+1 (912) 539-3498', ''],
                                    ['Addie Luna', 32, 'PHARMACON', '1988-05-01', 'addieluna@multiflex.com', '+1 (962) 537-2981', ''],
                                ],
                            },
                            searchable: true,
                            perPage: 10,
                            perPageSelect: [10, 20, 30, 50, 100],
                            columns: [
                                {
                                    select: 0,
                                    render: (data, cell, row) => {
                                        return `<div class="flex items-center w-max"><img class="w-9 h-9 rounded-full ltr:mr-2 rtl:ml-2 object-cover" src="assets/images/profile-${
                                            row.dataIndex + 1
                                        }.jpeg" />${data}</div>`;
                                    },
                                    sort: 'asc',
                                },
                                {
                                    select: 1,
                                    sortable: false,
                                    render: (data, cell, row) => {
                                        return `<div class="w-4/5 min-w-[100px] h-2.5 bg-[#ebedf2] dark:bg-dark/40 rounded-full flex"> <div class="bg-${this.randomColor()} h-2.5 rounded-full rounded-bl-full text-center text-white text-xs" style="width:${data}%"></div> </div>`;
                                    },
                                },
                                {
                                    select: 3,
                                    render: (data, cell, row) => {
                                        return this.formatDate(data);
                                    },
                                },
                                {
                                    select: 6,
                                    sortable: false,
                                    render: (data, cell, row) => {
                                        return `<div class="flex items-center">
                                            <button type="button" class="ltr:mr-2 rtl:ml-2" x-tooltip="Edit">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5">
                                                    <path d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844L7.47919 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z" stroke="currentColor" stroke-width="1.5" />
                                                    <path opacity="0.5" d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015" stroke="currentColor" stroke-width="1.5" />
                                                </svg>
                                            </button>
                                            <button type="button" x-tooltip="Delete">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                                    <path opacity="0.5" d="M9.17065 4C9.58249 2.83481 10.6937 2 11.9999 2C13.3062 2 14.4174 2.83481 14.8292 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                    <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                    <path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                    <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                    <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                            </button>
                                        </div>`;
                                    },
                                },
                            ],
                            firstLast: true,
                            firstText:
                                '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                            lastText:
                                '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M11 19L17 12L11 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M6.99976 19L12.9998 12L6.99976 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                            prevText:
                                '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                            nextText:
                                '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                            labels: {
                                perPage: '{select}',
                            },
                            layout: {
                                top: '{search}',
                                bottom: '{info}{select}{pager}',
                            },
                        });
                    },

                    formatDate(date) {
                        if (date) {
                            const dt = new Date(date);
                            const month = dt.getMonth() + 1 < 10 ? '0' + (dt.getMonth() + 1) : dt.getMonth() + 1;
                            const day = dt.getDate() < 10 ? '0' + dt.getDate() : dt.getDate();
                            return day + '/' + month + '/' + dt.getFullYear();
                        }
                        return '';
                    },

                    randomColor() {
                        const color = ['primary', 'secondary', 'success', 'danger', 'warning', 'info'];
                        const random = Math.floor(Math.random() * color.length);
                        return color[random];
                    },

                    randomStatus() {
                        const status = ['PAID', 'APPROVED', 'FAILED', 'CANCEL', 'SUCCESS', 'PENDING', 'COMPLETE'];
                        const random = Math.floor(Math.random() * status.length);
                        return status[random];
                    },
                }));
            });
        </script>
    </body>
</html>

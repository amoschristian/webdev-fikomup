<?php
$folder_template = web_info('url') . '/' . folder_template();
?>

<link rel='stylesheet' type='text/css' href='<?= $folder_template . '/styles/header_custom.css' ?>'>
<link rel='stylesheet' type='text/css' href='<?= $folder_template . '/styles/responsive.css' ?>'>

<header class="header d-flex flex-row">
    <div class="header_content d-flex flex-row align-items-center">
        <!-- Logo -->
        <div class="logo_container">
            <div class="logo">
                <a href="/"><img src="<?= $folder_template . '/images/logo_fikomup.png' ?>" alt="logo/brand"></a>
               
            </div>
            
        </div>

        <div class="des_container">
        <span>Faculty of Communication</span>
        <span>Universitas Pancasila</span>
        </div>

        <!-- Main Navigation -->
        <nav class="main_nav_container">
            <div class="main_nav">
                <ul class="main_nav_list">
                    <li class="main_nav_item"><a href="/">Admissions</a></li>
                    <li class="main_nav_item"><a href="#">Courses</a></li>
                    <li class="main_nav_item"><a href="/event">Events</a></li>
                    <li class="main_nav_item"><a href="/news">Publications</a></li>
                    <li class="main_nav_item"><a href="/about-us">About Us</a></li>
                    <li class="main_nav_item"><a href="#">Partners</a></li>
                    <li class="main_nav_item"><a href="/contact">Contact</a></li>
                </ul>
            </div>
        </nav>
    </div>


    <!-- Hamburger -->
    <div class="hamburger_container">
        <i class="fas fa-bars trans_200"></i>
    </div>

</header>

<div class="menu_container menu_mm">

    <!-- Menu Close Button -->
    <div class="menu_close_container">
        <div class="menu_close"></div>
    </div>

    <!-- Menu Items -->
    <div class="menu_inner menu_mm">
        <div class="menu menu_mm">
            <ul class="menu_list menu_mm">
                <li class="menu_item menu_mm"><a href="/">Admissions</a></li>
                <li class="menu_item menu_mm"><a href="#">Courses</a></li>
                <li class="menu_item menu_mm"><a href="/event">Events</a></li>
                <li class="menu_item menu_mm"><a href="/news">Publications</a></li>
                <li class="menu_item menu_mm"><a href="/about-us">About Us</a></li>
                <li class="menu_item menu_mm"><a href="#">Partners</a></li>
                <li class="menu_item menu_mm"><a href="/contact">Contact</a></li>
            </ul>

            <div class="menu_copyright menu_mm">FIKom UP</div>
        </div>

    </div>
</div>
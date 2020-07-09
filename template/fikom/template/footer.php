<?php
$folder_template = web_info('url') . '/' . folder_template();
?>

<footer class="footer">
    <div class="container">

        <!-- Footer Content -->

        <div class="footer_content">
            <div class="row">

                <!-- Footer Column - About -->
                <div class="col-lg-3 footer_col">

                    <!-- Logo -->
                    <div class="logo_container">
                        <div class="logo">

                            <span><img src="/media/source/fikomup_logo.png" style="width:150px; height:100px"></img></span>
                        </div>
                    </div>

                    <p class="footer_about_text"><?= $lang->t('Faculty of Communication') ?> <?= $lang->t('Universitas Pancasila') ?></p>

                </div>

                <!-- Footer Column - Menu -->

                <div class="col-lg-3 footer_col">
                    <div class="footer_column_title"><?= $lang->t('Menu') ?></div>
                    <div class="footer_column_content">
                        <ul>
                            <li class="footer_list_item"><a href="/admission"><?= $lang->t('Admissions') ?></a></li>
                            <li class="footer_list_item"><a href="/course"><?= $lang->t('Courses') ?></a></li>
                            <li class="footer_list_item"><a href="/event"><?= $lang->t('Events') ?></a></li>
                            <li class="footer_list_item"><a href="/news"><?= $lang->t('News') ?></a></li>
                            <li class="footer_list_item"><a href="/about-us"><?= $lang->t('About Us') ?></a></li>
                            <li class="footer_list_item"><a href="/partners"><?= $lang->t('Partners') ?></a></li>
                            <li class="footer_list_item"><a href="/contact"><?= $lang->t('Contact') ?></a></li>
                        </ul>
                    </div>
                </div>

                <!-- Footer Column - Contact -->

                <div class="col-lg-3 footer_col">
                    <div class="footer_column_title"><?= $lang->t('Contact') ?></div>
                    <div class="footer_column_content">
                        <ul>
                            <li class="footer_contact_item">
                                <div class="footer_contact_icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                Jl. Srengseng Sawah, Jagakarsa, Jakarta Selatan, 12640
                            </li>
                            <li class="footer_contact_item">
                                <div class="footer_contact_icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                021-787 0451
                            </li>
                            <li class="footer_contact_item">
                                <div class="footer_contact_icon">
                                    <i class="far fa-envelope"></i>
                                </div>
                                fikomup@univpancasila.ac.id
                            </li>
                            <li class="footer_contact_item">
                                <div class="footer_contact_icon">
                                    <i class="fab fa-instagram"></i>
                                </div>
                                @fikomup
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Footer Column - Usefull Links -->

                <div class="col-lg-3 footer_col">
                    <div class="footer_column_title"><?= $lang->t('Language') ?></div>
                    <div class="footer_column_content">
                        <ul>
                            <li class="footer_list_item"><i class="fa fa-language" aria-hidden="true"></i> <a href="/lang/en">English</a></li>
                            <li class="footer_list_item"><i class="fa fa-language" aria-hidden="true"></i> <a href="/lang/id">Bahasa Indonesia</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <!-- Footer Copyright -->

        <div class="footer_bar d-flex flex-column flex-sm-row align-items-center">
            <div class="footer_copyright">
                <span>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy; <?= date('Y'); ?> FikomUp
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
            </div>
            <div class="footer_social ml-sm-auto">
                <!-- <ul class="menu_social">
                    <li class="menu_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                    <li class="menu_social_item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    <li class="menu_social_item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li class="menu_social_item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="menu_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                </ul> -->
            </div>
        </div>

    </div>
</footer>
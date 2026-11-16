<footer class="container footer">
    <div class="footer_top-banner">
        <?php
        if (has_custom_logo()) {
            the_custom_logo();
        } else { ?>
            <a href="<?= site_url(); ?>">
                <img src="<?= THEME_URI . '/assets/img/global/logo-vector.svg' ?>" alt="<?php bloginfo('title') ?>"
                     class="footer_default-logo">
            </a>
        <?php } ?>

        <p>
            تولزلند فروشگاه اینترنتی تخصصی ابزار آلات صنعتی و خانگی است. این مجموعه با هدف همراهی در انتخاب، ارائه
            مشاوره تخصصی و فروش محصولات متنوع با بهترین قیمت بازار شکل گرفته است. حضور چندین ساله در بازار، شناخت کامل
            بازار و برندهای معتبر به همراه تیم پشتیبانی قوی و متخصص به ما این امکان را داده است که علاوه بر فروش محصولات
            با بهترین قیمت بازار با ارائه مشاوره در تمامی مراحل قبل و بعد از خرید همراه شما باشیم. تلاش ما خلق تجربه
            خریدی آسان و با اطمینان برای تمام افراد است.
        </p>

        <div class="contact-info">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="contact-info_icon">
                <path d="M13 2a9 9 0 0 1 9 9"/>
                <path d="M13 6a5 5 0 0 1 5 5"/>
                <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"/>
            </svg>

            <p class="contact-info_phone">021-65010690</p>
            <p class="contact-info_description">همیشه آنلاین هستیم</p>
        </div>
    </div>

    <section class="footer_body"></section>

    <section class="footer_bottom-banner"></section>

    <section class="footer_copyright"></section>
</footer>

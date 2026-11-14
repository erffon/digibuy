<header class="container">
    <div class="top-bar">
        <p>تخصیص اعتبار اولیه تا ۳۰ میلیون تومان</p>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="top-bar_icon"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
    </div>
    <div class="header">

            <?php
            if (has_custom_logo()) {
                the_custom_logo();
            } else { ?>
                <img src="<?= THEME_URI . '/assets/img/global/logo-vector.svg' ?>" alt="<?php bloginfo('title') ?>" class="header_default-logo">
            <?php } ?>


        <div class="header_search">
            <input type="text" name="searchbar" id="searchbar" class="header_search_input" placeholder="جستجو">

            <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="header_search_icon"><path d="m21 21-4.34-4.34"/><circle cx="11" cy="11" r="8"/></svg>


        </div>

        <div class="header_buttons">

            <button class="header_buttons_cart">
                <span><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                     class="lucide lucide-shopping-bag preview-icon">
                    <path d="M16 10a4 4 0 0 1-8 0"/>
                    <path d="M3.103 6.034h17.794"/>
                    <path d="M3.4 5.467a2 2 0 0 0-.4 1.2V20a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6.667a2 2 0 0 0-.4-1.2l-2-2.667A2 2 0 0 0 17 2H7a2 2 0 0 0-1.6.8z"/>
                </svg>


            </button>

            <button class="header_buttons_profile">
                <span><?= is_user_logged_in()?get_userdata(get_current_user_id())->display_name:'حساب کاربری' ?></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                     class="lucide lucide-user-round preview-icon">
                    <circle cx="12" cy="8" r="5"/>
                    <path d="M20 21a8 8 0 0 0-16 0"/>
                </svg>
            </button>
        </div>
    </div>
</header>
<header class="container">
    <div class="header">
    <?php
    if (has_custom_logo()) {
        the_custom_logo();
    } else { ?>
        <img src="<?= THEME_URI . '/assets/img/global/logo-vector.svg' ?>" alt="<?php bloginfo('title') ?>">
    <?php } ?>


        <div class="header_search">
            <input type="text" name="searchbar" id="searchbar" class="header_search_input" placeholder="جستجو">

            <svg class="header_search_icon" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round"
                 aria-hidden="true">
                <path d="m21 21-4.34-4.34"/>
                <circle cx="11" cy="11" r="8"/>
            </svg>

        </div>
    </div>
</header>
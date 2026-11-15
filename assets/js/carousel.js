jQuery(function ($) {
    'use strict';

    $('.dgb-carousel').each(function () {
        const $carousel = $(this);

        const viewport = $carousel.find('.embla__viewport')[0];
        const $prev = $carousel.find('.embla__prev');
        const $next = $carousel.find('.embla__next');

        if (!viewport) return;

        // جلوگیری از مقداردهی اولیه تکراری
        if ($carousel.data('embla')) return;

        const embla = EmblaCarousel(viewport, {
            loop: false,
            direction: 'rtl',
            align: 'start',
            containScroll: 'trimSnaps',
            slidesToScroll: 1,
            dragFree: false
        });

        // ذخیره instance
        $carousel.data('embla', embla);

        // دکمه قبلی
        $prev.on('click', function () {
            embla.scrollPrev();
        });

        // دکمه بعدی
        $next.on('click', function () {
            embla.scrollNext();
        });

        // مدیریت وضعیت دکمه‌ها
        const updateButtons = () => {
            $prev.prop('disabled', !embla.canScrollPrev());
            $next.prop('disabled', !embla.canScrollNext());
        };

        embla.on('select', updateButtons);
        embla.on('reInit', updateButtons);

        updateButtons();
    });
});
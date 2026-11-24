<?php
/**
 * Component: Product Card
 *
 * @var array $args
 */

$defaults = array(
        'post_id' => null,
        'thumbnail' => null,
        'title' => null,
        'subtitle' => null,
        'href' => null,
);
$data = wp_parse_args($args ?? [], $defaults);
?>

<div class="sidebar-card-wrapper">
    <div class="thumb-wrapper">
        <img src="<?= $data['thumbnail']; ?>" alt="">
    </div>
    <h3 class="card-title"><?= $data['title'] ?></h3>
    <p>تسسسست</p>
</div>

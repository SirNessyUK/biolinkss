<?php defined('ALTUMCODE') || die() ?>

<?php ob_start() ?>

<div class="my-3">
    <iframe width="100%" height="300" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?= $link->location_url ?>&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
</div>

<?php $html = ob_get_clean(); ?>

<?php return (object) ['html' => $html] ?>


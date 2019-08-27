<?php defined('ALTUMCODE') || die() ?>

<?php ob_start() ?>

<div class="my-3">
    <iframe width="100%" height="350" scrolling="no" frameborder="no" src="https://player.twitch.tv/?channel=<?= $embed ?>&autoplay=false"></iframe>
</div>

<?php $html = ob_get_clean(); ?>

<?php return (object) ['html' => $html] ?>


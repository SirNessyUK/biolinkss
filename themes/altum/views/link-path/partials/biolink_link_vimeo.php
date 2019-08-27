<?php defined('ALTUMCODE') || die() ?>

<?php ob_start() ?>

<div class="my-3">
    <iframe width="100%" height="350" scrolling="no" frameborder="no" src="https://player.vimeo.com/video/<?= $embed ?>"></iframe>
</div>
<?php $html = ob_get_clean(); ?>

<?php return (object) ['html' => $html] ?>


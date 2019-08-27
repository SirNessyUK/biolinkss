<?php defined('ALTUMCODE') || die() ?>

<div class="container">

    <?php display_notifications() ?>

    <div class="d-flex justify-content-center">
        <div class="card card-shadow  col-xs-12 col-sm-10 col-md-6 col-lg-4">
            <div class="card-body">

                <h4 class="card-title d-flex justify-content-between">
                    <?= $this->language->lost_password->header ?>

                    <small><?= get_back_button('login') ?></small>
                </h4>

                <form action="" method="post" role="form">
                    <div class="form-group mt-5">
                        <input type="text" name="email" class="form-control form-control-border" value="<?= $data->values['email'] ?>" placeholder="<?= $this->language->lost_password->input->email ?>" aria-label="<?= $this->language->lost_password->input->email ?>" required="required" />
                    </div>

                    <div class="form-group mt-5">
                        <?php $data->captcha->display() ?>
                    </div>

                    <div class="form-group mt-5">
                        <button type="submit" name="submit" class="btn btn-primary btn-block my-1"><?= $this->language->global->submit ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<?php ob_start() ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php \Altum\Event::add_content(ob_get_clean(), 'head') ?>

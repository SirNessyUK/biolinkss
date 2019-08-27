<?php defined('ALTUMCODE') || die() ?>

<div class="container">

    <?php display_notifications() ?>

    <div class="d-flex justify-content-center">
        <div class="card card-shadow  col-xs-12 col-sm-10 col-md-6 col-lg-4">
            <div class="card-body">

                <h4 class="card-title"><?= $this->language->login->header ?></h4>
                <small><a href="lost-password" class="text-muted" role="button"><?= $this->language->login->button->lost_password ?></a> / <a href="resend-activation" class="text-muted" role="button"><?= $this->language->login->button->resend_activation ?></a></small>

                <form action="" method="post" role="form">
                    <div class="form-group mt-5">
                        <input type="text" name="email" class="form-control form-control-border" placeholder="<?= $this->language->login->input->email ?>" value="<?= $data->values['email'] ?>" aria-label="<?= $this->language->login->input->email ?>" required="required" />
                    </div>

                    <div class="form-group mt-5">
                        <input type="password" name="password" class="form-control form-control-border" placeholder="<?= $this->language->login->input->password ?>" aria-label="<?= $this->language->login->input->password ?>" required="required" />
                    </div>

                    <div class="form-check mt-5">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="rememberme">
                            <?= $this->language->login->input->remember_me ?>
                        </label>
                    </div>


                    <div class="form-group mt-5">
                        <button type="submit" name="submit" class="btn btn-primary btn-block my-1"><?= $this->language->login->button->login ?></button>
                    </div>

                    <?php if($this->settings->register_is_enabled): ?>
                    <div class="form-group">
                        <a href="<?= url('register') ?>" class="btn btn-light btn-block"><?= $this->language->login->button->register ?></a>
                    </div>
                    <?php endif ?>

                    <div class="row">
                        <?php if($this->settings->facebook->is_enabled): ?>
                            <div class="col-sm mt-1">
                                <a href="<?= $data->facebook_login_url ?>" class="btn btn-primary btn-block"><?= sprintf($this->language->login->button->facebook, "<i class=\"fab fa-facebook fa-lg\"></i>") ?></a>
                            </div>
                        <?php endif ?>

                        <?php if($this->settings->instagram->is_enabled): ?>
                            <div class="col-sm mt-1">
                                <a href="<?= $data->instagram_login_url ?>" class="btn btn-primary btn-block"><?= sprintf($this->language->login->button->instagram, "<i class=\"fab fa-instagram fa-lg\"></i>") ?></a>
                            </div>
                        <?php endif ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

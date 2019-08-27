<?php defined('ALTUMCODE') || die() ?>

<div class="container">
    <?php display_notifications() ?>

    <div class="d-flex justify-content-center">
        <div class="card card-shadow  col-xs-12 col-sm-10 col-md-6 col-lg-4">
            <div class="card-body">

                <h4 class="card-title"><?= $this->language->register->header ?></h4>
                <small><a href="login" class="text-muted" role="button"><?= $this->language->register->subheader ?></a></small>

                <form action="" method="post" role="form">
                    <div class="form-group mt-5">
                        <input type="text" name="name" class="form-control form-control-border" value="<?= $data->values['name'] ?>" placeholder="<?= $this->language->register->input->name ?>" aria-label="<?= $this->language->register->input->name ?>" required="required" />
                    </div>

                    <div class="form-group mt-5">
                        <input type="text" name="email" class="form-control form-control-border" value="<?= $data->values['email'] ?>" placeholder="<?= $this->language->register->input->email ?>" aria-label="<?= $this->language->register->input->email ?>" required="required" />
                    </div>

                    <div class="form-group mt-5">
                        <input type="password" name="password" class="form-control form-control-border" value="<?= $data->values['password'] ?>" placeholder="<?= $this->language->register->input->password ?>" aria-label="<?= $this->language->register->input->password ?>" required="required" />
                    </div>

                    <div class="form-group mt-5">
                        <?php $data->captcha->display() ?>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" name="accept" type="checkbox" required="required">
                            <?= sprintf(
                                    $this->language->register->input->accept,
                                    '<a href="' . $this->settings->terms_and_conditions_url . '">' . $this->language->register->input->terms_and_conditions . '</a>',
                                '<a href="' . $this->settings->privacy_policy_url . '">' . $this->language->register->input->privacy_policy . '</a>'
                            ) ?>
                        </label>
                    </div>

                    <div class="form-group mt-5">
                        <button type="submit" name="submit" class="btn btn-primary btn-block"><?= $this->language->global->submit ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php ob_start() ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php \Altum\Event::add_content(ob_get_clean(), 'head') ?>


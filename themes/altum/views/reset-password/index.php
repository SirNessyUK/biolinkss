<?php defined('ALTUMCODE') || die() ?>

<div class="container">

    <?php display_notifications() ?>

    <div class="d-flex justify-content-center">
        <div class="card card-shadow  col-xs-12 col-sm-10 col-md-6 col-lg-4">
            <div class="card-body">

                <h4 class="card-title">
                    <?= $this->language->reset_password->header ?>
                </h4>

                <form action="" method="post" role="form">
                    <input type="hidden" name="email" value="<?= $data->values['email'] ?>" class="form-control" />

                    <div class="form-group mt-5">
                        <input type="password" name="new_password" class="form-control form-control-border" placeholder="<?= $this->language->reset_password->input->new_password ?>" aria-label="<?= $this->language->reset_password->input->new_password ?>" required="required" />
                    </div>

                    <div class="form-group mt-5">
                        <input type="password" name="repeat_password" class="form-control form-control-border" placeholder="<?= $this->language->reset_password->input->repeat_password ?>" aria-label="<?= $this->language->reset_password->input->repeat_password ?>" required="required" />
                    </div>

                    <div class="form-group mt-5">
                        <button type="submit" name="submit" class="btn btn-primary btn-block my-1"><?= $this->language->global->submit ?></button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>

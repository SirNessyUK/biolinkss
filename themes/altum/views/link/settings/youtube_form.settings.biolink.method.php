<?php defined('ALTUMCODE') || die() ?>

<form name="update_biolink_" method="post" role="form">
    <input type="hidden" name="token" value="<?= \Altum\Middlewares\Csrf::get() ?>" required="required" />
    <input type="hidden" name="request_type" value="update" />
    <input type="hidden" name="type" value="biolink" />
    <input type="hidden" name="subtype" value="youtube" />
    <input type="hidden" name="link_id" value="<?= $row->link_id ?>" />

    <div class="notification-container"></div>

    <div class="form-group">
        <label><i class="fa fa-signature"></i> <?= $this->language->create_biolink_youtube_modal->input->location_url ?></label>
        <input type="text" class="form-control" name="location_url" value="<?= $row->location_url ?>" placeholder="<?= $this->language->create_biolink_youtube_modal->input->location_url_placeholder ?>" required="required" />
    </div>

    <div class="text-center modal-content-button">
        <button type="submit" name="submit" class="btn btn-primary"><?= $this->language->global->update ?></button>
    </div>
</form>

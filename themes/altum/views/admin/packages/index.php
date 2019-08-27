<?php defined('ALTUMCODE') || die() ?>

<div class="d-flex justify-content-between">
    <h1><span class="underline"><?= $this->language->admin_packages->header ?></span></h1>

    <div>
        <a href="<?= url('admin/package-create') ?>" class="btn btn-success rounded-pill"><i class="fa fa-plus-circle"></i> <?= $this->language->admin_packages->add_new ?></a>
    </div>
</div>

<?php display_notifications() ?>

<div class="mt-5 table-responsive table-custom-container">
    <table class="table table-custom">
        <thead class="thead-black">
        <tr>
            <th><?= $this->language->admin_packages->table->name ?></th>
            <th><?= $this->language->admin_packages->table->monthly_price ?></th>
            <th><?= $this->language->admin_packages->table->annual_price ?></th>
            <th><?= $this->language->admin_packages->table->is_enabled ?></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $this->settings->package_free->name ?></td>
                <td>-</td>
                <td>-</td>
                <td><?= $this->settings->package_free->is_enabled ? '<span class="badge badge-pill badge-success">' . $this->language->global->active . '</span>' : '<span class="badge badge-pill badge-warning">' . $this->language->global->disabled . '</span>' ?></td>
                <td><?= get_admin_options_button('package', 'free') ?></td>
            </tr>

            <tr>
                <td><?= $this->settings->package_trial->name ?></td>
                <td>-</td>
                <td>-</td>
                <td><?= $this->settings->package_trial->is_enabled ? '<span class="badge badge-pill badge-success">' . $this->language->global->active . '</span>' : '<span class="badge badge-pill badge-warning">' . $this->language->global->disabled . '</span>' ?></td>
                <td><?= get_admin_options_button('package', 'trial') ?></td>
            </tr>

            <tr>
                <td><?= $this->settings->package_custom->name ?></td>
                <td>-</td>
                <td>-</td>
                <td><span class="badge badge-pill badge-info"><?= $this->language->global->hidden ?></span></td>
                <td></td>
            </tr>

        <?php while($row = $data->packages_result->fetch_object()): ?>

            <tr>
                <td><?= $row->name ?></td>
                <td><?= $row->monthly_price . ' ' . $this->settings->payment->currency ?></td>
                <td><?= $row->annual_price . ' ' . $this->settings->payment->currency ?></td>
                <td><?= $row->is_enabled ? '<span class="badge badge-pill badge-success">' . $this->language->global->active . '</span>' : '<span class="badge badge-pill badge-warning">' . $this->language->global->disabled . '</span>' ?></td>
                <td><?= get_admin_options_button('package', $row->package_id) ?></td>
            </tr>

        <?php endwhile ?>
        </tbody>
    </table>
</div>

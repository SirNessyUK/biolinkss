<?php

namespace Altum\Controllers;

use Altum\Database\Database;
use Altum\Middlewares\Csrf;
use Altum\Middlewares\Authentication;

class AdminPackages extends Controller {

    public function index() {

        Authentication::guard('admin');

        $packages_result = Database::$database->query("SELECT * FROM `packages` ORDER BY `package_id` ASC");

        /* Main View */
        $data = [
            'packages_result' => $packages_result
        ];

        $view = new \Altum\Views\View('admin/packages/index', (array) $this);

        $this->addViewContent('content', $view->run($data));

    }

    public function delete() {

        Authentication::guard();

        $package_id = (isset($this->params[0])) ? $this->params[0] : false;

        if(!Csrf::check()) {
            $_SESSION['error'][] = $this->language->global->error_message->invalid_csrf_token;
        }

        if(empty($_SESSION['error'])) {

            /* Delete the user */
            Database::$database->query("DELETE FROM `packages` WHERE `package_id` = {$package_id}");

            redirect('admin/packages');

        }

        die();
    }

}

<?php

namespace Altum\Controllers;


class Index extends Controller {

    public function index() {

        /* Custom index redirect if set */
        if(!empty($this->settings->index_url)) {
            header('Location: ' . $this->settings->index_url);
            die();
        }

        /* Packages View */
        $data = [
            'simple_package_settings' => [
                'no_ads',
                'removable_branding',
                'custom_branding',
                'custom_colored_links',
                'statistics',
                'google_analytics',
                'facebook_pixel',
                'custom_backgrounds'
            ]
        ];

        $view = new \Altum\Views\View('partials/packages', (array) $this);

        $this->addViewContent('packages', $view->run($data));


        /* Main View */
        $data = [];

        $view = new \Altum\Views\View('index/index', (array) $this);

        $this->addViewContent('content', $view->run($data));

    }

}

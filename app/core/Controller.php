<?php

namespace Altum\Controllers;

use Altum\Models\Page;
use Altum\Routing\Router;

class Controller {
    public $views = [];

    public function __construct(Array $params = []) {

        $this->addParams($params);

    }

    public function addParams(Array $params = []) {

        /* Make the params available to the Controller */
        foreach($params as $key => $value) {
            $this->{$key} = $value;
        }

    }

    public function addViewContent($name, $data) {

        $this->views[$name] = $data;

    }

    public function run() {

        if(Router::$path == 'link') {
            $wrapper = new \Altum\Views\View('link-path/wrapper', (array) $this);
        }

        if(Router::$path == '') {
            /* Get the top menu custom pages */
            $pages = (new Page(['database' => $this->database]))->getPages('1');

            /* Establish the menu view */
            $menu = new \Altum\Views\View('partials/menu', (array) $this);
            $this->addViewContent('menu', $menu->run([ 'pages' => $pages ]));

            /* Get the footer */
            $pages = (new Page(['database' => $this->database]))->getPages('0');

            /* Establish the footer view */
            $footer = new \Altum\Views\View('partials/footer', (array) $this);
            $this->addViewContent('footer', $footer->run([ 'pages' => $pages ]));

            $wrapper = new \Altum\Views\View('wrapper', (array) $this);
        }


        if(Router::$path == 'admin') {
            /* Establish the side menu view */
            $side_menu = new \Altum\Views\View('admin/partials/side_menu', (array) $this);
            $this->addViewContent('side_menu', $side_menu->run());

            /* Establish the top menu view */
            $top_menu = new \Altum\Views\View('admin/partials/top_menu', (array) $this);
            $this->addViewContent('top_menu', $top_menu->run());

            /* Establish the footer view */
            $footer = new \Altum\Views\View('admin/partials/footer', (array) $this);
            $this->addViewContent('footer', $footer->run());

            $wrapper = new \Altum\Views\View('admin/wrapper', (array) $this);
        }

        echo $wrapper->run();
    }


}

<?php

namespace Altum\Views;

class View {

    public $view;
    public $view_path;

    public function __construct($view, Array $params = []) {

        $this->view = $view;
        $this->view_path = THEME_PATH . 'views/' . $view . '.php';

        $this->addParams($params);

    }

    public function addParams(Array $params = []) {

        /* Make the params available to the View */
        foreach($params as $key => $value) {
            $this->{$key} = $value;
        }

    }

    public function run($data = []) {

        $data = (object) $data;

        ob_start();

        require $this->view_path;

        return ob_get_clean();
    }

}
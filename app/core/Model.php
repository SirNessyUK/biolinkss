<?php

namespace Altum\Models;

class Model {

    public $model;

    public function __construct(Array $params = []) {

        $this->addParams($params);

    }

    public function addParams(Array $params = []) {

        /* Make the params available to the Model */
        foreach($params as $key => $value) {
            $this->{$key} = $value;
        }

    }

}
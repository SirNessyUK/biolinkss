<?php

namespace Altum\Controllers;

use Altum\Database\Database;
use Altum\Middlewares\Authentication;

class AdminStatistics extends Controller {

    public function index() {

        Authentication::guard('admin');

        $start_date = isset($this->params[0]) ? Database::clean_string($this->params[0]) : (new \DateTime())->modify('-30 day')->format('Y-m-d');
        $end_date = isset($this->params[1]) ? Database::clean_string($this->params[1]) : (new \DateTime())->format('Y-m-d');
        $processed_date = ($start_date && $end_date && \Altum\Date::validate($start_date, 'Y-m-d') && \Altum\Date::validate($end_date, 'Y-m-d')) ? $start_date . ',' . $end_date : false;

        /* Main View */
        $data = [
            'start_date' => $start_date,
            'end_date' => $end_date,
            'processed_date' => $processed_date,
        ];

        $view = new \Altum\Views\View('admin/statistics/index', (array) $this);

        $this->addViewContent('content', $view->run($data));

    }

}

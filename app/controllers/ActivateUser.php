<?php

namespace Altum\Controllers;

use Altum\Database\Database;
use Altum\Logger;
use Altum\Middlewares\Authentication;

class ActivateUser extends Controller {

    public function index() {

        Authentication::guard('guest');

        $email = (isset($this->params[0])) ? $this->params[0] : false;
        $email_activation_code = (isset($this->params[1])) ? $this->params[1] : false;

        $redirect = 'dashboard';
        if(isset($_GET['redirect']) && $redirect = $_GET['redirect']) {
            $redirect = Database::clean_string($redirect);
        }

        if(!$email || !$email_activation_code) redirect();

        /* Check if the activation code is correct */
        if(!$user_id = Database::simple_get('user_id', 'users', ['email' => $email, 'email_activation_code' => $email_activation_code])) redirect();

        $user_agent = Database::clean_string($_SERVER['HTTP_USER_AGENT']);

        /* Activate the account and reset the email_activation_code */
        $stmt = Database::$database->prepare("UPDATE `users` SET `active` = 1, `email_activation_code` = '', `last_user_agent` = ?, `total_logins` = `total_logins` + 1 WHERE `user_id` = ?");
        $stmt->bind_param('ss', $user_agent, $user_id);
        $stmt->execute();
        $stmt->close();

        Logger::users($user_id, 'activate.success');

        /* Login and set a successful message */
        $_SESSION['user_id'] = $user_id;
        $_SESSION['success'][] = $this->language->global->success_message->user_activated;

        Logger::users($user_id, 'login.success');

        redirect($redirect);

    }

}

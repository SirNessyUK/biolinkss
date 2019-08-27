<?php

namespace Altum\Controllers;

use Altum\Captcha;
use Altum\Database\Database;
use Altum\Middlewares\Authentication;

class ResendActivation extends Controller {

    public function index() {

        Authentication::guard('guest');

        /* Default values */
        $values = [
            'email' => ''
        ];

        /* Initiate captcha */
        $captcha = new Captcha([
            'recaptcha' => $this->settings->captcha->recaptcha_is_enabled,
            'recaptcha_public_key' => $this->settings->captcha->recaptcha_public_key,
            'recaptcha_private_key' => $this->settings->captcha->recaptcha_private_key
        ]);

        if(!empty($_POST)) {
            /* Clean the posted variable */
            $_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $values['email'] = $_POST['email'];

            /* Check for any errors */
            if (!$captcha->is_valid()) {
                $_SESSION['error'][] = $this->language->global->error_message->invalid_captcha;
            }

            /* If there are no errors, resend the activation link */
            if (empty($_SESSION['error'])) {
                $this_account = Database::get(['user_id', 'active', 'name', 'email'], 'users', ['email' => $_POST['email']]);

                if ($this_account && !(bool) $this_account->active) {
                    /* Generate new email code */
                    $email_code = md5($_POST['email'] . microtime());

                    /* Update the current activation email */
                    Database::$database->query("UPDATE `users` SET `email_activation_code` = '{$email_code}' WHERE `user_id` = {$this_account->user_id}");

                    /* Prepare the email */
                    $email_template = get_email_template(
                        [
                            '{{NAME}}' => $this_account->name,
                            '{{WEBSITE_TITLE}}' => $this->settings->title
                        ],
                        $this->settings->email_templates->activation_subject,
                        [
                            '{{ACTIVATION_LINK}}' => url('activate-user/' . $this_account->email . '/' . $email_code),
                            '{{NAME}}' => $this_account->name,
                            '{{WEBSITE_TITLE}}' => $this->settings->title
                        ],
                        $this->settings->email_templates->activation_body
                    );

                    /* Send the email */
                    send_mail($this->settings, $_POST['email'], $email_template->subject, $email_template->body);

                }

                /* Store success message */
                $_SESSION['success'][] = $this->language->resend_activation->notice_message->success;
            }
        }

        /* Prepare the View */
        $data = [
            'values'    => $values,
            'captcha'   => $captcha
        ];

        $view = new \Altum\Views\View('resend-activation/index', (array) $this);

        $this->addViewContent('content', $view->run($data));

    }

}

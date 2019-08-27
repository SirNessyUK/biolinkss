<?php

namespace Altum\Models;

use Altum\Database\Database;

class User extends Model {

    public function get($user_id) {

        $data = Database::get('*', 'users', ['user_id' => $user_id]);

        if($data) {

            /* Parse the users package settings */
            $data->package_settings = json_decode($data->package_settings);

        }

        return $data;
    }

    public function delete($user_id) {

        Database::$database->query("DELETE FROM `users` WHERE `user_id` = {$user_id}");

    }

    public function update_last_activity($user_id) {

        Database::update('users', ['last_activity' => \Altum\Date::get()], ['user_id' => $user_id]);

    }

}

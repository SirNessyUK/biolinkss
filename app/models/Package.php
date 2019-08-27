<?php

namespace Altum\Models;

use Altum\Database\Database;

class Package extends Model {

    public function getPackageById($packageId) {

        switch($packageId) {

            case 'free':

                return $this->settings->package_free;

                break;

            case 'trial':

                return $this->settings->package_trial;

                break;

            case 'custom':

                return $this->settings->package_custom;

                break;

            default:

                $package = Database::get('*', 'packages', ['package_id' => $packageId]);

                $package->settings = json_decode($package->settings);

                return $package;

                break;

        }

    }

}

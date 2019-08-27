<?php

namespace Altum;

class Language {
    public static $language;
    public static $languages = [];
    public static $path;
    public static $defaultLanguage;
    public static $languageObject = null;

    public static function initialize($path, $defaultLanguage) {

        self::$path = $path;
        self::$defaultLanguage = $defaultLanguage;
        self::$language = self::$defaultLanguage;

        /* Determine all the langauges available in the directory */
        foreach(glob(self::$path . '*.json') as $file) {
            $file = explode('/', $file);
            self::$languages[] = str_replace('.json', '', trim(end($file)));
        }

        /* If the cookie is set and the language file exists, override the default language */
        if(isset($_COOKIE['language']) && in_array($_COOKIE['language'], self::$languages)) self::$language = $_COOKIE['language'];

        /* Check if the language wants to be checked via the GET variable */
        if(isset($_GET['language'])) {
            $_GET['language'] = filter_var($_GET['language'], FILTER_SANITIZE_STRING);

            /* Check if the requested language exists and set it if needed */
            if(in_array($_GET['language'], self::$languages)) {
                setcookie('language', $_GET['language'], time()+60*60*24*3);
                self::$language = $_GET['language'];
            }
        }

    }

    public static function get() {

        /* Check if we already processed the language file */
        if(self::$languageObject) {
            return self::$languageObject;
        }

        /* Include the language file */
        self::$languageObject = json_decode(file_get_contents(self::$path . self::$language . '.json'));

        /* Check the language file */
        if(is_null(self::$languageObject)) {
            die('The language file is corrupted. Please make sure your JSON Language file is JSON Validated ( you can do that with an online JSON Validator by searching on Google ).');
        }

        return self::$languageObject;
    }
}

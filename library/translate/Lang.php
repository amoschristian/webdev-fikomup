<?php

class Lang
{
    const DEFAULT_LANGUAGE = 'en';

    public $language;
    public $language_source;

    public function __construct($language = self::DEFAULT_LANGUAGE) {
        require_once('translate.php');
        $this->language = $language;
        $this->language_source = buildTranslateArray();
    }

    public function t($string) {
        $source = $this->language_source;
        if ($this->language != self::DEFAULT_LANGUAGE) {
            if (isset($source[$string])) {
                return $source[$string];
            }
        }

        return $string;
    }
}

?>
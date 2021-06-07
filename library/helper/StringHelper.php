<?php

class StringHelper
{
    const TYPE_ISI = 1;
    const TYPE_JUDUL = 2;

    public $currentLanguage = Lang::DEFAULT_LANGUAGE;

    public function __construct($language)
    {
        $this->currentLanguage = $language;
    }

    public function printContent($data, $type)
    {
        $field = ($type == self::TYPE_ISI) ? 'isi' : 'judul';
        $fieldTranslate = $field . '_terjemahan';

        $content = (!empty($data[$fieldTranslate])) ? $data[$fieldTranslate] : '';

        if ($this->currentLanguage != Lang::DEFAULT_LANGUAGE) {
            $content = ($data[$field]) ?: $content;
        }

        return $content;
    }

    public function hightlightContent($content, $sentences = 1)
    {
        return implode('. ', array_slice(explode('.', strip_tags($content)), 0, $sentences)) . '.';
    }
}

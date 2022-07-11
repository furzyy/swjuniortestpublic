<?php

class Template
{
    const TEMPLATE_DIR = BASE_DIR . '/app/templates/';

    public function render(string $fileName, array $data = null): string
    {
        ob_start();
        extract($data);
        require_once self::TEMPLATE_DIR.$fileName;
        echo ob_get_clean();
    }
}

<?php
declare(strict_types=1);


namespace App\View;


class Template
{
    const DEFAULT_TEMPLATE='main';
    private $output;
    private $template;

    public function __construct(array $output, $template=Template::DEFAULT_TEMPLATE)
    {
        $this->output = $output;
        $this->template = $template;
    }

    /**
     * @return array
     */
    private function getTemplate(): string
    {
        $output = $this->output;
        ob_start();
        require "templates/{$this->template}.phtml";
        return ob_get_clean();
    }
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getTemplate();
    }
}
<?php

namespace App\Http;

use Core\DataBinderInterface;
use Core\TemplateInterface;

abstract class HttpHandlerAbstract
{
    /**
     * @var TemplateInterface $template
     */
    private $template;

    /**
     * @var DataBinderInterface $dataBinder
     */
    protected $dataBinder;

    public function __construct(TemplateInterface $template, DataBinderInterface $dataBinder) {
        $this->template = $template;
        $this->dataBinder = $dataBinder;
    }

    public function render(string $templateName, $data = null): void
    {
        $this->template->render($templateName, $data);
    }

    public function redirect(string $url): void
    {
        header("Location: $url");
    }
}
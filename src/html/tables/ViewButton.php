<?php

namespace Leantony\Html\Tables;

class ViewButton extends TableButton
{
    /**
     * @var bool
     */
    protected $launchesModal = false;

    /**
     * @var string
     */
    protected $name = 'View';

    /**
     * @var string
     */
    protected $title = 'View Item';

    /**
     * @var bool
     */
    protected $skipsPjax = false;

    /**
     * @return bool
     */
    public function isSkipsPjax()
    {
        return $this->skipsPjax;
    }

    /**
     * @param bool $skipsPjax
     */
    public function setSkipsPjax($skipsPjax)
    {
        $this->skipsPjax = $skipsPjax;
    }

    /**
     * Render the button
     *
     * @param null $url
     * @return string
     */
    public function render($url = null)
    {
        return view('leantony::html.tables.buttons.view', [
            'modal' => $this->isLaunchesModal(),
            'url' => $this->getUrl() ?? $url,
            'title' => $this->getTitle(),
            'name' => $this->getName(),
            'pjax' => $this->isSkipsPjax()
        ]);
    }
}
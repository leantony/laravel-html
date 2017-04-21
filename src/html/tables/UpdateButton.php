<?php

namespace Leantony\Html\Tables;

class UpdateButton extends TableButton
{
    /**
     * @var bool
     */
    protected $launchesModal = true;

    /**
     * @var string
     */
    protected $name = 'Update';

    /**
     * @var string
     */
    protected $title = 'Update Item';

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
        return view('leantony::html.tables.buttons.update', [
            'modal' => $this->isLaunchesModal(),
            'url' => $this->getUrl() ?? $url,
            'title' => $this->getTitle(),
            'name' => $this->getName(),
        ]);
    }
}
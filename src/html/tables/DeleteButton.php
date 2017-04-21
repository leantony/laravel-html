<?php

namespace Leantony\Html\Tables;

class DeleteButton extends TableButton
{
    /**
     * @var string
     */
    protected $pjaxTarget = '#pjax-container';

    /**
     * @var string
     */
    protected $name = 'Delete';

    /**
     * @var string
     */
    protected $title = 'Delete Item';

    /**
     * @return string
     */
    public function getPjaxTarget()
    {
        return $this->pjaxTarget;
    }

    /**
     * @param string $pjaxTarget
     */
    public function setPjaxTarget($pjaxTarget)
    {
        $this->pjaxTarget = $pjaxTarget;
    }

    public function isTriggersPjax()
    {
        return $this->pjaxTarget ? parent::isTriggersPjax() : false;
    }

    /**
     * Render the button
     *
     * @param null $url
     * @return string
     */
    public function render($url = null)
    {
        return view('leantony::html.tables.buttons.delete', [
            'name' => $this->getName(),
            'title' => $this->getTitle(),
            'pjax' => $this->isTriggersPjax(),
            'pjaxTarget' => $this->getPjaxTarget(),
            'url' => $this->getUrl() ?? $url,
        ])->render();
    }
}
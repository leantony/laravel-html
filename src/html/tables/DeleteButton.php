<?php

namespace Leantony\Html\Tables;

class DeleteButton extends TableButton
{
    /**
     * The target PJAX element to be refreshed after delete
     * Leave null to disable pjax
     *
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
     * Render the button
     *
     * @param null $url
     * @return string
     */
    public function render($url = null)
    {
        return view('leantony::html.tables.buttons.delete', $this->compactData(func_get_args()))->render();
    }

    /**
     * Specify the data to be sent to the view
     *
     * @param array $params
     * @return array
     */
    protected function compactData($params = [])
    {
        $data = [
            'name' => $this->getName(),
            'title' => $this->getTitle(),
            'pjax' => $this->isTriggersPjax(),
            'pjaxTarget' => $this->getPjaxTarget(),
            'url' => $this->getUrl() ?? $params[0],
        ];
        return array_merge($data, $this->getExtraParams());
    }

    public function isTriggersPjax()
    {
        return $this->pjaxTarget ? true : parent::isTriggersPjax();
    }

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
}
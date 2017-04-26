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
     * Render the button
     *
     * @param null $url
     * @return string
     */
    public function render($url = null)
    {
        return view('leantony::html.tables.buttons.view', $this->compactData(func_get_args()))->render();
    }

    /**
     * Specify the data to be sent to the view
     *
     * @param array $params
     * @return array
     */
    protected function compactData($params = [])
    {
        return [
            'modal' => $this->isLaunchesModal(),
            'url' => $this->getUrl() ?? $params[0],
            'title' => $this->getTitle(),
            'name' => $this->getName(),
            'pjax' => $this->isSkipsPjax()
        ];
    }

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
}
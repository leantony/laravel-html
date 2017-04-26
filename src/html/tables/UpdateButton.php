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
        return view('leantony::html.tables.buttons.update', $this->compactData(func_get_args()))->render();
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
        ];
    }
}
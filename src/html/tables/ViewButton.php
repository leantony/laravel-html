<?php

namespace Leantony\Html\Tables;

class ViewButton extends TableButton
{
    /**
     * If the view button should launch a modal
     *
     * @var bool
     */
    protected $launchesModal = false;

    /**
     * The name of the button
     *
     * @var string
     */
    protected $name = 'View';

    /**
     * The tooltip title
     *
     * @var string
     */
    protected $title = 'View Item';

    /**
     * @var bool
     */
    protected $enforcesPjax = false;

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
        $data = [
            'modal' => $this->isLaunchesModal(),
            'url' => $this->getUrl() ?? $params[0],
            'title' => $this->getTitle(),
            'name' => $this->getName(),
            'pjax' => $this->isEnforcesPjax()
        ];
        return array_merge($data, $this->getExtraParams());
    }

    /**
     * @return bool
     */
    public function isEnforcesPjax()
    {
        return $this->enforcesPjax;
    }

    /**
     * @param bool $enforcesPjax
     */
    public function setEnforcesPjax($enforcesPjax)
    {
        $this->enforcesPjax = $enforcesPjax;
    }
}
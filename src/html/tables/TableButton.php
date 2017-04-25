<?php

namespace Leantony\Html\Tables;

use Leantony\html\AbstractHtml;

abstract class TableButton extends AbstractHtml
{
    /**
     * The name of the button
     *
     * @var string
     */
    protected $name;

    /**
     * The url it goes to
     *
     * @var string
     */
    protected $url;

    /**
     * The tooltip title of the button
     *
     * @var string
     */
    protected $title;

    /**
     * If it launches a modal on click
     *
     * @var bool
     */
    protected $launchesModal;

    /**
     * If it triggers PJAX after the action is done. E.g updating
     *
     * @var bool
     */
    protected $triggersPjax;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return bool
     */
    public function isLaunchesModal()
    {
        return $this->launchesModal;
    }

    /**
     * @param bool $launchesModal
     */
    public function setLaunchesModal($launchesModal)
    {
        $this->launchesModal = $launchesModal;
    }

    /**
     * @return bool
     */
    public function isTriggersPjax()
    {
        return $this->triggersPjax;
    }

    /**
     * @param bool $triggersPjax
     */
    public function setTriggersPjax($triggersPjax)
    {
        $this->triggersPjax = $triggersPjax;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toHtml();
    }

    /**
     * Get content as a string of HTML.
     *
     * @return string
     */
    public function toHtml()
    {
        return $this->render();
    }

    /**
     * Render the button
     *
     * @param null $url
     * @return string
     */
    abstract public function render($url = null);
}
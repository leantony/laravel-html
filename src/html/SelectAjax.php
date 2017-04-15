<?php

namespace Leantony\Html;

class SelectAjax extends Select2
{
    /**
     * The key attribute to be used as <option id={id} value={}>
     *
     * @var string
     */
    public $keyAttribute = 'id';

    /**
     * The value attribute to be used as <option id={id} value={}>
     *
     * @var string
     */
    public $valueAttribute = 'username';

    /**
     * The target endpoint to which the AJAX request shall be sent to
     *
     * @var string
     */
    public $targetUrl;

    /**
     * @return mixed
     */
    public function getKeyAttribute()
    {
        return $this->keyAttribute;
    }

    /**
     * @param mixed $keyAttribute
     * @return SelectAjax
     */
    public function setKeyAttribute($keyAttribute)
    {
        $this->keyAttribute = $keyAttribute;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValueAttribute()
    {
        return $this->valueAttribute;
    }

    /**
     * @param mixed $valueAttribute
     * @return SelectAjax
     */
    public function setValueAttribute($valueAttribute)
    {
        $this->valueAttribute = $valueAttribute;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTargetUrl()
    {
        return $this->targetUrl;
    }

    /**
     * Set the target url for the AJAX GET request
     *
     * @param mixed $targetUrl
     * @return SelectAjax
     */
    public function setTargetUrl($targetUrl)
    {
        $this->targetUrl = $targetUrl;
        return $this;
    }

    /**
     * Render the select2 box
     *
     * @param array $smallSize
     * @param array $largeSize
     * @return string
     */
    public function render($smallSize = [4, 8], $largeSize = [2, 10])
    {
        return view('leantony::html.select2-ajax', [
            'sm' => $smallSize,
            'lg' => $largeSize,
            'for' => $this->getFor(),
            'name' => $this->getName(),
            'data' => $this->getData(),
            'data_values' => $this->getInitialData(),
            'multiple' => $this->getIsMultiple(),
            'keyAttribute' => $this->getKeyAttribute(),
            'valueAttribute' => $this->getValueAttribute(),
            'url' => $this->getTargetUrl(),
        ])->render();
    }
}
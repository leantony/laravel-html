<?php

namespace Leantony\Html;

class SelectAjax extends Select2
{
    /**
     * Specify if the AJAX request needs caching
     *
     * @var bool
     */
    public $cache = true;

    /**
     * Help text
     *
     * @var string
     */
    public $helpText = 'start typing to search for a value';

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
     * Render the select2 box
     *
     * @param array $smallSize
     * @param array $largeSize
     * @return string
     */
    public function render($smallSize = [4, 8], $largeSize = [2, 10])
    {
        return view('leantony::html.select2-ajax', $this->compactData(func_get_args()))->render();
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
            'sm' => $params[0],
            'lg' => $params[1],
            'for' => $this->getFor(),
            'name' => $this->getName(),
            'data' => $this->getData(),
            'data_values' => $this->getInitialData(),
            'multiple' => $this->getIsMultiple(),
            'keyAttribute' => $this->getKeyAttribute(),
            'valueAttribute' => $this->getValueAttribute(),
            'url' => $this->getTargetUrl(),
            'tags' => $this->isTags(),
            'cache' => $this->isCache(),
            'helpText' => $this->getHelpText(),
            'triggerTarget' => $this->getTriggerElement(),
            'triggerSearchKey' => $this->getTriggerSelectKey(),
            'triggerSearchValue' => $this->getTriggerSelectValue(),
            'triggerLink' => $this->getTriggerSelectLink()
        ];
        return array_merge($data, $this->getExtraParams());
    }

    /**
     * @return bool
     */
    public function isCache()
    {
        return $this->cache;
    }

    /**
     * @param bool $cache
     */
    public function setCache($cache)
    {
        $this->cache = $cache;
    }

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
}
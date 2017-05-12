<?php

namespace Leantony\Html;

class Select2 extends AbstractHtml
{
    /**
     * Help text
     *
     * @var string
     */
    public $helpText = 'Begin typing to select a value';

    /**
     * Support tags
     *
     * @var bool
     */
    public $tags = false;

    /**
     * The variable name
     *
     * @var string
     */
    public $for;

    /**
     * The label name
     *
     * @var string
     */
    public $name;

    /**
     * Available data
     *
     * @var array
     */
    public $data = [];

    /**
     * If multiple values be selected. Use for label with [], if multiple
     *
     * @var boolean
     */
    public $isMultiple = true;

    /**
     * Data that needs to be pre-selected
     *
     * @var array
     */
    public $initialData = [];

    /**
     * The element to be triggered an on 'change' event, when an item is selected
     *
     * @var string
     */
    public $triggerElement = null;

    /**
     * The route name/url to which an AJAX request shall be sent when the value on the
     * select box is selected
     *
     * @var string
     */
    public $triggerSelectLink = null;

    /**
     * The key to be mapped to a value when the ajax query runs
     *
     * @var string
     */
    public $triggerSelectKey = 'id';

    /**
     * The value to be mapped to a corresponding request value when the
     * ajax query runs
     *
     * @var string
     */
    public $triggerSelectValue = 'name';

    /**
     * @return bool
     */
    public function isTags()
    {
        return $this->tags;
    }

    /**
     * @param bool $tags
     * @return Select2
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return string
     */
    public function getHelpText()
    {
        return $this->helpText;
    }

    /**
     * @param string $helpText
     * @return $this
     */
    public function setHelpText($helpText)
    {
        $this->helpText = $helpText;
        return $this;
    }

    /**
     * @return string
     */
    public function getTriggerElement()
    {
        return $this->triggerElement;
    }

    /**
     * @param string $triggerElement
     */
    public function setTriggerElement($triggerElement)
    {
        $this->triggerElement = $triggerElement;
    }

    /**
     * @return string
     */
    public function getTriggerSelectLink()
    {
        return $this->triggerSelectLink;
    }

    /**
     * @param string $triggerSelectLink
     */
    public function setTriggerSelectLink($triggerSelectLink)
    {
        $this->triggerSelectLink = $triggerSelectLink;
    }

    /**
     * @return string
     */
    public function getTriggerSelectKey()
    {
        return $this->triggerSelectKey;
    }

    /**
     * @param string $triggerSelectKey
     */
    public function setTriggerSelectKey($triggerSelectKey)
    {
        $this->triggerSelectKey = $triggerSelectKey;
    }

    /**
     * @return string
     */
    public function getTriggerSelectValue()
    {
        return $this->triggerSelectValue;
    }

    /**
     * @param string $triggerSelectValue
     */
    public function setTriggerSelectValue($triggerSelectValue)
    {
        $this->triggerSelectValue = $triggerSelectValue;
    }

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
     * Render the select2 box
     *
     * @param array $smallSize
     * @param array $largeSize
     * @return string
     */
    public function render($smallSize = [4, 8], $largeSize = [2, 10])
    {
        return view('leantony::html.select2', $this->compactData(func_get_args()))->render();
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
            'helpText' => $this->getHelpText(),
            'triggerTarget' => $this->getTriggerElement(),
            'triggerSearchKey' => $this->getTriggerSelectKey(),
            'triggerSearchValue' => $this->getTriggerSelectValue(),
            'triggerLink' => $this->getTriggerSelectLink()
        ];
        return array_merge($data, $this->getExtraParams());
    }

    /**
     * @return mixed
     */
    public function getFor()
    {
        return $this->for;
    }

    /**
     * @param mixed $for
     * @return Select2
     */
    public function setFor($for)
    {
        $this->for = $for;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Select2
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return json_encode($this->data);
    }

    /**
     * Set the data that will be pre filled on the select2 box
     *
     * @param mixed $data
     * @return Select2
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInitialData()
    {
        return json_encode($this->initialData);
    }

    /**
     * @param mixed $data
     * @return Select2
     */
    public function setInitialData($data)
    {
        $this->initialData = $data;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsMultiple()
    {
        return $this->isMultiple ? 'multiple' : null;
    }

    /**
     * @param mixed $isMultiple
     * @return Select2
     */
    public function setIsMultiple($isMultiple)
    {
        $this->isMultiple = $isMultiple;
        return $this;
    }
}
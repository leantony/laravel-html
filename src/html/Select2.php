<?php

namespace Leantony\Html;

use Illuminate\Contracts\Support\Htmlable;

class Select2 implements Htmlable
{
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
     * The data that is to be prefilled on the select2 input
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
     * All data that did not exist in $data
     *
     * @var array
     */
    public $dataValues = [];

    /**
     * Render the select2 box
     *
     * @param array $smallSize
     * @param array $largeSize
     * @return string
     */
    public function render($smallSize = [4, 8], $largeSize = [2, 10])
    {
        return view('leantony::html.select2', [
            'sm' => $smallSize,
            'lg' => $largeSize,
            'for' => $this->getFor(),
            'name' => $this->getName(),
            'data' => $this->getData(),
            'data_values' => $this->getDataValues(),
            'multiple' => $this->getIsMultiple(),
        ])->render();
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

    /**
     * @return mixed
     */
    public function getDataValues()
    {
        return json_encode($this->dataValues);
    }

    /**
     * @param mixed $dataValues
     * @return Select2
     */
    public function setDataValues($dataValues)
    {
        $this->dataValues = $dataValues;
        return $this;
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

    public function __toString()
    {
        return $this->toHtml();
    }
}
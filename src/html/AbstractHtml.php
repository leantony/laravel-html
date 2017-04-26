<?php

namespace Leantony\Html;

use Illuminate\Contracts\Support\Htmlable;

abstract class AbstractHtml implements Htmlable
{

    /**
     * Any extra data that can be sent to the view
     *
     * @var array
     */
    protected $extraParams = [];

    /**
     * @return array
     */
    public function getExtraParams()
    {
        return $this->extraParams;
    }

    /**
     * Specify the data to be sent to the view
     *
     * @param array $params
     * @return array
     */
    abstract protected function compactData($params = []);
}
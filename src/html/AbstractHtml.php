<?php

namespace Leantony\html;

use Illuminate\Contracts\Support\Htmlable;

abstract class AbstractHtml implements Htmlable
{
    /**
     * Specify the data to be sent to the view
     *
     * @param array $params
     * @return array
     */
    abstract protected function compactData($params = []);
}
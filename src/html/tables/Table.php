<?php

namespace Leantony\Html\Tables;

use Illuminate\Contracts\Support\Htmlable;

abstract class Table implements Htmlable
{
    /**
     * @var array
     */
    protected $rows = [];

    /**
     * @var string
     */
    protected $dataVariableAlias;

    /**
     * @var string
     */
    protected $rowsView;

    /**
     * @var bool
     */
    protected $renderButtons = true;

    /**
     * @var bool
     */
    protected $paginate = true;

    /**
     * @var bool
     */
    protected $warnIfEmpty = true;

    /**
     * @var mixed
     */
    protected $data;

    /**
     * Return the rows to be displayed on the table
     *
     * @return array
     */
    abstract public function getRows();

    /**
     * @return bool
     */
    public function isRenderButtons()
    {
        return $this->renderButtons;
    }

    /**
     * @param bool $renderButtons
     */
    public function setRenderButtons($renderButtons)
    {
        $this->renderButtons = $renderButtons;
    }

    /**
     * @return bool
     */
    public function isPaginate()
    {
        return $this->paginate;
    }

    /**
     * @param bool $paginate
     */
    public function setPaginate($paginate)
    {
        $this->paginate = $paginate;
    }

    /**
     * @return bool
     */
    public function isWarnIfEmpty()
    {
        return $this->warnIfEmpty;
    }

    /**
     * @param bool $warnIfEmpty
     */
    public function setWarnIfEmpty($warnIfEmpty)
    {
        $this->warnIfEmpty = $warnIfEmpty;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    public function render()
    {
        return view('leantony::html.tables.table', [
            'rows' => $this->getRows(),
            'renderButtons' => $this->isRenderButtons(),
            'data' => $this->getData(),
            'paginate' => $this->paginate,
            'rowsData' => $this->getRowsView(),
            'viewButton' => new ViewButton(),
            'deleteButton' => new DeleteButton(),
            'dataVarAlias' => $this->getDataVariableName(),
            'warnIfEmpty' => $this->isWarnIfEmpty()
        ])->render();
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

    /**
     * Return the view that contains data in individual table rows
     *
     * @return string
     */
    abstract public function getRowsView();

    /**
     * @return string
     */
    abstract public function getDataVariableName();
}
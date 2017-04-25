<?php

namespace Leantony\Html\Tables;

use Leantony\Html\AbstractHtml;

abstract class Table extends AbstractHtml
{
    /**
     * The rows that appear on the table $k => $v
     *
     * @var array
     */
    protected $rows = [];

    /**
     * The name of the variable sent to the loop view
     *
     * @var string
     */
    protected $dataVariableAlias;

    /**
     * The view that holds the loop data
     *
     * @var string
     */
    public $rowsView;

    /**
     * Render buttons on the table
     *
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
     * Render the view
     *
     * @return string
     */
    public function render()
    {
        return view('leantony::html.tables.table', $this->compactData())->render();
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
            'rows' => $this->getRows(),
            'renderButtons' => $this->isRenderButtons(),
            'data' => $this->getData(),
            'paginate' => $this->paginate,
            'rowsData' => $this->rowsView ?? $this->getRowsView(),
            'viewButton' => new ViewButton(),
            'deleteButton' => new DeleteButton(),
            'dataVarAlias' => $this->getDataVariableName(),
            'warnIfEmpty' => $this->isWarnIfEmpty()
        ];
    }

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
}
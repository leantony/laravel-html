<?php

namespace Leantony\Html;

class FineUploader extends AbstractHtml
{
    /**
     * Multiple uploads
     *
     * @var bool
     */
    public $multiple = true;

    /**
     * Upload rules
     *
     * @var array
     */
    public $uploadRules = [
        'allowedExtensions' => ['jpeg', 'jpg', 'png'],
        'itemLimit' => 10,
        'sizeLimit' => 2097152 // 2MB
    ];

    /**
     * Max items allowed
     *
     * @var int
     */
    public $itemLimit = 10;

    /**
     * upload endpoint
     *
     * @var string
     */
    public $uploadEndpoint;

    /**
     * begin upload instantly
     *
     * @var bool
     */
    public $autoUpload = true;

    /**
     * Text to guide user
     *
     * @var string
     */
    public $infoText = "A maximum of {count} images can be uploaded. Drop an image anywhere below, to instantly upload it.";

    /**
     * Text to display on the drop zone
     *
     * @var string
     */
    public $dropAreaText = "You can also drop {files} here";

    /**
     * @return mixed
     */
    public function getItemLimit()
    {
        return $this->itemLimit;
    }

    /**
     * @param mixed $itemLimit
     * @return FineUploader
     */
    public function setItemLimit($itemLimit)
    {
        $this->itemLimit = $itemLimit;
        return $this;
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
        return view('leantony::html.upload_files', $this->compactData())->render();
    }

    /**
     * Specify the data to be sent to the view
     *
     * @return array
     */
    protected function compactData()
    {
        return [
            'multiple' => $this->getMultiple(),
            'upload_rules' => json_encode($this->getUploadRules()),
            'itemLimit' => $this->getUploadRules()['itemLimit'],
            'size_limit' => $this->getUploadRules()['sizeLimit'],
            'upload_endpoint' => $this->getUploadEndpoint(),
            'auto_upload' => $this->getAutoUpload(),
            'drop_area_text' => $this->getDropAreaText(),
            'info_text' => $this->getInfoText(),
        ];
    }

    /**
     * @return mixed
     */
    public function getMultiple()
    {
        return $this->multiple;
    }

    /**
     * @param mixed $multiple
     * @return FineUploader
     */
    public function setMultiple($multiple)
    {
        $this->multiple = $multiple;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUploadRules()
    {
        $rules = $this->uploadRules;
        $rules['sizeLimit'] = array_get($rules, 'sizeLimit', 2) * 1024 * 1024;
        $rules['itemLimit'] = array_get($rules, 'itemLimit', 10);
        $rules['allowedExtensions'] = array_get($rules, 'allowedExtensions', ['jpeg', 'jpg', 'png']);
        return $rules;
    }

    /**
     * @param mixed $uploadRules
     * @return FineUploader
     */
    public function setUploadRules($uploadRules)
    {
        $this->uploadRules = $uploadRules;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUploadEndpoint()
    {
        return $this->uploadEndpoint;
    }

    /**
     * @param mixed $uploadEndpoint
     * @return FineUploader
     */
    public function setUploadEndpoint($uploadEndpoint)
    {
        $this->uploadEndpoint = $uploadEndpoint;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAutoUpload()
    {
        return $this->autoUpload;
    }

    /**
     * @param mixed $autoUpload
     * @return FineUploader
     */
    public function setAutoUpload($autoUpload)
    {
        $this->autoUpload = $autoUpload;
        return $this;
    }

    /**
     * @return string
     */
    public function getDropAreaText()
    {
        if ($this->dropAreaText) {
            return strtr($this->dropAreaText, ['{files}' => !$this->multiple ? 'a file' : 'files']);
        }
        return $this->dropAreaText;
    }

    /**
     * @param string $dropAreaText
     * @return FineUploader
     */
    public function setDropAreaText($dropAreaText)
    {
        $this->dropAreaText = $dropAreaText;
        return $this;
    }

    /**
     * @return string
     */
    public function getInfoText()
    {
        if ($this->infoText) {
            return strtr($this->infoText, ['{count}' => $this->itemLimit]);
        }
        return $this->infoText;
    }

    /**
     * @param string $infoText
     * @return FineUploader
     */
    public function setInfoText($infoText)
    {
        $this->infoText = $infoText;
        return $this;
    }
}
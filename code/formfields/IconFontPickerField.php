<?php

/**
 * IconFontPickerField
 *
 */
class IconFontPickerField extends TextField
{

    /**
     * @var null|string
     */
    private $customFontURI = null;

    /**
     * @var string
     */
    private $customFontBaseClass = 'fa';

    /**
     * @var array
     */
    private $available_icons = [];

    /**
     * @var bool
     */
    private $use_fa = true;

    /**
     * @param string $str
     */
    public function setCustomFontURI($str)
    {
        $this->customFontURI = $str;
    }

    /**
     * @param string $class
     */
    public function setCustomFontBaseClass($class)
    {
        $this->customFontBaseClass = $class;
    }

    /**
     * @param array $icons
     */
    public function setAvailableIcons($icons = [])
    {
        $this->available_icons = $icons;
    }


    /**
     * @param bool $boolean
     */
    public function setUseFontAwesome($boolean = true)
    {
        $this->use_fa = $boolean;
    }

    /**
     * @return bool
     */
    public function getUseFa()
    {
        return $this->use_fa;
    }

    /**
     * @return string
     */
    public function getAvailableIconsJson()
    {
        return json_encode($this->available_icons);
    }

    /**
     * @return string
     */
    public function getCustomFontBaseClass()
    {
        return $this->customFontBaseClass;
    }


    /**
     * @return string
     */
    public function Type()
    {
        return 'text';
    }

    /**
     * @param array $properties
     *
     * @return mixed
     */
    public function Field($properties = [])
    {
        $this->addExtraClass('form-control icp icp-auto');

        //Libraries
        Requirements::css(ICONFONT_PICKER_DIR . '/css/lib/bootstrap.min.css');
        Requirements::css(ICONFONT_PICKER_DIR . '/css/lib/font-awesome-iconpicker.css');
        Requirements::javascript(ICONFONT_PICKER_DIR . '/js/lib/font-awesome-iconpicker.min.js');

        if ($this->customFontURI) {
            Requirements::css($this->customFontURI);
        }

        // Module
        Requirements::css(ICONFONT_PICKER_DIR . '/css/icon-font-picker.css');
        Requirements::javascript(ICONFONT_PICKER_DIR . '/js/icon-font-picker.js');

        Requirements::set_force_js_to_bottom(true);

        return parent::Field($properties);
    }

    /**
     * @param $validator
     *
     * @return bool
     */
    public function validate($validator)
    {
        //if (!empty ($this->value) && !preg_match('/^fa-[a-z]+/', $this->value)) {
        //    $validator->validationError(
        //        $this->name, 'Please enter a valid Font Awesome font name format.', 'validation', false
        //    );
        //    return false;
        //}

        return true;
    }
}

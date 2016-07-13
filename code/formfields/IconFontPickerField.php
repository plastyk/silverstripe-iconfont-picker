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
    private $customFontBaseClass = '';

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
        Requirements::css(ICONFONT_PICKER_DIR . '/css/lib/font-awesome.min.css');
        Requirements::css(ICONFONT_PICKER_DIR . '/css/lib/font-awesome-iconpicker.min.css');
        Requirements::javascript(ICONFONT_PICKER_DIR . '/js/lib/font-awesome-iconpicker.min.js');

        if ($this->customFontURI) {
            Requirements::css($this->customFontURI);
        }


        // Module
        Requirements::css(ICONFONT_PICKER_DIR . '/css/icon-font-picker.css');
        Requirements::javascriptTemplate(
            ICONFONT_PICKER_DIR . '/js/icon-font-picker.js',
            [
                'UseFa' => $this->use_fa ? 'true' : 'false',
                'AvailableIcons' => json_encode($this->available_icons),
                'CustomFontBaseClass' => $this->customFontBaseClass
            ]
        );

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

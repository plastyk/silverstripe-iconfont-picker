<?php

/**
 * IconFontPickerField
 *
 */
class IconFontPickerField extends TextField
{
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
    public function Field($properties = array())
    {
        $this->addExtraClass('form-control icp icp-auto');

        //Libraries
        Requirements::css(ICONFONT_PICKER_DIR . '/css/lib/bootstrap.min.css');
        Requirements::css(ICONFONT_PICKER_DIR . '/css/lib/font-awesome.min.css');
        Requirements::css(ICONFONT_PICKER_DIR . '/css/lib/font-awesome-iconpicker.min.css');
        Requirements::javascript(ICONFONT_PICKER_DIR . '/js/lib/font-awesome-iconpicker.min.js');

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

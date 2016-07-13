# THIS IS A FORK OF `peavers/silverstripe-font-awesome`

...adjusted to work with any icon font.

## Configuration example

```php
$iconPickerField = IconFontPickerField::create('CustomIconClass', 'Icon');
$iconPickerField->setCustomFontURI('mysite/thirdparty/icofont-custom/css/icofont.css');
$iconPickerField->setCustomFontBaseClass('icofont');
$iconPickerField->setAvailableIcons($this->config()->available_icons);
$iconPickerField->setUseFontAwesome(false);
```


# Initial Readme


## Synopsis
Provides a field to easily pick font-awesome icons

## Features
* Easily pick icons to be used anywhere in the frontend
* Can filter on icon name

## Installation

### Composer
Make sure you're not double loading the css/fonts with a theme.

Ideally composer will be used to install this module.
```composer require "moe/font-awesome:@stable"```

## Screen shots

### Font awesome icon view
![Font awesome icon](https://raw.githubusercontent.com/peavers/silverstripe-font-awesome/master/images/screens/font-awesome-icons.png "Icons")
---------------------------------------
### Filter view
![Filter](https://raw.githubusercontent.com/peavers/silverstripe-font-awesome/master/images/screens/font-awesome-filter.png "Filter")

## Usage
A basic working example, and the following to any class you want the field on;

```php
    private static $db = array(
        'Icon' => 'Varchar(255)',
    );

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab('Root.Main', array(
           FontAwesomeField::create("Icon", "Font Awesome icon")
        ));

        return $fields;
    }
```

Then simple include in the template where you want the icon placed
```html
    <i class="fa $Icon"></i>
```

The controller extension should make sure you've got access to the icons so you don't need to double up the CSS file.

## Want colours instead of icons?
Got you covered, checkout [color-swabs](https://github.com/peavers/silverstripe-color-swabs)!

## Libraries used/modified
* Font Awesome Icon Picker 4.5

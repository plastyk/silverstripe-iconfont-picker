(function ($) {
    $.entwine(function ($) {

        /**
         * Class: .icp-auto
         *
         * Load the icon picker
         */
        $('.IconFontPickerField').entwine({
            onmatch: function () {
                var $field = $('.IconFontPickerField');

                var icons = JSON.parse($field.attr('data-AvailableIcons'));
                if($field.attr('data-UseFa')) {
                    icons = $.merge(
                        icons,
                        $.iconpicker.defaultOptions.icons
                    );
                }

                var customFontBaseClass = $field.attr('data-CustomFontBaseClass');
                var fullClassFormatter = null;
                if (customFontBaseClass.length) {
                    fullClassFormatter = function(val) {
                        if (val.match(/^fa-/)) {
                            return 'fa ' + val;
                        } else {
                            return customFontBaseClass + ' ' + val;
                        }
                    }
                } else {
                    fullClassFormatter = function(val) {
                        return 'fa ' + val;
                    }
                }

                $('.icp-auto').iconpicker({
                    hideOnSelect: true,
                    inputSearch: true,
                    icons: icons,
                    fullClassFormatter: fullClassFormatter
                });

                $('.icp-auto').on('iconpickerSelected', function(e) {
                    $('.picker-target').get(0).className = 'picker-target fa-3x ' +
                        e.iconpickerInstance.options.iconBaseClass + ' ' +
                        e.iconpickerInstance.options.fullClassFormatter(e.iconpickerValue);
                });
            }
        });
    });
})(jQuery);

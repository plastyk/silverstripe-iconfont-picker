(function ($) {
    $.entwine(function ($) {

        /**
         * Class: .icp-auto
         *
         * Load the icon picker
         */
        $('.IconFontPickerField').entwine({
            onmatch: function () {
                var $field = $(this);
                var icons = $field.data('available-icons');
                var fontBaseClass = $field.data('font-base-class') || '';
                
                $field.find('.icp').iconpicker({
                    hideOnSelect: true,
                    inputSearch: true,
                    icons: icons,
                    fullClassFormatter: function (val) {
                        return fontBaseClass + ' ' + val;
                    }
                }).on('iconpickerSelected', function(e) {
                    var pickerTarget = $field.find('.picker-target').get(0);
                    pickerTarget.className = 'picker-target fa-3x ' + fontBaseClass + ' ' + e.iconpickerValue;
                });
            }
        });
    });
})(jQuery);

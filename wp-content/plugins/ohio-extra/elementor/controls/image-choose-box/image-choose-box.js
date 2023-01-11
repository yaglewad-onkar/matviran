jQuery(window).on('load', function() {
    let ohioImageChooseBoxControl = elementor.modules.controls.BaseData.extend({
        onReady: function() {
            let self = this;
            this.ui.radio.on('change', function() {
                self.updateSelected(this.value);
            });

            this.updateSelected(this.getControlValue());
        },

        updateSelected: function(value) {
            this.ui.radio.find('[value="' + value + '"]').trigger('click');
        }
    });

    elementor.addControlView('ohio-image-choose', ohioImageChooseBoxControl);
});
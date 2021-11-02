define([
    'jquery',
    'jquery/ui',
    'Magento_Ui/js/modal/modal',
    'mage/translate'
], function($) {
    'use strict';
    $.widget('module9.eventsPopup', {
        options: {
            url:     null,
            message: null,
            modal:  null,
            triggerEvent: 'click'
        },
        _create: function() {
            this._bind();
        },
        _bind: function() {
            var self = this;
            self.element.on(self.options.triggerEvent, function() {
                self._clickSubmit();
            });
        },
        _clickSubmit: function() {
            var self = this;
            this.options.event = $('<div class="ui-dialog-content ui-widget-content"></div>').modal({
                type: 'popup',
                modalClass: 'event-popup',
                title: $.mage.__('Event Popup!'),
                buttons: [{
                    text: $.mage.__('Ok'),
                    'class': 'action-primary',
                    click: function () {
                        this.closeModal();
                    }
                }]
            });
            this.options.event.html(this.options.message).modal('openModal');
        },
    });
    return $.module9.eventsPopup;
});
define([
    'jquery',
    'jquery/ui',
    'Astrio_Module9/js/events_popup'
], function ($) {
    $.widget('moduletest.second', $.module9.eventsPopup, {
        _clickSubmit: function () {
            var self = this;
            this.options.event = $('<div class="ui-dialog-content ui-widget-content"></div>').modal({
                type: 'popup',
                modalClass: 'event-popup',
                title: $.mage.__('Event Popup!'),

                closed: function (){
                    console.log('Bye!');
                },
                
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
    return $.moduletest.second;
});
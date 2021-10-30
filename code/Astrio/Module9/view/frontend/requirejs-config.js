var config = {
    map: {
       '*': {
           eventsPopup: 'Astrio_Module9/js/events_popup',
           second: 'Astrio_Module9/js/second',
        }
    },
    config: {
        mixins: {
            'Astrio_Module9/js/second': {
             'Astrio_Module9/js/events-popup-mixin': true
            }
        }
    }
};
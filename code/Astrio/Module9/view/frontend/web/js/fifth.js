define(['ko',
  'uiComponent',
  'mage/url',
  'mage/storage'
], function(ko, Component, urlBuilder, storage) {
	'use strict';
	  return Component.extend({
		    defaults: {
            template: 'Astrio_Module9/fifth',
        },        
        
		    getCustomer: function (config) {
			      var self = this;			      
		        var url = urlBuilder.build(config.url);
            var start_time = new Date().getTime();
            return storage.post(
              	url, ''
          	).done(function (response) {
                if(!response['email']){
                    var url = urlBuilder.build('customer/account/login');
                    window.location.href = url;
                } else{
                    console.log((new Date().getTime() - start_time)/1000);
                    console.log(response);
                }
            }).fail(function (response) {
                console.log(response);
            });                        
        },
    });
});
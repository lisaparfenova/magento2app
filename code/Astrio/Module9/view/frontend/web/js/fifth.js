define(['ko',
  'uiComponent',
  'mage/url',
  'mage/storage',
  'Magento_Customer/js/model/customer'
], function(ko, Component, urlBuilder, storage, customer) {
	'use strict';
	  return Component.extend({
		    defaults: {
            template: 'Astrio_Module9/fifth',
        },        
        isCustomerLoggedIn: function () {
        	//console.log(customer);
        	  return customer.isLoggedIn();
        },
		    getCustomer: function (config) {
			      var self = this;
			      if (!this.isCustomerLoggedIn()) {
                var url = urlBuilder.build('customer/account/login');
                window.location.href = url;
            } else {
				        var url = urlBuilder.build(config.url);
                var start_time = new Date().getTime();
                return storage.post(
	                	url, ''
		          	).done(function (response) {
		          	  	console.log(response);
		          		  console.log((new Date().getTime() - start_time)/1000);
		            }).fail(function (response) {
		                console.log(response);
		            });
            }            
        },
    });
});
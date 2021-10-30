define([
    'jquery'
], function ($) {
    'use strict';
    return function (widget) {
        $.widget('module9.second', widget, {
            _clickSubmit: function () {
                console.log('Hi!');
                this._super();
            },  
        });
        return $.module9.second;
    }
});

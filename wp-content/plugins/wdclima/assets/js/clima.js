'use strict';
var clima = angular.module('clima', [])
        .run(function ($rootScope) {
            console.log('clima');
            $rootScope.url = ajaxurl;            
        });

 
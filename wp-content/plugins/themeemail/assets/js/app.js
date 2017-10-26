'use strict';
var app = angular.module('app', [])
        .run(function ($rootScope) {
            $rootScope.url = ajaxurl;            
        });

 
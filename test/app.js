angular.module('starter', ['starter.controllers', 'starter.services'])
    .config(function($stateProvider, $urlRouterProvider) {

        $stateProvider
        .state('home', {
            url: '/home',
            templateUrl: 'home.html',
            controller: 'locationController'
        })

        .state('map', {
            url: '/map',
            templateUrl: 'map.html',
            controller: 'mapController'
        })

        .state('tab.chat-detail', {
            url: '/chats/:chatId',
            views: {
                'tab-chats': {
                    templateUrl: 'templates/chat-detail.html',
                    controller: 'mapController'
                }
            }
        })

        .state('tab.account', {
            url: '/account',
            views: {
                'tab-account': {
                    templateUrl: 'templates/tab-account.html',
                    controller: 'AccountCtrl'
                }
            }
        });

        // if none of the above states are matched, use this as the fallback
        $urlRouterProvider.otherwise('/home');

    });

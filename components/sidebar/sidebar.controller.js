'use strict';

var SidebarController = function SidebarController(Auth, $state, $rootScope, $timeout, $scope) {

    this.isLoggedIn = Auth.isLoggedIn;
    this.isAdmin = Auth.isAdmin;
    this.getCurrentUser = Auth.getCurrentUser;
    $rootScope.$state = $state;
    $timeout(function() {
        $('.event-collapse').sideNav('hide');
    });

    $('.settings-collapse').click(function(){
        $('.event-collapse').sideNav('hide');
    });
    $('.sidebar-collapse').click(function(){
        $('.settings-collapse').sideNav('hide');
    });
    $('.sidebar-collapse').sideNav({
        menuWidth: 250,
        edge: 'left'
    });

    $('.settings-collapse').sideNav({
        menuWidth: 300,
        edge: 'left',
        closeOnClick: true,
    });

    $('.sidebar-collapse').click(function(){
        $('.new-event-collapse').sideNav('hide');
    });
    $scope.openSideNavBar = function(item) {
        $timeout(function() {
            $('.sidebar-collapse').sideNav('show');
        }, 1, true);

    }
};

angular.module('eventx').controller('SidebarController', SidebarController);
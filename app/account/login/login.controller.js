'use strict';

var LoginController = function(Auth, $state, $rootScope) {
    this.user = {};
    this.errors = {};
    this.submitted = false;

    this.Auth = Auth;
    this.$state = $state;
    this.user.email = "admin@example.com";
    this.user.password = "admin";
    $rootScope.$state = $state;

    this.login = function login(form) {
        var _this = this;

        this.submitted = true;

        if (form.$valid) {
            this.Auth.login({
                email: this.user.email,
                password: this.user.password
            }).then(function() {
                // Logged in, redirect to home
                _this.$state.go('main');
            })["catch"](function(err) {
                _this.errors.other = err.message;
            });
        }
    };
}

angular.module('eventx').controller('LoginController', LoginController);
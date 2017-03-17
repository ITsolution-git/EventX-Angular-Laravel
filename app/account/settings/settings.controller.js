'use strict';


var SettingsController = function(Auth, $timeout){

    this.errors = {};
    this.submitted = false;

    $('.settings-out-close').click(function() {
        $timeout(function() {
            $('.settings-collapse').sideNav('hide');
        }, 0, false);
    });
    this.Auth = Auth;
    this.changePassword = function(form){
        var _this = this;

        this.submitted = true;

        if (form.$valid) {
            this.Auth.changePassword(this.user.oldPassword, this.user.newPassword).then(function() {
                _this.message = 'Password successfully changed.';
            })['catch'](function() {
                form.password.$setValidity('mongoose', false);
                _this.errors.other = 'Incorrect password';
                _this.message = '';
            });
        }
    }
}

angular.module('eventx').controller('SettingsController', SettingsController);
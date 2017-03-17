'use strict';

angular.module('eventx')
  .directive('settings', () => ({
    templateUrl: 'app/account/settings/settings.html',
    restrict: 'E',
    controller: 'SettingsController',
    controllerAs: 'vm',
    authenticate: true
  }));

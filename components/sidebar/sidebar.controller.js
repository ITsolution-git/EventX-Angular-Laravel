'use strict';

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } }

var SidebarController = function SidebarController(Auth, $state, $rootScope, $timeout) {
  _classCallCheck(this, SidebarController);

  this.isLoggedIn = Auth.isLoggedIn;
  this.isAdmin = Auth.isAdmin;
  this.getCurrentUser = Auth.getCurrentUser;
  $rootScope.$state = $state;
  $timeout(function () {
    $('.event-collapse').sideNav('hide');
  });
};

angular.module('eventx').controller('SidebarController', SidebarController);
//# sourceMappingURL=sidebar.controller.js.map

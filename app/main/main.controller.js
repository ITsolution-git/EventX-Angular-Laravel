'use strict';

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } }

(function () {
  var MainController = function MainController($http, $scope, $compile, Auth, CalendarEvent) {
    var _this = this;

    _classCallCheck(this, MainController);

    this.$http = $http;
    this.awesomeThings = [];

    this.isLoggedIn = Auth.isLoggedIn;
    this.isAdmin = Auth.isAdmin;
    this.getCurrentUser = Auth.getCurrentUser;

    CalendarEvent.query().$promise.then(function (response) {
      _this.events = response;
      // socket.syncUpdates('events', _this.events);
    });
  };

  angular.module('eventx').controller('MainController', MainController);
})();
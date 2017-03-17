'use strict';

angular.module('eventx')
  .controller('DragdropCtrl', function ($scope,CalendarEvent,Auth) {
      
    $scope.userInfo = {}  
    $scope.getCurrentUser = Auth.getCurrentUser;
    $scope.getCurrentUser(function(user) {
      $scope.currentUser = user;
      $scope.userInfo.user = $scope.currentUser.name;
      $scope.userInfo.createdDate = new Date();
    });

    $scope.draggables = [
      {
        color: 'red',
        title: 'Sam\'s Birthday'
      },
      {
        color: 'pink',
        title: 'Doctor\'s Appointment'
      },
      {
        color: 'indigo',
        title: 'Call to Boss'
      },
      {
        color: 'cyan',
        title: 'Meeting with Lisa'
      },
      {
        color: 'yellow',
        title: 'Meeting with staff'
      },
      {
        color: 'orange',
        title: 'Let\'s Party'
      },
      {
        color: 'orange',
        title: 'Rock Night'
      },
      {
        color: 'cyan',
        title: 'Singing Show'
      },
    ];
    CalendarEvent.query().$promise.then(response => {
      $scope.draggedEvents = response
      // socket.syncUpdates('events', $scope.draggedEvents);
    });
  });

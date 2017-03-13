
"use strict";

angular.module('eventx').factory('CalendarEvent', function($resource, appConfig){
  //return $resource('/api/events', { id: '@id' });
  return $resource(appConfig.routes.eventBaseUrl + ':id', null, {'update': { method:'PUT' } });
});
'use strict';

(function() {

function UserResource($resource, appConfig) {
  return $resource(appConfig.routes.userBaseUrl + ':id/:controller', {
    id: '@_id'
  }, {
    changePassword: {
      method: 'PUT',
      params: {
        controller: 'password'
      }
    },
    get: {
      method: 'GET',
      params: {
        id: 'me'
      }
    }
  });
}

angular.module('eventx.auth')
  .factory('User', UserResource);

})();

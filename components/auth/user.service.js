'use strict';

(function() {

function UserResource($resource) {
  return $resource('/api/public/users/:id/:controller', {
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

(function(angular, undefined) {
'use strict';

angular.module('eventx.constants', [])
/*API list
    1. userBaseUrl + following
	 	router.get('/', auth.hasRole('admin'), controller.index);
		router.delete('/:id', auth.hasRole('admin'), controller.destroy);
		router.get('/me', auth.isAuthenticated(), controller.me);
		router.put('/:id/password', auth.isAuthenticated(), controller.changePassword);
		router.get('/:id', auth.isAuthenticated(), controller.show);
		router.post('/', controller.create);
	2. /events
		router.get('/', controller.index);
		router.get('/:id', controller.show);
		router.post('/', controller.create);
		router.put('/:id', controller.update);
		router.patch('/:id', controller.update);
		router.delete('/:id', controller.destroy);
*/
.constant('appConfig', {
	userRoles:['guest','user','admin'],
	routes:{
		login: 'api/public/auth/local', 
		// POST {email, password}, returns token
		//The token will be sent in header of every request of authenticated user
		//in this format: Bearer recived.token.from.server
		userBaseUrl: '/api/public/users/',
		eventBaseUrl: '/api/public/events/'
	}
})

;
})(angular);
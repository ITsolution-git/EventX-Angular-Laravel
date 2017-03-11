
var SignupController = (function () {
  //end-non-standard

  function SignupController(Auth, $state) {

    this.user = {};
    this.errors = {};
    this.submitted = false;

    this.Auth = Auth;
    this.$state = $state;
  }

  SignupController.register = function(form) {
    var _this = this;

    this.submitted = true;

    if (form.$valid) {
      this.Auth.createUser({
        name: this.user.name,
        email: this.user.email,
        password: this.user.password
      }).then(function () {
        // Account created, redirect to home
        _this.$state.go('main');
      })['catch'](function (err) {
        err = err.data;
        _this.errors = {};

        // Update validity of form fields that match the mongoose errors
        angular.forEach(err.errors, function (error, field) {
          form[field].$setValidity('mongoose', false);
          _this.errors[field] = error.message;
        });
      });
    }
  }
  return SignupController;
})();

angular.module('eventx').controller('SignupController', SignupController);

angular.module('eventx')
  .controller('SignupController', SignupController);

function signUp() {
  var self = this;
  var username = this.$("#signup-username").val();
  var email = this.$("#signup-email").val();
  var password = this.$("#signup-password").val();

  Parse.User.signUp(username, email, password, { ACL: new Parse.ACL() }, {
    success: function(user) {
      new ManageTodosView();
      self.undelegateEvents();
      delete self;
    },

    error: function(user, error) {
      self.$(".signup_form .error").html(error.message).show();
      this.$(".signup_form button").removeAttr("disabled");
    }
  });

  this.$(".signup_form button").attr("disabled", "disabled");

  return false;
},

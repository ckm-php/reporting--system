// Wait for the DOM to be ready
$(function() {
    // Initialize form validation on the registration form.
    $("form[name='login_validate']").validate({
      // Specify validation rules
      rules: {
        email: {
          required: true,
          email: true
        },
        password: {
          required: true,
          minlength: 5
        }
      },
      // Specify validation error messages
      messages: {
        password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 5 characters long"
        },
        email: "Please enter a valid email address"
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
    });

    $("form[name='signup_validate']").validate({
      // Specify validation rules
      rules: {
        name: {
          required: true
        },
        email: {
          required: true,
          email: true
        },
        password: {
          required: true,
          minlength: 5
        },
        cpassword: {
          required: true,
          minlength: 5
        }
      },
      // Specify validation error messages
      messages: {
        name: {
          required: "Please provide a name"
        },
        password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 5 characters long"
        },
        cpassword: {
          required: "Please provide a confirm password",
          minlength: "Your password must be at least 5 characters long"
        },
        email: "Please enter a valid email address"
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
    });

    $("form[name='report_validate']").validate({
      // Specify validation rules
      rules: {
        date: {
          required: true,
        },
        report: {
          required: true,
        }
      },
      // Specify validation error messages
      messages: {
        report: {
          required: "Please enter report",
        },
        date: "Please enter date"
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
    });

  });
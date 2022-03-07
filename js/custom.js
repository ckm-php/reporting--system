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
      submitHandler: function(form) {
        form.submit();
      }
    });

    $("form[name='forgot_validate']").validate({
      rules: {
        email: {
          required: true,
          email: true
        }
      },
      messages: {
        email: "Please enter a valid email address"
      },
      submitHandler: function(form) {
        form.submit();
      }
    });

    $("form[name='report_validate']").validate({
      rules: {
        date: {
          required: true,
        },
        report: {
          required: true,
        }
      },
      messages: {
        report: {
          required: "Please enter report",
        },
        date: "Please enter date"
      },
      submitHandler: function(form) {
        form.submit();
      }
    });

    // jQuery('#fromdatepicker').datetimepicker({
    //   timepicker:false,
    //   formatDate:'Y-m-d',
    // });

    // jQuery('#todatepicker').datetimepicker({
    //   timepicker:false,
    //   formatDate:'Y-m-d',
    // });

    // jQuery('#fromdatepicker2').datetimepicker({
    //   timepicker:false,
    //   formatDate:'Y-m-d',
    // });

    // jQuery('#todatepicker2').datetimepicker({
    //   timepicker:false,
    //   formatDate:'Y-m-d',
    // });

    // jQuery('#datepicker').datetimepicker({
    //   timepicker:false,
    //   formatDate:'Y-m-d',
    // });

    // jQuery('#datepickers').datetimepicker({
    //   timepicker:false,
    //   formatDate:'Y-m-d',
    // });

    $("#fromdatepicker").datepicker({
        dateFormat: "yy-mm-dd"
    });
    
    $("#todatepicker").datepicker({
      dateFormat: "yy-mm-dd"
    });
    
    $("#fromdatepicker2").datepicker({
      dateFormat: "yy-mm-dd"
    });
    
    $("#todatepicker2").datepicker({
      dateFormat: "yy-mm-dd"
    });

    $("#datepicker").datepicker({
      dateFormat: "yy-mm-dd"
    });

  });

  

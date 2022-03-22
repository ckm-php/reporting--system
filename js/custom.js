$(function() {
  
  jQuery.validator.addMethod("emailregex", function(value, element) {
      return this.optional(element) || /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value);

  }, "Please enter a valid email format");

    // Initialize form validation on the registration form.
    $("form[name='login_validate']").validate({
      // Specify validation rules
      rules: {
        email: {
          required: true,
          email: true,
          emailregex: true
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
        email: {
          required: "Please provide a email",
          email: "Please enter a valid email address"
        }
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
    });

    $("form[name='create_validate']").validate({
      rules: {
        name: {
          required: true
        },
        email: {
          required: true,
          email: true,
          emailregex: true
        },
        password: {
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
        email: {
          required: "Please provide a email",
          email: "Please enter a valid email address"
        }
      },
      submitHandler: function(form) {
        form.submit();
      }
    });

    $("form[name='forgot_validate']").validate({
      rules: {
        email: {
          required: true,
          email: true,
          emailregex: true
        }
      },
      messages: {
        email: {
          required: "Please provide a email",
          email: "Please enter a valid email address"
        }
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

    $("form[name='changepass_validate']").validate({
      // Specify validation rules
      rules: {
        opassword: {
          required: true,
          minlength: 5
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
        opassword: {
          required: "Please provide a Old password",
          minlength: "Your password must be at least 5 characters long"
        },
        password: {
          required: "Please provide a New password",
          minlength: "Your password must be at least 5 characters long"
        },
        cpassword: {
          required: "Please provide a Confirm password",
          minlength: "Your password must be at least 5 characters long"
        }
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
    });

    $("form[name='update_validate']").validate({
      // Specify validation rules
      rules: {
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
        password: {
          required: "Please provide a New password",
          minlength: "Your password must be at least 5 characters long"
        },
        cpassword: {
          required: "Please provide a Confirm password",
          minlength: "Your password must be at least 5 characters long"
        }
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
    });

    $("#fromdatepicker").datepicker({
        dateFormat: "yy-mm-dd",
    });
    
    $("#todatepicker").datepicker({
      dateFormat: "yy-mm-dd",
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

    // admin template

    // $("#fromdatepicker3").datepicker({
    //   dateFormat: "yy-mm-dd"
    // });
    
    // $("#todatepicker3").datepicker({
    //   dateFormat: "yy-mm-dd"
    // });

  });

  $(document).ready(function () {
      $('.dropdown-toggle').dropdown();
  });

  function ShowHideDiv() {
    var yesChk = document.getElementById("yesChk");
    var dvchagepass = document.getElementById("dvchagepass");
    dvchagepass.style.display = yesChk.checked ? "block" : "none";
}

  

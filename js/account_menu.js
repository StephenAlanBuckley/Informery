var account_functions_url = "/utilities/account_functions.php";
var session_functions_url = "/utilities/session_functions.php";

$.getJSON(session_functions_url + "?function=get_user_info", function(data) {
  console.log(data);
  if(data !== null) {
    make_login_buttons(data.user_name);
  }
});

$('#login_ajax').on("click", function() {
  var username = $('#login_username_text').val();
  var password = $('#login_password_text').val();
  
  var url = account_functions_url + "?function=login&username=" + username + "&password=" + password;

  $.getJSON(url, function(data) {
    if (data.Result === "true") {
      make_login_buttons(username);
    } else {
      $("#login_status").html("Sorry! Looks like that didn't work. " + data.Message);
    }
  });
});

$("#register_ajax").on("click", function() {
  var username = $("#register_username_text").val();
  var password = $("#register_password_text").val()
  var email = $("#register_email_text").val();

  if (password != $("#register_check_text").val()){
    $("#register_status").html("Your password didn't match the first and second times! Come on silly!");
    return;
  }

  var url = account_functions_url + "?function=register" + "&username=" + username + "&password=" + password + "&email=" + email;

  $.getJSON(url, function(data) {
    if(data.Result === "true") {
      register_success();
    } else {
      $("#register_status").html("Sorry! Something went wrong with registration!" + data.Message);
    }
  });
});

$("#logout_button").on("click", function() {
  logout();
});

function make_login_buttons(username) {
  $("#login_modal").modal('hide');
  $("#login_modal_button").hide();
  $("#register_modal_button").hide();
  $("#username_button").html(username);
  $("#username_button").show();
  $("#logout_button").show();
}

function register_success() {
  $("#register_modal").modal('hide');
  alert("Whoo hoo! Thanks for registering! You're the best!");
}

function logout(){
  var url = account_functions_url + "?function=logout";
  $.getJSON(url, function(){
    $("#login_modal_button").show();
    $("#register_modal_button").show();
    $("#username_button").html('');
    $("#username_button").hide();
    $("#logout_button").hide();
  });
}

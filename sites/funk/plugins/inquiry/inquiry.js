// Generated by CoffeeScript 1.8.0
$(function() {
  $("#button").click(function() {
    var city, comment, company, email, error, firstname, lastname, phone, storage, street, title, zip;
    error = false;
    company = $("#company").val();
    title = $("input[name=title]:checked").val();
    firstname = $("#firstname").val();
    lastname = $("#lastname").val();
    street = $("#street").val();
    zip = $("#zip").val();
    city = $("#city").val();
    phone = $("#phone").val();
    email = $("#email").val();
    comment = $("#comment").val();
    storage = JSON.stringify(localStorage);
    if (title === void 0) {
      $("#div-title").addClass("has-error");
    } else {
      $("#div-title").removeClass("has-error");
    }
    if (firstname === "") {
      $("#div-firstname").addClass("has-error");
    } else {
      $("#div-firstname").removeClass("has-error");
    }
    if (lastname === "") {
      $("#div-lastname").addClass("has-error");
    } else {
      $("#div-lastname").removeClass("has-error");
    }
    if (street === "") {
      $("#div-street").addClass("has-error");
    } else {
      $("#div-street").removeClass("has-error");
    }
    if (zip === "" || city === "") {
      $("#div-zip").addClass("has-error");
    } else {
      $("#div-zip").removeClass("has-error");
    }
    if (phone === "") {
      $("#div-phone").addClass("has-error");
    } else {
      $("#div-phone").removeClass("has-error");
    }
    if (email === "") {
      $("#div-email").addClass("has-error");
    } else {
      $("#div-email").removeClass("has-error");
    }
    if (!error) {
      $.ajax({
        type: "post",
        url: "../../../plugins/inquiry/deploy/sendmail.php",
        data: "company=" + company + "&title=" + title + "&firstname=" + firstname + "&lastname=" + lastname + "&street=" + street + "&zip=" + zip + "&city=" + city + "&phone=" + phone + "&email=" + email + "&comment=" + comment + "&localStorage=" + storage,
        success: function(data) {
          $("#myForm").hide();
        }
      });
    }
    error = false;
  });
});

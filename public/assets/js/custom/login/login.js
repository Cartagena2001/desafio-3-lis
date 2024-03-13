$(document).ready(function () {
  $("#login-form").submit(function (e) {
    e.preventDefault();
    let form_data = $(this).serialize();

    $("#form-error").text("");
    $("#form-error").hide();
    $("#submit-btn").html("Validando...");
    $("#submit-btn").attr("disabled", true);

    $.ajax({
      url: `${hostUrl}api/auth/login`,
      type: "POST",
      data: form_data,
      success: function (data) {
        $("#submit-btn").html("Ingresar");
        $("#submit-btn").attr("disabled", false);

        if (data.success) {
          window.location.href = `${hostUrl}`;
        } else {
          for (let key in data.errors) {
            $("#form-error").text(data.errors[key]);
            $("#form-error").show();
            setTimeout(() => {
              $("#form-error").hide();
            }, 5000);
            break;
          }
        }
      },
    });
  });
});

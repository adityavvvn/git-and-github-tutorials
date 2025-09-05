$(document).ready(function () {
  $("form").submit(function (event) {
    // Clear old errors
    $(".form-group").removeClass("has-error");
    $(".help-block").remove();

    // Get form data
    var formData = {
      name: $("#name").val(),
      email: $("#email").val(),
      superheroAlias: $("#superheroAlias").val(),
    };

    // AJAX request
    $.ajax({
      type: "POST",
      url: "process.php",
      data: formData,
      dataType: "json",
      encode: true,
    })
      .done(function (data) {
        console.log(data);

        if (!data.success) {
          // Name error
          if (data.errors.name) {
            $("#name-group").addClass("has-error");
            $("#name-group").append(
              '<div class="help-block">' + data.errors.name + "</div>"
            );
          }

          // Email error
          if (data.errors.email) {
            $("#email-group").addClass("has-error");
            $("#email-group").append(
              '<div class="help-block">' + data.errors.email + "</div>"
            );
          }

          // Superhero Alias error
          if (data.errors.superheroAlias) {
            $("#superhero-group").addClass("has-error");
            $("#superhero-group").append(
              '<div class="help-block">' + data.errors.superheroAlias + "</div>"
            );
          }
        } else {
          $("form").html(
            '<div class="alert alert-success">' + data.message + "</div>"
          );
        }
      })
      .fail(function (data) {
        $("form").html(
          '<div class="alert alert-danger">Could not reach server, please try again later.</div>'
        );
      });

    event.preventDefault();
  });
});

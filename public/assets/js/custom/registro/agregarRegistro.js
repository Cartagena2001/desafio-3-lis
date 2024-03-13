async function saveEntrada() {
  event.preventDefault();
  var data_form = new FormData();
  data_form.append("monto", document.getElementById("monto").value);
  data_form.append("fecha", document.getElementById("fecha").value);
  data_form.append("factura", document.getElementById("factura").files[0]);
  data_form.append("categoria", document.getElementById("categoria").value);
  data_form.append("tipo", document.getElementById("tipo").value);

  //cambiar texto del boton agregar a guardando...
  $("#agregar").html("Guardando...");
  $("#agregar").attr("disabled", true);

  try {
    const response = await $.ajax({
      url: `${hostUrl}api/dashboard/registro/storeRegistro`,
      type: "POST",
      data: data_form,
      dataType: "json",
      contentType: false,
      processData: false,
    });

    if (response.status == 200) {
      await Swal.fire({
        icon: "success",
        title: "¡Registro guardado!",
        showConfirmButton: false,
        timer: 1500,
      });
      var table = $("#registros").DataTable();
      table.ajax.reload();
      $("#entrada").modal("hide");
      resetInputs();
    } else {
      await Swal.fire({
        icon: "error",
        title: "¡Error al guardar!",
        showConfirmButton: false,
        timer: 1500,
      });
    }
  } catch (error) {
    console.log(error.responseText);
    var errorResponse = JSON.parse(error.responseText);
    var errorMessages = Object.values(errorResponse.errors);

    await Swal.fire({
      icon: "warning",
      title: "Completa los campos requeridos",
      html: errorMessages.join("<br>"),
    });

    //camabiar texto del boton guardando a agregar
    $("#agregar").html("Agregar");
    $("#agregar").attr("disabled", false);
  }
}

function resetInputs() {
  $("#monto").val("");
  $("#fecha").val("");
  $("#factura").val("");
  $("#categoria").val("");
  $("#agregar").html("Agregar");
  $("#agregar").attr("disabled", false);
}

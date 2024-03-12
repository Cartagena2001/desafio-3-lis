function logout() {
  event.preventDefault();
  Swal.fire({
    title: "¿Estás seguro?",
    text: "Quieres cerrar la sesión actual",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Si, cerrar sesión",
    cancelButtonText: "No, cancelar",
    reverseButtons: true,
  }).then(function (result) {
    if (result.isConfirmed) {
      $.ajax({
        url: `${hostUrl}api/auth/logout`,
        type: "POST",
        success: function () {
          window.location.href = `${hostUrl}`;
        },
      });
    }
  });
}

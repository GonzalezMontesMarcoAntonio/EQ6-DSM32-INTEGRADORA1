//enviar solicitud a la base de datos
var solicitud = document.getElementById("formulario-solicitud");

solicitud.addEventListener("submit", function (e) {
  e.preventDefault();

  var datos = new FormData(solicitud);

  // console.log(datos);
  // console.log(datos.get('password'))
  // console.log(datos.get('email'))
  //  console.log(datos.get('desc'))
  //  console.log(datos.get('fecha'))

  fetch("../user/procesos/crear-solicitud.php", {
    method: "POST",
    body: datos,
  })
    .then((res) => res.json())
    .then((data) => {
      console.log(data);
      if (data === "error") {
        Swal.fire("Error", "Revise los datos ingresados", "error");
      } else if(data === "error-asignatura"){
        Swal.fire("Error", "Revise que el campo asignatura este lleno", "error");
      }else if(data === "error-HorarioIn"){
        Swal.fire("Error", "Revise que el campo Horario Inicial este lleno", "error");
      }else if(data === "error-HorarioFin"){
        Swal.fire("Error", "Revise que el campo Horario Final este lleno", "error");
      }else if(data === "error-laboratorio"){
        Swal.fire("Error", "Revise que el campo laboratorio este lleno", "error");
      }else if(data === "error-material"){
        Swal.fire("Error", "Revise que el campo material este lleno", "error");
      }else {
        Swal.fire("Success", "Se a mandado correctamente la solicitud", "success");
      }
    });
});

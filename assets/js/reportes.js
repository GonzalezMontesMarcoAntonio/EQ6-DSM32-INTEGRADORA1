//enviar reporte a la base de datos
var reporte = document.getElementById("fomrulario-reporte");

reporte.addEventListener("submit", function (e) {
  e.preventDefault();

  var datos = new FormData(reporte);

  // console.log(datos);
   console.log(datos.get('nombre'))
   console.log(datos.get('apellidos'))
    console.log(datos.get('laboratorio'))
    console.log(datos.get('reporteNom'))
    console.log(datos.get('dateCreacion'))
    console.log(datos.get('statusLaboratorio'))
    console.log(datos.get('introduccion'))
    console.log(datos.get('marcoTeorico'))
    console.log(datos.get('materiales'))
    console.log(datos.get('procedimientos'))
    console.log(datos.get('resultados'))
    console.log(datos.get('conclusiones'))
    console.log(datos.get('materialEscuela'))


  fetch("../user/procesos/crear-reporte.php", {
    method: "POST",
    body: datos,
  })
    .then((res) => res.json())
    .then((data) => {
      console.log(data);
      if (data === "error") {
        Swal.fire("Error", "Revise los datos ingresados", "error");
      }else if (data === "error-laboratorio") {
        Swal.fire("Error", "Revise que el campo de seleccion de laboratorio este lleno", "error");
      }else if (data === "error-reporteNom") {
        Swal.fire("Error", "Revise que el campo nombre de reporte este lleno", "error");
    }else if (data === "error-dateCreacion") {
        Swal.fire("Error", "Revise que el campo  este lleno", "error");
    }else if (data === "error-statusLaboratorio") {
        Swal.fire("Error", "Revise que el campo status de laboratorio este lleno", "error");
    }else if (data === "error-introduccion") {
        Swal.fire("Error", "Revise que el campo introduccion este lleno", "error");
    }else if (data === "error-marcoTeorico") {
        Swal.fire("Error", "Revise que el campo del marco teorico este lleno", "error");
    }else if (data === "error-materiales") {
        Swal.fire("Error", "Revise que el campo de materiales este lleno", "error");
    }else if (data === "error-procedimientos") {
        Swal.fire("Error", "Revise que el campo de procedimientos este lleno", "error");
    }else if (data === "error-resultados") {
        Swal.fire("Error", "Revise que el campo resultados este lleno", "error");
    }else if (data === "error-conclusiones") {
        Swal.fire("Error", "Revise que el campo conclusiones este lleno", "error");
    }else if (data === "error-materialEscuela") {
        Swal.fire("Error", "Revise que el campo de materiales de la escuela este lleno", "error");
    } else {
        Swal.fire(
            'Se a creado Correctamente',
            'El reporte lo podra descargar despues de que el encargado lo libere',
            'success'
          )
      }
    });
});

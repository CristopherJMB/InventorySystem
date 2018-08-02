var table;

//Función que se ejecuta al inicio
function init(){
  mostrarForm(false);
  listar();

  $("#formulario").on("submit",function(e){
    guardaryeditar(e);
  })
}
//Función limpiar
function limpiar(){
  $("#idcategoria").val("");
  $("#nombre").val("");
  $("#descripcion").val("");
}

//Función para mostrar formulario
function mostrarForm(flag){
  limpiar();
  if (flag) {
    $("#listadoregistros").hide();
    $("#formularioregistros").show();
    $("#btnGuardar").prop("disabled",false);

  } else {
    $("#listadoregistros").show();
    $("#formularioregistros").hide();
  }
}

//Función cacelarForm
function cancelarForm(){
  limpiar();
  mostrarForm(false);
}

//Función listar (Enviajara la peteción ajax, al archivo categoria.php y le envie un valor al objeto pop)
function listar(){
  tabla=$('#tbllistado').dataTable(
    {
    "aProcessing" : true, //Activamos el procesamiento del datatable
    "aServerSide" : true, //Paginación y filtración por el servidor
    dom: 'Bfrtip', //definimos los elementos por el control de la tabla que vamos a mostrar
    buttons:[
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
          ],
    "ajax":
    {
      url:'../ajax/categoria.php?op=listar',
      type: "get",
      dataType: "json",
      error: function(e){
        console.log(e.responseText);
      }
    },
    "bDestroy": true,
    "iDisplayLength": 5, //Paginación cada 5 registros
    "order":[[ 0,"desc" ]] //Lo ordeno de forma descendente

  }).DataTable();
}

//Función para guardar o editar
function guardaryeditar(e)
{
  e.preventDefault(); //No se actriva al evento predeterminado
  $("#btnGuardar").prop("disabled",true);
  var formData = new FormData($("#formulario")[0]);

  $.ajax({
    url: "../ajax/categoria.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,

    success: function(datos)
    {
      alert(datos);
      mostrarform(false);
      tabla.ajax.reload();
    }
  });
  limpiar();
}

init();

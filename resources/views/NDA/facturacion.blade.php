@extends('layouts.app')


@section('imports')
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">

@endsection

@section('content')

<br />
<div class="col-md-12">
  <h1>Formulario para generar NDA Facturación</h1>
  <p class="text-info">
    Por favor proporcione la información que requieren los campos, es muy importante seguir las secuencias, orden y características en que se plantea la presentación de los datos
  </p>
  <hr />
</div>




<br />
  <form action="{{asset('php/temp/nda_facturacion.php')}}" target="_blank" method="post">

        <div class="col-md-12">
          <h2>Datos sobre Consorcio HERMES y su Representante Legal</h2>
          <div class="row">
            <div class="col-md-12">

              <p class="text-info">
                En esta sección incorporaremos  los datos que dentro del Contrato corresponden a la empresa y a la persona que le representa, es muy importante que cuente con los instrumentos con que se acredita tal representación a menos que consten en la Escritura Constitutiva pues se encuentran precargados.
              </p>
            </div>

          </div>
          <hr />
        </div>


      <div class="col-md-12">
        <div class="row">
          <div class="form-group col-md-6">
            <label  for="domicilio_empre">Domicilio determinado por la dirección general  </label>
            <input required type="text" class="form-control" name="domicilio_empre" id="domicilio_empre"
            value="Prolongación Corregidora No. 15, Colonia San Pablo, Santiago de Querétaro, Querétaro, C.P. 76130"
            placeholder=" Calle , Colonia, Municipio, Estado , C.P.">
          </div>
        </div>



    <div class="row">
      <div class="form-group col-md-5">
        <label for="representante">Nombre Completo del Representante Legal</label>
        <input required type="text" class="form-control" name="representante" id="representante" placeholder="Juan Pablo Pérez Pérez">
      </div>
    </div>

    <div class="row">
      <div class="form-group col-md-3">
        <label  for="correo_repres">Correo Electrónico de Representante  </label>
        <div class="input-group">
          <input type="text" class="form-control" name="correo_repres" id="correo_repres" placeholder=" ejemplo" required>
          <span class="input-group-addon">@consorciohermes.mx</span>
        </div>
      </div>
    </div>


    <h4>Respecto a las facultades del Representante legal</h4>
    <p>
      Por favor indique en que documento se encuentran las facultades del representante legal
    </p>
    <div class="row">
      <div class="col-md-12">
        <label for="Cb">¿Las facultades del representante legal se encuentran previstas en la Escritura Constitutiva de Consorcio HERMES?</label>
      </div>

      <div class="form-group col-md-3">

        <select class="form-control col-md-3" name="Cb" id="Cb" onchange="muestraopb2()">
              <option value="1">
                Si
              </option>
              <option value="2">
                No
              </option>
        </select>
      </div>
    </div>




    <div  id="OPCIONALCB">
      <div class="row">
        <div class="form-group col-md-5">
          <label id="label_numinst" for="numeroinstrumento">Indique el número de la escritura pública o póliza correspondiente</label>
          <input type="text" class="form-control" name="numeroinstrumento" id="numeroinstrumento" placeholder=" 212331">
        </div>
      </div>
      <span>Indique la fecha de la escritura o póliza correspondiente. (Hacer Click para escoger la fecha)</span>

      <div class="row">
        <div class="form-group  col-md-4">
          <input type="text" class="form-control" name="fecha_poliza" id="fecha_poliza">
        </div>
      </div>


      <div class="row">
        <div class="form-group col-md-5">
          <label id='label_nombrep' for="nombre_publico">Señale el nombre del Fedatario Público ante quien se otorgó la escritura o póliza sin indicar Título Profesional:</label>
          <input type="text" class="form-control" name="nombre_publico" id="nombre_publico" placeholder=" Francisco Alejandro Perez Perez">
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-3">
          <label for="publico" id="label_publico">Seleccione el tipo de fedatario público ante el cual fue otorgado el poder o mandato</label>
          <select class="form-control col-md-3" name="publico" id="publico" onchange="instrumento()">
                <option value="0">
                  Seleccione una opción...
                </option>
                <option value="1">
                  Notario Público
                </option>
                <option value="2">
                  Corredor Público
                </option>
          </select>
        </div>
      </div>


      <div id="notario">

        <div class="row">
          <div class="form-group col-md-5">
            <label for="notaria_numero">Número de Notaría</label>
            <input type="text" class="form-control" name="notaria_numero" id="notaria_numero" placeholder=" 123456789">
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-5">
            <label  for="notario_estadom">Estado y/o Municipio de Adscripción</label>
            <input type="text" class="form-control" name="notario_estadom" id="notario_estadom" placeholder=" Querétaro, Querétaro">
          </div>
        </div>
      </div>


      <div id="corredor">

        <div class="row">
          <div class="form-group col-md-5">
            <label  for="numero_corredor">Número de Correduría</label>
            <input type="text" class="form-control" name="numero_corredor" id="numero_corredor" placeholder=" 1234567">
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-5">
            <label  for="corredor_estado">Entidad Federativa </label>
            <input type="text" class="form-control" name="corredor_estado" id="corredor_estado" placeholder=" Querétaro">
          </div>
        </div>
      </div>

    </div><!-- cierre de cb-->


</div>



<div class="col-md-12">
  <h2>Datos del Trabajador</h2>
  <div class="row">
    <div class="col-md-12">

      <p class="text-info">
        En este apartado incorporaremos los datos que corresponden a el Trabajador  es muy importante que sean coincidentes con la información que consta en el contrato individual de trabajo
      </p>
    </div>

  </div>
  <hr />
</div>


<div class="col-md-12">
  <div class="row">
    <div class="form-group col-md-5">
      <label for="empleado">Nombre Completo del Trabajador</label>
      <input required type="text" class="form-control" name="empleado" id="empleado" placeholder="Rodrigo Alejando Sánchez Luna">
    </div>
  </div>




    <div class="row">
      <div class="form-group col-md-3">
        <label for="nac">Nacionalidad del trabajador:</label>
        <select class="form-control col-md-3" name="nac" id="nac" onchange="nacionalidad()">
              <option value="1">
                Mexicana
              </option>
              <option value="2">
                Otro
              </option>
        </select>
      </div>
    </div>

    <div id="mexicana">
      <div class="row">
        <div class="form-group col-md-5">
          <label  for="curp_emp">CURP del trabajador: </label>
          <input type="text" class="form-control" name="curp_emp" id="curp_emp" placeholder="ASBG680531HDF123">
        </div>
      </div>
    </div>

    <div id="otra">
      <div class="row">
        <div class="form-group col-md-5">
          <label  for="nac_emp">Nacionalidad según Pasaporte y permiso del Instituto Nacional de Migración: </label>
          <input type="text" class="form-control" name="nac_emp" id="nac_emp" placeholder="CANADIENSE">
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-5">
          <label  for="permiso_emp">Número de permiso para trabajar otorgado por el Instituto Nacional de Migración: </label>
          <input type="text" class="form-control" name="permiso_emp" id="permiso_emp" placeholder="12345789">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="form-group col-md-3">
          <label id="label_edademp" for="edad_emp">Indique la Edad del Trabajador con letra </label>
          <div class="input-group">
            <input type="text" class="form-control" name="edad_emp" id="edad_emp" placeholder="TREINTA" required>
            <span id="label_edademp" class="input-group-addon">AÑOS</span>
          </div>
      </div>
    </div>

    <div class="row">
      <div class="form-group col-md-5">
        <label  for="domicilio_emp">Domicilio acreditado en el expediente laboral del trabajador:  </label>
        <input type="text" class="form-control" name="domicilio_emp" id="domicilio_emp" placeholder=" Calle , Colonia, Municipio, Estado , C.P." required>
      </div>
    </div>


    <div class="row">
      <div class="form-group col-md-5">
        <label  for="corre_emp">Correo Electrónico PERSONAL del trabajador:  </label>
        <input type="email" class="form-control" name="corre_emp" id="corre_emp" placeholder="francisco@gmail.com" required>
      </div>

    </div>

    <h4>Fecha del contrato laboral</h4>
    <p>
      Esta fecha es la que corresponde a la firma del contrato laboral (Hacer Click para escoger la fecha)
    </p>

    <div class="row">
      <div class="form-group  col-md-4">
        <input type="text" class="form-control" name="fecha_contLab" id="fecha_contLab" required>
      </div>
    </div>


</div>




  <div class="col-md-12">
    <h2>Datos del NDA</h2>
    <div class="row">
      <div class="col-md-12">

      </div>

    </div>
    <hr />
  </div>

<div class="col-md-12">



      <h4>Fecha de Firma del NDA</h4>
      <p>
        Por favor indique la fecha en la que se firma el NDA. (Hacer Click para escoger la fecha)
      </p>
      <div class="row">
        <div class="form-group  col-md-4">
          <input type="text" class="form-control" name="fecha_NDA" id="fecha_NDA" required>
        </div>
      </div>

</div>


<br /><br /><br />
















    <div class="row">
      <div class="col-md-12">
        <button type="submit" class="btn btn-default col-md-offset-9">Enviar</button>
      </div>
    </div>


<br /><br /><br />



  </form>




@endsection


@section('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script >
$.datepicker.regional['es'] = {
  closeText: 'Cerrar',
  prevText: '<Ant',
  nextText: 'Sig>',
  currentText: 'Hoy',
  monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
  monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
  dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
  dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
  dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
  weekHeader: 'Sm',
  dateFormat: 'dd/mm/yy',
  firstDay: 1,
  isRTL: false,
  showMonthAfterYear: false,
  yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['es']);

  $(function(){
    $("#OPCIONALCB").hide();
    $("#corredor").hide();
    $("#notario").hide();
    $("#otra").hide();

    $("#fecha_contLab").datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: '2005:2031',
      minDate: new Date('7/8/2005'),
      onClose: function( selectedDate ) {
        $( "#fecha_NDA" ).datepicker( "option", "minDate", selectedDate );
      }
    });

    $( "#fecha_NDA" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: '2016:2031',
    });
    $( "#fecha_poliza" ).datepicker({
      changeMonth: true,
      changeYear: true,
      minDate: new Date('7/8/2005'),
      yearRange: '2005:2031',
    });

  });
  function muestraopb2(){
    var selec = $("#Cb").val();
    if(selec==2){
      $("#OPCIONALCB").show('fade');
    }else{
      $("#publico").val(0)
      $("#corredor").hide();
      $("#notario").hide();
      $("#OPCIONALCB").hide('fade');
    }
  }

  function instrumento(){
    var selec = $("#publico").val();

    if(selec==1){
      $("#corredor").hide('fade');
      $("#notario").show('fade');

    }else if(selec==2){
      $("#corredor").show('fade');
      $("#notario").hide('fade');
    }else{
      $("#corredor").hide('fade');
      $("#notario").hide('fade');
    }
  }

  function nacionalidad(){
    var selec = $("#nac").val();
    if(selec==1){
      $("#otra").hide('fade');
      $("#mexicana").show('fade');

    }else{
      $("#otra").show('fade');
      $("#mexicana").hide('fade');
    }
  }

  $( "form" ).submit(function( event ) {
    $("#label_numinst").removeClass('text-danger');
    $("#label_nombrep").removeClass('text-danger');
    $("#label_publico").removeClass('text-danger');
    $("#corredor").removeClass('bg-danger');
    $("#label_edademp").removeClass('text-danger');
    $("#fecha_poliza").removeClass('bg-danger');

    var bandera = true;

    if($("#numeroinstrumento").is(':visible')){
      if($("#numeroinstrumento").val()==''){
        $("#label_numinst").addClass('text-danger');
        bandera=false;
      }

    }

    if($("#nombre_publico").is(':visible')){
      if($("#nombre_publico").val()==''){
        $("#label_nombrep").addClass('text-danger');
        bandera=false;
      }

    }

    if($("#publico").is(':visible')){
      if($("#publico").val()==0){
        $("#label_publico").addClass('text-danger');
        bandera=false;
      }

    }

    if($("#numero_corredor").is(':visible')){
      if($("#numero_corredor").val()=='' ){
        $("#corredor").addClass('bg-danger');
        bandera=false;
      }
      if(isNaN($("#numero_corredor").val())){
        $("#corredor").addClass('bg-danger');
        bandera=false;
      }

    }


    if($("#notaria_numero").is(':visible')){
      if($("#notaria_numero").val()=='' ){
        $("#notario").addClass('bg-danger');
        bandera=false;
      }
      if(isNaN($("#notaria_numero").val())){
        $("#notario").addClass('bg-danger');
        bandera=false;
      }

    }

    if($("#corredor_estado").is(':visible')){
      if($("#corredor_estado").val()==''){
        $("#corredor").addClass('bg-danger');
        bandera=false;
      }

    }

    if($("#fecha_poliza").is(':visible')){
      if($("#fecha_poliza").val()==""){
        $("#fecha_poliza").addClass('bg-danger');
        bandera=false;
      }
    }

    if(!isNaN($("#edad_emp").val())){
      $("#label_edademp").addClass('text-danger');
      bandera=false;
    }

    if(bandera){
      return;
    }else{
      alert("Verificar errores que se resaltan en color rojo");
    }


    event.preventDefault();
  });


</script>

@endsection

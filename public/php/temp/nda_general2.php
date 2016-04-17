<?php
$meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio', 'Agosto','Septiembre','Octubre','Noviembre','Diciembre');
$dias = array('Primero', 'Dos','Tres', 'Cuarto',
              'Cinco','Seis','Siete','Ocho',
              'Nueve', 'Diez', 'Once','Doce', 'Trece',
              'Catorce', 'Quince','Dieciséis', 'Diecisiete' , 'Dieciocho',
              'Diecinueve', 'Veinte', 'Veintiuno', 'Veintidos', 'Veititres',
              'Veiticuatro', 'Veiticinco', 'Veintiséis', 'Veintisiete', 'Veintiocho',
              'Veintinueve', 'Treinta', 'Treintaiuno');

$anio = array('Uno', 'Dos','Tres', 'Cuarto',
              'Cinco','Seis','Siete','Ocho',
              'Nueve', 'Diez', 'Once','Doce', 'Trece',
              'Catorce', 'Quince','Dieciséis', 'Diecisiete' , 'Dieciocho',
              'Diecinueve', 'Veinte', 'Veintiuno', 'Veintidos', 'Veititres',
              'Veiticuatro', 'Veiticinco', 'Veintiséis', 'Veintisiete', 'Veintiocho',
              'Veintinueve', 'Treinta', 'Treintaiuno');

$paginas = array('Una', 'Dos','Tres', 'Cuarto',
              'Cinco','Seis','Siete','Ocho',
              'Nueve', 'Diez', 'Once','Doce', 'Trece',
              'Catorce', 'Quince','Dieciséis', 'Diecisiete' , 'Dieciocho',
              'Diecinueve', 'Veinte', 'Veintiuno', 'Veintidos', 'Veititres',
              'Veiticuatro', 'Veiticinco', 'Veintiséis', 'Veintisiete', 'Veintiocho',
              'Veintinueve', 'Treinta', 'Treintaiuno');



define('REPRESENTANTE', strtoupper($_POST['representante']));
define('EMPLEADO', strtoupper($_POST['empleado']));




define('DIA', $_POST['fechad']);
define('MES', $meses[$_POST['fecham']-1]);
define('ANIO', $_POST['fechan']+2000);


define('ClauB', $_POST['Cb']);
define('numeroinst',$_POST['numeroinstrumento']);
define('opbm', $meses[$_POST['opbm']-1]);
define('opbd', $dias[$_POST['opbd']-1]);
define('opbn', $anio[$_POST['opbn']-1]);
define('ClaussB', $_POST['opcionb']);

define('NOMBRE_PUBLICO', strtoupper($_POST['nombre_publico']));
define('NOTARIO_O_CORREDOR', $_POST['publico']);

define('NUMERO_NOTARIA', $_POST['notaria_numero']);
define('NOTARIA_ESTAOM', ucwords($_POST['notario_estadom']));

define('NUMERO_CORREDOR', $_POST['numero_corredor']);
define('CORREDOR_ESTADO', $_POST['corredor_estado']);



define('DOMICILIO_HERMES', $_POST['domicilio_empre']);
define('CORREO_REPRESENTANTE',ucwords( $_POST['correo_repres']));


define('NACIONALIDAD', $_POST['nac']);
define('EMP_CURP', $_POST['curp_emp']);
define('NAC_EXTRANJERO', $_POST['nac_emp']);
define('NUMERO_PERMISO', $_POST['permiso_emp']);
define('EDAD_EMPLEADO', $_POST['edad_emp']);
define('DOMICILIO_EMPLEADO', $_POST['domicilio_emp']);
define('EMAIL_EMPLEADO', $_POST['corre_emp']);


define('DIA_CONT',$dias[$_POST['dia_cont']-1]);
define('MES_CONT',$meses[$_POST['mes_cont']-1]);
define('ANIO_CONT',$anio[$_POST['dia_cont']-1]);

// Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf.php');



class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        $header="            Hoja  ".$this->getAliasNumPage()." / ".$this->getAliasNbPages()."  del Convenio de Confidencialidad que celebran ";
        // Logo
        $image_file = K_PATH_IMAGES.'logo.jpg';
        $this->Image($image_file, 3, 7, 40, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 10);
        // Title
        $this->Cell(0,10, $header, 0, 2, 'L', 0, '', 0, false, 'M', 'M');
        $header="            “CONSORCIO HERMES” y ".EMPLEADO;
        $this->Cell(0, 10, $header, 0, 2, 'L', 0, '', 0, false, 'M', 'M');
        $header="             de fecha ".DIA." de ".MES." de ".ANIO;
        $this->Cell(0, 10, $header, 0, 2, 'L', 0, '', 0, false, 'M', 'M');
    }

}


// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Consorcio Hermes');

$hoy = date("d_m_y");
$nombre.=str_replace(' ', '_',EMPLEADO);
$nombre.=$hoy."_"."NDA";

$pdf->SetTitle($nombre);
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');











// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);



// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 13);

// add a page
$pdf->AddPage();

$representante = REPRESENTANTE;
$empleado = EMPLEADO;


if(ClauB==1){
  $textoCB='contenido de los Estatutos de la Escritura Pública descrita en el apartado anterior manifestando que dichas facultades, conforme a las cuales actúa, no le han sido revocadas, modificadas ni limitadas de manera alguna.';
}else if(ClauB==2){
  $textoCB="Instrumento Público No.".numeroinst." de fecha ".opbd." de ".opbm." de Dos Mil ".opbn;
  $textoCB.=" otorgado ante la fe del Fedatario Público ".NOMBRE_PUBLICO  ;

  if(NOTARIO_O_CORREDOR==1){
    $textoCB.=" Notario Público Número ";
    $textoCB.=NUMERO_NOTARIA;
    $textoCB.=" en ".NOTARIA_ESTAOM;
  }
  else if(NOTARIO_O_CORREDOR==2){
    $textoCB.=" Corredor Público ";
    $textoCB.=NUMERO_CORREDOR;
    $textoCB.=" en ".CORREDOR_ESTADO;
  }
}

$textoCB.=" inscrito en el Registro Público de Comercio, bajo el número de Folio Mercantil Electrónico 31322 (treinta y un mil trescientos veintidós) correspondiente a “CONSORCIO HERMES”, manifestando que dichas facultades, conforme a las cuales actúa, no le han sido revocadas, modificadas ni limitadas de manera alguna.";



// define some HTML content with style
$html =<<<EOF
<style>
p{
  text-align:justify;

}
  </style>
      <table>
        <tr>
          <td width="50">

          </td>
          <td width="550">
            <p style="text-align:justify;">
              <b>CONVENIO DE CONFIDENCIALIDAD QUE CELEBRAN POR UNA PARTE CONSORCIO HERMES, S.A DE C.V., POR CONDUCTO DE SU REPRESENTANTE LEGAL</b>
              <b>$representante</b>
              <b>A QUIEN EN ADELANTE SE LE DENOMINARÁ INDISTINTAMENTE “CONSORCIO HERMES” O “LA EMPRESA” Y POR OTRA PARTE</b>
              <b>$empleado</b>
              <b>QUIEN INTERVIENE PERSONALMENTE Y POR DERECHO PROPIO A QUIEN EN ADELANTE SE LE DENOMINARÁ “EL TRABAJADOR”, DE ACUERDO CON LAS SIGUIENTES:</b>

            </p>
          </td>
        </tr>

        <tr>
          <td width="250">

          </td>
          <td>
            <b>DECLARACIONES:</b>
          </td>
        </tr>


        <tr>
          <td width="40">

          </td>
          <td width="550">
            <p>
              <b>I. Declara “CONSORCIO HERMES” a través de su representante legal:</b>
            </p>
          </td>
        </tr>

        <tr>
          <td width="50">

          </td>
          <td width="550">
            <p>
              <b>A) </b> Que es una Sociedad Anónima de Capital Variable debidamente constituida conforme a las leyes de los Estados Unidos Mexicanos, según consta en la Escritura Pública No. 10,071 (diez mil setenta y uno), de fecha ocho de julio del año dos mil cinco, otorgada ante la fe de la licenciada Sonia Alcántara Magos  Titular de la Notaría No. 18 (dieciocho) de la Ciudad de Santiago de Querétaro, Estado de Querétaro, cuyo primer testimonio quedó inscrito en el Registro Público de Comercio, bajo el número de Folio Mercantil Electrónico 31322/1 (treinta y un mil trescientos veintidós diagonal uno).
            </p>
          </td>
        </tr>



      <tr>
        <td width="50">

        </td>
        <td width="550">
        <p>
          <b>B) </b> Que su representante legal cuenta con las facultades necesarias para obligar a su representada conforme a lo estipulado en el presente contrato  tal y como se desprende del $textoCB
        </p>

        </td>
      </tr>

      <tr>
        <td width="50">

        </td>
        <td width="550">
        <p>
          <b>C)</b>   Que está inscrito en el Registro Federal de Contribuyentes con la Clave CHE050708RH4, y Cédula de Identificación Fiscal B0425166 expedida por el Servicio de Administración Tributaria.
        </p>

        </td>
      </tr>


</table>

EOF;

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// add a page
$pdf->AddPage();
$domicilio_hermes =DOMICILIO_HERMES;
$correo_repres = CORREO_REPRESENTANTE;


if(NACIONALIDAD==1){
  $textoUNICA="mexicana, con Clave Única de Registro de Población ".EMP_CURP;
}else if(NACIONALIDAD==2){
  $textoUNICA = NAC_EXTRANJERO.", ";
  $textoUNICA.= "con permiso para trabajar en México número ".NUMERO_PERMISO." otorgado por el Instituto Nacional de Migración,";
}


$edad_emp=EDAD_EMPLEADO;
$dom_emp = DOMICILIO_EMPLEADO;
$correo_emp = EMAIL_EMPLEADO;

$fechaCont=" ".DIA_CONT." de ".MES_CONT." de "." dos mil ".ANIO_CONT;

$html = <<<EOF
<style>
p{
  text-align:justify;

}
  </style>

<table>



  <tr>
    <td width="50">

    </td>
    <td width="550">
    <p>
      <b>D)</b>  Que señala como domicilio para oír y recibir notificaciones derivadas o relacionadas
      con el presente instrumento el ubicado en: $domicilio_hermes  y correo electrónico $correo_repres@consorciohermes.mx los cuales reconoce subsistirán para los efectos del presente contrato hasta en tanto no proporcione otros diversos por escrito a “EL TRABAJADOR”.
    </p>

    </td>
  </tr>

  <tr>
    <td width="40">

    </td>
    <td width="580">
    <p>
      <b>II. Declara “EL TRABAJADOR” personalmente y por su propio derecho:</b>
    </p>



    </td>
  </tr>

  <tr>
    <td width="50">

    </td>
    <td width="550">
    <p>
      <b>Única.-</b> Llamarse como ha quedado indicado al rubro del presente documento, ser de nacionalidad $textoUNICA ser de $edad_emp años de edad, con domicilio para oír y recibir notificaciones derivadas o relacionadas con el presente instrumento en $dom_emp y correo electrónico
      $correo_emp los cuales reconoce subsistirán para los efectos del presente contrato hasta en tanto no proporcione otros diversos por escrito a “CONSORCIO HERMES”.
    </p>



    </td>
  </tr>


  <tr>
    <td width="40">

    </td>
    <td width="580">
    <p>
      <b>III. Declaran “CONSORCIO HERMES”  y “EL TRABAJADOR”:</b>
    </p>



    </td>
  </tr>

  <tr>
    <td width="50">

    </td>
    <td width="550">
    <p>
      <b>a)</b>.- Que con fecha $fechaCont suscribieron un Contrato Individual de Trabajo sujeto a los términos que en el mismo se precisan, cuyo objeto es establecer los derechos y obligaciones de su relación laboral.
    </p>



    </td>
  </tr>

  <tr>
    <td width="50">

    </td>
    <td width="550">
    <p>
      <b>b)</b>.- Que en virtud de la situación laboral que les obliga se hace necesario precisar los términos a que se sujetarán respecto del manejo de la información que puede ser del conocimiento de “EL TRABAJADOR” con motivo de su contratación, el desempeño de sus funciones o el acceso a las áreas físicas o a la infraestructura tecnológica de “CONSORCIO HERMES” o a sus proyectos.
      </p>

    </td>
  </tr>

  <tr>
    <td width="50">

    </td>
    <td width="550">
    <p>
    En atención a lo expuesto “CONSORCIO HERMES” y “EL TRABAJADOR” se someten a las siguientes:
    </p>



    </td>
  </tr>
</table>
EOF;




// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->AddPage();

$html=<<<EOF
<style>
p{
  text-align:justify;

}
  </style>

  <table>


    <tr>
      <td width="250">

      </td>
      <td>
        <b>CLÁUSULAS:</b>
      </td>
    </tr>

  <tr>
    <td width="50">

    </td>
    <td width="550">
      <p>
        <b>PRIMERA.-</b> .El objeto del presente convenio es establecer las condiciones a que se sujetará “EL TRABAJADOR” respecto de su conducción y manejo de la información que pueda llegar a ser de su conocimiento con motivo de su contratación por parte de “CONSORCIO HERMES” y el desempeño de sus funciones, su participación directa o indirecta en cualesquiera de los proyectos de negocio de “LA EMPRESA” o el acceso a las áreas físicas o a la infraestructura tecnológica de “CONSORCIO HERMES”
      </p>
    </td>
  </tr>

  <tr>
    <td width="50">

    </td>
    <td width="550">
      <p>
        <b>SEGUNDA.-</b> Salvo las excepciones que este instrumento expresamente determine, las disposiciones contenidas en el presente Convenio serán aplicables a “EL TRABAJADOR” y a “CONSORCIO HERMES” durante la vigencia del Contrato Individual de Trabajo indicado en la Declaración III inciso a) de este instrumento o de cualquier otro contrato, acuerdo o documento que le sustituya y rija su relación de trabajo. Las disposiciones de este convenio continuarán siendo vigentes por un periodo de tres años contado a partir de la conclusión de la relación laboral sin importar la causa o el motivo de su terminación.
      </p>
    </td>
  </tr>

  <tr>
    <td width="50">

    </td>
    <td width="550">
      <p>
        <b>TERCERA.-</b>   “EL TRABAJADOR” reconoce y acepta que cualquier información a que acceda o sea de su conocimiento derivada o  con motivo de la relación laboral que sostiene con “CONSORCIO HERMES” tiene una aplicación comercial que le permite a “LA EMPRESA” obtener o mantener una ventaja competitiva o económica frente a terceros en la realización de su actividad empresarial, en consecuencia  “CONSORCIO HERMES” ha implantado diversos controles jurídicos y tecnológicos para preservar dicha información por lo que “EL TRABAJADOR” la considerará y tratará como “CONFIDENCIAL” y “RESTRINGIDA”.
      </p>
    </td>
  </tr>

  <tr>
    <td width="50">

    </td>
    <td width="550">
      <p>
        <b>CUARTA.- </b> “CONSORCIO HERMES” almacena e integra periódicamente la información a que se refiere la Cláusula anterior en documentos, medios electrónicos o magnéticos, discos ópticos, microfilmes, películas u otros instrumentos similares como parte de su sistema de gestión del conocimiento; cualesquiera de dichos instrumentos o mecanismos que sean proporcionados a “EL TRABAJADOR” o a los cuales éste puede llegar a tener acceso con motivo de la relación laboral  que sostiene con “LA EMPRESA” tendrán el carácter de “CONFIDENCIAL” y “RESTRINGIDO”.
      </p>
    </td>
  </tr>


  </table>




EOF;


$pdf->writeHTML($html, true, false, true, false, '');
$pdf->AddPage();



$html = <<<EOF
<style>
p{
  text-align:justify;

}
  </style>

<table>

<tr>
  <td width="50">

  </td>
  <td width="550">
    <p>
      <b>QUINTA.- </b> La administración de “CONSORCIO HERMES” determina respecto de su información aquella que excepcionalmente debe tener carácter público acorde a sus estrategias de negocio y en estricto apego a los acuerdos de confidencialidad que suscribe con otras empresas.  Cuando cierta información propiedad o en posesión de “LA EMPRESA” es considerada pública, se publicita a través de medios de divulgación autorizados y contratados por “LA EMPRESA” y  mediante INTERNET por conducto de dominios que son adquiridos y registrados por “CONSORCIO HERMES” de manera directa o a través de sus subsidiarias siendo el principal el ubicado en la dirección electrónica www.consorciohermes.mx.  En ningún otro caso “EL TRABAJADOR” podrá asumir o inferir que la información  de “LA EMPRESA” es pública y de detectar algún supuesto que lo implique deberá reportarlo inmediatamente por escrito a la Dirección General de “CONSORCIO HERMES”.
    </p>
  </td>
</tr>



<tr>
  <td width="50">

  </td>
  <td width="550">
    <p>
      <b>SEXTA.-</b>  Cuando “EL TRABAJADOR” actúe bajo cualquier figura en representación o a nombre de “CONSORCIO HERMES” o intervenga en procedimientos de licitación, adquisición o de concurso de los sectores público o privado o realice cualquier acción de comercialización o participe en cualesquiera de las diversas actividades que involucra el Objeto Social de “LA EMPRESA”,  o tenga encomendado intervenir en la ejecución de proyectos sujetos a derechos y obligaciones acordados por “CONSORCIO HERMES”, deberá asumir como “CONFIDENCIAL” la información que le sea proporcionada por terceros, el cliente, sus representantes o sus trabajadores.
    </p>
  </td>
</tr>


<tr>
  <td width="50">

  </td>
  <td width="550">
    <p>
      “EL TRABAJADOR” que participe en los supuestos señalados en la presente Cláusula asumirá respecto de la información que se le haya proporcionado o sobre la cual tuvo conocimiento, la obligación de incorporarla  de manera intelegible en archivos de texto que deberán almacenarse mediante el uso de medios electrónicos en discos ópticos o discos duros de y bajo control de “LA EMPRESA”, mismos que se sujetarán al proceso de seguridad e encriptación que establezca la Administración de “CONSORCIO HERMES”.  Esta obligación subsistirá aun y cuando “EL TRABAJADOR” estime o reciba autorización del  tercero, el  cliente, su representante o trabajador con el cual hubiere interactuado que le permita asumir la posibilidad de tratar la información mencionada de forma distinta.
    </p>
  </td>
</tr>


</table>


EOF;


$pdf->writeHTML($html, true, false, true, false, '');
$pdf->AddPage();

$html = <<<EOF

<style>
p{
  text-align:justify;

}
  </style>

<table>

<tr>
  <td width="50">

  </td>
  <td width="550">
    <p>
      Es responsabilidad de “CONSORCIO HERMES” y no de “EL TRABAJADOR” determinar el destino final de la información a que se refiere esta Cláusula, su entrega posterior, conservación o destrucción según los acuerdos comerciales aplicables.  Una vez almacenada la información en los discos ópticos o discos duros a que se refiere el párrafo anterior la información almacenada además de “CONFIDENCIAL” se considerará “RESTRINGIDA”.
    </p>
  </td>
</tr>

<tr>
  <td width="50">

  </td>
  <td width="550">
    <p>
       A través del presente instrumento “CONSORCIO HERMES” autoriza a “EL TRABAJADOR” para utilizar la información a que se refiere la presente cláusula exclusivamente en el contexto del proyecto específico del cual emanó y hasta en tanto “EL TRABAJADOR” se encuentre asignado al mismo por parte de “LA EMPRESA”.  Una vez concluida la participación de “EL TRABAJADOR” en el proyecto éste quedará impedido de utilizar dicha información a menos que medie autorización por escrito de “CONSORCIO HERMES” que en forma expresa así lo acredite.
    </p>
  </td>
</tr>


<tr>
  <td width="50">

  </td>
  <td width="550">
    <p>
      <b>SÉPTIMA.-</b> “EL TRABAJADOR” guardará escrupulosamente los secretos técnicos y comerciales así como de los asuntos administrativos reservados de los cuales tenga conocimiento con motivo de su contratación por parte de “CONSORCIO HERMES” y el desempeño de sus funciones.

    </p>
  </td>
</tr>


<tr>
  <td width="50">

  </td>
  <td width="550">
    <p>
      “EL TRABAJADOR” considerará como asuntos administrativos reservados, cuya divulgación puede causar perjuicios a “CONSORCIO HERMES” cualquier información de los empleados, asesores o socios de “LA EMPRESA”, características y ubicación de sus instalaciones, su información financiera, tarifas de servicios, recursos materiales, procesos, guías e instructivos administrativos.

    </p>
  </td>
</tr>







</table>
EOF;


$pdf->writeHTML($html, true, false, true, false, '');
$pdf->AddPage();



$html= <<<EOF

<style>
p{
  text-align:justify;

}
  </style>

<table>

<tr>
  <td width="50">

  </td>
  <td width="550">
    <p>
      “EL TRABAJADOR” considerará como secretos técnicos y comerciales cuya divulgación puede causar perjuicios a “CONSORCIO HERMES” cualquier información que conste en medios escritos o electrónicos, imágenes, video, voz o texto referente al nombre o nombres de clientes actuales o potenciales, negociaciones, metodologías, fórmulas de negocios, planes de trabajo, compilaciones o registros, información relativa a investigaciones o estudios sobre “LA EMPRESA”, registros de desarrollo de proyectos o investigaciones que realice o contrate “CONSORCIO HERMES” sea total o relativa a cualquiera de sus etapas, inventos, información proporcionada por sus clientes, capacidad tecnológica y programas de cómputo, así como cualquier información en que se exprese o se ostente la leyenda “Información Confidencial” incluso cuando “EL TRABAJADOR” haya intervenido en su conformación.

    </p>
  </td>
</tr>


<tr>
  <td width="50">

  </td>
  <td width="550">
    <p>
      <b>OCTAVA.-</b> “EL TRABAJADOR” manifiesta que conoce los alcances del artículo 86 de la Ley de la Propiedad Industrial el cual establece que “la persona física o moral que contrate a un trabajador que esté laborando o haya laborado o a un profesionista, asesor o consultor que preste o haya prestado sus servicios para otra persona, con el fin de obtener secretos industriales de ésta, será responsable del pago de daños y perjuicios que le ocasione a dicha persona. También será responsable del pago de daños y perjuicios la persona física o moral que por cualquier medio ilícito obtenga información que contemple un secreto industrial”.

    </p>
  </td>
</tr>

<tr>
  <td width="50">

  </td>
  <td width="550">
    <p>
      <b> NOVENA.-</b> “CONSORCIO HERMES” y “EL TRABAJADOR” acuerdan que en caso de que “LA EMPRESA” ejerza acciones en contra de una persona física o moral que contrate a “EL TRABAJADOR” en tanto esté laborando para “LA EMPRESA” o cuando haya dejado de laborar en “CONSORCIO HERMES”, con el fin de obtener secretos industriales de “CONSORCIO HERMES”, y como resultado de dichas acciones se obtenga sentencia definitiva que  declare responsable a dicha persona física o moral de los daños y perjuicios causados a “LA EMPRESA”, con independencia de la responsabilidad penal en que se incurra, “EL TRABAJADOR” pagará a “CONSORCIO HERMES”:

    </p>
  </td>
</tr>

<tr>
  <td width="50">

  </td>
  <td width="550">
    <p>
      <b>9.1 </b> una cantidad igual al cincuenta por ciento del monto total que por concepto de pago por los daños y perjuicios causados se imponga en la sentencia a la persona física o moral que se declare responsable, o

    </p>
  </td>
</tr>


</table>

EOF;

$pdf->writeHTML($html, true, false, true, false, '');
$pdf->AddPage();

$html=<<<EOF
<style>
p{
  text-align:justify;

}
  </style>

<table>

<tr>
  <td width="50">

  </td>
  <td width="550">
    <p>
      <b>9.2</b>  una cantidad equivalente en moneda nacional a USD $30´000.00
(Treinta Mil Dólares 00/100, moneda de curso legal en los Estados Unidos
de América) si este monto resultase mayor que aquel obtenido conforme al
inciso a) de esta Claúsula.


    </p>
    <p>
    Esta Cláusula será de vigencia indefinida, y en todo caso se mantendrá vigente durante todo el tiempo en que dure el procedimiento jurisdiccional entablado por “CONSORCIO HERMES” en contra de la persona física o moral que contrate a “EL TRABAJADOR” y cesará hasta concluidos tres años posteriores a que se dicte sentencia definitiva que declare responsabilidad y determine el pago de daños y perjuicios en favor de “CONSORCIO HERMES” como consecuencia de la conculcación de lo establecido en el artículo 86 de la Ley de la Propiedad Industrial.
    </p>
    <p>
      “CONSORCIO HERMES” se reserva el derecho de demandar directamente a “EL TRABAJADOR” cuando considere que se actualiza el supuesto previsto en el artículo 86 de la Ley de la Propiedad Industrial (in fine) o cualquier otra  violación a lo establecido en el presente Convenio.
    </p>
    <p>
    <b>DÉCIMA.-</b> Cualquier aviso o requerimiento derivado de lo establecido en el presente Convenio deberá ser efectuado mediante servicio de mensajería por escrito y entregado en el domicilio señalado en el presente instrumento que corresponda a “CONSORCIO HERMES” o “EL TRABAJADOR” según el caso.  Simultáneamente el aviso o requerimiento será remitido por medios electrónicos a los correos electrónicos que precisan las partes en este instrumento.

    </p>

      <p>
      Cualquier cambio de domicilio deberá ser notificado por escrito a la otra parte con cuando menos 5 días de anticipación al día en que pretendan hacer dicho cambio, de no realizar la notificación respectiva, cualquier aviso o notificación realizada en los domicilios señalados en el presente convenio surtirán todos sus efectos.
    </p>
    <p>
    <b>DÉCIMA PRIMERA.-</b> El presente Convenio contiene el acuerdo total entre las Partes con respecto a las materias aquí incluidas y sobresee y cancela todos los acuerdos, negociaciones, convenios, comunicaciones o escritos anteriores entre las Partes con relación a la materia del presente Convenio.
    </p>

  </td>
</tr>


</table>

EOF;


$pdf->writeHTML($html, true, false, true, false, '');
$pdf->AddPage();

$num=$pdf->getNumPages();
$letra = $paginas[$num-1];

$fecha = $dias[DIA-1]." de ".MES." de dos mil ".$anio[ANIO-2001];
$html=<<<EOF
<style>
p{
  text-align:justify;

}

table.final, th.final, td.final{
   border: 1px solid black;
   text-align:center;
}
  </style>

<table>

<tr>
  <td width="50">

  </td>
  <td width="550">
  <p>
  <b>DÉCIMA SEGUNDA.-</b> El uso del número singular incluye también el plural y viceversa, y el uso del género masculino incluye también el género femenino y neutro y viceversa, siempre que el sentido de este convenio lo permita.
  </p>

  <p>
      <b>DÉCIMA TERCERA.-</b> Para la interpretación y cumplimiento del presente Convenio las Partes se someten expresamente a las leyes y los tribunales competentes del Estado de Querétaro, en Santiago de Querétaro renunciando a cualquier otra competencia que pudiere corresponderles por razón de sus domicilios presentes o futuros o por cualquier otra razón.
  </p>

  <p>
    Leído que fue por las Partes y debidamente enteradas de todas y cada una de las cláusulas y del contenido y alcance legal del presente Convenio, lo suscriben por duplicado y de conformidad, reconociendo las firmas que plasman al margen y al calce en sus $num $letra fojas útiles como las que utilizan para todos los actos jurídicos en que intervienen, en Santiago de Querétaro, Querétaro a los $fecha
  </p>
  </td>
  </tr>
</table>
<br /><br /><br /><br />
<table class="final">
  <tr>
    <th class="final">
      <b>“POR CONSORCIO HERMES”</b>
    </th>
    <th>
      <b>“EL TRABAJADOR”</b>
    </th>
  </tr>
  <tr>
    <td class="final">
    <br /><br /><br /><br /><br /><br /><br /><br /><br />
      <b>$representante</b>
      <br /><br /><br />
    </td>
    <td class="final">
    <br /><br /><br /> <br /><br /><br /><br /><br /><br />
      <b>$empleado</b>
      <br /><br /><br />
    </td>
  </tr>
</table>

EOF;
$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_061.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

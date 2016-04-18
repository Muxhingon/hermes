<?php
//PARA REMPLAZAR EN NOMBRE
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
              'Diecinueve', 'Veinte', 'Veintiuno', 'Veintidos', 'Veintitres',
              'Veinticuatro', 'Veinticinco', 'Veintiséis', 'Veintisiete', 'Veintiocho',
              'Veintinueve', 'Treinta', 'Treintaiuno');

$paginas = array('Una', 'Dos','Tres', 'Cuarto',
              'Cinco','Seis','Siete','Ocho',
              'Nueve', 'Diez', 'Once','Doce', 'Trece',
              'Catorce', 'Quince','Dieciséis', 'Diecisiete' , 'Dieciocho',
              'Diecinueve', 'Veinte', 'Veintiuno', 'Veintidos', 'Veintitres',
              'Veinticuatro', 'Veniticinco', 'Veintiséis', 'Veintisiete', 'Veintiocho',
              'Veintinueve', 'Treinta', 'Treintaiuno');


//FECHAS DEL CONTRATO LABORAL
$fecha_contLAB=$_POST['fecha_contLab'];
$separada_cont = explode('/', $fecha_contLAB);
$dia_contlab = $separada_cont[0];
$mes_contlab = $separada_cont[1];
$anio_contlab = $separada_cont[2];

define('DIA_CONT',$dias[$dia_contlab-1]);
define('MES_CONT',$meses[$mes_contlab-1]);
define('ANIO_CONT',$anio[$anio_contlab-2001]);


//FECHA DEL NDA
$fecha_nda = $_POST['fecha_NDA'];
$separada_nda = explode('/', $fecha_nda);
$dia_nda = $separada_nda[0];
$mes_nda = $separada_nda[1];
$anio_nda = $separada_nda[2];

define('DIA', $dia_nda);
define('MES', $meses[$mes_nda-1]);
define('ANIO', $anio_nda);


//FECHA DE LA POLIZA
$fecha_poliza = $_POST['fecha_poliza'];
$separada_poliza = explode('/', $fecha_poliza);
$dia_poliza = $separada_poliza[0];
$mes_poliza = $separada_poliza[1];
$anio_nda = $separada_poliza[2];
define('opbm', $meses[$dia_poliza-1]);
define('opbd', $dias[$mes_poliza-1]);
define('opbn', $anio[$anio_nda-2001]);





define('REPRESENTANTE', strtoupper($_POST['representante']));
define('EMPLEADO', strtoupper($_POST['empleado']));







define('ClauB', $_POST['Cb']);
define('numeroinst',$_POST['numeroinstrumento']);
define('ClaussB', $_POST['opcionb']);

define('NOMBRE_PUBLICO', strtoupper($_POST['nombre_publico']));
define('NOTARIO_O_CORREDOR', $_POST['publico']);

define('NUMERO_NOTARIA', $_POST['notaria_numero']);
define('NOTARIA_ESTAOM', ucwords($_POST['notario_estadom']));

define('NUMERO_CORREDOR', $_POST['numero_corredor']);
define('CORREDOR_ESTADO', ucwords($_POST['corredor_estado']));



define('DOMICILIO_HERMES', $_POST['domicilio_empre']);
define('CORREO_REPRESENTANTE',strtolower( $_POST['correo_repres']));


define('NACIONALIDAD', $_POST['nac']);
define('EMP_CURP', $_POST['curp_emp']);
define('NAC_EXTRANJERO', $_POST['nac_emp']);
define('NUMERO_PERMISO', $_POST['permiso_emp']);
define('EDAD_EMPLEADO', $_POST['edad_emp']);
define('DOMICILIO_EMPLEADO', $_POST['domicilio_emp']);
define('EMAIL_EMPLEADO', $_POST['corre_emp']);




// Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf.php');



class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        $header="            Hoja  ".$this->getAliasNumPage()." / ".$this->getAliasNbPages()."  del Convenio de Confidencialidad que celebran ";
        // Logo
        $image_file = K_PATH_IMAGES.'logo.jpg';
        $this->Image($image_file, 5, 7, 50, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 10);
        // Title
        $this->Cell(0,10, $header, 0, 2, 'L', 0, '', 0, false, 'M', 'M');
        $header="            “CONSORCIO HERMES” y ".EMPLEADO;
        $this->Cell(0, 10, $header, 0, 2, 'L', 0, '', 0, false, 'M', 'M');
        $header="            de fecha ".DIA." de ".MES." de ".ANIO;
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
$nombre.="_".$hoy."_"."NDA";

$pdf->SetTitle($nombre);
$pdf->SetSubject('NDA '.EMPLEADO);











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
$pdf->SetFont('helvetica', '', 12);

//Variables del texto
$representante = REPRESENTANTE;
$empleado = EMPLEADO;

define('COSTADO'," POR “CONSORCIO HERMES” ".REPRESENTANTE."         “EL TRABAJADOR” ".EMPLEADO);

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

$textoCB.=" inscrito en el Registro Público de Comercio, bajo el número de Folio Mercantil Electrónico 31222 (treinta y un mil trescientos veintidós) correspondiente a “CONSORCIO HERMES”, manifestando que dichas facultades, conforme a las cuales actúa, no le han sido revocadas, modificadas ni limitadas de manera alguna.";












// add a page
$pdf->AddPage();

$pdf->StartTransform();
$pdf->Rotate(-90);
$pdf->SetFont('helvetica', '', 9);
$pdf->MultiCell(220, 5,COSTADO, 0, 'J', 0, 2, 20 ,-150, true);
$pdf->StopTransform();


$txt="CONVENIO DE CONFIDENCIALIDAD QUE CELEBRAN POR UNA PARTE CONSORCIO HERMES, S.A DE C.V., POR CONDUCTO DE SU REPRESENTANTE LEGAL $representante A QUIEN EN ADELANTE SE LE DENOMINARÁ INDISTINTAMENTE “CONSORCIO HERMES” O “LA EMPRESA” Y POR OTRA PARTE $empleado QUIEN INTERVIENE PERSONALMENTE Y POR DERECHO PROPIO A QUIEN EN ADELANTE SE LE DENOMINARÁ “EL TRABAJADOR”, DE ACUERDO CON LAS SIGUIENTES:";

$pdf->SetFont('helvetica', 'B', 12);
$pdf->MultiCell(170, 5,$txt, 0, 'J', 0, 2, 15 ,25, true);


$txt="DECLARACIONES";
$pdf->SetFont('helvetica', 'B', 12);
$pdf->MultiCell(170, 5,$txt, 0, 'J', 0, 2, 80 ,67, true);
$pdf->SetFont('helvetica', '', 12);

$txt ="I. Declara “CONSORCIO HERMES” a través de su representante legal:";

$pdf->SetFont('helvetica', 'B', 12);
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->SetFont('helvetica', '', 12);

$pdf->Ln();
$txt="
  <b>A) </b> Que es una Sociedad Anónima de Capital Variable debidamente constituida conforme a las leyes de los Estados Unidos Mexicanos, según consta en la Escritura Pública No. 10,071 (diez mil setenta y uno), de fecha ocho de julio del año dos mil cinco, otorgada ante la fe de la licenciada Sonia Alcántara Magos  Titular de la Notaría No. 18 (dieciocho) de la Ciudad de Santiago de Querétaro, Estado de Querétaro, cuyo primer testimonio quedó inscrito en el Registro Público de Comercio, bajo el número de Folio Mercantil Electrónico 31222/1 (treinta y un mil trescientos veintidós diagonal uno).
 ";
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$txt="<b>B) </b> Que su representante legal cuenta con las facultades necesarias para obligar a su representada conforme a lo estipulado en el presente contrato  tal y como se desprende del $textoCB";
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt="<b>C)</b>   Que está inscrito en el Registro Federal de Contribuyentes con la Clave CHE050708RH4, y Cédula de Identificación Fiscal B0425166 expedida por el Servicio de Administración Tributaria.";
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$txt="<b>D)</b>  Que señala como domicilio para oír y recibir notificaciones derivadas o relacionadas
con el presente instrumento el ubicado en: $domicilio_hermes  y correo electrónico $correo_repres@consorciohermes.mx los cuales reconoce subsistirán para los efectos del presente contrato hasta en tanto no proporcione otros diversos por escrito a “EL TRABAJADOR”.";
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();














//PAGINA DOS













// add a page
$pdf->AddPage();

$pdf->StartTransform();
$pdf->Rotate(-90);
$pdf->SetFont('helvetica', '', 9);
$pdf->MultiCell(220, 5,COSTADO, 0, 'J', 0, 2, 20 ,-150, true);
$pdf->StopTransform();



$txt="II. Declara “EL TRABAJADOR” personalmente y por su propio derecho:";
$pdf->SetFont('helvetica', 'B', 12);
$pdf->MultiCell(170, 5,$txt, 0, 'J', 0, 2, 15 ,25, true);
$pdf->SetFont('helvetica', '', 12);
$pdf->Ln();

$txt="<b>Única.-</b> Llamarse como ha quedado indicado al rubro del presente documento, ser de nacionalidad $textoUNICA ser de $edad_emp años de edad, con domicilio para oír y recibir notificaciones derivadas o relacionadas con el presente instrumento en $dom_emp y correo electrónico
$correo_emp los cuales reconoce subsistirán para los efectos del presente contrato hasta en tanto no proporcione otros diversos por escrito a “CONSORCIO HERMES”.";
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$pdf->SetFont('helvetica', 'B', 12);
$txt='III. Declaran “CONSORCIO HERMES”  y “EL TRABAJADOR”:';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();
$pdf->SetFont('helvetica', '', 12);


$txt='<b>a)</b>.- Que con fecha '.$fechaCont.' suscribieron un Contrato Individual de Trabajo sujeto a los términos que en el mismo se precisan, cuyo objeto es establecer los derechos y obligaciones de su relación laboral.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$txt='<b>b)</b>.- Que en virtud de la situación laboral que les obliga se hace necesario precisar los términos a que se sujetarán respecto del manejo de la información que puede ser del conocimiento de “EL TRABAJADOR” con motivo de su contratación, el desempeño de sus funciones o el acceso a las áreas físicas o a la infraestructura tecnológica de “CONSORCIO HERMES” o a sus proyectos.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='En atención a lo expuesto “CONSORCIO HERMES” y “EL TRABAJADOR” se someten a las siguientes:';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$pdf->SetFont('helvetica', 'B', 12);
$txt='CLÁUSULAS:';
$pdf->writeHTML( $txt, true, 0, true, false, 'C');
$pdf->Ln();
$pdf->SetFont('helvetica', '', 12);


$txt='<b>PRIMERA.-</b> .El objeto del presente convenio es establecer las condiciones a que se sujetará “EL TRABAJADOR” respecto de su conducción y manejo de la información que pueda llegar a ser de su conocimiento con motivo de su contratación por parte de “CONSORCIO HERMES” y el desempeño de sus funciones, su participación directa o indirecta en cualesquiera de los proyectos de negocio de “LA EMPRESA” o el acceso a las áreas físicas o a la infraestructura tecnológica de “CONSORCIO HERMES”';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='<b>SEGUNDA.-</b> Salvo las excepciones que este instrumento expresamente determine, las disposiciones contenidas en el presente Convenio serán aplicables a “EL TRABAJADOR” y a “CONSORCIO HERMES” durante la vigencia del Contrato Individual de Trabajo indicado en la Declaración III inciso a) de este instrumento o de cualquier otro contrato, acuerdo o documento que le sustituya y rija su relación de trabajo. Las disposiciones de este convenio continuarán siendo vigentes por un periodo de tres años contado a partir de la conclusión de la relación laboral sin importar la causa o el motivo de su terminación. ';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();













$pdf->AddPage();

$pdf->StartTransform();
$pdf->Rotate(-90);
$pdf->SetFont('helvetica', '', 9);
$pdf->MultiCell(220, 5,COSTADO, 0, 'J', 0, 2, 20 ,-150, true);
$pdf->StopTransform();
$pdf->SetFont('helvetica', '', 12);

$txt="<b>TERCERA.-</b>   “EL TRABAJADOR” reconoce y acepta que cualquier información a que acceda o sea de su conocimiento derivada o  con motivo de la relación laboral que sostiene con “CONSORCIO HERMES” tiene una aplicación comercial que le permite a “LA EMPRESA” obtener o mantener una ventaja competitiva o económica frente a terceros en la realización de su actividad empresarial, en consecuencia  “CONSORCIO HERMES” ha implantado diversos controles jurídicos y tecnológicos para preservar dicha información por lo que “EL TRABAJADOR” la considerará y tratará como “CONFIDENCIAL” y “RESTRINGIDA”.";
$pdf->writeHTMLCell(170, 45, 14 ,25, $txt, 0,0,0,0, 'J', 0, 2,  true);
$pdf->Ln();

$txt='<b>CUARTA.- </b> “CONSORCIO HERMES” almacena e integra periódicamente la información a que se refiere la Cláusula anterior en documentos, medios electrónicos o magnéticos, discos ópticos, microfilmes, películas u otros instrumentos similares como parte de su sistema de gestión del conocimiento; cualesquiera de dichos instrumentos o mecanismos que sean proporcionados a “EL TRABAJADOR” o a los cuales éste puede llegar a tener acceso con motivo de la relación laboral  que sostiene con “LA EMPRESA” tendrán el carácter de “CONFIDENCIAL” y “RESTRINGIDO”.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='<b>QUINTA.- </b> La Administración de “CONSORCIO HERMES” determina respecto de su información aquella que excepcionalmente debe tener carácter público acorde a sus estrategias de negocio y en estricto apego a los acuerdos de confidencialidad que suscribe con otras empresas.  Cuando cierta información propiedad o en posesión de “LA EMPRESA” es considerada pública, se publicita a través de medios de divulgación autorizados y contratados por “LA EMPRESA” y  mediante INTERNET por conducto de dominios que son adquiridos y registrados por “CONSORCIO HERMES” de manera directa o a través de sus subsidiarias siendo el principal el ubicado en la dirección electrónica www.consorciohermes.mx.  En ningún otro caso “EL TRABAJADOR” podrá asumir o inferir que la información  de “LA EMPRESA” es pública y de detectar algún supuesto que lo implique deberá reportarlo inmediatamente por escrito a la Dirección General de “CONSORCIO HERMES”.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='<b>SEXTA.-</b>  Cuando “EL TRABAJADOR” actúe bajo cualquier figura en representación o a nombre de “CONSORCIO HERMES” o intervenga en procedimientos de licitación, adquisición o de concurso de los sectores público o privado o realice cualquier acción de comercialización o participe en cualesquiera de las diversas actividades que involucra el Objeto Social de “LA EMPRESA”,  o tenga encomendado intervenir en la ejecución de proyectos sujetos a derechos y obligaciones acordados por “CONSORCIO HERMES”, deberá asumir como “CONFIDENCIAL” la información que le sea proporcionada por terceros, el cliente, sus representantes o sus trabajadores.  ';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$txt='“EL TRABAJADOR” que participe en los supuestos señalados en la presente Cláusula asumirá respecto de la información que se le haya proporcionado o sobre la cual tuvo conocimiento, la obligación de incorporarla  de manera intelegible en archivos de texto que deberán almacenarse mediante el uso de medios electrónicos en discos ópticos o discos duros de y bajo control de “LA EMPRESA”, mismos que se sujetarán al proceso de seguridad e encriptación que establezca la Administración de “CONSORCIO HERMES”.  Esta obligación subsistirá aun y cuando “EL TRABAJADOR” estime o reciba autorización del  tercero, el  cliente, su representante o trabajador con el cual hubiere interactuado que le permita asumir la posibilidad de tratar la información mencionada de forma distinta.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();













$pdf->AddPage();

$pdf->StartTransform();
$pdf->Rotate(-90);
$pdf->SetFont('helvetica', '', 9);
$pdf->MultiCell(220, 5,COSTADO, 0, 'J', 0, 2, 20 ,-150, true);
$pdf->StopTransform();
$pdf->SetFont('helvetica', '', 12);


$txt="Es responsabilidad de “CONSORCIO HERMES” y no de “EL TRABAJADOR” determinar el destino final de la información a que se refiere esta Cláusula, su entrega posterior, conservación o destrucción según los acuerdos comerciales aplicables.  Una vez almacenada la información en los discos ópticos o discos duros a que se refiere el párrafo anterior la información almacenada además de “CONFIDENCIAL” se considerará “RESTRINGIDA”.";
$pdf->writeHTMLCell(170, 37, 14 ,25, $txt, 0,0,0,0, 'J', 0, 2,  true);
$pdf->Ln();


$txt='A través del presente instrumento “CONSORCIO HERMES” autoriza a “EL TRABAJADOR” para utilizar la información a que se refiere la presente cláusula exclusivamente en el contexto del proyecto específico del cual emanó y hasta en tanto “EL TRABAJADOR” se encuentre asignado al mismo por parte de “LA EMPRESA”.  Una vez concluida la participación de “EL TRABAJADOR” en el proyecto éste quedará impedido de utilizar dicha información a menos que medie autorización por escrito de “CONSORCIO HERMES” que en forma expresa así lo acredite.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='<b>SÉPTIMA.-</b> “EL TRABAJADOR” guardará escrupulosamente los secretos técnicos y comerciales así como de los asuntos administrativos reservados de los cuales tenga conocimiento con motivo de su contratación por parte de “CONSORCIO HERMES” y el desempeño de sus funciones. ';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$txt='“EL TRABAJADOR” asumirá como asuntos administrativos reservados, cuya divulgación puede causar perjuicios a “CONSORCIO HERMES” cualquier información de los empleados, asesores o socios de “LA EMPRESA”, características y ubicación de sus instalaciones, su información financiera, tarifas de servicios, recursos materiales, procesos, guías e instructivos administrativos, así como aquella que en su calidad de titular de la COORDINACIÓN DE ADMINISTRACIÓN tenga acceso o constituyan actividades inherentes a la descripción de su puesto.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$txt='“EL TRABAJADOR” considerará como secretos técnicos y comerciales cuya divulgación puede causar perjuicios a “CONSORCIO HERMES” cualquier información que conste en medios escritos o electrónicos, imágenes, video, voz o texto referente al nombre o nombres de clientes actuales o potenciales, negociaciones, metodologías, fórmulas de negocios, planes de trabajo, compilaciones o registros, información relativa a investigaciones o estudios sobre “LA EMPRESA”, registros de desarrollo de proyectos o investigaciones que realice o contrate “CONSORCIO HERMES” sea total o relativa a cualquiera de sus etapas, inventos, información proporcionada por sus clientes, capacidad tecnológica y programas de cómputo, así como cualquier información en que se exprese o se ostente la leyenda “Información Confidencial” incluso cuando “EL TRABAJADOR” haya intervenido en su conformación.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();






$pdf->AddPage();


$pdf->StartTransform();
$pdf->Rotate(-90);
$pdf->SetFont('helvetica', '', 9);
$pdf->MultiCell(220, 5,COSTADO, 0, 'J', 0, 2, 20 ,-150, true);
$pdf->StopTransform();
$pdf->SetFont('helvetica', '', 12);


$txt="<b>OCTAVA.-</b> “EL TRABAJADOR” manifiesta que conoce los alcances del artículo 86 de la Ley de la Propiedad Industrial el cual establece que “la persona física o moral que contrate a un trabajador que esté laborando o haya laborado o a un profesionista, asesor o consultor que preste o haya prestado sus servicios para otra persona, con el fin de obtener secretos industriales de ésta, será responsable del pago de daños y perjuicios que le ocasione a dicha persona. También será responsable del pago de daños y perjuicios la persona física o moral que por cualquier medio ilícito obtenga información que contemple un secreto industrial”.";
$pdf->writeHTMLCell(170, 36, 14 ,25, $txt, 0,0,0,0, 'J', 0, 2,  true);
$pdf->Ln();


$txt="Es información derivada o relacionada con las funciones de “EL TRABAJADOR” inherentes a la descripción de su puesto como titular de la COORDINACIÓN DE ADMINISTRACIÓN, que  constituyen asuntos administrativos reservados cuya divulgación puede causar perjuicios a “CONSORCIO HERMES” la siguiente: ";
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$txt="<b>8.1</b> La derivada de la administración de los recursos financieros;<br />
<b>8.2</b>  La contenida en títulos de crédito o aquella necesaria para su elaboración;<br />
<b>8.3</b>  La referente a transferencias desde o en favor de cualquier tipo de cuenta a nombre de “CONSORCIO HERMES” así como los mecanismos para su ejecución y administración;<br />
<b>8.4</b> La relacionada con cuentas por cobrar, cuentas por pagar y en general cualquiera referente a acreedores o deudores, plazos, montos, condiciones de cobro o pago, líneas de crédito utilizadas o instituciones o partes participantes;<br />
<b>8.5</b> La relativa a los recursos materiales de “CONSORCIO HERMES”;<br />
<b>8.6</b> La contenida o derivada de la elaboración de reportes gerenciales;<br />
<b></b>8.7 La correspondiente al manejo de caja chica y vales de gasolina;<br />
<b>8.8</b> La integrada para los contratos, convenios o acuerdos con proveedores;<br />
<b>8.9</b> La obtenida de sus actividades de apoyo a las distintas áreas de la empresa para el desarrollo de sus funciones, y<br />
<b>8.10</b> La que tenga una naturaleza análoga a la listada en esta cláusula cuyo acceso se derive de asuntos encomendados a la COORDINACIÓN DE ADMINISTRACIÓN. ";
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$txt='<b>NOVENA.-</b>“EL TRABAJADOR” considerará como secretos técnicos y comerciales cuya divulgación puede causar perjuicios a “CONSORCIO HERMES” cualquier información que conste en medios escritos o electrónicos, imágenes, video, voz o texto referente al nombre o nombres de clientes actuales o potenciales, negociaciones, metodologías, fórmulas de negocios, planes de trabajo, compilaciones o registros, información relativa a investigaciones o estudios sobre “LA EMPRESA”, registros de desarrollo de proyectos o investigaciones que realice o contrate “CONSORCIO HERMES” sea total o relativa a cualquiera de sus etapas, inventos, información proporcionada por sus clientes, capacidad tecnológica y programas de cómputo, así como cualquier información en que se exprese o se ostente la leyenda “Información Confidencial” incluso cuando “EL TRABAJADOR” haya intervenido en su conformación. ';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();



$pdf->AddPage();

$pdf->StartTransform();
$pdf->Rotate(-90);
$pdf->SetFont('helvetica', '', 9);
$pdf->MultiCell(220, 5,COSTADO, 0, 'J', 0, 2, 20 ,-150, true);
$pdf->StopTransform();
$pdf->SetFont('helvetica', '', 12);



$txt='<b>DÉCIMA.-</b> “EL TRABAJADOR” manifiesta que conoce los alcances del artículo 86 de la Ley de la Propiedad Industrial el cual establece que<i>“la persona física o moral que contrate a un trabajador que esté laborando o haya laborado o a un profesionista, asesor o consultor que preste o haya prestado sus servicios para otra persona, con el fin de obtener secretos industriales de ésta, será responsable del pago de daños y perjuicios que le ocasione a dicha persona. También será responsable del pago de daños y perjuicios la persona física o moral que por cualquier medio ilícito obtenga información que contemple un secreto industrial”. </i>  ';
$pdf->writeHTMLCell(170, 46, 14 ,25, $txt, 0,0,0,0, 'J', 0, 2,  true);
$pdf->Ln();

$txt='<b>DÉCIMA PRIMERA.-</b>“CONSORCIO HERMES” y “EL TRABAJADOR” acuerdan que en caso de que “LA EMPRESA” ejerza acciones en contra de una persona física o moral que contrate a “EL TRABAJADOR” en tanto esté laborando para “LA EMPRESA” o cuando haya dejado de laborar en “CONSORCIO HERMES”, con el fin de obtener secretos industriales de “CONSORCIO HERMES”, y como resultado de dichas acciones se obtenga sentencia definitiva que  declare responsable a dicha persona física o moral de los daños y perjuicios causados a “LA EMPRESA”, con independencia de la responsabilidad penal en que se incurra, “EL TRABAJADOR” pagará a “CONSORCIO HERMES”';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$txt='<b>11.1</b> Una cantidad igual al cincuenta por ciento del monto total que por concepto de pago por los daños y perjuicios causados se imponga en la sentencia a la persona física o moral que se declare responsable, o ';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='<b>11.2</b> Una cantidad equivalente en moneda nacional a USD $30´000.00 (Treinta Mil Dólares 00/100, moneda de curso legal en los Estados Unidos de América) si este monto resultase mayor que aquel obtenido conforme al inciso 11.1 de esta Cláusula.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='Esta Cláusula será de vigencia indefinida, y en todo caso se mantendrá vigente durante todo el tiempo en que dure el procedimiento jurisdiccional entablado por “CONSORCIO HERMES” en contra de la persona física o moral que contrate a “EL TRABAJADOR” y cesará hasta concluidos tres años posteriores a que se dicte sentencia definitiva que declare responsabilidad y determine el pago de daños y perjuicios en favor de “CONSORCIO HERMES” como consecuencia de la conculcación de lo establecido en el artículo 86 de la Ley de la Propiedad Industrial.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();



$txt='“CONSORCIO HERMES” se reserva el derecho de demandar directamente a “EL TRABAJADOR” cuando considere que se actualiza el supuesto previsto en el artículo 86 de la Ley de la Propiedad Industrial (in fine) o cualquier otra  violación a lo establecido en el presente Convenio.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$txt='<b>DÉCIMA SEGUNDA.-</b> Cualquier aviso o requerimiento derivado de lo establecido en el presente Convenio deberá ser efectuado mediante servicio de mensajería por escrito y entregado en el domicilio señalado en el presente instrumento que corresponda a “CONSORCIO HERMES” o “EL TRABAJADOR” según el caso.  Simultáneamente el aviso o requerimiento será remitido por medios electrónicos a los correos electrónicos que precisan las partes en este instrumento.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();




$pdf->AddPage();
$num=$pdf->getNumPages();
$letra = $paginas[$num-1];
$fecha = strtolower($dias[DIA-1])." de ".strtolower(MES)." de dos mil ".strtolower($anio[ANIO-2001]);





$txt='Cualquier cambio de domicilio deberá ser notificado por escrito a la otra parte con cuando menos 5 días de anticipación al día en que pretendan hacer dicho cambio, de no realizar la notificación respectiva, cualquier aviso o notificación realizada en los domicilios señalados en el presente convenio surtirán todos sus efectos.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='<b>DÉCIMA TERCERA.-</b> El presente Convenio contiene el acuerdo total entre las Partes con respecto a las materias aquí incluidas y sobresee y cancela todos los acuerdos, negociaciones, convenios, comunicaciones o escritos anteriores entre las Partes con relación a la materia del presente Convenio.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$txt='<b>DÉCIMA CUARTA.-</b> El uso del número singular incluye también el plural y viceversa, y el uso del género masculino incluye también el género femenino y neutro y viceversa, siempre que el sentido de este convenio lo permita.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='<b>DÉCIMA QUINTA.-</b>  Para la interpretación y cumplimiento del presente Convenio las Partes se someten expresamente a las leyes y los tribunales competentes del Estado de Querétaro, en Santiago de Querétaro renunciando a cualquier otra competencia que pudiere corresponderles por razón de sus domicilios presentes o futuros o por cualquier otra razón.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='Leído que fue por las Partes y debidamente enteradas de todas y cada una de las cláusulas y del contenido y alcance legal del presente Convenio, lo suscriben por duplicado y de conformidad, reconociendo las firmas que plasman al margen y al calce en sus '.$num.' '.$letra.' fojas útiles como las que utilizan para todos los actos jurídicos en que intervienen, en Santiago de Querétaro, Querétaro a '.$fecha  ;
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='<style>table.final, th.final, td.final{border: 1px solid black; text-align:center;}</style>
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
      <b>'.$representante.'</b>
      <br /><br /><br />
    </td>
    <td class="final">
    <br /><br /><br /> <br /><br /><br /><br /><br /><br />
      <b>'.$empleado.'</b>
      <br /><br /><br />
    </td>
  </tr>
</table>
';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output($nombre, 'I');

//============================================================+
// END OF FILE
//============================================================+

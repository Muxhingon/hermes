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


  $num_mes = array('Un', 'Dos','Tres', 'Cuarto',
                            'Cinco','Seis','Siete','Ocho',
                            'Nueve', 'Diez', 'Once');


//FECHAS DEL CONTRATO LABORAL
$fecha_contLAB=$_POST['fecha_contLab'];
$separada_cont = explode('/', $fecha_contLAB);
$dia_contlab = $separada_cont[0];
$mes_contlab = $separada_cont[1];
$anio_contlab = $separada_cont[2];

define('DIA_INI_CONT',strtolower($dias[$dia_contlab-1]));
define('MES_INI_CONT',strtolower($meses[$mes_contlab-1]));
define('ANIO_INI_CONT',strtolower($anio[$anio_contlab-2001]));


$fecha_contLAB=$_POST['fecha_fincontLab'];
$separada_cont = explode('/', $fecha_contLAB);
$dia_contlab = $separada_cont[0];
$mes_contlab = $separada_cont[1];
$anio_contlab = $separada_cont[2];

define('DIA_FIN_CONT',strtolower($dias[$dia_contlab-1]));
define('MES_FIN_CONT',strtolower($meses[$mes_contlab-1]));
define('ANIO_FIN_CONT',strtolower($anio[$anio_contlab-2001]));


define('REPRESENTANTE', mb_strtoupper($_POST['representante'],'UTF-8'));
define('DOMICILIO_HERMES', $_POST['domicilio_empre']);


define('EMPLEADO', mb_strtoupper($_POST['empleado'],'UTF-8'));
define('NACIONALIDAD', $_POST['nac']);
define('EMP_CURP', $_POST['curp_emp']);
define('NAC_EXTRANJERO', $_POST['nac_emp']);
define('NUMERO_PERMISO', $_POST['permiso_emp']);
define('EDAD_EMPLEADO', $_POST['edad_emp']);
if($_POST['estado_civil']==1){
  define('ESTADO_CIVIL', "SOLTERO");
}else if($_POST['estado_civil']==2){
  define('ESTADO_CIVIL', "CASADO");
}

define('DOMICILIO_EMPLEADO', $_POST['domicilio_emp']);
define('EMAIL_EMPLEADO', $_POST['corre_emp']);
define('PUESTO', $_POST['puesto']);


define('DURACION_CONTRATO', $_POST['duracion_cont']);


define('DURACION_JORNADA', $_POST['jornada']);
define('DIAS_TRABAJO',$_POST['dias_trabajo']);
define('DIAS_DESCANSO', $_POST['dias_descanso']);


define('SALARIO_DIA_NUM', $_POST['salario_diario_num']);
define('SALARIO_DIA_LETRA', $_POST['salario_diario_letra']);
define('SALARIO_MENS_NUM', $_POST['salario_mensual_num']);
define('SALARIO_MENS_LETRA', $_POST['salario_mensual_letra']);




// Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf.php');



class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        $header="            Hoja  ".$this->getAliasNumPage()." / ".$this->getAliasNbPages()."  del CONTRATO INDIVIDUAL DE TRABAJO POR TIEMPO ";
        // Logo
        $image_file = K_PATH_IMAGES.'logo.jpg';
        $this->Image($image_file, 5, 7, 50, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 10);
        // Title
        $this->Cell(0,10, $header, 0, 2, 'L', 0, '', 0, false, 'M', 'M');
        $header="            DETERMINADO que celebran “CONSORCIO HERMES” y ".EMPLEADO;
        $this->Cell(0, 10, $header, 0, 2, 'L', 0, '', 0, false, 'M', 'M');
        $header="            de fecha ".DIA_INI_CONT." de ".MES_INI_CONT." de ".ANIO_INI_CONT;
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
$nombre.="_".$hoy."_"."CONTRATO_INDIVIDUAL";

$pdf->SetTitle($nombre);
$pdf->SetSubject('CONTRATO_INDIVIDUAL '.EMPLEADO);

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













// add a page
$pdf->AddPage();

$pdf->StartTransform();
$pdf->Rotate(-90);
$pdf->SetFont('helvetica', '', 9);
$pdf->MultiCell(220, 5,COSTADO, 0, 'J', 0, 2, 20 ,-150, true);
$pdf->StopTransform();


$txt="CONTRATO INDIVIDUAL DE TRABAJO POR TIEMPO DETERMINADO, QUE CELEBRAN POR UNA PARTE “CONSORCIO HERMES S.A. de C.V.”, POR CONDUCTO DE SU REPRESENTANTE LEGAL $representante A QUIEN EN ADELANTE SE LE DENOMINARÁ INDISTINTAMENTE “CONSORCIO HERMES” O “LA EMPRESA” Y POR OTRA PARTE $empleado A QUIEN EN ADELANTE SE LE DENOMINARÁ “EL TRABAJADOR”, DE ACUERDO CON LAS SIGUIENTES";
$pdf->SetFont('helvetica', 'B', 12);
$pdf->MultiCell(170, 5,$txt, 0, 'J', 0, 2, 15 ,25, true);


$txt="D E C L A R A C I O N E S";
$pdf->SetFont('helvetica', 'BU', 12);
$pdf->MultiCell(170, 5,$txt, 0, '', 0, 2, 80 ,67, true);
$pdf->SetFont('helvetica', '', 12);


$txt ="I.- Declara “CONSORCIO HERMES” a través de su representante legal:";
$pdf->SetFont('helvetica', 'B', 12);
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->SetFont('helvetica', '', 12);
$pdf->Ln();



$txt="
  <b>A)</b> Ser una persona moral con actividad empresarial que para el adecuado desempeño de su Objeto Social requiere contar con trabajadores que posean la formación y conocimientos necesarios para llevar a cabo diversas actividades relacionadas con la gestión de tecnología de la información y comunicaciones bajo dependencia de “LA EMPRESA”, a efecto de que ésta brinde los servicios que ofrece a diversas personas que le contratan y se constituyen como sus clientes, mismos que en algunos proyectos supervisan el desarrollo de los servicios adquiridos.
 ";
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$txt="<b>B)</b> Que en los casos en que interviene en proyectos donde el cliente contratante  requiere la prestación de sus servicios abordando aspectos que involucran tecnología de la información y comunicaciones, ofrece tales servicios con sus trabajadores y bajo su dependencia, principalmente en oficinas gubernamentales o particulales que cuentan con capacidad de cómputo instalada, adquirida o no a “LA EMPRESA”, en cuyo caso el trabajo de los trabajadores de “LA EMPRESA” abarca actividades diversas a las que se desarrollan en el centro de trabajo del cliente contratante, realizando labores de carácter especializado en materia de gestión de tecnología de la información y comunicaciones inherentes a su objeto social, que son de carácter diverso a las que llevan a cabo los trabajadores al servicio del cliente contratante.";
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();



$txt="<b>C)</b> Que requiere para el cumplimiento de las actividades derivadas de su Objeto Social que se vinculan con tecnología de la información y comunicaciones contratar por tiempo determinado los servicios de “EL TRABAJADOR”, por el término de ";
if(DURACION_CONTRATO==12){
  $txt.="UN AÑO";
}else if(DURACION_CONTRATO==1){
  $txt.=strtoupper($num_mes[DURACION_CONTRATO-1])." MES";
}else{
  $txt.=strtoupper($num_mes[DURACION_CONTRATO-1])." MESES";
}
$txt.=", de conformidad con lo dispuesto por el artículo 37 de la Ley Federal del Trabajo, en razón de así exigirlo la naturaleza del servicio que prestará a sus clientes, siendo esta de carácter eventual, especial y limitada al tiempo del contrato que le sea otorgado, el cual implica, respecto de proyectos concretos, el efectuar labores relacionadas con la gestión de tecnología de la información y comunicaciones bajo dependencia de “CONSORCIO HERMES”, por lo que el cliente contratante de “LA EMPRESA” establece un vínculo legal exclusivamente con“CONSORCIO HERMES” por lo que por ningún motivo el contrato celebrado por “LA EMPRESA” y alguno de sus clientes será extensible, prorrogable, sustituible o vinculante de cualquier forma con “EL TRABAJADOR”.";
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



$txt="<b>D)</b> Que tiene su domicilio en: $domicilio_hermes";
$pdf->SetFont('helvetica', '', 12);
$pdf->writeHTMLCell(170, 15,  14, 25, $txt, 0, 0 , 0, 0, 'J', true);
$pdf->SetFont('helvetica', '', 12);
$pdf->Ln();

$txt="<b>E)</b> Que cumple con las disposiciones respectivas en materia de seguridad, salud y medio ambiente en el trabajo a favor de sus trabajadores.";
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$pdf->SetFont('helvetica', 'B', 12);
$txt='II. Declara “EL TRABAJADOR”:';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();
$pdf->SetFont('helvetica', '', 12);


$txt='<b>A)</b> Llamarse '.EMPLEADO.' , ser de nacionalidad '. $textoUNICA.', ser de'.
EDAD_EMPLEADO.'años de edad, estado civil '.ESTADO_CIVIL.', con domicilio para oír y recibir notificaciones derivadas o relacionadas con el presente instrumento en '.DOMICILIO_EMPLEADO.' y correo electrónico '.EMAIL_EMPLEADO.' los cuales reconoce subsistirán para los efectos del presente contrato hasta en tanto no proporcione otros diversos por escrito a “CONSORCIO HERMES”.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();





$txt='<b>B)</b> Contar con la capacidad legal de goce y ejercicio para suscribir el presente contrato y manifestar su consentimiento para prestar a “CONSORCIO HERMES”, bajo su dirección y dependencia, sus servicios personales como '.PUESTO.' debiendo  desempeñarlos en <b>el lugar donde “CONSORCIO HERMES” se lo asigne ó se deban realizar los trabajos según los contratos de “CONSORCIO HERMES” con su cliente o clientes</b> sujetándose a la vigilancia e instrucciones recibidas por “CONSORCIO HERMES” para el desempeño de sus labores, obligándose a atender todas las actividades conexas a su ocupación principal.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='<b>C)</b> Que reconoce el requerimiento específico de “CONSORCIO HERMES”, para el cumplimiento de su Objeto Social de que “EL TRABAJADOR” cuente con la formación y conocimientos necesarios para abordar diversas actividades relacionadas con la gestión de tecnología de la información y comunicaciones bajo dependencia de “LA EMPRESA”.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='<b>D)</b> Que está en aptitud física y legal para prestar sus servicios subordinados exclusivamente para “CONSORCIO HERMES” teniendo así únicamente relación de trabajo con “LA EMPRESA”, por el tiempo determinado en el presente contrato, al entender que “CONSORCIO HERMES” es a su vez proveedor de servicios de terceros, con los que reconoce y acepta no se establecerá vínculo legal por ningún motivo, pues el contrato que ha obtenido “CONSORCIO HERMES” de su cliente contratante, no puede ser extensible, prorrogable, sustituible o vinculante de cualquier forma con “EL TRABAJADOR”.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();









$pdf->AddPage();

$pdf->StartTransform();
$pdf->Rotate(-90);
$pdf->SetFont('helvetica', '', 9);
$pdf->MultiCell(220, 5,COSTADO, 0, 'J', 0, 2, 20 ,-150, true);
$pdf->StopTransform();
$pdf->SetFont('helvetica', '', 12);

$txt="<b>TERCERA.-</b> “EL TRABAJADOR” reconoce y acepta que cualquier información a que acceda o sea de su conocimiento derivada o  con motivo de la relación laboral que sostiene con “CONSORCIO HERMES” tiene una aplicación comercial que le permite a “LA EMPRESA” obtener o mantener una ventaja competitiva o económica frente a terceros en la realización de su actividad empresarial, en consecuencia  “CONSORCIO HERMES” ha implantado diversos controles jurídicos y tecnológicos para preservar dicha información por lo que “EL TRABAJADOR” la considerará y tratará como “CONFIDENCIAL” y “RESTRINGIDA”.";
$pdf->writeHTMLCell(170, 45, 14 ,25, $txt, 0,0,0,0, 'J', 0, 2,  true);
$pdf->Ln();

$txt='<b>CUARTA.- </b> “CONSORCIO HERMES” almacena e integra periódicamente la información a que se refiere la Cláusula anterior en documentos, medios electrónicos o magnéticos, discos ópticos, microfilmes, películas u otros instrumentos similares como parte de su sistema de gestión del conocimiento; cualesquiera de dichos instrumentos o mecanismos que sean proporcionados a “EL TRABAJADOR” o a los cuales éste puede llegar a tener acceso con motivo de la relación laboral  que sostiene con “LA EMPRESA” tendrán el carácter de “CONFIDENCIAL” y “RESTRINGIDO”.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='<b>QUINTA.- </b> La Administración de “CONSORCIO HERMES” determina respecto de su información aquella que excepcionalmente debe tener carácter público acorde a sus estrategias de negocio y en estricto apego a los acuerdos de confidencialidad que suscribe con otras empresas.  Cuando cierta información propiedad o en posesión de “LA EMPRESA” es considerada pública, se publicita a través de medios de divulgación autorizados y contratados por “LA EMPRESA” y  mediante INTERNET por conducto de dominios que son adquiridos y registrados por “CONSORCIO HERMES” de manera directa o a través de sus subsidiarias siendo el principal el ubicado en la dirección electrónica www.consorciohermes.mx.  En ningún otro caso “EL TRABAJADOR” podrá asumir o inferir que la información  de “LA EMPRESA” es pública y de detectar algún supuesto que lo implique deberá reportarlo inmediatamente por escrito a la Dirección General de “CONSORCIO HERMES”.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='<b>SEXTA.-</b>  Cuando “EL TRABAJADOR” actúe bajo cualquier figura en representación o a nombre de “CONSORCIO HERMES” o intervenga en procedimientos de licitación, adquisición o de concurso de los sectores público o privado o realice cualquier acción de comercialización o participe en cualesquiera de las diversas actividades que involucra el Objeto Social de “LA EMPRESA”,  o tenga encomendado intervenir en la ejecución de proyectos sujetos a derechos y obligaciones acordados por “CONSORCIO HERMES”, deberá asumir como “CONFIDENCIAL” la información que le sea proporcionada por terceros, el cliente, sus representantes o sus trabajadores.';
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


$txt=' A través del presente instrumento “CONSORCIO HERMES” autoriza a “EL TRABAJADOR” para utilizar la información a que se refiere la presente cláusula exclusivamente en el contexto del proyecto específico del cual emanó y hasta en tanto “EL TRABAJADOR” se encuentre asignado al mismo por parte de “LA EMPRESA”.  Una vez concluida la participación de “EL TRABAJADOR” en el proyecto éste quedará impedido de utilizar dicha información a menos que medie autorización por escrito de “CONSORCIO HERMES” que en forma expresa así lo acredite.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='<b>SÉPTIMA.-</b> “EL TRABAJADOR” guardará escrupulosamente los secretos técnicos y comerciales así como de los asuntos administrativos reservados de los cuales tenga conocimiento con motivo de su contratación por parte de “CONSORCIO HERMES” y el desempeño de sus funciones.  ';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();



$txt='<b>OCTAVA.-</b> “EL TRABAJADOR” asumirá como asuntos administrativos reservados, cuya divulgación puede causar perjuicios a “CONSORCIO HERMES” cualquier información de los empleados, asesores o socios de “LA EMPRESA”, características y ubicación de sus instalaciones, su información financiera, tarifas de servicios, recursos materiales, procesos, guías e instructivos administrativos, así como aquella que en su calidad de titular de la DIRECCIÓN DE PLANEACIÓN tenga acceso o constituyan actividades inherentes a la descripción de su puesto.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$txt='Es información derivada o relacionada con las funciones de “EL TRABAJADOR” inherentes a la descripción de su puesto como titular de la DIRECCIÓN DE PLANEACIÓN, que  constituyen asuntos administrativos reservados cuya divulgación puede causar perjuicios a “CONSORCIO HERMES” la siguiente:  ';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();



$txt='<b>8.1</b> La correspondiente a los proveedores de “LA EMPRESA”;<br />
<b>8.2</b> La referente a las condiciones acordadas con los diversos proveedores de “CONSORCIO HERMES” en materia de precios, plazos de entrega,<br /> condiciones de pago, garantías y especificaciones propias de la relación de negocio;<br />
<b>8.3</b> La contenida en los medios de registro y control de “LA EMPRESA” sobre las condiciones acordadas con los diversos proveedores;<br />
<b>8.4</b> La integrada y vinculada a los mecanismos o sistemas de costeo de las distintas divisiones de “LA EMPRESA”;<br />
<b>8.5</b>La que se encuentre a cargo del área de tecnología de la información y comunicaciones de “LA EMPRESA;<br />
<b>8.6</b> La derivada de quejas y fallas reportadas por los clientes de “LA EMPRESA”;<br />
';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();





$pdf->AddPage();


$pdf->StartTransform();
$pdf->Rotate(-90);
$pdf->SetFont('helvetica', '', 9);
$pdf->MultiCell(220, 5,COSTADO, 0, 'J', 0, 2, 20 ,-150, true);
$pdf->StopTransform();
$pdf->SetFont('helvetica', '', 12);


$txt='
<b>8.7</b> La obtenida de sus actividades de apoyo a las distintas áreas de la empresa para el desarrollo de sus funciones, y<br />
<b>8.8</b> La que tenga una naturaleza análoga a la listada en esta cláusula cuyo acceso se derive de asuntos encomendados a la DIRECCIÓN DE PLANEACIÓN.';
$pdf->writeHTMLCell(170, 26, 14 ,25, $txt, 0,0,0,0, 'J', 0, 2,  true);
$pdf->Ln();


$txt='<b>NOVENA.-</b> “EL TRABAJADOR” considerará como secretos técnicos y comerciales cuya divulgación puede causar perjuicios a “CONSORCIO HERMES” cualquier información que conste en medios escritos o electrónicos, imágenes, video, voz o texto referente al nombre o nombres de clientes actuales o potenciales, negociaciones, metodologías, fórmulas de negocios, planes de trabajo, compilaciones o registros, información relativa a investigaciones o estudios sobre “LA EMPRESA”, registros de desarrollo de proyectos o investigaciones que realice o contrate “CONSORCIO HERMES” sea total o relativa a cualquiera de sus etapas, inventos, información proporcionada por sus clientes, capacidad tecnológica y programas de cómputo, así como cualquier información en que se exprese o se ostente la leyenda “Información Confidencial” incluso cuando “EL TRABAJADOR” haya intervenido en su conformación.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='<b>DÉCIMA.-</b> “EL TRABAJADOR” manifiesta que conoce los alcances del artículo 86 de la Ley de la Propiedad Industrial el cual establece que <i>“la persona física o moral que contrate a un trabajador que esté laborando o haya laborado o a un profesionista, asesor o consultor que preste o haya prestado sus servicios para otra persona, con el fin de obtener secretos industriales de ésta, será responsable del pago de daños y perjuicios que le ocasione a dicha persona. También será responsable del pago de daños y perjuicios la persona física o moral que por cualquier medio ilícito obtenga información que contemple un secreto industrial”.</i> ';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$txt='<b>DÉCIMA PRIMERA.-</b>  “CONSORCIO HERMES” y “EL TRABAJADOR” acuerdan que en caso de que “LA EMPRESA” ejerza acciones en contra de una persona física o moral que contrate a “EL TRABAJADOR” en tanto esté laborando para “LA EMPRESA” o cuando haya dejado de laborar en “CONSORCIO HERMES”, con el fin de obtener secretos industriales de “CONSORCIO HERMES”, y como resultado de dichas acciones se obtenga sentencia definitiva que  declare responsable a dicha persona física o moral de los daños y perjuicios causados a “LA EMPRESA”, con independencia de la responsabilidad penal en que se incurra, “EL TRABAJADOR” pagará a “CONSORCIO HERMES”:</i> ';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='<b>11.1</b>  Una cantidad igual al cincuenta por ciento del monto total que por concepto de pago por los daños y perjuicios causados se imponga en la sentencia a la persona física o moral que se declare responsable, o  ';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='<b>11.2</b>   Una cantidad equivalente en moneda nacional a USD $30´000.00 (Treinta Mil Dólares 00/100, moneda de curso legal en los Estados Unidos de América) si este monto resultase mayor que aquel obtenido conforme al inciso 11.1 de esta Cláusula.  ';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();






$pdf->AddPage();



$pdf->StartTransform();
$pdf->Rotate(-90);
$pdf->SetFont('helvetica', '', 9);
$pdf->MultiCell(220, 5,COSTADO, 0, 'J', 0, 2, 20 ,-150, true);
$pdf->StopTransform();
$pdf->SetFont('helvetica', '', 12);



$txt="Esta Cláusula será de vigencia indefinida, y en todo caso se mantendrá vigente durante todo el tiempo en que dure el procedimiento jurisdiccional entablado por “CONSORCIO HERMES” en contra de la persona física o moral que contrate a “EL TRABAJADOR” y cesará hasta concluidos tres años posteriores a que se dicte sentencia definitiva que declare responsabilidad y determine el pago de daños y perjuicios en favor de “CONSORCIO HERMES” como consecuencia de la conculcación de lo establecido en el artículo 86 de la Ley de la Propiedad Industrial.";
$pdf->writeHTMLCell(170, 43, 14 ,25, $txt, 0,0,0,0, 'J', 0, 2,  true);
$pdf->Ln();

$txt='“CONSORCIO HERMES” se reserva el derecho de demandar directamente a “EL TRABAJADOR” cuando considere que se actualiza el supuesto previsto en el artículo 86 de la Ley de la Propiedad Industrial (in fine) o cualquier otra  violación a lo establecido en el presente Convenio. ';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$txt='<b>DÉCIMA SEGUNDA.-</b> Cualquier aviso o requerimiento derivado de lo establecido en el presente Convenio deberá ser efectuado mediante servicio de mensajería por escrito y entregado en el domicilio señalado en el presente instrumento que corresponda a “CONSORCIO HERMES” o “EL TRABAJADOR” según el caso.  Simultáneamente el aviso o requerimiento será remitido por medios electrónicos a los correos electrónicos que precisan las partes en este instrumento.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$txt='Cualquier cambio de domicilio deberá ser notificado por escrito a la otra parte con cuando menos 5 días de anticipación al día en que pretendan hacer dicho cambio, de no realizar la notificación respectiva, cualquier aviso o notificación realizada en los domicilios señalados en el presente convenio surtirán todos sus efectos.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();




$txt='<b>DÉCIMA TERCERA.-</b> El presente Convenio contiene el acuerdo total entre las Partes con respecto a las materias aquí incluidas y sobresee y cancela todos los acuerdos, negociaciones, convenios, comunicaciones o escritos anteriores entre las Partes con relación a la materia del presente Convenio';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$txt='<b>DÉCIMA CUARTA.-</b> El uso del número singular incluye también el plural y viceversa, y el uso del género masculino incluye también el género femenino y neutro y viceversa, siempre que el sentido de este convenio lo permita.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='<b>DÉCIMA QUINTA.-</b>  Para la interpretación y cumplimiento del presente Convenio las Partes se someten expresamente a las leyes y los tribunales competentes del Estado de Querétaro, en Santiago de Querétaro renunciando a cualquier otra competencia que pudiere corresponderles por razón de sus domicilios presentes o futuros o por cualquier otra razón.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();





$pdf->AddPage();
$num=$pdf->getNumPages();
$letra = $paginas[$num-1];
$fecha = strtolower($dias[DIA-1])." de ".strtolower(MES)." de dos mil ".strtolower($anio[ANIO-2001]);


$txt='Leído que fue por las Partes y debidamente enteradas de todas y cada una de las cláusulas y del contenido y alcance legal del presente Convenio, lo suscriben por duplicado y de conformidad, reconociendo las firmas que plasman al margen y al calce en sus '.$num.' '.$letra.' fojas útiles como las que utilizan para todos los actos jurídicos en que intervienen, en Santiago de Querétaro, Querétaro a '.$fecha  ;
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();
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

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

define('NUM_DIA_INI',$dia_contlab);
define('NUM_ANIO_INI', $anio_contlab);

define('DIA_INI_CONT',strtolower($dias[$dia_contlab-1]));
define('MES_INI_CONT',strtolower($meses[$mes_contlab-1]));
define('ANIO_INI_CONT',strtolower($anio[$anio_contlab-2001]));


$fecha_contLABf=$_POST['fecha_fincontLab'];
$separada_contf = explode('/', $fecha_contLABf);
$dia_contlabf = $separada_contf[0];
$mes_contlabf = $separada_contf[1];
$anio_contlabf = $separada_contf[2];

define('DIA_FIN_CONT',strtolower($dias[$dia_contlabf-1]));
define('MES_FIN_CONT',strtolower($meses[$mes_contlabf-1]));
define('ANIO_FIN_CONT',strtolower($anio[$anio_contlabf-2001]));

//FECHA DEL NDA
$fecha_nda = $_POST['fecha_contLab'];
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
define('opbm', strtolower($meses[$mes_poliza-1]));
define('opbd', strtolower($dias[$dia_poliza-1]));
define('opbn', strtolower($anio[$anio_nda-2001]));




define('CORREO_REPRESENTANTE',strtolower( $_POST['correo_repres']));
define('REPRESENTANTE', mb_strtoupper($_POST['representante'],'UTF-8'));
define('DOMICILIO_HERMES', $_POST['domicilio_empre']);

define('ClauB', $_POST['Cb']);
define('numeroinst',$_POST['numeroinstrumento']);
define('ClaussB', $_POST['opcionb']);

define('NOMBRE_PUBLICO', mb_strtoupper($_POST['nombre_publico'],'UTF-8'));
define('NOTARIO_O_CORREDOR', $_POST['publico']);

define('NUMERO_NOTARIA', $_POST['notaria_numero']);
define('NOTARIA_ESTAOM', ucwords($_POST['notario_estadom']));

define('NUMERO_CORREDOR', $_POST['numero_corredor']);
define('CORREDOR_ESTADO', ucwords($_POST['corredor_estado']));




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
define('PUESTO_EMPLEADO', $_POST['puesto']);




if($_POST['duracion_cont']==12){
  define('DURACION_CONTRATO', 'UN AÑO');
}else if($_POST['duracion_cont']==1){
  define('DURACION_CONTRATO',strtoupper($num_mes[$_POST['duracion_cont']-1])." MES");
}else{
  define('DURACION_CONTRATO',strtoupper($num_mes[$_POST['duracion_cont']-1])." MESES");
}


if($_POST['jornada']==1){
  define('DURACION_JORNADA', 'OCHO HORAS');
}else if($_POST['jornada']==2){
  define('DURACION_JORNADA', 'SIETE HORAS');
}else if($_POST['jornada']==3){
  define('DURACION_JORNADA', 'SIETE HORAS Y MEDIA');
}

define('DESDE_HORAS_JORNADA',$_POST['desde_hora']);
define('HASTA_HORAS_JORNADA',$_POST['hasta_hora']);

define('DIAS_TRABAJO',$_POST['dias_trabajo']);
define('DIAS_DESCANSO', $_POST['dias_descanso']);


define('SALARIO_DIA_NUM', $_POST['salario_diario_num']);
define('SALARIO_DIA_LETRA', $_POST['salario_diario_letra']);
define('SALARIO_MENS_NUM', $_POST['salario_mensual_num']);
define('SALARIO_MENS_LETRA', $_POST['salario_mensual_letra']);




// Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf.php');



class MYPDF extends TCPDF {

    public $encabezado =1;

    //Page header
    public function Header() {

      if($this->encabezado==1){
        $header="            Hoja  ".$this->getPageNumGroupAlias()." / ".$this->getPageGroupAlias()."  del CONTRATO INDIVIDUAL DE TRABAJO POR TIEMPO ";
        // Logo
        $image_file = K_PATH_IMAGES.'logo.jpg';
        $this->Image($image_file, 5, 7, 50, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 10);
        // Title
        $this->Cell(0,10, $header, 0, 2, 'L', 0, '', 0, false, 'M', 'M');
        $header="            DETERMINADO que celebran “CONSORCIO HERMES” y ".EMPLEADO;
        $this->Cell(0, 10, $header, 0, 2, 'L', 0, '', 0, false, 'M', 'M');
        $header="            de fecha ".NUM_DIA_INI." de ".ucwords(MES_INI_CONT)." de  ".NUM_ANIO_INI;
        $this->Cell(0, 10, $header, 0, 2, 'L', 0, '', 0, false, 'M', 'M');
      }else{
        $header="            Hoja  ".$this->getPageNumGroupAlias()." / ".$this->getPageGroupAlias()."  del Convenio de Confidencialidad que celebran ";
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
if(ClauB=='1'){
  $textoCB='contenido de los Estatutos de la Escritura Pública descrita en el apartado anterior manifestando que dichas facultades, conforme a las cuales actúa, no le han sido revocadas, modificadas ni limitadas de manera alguna.';
}else if(ClauB=='2'){
  $textoCB="Instrumento Público No.".numeroinst." de fecha ".opbd." de ".opbm." de dos mil ".opbn;
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

$fechaCont=" ".DIA_INI_CONT." de ".MES_INI_CONT." de "." dos mil ".ANIO_INI_CONT;









$pdf->startPageGroup();



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



$txt="<b>C)</b> Que requiere para el cumplimiento de las actividades derivadas de su Objeto Social que se vinculan con tecnología de la información y comunicaciones contratar por tiempo determinado los servicios de “EL TRABAJADOR”, por el término de ".DURACION_CONTRATO.
", de conformidad con lo dispuesto por el artículo 37 de la Ley Federal del Trabajo, en razón de así exigirlo la naturaleza del servicio que prestará a sus clientes, siendo esta de carácter eventual, especial y limitada al tiempo del contrato que le sea otorgado, el cual implica, respecto de proyectos concretos, el efectuar labores relacionadas con la gestión de tecnología de la información y comunicaciones bajo dependencia de “CONSORCIO HERMES”, por lo que el cliente contratante de “LA EMPRESA” establece un vínculo legal exclusivamente con“CONSORCIO HERMES” por lo que por ningún motivo el contrato celebrado por “LA EMPRESA” y alguno de sus clientes será extensible, prorrogable, sustituible o vinculante de cualquier forma con “EL TRABAJADOR”.";
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


$txt='<b>A)</b> Llamarse '.EMPLEADO.' , ser de nacionalidad '. $textoUNICA.', ser de '.EDAD_EMPLEADO.' años de edad, estado civil '.ESTADO_CIVIL.', con domicilio para oír y recibir notificaciones derivadas o relacionadas con el presente instrumento en '.DOMICILIO_EMPLEADO.' y correo electrónico '.EMAIL_EMPLEADO.' los cuales reconoce subsistirán para los efectos del presente contrato hasta en tanto no proporcione otros diversos por escrito a “CONSORCIO HERMES”.';
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

$txt="<b>E)</b> Que ha sido enterado de la obligación que asume respecto de la información de la empresa, la cual en todo momento será de carácter confidencial,  ya que dicha información significa la obtención de ventaja competitiva y económica frente a terceros en la realización de sus actividades económicas. La información que “EL TRABAJADOR” conoce y se compromete a manejar como de carácter confidencial y los términos a que se sujetará en ello se encuentran comprendidos en el Convenio de Confidencialidad ha suscribir con “CONSORCIO HERMES”, por lo que el trabajador en caso de faltar a lo establecido en dicho Convenio de Confidencialidad acepta que será razón suficiente para dar por terminada la relación de trabajo entre “EL TRABAJADOR” y “CONSORCIO HERMES”, lo anterior con independencia de la responsabilidad que se genere y la reparación de los daños y perjuicios que provoque la infracción a la secrecía que debe guardar en los términos de la ley y los acordados en dicho Convenio de Confidencialidad.";
$pdf->writeHTMLCell(170, 75, 14 ,25, $txt, 0,0,0,0, 'J', 0, 2,  true);
$pdf->Ln();

$txt='Con las anteriores declaraciones, las partes de este contrato tienen a bien otorgar las siguientes:';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$txt='C L Á U S U L A S';
$pdf->SetFont('helvetica', 'BU', 12);
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->SetFont('helvetica', '', 12);
$pdf->Ln();


$txt='<b>PRIMERA.-</b> <b><u>OBJETO, SUBORDINACIÓN, SERVICIOS Y PUESTO DE TRABAJO.-</u></b> El presente contrato tiene por objeto determinar, los derechos y obligaciones, así como las condiciones en la relación de trabajo que se establece entre “CONSORCIO HERMES” y “EL TRABAJADOR”, consistente en la prestación de los servicios personales de “EL TRABAJADOR”, bajo el mando y orden de “CONSORCIO HERMES”, en el lugar y establecimiento que será indicado y designado a “EL TRABAJADOR” por “CONSORCIO HERMES”, desempeñando en dicho lugar las actividades correspondientes al puesto de '.PUESTO.'.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='“CONSORCIO HERMES” quedará a cargo en forma exclusiva de la potestad jurídica de dirección y mando en forma personal o por conducto de las personas que designe a tal efecto, por lo que es expreso el reconocimiento de “EL TRABAJADOR”, de que en ningún caso y por ningún motivo existirá subordinación, remuneración o vínculo laboral alguno con terceros, por ser estos ajenos al presente contrato, identificando entre ellos de manera enunciativa a el o los clientes que contraten los servicios de “CONSORCIO HERMES”, respecto de los cuales “EL TRABAJADOR” reconoce y acepta que no se establecerá vínculo legal por ningún motivo, pues el contenido de los derechos y obligaciones contenidos en un acuerdo, convenio o contrato que haya sostenido “CONSORCIO HERMES” con sus respectivos clientes, no pueden ser extensibles, prorrogables, sustituibles o vinculantes de alguna forma con “EL TRABAJADOR”.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='Asimismo “EL TRABAJADOR” conviene expresamente que desempeñará las actividades que “CONSORCIO HERMES” le instruya de acuerdo con las necesidades del servicio, sus conocimientos, habilidades, experiencia, capacitación y grado de confianza depositada, de tal manera que “EL TRABAJADOR” podrá llevar a cabo sus labores en relación con el trabajo contratado desarrollándolo con su mayor cuidado, esmero y eficiencia.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();








$pdf->AddPage();

$pdf->StartTransform();
$pdf->Rotate(-90);
$pdf->SetFont('helvetica', '', 9);
$pdf->MultiCell(220, 5,COSTADO, 0, 'J', 0, 2, 20 ,-150, true);
$pdf->StopTransform();
$pdf->SetFont('helvetica', '', 12);

$txt='<b>SEGUNDA.-</b> <b><u>DURACIÓN DEL CONTRATO.-</u></b> El presente contrato, por la naturaleza del o los servicios que “CONSORCIO HERMES” prestará a sus clientes, tendrá una duración de '.DURACION_CONTRATO.' por lo que su vigencia será del '.DIA_INI_CONT.' de '.MES_INI_CONT.' de dos mil '.ANIO_INI_CONT.' día de su firma, al '.DIA_FIN_CONT.' de '.MES_FIN_CONT.' de dos mil '.ANIO_FIN_CONT.', o antes si por cualquier motivo se extinguiera la causa que le da origen y por tanto la materia de trabajo que este contrato regula, desde luego sin responsabilidad para cualquiera de sus partes, toda vez que la naturaleza del trabajo es transitoria.
';
$pdf->writeHTMLCell(170, 43, 14 ,25, $txt, 0,0,0,0, 'J', 0, 2,  true);
$pdf->Ln();


$txt="La actividad de “EL TRABAJADOR” tiene por objeto iniciar, desarrollar, ejecutar y concluir asidua y oportunamente los servicios transitorios que se especifican en el apartado de declaraciones del presente Contrato, las cuales se tienen aquí por reproducidas como si a la letra se insertaran, con lo que las partes manifiestan su conformidad que terminado el plazo estipulado que es la duración del presente Contrato, terminará en todos sus efectos, como lo dispone la fracción III del artículo 53, de la Ley Federal del Trabajo.";
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='El presente Contrato solo podrá prorrogarse por una sola vez por un término igual a su duración original, es decir '.DURACION_CONTRATO.', siempre que exista el consenso de ambas partes, que persista la materia origen del contrato y siempre que no sobrevenga imposibilidad por el agotamiento de la materia del trabajo.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='<b>TERCERA.-</b> <b><u>JORNADA DE TRABAJO.-</u></b> Se pacta una jornada de trabajo diurna continua la cuál será de '.DURACION_JORNADA.' diarias, desempeñando sus labores dentro del horario comprendido de las '.DESDE_HORAS_JORNADA.' horas a las '.HASTA_HORAS_JORNADA.' horas los días de '.DIAS_TRABAJO.'; contando con media hora diaria para tomar sus alimentos fuera del lugar donde presta sus servicios. El horario será señalado por “LA EMPRESA” de acuerdo a sus necesidades.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();



$txt='“EL TRABAJADOR” gozará por cada seis días de trabajo un día de descanso, el cual se conviene que sea los días '.DIAS_DESCANSO.' de cada semana, con goce de salario íntegro; asimismo disfrutará de los días señalados de descanso obligatorio por el artículo 74 (setenta y cuatro) de la Ley Federal del Trabajo; conforme a las necesidades del servicio y a las indicaciones de “LA EMPRESA”.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$txt='“EL TRABAJADOR” se obliga a laborar tiempo extra únicamente en los términos del artículo 66 (sesenta y seis) de la Ley federal del Trabajo, en la inteligencia de que solo se considerarán y pagarán como horas extraordinarias las que excedan del tiempo semanal establecido por Ley y que hayan sido previamente autorizadas en forma escrita por “LA EMPRESA” o por persona autorizada para ello, ya que en todos los casos queda expresamente prohibido que “EL TRABAJADOR” labore tiempo extra, salvo contar con el permiso mediante orden por escrito referido en este párrafo.  En caso contrario no le será cubierta a “EL TRABAJADOR” ningún tipo de prestación por hora extraordinaria. ';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();









$pdf->AddPage();


$pdf->StartTransform();
$pdf->Rotate(-90);
$pdf->SetFont('helvetica', '', 9);
$pdf->MultiCell(220, 5,COSTADO, 0, 'J', 0, 2, 20 ,-150, true);
$pdf->StopTransform();
$pdf->SetFont('helvetica', '', 12);

$txt='<b>CUARTA.-</b> <b><u>SALARIO.-</u></b> “EL TRABAJADOR” percibirá por el trabajo prestado objeto de este contrato, un salario diario de $'.SALARIO_DIA_NUM.' ( '.SALARIO_DIA_LETRA.' )';
$pdf->writeHTMLCell(170, 16, 14 ,25, $txt, 0,0,0,0, 'J', 0, 2,  true);
$pdf->Ln();


$txt='Es decir $'.SALARIO_MENS_NUM.' ( '.SALARIO_MENS_LETRA.' ) como salario mensual por el trabajo desempeñado conforme a la cláusula TERCERA del presente Contrato; suma en que se incluye el pago de séptimos días y el correspondiente a los días de descanso obligatorio. El pago será hecho en moneda mexicana de curso legal corriente, los días 15 (quince) y 30 (treinta) de cada mes, mediante transferencia electrónica.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$txt='<b>QUINTA.-</b> <b><u>VACACIONES.-</u></b> En caso de que “EL TRABAJADOR” cumpla un año de servicios, disfrutará de un periodo de vacaciones pagadas de 6 (seis) días, que aumentara en 2 (dos) días  laborales hasta llegar a 12 (doce) por cada año subsecuente de servicios de producirse tal supuesto. Igualmente después del quinto año aumentará en 2 (dos) días por cada cinco años de servicios, o bien la parte proporcional de acuerdo al tiempo laborado.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='<b>SEXTA.-</b> <b><u>AGUINALDO.-</u></b> Las partes convienen que “EL TRABAJADOR” tendrá derecho a un aguinaldo anual, el cual deberá ser pagado por “EL PATRÓN” antes del veinte de diciembre de cada año, equivalente a quince días de salario, o bien la parte proporcional que le corresponda de acuerdo al tiempo laborado en el año conforme al presente Contrato.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='<b>SÉPTIMA.-</b> <b><u>OBLIGACIÓN DE “EL TRABAJADOR”.-</u></b> “EL TRABAJADOR” se obliga a desempeñar sus servicios bajo la dirección de “CONSORCIO HERMES”, a cuya autoridad se encontrará subordinado en todo lo concerniente al trabajo; aceptando en todo momento realizar dichas actividades con la intensidad, cuidado y esmero apropiados y en la forma, tiempo y lugar convenidos.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$txt='<b>OCTAVA.-</b> <b><u>OBLIGACIÓN DE “EL TRABAJADOR”.-</u></b> Cuando “EL TRABAJADOR” se encuentre impedido para asistir a sus labores por enfermedad, deberá dar aviso a “CONSORCIO HERMES” durante las dos primeras horas de inicio de su jornada con el fin de que, en su caso, su ausencia se considere justificada debiendo además entregar “EL TRABAJADOR” a “CONSORCIO HERMES” en un término máximo de tres días hábiles, el certificado de incapacidad que otorgue el médico correspondiente del Instituto Mexicano del Seguro Social.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='<b>NOVENA.-</b> <b><u>OBLIGACIÓN DE “EL TRABAJADOR”.-</u></b> Para seguridad de los contratantes, “EL TRABAJADOR” estará obligado a someterse a los exámenes médicos que periódicamente le ordene “CONSORCIO HERMES”, en los términos de la fracción X del artículo 134 de la Ley Federal del Trabajo, en el concepto de que el médico que los practique será designado y retribuido por “CONSORCIO HERMES”.  Asimismo “EL TRABAJADOR” esta obligado a poner en práctica las medidas profilácticas y de higiene que las normas vigentes en “LA EMPRESA” determinen o las autoridades del ramo acuerden, estando sujetas ambas partes a las disposiciones que establezca la Ley del Seguro Social al respecto y en todo lo relacionado con los distintos ramos de aseguramiento que establece dicho ordenamiento.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();








$pdf->AddPage();



$pdf->StartTransform();
$pdf->Rotate(-90);
$pdf->SetFont('helvetica', '', 9);
$pdf->MultiCell(220, 5,COSTADO, 0, 'J', 0, 2, 20 ,-150, true);
$pdf->StopTransform();
$pdf->SetFont('helvetica', '', 12);


$txt='<b>DÉCIMA.-</b> <b><u>OBLIGACIÓN DE “EL TRABAJADOR”.-</u></b> La información que “EL TRABAJADOR” conoce y se compromete a manejar como de carácter confidencial y los términos a que se sujetará en ello se encuentran comprendidos en el Convenio de Confidencialidad que suscribe con “CONSORCIO HERMES”, por lo que el trabajador en caso de faltar a lo establecido en dicho Convenio de Confidencialidad acepta que será razón suficiente para dar por terminada la relación de trabajo entre “EL TRABAJADOR” y “CONSORCIO HERMES”, con independencia de la responsabilidad que se genere y la reparación de los daños y perjuicios que provoque la infracción a la secrecía que debe guardar en los términos de la ley y los acordados en dicho Convenio de Confidencialidad';
$pdf->writeHTMLCell(170, 55, 14 ,25, $txt, 0,0,0,0, 'J', 0, 2,  true);
$pdf->Ln();

$txt="<b>DÉCIMA PRIMERA.-</b> “CONSORCIO HERMES” proporcionará a “EL TRABAJADOR” las herramientas de trabajo que sean necesarias para que pueda desempeñar adecuadamente sus actividades laborales en los lugares que le sean encomendados llevar a cabo su actividad laboral.";
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$txt='<b>DÉCIMA SEGUNDA.-</b> Al cumplirse el término por el que se celebra este Contrato, el mismo quedará terminado sin necesidad de aviso previo por haber concluido la actividad o trabajo que le dio origen.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$txt='<b>DÉCIMA TERCERA.-</b> “EL TRABAJADOR” conviene y acepta que en atención al origen excepcional del presente Contrato, no se derivan en ningún caso relaciones de carácter permanente.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$txt='<b>DÉCIMA CUARTA.-</b> “CONSORCIO HERMES” podrá dar por terminado en forma anticipada el presente contrato si por cualquier motivo se extinguiera la causa que le da origen y por tanto la materia de trabajo que este Contrato regula.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='De la misma forma, acepta “EL TRABAJADOR” que “CONSORCIO HERMES” puede dar por terminado este contrato, en el caso de que “EL TRABAJADOR” incurra en alguna falta de las estipuladas en la Ley Federal del Trabajo.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$txt='<b>DÉCIMA QUINTA.-</b> “EL TRABAJADOR” está conforme en que “CONSORCIO HERMES” queda en libertad de rescindir anticipadamente al término convenido, el presente contrato por incumplimiento parcial o total de su contenido, o por ocurrir cualquiera de las causas previstas en el artículo 47 de la Ley Federal del Trabajo.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='<b>DÉCIMA SEXTA.-</b> “EL TRABAJADOR” y “CONSORCIO HERMES” convienen expresamente en someterse en caso de cualquier diferencia o controversia, al texto de este Contrato. Las obligaciones y derechos que mutuamente les corresponden y que no hayan sido motivo de cláusula expresa en el presente Contrato, se sujetarán a las disposiciones de la Ley Federal del Trabajo.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();





$pdf->AddPage();
$num=$pdf->getPageGroupAlias();
$letra = $paginas[$num-1];



$txt='Las partes manifiestan haber leído y comprendido este Contrato y aceptan quedar obligados por todas y cada una de sus declaraciones y cláusulas, en testimonio de lo cual lo suscriben por duplicado y de conformidad quedando un ejemplar en poder de “EL TRABAJADOR” y otro en poder de “CONSORCIO HERMES”, reconociendo las firmas que plasman al margen y al calce en sus '.$num.' '.$letra.' fojas útiles como las que utilizan para todos los actos jurídicos en que intervienen, en Santiago de Querétaro, Querétaro a '.DIA_INI_CONT.' de '.MES_INI_CONT.' de dos mil '.ANIO_INI_CONT  ;
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







$pdf->encabezado=2;




$pdf->startPageGroup();



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
  <b>A) </b> Que es una Sociedad Anónima de Capital Variable debidamente constituida conforme a las leyes de los Estados Unidos Mexicanos, según consta en la Escritura Pública No. 10,071 (diez mil setenta y uno), de fecha ocho de julio del año dos mil cinco, otorgada ante la fe de la licenciada Sonia Alcántara Magos  Titular de la Notaría No. 18 (dieciocho) de la Ciudad de Santiago de Querétaro, Estado de Querétaro, cuyo primer testimonio quedó inscrito en el Registro Público de Comercio, bajo el número de Folio Mercantil Electrónico 31322/1 (treinta y un mil trescientos veintidós diagonal uno).
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

$txt="<b>A) </b> Llamarse como ha quedado indicado al rubro del presente documento, ser de nacionalidad $textoUNICA ser de $edad_emp años de edad, con domicilio para oír y recibir notificaciones derivadas o relacionadas con el presente instrumento en $dom_emp y correo electrónico
$correo_emp los cuales reconoce subsistirán para los efectos del presente contrato hasta en tanto no proporcione otros diversos por escrito a “CONSORCIO HERMES”.";
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$txt="<b>B)</b> Haber sido contratado para desempeñar el puesto de ".PUESTO_EMPLEADO.'en “CONSORCIO HERMES” mismo que implica la gestión de tecnología de la información dentro de “LA EMPRESA” y en el contexto de los proyectos donde “CONSORCIO HERMES” ofrece a sus clientes la proveeduría o la  prestación de bienes y servicios de manera singular o en conjunto con otras empresas.';
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


$txt='<b>SEGUNDA.-</b> Salvo las excepciones que este instrumento expresamente determine, las disposiciones contenidas en el presente Convenio serán aplicables a “EL TRABAJADOR” y a “CONSORCIO HERMES” durante la vigencia del Contrato Individual de Trabajo indicado en la Declaración III inciso a) de este instrumento o de cualquier otro contrato, acuerdo o documento que le sustituya y rija su relación de trabajo. Las disposiciones de este convenio continuarán siendo vigentes por un periodo de tres años contado a partir de la conclusión de la relación laboral sin importar la causa o el motivo de su terminación.';
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



$txt='<b>OCTAVA.-</b> “EL TRABAJADOR” asumirá como asuntos administrativos reservados, cuya divulgación puede causar perjuicios a “CONSORCIO HERMES” cualquier información de los empleados, asesores o socios de “LA EMPRESA”, características y ubicación de sus instalaciones, su información financiera, tarifas de servicios, recursos materiales, procesos, guías e instructivos administrativos, así como aquella que en su calidad de '.PUESTO_EMPLEADO.' tenga acceso o constituyan actividades inherentes a la descripción de su puesto.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$txt='Es información derivada o relacionada con las funciones de “EL TRABAJADOR” inherentes a la descripción de su puesto como '.PUESTO_EMPLEADO.'que  constituyen asuntos administrativos reservados cuya divulgación puede causar perjuicios a “CONSORCIO HERMES” la siguiente: ';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();



$txt="<b>8.1</b> La referente a las solicitudes que presenten los usuarios de los servicios de tecnología de la información que ofrece “LA EMPRESA o que sea resultado de su atención, asesoramiento o soporte;<br />
<b>8.2</b> La correspondiente a los datos e intervención de los responsables de la administración, soporte o mantenimiento de la infraestructura de tecnología de la información y comunicaciones  de “LA EMPRESA”;<br />
<b>8.3</b> La que obtenga como consecuencia de su contacto y comunicación con proveedores y prestadores de bienes y servicios;<br />
<b>8.4</b> La referente a las propuestas que elabore “LA EMPRESA” para participar en procesos de concurso, licitaciones, invitaciones restringidas o de adjudicación directa que involucren tecnología de la información y comunicaciones;<br />
<b>8.5</b> La relativa a la gestión de cuentas de usuario y asignación de recursos a las mismas;<br />

";
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
<b>8.6</b> La obtenida como consecuencia de la implantación de controles de seguridad, análisis de riesgos o vulnerabilidades, ejercicios de prevención ante desastres y cualquier otro que evalúe la infraestructura física o lógica de “LA EMPRESA”;<br />
<b>8.7</b> La obtenida de sus actividades de apoyo a las distintas áreas de la empresa para el desarrollo de sus funciones, y<br />
<b>8.8</b> La que tenga una naturaleza análoga a la listada en esta cláusula cuyo acceso se derive de asuntos encomendados al puesto de '.PUESTO_EMPLEADO;
$pdf->writeHTMLCell(170, 45, 14 ,25, $txt, 0,0,0,0, 'J', 0, 2,  true);
$pdf->Ln();


$txt='<b>NOVENA.-</b> “EL TRABAJADOR” considerará como secretos técnicos y comerciales cuya divulgación puede causar perjuicios a “CONSORCIO HERMES” cualquier información que conste en medios escritos o electrónicos, imágenes, video, voz o texto referente al nombre o nombres de clientes actuales o potenciales, negociaciones, metodologías, fórmulas de negocios, planes de trabajo, compilaciones o registros, información relativa a investigaciones o estudios sobre “LA EMPRESA”, registros de desarrollo de proyectos o investigaciones que realice o contrate “CONSORCIO HERMES” sea total o relativa a cualquiera de sus etapas, inventos, información proporcionada por sus clientes, capacidad tecnológica y programas de cómputo, así como cualquier información en que se exprese o se ostente la leyenda “Información Confidencial” incluso cuando “EL TRABAJADOR” haya intervenido en su conformación. ';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$txt='Es información derivada o relacionada con las funciones de “EL TRABAJADOR” inherentes a la descripción de su puesto como '.PUESTO_EMPLEADO.' que  constituyen secretos técnicos y comerciales cuya divulgación puede causar perjuicios a “CONSORCIO HERMES”  la siguiente:';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();



$txt='<b>9.1</b> Las estrategias de “LA EMPRESA”, sus procesos, instructivos, políticas y prácticas definidas para la atención de usuarios internos y externos en materia de Tecnologías de la Información y Comunicaciones;<br />
<b>9.2</b> Las características técnicas, cantidad, ubicación, costos, aspectos de mantenimiento, control,  y en general las particularidades de la infraestructura física y lógica de tecnología de la información y comunicaciones de “CONSORCIO HERMES”;<br />
<b>9.3</b> Los desarrollos o adaptaciones de programas de cómputo, aplicaciones o interfaces auspiciados por “LA EMPRESA” aún en el caso de intervención de “EL TRABAJADOR” y con independencia del reconocimiento que le corresponda como autor;<br />
<b>9.4</b> Los códigos fuente de los programas o aplicaciones propiedad de “CONSORCIO HERMES”;<br />
<b>9.5</b> Compilaciones o registros de proyectos de tecnología de la información y comunicaciones en que intervenga “LA EMPRESA”;<br />
<b>9.6</b> Trabajos de investigación en que participe “CONSORCIO HERMES” vinculados a la aplicación de soluciones de tecnología de la información y comunicaciones;<br />
<b>9.7</b> La relativa a la gestión de cuentas de usuario y asignación de recursos a las mismas;<br />
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


$txt='<b>9.8</b> La relacionada con la administración de los servicios de Web, su diseño, mantenimiento, sistemas de búsqueda  y en general sus particularidades aplicadas respecto de “LA EMPRESA”, y<br />
<b>9.9</b> Aquella  que obre en bases de datos, copias de respaldo o archivos resultado de recuperación, con independencia del medio de almacenamiento, propiedad  de “LA EMPRESA o bajo control derivado de acuerdos, contratos o convenios celebrados con terceros. ';
$pdf->writeHTMLCell(170, 45, 14 ,25, $txt, 0,0,0,0, 'J', 0, 2,  true);
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


$txt="Esta Cláusula será de vigencia indefinida, y en todo caso se mantendrá vigente durante todo el tiempo en que dure el procedimiento jurisdiccional entablado por “CONSORCIO HERMES” en contra de la persona física o moral que contrate a “EL TRABAJADOR” y cesará hasta concluidos tres años posteriores a que se dicte sentencia definitiva que declare responsabilidad y determine el pago de daños y perjuicios en favor de “CONSORCIO HERMES” como consecuencia de la conculcación de lo establecido en el artículo 86 de la Ley de la Propiedad Industrial.";
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
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



$num=$pdf->getPageGroupAlias();
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







// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output($nombre, 'I');

//============================================================+
// END OF FILE
//============================================================+

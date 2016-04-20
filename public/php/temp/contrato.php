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


$fecha_contLABf=$_POST['fecha_fincontLab'];
$separada_contf = explode('/', $fecha_contLABf);
$dia_contlabf = $separada_contf[0];
$mes_contlabf = $separada_contf[1];
$anio_contlabf = $separada_contf[2];

define('DIA_FIN_CONT',strtolower($dias[$dia_contlabf-1]));
define('MES_FIN_CONT',strtolower($meses[$mes_contlabf-1]));
define('ANIO_FIN_CONT',strtolower($anio[$anio_contlabf-2001]));


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

$txt="<b>E)</b> Que ha sido enterado de la obligación que asume respecto de la información de la empresa, la cuál en todo momento será de carácter confidencial,  ya que dicha información significa la obtención de ventaja competitiva y económica frente a terceros en la realización de sus actividades económicas. La información que “EL TRABAJADOR” conoce y se compromete a manejar como de carácter confidencial y los términos a que se sujetará en ello se encuentran comprendidos en el Convenio de Confidencialidad ha suscribir con “CONSORCIO HERMES”, por lo que el trabajador en caso de faltar a lo establecido en dicho Convenio de Confidencialidad acepta que será razón suficiente para dar por terminada la relación de trabajo entre “EL TRABAJADOR” y “CONSORCIO HERMES”, lo anterior con independencia de la responsabilidad que se genere y la reparación de los daños y perjuicios que provoque la infracción a la secrecía que debe guardar en los términos de la ley y los acordados en dicho Convenio de Confidencialidad.";
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




$txt='Asimismo “EL TRABAJADOR” conviene expresamente que desempeñará las actividades que “CONSORCIO HERMES” le instruya de acuerdo con las necesidades del servicio, sus conocimientos, habilidades, experiencia, capacitación y grado de confianza depositada, de tal manera que “EL TRABAJADOR” podrá llevar a cabo sus labores en relación con el trabajo contratado desarrollándolo con su mayor cuidado, esmero y eficiencia.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();

$txt='<b>SEGUNDA.-</b> <b><u>DURACIÓN DEL CONTRATO.-</u></b> El presente contrato, por la naturaleza del o los servicios que “CONSORCIO HERMES” prestará a sus clientes, tendrá una duración de '.DURACION_CONTRATO.' por lo que su vigencia será del '.DIA_INI_CONT.' de '.MES_INI_CONT.' de dos mil '.ANIO_INI_CONT.' día de su firma, al '.DIA_FIN_CONT.' de '.MES_FIN_CONT.' de dos mil '.ANIO_FIN_CONT.', o antes si por cualquier motivo se extinguiera la causa que le da origen y por tanto la materia de trabajo que este contrato regula, desde luego sin responsabilidad para cualquiera de sus partes, toda vez que la naturaleza del trabajo es transitoria.
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


$txt="La actividad de “EL TRABAJADOR” tiene por objeto iniciar, desarrollar, ejecutar y concluir asidua y oportunamente los servicios transitorios que se especifican en el apartado de declaraciones del presente Contrato, las cuales se tienen aquí por reproducidas como si a la letra se insertaran, con lo que las partes manifiestan su conformidad que terminado el plazo estipulado que es la duración del presente Contrato, terminará en todos sus efectos, como lo dispone la fracción III del artículo 53, de la Ley Federal del Trabajo.";
$pdf->writeHTMLCell(170, 43, 14 ,25, $txt, 0,0,0,0, 'J', 0, 2,  true);
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



$txt='<b>CUARTA.-</b> <b><u>SALARIO.-</u></b> “EL TRABAJADOR” percibirá por el trabajo prestado objeto de este contrato, un salario diario de $'.SALARIO_DIA_NUM.' ( '.SALARIO_DIA_LETRA.' )';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();


$txt='Es decir $'.SALARIO_MENS_NUM.' ( '.SALARIO_MENS_LETRA.' ) como salario mensual por el trabajo desempeñado conforme a la cláusula TERCERA del presente Contrato; suma en que se incluye el pago de séptimos días y el correspondiente a los días de descanso obligatorio. El pago será hecho en moneda mexicana de curso legal corriente, los días 15 (quince) y 30 (treinta) de cada mes, mediante transferencia electrónica.';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();







$pdf->AddPage();


$pdf->StartTransform();
$pdf->Rotate(-90);
$pdf->SetFont('helvetica', '', 9);
$pdf->MultiCell(220, 5,COSTADO, 0, 'J', 0, 2, 20 ,-150, true);
$pdf->StopTransform();
$pdf->SetFont('helvetica', '', 12);


$txt='<b>QUINTA.-</b> <b><u>VACACIONES.-</u></b> En caso de que “EL TRABAJADOR” cumpla un año de servicios, disfrutará de un periodo de vacaciones pagadas de 6 (seis) días, que aumentara en 2 (dos) días  laborales hasta llegar a 12 (doce) por cada año subsecuente de servicios de producirse tal supuesto. Igualmente después del quinto año aumentará en 2 (dos) días por cada cinco años de servicios, o bien la parte proporcional de acuerdo al tiempo laborado.';
$pdf->writeHTMLCell(170, 36, 14 ,25, $txt, 0,0,0,0, 'J', 0, 2,  true);
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

$txt='<b>DÉCIMA.-</b> <b><u>OBLIGACIÓN DE “EL TRABAJADOR”.-</u></b> La información que “EL TRABAJADOR” conoce y se compromete a manejar como de carácter confidencial y los términos a que se sujetará en ello se encuentran comprendidos en el Convenio de Confidencialidad que suscribe con “CONSORCIO HERMES”, por lo que el trabajador en caso de faltar a lo establecido en dicho Convenio de Confidencialidad acepta que será razón suficiente para dar por terminada la relación de trabajo entre “EL TRABAJADOR” y “CONSORCIO HERMES”, con independencia de la responsabilidad que se genere y la reparación de los daños y perjuicios que provoque la infracción a la secrecía que debe guardar en los términos de la ley y los acordados en dicho Convenio de Confidencialidad';
$pdf->writeHTML( $txt, true, 0, true, false, 'J');
$pdf->Ln();






$pdf->AddPage();



$pdf->StartTransform();
$pdf->Rotate(-90);
$pdf->SetFont('helvetica', '', 9);
$pdf->MultiCell(220, 5,COSTADO, 0, 'J', 0, 2, 20 ,-150, true);
$pdf->StopTransform();
$pdf->SetFont('helvetica', '', 12);



$txt="<b>DÉCIMA PRIMERA.-</b> “CONSORCIO HERMES” proporcionará a “EL TRABAJADOR” las herramientas de trabajo que sean necesarias para que pueda desempeñar adecuadamente sus actividades laborales en los lugares que le sean encomendados llevar a cabo su actividad laboral.";
$pdf->writeHTMLCell(170, 25, 14 ,25, $txt, 0,0,0,0, 'J', 0, 2,  true);
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
$num=$pdf->getNumPages();
$letra = $paginas[$num-1];



$txt='Las partes manifiestan haber leído y comprendido este Contrato y aceptan quedar obligados por todas y cada una de sus declaraciones y cláusulas, en testimonio de lo cual lo suscriben por duplicado y de conformidad quedando un ejemplar en poder de “EL TRABAJADOR” y otro en poder de “CONSORCIO HERMES”, reconociendo las firmas que plasman al margen y al calce en sus'.$num.' '.$letra.' fojas útiles como las que utilizan para todos los actos jurídicos en que intervienen, en Santiago de Querétaro, Querétaro a '.DIA_INI_CONT.' de '.MES_INI_CONT.' de dos mil '.ANIO_INI_CONT  ;
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

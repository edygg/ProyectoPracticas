<?php

class UsuarioUnitecController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/perfilUnitec';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete',
			 // we only allow deletion via POST request
		);
	}

	

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','Perfil','editarPerfil','CambiarContrasena','ActualizarDatos','VerificarUsuarios','EnviarCorreoEmpresa','AbrirSitioWeb','VerificarEmpresa','VerificarAlumnos','VerifcarUnitec','VerificarUsuarioEmpresa','ActualizarInfoAdicional','parametrizarCampos','ActualizarNombreTipoCarrera','CrearTipoCarrera' ,'ActualizarEstadoTipoCarrera','ActualizarNombreCarrera',
					'ActualizarEstadoCarrera','ActualizarTipoCarrera','CrearCarrera','ActualizarNombreTipoEmpresa','ActualizarEstadoTipoEmpresa','CrearTipoEmpresa','PeriodoAcademico','CrearPeriodoAcademico','ActualizarAnioPeriodo','ActualizarSemestrePeriodo','ActualizarTrimestrePeriodo','ActualizarEstadoPeriodo','Cursos','CrearCurso','ActualizarNombreCurso','ActualizarCodigoCurso','ActualizarSeccionCurso',
					'ActualizarPeriodoCurso','ActualizarAsesorCurso','ActualizarEstadoCurso','ActualizarCarreraPorCurso','AsesoresPorCarrera','Prueba','AsesoresPorCarrera2','ActualizarCarrerasPorCurso','EnviarSolicitudAsesor','ActualizarEstadoCarreraPorUsuario','misCursos','matricularAlumnos','CargarCursosPorCarrera','MatricularAlumnosEnMasa','MisAlumnos','NoHaceNada','SubirImagen','ViculacionAlumnosPracticas','resultadoBusquedaPPFiltro','resultadoBusquedaPP','DetallePractica',
					'ListaAlumnosPorCurso','VincularAlumnoConPractica','crearAsesoramiento','CrearNuevoAsesoramiento','verAsesoramientos','editarAsesoramiento','actualizarDatosAsesoramiento','VerificarPractica','ExcelEPC','ExcelDDC','ActualizarEstadoEstudiante','ActualizarEstadoCurso2','EliminarVinculacion','RegAs'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}


public function actionRegAs(){

Yii::import('ext.phpexcel.XPHPExcel');      
        $objPHPExcel = XPHPExcel::createPHPExcel();
        $objReader = PHPExcel_IOFactory::createReader('Excel5');
        $objPHPExcel = $objReader->load(Yii::app()->basePath . DIRECTORY_SEPARATOR . 'extensions' . DIRECTORY_SEPARATOR."phpexcel".DIRECTORY_SEPARATOR."formatos".DIRECTORY_SEPARATOR."RegAs.xls");


      $objPHPExcel->getProperties()->setCreator("Henry Arévalo")
                             ->setLastModifiedBy("Henry Arévalo")
                             ->setTitle("Sistema de Gestión de Prácticas Profesionales")
                             ->setSubject("UNITEC")
                             ->setDescription("SGPP")
                             ->setKeywords("HAF")
                             ->setCategory("SGPP");
// Formatos
$AlieadoArriba = array('font' => array('bold'=>false),
	'alignment' => array( 'vertical' => PHPExcel_Style_Alignment::VERTICAL_TOP,'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY,
	)); // Negrita Tamaño 12     

$NegritaTamanioOnce = array('font' => array('bold'=> true,'size'=>10),
	'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
	)); // Negrita tamaño 11

// Bordes 
    $BordesEncabezado = array(
    'borders' => array(
        'outline' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,

        ),
    ),
);
    // Bordes 
    $TodosLosBordes = array(
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,

        ),
    ),
);




if(isset($_GET['Estudiante'],$_GET['Practica'],$_GET['Curso'])){


$model = AsesoramientoAlumno::model()->findAllByAttributes(array('Curso_IdCurso'=>$_GET['Curso'] ,'UsuarioEstudiante_IdUsuarioEstudiante' =>$_GET['Estudiante'] , 'PracticaProfesional_IdPracticaProfesional'=>$_GET['Practica']  ),array('order'=>'FechaCreacionAsesoramiento DESC'));	
$cantidad = count($model);
$contador =1;
$practica = PracticaProfesional::model()->findByPk($_GET['Practica']);
if($cantidad !=0){

 // Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
$contadorDePuntos= 0;

foreach ($model as $asesoramiento) { 
$Estudiante = UsuarioEstudiante::model()->findByPk($asesoramiento->UsuarioEstudiante_IdUsuarioEstudiante);
$objWorkSheetBase = $objPHPExcel->getSheet();
//  Create a clone of the current sheet, with all its style properties
$objWorkSheet1 = clone $objWorkSheetBase;
//  Set the newly-cloned sheet title
$objWorkSheet1->setTitle('Asesoramiento #' . $cantidad);

//  Attach the newly-cloned sheet to the $objPHPExcel workbook
$objPHPExcel->addSheet($objWorkSheet1);
 // Rename worksheet
$objPHPExcel->setActiveSheetIndex($contador)->setCellValue('H12',$cantidad); // número de asesoramiento
$objPHPExcel->setActiveSheetIndex($contador)->setCellValue('B8', ucwords(strtolower($Estudiante->PrimerApellido . " " . $Estudiante->SegundoApellido)) );
$objPHPExcel->setActiveSheetIndex($contador)->setCellValue('E8', ucwords(strtolower($Estudiante->Nombre)) );
$objPHPExcel->setActiveSheetIndex($contador)->setCellValue('B10',ucwords(strtolower($Estudiante->carrera->NombreCarrera)));
$objPHPExcel->setActiveSheetIndex($contador)->setCellValue('H8', $Estudiante->NumeroDeCuenta);
$objPHPExcel->setActiveSheetIndex($contador)->setCellValue('E10', $practica->PuestoDesempeniar. " / " .$practica->asesor->usuarioEmpresa->NombreEmpresa);
$objPHPExcel->setActiveSheetIndex($contador)->setCellValue('B12', ucwords(strtolower($asesoramiento->usuarioUnitec->PrimerNombrePrimerApellido)));
$objPHPExcel->setActiveSheetIndex($contador)->setCellValue('E12',date("F jS, Y", strtotime($asesoramiento->FechaCreacionAsesoramiento)));

$CantidadLineaPuntos =  strlen($asesoramiento->Comentario) / 103 ; 

//$objPHPExcel->getActiveSheet()->getStyle('H14')->applyFromArray($AlieadoArriba); // aplicando estilo alineado arriba y justificado

// Empezando a Crear Observaciones
if(ceil($CantidadLineaPuntos) == 1){
$filaActual = 15;
}else
{
$filaActual = 14 + ceil($CantidadLineaPuntos);
}

$objPHPExcel->setActiveSheetIndex($contador)->mergeCells('B15:J'. $filaActual); 
$objPHPExcel->getActiveSheet()->getStyle('B15:J'. $filaActual)->getAlignment()->setWrapText(true); 
$objPHPExcel->setActiveSheetIndex($contador)->setCellValue('B15', $asesoramiento->Comentario);
$objPHPExcel->getActiveSheet()->getStyle('B15:J'. $filaActual)->applyFromArray($BordesEncabezado);
// Terminando de Crear Observaciones

// agregando merge de linea en blanco
$filaActual+= 1;
$objPHPExcel->setActiveSheetIndex($contador)->mergeCells('B'. $filaActual .':J'.$filaActual);
$objPHPExcel->getActiveSheet()->getStyle('B'. $filaActual .':J'.$filaActual)->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()->setRGB('ffffff');
$filaActual+= 1;
$objPHPExcel->setActiveSheetIndex($contador)->mergeCells('B'. $filaActual .':J'.$filaActual);
$objPHPExcel->getActiveSheet()->getStyle('B'. $filaActual .':J'.$filaActual)->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()->setRGB('ffffff');
$objPHPExcel->setActiveSheetIndex($contador)->setCellValue('B'.$filaActual, "3._ RECOMENDACIONES | PUNTOS ACORDADOS");
$objPHPExcel->getActiveSheet()->getStyle('B'. $filaActual)->applyFromArray($NegritaTamanioOnce);
$filaActual+= 1;

$fila = $filaActual; // B
$columna = $filaActual; // J
//Empezando a Crear Puntos Acordados
$ParaCrearOutline = $filaActual;
$PuntosAcordados =  explode(",", $asesoramiento->PuntosAcordados); // aqui tengo el arreglo

// ITERACION PARA AGREGAR PUNTOS
foreach ($PuntosAcordados as $punto) {
$CantidadLineaPuntos =  strlen($punto) / 103 ; 

if(ceil($CantidadLineaPuntos) == 1){
$filaActual = $fila;
}else
{
$filaActual = $fila + ceil($CantidadLineaPuntos)-1;
}

$objPHPExcel->setActiveSheetIndex($contador)->mergeCells('B'.$fila.':J'. $filaActual); // Combinando celdas 
// Ajustar texto solo si es cubre más de 2 lineas
if(ceil($CantidadLineaPuntos) != 1){
$objPHPExcel->getActiveSheet()->getStyle('B15:J'. $filaActual)->getAlignment()->setWrapText(true); 
}
// Termino de ajustar texto
$objPHPExcel->setActiveSheetIndex($contador)->setCellValue('B'. $columna, $punto);


$fila = $filaActual+1;
$columna= $filaActual+1;

} // TERMINA ITERACIÓN PARA CREAR PUNTOS ACORDADOS

// Creando Outline
$objPHPExcel->getActiveSheet()->getStyle('B'.$ParaCrearOutline  .':J'. $filaActual)->applyFromArray($BordesEncabezado);
// Pintando en color blanco para que parezca un solo cuadro.
$objPHPExcel->getActiveSheet()->getStyle('B'.$ParaCrearOutline  .':J'. $filaActual)->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()->setRGB('ffffff');
$ParaMerge = $filaActual+1;
$filaActual+= 2;

$objPHPExcel->setActiveSheetIndex($contador)->mergeCells('B'. $ParaMerge .':J'.$filaActual);
$filaActual+= 1;

$objPHPExcel->setActiveSheetIndex($contador)->mergeCells('B'. $filaActual .':E'.$filaActual);
$objPHPExcel->getActiveSheet()->getStyle('B'. $filaActual)->applyFromArray($NegritaTamanioOnce);
$objPHPExcel->setActiveSheetIndex($contador)->setCellValue('B'. $filaActual, " FIRMA DEL ASESOR - ". ucwords(strtolower($asesoramiento->usuarioUnitec->PrimerNombrePrimerApellido)));
$objPHPExcel->setActiveSheetIndex($contador)->mergeCells('F'. $filaActual .':J'.$filaActual);
$objPHPExcel->getActiveSheet()->getStyle('F'. $filaActual)->applyFromArray($NegritaTamanioOnce);
$objPHPExcel->setActiveSheetIndex($contador)->setCellValue('F'. $filaActual, " FIRMA DEL ESTUDIANTE - ". ucwords(strtolower($Estudiante->NombreCompleto)));
$objPHPExcel->getActiveSheet()->getStyle('B'. $filaActual .':J'.$filaActual)->applyFromArray($TodosLosBordes);

$filaActual+= 1; 
$filaActual2= $filaActual +2 ;

// Pintando en color blanco para que parezca un solo cuadro.
$objPHPExcel->getActiveSheet()->getStyle('B'.$filaActual   .':J'. $filaActual2)->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()->setRGB('ffffff');

$objPHPExcel->setActiveSheetIndex($contador)->mergeCells('B'. $filaActual .':E'.$filaActual2);
$objPHPExcel->setActiveSheetIndex($contador)->mergeCells('F'. $filaActual .':J'.$filaActual2);
$objPHPExcel->getActiveSheet()->getStyle('B'. $filaActual .':J'.$filaActual2)->applyFromArray($TodosLosBordes);




$cantidad -=1; //  La que tiene la cantidad de asesoramientos
$contador +=1; // Para activar la ultima sheet creada
$objPHPExcel->setActiveSheetIndex(0); // Cuando termino de escribir pongo activa el formato para que se copie

}
$objPHPExcel->removeSheetByIndex(0);
}

}                             



 
// Redirect output to a clientâ€™s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename= Registro de Asesoramiento.xls');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
 
// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');



      Yii::app()->end();

}


public function actionExcelDDC(){
date_default_timezone_set('America/Tegucigalpa');


if(isset($_GET['Estudiante'],$_GET['Practica'] )){



$IdEstudiante = $_GET['Estudiante'];
$IdPractica = $_GET['Practica'];

$Estudiante = UsuarioEstudiante::model()->findByPk($IdEstudiante);
$PracticaProfesional = PracticaProfesional::model()->findByPk($IdPractica);

 Yii::import('ext.phpexcel.XPHPExcel');    
      $objPHPExcel= XPHPExcel::createPHPExcel();
      $objPHPExcel->getProperties()->setCreator("Henry Arévalo")
                             ->setLastModifiedBy("Henry Arévalo")
                             ->setTitle("Sistema de Gestión de Prácticas Profesionales")
                             ->setSubject("UNITEC")
                             ->setDescription("SGPP")
                             ->setKeywords("HAF")
                             ->setCategory("SGPP");
$objPHPExcel->getActiveSheet()
    ->getPageMargins()
    ->setTop(0.50)
    ->setRight(0.25)
    ->setLeft(0.25)
    ->setBottom(0.50);

// Bordes 
    $BordesEncabezado = array(
    'borders' => array(
        'outline' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,

        ),
    ),
);


// Agregando imagen
$objDrawingPType = new PHPExcel_Worksheet_Drawing();
$objDrawingPType->setWorksheet($objPHPExcel->setActiveSheetIndex(0));
$objDrawingPType->setName("Pareto By Type");
$objDrawingPType->setPath(Yii::app()->basePath.DIRECTORY_SEPARATOR."../assets/img/logounitec.png");
$objDrawingPType->setCoordinates('H1');
$objDrawingPType->setOffsetX(3);
$objDrawingPType->setOffsetY(0);
$objDrawingPType->setWidthAndHeight(180,90);
$objDrawingPType->setResizeProportional(true);


 // Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Lista de Estudiantes');
 
 // COMBINANDO CELDAS
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('C1:H1'); 
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('C2:H2');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B5:D5'); 

$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B6:D6');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('E6:G6');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('H6:J6');

$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B7:D7');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('E7:G7');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('H7:J7');

$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B8:D8');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('E8:J8');

$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B9:D9');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('F9:G9');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('I9:J9');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B10:J10');

$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B12:J12'); // EMPIEZA EMPRESA INSTITUCIÓN
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B13:J13');

$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B14:G14');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('H14:J14');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B15:G15');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('H15:J15');

$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B16:D16');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('E16:G16');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('H16:J16');

$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B17:D17');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('E17:G17');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('H17:J17');

$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B18:D18');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('E18:G18');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('H18:J18');

$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B19:D19');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('E19:G19');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('H19:J19');

$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B20:J20');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B22:J28');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B29:J29');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B29:J29');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B31:J42');

$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B43:J43');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B45:J46');

$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B49:F49');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B50:F50');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('G49:J49');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('G50:J50');





// APLICANDO BORDES
$objPHPExcel->getActiveSheet()->getStyle('B6:D7')->applyFromArray($BordesEncabezado);
$objPHPExcel->getActiveSheet()->getStyle('E6:G7')->applyFromArray($BordesEncabezado);
$objPHPExcel->getActiveSheet()->getStyle('H6:J7')->applyFromArray($BordesEncabezado);
$objPHPExcel->getActiveSheet()->getStyle('B8:D9')->applyFromArray($BordesEncabezado);
$objPHPExcel->getActiveSheet()->getStyle('E8:J9')->applyFromArray($BordesEncabezado);
$objPHPExcel->getActiveSheet()->getStyle('B12:J13')->applyFromArray($BordesEncabezado);
$objPHPExcel->getActiveSheet()->getStyle('B14:G15')->applyFromArray($BordesEncabezado);
$objPHPExcel->getActiveSheet()->getStyle('H14:J15')->applyFromArray($BordesEncabezado);

$objPHPExcel->getActiveSheet()->getStyle('B16:D17')->applyFromArray($BordesEncabezado);
$objPHPExcel->getActiveSheet()->getStyle('B18:D19')->applyFromArray($BordesEncabezado);
$objPHPExcel->getActiveSheet()->getStyle('E16:G17')->applyFromArray($BordesEncabezado);
$objPHPExcel->getActiveSheet()->getStyle('E18:G19')->applyFromArray($BordesEncabezado);
$objPHPExcel->getActiveSheet()->getStyle('H16:J17')->applyFromArray($BordesEncabezado);
$objPHPExcel->getActiveSheet()->getStyle('H18:J19')->applyFromArray($BordesEncabezado);
$objPHPExcel->getActiveSheet()->getStyle('B22:J28')->applyFromArray($BordesEncabezado);

$objPHPExcel->getActiveSheet()->getStyle('B31:J42')->applyFromArray($BordesEncabezado);
$objPHPExcel->getActiveSheet()->getStyle('B45:J46')->applyFromArray($BordesEncabezado);

$objPHPExcel->getActiveSheet()->getStyle('B49:F50')->applyFromArray($BordesEncabezado);
$objPHPExcel->getActiveSheet()->getStyle('G49:J50')->applyFromArray($BordesEncabezado);

// FORMATOS DE TEXTO ( SIZE, FONT , BOLD)
$NegritaTamanioCatorce = array('font' => array('bold' => true,'size'=>14),
	'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	)); // Negrita tamaño 14
$NormalTamanioDoce = array('font' => array('bold'=> true,'size'=>12),
	'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	)); // Negrita tamaño 12

$NormalTamanioOnce = array('font' => array('bold'=> true,'size'=>11),
	'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
	)); // Negrita tamaño 12

$NormalTamanioDiez = array('font' => array('bold'=> true,'size'=>10),
	'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
	)); // Negrita tamaño 12

$NormalTamanioNueve = array('font' => array('size'=>9),
	'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
	)); // Negrita tamaño 12

$AlieadoArriba = array('font' => array('bold'=>false),
	'alignment' => array( 'vertical' => PHPExcel_Style_Alignment::VERTICAL_TOP,'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY,
	)); // Negrita Tamaño 12

$Normal = array('font' => array('bold'=>true),
	'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
	)); // Negrita tamaño 12

// ESCRIBIENDO DATOS 
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1',"DESCRIPCIÓN DEL CARGO");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C2',"ESTUDIANTE EN PRÁCTICA PROFESIONAL");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B2',"FO-GR-002");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I4',"FECHA:");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J4', date('Y-m-d'));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B5',"1._DATOS DEL ESTUDIANTE");

$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B6',"APELLIDO(S)");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E6',"NOMBRE(S)");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H6',"NÚMERO DE CUENTA");

$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B8',"CARRERA");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E8',"PERÍODO DE PRÁCTICA");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E9',"DESDE");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H9',"HASTA");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B11',"2._ EMPRESA/INSTITUCIÓN");

$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B12',"NOMBRE");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B14',"COORDINADOR DE PRÁCTICA");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H14',"CARGO");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B16',"DIRECCIÓN");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E16',"CIUDAD");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H16',"TELEFONO");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B18',"FAX");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E18',"E-MAIL");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H18',"WEBSITE");

$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B21',"3._ OBJETIVO DE CARGO");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B30',"4._ RESPONSABILIDADES");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B44',"5._ OBSERVACIONES");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B48',"5._ FIRMAS");

$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B49',"COORDINADOR PRÁCTICA (EMPRESA) - " .  ucwords(strtolower($PracticaProfesional->asesor->NombreCompleto)) );
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G49',"ESTUDIANTE - ". ucwords(strtolower($Estudiante->NombreCompleto)) );

// LLENANDO DATOS CON EL MODELO
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B7', ucwords(strtolower($Estudiante->PrimerApellido ." ". $Estudiante->SegundoApellido )) );
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E7',  ucwords(strtolower($Estudiante->Nombre))  );
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H7', $Estudiante->NumeroDeCuenta);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B9', $Estudiante->carrera->NombreCarrera);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B9', $Estudiante->carrera->NombreCarrera);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B13',  ucwords(strtolower($PracticaProfesional->asesor->usuarioEmpresa->NombreEmpresa)));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B15', ucwords(strtolower($PracticaProfesional->asesor->NombreCompleto)) );
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H15',  ucwords(strtolower($PracticaProfesional->asesor->PuestoEmpresa)));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H17', "Tel: ". $PracticaProfesional->asesor->TelefonoFijo . " Cel: ". $PracticaProfesional->asesor->TelefonoCelular );
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E19', $PracticaProfesional->asesor->CorreoElectronico );
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E19', $PracticaProfesional->asesor->CorreoElectronico );
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H19', $PracticaProfesional->asesor->usuarioEmpresa->SitioWebEmpresa );
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B22', $PracticaProfesional->ObjetivoDelCargo );
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B45', $PracticaProfesional->Observaciones );
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B31', str_replace(",", "  ", $PracticaProfesional->Reponsabilidades)  );

$objPHPExcel->getActiveSheet()->getStyle('B22:J28')->getAlignment()->setWrapText(true); 
$objPHPExcel->getActiveSheet()->getStyle('B45:J46')->getAlignment()->setWrapText(true); 
$objPHPExcel->getActiveSheet()->getStyle('B31:J42')->getAlignment()->setWrapText(true); 






// APLICANDO FORMATO

$objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($NegritaTamanioCatorce);
$objPHPExcel->getActiveSheet()->getStyle('C2')->applyFromArray($NormalTamanioDoce);
$objPHPExcel->getActiveSheet()->getStyle('B2')->applyFromArray($NormalTamanioDoce);
$objPHPExcel->getActiveSheet()->getStyle('I4')->applyFromArray($NormalTamanioOnce);
$objPHPExcel->getActiveSheet()->getStyle('B5')->applyFromArray($NormalTamanioDiez);

$objPHPExcel->getActiveSheet()->getStyle('B6')->applyFromArray($NormalTamanioNueve);
$objPHPExcel->getActiveSheet()->getStyle('E6')->applyFromArray($NormalTamanioNueve);
$objPHPExcel->getActiveSheet()->getStyle('H6')->applyFromArray($NormalTamanioNueve);

$objPHPExcel->getActiveSheet()->getStyle('B8')->applyFromArray($NormalTamanioNueve);
$objPHPExcel->getActiveSheet()->getStyle('E8')->applyFromArray($NormalTamanioNueve);
$objPHPExcel->getActiveSheet()->getStyle('E9')->applyFromArray($NormalTamanioNueve);
$objPHPExcel->getActiveSheet()->getStyle('H9')->applyFromArray($NormalTamanioNueve);
$objPHPExcel->getActiveSheet()->getStyle('B11')->applyFromArray($NormalTamanioDiez);

$objPHPExcel->getActiveSheet()->getStyle('B12')->applyFromArray($NormalTamanioNueve);
$objPHPExcel->getActiveSheet()->getStyle('B14')->applyFromArray($NormalTamanioNueve);
$objPHPExcel->getActiveSheet()->getStyle('H14')->applyFromArray($NormalTamanioNueve);

$objPHPExcel->getActiveSheet()->getStyle('B16')->applyFromArray($NormalTamanioNueve);
$objPHPExcel->getActiveSheet()->getStyle('E16')->applyFromArray($NormalTamanioNueve);
$objPHPExcel->getActiveSheet()->getStyle('H16')->applyFromArray($NormalTamanioNueve);
$objPHPExcel->getActiveSheet()->getStyle('B18')->applyFromArray($NormalTamanioNueve);
$objPHPExcel->getActiveSheet()->getStyle('E18')->applyFromArray($NormalTamanioNueve);
$objPHPExcel->getActiveSheet()->getStyle('H18')->applyFromArray($NormalTamanioNueve);

$objPHPExcel->getActiveSheet()->getStyle('B21')->applyFromArray($NormalTamanioDiez);
$objPHPExcel->getActiveSheet()->getStyle('B30')->applyFromArray($NormalTamanioDiez);
$objPHPExcel->getActiveSheet()->getStyle('B44')->applyFromArray($NormalTamanioDiez);
$objPHPExcel->getActiveSheet()->getStyle('B48')->applyFromArray($NormalTamanioDiez);

$objPHPExcel->getActiveSheet()->getStyle('B49')->applyFromArray($NormalTamanioNueve);
$objPHPExcel->getActiveSheet()->getStyle('G49')->applyFromArray($NormalTamanioNueve);

$objPHPExcel->getActiveSheet()->getStyle('B22')->applyFromArray($AlieadoArriba);
$objPHPExcel->getActiveSheet()->getStyle('B45')->applyFromArray($AlieadoArriba);
$objPHPExcel->getActiveSheet()->getStyle('B31')->applyFromArray($AlieadoArriba);

$objPHPExcel->getActiveSheet()->getStyle('B7')->applyFromArray($Normal);
$objPHPExcel->getActiveSheet()->getStyle('E7')->applyFromArray($Normal);
$objPHPExcel->getActiveSheet()->getStyle('H7')->applyFromArray($Normal);
$objPHPExcel->getActiveSheet()->getStyle('B9')->applyFromArray($Normal);
$objPHPExcel->getActiveSheet()->getStyle('B13')->applyFromArray($Normal);
$objPHPExcel->getActiveSheet()->getStyle('B15')->applyFromArray($Normal);
$objPHPExcel->getActiveSheet()->getStyle('H15')->applyFromArray($Normal);
$objPHPExcel->getActiveSheet()->getStyle('H17')->applyFromArray($Normal);
$objPHPExcel->getActiveSheet()->getStyle('E19')->applyFromArray($Normal);
$objPHPExcel->getActiveSheet()->getStyle('H19')->applyFromArray($Normal);




//COLOREANDO EN BLANCO 
$objPHPExcel->getActiveSheet()->getStyle('B6:J7')->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()->setRGB('ffffff');

$objPHPExcel->getActiveSheet()->getStyle('E6:G7')->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()->setRGB('ffffff');

$objPHPExcel->getActiveSheet()->getStyle('B6:J7')->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()->setRGB('ffffff');   

 $objPHPExcel->getActiveSheet()->getStyle('B8:D9')->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()->setRGB('ffffff');    
    
$objPHPExcel->getActiveSheet()->getStyle('E8:J9')->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()->setRGB('ffffff'); 

    $objPHPExcel->getActiveSheet()->getStyle('B12:J13')->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()->setRGB('ffffff');               

$objPHPExcel->getActiveSheet()->getStyle('B14:G15')->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()->setRGB('ffffff'); 

$objPHPExcel->getActiveSheet()->getStyle('H14:J15')->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()->setRGB('ffffff'); 

$objPHPExcel->getActiveSheet()->getStyle('B16:J19')->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()->setRGB('ffffff');   

 $objPHPExcel->getActiveSheet()->getStyle('B23:J28')->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()->setRGB('ffffff');  

  $objPHPExcel->getActiveSheet()->getStyle('B49:J50')->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()->setRGB('ffffff');     

 // Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


 
// Redirect output to a clientâ€™s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename= Descripción del cargo.xls');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
 
// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
      Yii::app()->end();
}
else
{

$this->redirect(Yii::app()->request->urlReferrer);

}

}

public function actionExcelEPC(){
date_default_timezone_set('America/Tegucigalpa');

if(isset($_GET['Seccion'])){



$IdCurso = $_GET['Seccion'];

$Curso = Curso::model()->findByPk($IdCurso);
$AlumnosPorCurso= AlumnosPorCurso::model()->findAllByAttributes(array('Curso_IdCurso'=>$IdCurso ),array('order'=>'Activo DESC'));	

  Yii::import('ext.phpexcel.XPHPExcel');    
      $objPHPExcel= XPHPExcel::createPHPExcel();
      $objPHPExcel->getProperties()->setCreator("Henry Arévalo")
                             ->setLastModifiedBy("Henry Arévalo")
                             ->setTitle("Sistema de Gestión de Prácticas Profesionales")
                             ->setSubject("UNITEC")
                             ->setDescription("SGPP")
                             ->setKeywords("HAF")
                             ->setCategory("SGPP");

$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_LEGAL);
$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);



 // Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Lista de Estudiantes');
 

// FORMATO DE CELDAS (MERGE)
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B1:M1'); 
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B2:M2'); 

$objPHPExcel->setActiveSheetIndex(0)->mergeCells('C3:D3'); 
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('F3:G3'); 
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('I3:J3'); 
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('L3:M3');

$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B4:M4'); 

$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B5:H5'); 
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('I5:M5'); 

$objPHPExcel->setActiveSheetIndex(0)->mergeCells('C6:D6'); 
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('E6:F6');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('G6:H6'); 

// BORDES 

$BordesEncabezado = array(
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,

        ),
    ),
);

$objPHPExcel->getActiveSheet()->getStyle('B1:M3')->applyFromArray($BordesEncabezado);
$objPHPExcel->getActiveSheet()->getStyle('B5:M6')->applyFromArray($BordesEncabezado);

$objPHPExcel->getActiveSheet()->getStyle('B1:M2')->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()->setRGB('cec8c8');

$objPHPExcel->getActiveSheet()->getStyle('B3')->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()->setRGB('cec8c8');

$objPHPExcel->getActiveSheet()->getStyle('E3')->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()->setRGB('cec8c8');


 $objPHPExcel->getActiveSheet()->getStyle('H3')->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()->setRGB('cec8c8');   

$objPHPExcel->getActiveSheet()->getStyle('K3')->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()->setRGB('cec8c8');      

$objPHPExcel->getActiveSheet()->getStyle('B5:H6')->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()->setRGB('e89b9e');        

$objPHPExcel->getActiveSheet()->getStyle('I5:M6')->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()->setRGB('b1dee0');      



// FORMATOS DE TEXTO ( SIZE, FONT , BOLD)
$styleArray = array('font' => array('bold' => true,'size'=>14),
	'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	)); // Negrita tamaño 14

$NormalTamanioDoce = array('font' => array('size'=>13),
	'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	)); // Normal Tamaño 12

$NegritaTamanioDoce = array('font' => array('bold'=>true,'size'=>12),
	'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	)); // Negrita Tamaño 12

// ESCRITURA DE TEXTO
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1',$Curso->Nombre);    
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B2',"Listado de Estudiantes");
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B5',"	INFORMACIÓN ESTUDIANTE");
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I5',"INFORMCIÓN EMPRESA");

  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B6',"Nº Cuenta");     
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C6',"Nombre Estudiante");     
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E6',"Correo Electrónico");     
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G6',"Carrera");     
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I6',"Empresa");     
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J6',"Jefe");     
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('K6',"Puesto");     
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L6',"Correo");     
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('M6',"Celular");     

    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C3',$Curso->Seccion);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F3',$Curso->Codigo);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I3',$Curso->periodoAcademico->PeriodoConcatenado);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L3',date('Y-m-d H:i:s'));


// APLICANDO FORMATOS 
 $objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($styleArray);                 
 $objPHPExcel->getActiveSheet()->getStyle('B2')->applyFromArray($NormalTamanioDoce);

 $objPHPExcel->getActiveSheet()->getStyle('B3')->applyFromArray($NegritaTamanioDoce);
 $objPHPExcel->getActiveSheet()->getStyle('E3')->applyFromArray($NegritaTamanioDoce);
 $objPHPExcel->getActiveSheet()->getStyle('H3')->applyFromArray($NegritaTamanioDoce);
 $objPHPExcel->getActiveSheet()->getStyle('K3')->applyFromArray($NegritaTamanioDoce);

 $objPHPExcel->getActiveSheet()->getStyle('B5:I5')->applyFromArray($NegritaTamanioDoce);

 $objPHPExcel->getActiveSheet()->getStyle('B6')->applyFromArray($NegritaTamanioDoce);
 $objPHPExcel->getActiveSheet()->getStyle('C6')->applyFromArray($NegritaTamanioDoce);
 $objPHPExcel->getActiveSheet()->getStyle('E6')->applyFromArray($NegritaTamanioDoce);
 $objPHPExcel->getActiveSheet()->getStyle('G6')->applyFromArray($NegritaTamanioDoce);
 $objPHPExcel->getActiveSheet()->getStyle('I6')->applyFromArray($NegritaTamanioDoce);
 $objPHPExcel->getActiveSheet()->getStyle('J6')->applyFromArray($NegritaTamanioDoce);
 $objPHPExcel->getActiveSheet()->getStyle('K6')->applyFromArray($NegritaTamanioDoce);
 $objPHPExcel->getActiveSheet()->getStyle('L6')->applyFromArray($NegritaTamanioDoce);
 $objPHPExcel->getActiveSheet()->getStyle('M6')->applyFromArray($NegritaTamanioDoce);
 $objPHPExcel->getActiveSheet()->getStyle('C3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B3', 'Sección:')
            ->setCellValue('E3', 'Código:')
            ->setCellValue('H3', 'Periodo:')
            ->setCellValue('K3', 'Emitido:');
 

// RECORRIENDO MODELO CON LOS ESTUDIANTES 



$contador = 7;
foreach ($AlumnosPorCurso as $Alumno ) {
$PracticasPorAlumno = PracticasPorAlumno::model()->findAllByAttributes(array('UsuarioEstudiante_IdUsuarioEstudiante'=> $Alumno->userEstudiante->IdUsuarioEstudiante,'Curso_IdCurso'=>$IdCurso ));	         
if($Alumno->userEstudiante->Activo == 1){
foreach($PracticasPorAlumno as $practica){

	$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('I'.$contador, $practica->practica->asesor->usuarioEmpresa->NombreEmpresa)
            ->setCellValue('J'.$contador, $practica->practica->asesor->NombreCompleto)
            ->setCellValue('K'.$contador, $practica->practica->asesor->PuestoEmpresa)
            ->setCellValue('L'.$contador, $practica->practica->asesor->CorreoElectronico)
            ->setCellValue('M'.$contador, $practica->practica->asesor->TelefonoCelular);
}


$objPHPExcel->setActiveSheetIndex(0)->mergeCells('C'.$contador.':D'.$contador);	
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('E'.$contador.':F'.$contador);	
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('G'.$contador.':H'.$contador);	
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B'.$contador, $Alumno->userEstudiante->NumeroDeCuenta) 
            ->setCellValue('C'.$contador, $Alumno->userEstudiante->NombreCompleto)
            ->setCellValue('E'.$contador, $Alumno->userEstudiante->Email)
            ->setCellValue('G'.$contador, $Alumno->userEstudiante->carrera->NombreCarrera);
$contador+=1;            
}
}
$contador-=1;

$objPHPExcel->getActiveSheet()->getStyle('B7:M'.$contador)->applyFromArray($BordesEncabezado);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(12);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(27);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(23);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(18);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(18);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(18);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(18);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(12);
 
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


 
// Redirect output to a clientâ€™s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename= Lista de Estudiantes - ' . $Curso->Nombre .'.xls');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
 
// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
      Yii::app()->end();
}
else
{
	$this->redirect(Yii::app()->request->urlReferrer);
}
}




	public function actionVerificarPractica(){

		
		$Practica = PracticaProfesional::model()->findByPk($_POST['Practica']);
		$Practica->Activo = 1;
		 if($Practica->save()){
		 	Yii::app()->user->setFlash("success","<strong>Excelente!</strong> La práctica ha sido verificada");
		 	$this->redirect(array('UsuarioUnitec/detallePractica', 'Cor'=>$_POST['Practica']));

		 }


	}


	public function actionverAsesoramientos(){


	$model = AsesoramientoAlumno::model()->findAllByAttributes(array('Curso_IdCurso'=>$_GET['curso'] ,'UsuarioEstudiante_IdUsuarioEstudiante' =>$_GET['Estudiante'] , 'PracticaProfesional_IdPracticaProfesional'=>$_GET['Practica']  ),array('order'=>'FechaCreacionAsesoramiento DESC'));	
	$Estudiante = UsuarioEstudiante::model()->findByPk($_GET['Estudiante']);	
	$Practica = PracticaProfesional::model()->findByPk($_GET['Practica']);
		
		

			$this->render('verAsesoramientos',array(
				'model'=>$model,
				'Estudiante'=> $Estudiante,
				'Practica'=> $Practica,
				'CantidadAsesoramientos'=> count($model),
				'Curso'=> $_GET['curso']
		));


	}

public function actionCrearNuevoAsesoramiento(){

$model = new AsesoramientoAlumno;
$model->UsuarioUnitec_IdUsuarioUnitec = Yii::app()->user->getId();
$model->Curso_IdCurso = $_POST['IdCurso'];
$model->UsuarioEstudiante_IdUsuarioEstudiante = $_POST['IdEstudiante'] ;
$model->PuntosAcordados = $_POST['asesoramiento'];
$model->Comentario = $_POST['comentarios'];
$model->PracticaProfesional_IdPracticaProfesional = $_POST['IdPracticaProfesional'];
$model->FechaCreacionAsesoramiento = date('Y-m-d H:i:s');
if($model->save())
{
$this->redirect(array('UsuarioUnitec/VerAsesoramientos', 'curso'=>$_POST['IdCurso'], 'Practica'=>$_POST['IdPracticaProfesional'], 'Estudiante'=>$_POST['IdEstudiante'] ));

}

}

public function actionactualizarDatosAsesoramiento(){
$model = AsesoramientoAlumno::model()->findByPk($_POST['IdAsesoramiento']);
$practica = PracticaProfesional::model()->findbyPk($model->PracticaProfesional_IdPracticaProfesional);

if(isset($_POST['comentarios'],$_POST['asesoramiento'])){
$model->Comentario = $_POST['comentarios'];
$model->PuntosAcordados = $_POST['asesoramiento'];
if($model->save()){
Yii::app()->user->setFlash("success","<strong>Excelente!</strong> El registro de asesoramiento ha sido actualizado, se ha enviado un correo electrónico al estudiante.");
 $this->redirect(array('UsuarioUnitec/VerAsesoramientos','curso'=> $model->Curso_IdCurso,'Practica'=>$model->PracticaProfesional_IdPracticaProfesional,'Estudiante'=>$model->UsuarioEstudiante_IdUsuarioEstudiante));

}
 
}
else
{
	 Yii::app()->user->setFlash("warning","<strong>Oh-Oh!</strong> Algunos campos estabán vacios");
}
print_r($_POST);


}



public function actioneditarAsesoramiento(){


$model = AsesoramientoAlumno::model()->findByPk($_GET['As']);

$practica = PracticaProfesional::model()->findbyPk($model->PracticaProfesional_IdPracticaProfesional);


		$this->render('editarAsesoramiento',array(

		'model'  => $model ,
		'practica'  => $practica ,
		

		));

}


public function actioncrearAsesoramiento(){
date_default_timezone_set('America/Tegucigalpa');

		$practica = PracticaProfesional::model()->findbyPk($_GET['Practica']);
		$model= new AsesoramientoAlumno;
		$model->Curso_IdCurso =  $_GET['curso'];
		$model->UsuarioEstudiante_IdUsuarioEstudiante =$_GET['Estudiante'] ;

		$this->render('crearAsesoramiento',array(

		'practica'  => $practica ,
		'model'  => $model ,

		));

}

public function actionEliminarVinculacion(){
 $practica = PracticaProfesional::model()->findByPk($_POST['Practica']);
 $registros =  PracticasPorAlumno::model()->findAllByAttributes(array('PracticaProfesional_IdPracticaProfesional'=>$practica->IdPracticaProfesional, 'UsuarioEstudiante_IdUsuarioEstudiante'=>$practica->UsuarioEstudiante_IdUsuarioEstudiante, 'Curso_IdCurso'=>$practica->Curso_IdCurso)); 

 	foreach($registros as $registro){
	$registro->delete();
	}

 $practica->UsuarioEstudiante_IdUsuarioEstudiante = 0;
 $practica->VinculadoPor = "" ;
 $practica->FechaVinculacion = "";
 $practica->Curso_IdCurso = "";
 $practica-> save();
  Yii::app()->user->setFlash("success","<strong>Excelente! </strong> La vinculación con la Práctica Profesional ha sido eliminada exitosamente.");
 $this->redirect(Yii::app()->request->urlReferrer);
}

public function actionVincularAlumnoConPractica(){
date_default_timezone_set('America/Tegucigalpa');

if(!empty($_POST['Practica'])){
	$registro = new PracticasPorAlumno; 
	$practica = PracticaProfesional::model()->findByPk($_POST['Practica']);
	$registro->PracticaProfesional_IdPracticaProfesional = $_POST['Practica'] ;
	$registro->UsuarioEstudiante_IdUsuarioEstudiante = $_POST['Alumno'] ;
	$registro->Curso_IdCurso = $_POST['Cursos'] ;
	$registro->UsuarioUnitec_IdUsuarioUnitec = Yii::app()->user->getId();
	$registro->Activo =1;
	$registro->FechaCreacion = date('Y-m-d H:i:s');
	//Asignando el estudiante que tiene la práctica
	$practica->UsuarioEstudiante_IdUsuarioEstudiante = $_POST['Alumno'];
	$practica->VinculadoPor = Yii::app()->user->name;
	$practica->FechaVinculacion = date('Y-m-d');
	$practica->Curso_IdCurso = $_POST['Cursos'];
	$practica-> save();
	// termino de asignar
	$registro->save();
     Yii::app()->user->setFlash("success","<strong>Excelente!</strong> El estudiante ha sido vinculado con la práctica profesional exitosamente.");
	$this->redirect(Yii::app()->request->urlReferrer);}


}







public function actionListaAlumnosPorCurso()
{

$Alumnos = AlumnosPorCurso::model()->findAllByAttributes(array('Curso_IdCurso'=>$_POST['Cursos']));
foreach ($Alumnos as $lista ) {
$PracticasPorEstudiante = PracticasPorAlumno::model()->findAllByAttributes(array('UsuarioEstudiante_IdUsuarioEstudiante'=>$lista->UsuarioEstudiante_IdUsuarioEstudiante,'Curso_IdCurso'=>$lista->Curso_IdCurso));
if(count($PracticasPorEstudiante) == 0){
$temporal = UsuarioEstudiante::model()->findByPk($lista->UsuarioEstudiante_IdUsuarioEstudiante);
 echo "<option value=\"{$temporal->IdUsuarioEstudiante}\"> {$temporal->NombreCompleto }</option>";
}
}

}


	public function actionDetallePractica(){
		$this->layout='PracticasAsesorUnitec';

		$Practica = PracticaProfesional::model()->findByPk($_GET['Cor']);
	

		$this->render('detallePractica',array(
		'Practica'=>$Practica,

		));


	}


public function actionresultadoBusquedaPP(){
$this->layout='SearchFilterUnitec';


 
 	if(empty($_POST['Empresas'])){

 	

	$criteria = new CDbCriteria;  
	$criteria->addInCondition('Carrera_IdCarrera',array($_POST['Carrera']));
	$criteria->group ='UsuarioEmpresa_IdUsuarioEmpresa';	
	// Empieza filtro para que no aparezcan carreras que ya vencieron 
	$criteria->with = 'practica' ;
	$criteria->compare('practica.Activo',1,false);
    $criteria->compare('practica.UsuarioEstudiante_IdUsuarioEstudiante',0,false);
	$now = new CDbExpression("NOW()");
	$criteria->addCondition('practica.FechaVencimientoPlaza > '.$now);
	// aqui termina
	$Empresas = CarrerasPorPractica::model()->findAll($criteria);

	$criteria = new CDbCriteria;  
	$criteria->addInCondition('Carrera_IdCarrera',array($_POST['Carrera'])); 
	// Empieza filtro para que no aparezcan carreras que ya vencieron 
	$criteria->with = 'practica' ;
	$criteria->compare('practica.Activo',1,false);
    $criteria->compare('practica.UsuarioEstudiante_IdUsuarioEstudiante',0,false);
	$now = new CDbExpression("NOW()");
	$criteria->addCondition('practica.FechaVencimientoPlaza > '.$now);
	// aqui termina
	$Practicas = CarrerasPorPractica::model()->findAll($criteria);

 	}else {

	$criteria = new CDbCriteria;  
	$criteria->addInCondition('Carrera_IdCarrera',array($_POST['Carrera'])); 
	$criteria->addInCondition('UsuarioEmpresa_IdUsuarioEmpresa',$_POST['Empresas']); 
	// Empieza filtro para que no aparezcan carreras que ya vencieron 
	$criteria->with = 'practica' ;
	$criteria->compare('practica.Activo',1,false);
    $criteria->compare('practica.UsuarioEstudiante_IdUsuarioEstudiante',0,false);
	$now = new CDbExpression("NOW()");
	$criteria->addCondition('practica.FechaVencimientoPlaza > '.$now);
	// aqui termina
	$Practicas = CarrerasPorPractica::model()->findAll($criteria);

	$criteria = new CDbCriteria;  
	$criteria->addInCondition('Carrera_IdCarrera',array($_POST['Carrera']));
	$criteria->addInCondition('UsuarioEmpresa_IdUsuarioEmpresa',$_POST['Empresas']);
	$criteria->group ='UsuarioEmpresa_IdUsuarioEmpresa';
	// Empieza filtro para que no aparezcan carreras que ya vencieron 
	$criteria->with = 'practica' ;
	$criteria->compare('practica.Activo',1,false);
    $criteria->compare('practica.UsuarioEstudiante_IdUsuarioEstudiante',0,false);
	$now = new CDbExpression("NOW()");
	$criteria->addCondition('practica.FechaVencimientoPlaza > '.$now);
	// aqui termina
	$Empresas = CarrerasPorPractica::model()->findAll($criteria);
	}



$this->render('resultadoBusquedaPP',array(
			'Practicas'=>$Practicas,
			'Empresas'=>$Empresas,
		));

}	


public function actionresultadoBusquedaPPFiltro(){
$this->layout='SearchFilterUnitec';


 
 	if(empty($_POST['Empresas']))
 	{

	 	if(in_array($_GET['Busqueda'], UsuarioUnitec::model()->CarrerasPorJefe2()))
	 	{
	 		
		 	$criteria = new CDbCriteria;  
			$criteria->with = 'practica' ;
			$criteria->addInCondition('Carrera_IdCarrera',array($_GET['Busqueda']));
			$criteria->compare('practica.Activo',1,false);
            $criteria->compare('practica.UsuarioEstudiante_IdUsuarioEstudiante',0,false);
			$criteria->group ='UsuarioEmpresa_IdUsuarioEmpresa';
			// Empieza filtro para que no aparezcan carreras que ya vencieron 
			$criteria->with = 'practica' ;
			$now = new CDbExpression("NOW()");
			$criteria->addCondition('practica.FechaVencimientoPlaza > '.$now);
			// aqui termina
			$Empresas = CarrerasPorPractica::model()->findAll($criteria);

			$criteria = new CDbCriteria;  
			$criteria->with = 'practica' ;
			$criteria->addInCondition('Carrera_IdCarrera',array($_GET['Busqueda'])); 
			$criteria->compare('practica.Activo',1,false);
            $criteria->compare('practica.UsuarioEstudiante_IdUsuarioEstudiante',0,false);
			// Empieza filtro para que no aparezcan carreras que ya vencieron 
			$criteria->with = 'practica' ;
			$now = new CDbExpression("NOW()");
			$criteria->addCondition('practica.FechaVencimientoPlaza > '.$now);
			// aqui termina
			$Practicas = CarrerasPorPractica::model()->findAll($criteria);
	 		
	 	}	

	 	else
	 	{
		     Yii::app()->user->setFlash("warning","<strong>Algo anda mal! </strong> Parece que esta buscando por una carrera de la cual usted no es Jefe Académico.");
		 	 $this->redirect(array('UsuarioUnitec/ViculacionAlumnosPracticas'));
		}

	}
	else {

		 	if(in_array($_GET['Busqueda'], UsuarioUnitec::model()->CarrerasPorJefe2()))
		 	{

				$criteria = new CDbCriteria;  
				$criteria->with = 'practica' ;
				$criteria->addInCondition('Carrera_IdCarrera',array($_GET['Busqueda'])); 
				$criteria->addInCondition('UsuarioEmpresa_IdUsuarioEmpresa',$_POST['Empresas']); 
				$criteria->compare('practica.Activo',1,false);
                $criteria->compare('practica.UsuarioEstudiante_IdUsuarioEstudiante',0,false);
				// Empieza filtro para que no aparezcan carreras que ya vencieron 
				$criteria->with = 'practica' ;
				$now = new CDbExpression("NOW()");
				$criteria->addCondition('practica.FechaVencimientoPlaza > '.$now);
				// aqui termina
				$Practicas = CarrerasPorPractica::model()->findAll($criteria);

				$criteria = new CDbCriteria;  
				$criteria->with = 'practica' ;
				$criteria->addInCondition('Carrera_IdCarrera',array($_GET['Busqueda']));
				$criteria->addInCondition('UsuarioEmpresa_IdUsuarioEmpresa',$_POST['Empresas']);
				$criteria->compare('practica.Activo',1,false);
                $criteria->compare('practica.UsuarioEstudiante_IdUsuarioEstudiante',0,false);
				$criteria->group ='UsuarioEmpresa_IdUsuarioEmpresa';
				// Empieza filtro para que no aparezcan carreras que ya vencieron 
				$criteria->with = 'practica' ;
				$now = new CDbExpression("NOW()");
				$criteria->addCondition('practica.FechaVencimientoPlaza > '.$now);
				// aqui termina
				$Empresas = CarrerasPorPractica::model()->findAll($criteria);

		 	}
		 	else
		 	{
			    Yii::app()->user->setFlash("warning","<strong>Algo anda mal! </strong> Parece que esta buscando por una carrera de la cual usted no es Jefe Académico.");
			 	$this->redirect(array('UsuarioUnitec/ViculacionAlumnosPracticas'));
			}
	}



$this->render('resultadoBusquedaPP',array(
			'Practicas'=>$Practicas,
			'Empresas'=>$Empresas,
		));

}	




public function actionViculacionAlumnosPracticas(){
$this->layout='mainVincularPracticasUnitec';
$Criteria = new CDbCriteria();
//$Criteria->limit = 24;
$Criteria->order = 'NombreCarrera ASC';
$Criteria->addInCondition('IdCarrera',UsuarioUnitec::model()->CarrerasPorJefe2());
$Carreras = Carrera::model()->findAll($Criteria);

$divisor = count($Carreras );

$this->render('BuscarPP',array(
			'Carreras'=>$Carreras,
			'divisor'=>$divisor,
		));



}

	public function actionSubirImagen()
	{
		
		$model = UsuarioUnitec::model()->findByPk(Yii::app()->user->getId());

        	
       if(isset($_POST['UsuarioUnitec']['Imagen']))
        {
        	$rnd = rand(1, 999999999999999999); // creando numero random para evitar que se dupliquen nombres de archivos
            $model->Imagen= $_POST['UsuarioUnitec']['Imagen']; 
            
            // verificamos que la foto este ahi, le quitamos los  espacios y la concatenamos con un numero random + el id de la persona logueada + nombre de la imagen
            if (CUploadedFile::getInstance($model,'Imagen')) {
            	$model->Imagen= CUploadedFile::getInstance($model,'Imagen');
            	$newfname = $rnd  . Yii::app()->user->getId() . preg_replace('/\s+/', '', $model->Imagen) ;
            	$model->Imagen->saveAs(Yii::app()->params['basePath'].'banner/'. $newfname );
            	$model->Imagen = $newfname;
            }

            if($model->save())
            {
               
                Yii::app()->user->setFlash("success","<strong>Exito!</strong> Su foto de perfil ha sido actualizada exitosamente");
                	$this->redirect(array('UsuarioUnitec/Perfil'));
            }
        }
        
           Yii::app()->user->setFlash("warning","<strong>Cuidado!</strong> La foto necesita cuadrada y menor a 600 kb");
           $this->redirect(array('UsuarioUnitec/editarPerfil'));
 

	}


public function actionMisAlumnos(){


$Companieros = AlumnosPorCurso::model()->findAllByAttributes(array('Curso_IdCurso'=>$_GET['Seccion']),array('order'=>'Activo DESC'));
$IdCurso = $_GET['Seccion'];



			$this->render('misAlumnos',array(
			'Companieros'=>$Companieros,
			'IdCurso'=>$IdCurso,
			
		));

}




public function actionMatricularAlumnosEnMasa()
{

date_default_timezone_set('America/Tegucigalpa');
$string = preg_replace('/\s+/', '', $_POST['name']);	
$ArrayEstudiantes = explode(",", $string);

$NombresAlumnosExitosos ="";
$NombresAlumnosFallidos ="";

$curso = $_POST['CursosPorCarrera'];

foreach ($ArrayEstudiantes as $estudiante) {

$VerificarMatricula = AlumnosPorCurso::model()->findAllByAttributes(array('UsuarioEstudiante_IdUsuarioEstudiante'=>$estudiante,'Curso_IdCurso'=>$curso) );

if($VerificarMatricula == null){

$Estudiante = UsuarioEstudiante::model()->findByPk($estudiante);
$NombresAlumnosExitosos .= $Estudiante->NombreCompleto . ", ";

$registro = new AlumnosPorCurso;
$registro->UsuarioEstudiante_IdUsuarioEstudiante = $estudiante;
$registro->Curso_IdCurso = $curso ;
$registro->Activo = 1;
$registro->CreadoPor = Yii::app()->user->name;
$registro->FechaCreacion = date('Y-m-d H:i:s');



$registro->save();
}
else{
	$Estudiante = UsuarioEstudiante::model()->findByPk($estudiante);
$NombresAlumnosFallidos  .= $Estudiante->NombreCompleto . ", ";

}


}

if($NombresAlumnosExitosos != null){
Yii::app()->user->setFlash("success","<strong>Excelente! </strong> Los estudiantes " .substr($NombresAlumnosExitosos, 0, -2) . " han sido matriculados exitosamente" );}

if($NombresAlumnosFallidos != null){
Yii::app()->user->setFlash("warning","<strong>Oh-Oh! </strong> Los estudiantes " .substr($NombresAlumnosFallidos, 0, -2) . "  ya estaban matriculados en este curso previamente" );}

$this->redirect(Yii::app()->request->urlReferrer);

}


	public function actionCargarCursosPorCarrera()
{

$list = CarrerasPorCurso::model()->findAll("Carrera_IdCarrera=?",array($_POST['Carrera']));

foreach ($list as $lista ) {
 $temporal = Curso::model()->findByPk($lista->Curso_IdCurso);
 if($temporal->Activo ==1){
 echo "<option value=\"{$temporal->IdCurso}\"> {$temporal->CursoCompleto2 }</option>";
 }
}


}	

public function actionmatricularAlumnos(){

	

	$modelEstudiantes    =new UsuarioEstudiante('BusquedaAlumnosActivos');

	$modelAlumnosPorCurso    =new AlumnosPorCurso('BusquedaAlumnosPorCurso');
	
	$todosLosEstudiantes = new UsuarioEstudiante('TodosLosEstudiantes');

	$modelEstudiantes->unsetAttributes();
	$modelAlumnosPorCurso->unsetAttributes();
	$todosLosEstudiantes->unsetAttributes();


	if(isset($_GET['UsuarioEstudiante'])){
			$modelEstudiantes->attributes    =$_GET['UsuarioEstudiante'];
			}
			else{
				$modelEstudiantes->Carrera_IdCarrera =-1;

			}

		if(isset($_GET['AlumnosPorCurso'])){
			$modelAlumnosPorCurso->attributes    =$_GET['AlumnosPorCurso'];
			}
			else{
				
			}

		if(isset($_GET['UsuarioEstudiante'])){
			$todosLosEstudiantes->attributes    =$_GET['UsuarioEstudiante'];
			}
			else{
				
			}


		$this->render('matricularAlumnos',array(
			'modelEstudiantes'=>$modelEstudiantes,
			'modelAlumnosPorCurso'=>$modelAlumnosPorCurso,
			'todosLosEstudiantes'=>$todosLosEstudiantes,
		));


}


public function actionmisCursos(){

			$Cursos =  Curso::model()->findAllByAttributes(array('UsuarioUnitec_IdUsuarioUnitec'=>Yii::app()->user->getId(),'Activo'=>1) );	
			$this->render('misCursos',array(
			'Cursos'=>$Cursos,
			));



}


public function actionActualizarEstadoCarreraPorUsuario(){

	date_default_timezone_set('America/Tegucigalpa');
	$Curso = CarreraPorUsuarioUnitec::model()->findByPk($_POST['pk']);
	$Curso->Activo=1;
	$Curso->Save();

}	


public function actionEnviarSolicitudAsesor()
{	
		// $criteria = new CDbCriteria;  
		// $criteria->condition('UsuarioUnitec_IdUsuarioUnitec',Yii::app()->user->getId()); 
		// $criteria->condition('Carrera_IdCarrera',$_POST['Carrera'] ); 
		// $criteria->condition('TipoUsuarioUnitec_IdTipoUsuarioUnitec',$_POST['TipoUsuarioUnitec'] );
		
		$Existe = CarreraPorUsuarioUnitec::model()->findAllByAttributes(array('UsuarioUnitec_IdUsuarioUnitec'=>Yii::app()->user->getId(),'Carrera_IdCarrera'=>$_POST['Carrera'],'TipoUsuarioUnitec_IdTipoUsuarioUnitec'=>$_POST['TipoUsuarioUnitec']) );
		
		
		if($Existe == null){
		if(isset($_POST['Carrera'],$_POST['TipoUsuarioUnitec']))
		{
		$HayAlgo = CarreraPorUsuarioUnitec::model()->findAllByAttributes(array('UsuarioUnitec_IdUsuarioUnitec'=>Yii::app()->user->getId(),'Carrera_IdCarrera'=> $_POST['Carrera']));
		if(!empty($HayAlgo))
		{
			
			$Solicitud = new CarreraPorUsuarioUnitec;

			$Solicitud->UsuarioUnitec_IdUsuarioUnitec = Yii::app()->user->getId();
			$Solicitud->Carrera_IdCarrera = $_POST['Carrera'];
			$Solicitud->Rol_IdRol=1;
			$Solicitud->Activo =0;
			$Solicitud->TipoUsuarioUnitec_IdTipoUsuarioUnitec = $_POST['TipoUsuarioUnitec'];
			if($Solicitud->save()){
			CarreraPorUsuarioUnitec::model()->borrarRegistro($HayAlgo[0]->IdCarreraPorUsuarioUnitec);
			Yii::app()->user->setFlash("success","<strong>Excelente! </strong>  Se ha enviado la solicitud. ");
			$this->redirect(Yii::app()->request->urlReferrer);
			}

		}
		else

		{			
			$Solicitud = new CarreraPorUsuarioUnitec;
			$Solicitud->UsuarioUnitec_IdUsuarioUnitec = Yii::app()->user->getId();
			$Solicitud->Carrera_IdCarrera = $_POST['Carrera'];
			$Solicitud->Rol_IdRol=1;
			$Solicitud->Activo =0;
			$Solicitud->TipoUsuarioUnitec_IdTipoUsuarioUnitec = $_POST['TipoUsuarioUnitec'];
			if($Solicitud->save()){
			Yii::app()->user->setFlash("success","<strong>Excelente! </strong>  Se ha enviado la solicitud. ");
			$this->redirect(Yii::app()->request->urlReferrer);
			}
		}

		
		} 
		

		Yii::app()->user->setFlash("danger","<strong>Oh-Oh! </strong> Usted no selecciono la CARRERA o el ROL");
		$this->redirect(Yii::app()->request->urlReferrer);

		}

		Yii::app()->user->setFlash("danger","<strong>Oh-Oh! </strong> Ya has enviado una solicitud igual, si aún no ha sido aprobada comunicate con el Jefe Académico de la carrera. <strong> La paciencia es una virtud</strong>");
		$this->redirect(Yii::app()->request->urlReferrer);

		
}


// para llenar el combo de asesores por carrera 
	// este metodo es N^3 , tengo que mejorar el tiempo



public function actionActualizarCarrerasPorCurso()
{
	

	if($_POST['name'] != ""){
	$filas = CarrerasPorCurso::model()->findAll("Curso_IdCurso=?",array($_POST['name']));	

	foreach($filas as $asesor){

	$asesor->delete();

	}

	$curso = Curso::model()->findByPk($_POST['name']);

	$curso->UsuarioUnitec_IdUsuarioUnitec = $_POST['AsesorCurso2'];

	$curso->save();

	$cantidadCarreras = count($_POST['Carreras2']);

	  for ($i = 0; $i < $cantidadCarreras; $i++){
			  	$carreraTemp = new CarrerasPorCurso;
			  	$carreraTemp->Carrera_IdCarrera=$_POST['Carreras2'][$i];
			  	$carreraTemp->Curso_IdCurso= $_POST['name']; 
			  	$carreraTemp->save();
	}

	

	Yii::app()->user->setFlash("success","<strong>Excelente! </strong> Carreras actualizadas exitosamente. <strong> Para verificar puede ingresar a la pestaña CARRERAS X CURSO </strong>");
	$this->redirect(Yii::app()->request->urlReferrer);


	}
	else {

	Yii::app()->user->setFlash("danger","<strong>Oh-Oh! </strong> Usted no selecciono ningun CURSO. <strong> Para actualizar las carreras  de un curso seleccione el curso y luego presione el botón MODIFICICAR CARRERA </strong>");
	$this->redirect(Yii::app()->request->urlReferrer);
}

}	




public function actionAsesoresPorCarrera()
	{
		if(isset($_POST['Carreras'])){
		
		$criteria = new CDbCriteria;  
		$criteria->addInCondition('Carrera_IdCarrera', $_POST['Carreras']); 
		$criteria->group ='UsuarioUnitec_IdUsuarioUnitec';

		
		$list = CarreraPorUsuarioUnitec::model()->findAll($criteria);

		$cantidadAseosres = count($list);  // eso es por que filtramos por grupo y solamente pasa los asesores que tienen esos codigos de carrera
		$cantidadCarreras = count($_POST['Carreras']);



		 // echo "<option value=\"{$cantidadAseosres}\"> {Cantidad  de Asesores $cantidadAseosres}</option>";
		 // echo "<option value=\"{$cantidadCarreras}\"> {Cantidad  de Carreras $cantidadCarreras}</option>";


		// accediendo a las usuarios que cumplen con al menos una de las carreras 
		foreach($list as $asesor){
		
			  // echo "<option value=\"{$asesor->UsuarioUnitec_IdUsuarioUnitec}\"> {Codigo de Asesor:  $asesor->UsuarioUnitec_IdUsuarioUnitec}</option>";
			$criteria2 = new CDbCriteria;  
			$criteria2->compare('UsuarioUnitec_IdUsuarioUnitec',$asesor->UsuarioUnitec_IdUsuarioUnitec,false);
			$criteria2->compare('Activo',1,false);

			  $FilasAsesorActual = CarreraPorUsuarioUnitec::model()->findAll($criteria2);	
			  $check = 0 ;

			  for ($i = 0; $i < $cantidadCarreras; $i++){
			  	
			  	 foreach($FilasAsesorActual as $fila)
				{
					$temp = $_POST['Carreras'][$i];
					  // echo "<option value=\"{$asesor->UsuarioUnitec_IdUsuarioUnitec}\"> {Cod Asesor : $asesor->UsuarioUnitec_IdUsuarioUnitec Comparando Carrera : $temp  con  $fila->Carrera_IdCarrera }</option>";

					if($temp  == $fila->Carrera_IdCarrera){
						$check ++ ;
						// echo "<option value=\"{$asesor->UsuarioUnitec_IdUsuarioUnitec}\"> {Encontro uno  valor de check es $check}</option>";
					}


					// carreras por asesor 
				// echo "<option value=\"{$fila->UsuarioUnitec_IdUsuarioUnitec}\"> {Carrera de Asesor: $fila->UsuarioUnitec_IdUsuarioUnitec es :   $fila->Carrera_IdCarrera}</option>";
						
				}	  
					

				}

				


				if(intval($check) == intval($cantidadCarreras) ){
					$usuarioTemp= $asesor->userUnitec->Nombre ;

					echo "<option value=\"{$asesor->UsuarioUnitec_IdUsuarioUnitec}\"> {$asesor->userUnitec->PrimerNombrePrimerApellido }</option>";
				}
			
				/*$tempDeCantidadCarrera =  $cantidadCarrera +1;
				 echo "<option value=\"{$asesor->UsuarioUnitec_IdUsuarioUnitec}\"> { hahah}</option>";
				if($check == $tempDeCantidadCarrera){
					 echo "<option value=\"{$asesor->UsuarioUnitec_IdUsuarioUnitec}\"> {Se Agrego a este usuario: $asesor->UsuarioUnitec_IdUsuarioUnitec}</option>";
					}*/


			  }

			  
			
	
				
				// echo "<option value=\"{$asesor->UsuarioUnitec_IdUsuarioUnitec}\"> {$tamanio}</option>";


		
		}

	}


	public function actionAsesoresPorCarrera2()
	{
		if(isset($_POST['Carreras2'])){
		
		$criteria = new CDbCriteria;  
		$criteria->addInCondition('Carrera_IdCarrera', $_POST['Carreras2']); 
		$criteria->group ='UsuarioUnitec_IdUsuarioUnitec';
		
		$list = CarreraPorUsuarioUnitec::model()->findAll($criteria);

		$cantidadAseosres = count($list);  // eso es por que filtramos por grupo y solamente pasa los asesores que tienen esos codigos de carrera
		$cantidadCarreras = count($_POST['Carreras2']);



		 // echo "<option value=\"{$cantidadAseosres}\"> {Cantidad  de Asesores $cantidadAseosres}</option>";
		 // echo "<option value=\"{$cantidadCarreras}\"> {Cantidad  de Carreras $cantidadCarreras}</option>";


		// accediendo a las usuarios que cumplen con al menos una de las carreras 
		foreach($list as $asesor){
		
			  // echo "<option value=\"{$asesor->UsuarioUnitec_IdUsuarioUnitec}\"> {Codigo de Asesor:  $asesor->UsuarioUnitec_IdUsuarioUnitec}</option>";
				$criteria2 = new CDbCriteria;  
			$criteria2->compare('UsuarioUnitec_IdUsuarioUnitec',$asesor->UsuarioUnitec_IdUsuarioUnitec,false);
			$criteria2->compare('Activo',1,false);

			  $FilasAsesorActual = CarreraPorUsuarioUnitec::model()->findAll($criteria2);	
			//$FilasAsesorActual = CarreraPorUsuarioUnitec::model()->findAll("UsuarioUnitec_IdUsuarioUnitec=?",array($asesor->UsuarioUnitec_IdUsuarioUnitec));	 esta la quite para poder poner la excepcion 
			// de caundo la carrera por usuario unitec esta pendiente
			  
			  $check = 0 ;

			  for ($i = 0; $i < $cantidadCarreras; $i++){
			  	
			  	 foreach($FilasAsesorActual as $fila)
				{
					$temp = $_POST['Carreras2'][$i];
					  // echo "<option value=\"{$asesor->UsuarioUnitec_IdUsuarioUnitec}\"> {Cod Asesor : $asesor->UsuarioUnitec_IdUsuarioUnitec Comparando Carrera : $temp  con  $fila->Carrera_IdCarrera }</option>";

					if($temp  == $fila->Carrera_IdCarrera){
						$check ++ ;
						// echo "<option value=\"{$asesor->UsuarioUnitec_IdUsuarioUnitec}\"> {Encontro uno  valor de check es $check}</option>";
					}


					// carreras por asesor 
				// echo "<option value=\"{$fila->UsuarioUnitec_IdUsuarioUnitec}\"> {Carrera de Asesor: $fila->UsuarioUnitec_IdUsuarioUnitec es :   $fila->Carrera_IdCarrera}</option>";
						
				}	  
					

				}

				


				if(intval($check) == intval($cantidadCarreras) ){
					$usuarioTemp= $asesor->userUnitec->Nombre ;

					echo "<option value=\"{$asesor->UsuarioUnitec_IdUsuarioUnitec}\"> {$asesor->userUnitec->PrimerNombrePrimerApellido }</option>";
				}
			
				/*$tempDeCantidadCarrera =  $cantidadCarrera +1;
				 echo "<option value=\"{$asesor->UsuarioUnitec_IdUsuarioUnitec}\"> { hahah}</option>";
				if($check == $tempDeCantidadCarrera){
					 echo "<option value=\"{$asesor->UsuarioUnitec_IdUsuarioUnitec}\"> {Se Agrego a este usuario: $asesor->UsuarioUnitec_IdUsuarioUnitec}</option>";
					}*/


			  }

			  
			
	
				
				// echo "<option value=\"{$asesor->UsuarioUnitec_IdUsuarioUnitec}\"> {$tamanio}</option>";


		
		}

	}



// Creando periodo académico en Cursos desde Usuario Unitec
		public function actionCrearCurso()
	{	
		date_default_timezone_set('America/Tegucigalpa');
		$model= new Curso;

		

		if(isset($_POST['NombreCurso'],$_POST['Carreras']))
		{

			$model->Nombre=strtoupper($_POST['NombreCurso']);
			$model->Codigo=strtoupper($_POST['CodigoCurso']);
			$model->Seccion=$_POST['SeccionCurso'];
			$model->PeriodoAcademico_IdPeriodoAcademico=$_POST['PeriodoAcademicoCurso'];
			$model->UsuarioUnitec_IdUsuarioUnitec=$_POST['AsesorCurso'];
			$model->Activo=1;
			$model->CreadoPor = Yii::app()->user->name;
			
			

			if($model->save()){

					$cantidadCarreras = count($_POST['Carreras']);
					$IdUltimoCursoInsertado = Yii::app()->db->getLastInsertID('Curso');

			  for ($i = 0; $i < $cantidadCarreras; $i++){
			  	$carreraTemp = new CarrerasPorCurso;

			  	$carreraTemp->Carrera_IdCarrera=$_POST['Carreras'][$i];
			  	$carreraTemp->Curso_IdCurso= $IdUltimoCursoInsertado; 

			  	$carreraTemp->save();

			 	 }

			 $this->redirect(Yii::app()->request->urlReferrer);
			}
		}

	}




// Creando periodo académico en Periodo Academico de Usuario Unitec
		public function actionCrearPeriodoAcademico()
	{	
		date_default_timezone_set('America/Tegucigalpa');
		$model= new PeriodoAcademico;

		

		if(isset($_POST['Semestre']))
		{

			$model->Anio=$_POST['Anio'];
			$model->Semestre=$_POST['Semestre'];
			$model->Trimestre=$_POST['Trimestre'];
			$model->Activo=1;
			$model->CreadoPor = Yii::app()->user->name;
			
			if($model->save()){

				$this->redirect(Yii::app()->request->urlReferrer);}
		}

	}

	public function actionNoHaceNada(){

echo  CarrerasPorCurso::model()->CarrerasPorCursoToString($_POST['name']);
    

	}


		// actualizando el nombre del curso en Crear - Editar Curso 
	public function actionActualizarCarreraPorCurso()
	{	
	date_default_timezone_set('America/Tegucigalpa');
	$Curso = CarrerasPorCurso::model()->findByPk($_POST['pk']);
	$Curso->Carrera_IdCarrera = $_POST['value'];
	$Curso->Save();

	}

		// actualizando el nombre del curso en Crear - Editar Curso 
	public function actionActualizarNombreCurso()
	{	
	date_default_timezone_set('America/Tegucigalpa');
	$Curso = Curso::model()->findByPk($_POST['pk']);
	$Curso->Nombre = strtoupper($_POST['value']);
	$Curso->ModificadoPor = Yii::app()->user->name;
	$Curso->Save();

	}

		public function actionActualizarCodigoCurso()
	{	
	date_default_timezone_set('America/Tegucigalpa');
	$Curso = Curso::model()->findByPk($_POST['pk']);
	$Curso->Codigo = strtoupper($_POST['value']);
	$Curso->ModificadoPor = Yii::app()->user->name;
	$Curso->Save();

	}

		public function actionActualizarSeccionCurso()
	{	
	date_default_timezone_set('America/Tegucigalpa');
	$Curso = Curso::model()->findByPk($_POST['pk']);
	$Curso->Seccion = $_POST['value'];
	$Curso->ModificadoPor = Yii::app()->user->name;
	$Curso->Save();

	}

	public function actionActualizarPeriodoCurso()
	{	
	date_default_timezone_set('America/Tegucigalpa');
	$Curso = Curso::model()->findByPk($_POST['pk']);
	$Curso->PeriodoAcademico_IdPeriodoAcademico = $_POST['value'];
	$Curso->ModificadoPor = Yii::app()->user->name;
	$Curso->Save();

	}

	public function actionActualizarAsesorCurso()
	{	
	date_default_timezone_set('America/Tegucigalpa');
	$Curso = Curso::model()->findByPk($_POST['pk']);
	$Curso->UsuarioUnitec_IdUsuarioUnitec = $_POST['value'];
	$Curso->ModificadoPor = Yii::app()->user->name;
	$Curso->Save();

	}

	public function actionActualizarEstadoEstudiante()
	{	
	date_default_timezone_set('America/Tegucigalpa');
	$Estudiante = UsuarioEstudiante::model()->findByPk($_POST['pk']);
	$Estudiante->Activo = $_POST['value'];
	$Estudiante->ModificadoPor = Yii::app()->user->name;
	$Estudiante->Save();

	}

		public function actionActualizarEstadoCurso2()
	{	
	date_default_timezone_set('America/Tegucigalpa');
	$AlumnosPorCurso = AlumnosPorCurso::model()->findByPk($_POST['pk']);
	$AlumnosPorCurso->Activo = $_POST['value'];
	$AlumnosPorCurso->Save();


	}


	public function actionActualizarEstadoCurso()
	{	
	date_default_timezone_set('America/Tegucigalpa');
	$Curso = Curso::model()->findByPk($_POST['pk']);
	$Curso->Activo = $_POST['value'];
	$Curso->ModificadoPor = Yii::app()->user->name;
	$Curso->Save();

	}

	// actualizando el año de un periodo escolar en Crear-Editar periodo académico
	public function actionActualizarAnioPeriodo()
	{	
	date_default_timezone_set('America/Tegucigalpa');
	$PeriodoAcademico = PeriodoAcademico::model()->findByPk($_POST['pk']);
	$PeriodoAcademico->Anio = $_POST['value'];
	$PeriodoAcademico->ModificadoPor = Yii::app()->user->name;
	$PeriodoAcademico->Save();

	}

		// actualizando el semestre de un periodo escolar en Crear-Editar periodo académico
	public function actionActualizarSemestrePeriodo()
	{	
	date_default_timezone_set('America/Tegucigalpa');
	$PeriodoAcademico = PeriodoAcademico::model()->findByPk($_POST['pk']);
	$PeriodoAcademico->Semestre = $_POST['value'];
	$PeriodoAcademico->ModificadoPor = Yii::app()->user->name;
	$PeriodoAcademico->Save();

	}



	// actualizando el trimestre de un periodo escolar en Crear-Editar periodo académico
	public function actionActualizarTrimestrePeriodo()
	{	
	date_default_timezone_set('America/Tegucigalpa');
	$PeriodoAcademico = PeriodoAcademico::model()->findByPk($_POST['pk']);
	$PeriodoAcademico->Trimestre = $_POST['value'];
	$PeriodoAcademico->ModificadoPor = Yii::app()->user->name;
	$PeriodoAcademico->Save();

	}

     // actualizando el estado de un periodo escolar en Crear-Editar periodo académico
	public function actionActualizarEstadoPeriodo()
	{	
	date_default_timezone_set('America/Tegucigalpa');
	$PeriodoAcademico = PeriodoAcademico::model()->findByPk($_POST['pk']);
	$PeriodoAcademico->Activo = $_POST['value'];
	$PeriodoAcademico->ModificadoPor = Yii::app()->user->name;
	$PeriodoAcademico->Save();

	}


	// actualizando el nombre del modelo TipoEmpresa en Parametrizacion de campos 
	public function actionActualizarNombreTipoEmpresa()
	{	
	date_default_timezone_set('America/Tegucigalpa');
	$Carrera = TipoEmpresa::model()->findByPk($_POST['pk']);
	$Carrera->NombreTipoEmpresa = $_POST['value'];
	$Carrera->ModificadoPor = Yii::app()->user->name;
	$Carrera->FechaModificacion = date('Y-m-d H:i:s');
	$Carrera->Save();
	}




	// actualizando estado de TipoEmpresa en Parametrizacion de campos 
	public function actionActualizarEstadoTipoEmpresa()
	{	
	date_default_timezone_set('America/Tegucigalpa');
	$Carrera = TipoEmpresa::model()->findByPk($_POST['pk']);
	$Carrera->Activo = $_POST['value'];
	$Carrera->ModificadoPor = Yii::app()->user->name;
	$Carrera->FechaModificacion = date('Y-m-d H:i:s');
	$Carrera->Save();
	}



	// actualizando el nombre de la carrera en Parametrizacion de campos 
	public function actionActualizarNombreCarrera()
	{	
	date_default_timezone_set('America/Tegucigalpa');
	$Carrera = Carrera::model()->findByPk($_POST['pk']);
	$Carrera->NombreCarrera = $_POST['value'];
	$Carrera->ModificadoPor = Yii::app()->user->name;
	$Carrera->FechaModificacion = date('Y-m-d H:i:s');
	$Carrera->Save();
	}




	// actualizando estado de la carrera en Parametrizacion de campos 
		public function actionActualizarEstadoCarrera()
	{	
	date_default_timezone_set('America/Tegucigalpa');
	$Carrera = Carrera::model()->findByPk($_POST['pk']);
	$Carrera->Activo = $_POST['value'];
	$Carrera->ModificadoPor = Yii::app()->user->name;
	$Carrera->FechaModificacion = date('Y-m-d H:i:s');
	$Carrera->Save();
	}

	// actualizando tipo de carrera en Carrera -> Parametrizacion de campos 
		public function actionActualizarTipoCarrera()
	{	
	date_default_timezone_set('America/Tegucigalpa');
	$Carrera = Carrera::model()->findByPk($_POST['pk']);
	$Carrera->TipoCarrera_idTipoCarrera = $_POST['value'];
	$Carrera->ModificadoPor = Yii::app()->user->name;
	$Carrera->FechaModificacion = date('Y-m-d H:i:s');
	$Carrera->Save();
	}



	// actualizando Tipo Carrera en Paremetrizacion de campos
	public function actionActualizarNombreTipoCarrera()
	{	
	date_default_timezone_set('America/Tegucigalpa');
	$tipoCarrera = TipoCarrera::model()->findByPk($_POST['pk']);
	$tipoCarrera->Nombre = $_POST['value'];
	$tipoCarrera->ModificadoPor = Yii::app()->user->name;
	$tipoCarrera->FechaModificacion = date('Y-m-d H:i:s');
	$tipoCarrera->Save();
	}

		public function actionActualizarEstadoTipoCarrera()
	{	
	date_default_timezone_set('America/Tegucigalpa');
	$tipoCarrera = TipoCarrera::model()->findByPk($_POST['pk']);
	$tipoCarrera->Activo = $_POST['value'];
	$tipoCarrera->ModificadoPor = Yii::app()->user->name;
	$tipoCarrera->FechaModificacion = date('Y-m-d H:i:s');
	$tipoCarrera->Save();
	}

		/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	//EN VERIFICAR USUARIOS LINK PARA ABRIR CLIENTE DE CORREO Y ENVIAR CORREO ELECTRONICO
	public function actionEnviarCorreoEmpresa($CorreoEmpresa){
	$this->redirect('mailto:'.$CorreoEmpresa);

	}

	public function actionparametrizarCampos(){
		
	
		$tipoCarrera =new TipoCarrera('BusquedaTiposCarreras');
		$Carrera =new Carrera('BusquedaCarreras');
		$TipoEmpresa =new TipoEmpresa('BusquedaTipoEmpresa');
		
		$tipoCarrera->unsetAttributes();
		$Carrera->unsetAttributes();
		$TipoEmpresa->unsetAttributes();

		if(isset($_GET['TipoCarrera']))
			$tipoCarrera->attributes   =$_GET['TipoCarrera'];

		if(isset($_GET['Carrera']))
			$Carrera->attributes   =$_GET['Carrera'];

		if(isset($_GET['TipoEmpresa']))
		$TipoEmpresa->attributes   =$_GET['TipoEmpresa'];


			$this->render('parametrizarCampos',array(
			'model'=>$this->loadModel(Yii::app()->user->getId()),
			'tipoCarrera' => $tipoCarrera,
			'Carrera' => $Carrera,
			'TipoEmpresa' => $TipoEmpresa,

			));
	}

	//EN VERIFICAR USUARIOS LINK PARA ABRIR SITIO WEB 
	public function actionAbrirSitioWeb($WebSite){
	$this->redirect('http://'. $WebSite, array('target'=>'_blank'));
	}

	public function actionActualizarInfoAdicional()
	{

	$model = UsuarioUnitec::model()->findByPk(Yii::app()->user->getId());

		if(isset($_POST['ObjetivoProfesional'],$_POST['DescripcionPersonal']))
		{
	$model->ObjetivoProfesional = $_POST['ObjetivoProfesional'];

	$model->DescripcionPersonal = $_POST['DescripcionPersonal'];
	$model->save();
	Yii::app()->user->setFlash("success","<strong>Excelente! </strong> Este es SU PERFIL PÚBLICO y ha sido actualizado . Para volver a editar haga <strong>CLIC AQUI </strong>");
	$this->redirect(array('UsuarioUnitec/Perfil'));

	}
		

	}



	public function actionVerificarEmpresa ($Activar){
		date_default_timezone_set('America/Tegucigalpa');
			$model=UsuarioEmpresa::model()->findByPk($Activar); // cargando el modelo

			$model->Activo = 1; // activando el usuario
			$model->FechaVerificacion = date('Y-m-d H:i:s'); // agregando fecha de verificación	
			$model->VerificadoPor = Yii::app()->user->name; // agregando el nombre de usuario que lo verifico
			$model->save(); // salvando el modelo 

			Yii::app()->user->setFlash("success","<strong>Excelente! </strong>" . $model->NombreEmpresa . " ha sido verificada, se ha enviado un correo de bienvenida a " . $model->CorreoEmpresa ." .");
			$this->redirect(Yii::app()->request->urlReferrer);



	}


	// creando nuevo tipo de carrera en parametrizacion de campos - Usuario Unitec
	public function actionCrearTipoCarrera()
	{	
		date_default_timezone_set('America/Tegucigalpa');
		$model=new TipoCarrera;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Nombre']))
		{
			$model->Nombre=$_POST['Nombre'];
			$model->Activo=1;
			$model->CreadoPor = Yii::app()->user->name;
			$model->FechaCreacion = date('Y-m-d H:i:s');
			if($model->save()) {
				Yii::app()->user->setFlash("success","<strong>Excelente! </strong> Se ha creado una nuevo tipo de carrera llamado <strong>" . $model->Nombre . "</strong>");
				$this->redirect(Yii::app()->request->urlReferrer. "#tipoCarrera");}
		}

	}
 // Creando nuevo tipo de empresa en parametrización de Campos - Usuario Unitec
	public function actionCrearTipoEmpresa()
	{	
		date_default_timezone_set('America/Tegucigalpa');
		$model=new TipoEmpresa;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['NombreTipoEmpresa']))
		{
			$model->NombreTipoEmpresa=$_POST['NombreTipoEmpresa'];
			$model->Activo=1;
			$model->CreadoPor = Yii::app()->user->name;
			$model->FechaCreacion = date('Y-m-d H:i:s');
			if($model->save()){
				Yii::app()->user->setFlash("success","<strong>Excelente! </strong> Se ha creado una nuevo tipo de empresa llamado <strong>" . $model->NombreTipoEmpresa . "</strong>");
				$this->redirect(Yii::app()->request->urlReferrer. "#tipoEmpresa");}
		}

	}

	// creando nueva carrera en parametrizacion de campos - Usuario Unitec
	public function actionCrearCarrera()
	{	
		date_default_timezone_set('America/Tegucigalpa');
		$model=new Carrera;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['NombreCarrera']))
		{
			$model->NombreCarrera=$_POST['NombreCarrera'];
			$model->TipoCarrera_idTipoCarrera = $_POST['TipoCarreraId'];
			$model->Activo=1;
			$model->CreadoPor = Yii::app()->user->name;
			$model->FechaCreacion = date('Y-m-d H:i:s');
			if($model->save()) {
				Yii::app()->user->setFlash("success","<strong>Excelente! </strong> Se ha creado una nueva carrera llamada <strong>" . $model->NombreCarrera . "</strong>");
				$this->redirect(Yii::app()->request->urlReferrer. "#Carreras");}
		}


	}

	public function actionVerificarUsuarioEmpresa ($Activar){
		date_default_timezone_set('America/Tegucigalpa');
			$model=ContactoEmpresa::model()->findByPk($Activar);
			$model->Activo = 1;
			$model->FechaVerificacion = date('Y-m-d H:i:s');
			$model->VerificadoPor = Yii::app()->user->name;
			$model->save();
			Yii::app()->user->setFlash("success","<strong>Excelente! </strong>" . "El usuario " .$model->NombreCompleto . " ha sido verificado, se ha enviado un correo de bienvenida a " . $model->CorreoElectronico ." .");
			$this->redirect(Yii::app()->request->urlReferrer. "#usuariosEmp");



	}

	public function actionVerificarAlumnos ($Activar){
		date_default_timezone_set('America/Tegucigalpa');
			$model=UsuarioEstudiante::model()->findByPk($Activar);
			$modelCarrera = Carrera::model()->findByPk($model->Carrera_IdCarrera);
			$model->Activo = 1;

			$model->FechaVerificacion = date('Y-m-d H:i:s');
			$model->VerificadoPor = Yii::app()->user->name;

			$model->save();

			Yii::app()->user->setFlash("success","<strong>Excelente! </strong> El Alumno "  . $model->Nombre . " " . $model->PrimerApellido .  " de la carrera " . $modelCarrera->NombreCarrera .
			" ha sido verificado . Se ha enviado un correo de bienvenida a " . $model->Email   );	
			$this->redirect(Yii::app()->request->urlReferrer . "#estudiantes");
	}


	public function actionVerifcarUnitec($Activar){

			$model=UsuarioUnitec::model()->findByPk($Activar);
			$model->Activo = 1;
			
			$model->save();

			Yii::app()->user->setFlash("success","<strong>Excelente! </strong>" . $model->Nombre . " ha sido verificada, se ha enviado un correo de bienvenida a " . $model->Email ." . <strong> AHORA PUEDES DARLE PERMISOS DE ASESOR O DE JEFE ACADÉICO SIGUIENDO ESTE LINK </strong>");
			$this->redirect(Yii::app()->request->urlReferrer. "#unitec");
	}


	public function actioneditarPerfil()
	{		
			$CarrerasPorUsuarioUnitec   =new CarreraPorUsuarioUnitec('BusquedaCarrerasPorUsuario');
			$Carreras =new Carrera;
			$TipoUsuarioUnitec =new TipoUsuarioUnitec;
			

			$CarrerasPorUsuarioUnitec->unsetAttributes();

			if(isset($_GET['CarreraPorUsuarioUnitec']))
			$CarrerasPorUsuarioUnitec->attributes               =$_GET['CarreraPorUsuarioUnitec'];


			$this->render('editarPerfil',array(
			'model'=>$this->loadModel(Yii::app()->user->getId()),
			'CarrerasPorUsuarioUnitec'=>$CarrerasPorUsuarioUnitec,
			'Carreras'=>$Carreras,
			'TipoUsuarioUnitec'=>$TipoUsuarioUnitec,
			
			));
	}


	public function actionVerificarUsuarios() 
	{
			
			$model               =new UsuarioEmpresa('search');
			$modelEstudiantes    =new UsuarioEstudiante('BusquedaAlumnosInactivos');
			$modelUnitec         =new UsuarioUnitec('BusquedaUnitecInactivos');
			$modelUsuarioEmpresa =new ContactoEmpresa('BusquedaUsuariosEmpresaInactivos');
			$empresa             =new ContactoEmpresa();
			$carrerasPorUsuarioUnitec = new CarreraPorUsuarioUnitec('BusquedaPrueba');

			$Practicas = new PracticaProfesional('BusquedaPracticasInactivas');

			$model->unsetAttributes();
			$modelEstudiantes->unsetAttributes();
			$modelUnitec->unsetAttributes();
			$modelUsuarioEmpresa->unsetAttributes();
			$carrerasPorUsuarioUnitec->unsetAttributes();
			$Practicas->unsetAttributes();

			if(isset($_GET['UsuarioEmpresa']))
			$model->attributes               =$_GET['UsuarioEmpresa'];
			
			if(isset($_GET['UsuarioEstudiante']))
			$modelEstudiantes->attributes    =$_GET['UsuarioEstudiante'];
			
			if(isset($_GET['UsuarioUnitec']))
			$modelUnitec->attributes         =$_GET['UsuarioUnitec'];
			
			if(isset($_GET['ContactoEmpresa']))
			$modelUsuarioEmpresa->attributes =$_GET['ContactoEmpresa'];

			if(isset($_GET['CarreraPorUsuarioUnitec']))
			$carrerasPorUsuarioUnitec->attributes =$_GET['CarreraPorUsuarioUnitec'];

			if(isset($_GET['BusquedaPracticasInactivas']))
			$Practicas->attributes =$_GET['BusquedaPracticasInactivas'];



	$this->render('verificarUsuarios',array(
	'model'=>$model,
	'modelEstudiantes'=>$modelEstudiantes,
	'modelUnitec'=>$modelUnitec,
	'modelUsuarioEmpresa'=>$modelUsuarioEmpresa,
	'empresa'=>$empresa,
	'carrerasPorUsuarioUnitec'=>$carrerasPorUsuarioUnitec,
	'Practicas'=>$Practicas,
	));

}

// Periodo Academico 	
public function actionPeriodoAcademico()
	{		
			$PeriodoAcademico =new PeriodoAcademico('BusquedaPeriodosActivos');

			$PeriodoAcademico->unsetAttributes();

			if(isset($_GET['PeriodoAcademico']))
			$PeriodoAcademico->attributes  =$_GET['PeriodoAcademico'];
			

			$this->render('PeriodoAcademico',array(
			'PeriodoAcademico'=>$PeriodoAcademico,
			));
	}

//Cursos 
	public function actionCursos()
	{		
			
			$CursoPrueba = new Curso();

			$Curso =new Curso('BusquedaCursosActivos');
			$CarrerasPorCurso =new CarrerasPorCurso('BusquedaCarrerasPorCurso');

			$Curso->unsetAttributes();
			$CarrerasPorCurso->unsetAttributes();

		

			if(isset($_GET['Curso']))
			$Curso->attributes  =$_GET['Curso'];

			if(isset($_GET['CarrerasPorCurso']))
			$CarrerasPorCurso->attributes  =$_GET['CarrerasPorCurso'];
			
			

			$this->render('Cursos',array(
			'Curso'=>$Curso,
			'CarrerasPorCurso'=>$CarrerasPorCurso,
			'CursoPrueba'=>$CursoPrueba,
			));
	}



		//CAMBIA LA CONTRASEÑA EN EL PERFIL DEL ALUMNO
	public function actionCambiarContrasena()
	{

		$model=UsuarioUnitec::model()->findByPk(Yii::app()->user->getId());
		
		if(isset($_POST['password']))
		{
			$model->Contrasena = $_POST['password'];
			$model->save();
			Yii::app()->user->setFlash("success","<strong>Excelente!</strong> Su contraseña ha sido actualizada exitosamente");
			$this->redirect(Yii::app()->request->urlReferrer);

		}

	}

	// ACTUALIZAR DATOS EN PERFIL UNITEC
	public function actionActualizarDatos()
	{
	 $model=UsuarioUnitec::model()->findByPk(Yii::app()->user->getId());

	 if(isset($_POST['NombreAsesor']))
		{
			$model->Nombre = strtoupper($_POST['NombreAsesor']);
			$model->save();
			Yii::app()->user->setFlash("success","<strong>Excelente!</strong> Tu NOMBRE ha sido actualizado");
			$this->redirect(array('UsuarioUnitec/editarPerfil'));

		}
		if(isset($_POST['PrimerApellido']))
		{
			$model->PrimerApellido = strtoupper($_POST['PrimerApellido']);
			$model->save();
			Yii::app()->user->setFlash("success","<strong>Excelente!</strong> Tu PRIMER APELLIDO ha sido actualizado");
			$this->redirect(array('UsuarioUnitec/editarPerfil'));

		}
		if(isset($_POST['SegundoApellido']))
		{
			$model->SegundoApellido = strtoupper($_POST['SegundoApellido']);
			$model->save();
			Yii::app()->user->setFlash("success","<strong>Excelente!</strong> Tu SEGUNDO APELLIDO ha sido actualizado");
			$this->redirect(array('UsuarioUnitec/editarPerfil'));

		}
		if(isset($_POST['usuario']))
		{
			$model->Usuario = strtolower($_POST['usuario']);
			$model->save();
			Yii::app()->user->setFlash("success","<strong>Excelente!</strong> Tu USUARIO ha sido actualizado");
			Yii::app()->user->setFlash("warning","<strong>Recuerda!</strong> La próxima vez inicia sesión con tu nuevo usuario");
			$this->redirect(array('UsuarioUnitec/editarPerfil'));

		}
			if(isset($_POST['email']))
		{
			$model->Email = strtolower($_POST['email']);
			$model->save();
			Yii::app()->user->setFlash("success","<strong>Excelente!</strong> Tu CORREO ELECTRÓNICO ha sido actualizado");
			Yii::app()->user->setFlash("warning","<strong>Recuerda!</strong> Las notificaciones del sistema se enviarán a tu nuevo correo electrónico");
			$this->redirect(array('UsuarioUnitec/editarPerfil'));

		}
		

	}




	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$this->layout='main';
		$model=new UsuarioUnitec;
		$TipoUsuarioUnitec= new TipoUsuarioUnitec;
		$modelTipoCarrera=new TipoCarrera;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['NombreJefeAsesor'],$_POST['email'],$_POST['username']))
		{
			if(UsuarioEstudiante::model()->VerificarDuplicidadUsuario2($_POST['username']) == ""){
				
			$model->Nombre = strtoupper($_POST['NombreJefeAsesor']);
			$model->PrimerApellido = strtoupper($_POST['PrimerApellido']);
			$model->SegundoApellido = strtoupper($_POST['SegundoApellido']);
			$model->Email =strtolower($_POST['email']);
			$model->Contrasena = $_POST['password'];
			$model->Usuario = strtolower($_POST['username']);
			
			if( Yii::app()->user->isGuest ){
			$model->CreadoPor = "Invitado";
			$model->ModificadoPor	 = "Invitado";
			}
			if(!Yii::app()->user->isGuest ){
			// usted ha creado un usuario , se ha enviado un  correo 
			//electronico a la persona de quien se ha creado el usuario	
			$model->CreadoPor = Yii::app()->user->name ;
			$model->ModificadoPor	 = Yii::app()->user->name;
			}
			$model->Activo	 = 0;
			$model->FechaCreacion = date('Y-m-d H:i:s');
			$model->FechaModificacion	 = date('Y-m-d H:i:s');
			//$model->Rol_IdRol	 = 3 ;
			
			if($model->save()){
			Yii::app()->user->setFlash("success","<strong>Excelente!</strong> Su USUARIO ha sido creado exitosamente. Inicie sesion para ver su perfil");
			$this->redirect(array('Site/login'));

			}
			}
			else
				{

				Yii::app()->user->setFlash("warning","<strong>Ummmm...</strong> El NOMBRE DE USUARIO se encuentra asociado con una cuenta existente");		

				}
			
		}

		$this->render('create',array(
			'model'=>$model,
			'TipoUsuarioUnitec'=>$TipoUsuarioUnitec,
			'modelTipoCarrera'=>$modelTipoCarrera,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UsuarioUnitec']))
		{
			$model->attributes=$_POST['UsuarioUnitec'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->IdUsuarioUnitec));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

		public function actionPerfil()
	{

		$this->render('perfil',array(
			'model'=>$this->loadModel(Yii::app()->user->getId()),
		));
	}


	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{

		$dataProvider=new CActiveDataProvider('UsuarioUnitec');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new UsuarioUnitec('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UsuarioUnitec']))
			$model->attributes=$_GET['UsuarioUnitec'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return UsuarioUnitec the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=UsuarioUnitec::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param UsuarioUnitec $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuario-unitec-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

<?php
/**
 *
 */
class Mexcell extends CI_Model {
	var $cuerpo;
	var $cabezera;
	var $columnas = array();

	function __construct() {
		parent::__construct();
		$this -> load -> library('Excel');
		$this -> columnas = range('A', 'Z');
	}
	function Contruye_baner($nombre,$tipo,$rif,$mes,$ano,$libro) {
		$x =3;$y = 2;
		$x1 =3;$y1 = 3;
		$x2 =3;$y2 = 4;
		switch($mes) {
			case "01" :$mes= "Enero";
				break;
			case "02" : $mes="Febrero";
				break;
			case "03" : $mes= "Marzo";
				break;
			case "04" : $mes="Abril";
				break;
			case "05" : $mes="Mayo";
				break;
			case "06" : $mes= "Junio";
				break;
			case "07" : $mes="Julio";
				break;
			case "08" : $mes="Agosto";
				break;
			case "09" : $mes="Septiembre";
				break;
			case "10" : $mes= "Octubre";
				break;
			case "11" : $mes="Noviembre";
				break;
			case "12" : $mes= "Diciembre";
		}
		$this -> excel -> setActiveSheetIndex(0) -> setCellValue($this -> columnas[$x] . $y, $nombre);
		$this -> excel -> setActiveSheetIndex(0) -> setCellValue($this -> columnas[$x1] . $y1, $tipo.$rif);
		$this -> excel -> setActiveSheetIndex(0) -> setCellValue($this -> columnas[$x2] . $y2, $libro." Correspondientes al Mes ".$mes." ".$ano);

	}
	function Contruye_Cabezera($inicio,$logo,$ancho) {
		$this -> excel -> getActiveSheet()->setTitle('Libro_Ventas');
		//$sheet = $this->setSheetIndexAndTitle(1, "YOUR_SHEET_TITLE"); // first sheet
		$objDrawing = new PHPExcel_Worksheet_Drawing();
		$objDrawing->setName('Logo');
		$objDrawing->setDescription('Logo');
		$logo = FCPATH . 'system/img/empresa/'.$logo; // Provide path to your logo file
		$objDrawing->setPath($logo);
		$objDrawing->setOffsetX(8);    // setOffsetX works properly
		$objDrawing->setOffsetY(300);  //setOffsetY has no effect
		$objDrawing->setCoordinates('A1');
		$objDrawing->setWidth($ancho); // logo height
		//$objDrawing->setHeight($alto);  //logo height

		$objDrawing->setWorksheet($this->excel->setActiveSheetIndex(0));

		$this -> excel -> getDefaultStyle() -> getFont() -> setName('DejaVu Sans Mono');
		$this -> excel -> getDefaultStyle() -> getFont() -> setSize(9);



		$cab = $this -> cabezera;$i = 0;
		foreach ($cab as $valor) {
			$this -> excel -> setActiveSheetIndex(0) -> setCellValue($this -> columnas[$i] . $inicio, $valor);
			$this -> excel -> getActiveSheet() -> getColumnDimension($this -> columnas[$i]) ->setAutoSize(true);
			$this -> excel -> getActiveSheet() ->getRowDimension($inicio)->setRowHeight(50);
			//$this -> excel -> getActiveSheet() -> getColumnDimension($this -> columnas[$i])->set‌​AutoSize(true);
			$this -> excel -> getActiveSheet() -> getStyle($this -> columnas[$i] . $inicio) -> getFont() -> setBold(true);
			$styleArray = array(
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN
					)
				)
			);
			$this -> excel -> getActiveSheet() -> getStyle($this -> columnas[$i] . $inicio) ->applyFromArray($styleArray);

			$i++;
		}
		$this -> excel -> getActiveSheet(0) -> getStyle('A'.$inicio.':' . $this -> columnas[count($this -> cabezera)-1] . $inicio) -> getFill() -> setFillType(PHPExcel_Style_Fill::FILL_SOLID) -> getStartColor() -> setARGB('ffffffff');
	}
	function Construye_Cuerpo($pos) {
        /*print("<pre>");
        print_R($this->cuerpo);*/
		$cuerpo = $this -> cuerpo;
		$i = $pos;
		foreach ($cuerpo as $fila => $col) {
			$j=0;
			foreach ($col as $valor) {
				$this -> excel -> setActiveSheetIndex(0) -> setCellValueExplicit($this -> columnas[$j] . $i,$valor, PHPExcel_Cell_DataType::TYPE_STRING);
				$j++;
			}
			$i++;
		}
		return $i;
	}

	//
	function Guardar($ruta) {
		$objWriter = PHPExcel_IOFactory::createWriter($this -> excel, 'Excel5');
		$objWriter -> save($ruta);
	}

}
?>
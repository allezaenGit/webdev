<?php

if (!defined('BASEPATH'))
		exit('No direct script access allowed');
	
use ybs\general\Load;
use ybs\general\Validation;
use ybs\general\Storage;


use ybs\http\Request;
use ybs\http\Response;
	

class ImportExcel extends CI_Controller {
				
		function __construct(){
			parent::__construct();
			$this->load->model('sys/Crud_generator_model','crud_model');
			$this->load->model('sys/ImportExcel_model','imodel');
		}
			   
		function index(){
		    
			$breadcrumb = [
				'sistem'			=> site_url('sistem/Pengaturan'),
				'ImportExcel' 		=>   url(),
			 ];
	
			$data = [
				'breadcrumb'			=> $breadcrumb,
				'title_page_big'		=> 'Import From Excel Template',
				'table_list'			=> $this->crud_model->get_table_list(),
				'link_create'			=> url('..YOUR FUNCTION..'),
				'link_update'			=> url('..YOUR FUNCTION..'),
				'link_delete'			=> url('..YOUR FUNCTION..'),
			];
			
			
			
			response()->view('sistem/ImportExcel_view',$data);
			
		}
		
		
		
		
	private function rangeAlfa($start,$end){
			$l = strlen($end);

			$e1="";
			$e2="";
			if($l==2){
				$e1 = substr($end,0,1);
				$e2 = substr($end,-1);
			
				$r1 = range($start,"Z");
				
				$data;
				$dataFinal;
				switch($e1){
					case "A" :
						$dataA = range("A" , $e2);
						
						$x=0;
						foreach($dataA as $val){
							$dataA[$x] = "A".$val;
							$x++;
						}
						
						$dataFinal = array_merge($r1,$dataA);
						
					break;
					case "B" :
						$dataA = range("A" , "Z");
						$dataB = range("A" , $e2);
						
						$x=0;
						foreach($dataA as $val){
							$dataA[$x] = "A".$val;
							$x++;
						}
						
						
						$x=0;
						foreach($dataB as $val){
							$dataB[$x] = "B".$val;
							$x++;
						}
						
						
						$dataFinal = array_merge($r1,$dataA,$dataB);
						
					
					
					break;
					case "C" :
						$dataA = range("A" , "Z");
						$dataB = range("A" , "Z");
						$dataC = range("A" , $e2);
						
						$x=0;
						foreach($dataA as $val){
							$dataA[$x] = "A".$val;
							$x++;
						}
						
						
						$x=0;
						foreach($dataB as $val){
							$dataB[$x] = "B".$val;
							$x++;
						}
						
						$x=0;
						foreach($dataC as $val){
							$dataC[$x] = "C".$val;
							$x++;
						}
						
						
						$dataFinal = array_merge($r1,$dataA,$dataB,$dataC);
						
					break;
					case "D" :
					break;
					case "E" :
					break;
				}
				
				return $dataFinal;
			
			}else{
				return range($start,$end);
			}
			
			

		}
		
		
		
		function readExcel(){
			$file = Storage::getFiles(request()['doc'],false,TRUE)[0];
			$reset = request()['reset'];
			
			$reset = request()['reset'] =="true" ? true:false;
		
			
			$this->load->library("YBSExcelReader");
			
			$o  = new Outputview();
			$dataError = array();
			$dataFinal;
			$header ;
			$table ;
					try{
						
						$excel  = new YBSExcelReader();
						$excel->set_file("./temp_upload/$file->name","TEMPLATE");
						
						$config = $excel->read(3,5,['B']);
					
						$table = @$config[0]['B'];
						$endCol = @$config[1]['B']; 
						$endRow = @$config[2]['B'];
						
						if(!is_numeric ($endRow)){
							$o->success=false;
							$o->message= "<small>Opps Format tidak valid, Config END_ROW Harus Angka !!</small>";
							
							response()->json($o->result());
						}
						
						if($endRow > 10007){
						
							$o->success=false;
							$o->message= "<small>Opps Format tidak valid, Config END_ROW Maximal: 10007 Row</small>";
							
							response()->json($o->result());
						}
						
						$dataFinal = $excel->read(7,$endRow,$this->rangeAlfa('A',$endCol));
						
						$header  = $dataFinal[0];
						unset($dataFinal[0]);
						if(!$dataFinal){
							$o->success=false;
							$o->message= "Data Tidak boleh kosong..!!";
							response()->json($o->result());
						}
						
					} catch(Exception $e) {
						$msgError = $e->getMessage();
						$msgError = str_replace("Your requested sheet index: -1 is out of bounds. The actual number of sheets is 0.","Error : Sheet tidak di temukan",$msgError);
						$dataError[]= "<small>".$msgError."</small><br>";
					}
					
					
					
					if($dataError){
						$o->success=false;
						$o->message= $dataError[0];
						response()->json($o->result());
					}else{
						
						
						
						
						
						$dataInsert;
						foreach($dataFinal as $row){
							$r=array();
							foreach($row as $i => $v){
								$r[$header[$i]] = $v;
							}
							$dataInsert[]=$r;
						}
						
						
						$split = array_chunk($dataInsert,300);
						
						if($reset) $this->imodel->reset_table($table);
						
						foreach($split as $v){
							$this->imodel->insert_multiple($table,$v);
						}
						
						
						$o->success = 'true';
						$o->message = "<small>data berhasil di simpan..total data ".count($dataInsert)." row </small><br>";
						echo $o->result();
						return;
					}
		}
		
		
		
		private function alpha ($number){
			$r = range("A","Z");	
			$a=$number;
			if($number>25) {
				$a = floor($number/26)-1;
				$b = $number%26;
				return $r[$a].$r[$b];
				
			}

			return $r[$a]; 	
				

	   }
		
		public function downloadTemplate($tname){
			//$alpha = range("A","Z");
			
			$table = $tname;
			
			$exist = $this->db->table_exists($table);
			if(!$exist){
				response()->goto(url(),"Table Belum di pilih","danger");
				
			}
			
			$listField =  $this->db->list_fields($table);
			
			
			
			$this->load->library("PHPExcel");
			$objPHPExcel = new PHPExcel();
			
			//SET BORDER
			$thick = array ();
			$thick['borders']=array();
			$thick['borders']['allborders']=array();
			$thick['borders']['allborders']['style']=PHPExcel_Style_Border::BORDER_THIN ;
			

			$objPHPExcel->getProperties()->setCreator("YBS SYSTEM")
								 ->setLastModifiedBy("YBS SYSTEM")
								 ->setTitle("Office 2007 XLSX Database Document")
								 ->setSubject("Office 2007 XLSX Database Document")
								 ->setDescription("Database document for Office 2007 XLSX, generated using PHP classes.")
								 ->setKeywords("office 2007 openxml php")
								 ->setCategory("Database result file");


			//========================================//
			/* 	 MEMBUAT TABLE ISIAN PADA COLUMN A1	  */
			//========================================//					 

			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A1', 'ISI PADA TABEL DI BAWAH INI (MAX 10000 ROW)')
						->setCellValue('A2', 'pastikan anda mengisi dengan benar, cek kembali isian anda sebelum melakukan upload ke system')
						->setCellValue('A3', 'TABLE_TARGET')
						->setCellValue('A4', 'END_COLUMN')
						->setCellValue('A5', 'END_ROW')
						->setCellValue('C5', '<--- Last Content Row');
						// ->setCellValue('B3', 'PASSWORD')
						// ->setCellValue('C3', 'KODE_LEVEL')
						// ->setCellValue('D3', 'KODE_STATUS');
			
			$xCol=0;
			$primaryName = $this->imodel->getPrimaryName($table);
						
			foreach($listField as $val){
				if($val !== $primaryName){
					
					$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue($this->alpha($xCol)."7",strtoupper($val));
					$xCol++;
				}
				
			}
			$xCol = $xCol-1;		
			
			//SET END_COLUMN CONFIG
			$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue("B3",$table);
				
			$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue("B4",$this->alpha($xCol));
				
			$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue("B5","10007");
			
			
			
			//MERGE COLOMN A1-D1 UNTUK TITLE KETERANGAN
			$objPHPExcel->getActiveSheet()->mergeCells('A1:'.$this->alpha($xCol).'1');	
			
			//MERGE COLOMN A2-D2 UNTUK TITLE KETERANGAN
			$objPHPExcel->getActiveSheet()->mergeCells('A2:'.$this->alpha($xCol).'2');	
			
				
			//MEMBUAT COLOR FONT RED A1
			$objPHPExcel->getActiveSheet()->getStyle('A1:A2')->getFont()
						->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);		
			
			
			//WRAP TEST A2
			$objPHPExcel->getActiveSheet()->getStyle('A2')
						->getAlignment()->setWrapText(true);
			
			//Set Height Row 2
			$objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(40);			

			
			//SET ALIGNMENT -CENTER-CENTER A1-END COL
			$objPHPExcel->getActiveSheet()->getStyle('A1:'.$this->alpha($xCol).'10007')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('A1:'.$this->alpha($xCol).'10007')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);			
			
			//MEMBUAT COLOR FONT WHITE A3-A5	
			$objPHPExcel->getActiveSheet()->getStyle('A3:A5')->getFont()
						->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
			
			//MEMBUAT COLOR FONT WHITE A7-D7	
			$objPHPExcel->getActiveSheet()->getStyle('A7:'.$this->alpha($xCol).'7')->getFont()
						->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
						
			
			//BOLD A1
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
			
			//BOLD A7-D7
			$objPHPExcel->getActiveSheet()->getStyle('A7:'.$this->alpha($xCol).'7')->getFont()->setBold(true);
			
			
			for($x=0; $x<= $xCol;$x++ ){
				 $objPHPExcel->getActiveSheet()->getColumnDimension($this->alpha($x))->setWidth(20);
			}
			
			//SET COLOR CELL BLACK A3-A4
			$objPHPExcel->getActiveSheet()->getStyle('A3:A5')->getFill()
						->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
						->getStartColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
						
			//membuat border				
		   $objPHPExcel->getActiveSheet()->getStyle ( 'A3:B5' )->applyFromArray ($thick);			
			
			
			//SET COLOR CELL BLACK A7-D7
			$objPHPExcel->getActiveSheet()->getStyle('A7:'.$this->alpha($xCol).'7')->getFill()
						->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
						->getStartColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
						
						
			//========================================//
			/* 	 END TABLE ISIAN PADA COLUMN A1	  */
			//========================================//	
			
			//PROTECTION SHEET
			$objPHPExcel->getActiveSheet()->getProtection()->setPassword('YBSDatabase');
			$objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);

			//UNPROTECT CONFIG END ROW
			$objPHPExcel->getActiveSheet()->getStyle('B5')->getProtection()->setLocked(
				PHPExcel_Style_Protection::PROTECTION_UNPROTECTED
			);

			//UNPROTECT TABLE ISIAN MAX 2000 ROW
			$objPHPExcel->getActiveSheet()->getStyle('A8:'.$this->alpha($xCol).'10007')->getProtection()->setLocked(
				PHPExcel_Style_Protection::PROTECTION_UNPROTECTED
			);
			
			//membuat border				
		   $objPHPExcel->getActiveSheet()->getStyle ( 'A7:'.$this->alpha($xCol).'10007' )->applyFromArray ($thick);

						
			// Rename worksheet
			$objPHPExcel->getActiveSheet()->setTitle('TEMPLATE');		

			// Set active sheet index to the first sheet, so Excel opens this as the first sheet
			$objPHPExcel->setActiveSheetIndex(0);
			// Redirect output to a client’s web browser (Excel5)
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="Template_'.$table.'.xls"');
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
			exit;
			
			
		}
		
		

}


		
/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CLI 2021-03-11 06:45:08 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/
	

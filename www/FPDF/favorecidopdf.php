<?php

require_once '../../../tcm/simple_html_dom.php';
$html = new simple_html_dom();
$html->load_file($_POST['link']);
/*$html->load_file("http://municipios.tce.ce.gov.br/transparencia/index.php/nempenho/detalhes/mun/100/versao/2019/cd_orgao/04/cd_unid_orc/10++/dt_emissao_ne/Feb+19+2019+12%3A00%3A00%3A000AM/nu_nota_empenho/P0219002/camara");*/



require('fpdf.php');
class myPDF extends FPDF 
{
	function header(){
		$this->setFont('Arial' , "I", 9);
		$this->text(198,285,utf8_decode($this->PageNo() . '/{nb}'));
	}


	function nt_pdf() 
	{
		$html = $GLOBALS['html'];
		$this->AddFont('Tahoma', '', 'TAHOMA.php');
		$this->AddFont('Tahoma', 'B', 'tahomabd.php');

		$this->SetFont('Tahoma','',9);

		$this->Cell(198,4, $html->find('div[id=miolo] h2',0)->plaintext, "B", 1, "L");

		$this->Cell(198,1, utf8_decode(""), 0,1, "L");

		$this->SetFont('Tahoma','B',8);
		$this->Cell(198,4, utf8_decode("Funcional Programática : "), 0,1, "L");
		$this->SetFont('Tahoma','',9);
		$this->Cell(198,4, $html->find('table[class=relatorio]',0)->find('tr',1)->find('td',0)->plaintext, 0,1, "L");

		$this->Cell(198,1, utf8_decode(""), 0,1, "L");

		$this->SetFont('Tahoma','B',8);
		$this->Cell(99,4, utf8_decode("Gestor do Empenho : "), 0,0, "L");
		$this->Cell(99,4, utf8_decode("CPF : "), 0,1, "L");
		$this->SetFont('Tahoma','',9);
		$this->Cell(99,4, utf8_decode($html->find('table[class=relatorio]',0)->find('tr',4)->find('td',0)->plaintext), 0,0, "L");
		$this->Cell(99,4, utf8_decode($html->find('table[class=relatorio]',0)->find('tr',4)->find('td',1)->plaintext), 0,1, "L");

		$this->Cell(198,1, utf8_decode(""), 0,1, "L");

		$this->SetFont('Tahoma','B',8);
		$this->Cell(49.5,4, utf8_decode("Nota Empenho N° : "), 0,0, "L");
		$this->Cell(49.5,4, utf8_decode("Modalidade : "), 0,0, "L");
		$this->Cell(49.5,4, utf8_decode("Data Emissão : "), 0,0, "L");
		$this->Cell(49.5,4, utf8_decode("Doc. Ref : "), 0,1, "L");
		$this->SetFont('Tahoma','',9);
		$this->Cell(49.5,4, utf8_decode($html->find('table[class=relatorio]',0)->find('tr',7)->find('td',0)->plaintext), 0,0, "L");
		$this->Cell(49.5,4, utf8_decode($html->find('table[class=relatorio]',0)->find('tr',7)->find('td',1)->plaintext), 0,0, "L");
		$this->Cell(49.5,4, utf8_decode($html->find('table[class=relatorio]',0)->find('tr',7)->find('td',2)->plaintext), 0,0, "L");
		$this->Cell(49.5,4, utf8_decode($html->find('table[class=relatorio]',0)->find('tr',7)->find('td',3)->plaintext), 0,1, "L");

		$this->Cell(198,1, utf8_decode(""), 0,1, "L");

		$this->SetFont('Tahoma','B',8);
		$this->Cell(198,4, utf8_decode("Nome do Credor : "), 0,1, "L");
		$this->SetFont('Tahoma','',9);
		$this->Cell(198,4, utf8_decode($html->find('table[class=relatorio]',0)->find('tr',10)->find('td',0)->plaintext), 0,1, "L");

		$this->Cell(198,1, utf8_decode(""), 0,1, "L");

		$this->SetFont('Tahoma','B',8);
		$this->Cell(99,4, utf8_decode("Tipo de Documento : "), 0,0, "L");
		$this->Cell(99,4, utf8_decode("Nº do Documento : "), 0,1, "L");
		$this->SetFont('Tahoma','',9);
		$this->Cell(99,4, utf8_decode($html->find('table[class=relatorio]',0)->find('tr',13)->find('td',0)->plaintext), 0,0, "L");
		$this->Cell(99,4, utf8_decode(trim($html->find('table[class=relatorio]',0)->find('tr',13)->find('td',1)->plaintext)), 0,1, "L");

		$this->Cell(198,1, utf8_decode(""), 0,1, "L");

		$this->SetFont('Tahoma','B',8);
		$this->Cell(198,4, utf8_decode("Histórico : "), 0,1, "L");
		$this->SetFont('Tahoma','',9);
		$this->MultiCell(198,4, $html->find('table[class=relatorio]',0)->find('tr',16)->find('td',0)->plaintext, 0, "L");

		$this->Cell(198,1, utf8_decode(""), 0,1, "L");

		$this->SetFont('Tahoma','B',8);
		$this->Cell(49.5,4, utf8_decode("Vr. Empenhado (Inicial) : "), 0,0, "L");
		$this->Cell(49.5,4, utf8_decode("Vr. Anulado : "), 0,0, "L");
		$this->Cell(49.5,4, utf8_decode("Vr. Empenhado : "), 0,0, "L");
		$this->Cell(49.5,4, utf8_decode(""), 0,1, "L");
		$this->SetFont('Tahoma','',9);
		$this->Cell(49.5,4, utf8_decode($html->find('table[class=relatorio]',0)->find('tr',19)->find('td',0)->plaintext), 0,0, "L");
		$this->Cell(49.5,4, utf8_decode($html->find('table[class=relatorio]',0)->find('tr',19)->find('td',1)->plaintext), 0,0, "L");
		$this->Cell(49.5,4, utf8_decode($html->find('table[class=relatorio]',0)->find('tr',19)->find('td',2)->plaintext), 0,0, "L");
		$this->Cell(49.5,4, utf8_decode(""), 0,1, "L");

		$this->Cell(198,1, utf8_decode(""), 0,1, "L");

		$this->SetFont('Tahoma','B',8);
		$this->Cell(49.5,4, utf8_decode("Vr. Pago (Orçamentário) : "), 0,0, "L");
		$this->Cell(49.5,4, utf8_decode("Vr. Pago (Restos a Pagar) : "), 0,0, "L");
		$this->Cell(49.5,4, utf8_decode("Vr. Pago : "), 0,0, "L");
		$this->Cell(49.5,4, utf8_decode("Vr. Liquidado : "), 0,1, "L");
		$this->SetFont('Tahoma','',9);
		$this->Cell(49.5,4, utf8_decode($html->find('table[class=relatorio]',0)->find('tr',22)->find('td',0)->plaintext), 0,0, "L");
		$this->Cell(49.5,4, utf8_decode($html->find('table[class=relatorio]',0)->find('tr',22)->find('td',1)->plaintext), 0,0, "L");
		$this->Cell(49.5,4, utf8_decode($html->find('table[class=relatorio]',0)->find('tr',22)->find('td',2)->plaintext), 0,0, "L");
		$this->Cell(49.5,4, utf8_decode($html->find('table[class=relatorio]',0)->find('tr',22)->find('td',3)->plaintext), 0,1, "L");

		$this->Cell(198,1, utf8_decode(""), 0,1, "L");

		$this->Cell(198,4, utf8_decode("PROCESSO ADMINISTRATIVO"), 1,1, "L");

		$this->Cell(198,1, utf8_decode(""), 0,1, "L");

		$this->SetFont('Tahoma','B',8);
		$this->Cell(13,4,  utf8_decode("Tipo : "), 0,0, "L");
		$this->SetFont('Tahoma','',9);
		$this->Cell(185,4, utf8_decode(substr(trim($html->find('table[class=relatorio]',2)->find('tr',0)->find('td',0)->plaintext) , 6) ) , 0,1, "L");

		$this->Cell(198,1, utf8_decode(""), 0,1, "L");

		$this->SetFont('Tahoma','B',8);
		$this->Cell(18 , 4,  utf8_decode("Número : "), 0,0, "L");
		$this->SetFont('Tahoma','',9);
		$this->Cell(36.5,4, utf8_decode(substr(trim($html->find('table[class=relatorio]',2)->find('tr',2)->find('td',0)->plaintext) , 8) ) , 0,0, "L");

		$this->SetFont('Tahoma','B',8);
		$this->Cell(18 , 4,  utf8_decode("Data : "), 0,0, "L");
		$this->SetFont('Tahoma','',9);
		$this->Cell(21.5,4, utf8_decode(substr(trim($html->find('table[class=relatorio]',2)->find('tr',2)->find('td',1)->plaintext) , 5) ) , 0,0, "L");

		$this->SetFont('Tahoma','B',8);
		$this->Cell(25 , 4,  utf8_decode("Modalidade : "), 0,0, "L");
		$this->SetFont('Tahoma','',9);
		$this->Cell(24.5,4, utf8_decode(substr(trim($html->find('table[class=relatorio]',2)->find('tr',2)->find('td',2)->plaintext) , 11) ) , 0,0, "L");

		$this->SetFont('Tahoma','B',8);
		$this->Cell(18 , 4,  utf8_decode("Tipo : "), 0,0, "L");
		$this->SetFont('Tahoma','',9);
		$this->Cell(36.5,4, substr($html->find('table[class=relatorio]',2)->find('tr',2)->find('td',3)->plaintext, 5)  , 0,1, "L");

		$this->Cell(198,1, utf8_decode(""), 0,1, "L");

		$this->Cell(198,4, utf8_decode("CONTRATO"), 1,1, "L");

		$this->Cell(198,1, utf8_decode(""), 0,1, "L");

		$this->SetFont('Tahoma','B',8);
		$this->Cell(18 , 4,  utf8_decode("Número : "), 0,0, "L");
		$this->SetFont('Tahoma','',9);
		$this->Cell(36.5,4, utf8_decode(substr(trim($html->find('table[class=relatorio]',4)->find('tr',1)->find('td',0)->plaintext) , 9) ) , 0,0, "L");

		$this->SetFont('Tahoma','B',8);
		$this->Cell(18 , 4,  utf8_decode("Data : "), 0,0, "L");
		$this->SetFont('Tahoma','',9);
		$this->Cell(21.5,4, utf8_decode(substr(trim($html->find('table[class=relatorio]',4)->find('tr',1)->find('td',1)->plaintext) , 8) ) , 0,0, "L");

		$this->SetFont('Tahoma','B',8);
		$this->Cell(25 , 4,  utf8_decode("Modalidade : "), 0,0, "L");
		$this->SetFont('Tahoma','',9);
		$this->Cell(24.5,4, utf8_decode(substr(trim($html->find('table[class=relatorio]',4)->find('tr',1)->find('td',2)->plaintext) , 11) ) , 0,0, "L");

		$this->SetFont('Tahoma','B',8);
		$this->Cell(18 , 4,  utf8_decode("Tipo : "), 0,0, "L");
		$this->SetFont('Tahoma','',9);
		$this->Cell(36.5,4, utf8_decode(substr(trim($html->find('table[class=relatorio]',4)->find('tr',1)->find('td',3)->plaintext) , 6) ) , 0,1, "L");

		$this->Cell(198,1, utf8_decode(""), 0,1, "L");

		$this->SetFont('Tahoma','B',8);
		$this->Cell(20 , 4,  utf8_decode("Original : "), 0,0, "L");
		$this->SetFont('Tahoma','',9);
		$this->Cell(178,4, utf8_decode(substr(trim($html->find('table[class=relatorio]',4)->find('tr',1)->find('td',0)->plaintext) , 9) ) , 0,1, "L");

		$this->Cell(198,1, utf8_decode(""), 0,1, "L");

		$this->Cell(198,4, utf8_decode("ORIGEM DOS RECURSOS"), 1,1, "L");

		$this->Cell(198,1, utf8_decode(""), 0,1, "L");

		$this->SetFont('Tahoma','B',8);
		$this->Cell(25 , 4,  utf8_decode("Tipo Recurso : "), 0,0, "L");
		$this->SetFont('Tahoma','',9);
		$this->Cell(14.6,4, utf8_decode(substr(trim($html->find('table[class=relatorio]',6)->find('tr',0)->find('td',0)->plaintext) , 16) ) , 0,0, "L");

		$this->SetFont('Tahoma','B',8);
		$this->Cell(25 , 4,  utf8_decode("Seq. Recurso : "), 0,0, "L");
		$this->SetFont('Tahoma','',9);
		$this->Cell(14.6,4, utf8_decode(substr(trim($html->find('table[class=relatorio]',6)->find('tr',0)->find('td',1)->plaintext) , 13) ) , 0,0, "L");

		$this->SetFont('Tahoma','B',8);
		$this->Cell(25 , 4,  utf8_decode("Dt Convênio : "), 0,0, "L");
		$this->SetFont('Tahoma','',9);
		$this->Cell(14.6,4, utf8_decode(substr(trim($html->find('table[class=relatorio]',6)->find('tr',0)->find('td',2)->plaintext) , 15) ) , 0,0, "L");

		$this->SetFont('Tahoma','B',8);
		$this->Cell(26 , 4,  utf8_decode("Seq. Convênio : "), 0,0, "L");
		$this->SetFont('Tahoma','',9);
		$this->Cell(17.6,4, utf8_decode(substr(trim($html->find('table[class=relatorio]',6)->find('tr',0)->find('td',3)->plaintext) , 15) ) ,0 ,0, "L");

		$this->SetFont('Tahoma','B',8);
		$this->Cell(15 , 4,  utf8_decode("Valor : "), 0,0, "L");
		$this->SetFont('Tahoma','',9);
		$this->Cell(20.6,4, utf8_decode(substr(trim($html->find('table[class=relatorio]',6)->find('tr',0)->find('td',4)->plaintext) , 7) ) , 0,1, "L");

		$this->setFont('Arial' , "I", 9);
		//$this->text(198,285,utf8_decode($this->PageNo() . '/{nb}'));
		$this->SetFont('Tahoma','',9);

		$tb_index = 0;
		$t = 0;
		foreach($html->find('table[class=relatorio]') as $tb) 
			{
			 	// $t .= ", " . utf8_decode("N° da NP:");
			     if( utf8_decode($tb->find('tr',0)->find('td',0)->plaintext) == utf8_decode("LIQUIDAÇÃO") ) 
				      {
				      	$this->Cell(198,1, utf8_decode(""), 0,1, "L");

						$this->Cell(198,4, utf8_decode("LIQUIDAÇÃO"), 1,1, "L");

						$this->Cell(198,1, utf8_decode(""), 0,1, "L");

						$this->SetFont('Tahoma','B',8);
						$this->Cell(33,4, utf8_decode("Data : "), 0,0, "L");
						$this->Cell(33,4, utf8_decode("Doc. Ref : "), 0,0, "L");
						$this->Cell(33,4, utf8_decode("Sub-Empenho : "), 0,0, "L");
						$this->Cell(33,4, utf8_decode("Valor : "), 0,0, "L");
						$this->Cell(66,4, utf8_decode("Responsável : "), 0,1, "L");
						$this->SetFont('Tahoma','',9);
						$this->Cell(33, 4, utf8_decode($html->find('table[class=relatorio]',$tb_index+1)->find('tr',1)->find('td',0)->plaintext), 0,0, "L");
						$this->Cell(33,4, utf8_decode($html->find('table[class=relatorio]',$tb_index+1)->find('tr',1)->find('td',1)->plaintext), 0,0, "L");
						$this->Cell(33,4, utf8_decode($html->find('table[class=relatorio]',$tb_index+1)->find('tr',1)->find('td',2)->plaintext), 0,0, "L");
						$this->Cell(33,4, utf8_decode($html->find('table[class=relatorio]',$tb_index+1)->find('tr',1)->find('td',3)->plaintext), 0,0, "L");
						$this->Cell(66,4, utf8_decode($html->find('table[class=relatorio]',$tb_index+1)->find('tr',1)->find('td',4)->plaintext), 0,1, "L");
				      }
				 if( utf8_decode($tb->find('tr',0)->find('td',0)->plaintext) == utf8_decode("NOTAS FISCAIS") ) 
				      {
				      	$this->Cell(198,1, utf8_decode(""), 0,1, "L");

						$this->Cell(198,4, utf8_decode("NOTAS FISCAIS"), 1,1, "L");

						$this->Cell(198,1, utf8_decode(""), 0,1, "L");

						$this->SetFont('Tahoma','B',8);
						$this->Cell(27.8 , 4,  utf8_decode("Número : "), 0,0, "L");
						$this->SetFont('Tahoma','',9);
						$this->Cell(27.7,4, utf8_decode(trim($html->find('table[class=relatorio]',$tb_index+1)->find('tr',0)->find('td',1)->plaintext)  ) , 0,0, "L");

						$this->SetFont('Tahoma','B',8);
						$this->Cell(29.8 , 4,  utf8_decode("Data Emissão : "), 0,0, "L");
						$this->SetFont('Tahoma','',9);
						$this->Cell(29.7,4, utf8_decode(trim($html->find('table[class=relatorio]',$tb_index+1)->find('tr',0)->find('td',3)->plaintext)  ) , 0,0, "L");

						$this->SetFont('Tahoma','B',8);
						$this->Cell(19.8 , 4,  utf8_decode("Doc. Ref : "), 0,0, "L");
						$this->SetFont('Tahoma','',9);
						$this->Cell(19.7,4, utf8_decode(trim($html->find('table[class=relatorio]',$tb_index+1)->find('tr',0)->find('td',5)->plaintext) ) , 0,0, "L");

						$this->SetFont('Tahoma','B',8);
						$this->Cell(19.8 , 4,  utf8_decode("Vr Bruto : "), 0,0, "L");
						$this->SetFont('Tahoma','',9);
						$this->Cell(19.7,4, utf8_decode(trim($html->find('table[class=relatorio]',$tb_index+1)->find('tr',0)->find('td',7)->plaintext) ) , 0,1, "L");

						$this->Cell(198,1, utf8_decode(""), 0,1, "L");

						$this->SetFont('Tahoma','B',8);
						$this->Cell(27.8 , 4,  utf8_decode("Tipo : "), 0,0, "L");
						$this->SetFont('Tahoma','',9);
						$this->Cell(27.7,4, utf8_decode(trim($html->find('table[class=relatorio]',$tb_index+1)->find('tr',1)->find('td',1)->plaintext)  ) , 0,0, "L");

						$this->SetFont('Tahoma','B',8);
						$this->Cell(29.8 , 4,  utf8_decode("Selo Trânsito : "), 0,0, "L");
						$this->SetFont('Tahoma','',9);
						$this->Cell(29.7,4, utf8_decode(trim($html->find('table[class=relatorio]',$tb_index+1)->find('tr',1)->find('td',3)->plaintext)  ) , 0,0, "L");

						$this->SetFont('Tahoma','B',8);
						$this->Cell(19.8 , 4,  utf8_decode("Série Trânsito : "), 0,0, "L");
						$this->SetFont('Tahoma','',9);
						$this->Cell(19.7,4, utf8_decode(trim($html->find('table[class=relatorio]',$tb_index+1)->find('tr',1)->find('td',5)->plaintext) ) , 0,0, "L");

						$this->SetFont('Tahoma','B',8);
						$this->Cell(19.8 , 4,  utf8_decode("Desconto : "), 0,0, "L");
						$this->SetFont('Tahoma','',9);
						$this->Cell(19.7,4, utf8_decode(trim($html->find('table[class=relatorio]',$tb_index+1)->find('tr',1)->find('td',7)->plaintext) ) , 0,1, "L");

						$this->Cell(198,1, utf8_decode(""), 0,1, "L");

						$this->SetFont('Tahoma','B',8);
						$this->Cell(27.8 , 4,  utf8_decode("Série NF : "), 0,0, "L");
						$this->SetFont('Tahoma','',9);
						$this->Cell(27.7,4, utf8_decode(trim($html->find('table[class=relatorio]',$tb_index+1)->find('tr',2)->find('td',1)->plaintext)  ) , 0,0, "L");

						$this->SetFont('Tahoma','B',8);
						$this->Cell(29.8 , 4,  utf8_decode("Dt Limite da NF : "), 0,0, "L");
						$this->SetFont('Tahoma','',9);
						$this->Cell(29.7,4, utf8_decode(trim($html->find('table[class=relatorio]',$tb_index+1)->find('tr',2)->find('td',3)->plaintext)  ) , 0,0, "L");

						$this->SetFont('Tahoma','B',8);
						$this->Cell(19.8 , 4,  utf8_decode(""), 0,0, "L");
						$this->SetFont('Tahoma','',9);
						$this->Cell(19.7,4, utf8_decode("") , 0,0, "L");

						$this->SetFont('Tahoma','B',8);
						$this->Cell(19.8 , 4,  utf8_decode("Vr Líquido : "), 0,0, "L");
						$this->SetFont('Tahoma','',9);
						$this->Cell(19.7,4, utf8_decode(trim($html->find('table[class=relatorio]',$tb_index+1)->find('tr',2)->find('td',7)->plaintext) ) , 0,1, "L");

						$this->Cell(198,1, utf8_decode(""), 0,1, "L");

						$this->SetFont('Tahoma','B',8);
						$this->Cell(27.8 , 4,  utf8_decode("UF do emitente : "), 0,0, "L");
						$this->SetFont('Tahoma','',9);
						$this->Cell(27.7,4, utf8_decode(trim($html->find('table[class=relatorio]',$tb_index+1)->find('tr',3)->find('td',1)->plaintext)  ) , 0,0, "L");

						$this->SetFont('Tahoma','B',8);
						$this->Cell(29.8 , 4,  utf8_decode("N° CGF Emitente : "), 0,0, "L");
						$this->SetFont('Tahoma','',9);
						$this->Cell(29.7,4, utf8_decode(trim($html->find('table[class=relatorio]',$tb_index+1)->find('tr',3)->find('td',3)->plaintext)  ) , 0,0, "L");

						$this->SetFont('Tahoma','B',8);
						$this->Cell(19.8 , 4,  utf8_decode(""), 0,0, "L");
						$this->SetFont('Tahoma','',9);
						$this->Cell(19.7,4, utf8_decode("") , 0,0, "L");

						$this->SetFont('Tahoma','B',8);
						$this->Cell(19.8 , 4,  utf8_decode(""), 0,0, "L");
						$this->SetFont('Tahoma','',9);
						$this->Cell(19.7,4, utf8_decode("") , 0,1, "L");

						$this->Cell(198,1, utf8_decode(""), 0,1, "L");

						$this->SetFont('Tahoma','B',8);
						$this->Cell(27.8 , 4,  utf8_decode("N° Formulário(s) : "), 0,0, "L");
						$this->SetFont('Tahoma','',9);
						$this->Cell(170.2,4, utf8_decode(trim($html->find('table[class=relatorio]',$tb_index+1)->find('tr',4)->find('td',1)->plaintext)  ) , 0,1, "L");

						$this->Cell(198,1, utf8_decode(""), 0,1, "L");
										

						foreach($html->find('table[class=relatorio]', $tb_index+2 )->find('tr') as $tb_itens) 
							{
								if($tb_itens->find('td',0)->plaintext != "&nbsp;") 
									{

										$this->Cell(10,4, utf8_decode( trim($tb_itens->find('td',0)->plaintext) ), 0,0, "R");

										$this->MultiCell(123,4, utf8_decode( trim($tb_itens->find('td',1)->plaintext)), 0, "L");

										$x = $this->GetX();
										$y = $this->GetY();
										$this->SetXY($x + 136, $y - 4);

										$this->SetFont('Tahoma','B',8);
										$this->Cell(20,4, utf8_decode($tb_itens->find('td',2)->plaintext), 0, "R");

										$this->Cell(10,4, utf8_decode($tb_itens->find('td',3)->plaintext), 0,0, "R");
										$this->Cell(15,4, utf8_decode($tb_itens->find('td',4)->plaintext), 0,0, "R");
										$this->Cell(17,4, utf8_decode($tb_itens->find('td',5)->plaintext), 0,1, "R");
										$this->SetFont('Tahoma','',9);
									}
								else 
									{
										$this->SetFont('Tahoma','B',8);
										$this->Cell(198,4, utf8_decode($tb_itens->find('td',5)->plaintext), 0,1, "R");
										$this->SetFont('Tahoma','',9);
									}	


								

								$this->Cell(198,2, utf8_decode( ""), 0,1, "L");

								$this->Line(6, $this->GetY(), 204, $this->GetY());

								$this->Cell(198,2, utf8_decode( ""), 0,1, "L");

							}	

						
				      }   
				 if( utf8_decode( $tb->find('tr',0)->find('td',0)->plaintext ) == utf8_decode("N° da NP:") ) 
				      {
						$this->Cell(198,1, utf8_decode(""), 0,1, "L");

						if($t == 0) {
							$this->Cell(198,4, utf8_decode("NOTAS DE PAGAMENTOS E CHEQUES/DOCUMENTOS BANCÁRIOS"), 1,1, "L");
						}
						

						$this->Cell(198,1, utf8_decode(""), 0,1, "L");

						$this->SetFont('Tahoma','B',8);
						$this->Cell(22.8 , 4, utf8_decode("N° da NP:") , 0,0, "L");
						$this->SetFont('Tahoma','',9);
						$this->Cell(22.7,4, utf8_decode(trim($html->find('table[class=relatorio]',$tb_index)->find('tr',0)->find('td',1)->plaintext)  ) , 0,0, "L");

						$this->SetFont('Tahoma','B',8);
						$this->Cell(22.8 , 4,  utf8_decode("Sub-Empenho : "), 0,0, "L");
						$this->SetFont('Tahoma','',9);
						$this->Cell(22.7,4, utf8_decode(trim($html->find('table[class=relatorio]',$tb_index)->find('tr',0)->find('td',3)->plaintext)  ) , 0,0, "L");

						$this->SetFont('Tahoma','B',8);
						$this->Cell(19.8 , 4,  utf8_decode("Data da NP : "), 0,0, "L");
						$this->SetFont('Tahoma','',9);
						$this->Cell(19.7,4, utf8_decode(trim($html->find('table[class=relatorio]',$tb_index)->find('tr',0)->find('td',5)->plaintext) ) , 0,0, "L");

						$this->SetFont('Tahoma','B',8);
						$this->Cell(16.8 , 4,  utf8_decode("Doc Caixa : "), 0,0, "L");
						$this->SetFont('Tahoma','',9);
						$this->Cell(16.7,4, utf8_decode(trim($html->find('table[class=relatorio]',$tb_index)->find('tr',0)->find('td',7)->plaintext) ) , 0,0, "L");

						$this->SetFont('Tahoma','B',8);
						$this->Cell(13 , 4,  utf8_decode("Valor : "), 0,0, "L");
						$this->SetFont('Tahoma','',9);
						$this->Cell(20.7,4, utf8_decode(trim($html->find('table[class=relatorio]',$tb_index)->find('tr',0)->find('td',9)->plaintext) ) , 0,1, "R");
						$t = 1;
				      	
				      }   

				 if( utf8_decode( $tb->find('tr',0)->find('td',0)->plaintext ) == utf8_decode("Banco") ) 
				      {
						$this->Cell(198,1, utf8_decode(""), 0,1, "L");

						$this->SetFont('Tahoma','B',8);
						$this->Cell(198,4, utf8_decode("CHEQUES / DOC. BANCÁRIOS"), 0,1, "L");
						$this->SetFont('Tahoma','',9);

						//$this->Cell(198,1, utf8_decode(""), 0,1, "L");

						$this->SetFont('Tahoma','B',8);
						$this->Cell(20 , 4, utf8_decode("Banco") , 0,0, "L");
						$this->Cell(20 , 4,  utf8_decode("Agência"), 0,0, "L");
						$this->Cell(23 , 4,  utf8_decode("Conta"), 0,0, "L");
						$this->Cell(25 , 4,  utf8_decode("Cheque/Doc"), 0,0, "L");
						$this->Cell(20 , 4,  utf8_decode("Data"), 0,0, "L");
						$this->Cell(70 , 4,  utf8_decode("Tipo de Documento"), 0,0, "L");
						$this->Cell(20 , 4,  utf8_decode("Valor"), 0,1, "R");
						$this->SetFont('Tahoma','',9);


						$this->Cell(20 , 4, utf8_decode(trim($html->find('table[class=relatorio]',$tb_index)->find('tr',1)->find('td',0)->plaintext) ) , 0,0, "L");
						$this->Cell(20 , 4,  utf8_decode(trim($html->find('table[class=relatorio]',$tb_index)->find('tr',1)->find('td',1)->plaintext) ), 0,0, "L");
						$this->Cell(23 , 4,  utf8_decode(trim($html->find('table[class=relatorio]',$tb_index)->find('tr',1)->find('td',2)->plaintext) ), 0,0, "L");
						$this->Cell(25 , 4,  utf8_decode(trim($html->find('table[class=relatorio]',$tb_index)->find('tr',1)->find('td',3)->plaintext) ), 0,0, "L");
						$this->Cell(20 , 4,  utf8_decode(trim($html->find('table[class=relatorio]',$tb_index)->find('tr',1)->find('td',4)->plaintext) ), 0,0, "L");
						$this->Cell(70 , 4,  utf8_decode(trim($html->find('table[class=relatorio]',$tb_index)->find('tr',1)->find('td',5)->plaintext) ), 0,0, "L");
						$this->Cell(20 , 4,  utf8_decode(trim($html->find('table[class=relatorio]',$tb_index)->find('tr',1)->find('td',6)->plaintext) ), "B",1, "R");
						


						$this->Cell(198 , 4,  utf8_decode(trim($html->find('table[class=relatorio]',$tb_index)->find('tr',2)->find('td',6)->plaintext) ), 0,1, "R");
						
				      	
				      }        

				 if( utf8_decode( $tb->find('tr',0)->find('td',0)->plaintext ) == utf8_decode("Código") ) 
				      {
						$this->Cell(198,1, utf8_decode(""), 0,1, "L");

						$this->SetFont('Tahoma','B',8);
						$this->Cell(198,4, utf8_decode("DEDUÇÕES"), 0,1, "L");
						$this->SetFont('Tahoma','',9);

						$xx = 0;
						foreach($html->find('table[class=relatorio]', $tb_index )->find('tr') as $tb_deducoes) 
							{
								$this->Cell(20 , 4, utf8_decode($tb_deducoes->find('td',0)->plaintext) , 0,0, "L");
								$this->Cell(115 , 4,  utf8_decode($tb_deducoes->find('td',1)->plaintext), 0,0, "L");
								$this->Cell(35 , 4,  utf8_decode($tb_deducoes->find('td',2)->plaintext), 0,0, "L");
								
								if(utf8_decode($tb_deducoes->find('td',0)->plaintext) == "") 
									{
										$this->SetFont('Tahoma','B',8);
										$this->Cell(28 , 4,  utf8_decode($tb_deducoes->find('td',6)->plaintext), "",1, "R");
										$this->SetFont('Tahoma','',9);
									}
								else {
									$this->Cell(28 , 4,  utf8_decode($tb_deducoes->find('td',6)->plaintext), "B",1, "R");	
								}	
								
							} 

				      	
				      }        




				 $tb_index++;     
			}
		$this->Cell(198,2, utf8_decode("") , 0,1, "R");
		$this->Line(6, $this->GetY(), 204, $this->GetY());	
		$this->SetFont('Tahoma','B',8);
		$this->Cell(198,4, utf8_decode(trim($html->find('table[class=relatorio]',$tb_index-1)->find('tr',0)->find('td',0)->plaintext) ) , 0,1, "R");	
		//$this->MultiCell(198,4, $t, 1, "L");	
		



		
	}

	function AcceptPageBreak()
	{
	    $this->addPAge();
		$this->Cell(10,4, utf8_decode( "" ), 0,0, "L");
	} 	
	
}




$pdf = new myPDF('p', 'mm', 'A4');
$pdf->SetMargins(6,6,6);
$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 25);	
$pdf->addPage();	
$pdf->nt_pdf();	

$pdf->Output("D");


?>

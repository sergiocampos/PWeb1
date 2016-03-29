<?php
header("Content-Type: text/xml"); // informa o tipo do arquivo ao navegador 
header("Content-Length: ".filesize($nomeArquivo)); // informa o tamanho do arquivo ao navegador 
header("Content-Disposition: attachment; filename=xml_cd.xml"); // informa ao navegador que é tipo anexo e faz abrir a janela de download, tambem informa o nome do arquivo 
		try {
			$bdh = new PDO("mysql:host=localhost;dbname=gravadora","root","tguide");

			$sql="select * from cd";

			$dom = new DOMDocument('1.0',"UTF-8");
			
			$root = $dom->createElement('cds');
			$dom->appendChild($root);
		
			foreach ($bdh->query($sql) as $key) {
				$element = $dom->createElement('cd');
				
				$domAtributo = $dom->createAttribute('codigo');
				$domAtributo->nodeValue = 	$key['cod_cd'];
				

				$elementTitulo = $dom->createElement('titulo',$key['titulo']);
				
				
				$elementData = $dom->createElement('data_lancamento',$key['data_lancamento']);
				$elementCantor = $dom->createElement('cantor',$key['cantor_fk']);

				$element->appendChild($domAtributo);
				$element->appendChild($elementTitulo);
				$element->appendChild($elementData);
				$element->appendChild($elementCantor);

				$root->appendChild($element);
								
				}	

			$bdh=null;
			
		} catch(PDOException $e){

					echo $e->getMessage();
		}

$nomeArquivo ="xml_cd.xml";
$dom->save($nomeArquivo);
readfile($nomeArquivo); // lê o arquivo
?>
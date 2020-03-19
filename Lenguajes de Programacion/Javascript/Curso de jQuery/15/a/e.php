<?php
	$entradas = array(	'EDUCAR' => array(	'parte' => 'v.t.',
											'definicion' => 'Dirigir, encaminar, doctrinar.',
											'cita' => array('Desarrollar o perfeccionar las facultades  intelectuales',
															'y morales del ni&ntilde;o o del joven por medio de preceptos,',
															'ejercicios, ejemplos, etc. <em>Educar la inteligencia, la voluntad.</em>',
															'Desarrollar las fuerzas f&iacute;sicas por medio del ejercicio,',
															' haci&eacute;ndolas m&aacute;s aptas para su fin.',
															'Perfeccionar, afinar los sentidos. <em>Educar el gusto.</em>',      
															'Ense&ntilde;ar los buenos usos de urbanidad y cortes&iacute;a.',      
													),
											'autor' => 'Real Academia',
									),
						'EDITORIAL' => array('parte' => 'adj.',
												'definicion' => 'Perteneciente o relativo a editores o ediciones. Art&iacute;culo de fondo no firmado. Casa editora.',
											),
						'ECHAR' => array('parte' => 'v.t.',
											'definicion' => 'Hacer que algo vaya a parar a alguna parte, d&aacute;ndole impulso. <em>Echar mercanc&iacute;as al mar</em> <em>Echar basura a la calle</em>. Despedir de s&iacute; algo. <em>Echar olor, sangre, chispas</em>. Hacer que algo caiga en sitio determinado. <em>Echar dinero en un saco</em> <em>Echar una carta al buz&oacute;n</em>',
										),
						'ECO' => array(	'parte' => 'n.',
										'definicion' => 'Repetici&oacute;n de un sonido reflejado por un cuerpo duro. Persona o cosa que imita o repite servilmente aquello que otro dice o que se dice en otra parte. Cosa que est&aacute; notablemente influida por un antecedente o procede de &eacute;l. Sonido que se percibe d&eacute;bil y confusamente. <em>Los ecos del tambor, de la campana.</em>Composici&oacute;n po&eacute;tica en que se repite dentro o fuera del verso parte de  un vocablo, o un vocablo entero, especialmente si es monos&iacute;labo, para  formar nueva palabra significativa y que sea como <strong>eco</strong> de la anterior. Repetici&oacute;n de las &uacute;ltimas s&iacute;labas o palabras que se cantan a media voz  por distinto coro de m&uacute;sicos, y en los &oacute;rganos se hace por registro  distinto hecho a prop&oacute;sito para este fin.',
									),
						'ELOCUENCIA' => array(	'parte' => 'n.',
												'definicion' => 'Facultad de hablar o escribir de modo eficaz para deleitar, conmover o persuadir. Eficacia para persuadir o conmover que tienen las palabras, los gestos  o ademanes y cualquier otra acci&oacute;n o cosa capaz de dar a entender algo  con viveza. <em>La elocuencia de los hechos, de las cifras.</em>',
											),
						'ECUATORIAL' => array('parte' => 'adj.',
												'definicion' => 'Perteneciente o relativo al Ecuador.',
												'cita' => array('<em> Astronom&iacute;a.</span></em> Se dice del dispositivo paral&aacute;ctico con que pueden medirse coordenadas celestes.',
																'<em> Astronom&iacute;a.</span></em> Telescopio, refractor o reflector, ',
																'dotado de montura <strong>ecuatorial.</strong>',
															),
												'autor' => 'REAL ACADEMIA',
											),
						'EDIFICIO' => array('parte' => 'n.',
											'definicion' => 'Construcci&oacute;n fija, hecha con materiales resistentes, para habitaci&oacute;n humana o para otros usos.',
										),
						'EDICTO' => array('parte' => 'n.',
											'definicion' => 'Mandato, decreto publicado con autoridad del pr&iacute;ncipe o del magistrado. Escrito que se fija en los lugares p&uacute;blicos de las ciudades y poblados,  y en el cual se da noticia de algo para que sea notorio a todos.',
										),
						'EJE' => array('parte' => 'n.',
										'definicion' => 'Barra, varilla o pieza similar que atraviesa un cuerpo giratorio y le sirve de sost&eacute;n en el movimiento. Idea fundamental en un raciocinio. Tema predominante en un escrito o discurso. Sost&eacute;n principal de una empresa. Designio final de una conducta. Persona o cosa considerada como el centro de algo, y en torno a la cual gira lo dem&aacute;s.',
									),
						'ELEGIR' => array('parte' => 'v.t.',
											'definicion' => 'Escoger, preferir a alguien o algo para un fin. Nombrar por elecci&oacute;n para un cargo o dignidad.',
										),
						'ELOCUENCIA' => array('parte' => 'n.',
												'definicion' => 'Facultad de hablar o escribir de modo eficaz para deleitar, conmover o persuadir. Eficacia para persuadir o conmover que tienen las palabras, los gestos  o ademanes y cualquier otra acci&oacute;n o cosa capaz de dar a entender algo  con viveza. <em>La elocuencia de los hechos, de las cifras.</em>',
											),
					);
	
	if(isset($entradas[strtoupper($_REQUEST['termino'])])){
		$entrada = $entradas[strtoupper($_REQUEST['termino'])];
		
		$html = '<div class="entrada">';
		
		$html .= '<h3 class="termino">';
		$html .= strtoupper($_REQUEST['termino']);
		$html .= '</h3>';
		
		$html .= '<div class="parte">';
		$html .= $entrada['parte'];
		$html .= '</div>';
		
		$html .= '<div class="definicion">';
		$html .= $entrada['definicion'];
		if(isset($entrada['cita'])){
			$html .= '<div class="cita">';
		
			foreach($entrada['cita'] as $linea){
				$html .= '<div class="cita-linea">'. $linea .'</div>';
			}
			
			if(isset($entrada['autor'])){
				$html .= '<div class="cita-autor">'. $entrada['autor'] .'</div>';
			}
			
			$html .= '</div>';
		}
		
		$html .= '</div>';
		$html .= '</div>';

		print($html);
	}
	
?>
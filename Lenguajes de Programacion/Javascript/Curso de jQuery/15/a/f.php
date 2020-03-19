<?php
	$entradas = array('FALTAR' => array('parte' => 'v.i.',
										'definicion' => 'Dicho de una cualidad o de una circunstancia: No existir en lo que debiera tenerla.<span title="verbo intransitivo">.</span> Consumirse, acabar, fallecer. No acudir a una cita u obligaci&oacute;n. Dicho de una persona o de una cosa: Estar ausente del lugar en que suele estar. <em>Antonio falta de su casa desde hace un mes.</em> Dicho de una persona o de una cosa: No estar donde deber&iacute;a. Dicho de una persona: No corresponder a lo que es, o no cumplir con lo que debe. <em>Falt&oacute; a la lealtad, a la nobleza.</em> Dejar de asistir a alguien. Tratar con desconsideraci&oacute;n o sin el debido respeto a alguien. Tener que transcurrir el tiempo que se indica para que se realice algo. <em>Faltan dos meses para las vacaciones.</em>',
									),
						'FAMA' => array('parte' => 'n.',
										'definicion' => 'Noticia o voz com&uacute;n de algo. Opini&oacute;n que las gentes tienen de alguien.',
										'cita' => array('Opini&oacute;n que la gente tiene de la excelencia de alguien en su profesi&oacute;n o arte. <em>Predicador de fama.</em>',
														'loc. verb. Divulgarse y esparcirse.',
														'loc. verb. Acreditar a alguien, darle a conocer.</p>',
														'loc. verb. Publicar, echar voz de algo.',
													),
										'autor' => 'Real Academia',
									),
						'FARO' => array('parte' => 'n.',
										'definicion' => 'Torre alta en las costas, con luz en su parte superior, para que durante la noche sirva de se&ntilde;al a los navegantes. Farol con potente reverbero. Cada uno de los focos delanteros de los veh&iacute;culos automotores. Aquello que da luz en un asunto, lo que sirve de gu&iacute;a a la inteligencia o a la conducta.',
									),
						'FAVOR' => array('parte' => 'n.',
											'definicion' => 'Ayuda, socorro que se concede a alguien. Honra, beneficio, gracia.',
											'cita' => array('Expresi&oacute;n de agrado que suelen hacer las damas.',
															'Cinta, flor u otra cosa semejante dada por una dama a un caballero, y  que en las fiestas',
															'p&uacute;blicas llevaba este en el sombrero o en el brazo.',
														),
											'autor' => 'Orm Pludge',
										),
						'FELIZ' => array('parte' => 'n.',
											'definicion' => 'Que tiene felicidad. <em>Hombre feliz.</em> <span title="Usado, usada o usadas tambi&eacute;n en sentido figurado">U. t. en sent. fig.</span> <em>Estado feliz.</em> Que causa felicidad. Dicho de un pensamiento, de una frase o de una expresi&oacute;n: Oportuno, acertado, eficaz. <em>Dicho, ocurrencia, idea feliz.</em> Que ocurre o sucede con felicidad. <em>Campa&ntilde;a feliz.</em>',
										),
						'FEMENINO' => array('parte' => 'adj.',
											'definicion' => 'Propio de mujeres. Perteneciente o relativo a ellas. Que posee los rasgos propios de la feminidad. Dicho de un ser: Dotado de &oacute;rganos para ser fecundado. Perteneciente o relativo a este ser. D&eacute;bil, endeble.<em> <span title="Gram&aacute;tica">Gram.</span></em> Perteneciente al g&eacute;nero <strong>femenino.</strong> <em>Nombre femenino. Terminaci&oacute;n femenina.</em> <span title="Usado, usada o usadas tambi&eacute;n como sustantivo">U. t. c. s.</span>',
										),
						'FERIA' => array(	'parte' => 'n.',
											'definicion' => 'Mercado de mayor importancia que el com&uacute;n, en paraje p&uacute;blico y d&iacute;as se&ntilde;alados. Fiestas que se celebran con tal ocasi&oacute;n.',
											'cita' => array('Paraje p&uacute;blico en que est&aacute;n expuestos los animales, g&eacute;neros o cosas para su venta. <em>Voy a la feria.</em> <em>En la feria hay mucha gente.',
														'Concurrencia de gente en un mercado de esta clase.',
														'Conjunto de instalaciones recreativas, como carruseles, circos, casetas  de tiro al blanco, etc., y de puestos de venta de dulces y de  chucher&iacute;as, que, con ocasi&oacute;n de determinadas fiestas, se montan en las  poblaciones.',
														'nstalaci&oacute;n donde se exponen los productos de un solo ramo industrial o  comercial, como libros, muebles, juguetes, etc., para su promoci&oacute;n y  venta.',
														'En el lenguaje eclesi&aacute;stico, cualquiera de los d&iacute;as de la semana, excepto el s&aacute;bado y domingo; p. ej., la <em>segunda feria</em> es el lunes; la <em>tercera</em>, el martes, etc.',
													),
										),
				);
				
	foreach ($entradas as $termino => $entrada){
		if(strpos($termino, strtoupper($_REQUEST['termino'])) !== FALSE){
			$html = '<div class="entrada">';

			$html .= '<h3 class="termino">';
			$html .= $termino;
			$html .= '</h3>';

			$html .= '<div class="parte">';
			$html .= $entrada['parte'];
			$html .= '</div>';

			$html .= '<div class="definicion">';
			$html .= $entrada['definicion'];
			if(isset($entrada['cita'])){
				foreach($entrada['cita'] as $linea){
					$html .= '<div class="cita-linea">'.$linea.'</div>';
				}
				
				if(isset($entrada['autor'])){
					$html .= '<div class="cita-autor">'. $entrada['autor'] .'</div>';
				}
			}
			
			$html .= '</div>';
  
			$html .= '</div>';
  
			print($html);
		}
	}
?>

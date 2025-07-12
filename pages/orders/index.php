<?php
// Decodded

use Dom\Node;

$enable_hide_numbers = $_settings->info('enable_hide_numbers');
if (isset($_GET['id']) && 0 < $_GET['id']) {
	$qry = $conn->query('SELECT *  from `order_list` where order_token = \'' . $_GET['id'] . '\'');

	if (0 < $qry->num_rows) {
		foreach ($qry->fetch_assoc() as $k => $v) {
			$$k = $v;
		}

		$customer_id = $customer_id;
	} else {
		echo '<script>alert(\'Você não tem permissão para acessar essa página.\'); ' . "\r\n" . '      location.replace(\'/\');</script>';
		exit();
	}
} else {
	echo '<script>alert(\'Você não tem permissão para acessar essa página.\'); ' . "\r\n" . '   location.replace(\'/\');</script>';
	exit();
}


echo '<div class="app-main container">' . "\r\n" . '   <div class="compra-status">' . "\r\n" . '      ';

if ($status == '1') {
	echo '         <div class="app-alerta-msg mb-2">' . "\r\n" . '            <i class="app-alerta-msg--icone bi bi-check-circle text-warning"></i>' . "\r\n" . '            <div class="app-alerta-msg--txt">' . "\r\n" . '               <h3 class="app-alerta-msg--titulo">Aguardando pagamento!</h3>' . "\r\n" . '               <p>Finalize o pagamento via PIX</p>' . "\r\n" . '            </div>' . "\r\n" . '         </div>' . "\r\n" . '      ';
}

echo "\r\n" . '      ';

if ($status == '2') {
	echo '         <div class="app-alerta-msg mb-2">' . "\r\n" . '            <i class="app-alerta-msg--icone bi bi-check-circle text-success"></i>' . "\r\n" . '            <div class="app-alerta-msg--txt">' . "\r\n" . '               <h3 class="app-alerta-msg--titulo">Compra aprovada!</h3>' . "\r\n" . '               <p>Agora é só torcer!</p>' . "\r\n" . '            </div>' . "\r\n" . '         </div>' . "\r\n" . '      ';
}

echo "\r\n" . '      ';

if ($status == '3') {
	echo '         <div class="app-alerta-msg mb-2">' . "\r\n" . '            <i class="app-alerta-msg--icone bi bi-x-circle" style="color: red;"></i>' . "\r\n" . '            <div class="app-alerta-msg--txt">' . "\r\n" . '               <h3 class="app-alerta-msg--titulo">Pedido cancelado!</h3>' . "\r\n" . '               <p>O prazo para pagamento do seu pedido expirou.</p>' . "\r\n" . '            </div>' . "\r\n" . '         </div>' . "\r\n" . '      ';
}

echo "\r\n" . '      <hr class="my-2">' . "\r\n" . '   </div>' . "\r\n" . '   ';

if ($status == '1') {
	echo '      <div class="compra-pagamento">' . "\r\n" . '         <div class="pagamentoQrCode text-center">' . "\r\n" . '            <div class="pagamento-rapido">' . "\r\n" . '               <div class="app-card card rounded-top rounded-0 shadow-none border-bottom">' . "\r\n" . '                  <div class="card-body">' . "\r\n" . '                     <div class="pagamento-rapido--progress">' . "\r\n" . '                      <div class="d-flex justify-content-center align-items-center mb-1 font-md">' . "\r\n" . '                       <div><small>Você tem</small></div>' . "\r\n" . '                       <div class="mx-1"><b class="font-md" id="tempo-restante"></b></div>' . "\r\n" . '                       <div><small>para pagar</small></div>' . "\r\n" . '                    </div>' . "\r\n" . '                    <div class="progress bg-dark bg-opacity-50">' . "\r\n" . '                       <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="barra-progresso"></div>' . "\r\n" . '                    </div>' . "\r\n" . '                 </div>                  ' . "\r\n\r\n" . '              </div>' . "\r\n" . '           </div>' . "\r\n" . '        </div>' . "\r\n" . '        <div class="app-card card rounded-bottom rounded-0 rounded-bottom b-1 border-dark mb-2">' . "\r\n" . '         <div class="card-body">' . "\r\n" . '            <div class="row justify-content-center mb-2">' . "\r\n" . '               <div class="col-12 text-start">' . "\r\n" . '                  <div class="mb-1"><span class="badge bg-success badge-xs">1</span><span class="font-xs"> Copie o código PIX abaixo.</span></div>' . "\r\n" . '                  <div class="input-group mb-2">' . "\r\n" . '                     <input id="pixCopiaCola" type="text" class="form-control" value="';
	echo $pix_code;
	echo '">' . "\r\n" . '                     <div class="input-group-append">' . "\r\n" . '                        <button onclick="copyPix()" class="app-btn btn btn-success rounded-0 rounded-end">Copiar</button>' . "\r\n" . '                     </div>' . "\r\n" . '                  </div>' . "\r\n" . '                  <div class="mb-2"><span class="badge bg-success">2</span> <span class="font-xs">Abra o app do seu banco e escolha a opção PIX, como se fosse fazer uma transferência.</span></div>' . "\r\n" . '                  <p><span class="badge bg-success">3</span> <span class="font-xs">Selecione a opção PIX cópia e cola, cole a chave copiada e confirme o pagamento.</span></p>' . "\r\n" . '               </div>' . "\r\n" . '               <div class="col-12 my-2">' . "\r\n" . '                  <p class="alert alert-warning p-2 font-xss" style="text-align: justify;">Este pagamento só pode ser realizado dentro do tempo, após este período, caso o pagamento não for confirmado os números voltam a ficar disponíveis.</p>' . "\r\n" . '               </div>' . "\r\n" . '               ';

	if ($payment_method == 'MercadoPago') {
		echo '                  <div class="col-12">' . "\r\n" . '                     <button id="check_payment" class="app-btn btn btn-success btn-sm mt-1"><i class="bi bi-check-all"></i> Já realizei o pagamento</button>' . "\r\n" . '                     <p id="timeLeft" class="font-xss mt-1"></p>' . "\r\n" . '                  </div>' . "\r\n" . '               ';
	}

	echo '            </div>' . "\r\n\r\n" . '            <div style="background-image: url(\'../assets/img/bg-btn-qr.png\'); text-align: center;"><input id="btmqr" class="btn-qr"' . "\r\n" . '               type="button" value="Mostrar QR Code" onclick="mostraqr()"></div>' . "\r\n" . '            <div id="exibeqr" class="hidden" style="display: none;">' . "\r\n" . '               <div class="input-group-append">' . "\r\n" . '                  <table style="width:100%">' . "\r\n" . '                        <tbody>' . "\r\n" . '                           <tr>' . "\r\n" . '                              <td style="width:50%; vertical-align: middle;"><b>QR Code</b>' . "\r\n" . '                                 <spam class="font-xs m-0"><br>Acesse ao app do seu banco e escolha a opção <b>Pagar com QR Code</b>, scaneie o código ao lado e confirme o pagamento.</spam>' . "\r\n" . '                              </td>' . "\r\n" . '                              <td>' . "\r\n" . '                                 ';

	if ($payment_method == 'MercadoPago') {
		echo '                                 <div id="img-qrcode" class="d-inline-block bg-white rounded">' . "\r\n" . '                                    <img src="';
		echo 'data:image/png;base64,' . $pix_qrcode;
		echo '" class="img-fluid">' . "\r\n" . '                                 </div>' . "\r\n" . '                                 ';
	}elseif ($payment_method == 'GreenPag'){
		echo '                                    <div id="img-qrcode" class="d-inline-block bg-white rounded">' . "\r\n" . '                                    <img src="';
		echo $pix_qrcode;
		echo '" class="img-fluid">' . "\r\n" . '                                 </div>' . "\r\n" . '                                 ';
	} else {
		echo '                                    <div id="img-qrcode" class="d-inline-block bg-white rounded">' . "\r\n" . '                                    <img src="';
		echo 'data:image/png;base64,' . $pix_qrcode;
		echo '" class="img-fluid">' . "\r\n" . '                                 </div>' . "\r\n" . '                                 ';
	}

	echo '                              </td>' . "\r\n" . '                           </tr>' . "\r\n" . '                        </tbody>' . "\r\n" . '                  </table>' . "\r\n" . '               </div>' . "\r\n" . '            </div>' . "\r\n" . '            <!--' . "\r\n" . '            <style>' . "\r\n" . '               .help:hover {' . "\r\n" . '                  background: var(--incrivel-primariaDarken);' . "\r\n" . '               }' . "\r\n" . '            </style>' . "\r\n" . '            <div style="text-align-last: justify;">' . "\r\n" . '               <a class="btn-qr mt-3 help" href="javascript:window.location.href=window.location.href">Já realizei o pagamento</a>' . "\r\n" . '               <a class="btn-qr mt-3 help" href="/contato">Estou com problemas</a>' . "\r\n" . '            </div>' . "\r\n" . '            -->' . "\r\n" . '         </div>' . "\r\n" . '      </div>' . "\r\n" . '      <!--' . "\r\n" . '      <div class="alert alert-info p-2 font-xss mb-2"><i class="bi bi-info-circle"></i> Após o pagamento aguarde até 5 minutos para a confirmação, caso já tenha efetuado o pagamento, clique no botão <b>Já fiz o pagamento</b>.</div>' . "\r\n" . '      -->' . "\r\n" . '   </div>' . "\r\n" . '</div>' . "\r\n";
}

echo '<div class="detalhes-compra">' . "\r\n" . '   <div class="compra-campanha mb-2">                 ' . "\r\n" . '    ';
$gt = 0;
$order_items = $conn->query('SELECT o.*, p.name as product, p.price, p.qty_numbers, p.status_display, p.subtitle, p.image_path, p.slug, p.type_of_draw, p.cotas_premiadas, p.valor_cotas' . "\r\n" . '      FROM `order_list` o' . "\r\n" . '      INNER JOIN product_list p on o.product_id = p.id' . "\r\n" . '      WHERE o.id = \'' . $id . '\'' . "\r\n" . '    ');

while ($row = $order_items->fetch_assoc()) {
	$gt += $row['price'] * $row['quantity'];
	echo "\r\n" . '      <div class="SorteioTpl_sorteioTpl__2s2Wu   pointer">' . "\r\n" . '         <div class="SorteioTpl_imagemContainer__2-pl4 col-auto ">' . "\r\n" . '            <div style="display: block; overflow: hidden; position: absolute; inset: 0px; box-sizing: border-box; margin: 0px;">' . "\r\n" . '               <img alt="Pop 110i 2022 0km" src="';
	echo validate_image($row['image_path']);
	echo '" decoding="async" data-nimg="fill" class="SorteioTpl_imagem__2GXxI" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">' . "\r\n" . '               <noscript></noscript>' . "\r\n" . '            </div>' . "\r\n" . '         </div>' . "\r\n\r\n" . '         <div class="SorteioTpl_info__t1BZr">' . "\r\n" . '            <h1 class="SorteioTpl_title__3RLtu"><a href="/campanha/';
	echo $row['slug'];
	echo '">';
	echo $row['product'];
	echo '</a></h1>' . "\r\n" . '            <p class="SorteioTpl_descricao__1b7iL" style="margin-bottom: 1px;">';
	echo (isset($row['subtitle']) ? $row['subtitle'] : '');
	echo '</p>' . "\r\n" . '            ';

	if ($row['status_display'] == 1) {
		echo '               <span class="badge bg-success blink bg-opacity-75 font-xsss">Adquira já!</span>' . "\r\n" . '            ';
	}

	echo '            ';

	if ($row['status_display'] == 2) {
		echo '               <span class="badge bg-dark blink font-xsss mobile badge-status-1">Corre que está acabando!</span>' . "\r\n" . '            ';
	}

	echo '            ';

	if ($row['status_display'] == 3) {
		echo '               <span class="badge bg-dark font-xsss mobile badge-status-3">Aguarde a campanha!</span>' . "\r\n" . '            ';
	}

	echo '            ';

	if ($row['status_display'] == 4) {
		echo '               <span class="badge bg-dark font-xsss">Concluído</span>' . "\r\n" . '            ';
	}

	echo '            ';

	if ($row['status_display'] == 6) {
		echo '               <span class="badge bg-dark font-xsss">Aguarde o sorteio!</span>' . "\r\n" . '            ';
	}

	echo "\r\n" . '         </div>' . "\r\n" . '      </div>' . "\r\n\r\n" . '   </div>' . "\r\n" . '   ' . "\r\n" . '   ';



	if ($status == '2') {
		if (isset($row['cotas_premiadas'])) {
			$cotas_pedido = array_filter(explode(',', $order_numbers));
			$cotas_premio = array_filter(explode(',', $row['cotas_premiadas']));
			$result = array_intersect($cotas_pedido, $cotas_premio);

			if (0 < count($result)) {
				echo '            <div class="detalhes app-card card mb-2" style="background:#198754;color:#fff;">' . "\r\n" . '               <div class="card-body">' . "\r\n" . '                  <div class="font-xs mb-2">' . "\r\n" . '                     🎉 Parabéns!' . "\r\n" . '                     <div class="pt-1 opacity-75 font-xs">Uma ou mais das suas cotas é uma cota premiada!</div>' . "\r\n" . '                     <div class="pt-1 opacity-75 font-xs">Cota(s) premiada(s): ';
				echo implode(',', $result);
				echo '</div>' . "\r\n" . '                     <hr style="margin: 10px 0 5px 0;">' . "\r\n" . '                     <div class="pt-1 opacity-75 font-xs">Em breve nossa equipe entrará em contato com você.</div>' . "\r\n" . '                  </div>' . "\r\n" . '               </div>' . "\r\n" . '            </div>' . "\r\n" . '            ';
			}
		}


		$sql = 'SELECT * FROM `roleta` WHERE `produto` = \'' . $product_id . '\'';
		$qryrol = $conn->query($sql);

		$sql4 = 'SELECT * FROM `product_list` WHERE `id` = ' . $product_id . '';
		$dt_prod = $conn->query($sql4)->fetch_assoc();

		$qryrol = $conn->query($sql);
		$dt_roletas = [];
		for ($i = 0; $row_roleta = $qryrol->fetch_assoc(); $i++) {
			$dt_roletas[] = $row_roleta;
		}
		$sql3 = 'SELECT SUM(quantity) FROM order_list WHERE product_id = \'' . $product_id . '\' AND status <> 3';

		$dt_quant = $conn->query($sql3)->fetch_assoc();



		$percent = ($dt_quant['SUM(quantity)'] * 100) / $dt_prod['qty_numbers'];
		
		
		if ($row['json_roleta'] == NULL) {

			if (count($dt_roletas) != 0) {
				// Inicializa as roletas
				$roletas = [];

				$quant = floor($row['quantity'] / 181);
				$id_ganhado = [];
				foreach (range(0, $quant - 1) as $i) {
					$ganhou = [];
					// $qryrol = $conn->query($sql);
					// for ($i = 0; $row_roleta = $qryrol->fetch_assoc(); $i++) {
					foreach ($dt_roletas as $row_roleta) {
						if ($row_roleta['quant'] > 0) {
							// $sql3 = 'SELECT p.qty_numbers, COUNT(o.id) AS total_orders FROM product_list p LEFT JOIN order_list o ON p.id = o.product_id AND o.status != 3 WHERE p.id = \'' . $product_id . '\' GROUP BY p.id';
							//$sql3 = 'SELECT * FROM `product_list` WHERE `id` = ' . $product_id . '';
							$sql3 = 'SELECT SUM(quantity) FROM order_list WHERE product_id = \'' . $product_id . '\' AND status <> 3';

							$dt_quant = $conn->query($sql3)->fetch_assoc();
							$date_created2 = new DateTime($row['date_created']);
							$now = new DateTime();
							$interval = $now->diff($date_created2);
							// $percentage = ($qty_numbers / max($total_orders, 1)) * 100;
							if ($interval->days < 2) {
								if ($percent >= $row_roleta['porcentagem'] and !in_array($row_roleta['id'], $id_ganhado)) {
									$ganhadores = json_decode($row_roleta['ganhadores'], true);
									$ganhadores[] = $customer_id;
									$ganhadores = json_encode($ganhadores);
									$sql = "UPDATE `roleta` SET `quant` = `quant` - 1 , `ganhadores` = ? WHERE `id` = ?";
									$stmt = $conn->prepare($sql);
									$stmt->bind_param("si", $ganhadores, $row_roleta['id']);
									$stmt->execute();
									$id_ganhado[] = $row_roleta['id'];
									$ganhou = $row_roleta;
									break;
								}
							}
						}
					}

					if ($ganhou == []) {
						$roletas[] = [
							'id' => 0,
							'status' => FALSE,
							'ganhou' => FALSE,
							'valor' => '',
							'nome' => 'Perdeu',
						];
					} else {
						$roletas[] = [
							'id' => $ganhou['id'],
							'status' => FALSE,
							'ganhou' => TRUE,
							'nome' => $ganhou['nome']
						];
					}
				}

				$jsonRoleta = json_encode($roletas);
				$stmt = $conn->prepare("UPDATE `order_list` SET `json_roleta` = '$jsonRoleta' WHERE `order_token` = '" . $row['order_token'] . "'");
				// $stmt->bindParam(':json_roleta', $jsonRoleta);
				// $stmt->bindParam(':order_token', $row['order_token']);
				$stmt->execute();
				$roletas = json_decode($jsonRoleta);
			}
		} else {
			$roletas = json_decode($row['json_roleta']);
		}
		$get_id = $_GET['id'];



		foreach ($roletas as $index => $item) {
			if ($item->status === FALSE) {

				echo '
				<div class="roleta-premiada--item d-flex py-2 px-3 rounded-2
							mb-1 text-white text-center pointer
							bg-gradient-cyan
							font-weight-600 justify-content-between" onclick="atualizarRoleta(`' . $get_id . '`,' . $index . ')">
					<span>
						<i class="bi bi-play-circle-fill"></i> Giro de Roleta 🪄
					</span>
					<span class="badge text-bg-light bg-opacity-75 text-uppercase">Girar!</span>
				</div>';
			} elseif ($item->ganhou === FALSE) {
				echo '
				<div class="roleta-premiada--item d-flex py-2 px-3 rounded-2
							mb-1 text-white text-center pointer
							bg-gradient-pink
							font-weight-600 justify-content-between">
					<span>
						<i class="bi bi-play-circle-fill"></i> Giro de Roleta 🪄
					</span>
					<span class="badge text-bg-light bg-opacity-75 text-uppercase">Aberta</span>
				</div>
				<div class="mb-2">
					<div class="row justify-content-center align-items-center py-2">
						<div class="col-auto pe-0">
							<h1><i class="bi bi-emoji-frown text-danger"></i></h1>
						</div>
						<div class="col-auto">
							<p class="mb-1">Não foi dessa vez</p>
							<p class="font-xs mb-1">sua <b>roleta não premiou</b></p>
						</div>
					</div>
				</div>';
			} elseif ($item->ganhou === TRUE) {
				echo '
				<div class="roleta-premiada--item d-flex py-2 px-3 rounded-2
							mb-1 text-white text-center pointer
							bg-gradient-green2
							font-weight-600 justify-content-between">
					<span>
						<i class="bi bi-play-circle-fill"></i> Giro de Roleta 🪄
					</span>
					<span class="badge text-bg-light bg-opacity-75 text-uppercase">Aberta</span>
				</div>
				<div class="mb-2">
					<div class="row justify-content-center align-items-center py-2">
						<div class="col-auto pe-0">
							<h1><i class="bi bi-emoji-smile text-success"></i></h1>
						</div>
						<div class="col-auto">
							<p class="mb-1"></p>
							<p class="font-xs mb-1"><b>Parabéns Você Ganhou!!</b></p>
							<p class="font-xs mb-1"><b>R$' . $item->valor . '</b></p>
						</div>
					</div>
				</div>';
			}
		}
		$valores = [];
		foreach ($dt_roletas as $row_roleta) {
			$valores[] = $row_roleta['nome'];
		}
		// $valor_cotas = $row['valor_cotas'];

		// if (empty($valor_cotas)) {
		// 	$dados_valor_cotas = json_encode([]); // Ou json_encode(new stdClass()) para um objeto vazio
		// }else{
		// 	$dados_valor_cotas = json_decode($valor_cotas, true);
		// }

		// foreach ($dados_valor_cotas as $key => $value) {
		// 	if (in_array($value, $valores)) {
		// 		array_push($valores[$value], $key);
		// 	}else{
		// 		$valores[$value] = [$key];
		// 	}
		// }
		$totalValores = count($valores);

		echo '
			
				<div id="roletaModal" class="modal">
					<div class="modal-content" style="background-color: #ffffff00;height: 100%;">
						<span class="close">&times;</span>
						<div class="roulette">
							<div class="spinner"></div>
							<div class="shadow"></div>
							<div class="markers">
								<div class="triangle"></div>
							</div>
							<div class="button">
								<span>Rodar</span>
							</div>
						</div>
					</div>
				</div>
				<script>
					var modal = document.getElementById("roletaModal");
					function atualizarRoleta(orderToken, roletaId) {
						// Configurar os dados que serão enviados
						spinner.spin(orderToken,roletaId);
						modal.style.display = "block";
						
					}
					// Get the modal

					
					
					
				</script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.min.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.3.3/backbone-min.js"></script>
	
				<script>
				window.addEventListener("load", function() {
					var script = document.createElement("script");
					script.src = "https://cdnjs.cloudflare.com/ajax/libs/velocity/1.5.2/velocity.min.js";
					script.async = true; // Garante que ele não bloqueie o carregamento.
					document.body.appendChild(script);
				});
				</script>
				
	
				<script src="/assets/js/roletaV7.js"></script>
				<script>
				
					var data = [
				';
		$rainbowColors = [
			"#9400D3",
			"#4B0082",
			"#0000FF",
			"#00FF00",
			"#FFFF00",
			"#FF7F00",
			"#FF0000",
			"#8A2BE2",
			"#6A5ACD",
			"#4169E1",
			"#4682B4",
			"#32CD32",
			"#ADFF2F",
			"#FFD700",
			"#FF4500",
			"#DC143C",
			"#C71585",
			"#DA70D6",
			"#9932CC",
			"#6495ED",
			"#87CEEB",
			"#40E0D0",
			"#20B2AA",
			"#3CB371",
			"#7FFF00",
			"#FFFFE0",
			"#FFA07A",
			"#FA8072",
			"#E9967A",
			"#FF6347",
			"#FF69B4",
			"#FF1493"
		];
		$indexColor = 0;
		$totalColors = count($rainbowColors);

		$repeatCount = 0; // Contador de repetições
		$minRepetitions = 13; // Número mínimo de repetições
		$count_while = 0;
		while ($repeatCount < $minRepetitions) {
			// foreach ($valores as $key => $value) {
			foreach ($dt_roletas as $row_roleta) {
				$currentColor = $rainbowColors[$indexColor % $totalColors];
				$nome = $row_roleta['nome'];
				$id = $row_roleta['id'];

				echo "{ id: '$id', type: 'allin', color: '$currentColor', text: '$nome', ikon: 'grade' },\n";
				$indexColor++;
				$repeatCount++;
				if ($repeatCount == 4) {
					echo '{ id: "0", type: "allin", color: "#dc0936", text: "Perdeu" },';
				}
				if ($repeatCount == 8) {
					echo '{ id: "0", type: "allin", color: "#dc0936", text: "Perdeu" },';
				}
				if ($repeatCount >= $minRepetitions) {
					break; // Sai do loop quando o número mínimo for atingido
				}
			}
			$count_while += 1;
			if ($count_while == 100) {
				break;
			}
			// break;
		}
		echo '
					{ id: "0", type: "allin", color: "#dc0936", text: "Perdeu" }

					];
					var spinner;
					
					spinner = new RouletteWheel($(".roulette"), data);
					spinner.render();
					spinner.bindEvents();
					
					spinner.on("spin:start", function(r){ console.log("spin start!") });
					spinner.on("spin:end", function(r){ 
						console.log("spin end! -->"+ r._index);
						
						var index = $("[data-index]");
						
					});
					
					
				</script>
				
				';
	}


	echo '   ' . "\r\n" . '   <div class="detalhes app-card card mb-2">' . "\r\n" . '      <div class="card-body font-xs">' . "\r\n" . '         <div class="font-xs opacity-75 mb-2 border-bottom-rgba">' . "\r\n" . '            <i class="bi bi-info-circle"></i> Detalhes da sua compra&nbsp;' . "\r\n" . '            <div class="pt-1 opacity-50 mb-1">';
	echo (isset($order_token) ? $order_token : '');
	echo '</div>' . "\r\n" . '         </div>' . "\r\n" . '         <div class="item d-flex align-items-baseline mb-1 pb-1">' . "\r\n" . '            <div class="result font-xs" style="text-transform: uppercase;">' . "\r\n" . '               ';
	$customerQuery = $conn->query('SELECT firstname, lastname, phone FROM `customer_list` WHERE id = \'' . $customer_id . '\'');
	if ($customerQuery && 0 < $customerQuery->num_rows) {
		$customer = $customerQuery->fetch_assoc();
		$firstname = $customer['firstname'];
		$lastname = $customer['lastname'];
		$phone = $customer['phone'];
	}

	$firstname = ucwords($firstname);
	$lastname = ucwords($lastname);
	echo $firstname . ' ' . $lastname . '';
	echo "\r\n" . '          </div>' . "\r\n" . '       </div>' . "\r\n" . '       <div class="item d-flex align-items-baseline mb-1 pb-1">' . "\r\n" . '         <div class="title  me-1">' . "\r\n" . '         <i class="bi bi-check-circle"></i> Transação' . "\r\n" . '         </div>' . "\r\n" . '         <div class="result font-xs">';
	echo $id;
	echo '</div>' . "\r\n" . '      </div>' . "\r\n" . '       <div class="item d-flex align-items-baseline mb-1 pb-1">' . "\r\n" . '         <div class="title  me-1"><i class="bi bi-phone"></i> Telefone</div>' . "\r\n" . '         <div class="result font-xs">';
	echo formatPhoneNumber($phone);
	echo '</div>' . "\r\n" . '      </div>' . "\r\n" . '      <div class="item d-flex align-items-baseline mb-1 pb-1">' . "\r\n" . '         <div class="title  me-1"><i class="bi bi-calendar-week"></i> Realizado em</div>' . "\r\n" . '         <div class="result font-xs">';
	echo date('d/m/Y', strtotime($date_created)) . ' às ' . date('H:i', strtotime($date_created));
	echo '</div>' . "\r\n" . '      </div>' . "\r\n" . '      <div class="item d-flex align-items-baseline mb-1 pb-1">' . "\r\n" . '         <div class="title  me-1">' . "\r\n" . '         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ticket-detailed" viewBox="0 0 16 16">' . "\r\n" . '  <path d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M5 7a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2z"/>' . "\r\n" . '  <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6zM1.5 4a.5.5 0 0 0-.5.5v1.05a2.5 2.5 0 0 1 0 4.9v1.05a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-1.05a2.5 2.5 0 0 1 0-4.9V4.5a.5.5 0 0 0-.5-.5z"/>' . "\r\n" . '</svg>' . "\r\n" . '            ';
	echo ' ' . $quantity;
	echo ' cota(s)</div>' . "\r\n" . '      </div>' . "\r\n" . '      <div class="item d-flex align-items-baseline mb-1 pb-1 border-bottom-rgba">' . "\r\n" . '         <div class="title  me-1 mb-1">' . "\r\n" . '         <i class="bi bi-wallet2"></i> Valor</div>' . "\r\n" . '         <div class="result font-xs">R$';
	echo number_format($total_amount, 2, ',', '.');
	echo '</div>' . "\r\n" . '      </div>' . "\r\n" . '      <div class="item d-flex align-items-baseline">' . "\r\n" . '         ';

	if ($status == '2') {
		echo '            <!--<div class="title  me-1">Cota(s):</div>-->' . "\r\n" . '            <div class="result font-xs" data-nosnippet="true" style="overflow:hidden;">' . "\r\n" . '            ';
		$type_of_draw = $row['type_of_draw'];
		$nCollection = array_filter(explode(',', $row['order_numbers']));
		$qty_nums = count($nCollection);

		if ($qty_nums != $row['quantity']) {
			echo '               <a class="corrigir_quantity" data-id="';
			echo $row['id'];
			echo '" quantity="';
			echo $row['quantity'] - $qty_nums;
			echo '">' . "\r\n" . '                  <button onclick="this.disabled=\'true\';" class="app-btn btn btn-danger btn-sm mt-1 font-xs"><i class="bi bi-exclamation-circle"></i> Houve um problema ao carregar seus números, clique aqui e tente novamente.</button>' . "\r\n\t\t\t\t\t" . '</a>' . "\r\n" . '            ';
		} else if (1 < $type_of_draw) {
			echo drope_format_luck_numbers_dashboard($order_numbers, $row['qty_numbers'], $class = 'bg-warning', $opt = true, $type_of_draw);
		} else if (($type_of_draw == 1) && ($status == 1) || $status == 3 && $enable_hide_numbers == 1) {
			echo 'As cotas serão geradas após o pagamento.';
		} else {
			echo drope_format_luck_numbers_dashboard($order_numbers, $row['qty_numbers'], $class = false, $opt = true, $type_of_draw);
		}
	}

	echo ' ' . "\r\n" . '      </div>' . "\r\n" . '   </div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<!--' . "\r\n" . '<div class="problems"><a class="font-xs text-muted" href="/contato">Problemas com sua compra? clique aqui.</a></div>' . "\r\n" . '-->' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n";
}

echo "\r\n" . '<script>' . "\r\n" .

	// Função para copiar o texto do campo Pix
	'  function copyPix() {' . "\r\n" .
	'    var copyText = document.getElementById("pixCopiaCola");' . "\r\n\r\n" .
	'    copyText.select();' . "\r\n" .
	'    copyText.setSelectionRange(0, 99999); ' . "\r\n\r\n" .
	'    document.execCommand("copy");' . "\r\n" .
	'    navigator.clipboard.writeText(copyText.value);' . "\r\n\r\n" .
	'    alert("Chave pix \'Copia e Cola\' copiada com sucesso!");' . "\r\n" .
	' }' . "\r\n\r\n" .

	// Função para mostrar/ocultar QR code
	' function mostraqr() {' . "\r\n" .
	'   var qrDisplay = document.getElementById(\'exibeqr\');' . "\r\n" .
	'   var button = document.getElementById(\'btmqr\');' . "\r\n" .
	'   if (qrDisplay.style.display == \'block\') {' . "\r\n" .
	'     qrDisplay.style.display = \'none\';' . "\r\n" .
	'     button.value = "Mostrar QR Code";' . "\r\n" .
	'   } else {' . "\r\n" .
	'     qrDisplay.style.display = "block";' . "\r\n" .
	'     button.value = "Ocultar QR Code";' . "\r\n" .
	'   }' . "\r\n" .
	'}' . "\r\n\r\n" .

	// Inicialização no carregamento do documento
	' $(document).ready(function() {' . "\r\n" .
	'  var tempoInicial = parseInt(\'' . $order_expiration . '\'); ' . "\r\n" .
	'  var token = \'' . (isset($order_token) ? $order_token : '') . '\';' . "\r\n" .
	'  var progressoMaximo = 100;' . "\r\n" .
	'  var tempoRestante;' . "\r\n\r\n" .

	'  if (localStorage.getItem(token)) {' . "\r\n" .
	'    tempoRestante = parseInt(localStorage.getItem(token));' . "\r\n" .
	'  } else {' . "\r\n" .
	'    tempoRestante = tempoInicial * 60;' . "\r\n" .
	'    localStorage.setItem(token, tempoRestante);' . "\r\n" .
	'  }' . "\r\n\r\n" .

	// Intervalo para atualização do tempo restante
	'  var intervalo = setInterval(function() {' . "\r\n" .
	'    var minutos = Math.floor(tempoRestante / 60);' . "\r\n" .
	'    var segundos = tempoRestante % 60;' . "\r\n" .
	'    var tempoFormatado = minutos.toString().padStart(2, \'0\') + \':\' + segundos.toString().padStart(2, \'0\');' . "\r\n" .
	'    $(\'#tempo-restante\').text(tempoFormatado);' . "\r\n" .
	'    var progresso = ((tempoInicial * 60 - tempoRestante) / (tempoInicial * 60)) * progressoMaximo;' . "\r\n" .
	'    $(\'#barra-progresso\').css(\'width\', progresso + \'%\').attr(\'aria-valuenow\', progresso);' . "\r\n" .
	'    tempoRestante--;' . "\r\n" .
	'    localStorage.setItem(token, tempoRestante);' . "\r\n" .
	'    if (tempoRestante < 0) {' . "\r\n" .
	'      clearInterval(intervalo);' . "\r\n" .
	'      localStorage.removeItem(token);' . "\r\n" .
	'    }' . "\r\n" .
	'  }, 1000);' . "\r\n\r\n";

if ($status == 1) {
	echo ' setInterval(function() {' . "\r\n" .
		'  var check = {' . "\r\n" .
		'   order_token: \'' . $order_token . '\',' . "\r\n" .
		'  };' . "\r\n" .
		'$.ajax({' . "\r\n" .
		'   type: \'POST\',' . "\r\n" .
		'   url:_base_url_+"class/Main.php?action=check_order",' . "\r\n" .
		'   data: check,' . "\r\n\r\n" .
		'   success:function(resp){' . "\r\n" .
		'      var returnedData = JSON.parse(resp);' . "\r\n" .
		'      console.log(returnedData);' . "\r\n" .
		'      if(returnedData.status == \'2\'){' . "\r\n" .
		'         (function() { setTimeout(() => location.reload(), 15000); })();' . "\r\n" .
		'      } else if(returnedData.status == \'3\'){' . "\r\n" .
		'         (function() { setTimeout(() => location.reload(), 15000); })();' . "\r\n" .
		'      }' . "\r\n" .
		'   },' . "\r\n" .
		'});' . "\r\n" .
		'}, 3000);' . "\r\n";
}


echo '});' . "\r\n\r\n" .

	// Configuração do carregamento da página
	'window.addEventListener("load", function() {' . "\r\n" .
	'  document.getElementById("check_payment").disabled=true;' . "\r\n" .
	'  document.getElementById(\'timeLeft\').innerHTML = \'O botão será liberado em alguns segundos.\';' . "\r\n" .
	'  setTimeout(function() {' . "\r\n" .
	'    document.getElementById(\'timeLeft\').innerHTML = \'\';' . "\r\n" .
	'    $("#check_payment").removeAttr("disabled");' . "\r\n" .
	'  }, 1 * 60 * 1000);' . "\r\n" .
	'});' . "\r\n\r\n" .

	// Função de click do botão de checar pagamento
	'$("#check_payment").click(function() {' . "\r\n" .
	'   $(this).attr("disabled", "disabled");' . "\r\n" .
	'   var check = {' . "\r\n" .
	'      order_token: \'' . $order_token . '\',' . "\r\n" .
	'   };' . "\r\n" .
	'   $.ajax({' . "\r\n" .
	'      type: \'POST\',' . "\r\n" .
	'      url:_base_url_+"class/Main.php?f=check_payment",' . "\r\n" .
	'      data: check,' . "\r\n" .
	'      success:function(resp){' . "\r\n" .
	'         var returnedData = JSON.parse(resp);' . "\r\n" .
	'         if(returnedData.status == \'2\'){' . "\r\n" .
	'            location.reload();' . "\r\n" .
	'         } else if(returnedData.status == \'3\'){' . "\r\n" .
	'            location.reload();' . "\r\n" .
	'         }' . "\r\n" .
	'      },' . "\r\n" .
	'   });' . "\r\n" .
	'   document.getElementById(\'timeLeft\').innerHTML = \'O botão será liberado novamente em 60 segundos.\';' . "\r\n" .
	'   setTimeout(function() {' . "\r\n" .
	'      document.getElementById(\'timeLeft\').innerHTML = \'\';' . "\r\n" .
	'      $("#check_payment").removeAttr("disabled");' . "\r\n" .
	'   }, 1 * 60 * 1000);' . "\r\n" .
	'});' . "\r\n\r\n" .

	// Correção de quantidade
	'$(\'.corrigir_quantity\').click(function(){' . "\r\n" .
	'   var id = $(this).attr(\'data-id\');' . "\r\n" .
	'   var qtd = $(this).attr(\'quantity\');' . "\r\n" .
	'   correct_quantity(id, qtd);' . "\r\n" .
	'});' . "\r\n\r\n" .

	// Função para corrigir quantidade
	'function correct_quantity($id, $qtd){' . "\r\n" .
	'   $.ajax({' . "\r\n" .
	'      url:_base_url_+"class/Main.php?f=correct_quantity",' . "\r\n" .
	'      method:"POST",' . "\r\n" .
	'      data:{id: $id, qtd: $qtd},' . "\r\n" .
	'      dataType:"json",' . "\r\n" .
	'      error: function(err) {' . "\r\n" .
	'         console.log(err);' . "\r\n" .
	'         alert("[AO15] - An error occurred.");' . "\r\n" .
	'      },' . "\r\n" .
	'      success:function(resp){' . "\r\n" .
	'         if(resp.success){' . "\r\n" .
	'            alert("[A15] - Successfully corrected!");' . "\r\n" .
	'         } else {' . "\r\n" .
	'            alert("[A15] - Could not correct!");' . "\r\n" .
	'         }' . "\r\n" .
	'      }' . "\r\n" .
	'   });' . "\r\n" .
	'}' . "\r\n" .

	'</script>' . "\r\n";

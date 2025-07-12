<?php
// Incluir CSS personalizado

// CSS para as cotas premiadas
echo '<style>
/* CSS para Cotas Premiadas - Sistema de Rifas */

/* Estilos base para cotas premiadas */
.app-titulos-premiados--item {
    border-radius: 8px;
    margin-bottom: 10px;
    padding: 15px;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

/* Cota disponível - Fundo preto */
.app-titulos-premiados--item.cota-disponivel {
    background-color: #000000 !important;
    color: #ffffff !important;
    border-color: #333333 !important;
}

.app-titulos-premiados--item.cota-disponivel .app-titulos-premiados--titulo {
    background-color: #333333 !important;
    color: #ffffff !important;
    border: 1px solid #555555 !important;
}

.app-titulos-premiados--item.cota-disponivel .app-titulos-premiados--premiacao {
    color: #ffffff !important;
    font-weight: 500;
}

.app-titulos-premiados--item.cota-disponivel .app-titulos-premiados--ganhador {
    color: #cccccc !important;
}

/* Cota vendida - Fundo vermelho */
.app-titulos-premiados--item.cota-vendida {
    background-color: #c30000 !important;
    color: #ffffff !important;
    border-color: #ff0000 !important;
    box-shadow: 0 4px 8px rgba(195, 0, 0, 0.3);
}

.app-titulos-premiados--item.cota-vendida .app-titulos-premiados--titulo {
    background-color: #ff0000 !important;
    color: #ffffff !important;
    border: 1px solid #ffffff !important;
    font-weight: bold;
}

.app-titulos-premiados--item.cota-vendida .app-titulos-premiados--premiacao {
    color: #ffffff !important;
    font-weight: 600;
}

.app-titulos-premiados--item.cota-vendida .app-titulos-premiados--ganhador {
    color: #ffffff !important;
    font-weight: bold;
}

/* Efeitos hover */
.app-titulos-premiados--item.cota-disponivel:hover {
    background-color: #1a1a1a !important;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}

.app-titulos-premiados--item.cota-vendida:hover {
    background-color: #e60000 !important;
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(195, 0, 0, 0.4);
}

/* Animações */
.app-titulos-premiados--item {
    animation: fadeInUp 0.5s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsividade */
@media (max-width: 768px) {
    .app-titulos-premiados--item {
        padding: 12px;
        margin-bottom: 8px;
    }
    
    .app-titulos-premiados--titulo {
        font-size: 14px;
    }
    
    .app-titulos-premiados--premiacao {
        font-size: 13px;
    }
}
</style>';

echo '<link rel="stylesheet" href="cotas-premiadas.css">' . "\r\n";

// Decodded

echo '<div id="overlay">' . "\r\n" . ' <div class="cv-spinner">' . "\r\n" . '  <div class="card" style="border:none; padding:10px;background: transparent;color: #fff !important;font-weight: 800;">' . "\r\n" . '  <span class="spinner mb-2" style="align-self:center;"></span>' . "\r\n" . '   <div class="text-center font-xs">' . "\r\n" . '      Estamos gerando seu pedido, aguarde...' . "\r\n" . '   </div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n";

$paid_and_pending = $pending_numbers + $paid_numbers;
$available = (int) $qty_numbers - $paid_and_pending;
$percent = ($paid_and_pending * 100) / $qty_numbers;
$enable_share = $_settings->info('enable_share');
$enable_groups = $_settings->info('enable_groups');
$telegram_group_url = $_settings->info('telegram_group_url');
$whatsapp_group_url = $_settings->info('whatsapp_group_url');
$support_number = $_settings->info('phone');
$max_discount = 0;

if ($available < $min_purchase) {
	$min_purchase = $available;
}

$enable_cpf = $_settings->info('enable_cpf');

if ($enable_cpf == 1) {
	$search_type = 'search_orders_by_cpf';
} else {
	$search_type = 'search_orders_by_phone';
}

echo '<style>' . "\r\n" . '.carousel,.carousel-inner,.carousel-item{position:relative}#overlay,.carousel-item{width:100%;display:none}@media (min-width:1200px){h3{font-size:1.75rem}}p{margin-top:0;margin-bottom:1rem}img{vertical-align:middle}button{border-radius:0;margin:0;font-family:inherit;font-size:inherit;line-height:inherit;text-transform:none}button:focus:not(:focus-visible){outline:0}[type=button],button{-webkit-appearance:button}.form-control-color:not(:disabled):not([readonly]),.form-control[type=file]:not(:disabled):not([readonly]),[type=button]:not(:disabled),[type=reset]:not(:disabled),[type=submit]:not(:disabled),button:not(:disabled){cursor:pointer}::-moz-focus-inner{padding:0;border-style:none}::-webkit-datetime-edit-day-field,::-webkit-datetime-edit-fields-wrapper,::-webkit-datetime-edit-hour-field,::-webkit-datetime-edit-minute,::-webkit-datetime-edit-month-field,::-webkit-datetime-edit-text,::-webkit-datetime-edit-year-field{padding:0}::-webkit-inner-spin-button{height:auto}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-color-swatch-wrapper{padding:0}::-webkit-file-upload-button{font:inherit;-webkit-appearance:button}::file-selector-button{font:inherit;-webkit-appearance:button}.container-fluid{--bs-gutter-x:1.5rem;--bs-gutter-y:0;width:100%;padding-right:calc(var(--bs-gutter-x) * .5);padding-left:calc(var(--bs-gutter-x) * .5);margin-right:auto;margin-left:auto}.form-control::file-selector-button{padding:.375rem .75rem;margin:-.375rem -.75rem;-webkit-margin-end:.75rem;margin-inline-end:.75rem;color:#212529;background-color:#e9ecef;pointer-events:none;border:0 solid;border-inline-end-width:1px;border-radius:0;transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;border-color:inherit}.form-control:hover:not(:disabled):not([readonly])::-webkit-file-upload-button{background-color:#dde0e3}.form-control:hover:not(:disabled):not([readonly])::file-selector-button{background-color:#dde0e3}.form-control-sm::file-selector-button{padding:.25rem .5rem;margin:-.25rem -.5rem;-webkit-margin-end:.5rem;margin-inline-end:.5rem}.form-control-lg::file-selector-button{padding:.5rem 1rem;margin:-.5rem -1rem;-webkit-margin-end:1rem;margin-inline-end:1rem}.form-floating>.form-control-plaintext:not(:-moz-placeholder-shown),.form-floating>.form-control:not(:-moz-placeholder-shown){padding-top:1.625rem;padding-bottom:.625rem}.form-floating>.form-control:not(:-moz-placeholder-shown)~label{opacity:.65;transform:scale(.85) translateY(-.5rem) translateX(.15rem)}.input-group>.form-control:not(:focus).is-valid,.input-group>.form-floating:not(:focus-within).is-valid,.input-group>.form-select:not(:focus).is-valid,.was-validated .input-group>.form-control:not(:focus):valid,.was-validated .input-group>.form-floating:not(:focus-within):valid,.was-validated .input-group>.form-select:not(:focus):valid{z-index:3}.input-group>.form-control:not(:focus).is-invalid,.input-group>.form-floating:not(:focus-within).is-invalid,.input-group>.form-select:not(:focus).is-invalid,.was-validated .input-group>.form-control:not(:focus):invalid,.was-validated .input-group>.form-floating:not(:focus-within):invalid,.was-validated .input-group>.form-select:not(:focus):invalid{z-index:4}.btn:focus-visible{color:var(--bs-btn-hover-color);background-color:var(--bs-btn-hover-bg);border-color:var(--bs-btn-hover-border-color);outline:0;box-shadow:var(--bs-btn-focus-box-shadow)}.btn-check:focus-visible+.btn{border-color:var(--bs-btn-hover-border-color);outline:0;box-shadow:var(--bs-btn-focus-box-shadow)}.btn-check:checked+.btn:focus-visible,.btn.active:focus-visible,.btn.show:focus-visible,.btn:first-child:active:focus-visible,:not(.btn-check)+.btn:active:focus-visible{box-shadow:var(--bs-btn-focus-box-shadow)}.btn-link:focus-visible{color:var(--bs-btn-color)}.carousel-inner{width:100%;overflow:hidden}.carousel-inner::after{display:block;clear:both;content:""}.carousel-item{float:left;margin-right:-100%;-webkit-backface-visibility:hidden;backface-visibility:hidden;transition:transform .6s ease-in-out}.carousel-item.active{display:block}.carousel-control-next,.carousel-control-prev{position:absolute;top:0;bottom:0;z-index:1;display:flex;align-items:center;justify-content:center;width:15%;padding:0;color:#fff;text-align:center;background:0 0;border:0;opacity:.5;transition:opacity .15s}.carousel-control-next:focus,.carousel-control-next:hover,.carousel-control-prev:focus,.carousel-control-prev:hover{color:#fff;text-decoration:none;outline:0;opacity:.9}.carousel-control-prev{left:0}.carousel-control-next{right:0}.carousel-control-next-icon,.carousel-control-prev-icon{display:inline-block;width:2rem;height:2rem;background-repeat:no-repeat;background-position:50%;background-size:100% 100%}.carousel-control-prev-icon{background-image:url("data:image/svg+xml,%3csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 16 16\' fill=\'%23fff\'%3e%3cpath d=\'M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z\'/%3e%3c/svg%3e")}.carousel-control-next-icon{background-image:url("data:image/svg+xml,%3csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 16 16\' fill=\'%23fff\'%3e%3cpath d=\'M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z\'/%3e%3c/svg%3e")}.carousel-indicators{position:absolute;right:0;bottom:0;left:0;z-index:2;display:flex;justify-content:center;padding:0;margin-right:15%;margin-bottom:1rem;margin-left:15%;list-style:none}.carousel-indicators [data-bs-target]{box-sizing:content-box;flex:0 1 auto;width:30px;height:3px;padding:0;margin-right:3px;margin-left:3px;text-indent:-999px;cursor:pointer;background-color:#fff;background-clip:padding-box;border:0;border-top:10px solid transparent;border-bottom:10px solid transparent;opacity:.5;transition:opacity .6s}@media (prefers-reduced-motion:reduce){.form-control::file-selector-button{transition:none}.carousel-control-next,.carousel-control-prev,.carousel-indicators [data-bs-target],.carousel-item{transition:none}}.carousel-indicators .active{opacity:1}.visually-hidden-focusable:not(:focus):not(:focus-within){position:absolute!important;width:1px!important;height:1px!important;padding:0!important;margin:-1px!important;overflow:hidden!important;clip:rect(0,0,0,0)!important;white-space:nowrap!important;border:0!important}.d-block{display:block!important}.mt-3{margin-top:1rem!important}.sorteio_sorteioShare__247_t{position:fixed;bottom:120px;right:12px;display:-moz-box;display:flex;-moz-box-orient:vertical;-moz-box-direction:normal;flex-direction:column}.top-compradores{display:flex;flex-wrap:wrap;margin-bottom:20px;margin-top:20px}.comprador{margin-right:3px;margin-bottom:8px;border:1px solid #198754;padding:22px;text-align:center;margin-left:10px;background:#fff;border-radius:6px;min-width:160px}.ranking{margin-bottom:5px;font-weight:700;font-size:18px}.customer-details{text-transform:uppercase;font-weight:700;font-size:14px}#overlay{position:fixed;top:0;height:100%;background:rgba(0,0,0,.8);z-index:99999999}.cv-spinner{height:100%;display:flex;justify-content:center;align-items:center}.spinner{width:40px;height:40px;border:4px solid #ddd;border-top:4px solid #2e93e6;border-radius:50%;animation:.8s linear infinite sp-anime}@keyframes sp-anime{100%{transform:rotate(360deg)}}.is-hide{display:none}@media only screen and (max-width:600px){.custom-image{height:310px!important}}@media only screen and (min-width:768px){.custom-image{height:450px!important}}

/* Estilos personalizados para degradê */
.btn-gradient-meus-numeros {
    position: absolute;
    top: 385px;
    background: linear-gradient(0deg, #000000 0%, #1a1a1a 100%) !important;
    border: none !important;
    color: white !important;
    transition: all 0.3s ease !important;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5) !important;
}
.btn-adquira-ja {
    position: absolute;
    top: -20px;
    left: 5px;
    background-color:rgb(220, 1, 1); /* amarelo destaque */
    color: #fff;
    padding: 4px 10px;
    border-radius: 8px;
    font-weight: 700;
    font-size: 0.9rem;
    animation: piscar 1s infinite;
    z-index: 9999;
}

@keyframes piscar {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.6; }
}

.btn-gradient-meus-numeros:hover {
    background: linear-gradient(0deg, #0d0d0d 0%, #262626 100%) !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.6) !important;
    color: white !important;
}
.SorteioTpl_sorteioTpl__2s2Wu {
    -webkit-box-shadow: 0 4px 3px rgba(0, 0, 0, .08);
    -moz-box-shadow: 0 4px 3px rgba(0, 0, 0, .08);
    /* box-shadow: 0 4px 3px rgba(0, 0, 0, .08); */
    background-color: var(--incrivel-cardBg);
    /* border-radius: 10px; */
    /* padding: 4px; */
    display: -moz-box;
    display: flex;
    -moz-box-align: center;
    align-items: center;
    position: relative;
    overflow: hidden
}

.SorteioTpl_sorteioTpl__2s2Wu:after {
    font-family: bootstrap-icons;
    position: absolute;
    content: "";
    font-size: 1.6em;
    color: #63ac49;
    right: 10px
}

.SorteioTpl_sorteioTpl__2s2Wu .SorteioTpl_imagemContainer__2-pl4 {
    position: relative;
    overflow: hidden;
    height: 90px;
    width: 90px
}

.SorteioTpl_sorteioTpl__2s2Wu.SorteioTpl_destaque__3vnWR {
    -moz-box-orient: vertical;
    -moz-box-direction: normal;
    flex-direction: column;
    -moz-box-align: start;
    align-items: start;
    padding: 0;
    max-width: 600px;
    margin-right: auto;
    margin-left: auto;
    top:75px;
}

.SorteioTpl_sorteioTpl__2s2Wu.SorteioTpl_destaque__3vnWR .SorteioTpl_imagem__2GXxI,
.SorteioTpl_sorteioTpl__2s2Wu.SorteioTpl_destaque__3vnWR .SorteioTpl_imagemContainer__2-pl4 {
    /* border-bottom-left-radius: 0; */
    /* border-bottom-right-radius: 0; */
    height: auto;
    width: 100%;
    margin: 0;
}

.SorteioTpl_sorteioTpl__2s2Wu.SorteioTpl_destaque__3vnWR .SorteioTpl_info__t1BZr {
    z-index: 1000;
    padding: 6px 12px;
    width: 100%;
    position: absolute;
    bottom: 0;
    background: linear-gradient(to right, rgb(0 0 0 / 36%) 60%, rgba(0, 0, 0, 0.0) 100%);
    display: flex;
    flex-direction: column;
}

.SorteioTpl_sorteioTpl__2s2Wu.SorteioTpl_destaque__3vnWR:after {
    display: none
}

.SorteioTpl_sorteioTpl__2s2Wu .SorteioTpl_imagem__2GXxI {
    /* border-radius: 10px; */
    object-fit: fill;
    height: 90px;
    width: 90px
}

.SorteioTpl_sorteioTpl__2s2Wu .SorteioTpl_imagemContainer__2-pl4 {
    margin-right: 10px
}

.SorteioTpl_sorteioTpl__2s2Wu .SorteioTpl_imagemContainer__2-pl4:before {
    border-bottom-left-radius: 0 !important;
    border-bottom-right-radius: 0 !important
}

.SorteioTpl_sorteioTpl__2s2Wu .SorteioTpl_title__3RLtu {
    color: var(--incrivel-bgLink);
    -webkit-line-clamp: 2 !important;
    margin-bottom: 1px;
    font-weight: 500;
    font-size: 1em
}

.SorteioTpl_sorteioTpl__2s2Wu .SorteioTpl_descricao__1b7iL {
    color: rgba(var(--incrivel-rgbaInvert), .7);
    font-size: .75em;
    margin: 0
}

.SorteioTpl_sorteioTpl__2s2Wu .SorteioTpl_descricao__1b7iL,
.SorteioTpl_sorteioTpl__2s2Wu .SorteioTpl_title__3RLtu {
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 1;
    display: -webkit-box;
    overflow: hidden
}

		.app-titulos-premiados--item.app-titulos-premiados--selected {
			background-color: #c30000; /* Vermelho para cotas vendidas */
		}
		
		.app-titulos-premiados--item.app-titulos-premiados--disponivel {
			background-color: #000000; /* Preto para cotas disponíveis */
		}

' . "\r\n" . '</style>' . "\r\n";

// INÍCIO DA ESTRUTURA PRINCIPAL
echo '<div class="SorteioTpl_sorteioTpl__2s2Wu SorteioTpl_destaque__3vnWR pointer">';
echo '<div class="SorteioTpl_imagemContainer__2-pl4">';
echo '<div id="carouselSorteio640d0a84b1fef407920230311" class="carousel slide carousel-dark carousel-fade" data-bs-ride="carousel">';
echo '<div class="carousel-inner">';

// GALERIA DE IMAGENS
$image_gallery = (isset($image_gallery) ? $image_gallery : '');
if (($image_gallery != '[]') && !empty($image_gallery)) {
	$image_gallery = json_decode($image_gallery, true);
	array_unshift($image_gallery, $image_path);
	$slide = 0;

	foreach ($image_gallery as $image) {
		++$slide;
		echo '<div class="custom-image carousel-item ';
		if ($slide == 1) {
			echo 'active';
		}
		echo '">' . "\r\n" . '<img alt="';
		echo (isset($name) ? $name : '');
		echo '" src="';
		echo BASE_URL;
		echo $image;
		echo '" decoding="async" data-nimg="fill" class="SorteioTpl_imagem__2GXxI">' . "\r\n" . '</div>' . "\r\n";
	}
} else {
	echo '<div class="custom-image carousel-item active">' . "\r\n" . '<img src="';
	echo validate_image((isset($image_path) ? $image_path : ''));
	echo '" alt="';
	echo (isset($name) ? $name : '');
	echo '" class="SorteioTpl_imagem__2GXxI" style="object-fit: cover;">' . "\r\n" . '</div>' . "\r\n";
}

echo '</div>' . "\r\n" . '</div>' . "\r\n";

// CONTROLES DO CAROUSEL
if (($image_gallery != '[]') && !empty($image_gallery)) {
	echo '<button class="carousel-control-prev" type="button"' . "\r\n" . 'data-bs-target="#carouselSorteio640d0a84b1fef407920230311" data-bs-slide="prev">' . "\r\n" . '<span class="carousel-control-prev-icon"></span>' . "\r\n" . '</button>' . "\r\n" . '<button class="carousel-control-next" type="button"' . "\r\n" . 'data-bs-target="#carouselSorteio640d0a84b1fef407920230311" data-bs-slide="next">' . "\r\n" . '<span class="carousel-control-next-icon"></span>' . "\r\n" . '</button>' . "\r\n";
}

echo '</div>' . "\r\n";

// INFORMAÇÕES DO PRODUTO (TÍTULO, BADGES, DESCRIÇÃO)
echo '<div class="SorteioTpl_info__t1BZr">' . "\r\n";

// BADGES DE STATUS
if ($status_display == 1) {
	echo '<span class="btn-adquira-ja">Adquira já!</span>' . "\r\n";
}
if ($status_display == 2) {
	echo '<span class="badge bg-dark blink mobile badge-status-1">Corre que está acabando!</span>' . "\r\n";
}
if ($status_display == 3) {
	echo '<span class="badge bg-dark mobile badge-status-3">Aguarde a campanha!</span>' . "\r\n";
}
if ($status_display == 4) {
	echo '<span class="badge bg-dark">Concluído</span>' . "\r\n";
}
if ($status_display == 5) {
	echo '<span class="badge bg-dark">Em breve!</span>' . "\r\n";
}
if ($status_display == 6) {
	echo '<span class="badge bg-dark">Aguarde o sorteio!</span>' . "\r\n";
}

// TÍTULO
echo '<h1 class="SorteioTpl_title__3RLtu" data-text="' . (isset($name) ? htmlspecialchars($name) : '') . '">' . "\r\n";
echo (isset($name) ? $name : '');
echo '</h1>' . "\r\n";

// DESCRIÇÃO
echo '<p class="SorteioTpl_descricao__1b7iL" style="margin-bottom: 1px;color: azure;">' . "\r\n";
echo (isset($subtitle) ? $subtitle : '');
echo '</p>' . "\r\n";

echo '</div>' . "\r\n"; // Fim SorteioTpl_info__t1BZr
echo '</div>' . "\r\n"; // Fim SorteioTpl_sorteioTpl__2s2Wu

// ÁREA "VER MEUS NÚMEROS" - POSIÇÃO CORRETA (LOGO APÓS A GALERIA E INFORMAÇÕES)
echo '<div class="campanha-header mb-2">';
echo '<div class="campanha-buscas">' . "\r\n" . '<div class="row row-gutter-sm">' . "\r\n" . '<div class="col">' . "\r\n";

if (($status_display != '4') && $status_display != '5') {
	echo '<div class="btn btn-sm btn-gradient-meus-numeros box-shadow-08 w-100" data-bs-toggle="modal" data-bs-target="#modal-consultaCompras">' . "\r\n" . '<i class="bi bi-cart"></i> Ver meus números' . "\r\n" . '</div>' . "\r\n";
}

echo '<div>' . "\r\n";

// BARRA DE PROGRESSO
if ((0 < $percent) && $enable_progress_bar == 1) {
	echo '<div class="progress mt-2">' . "\r\n" . '<div class="progress-bar bg-info progress-bar-striped fw-bold progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' . "\r\n" . '<div class="progress-bar bg-success progress-bar-striped fw-bold progress-bar-animated" role="progressbar" aria-valuenow="';
	echo number_format($percent, 2, '.', '');
	echo '" aria-valuemin="0" aria-valuemax="';
	echo $qty_numbers;
	echo '" style="width: ';
	echo number_format($percent, 2, '.', '');
	echo '%;">';
	echo number_format($percent, 2, '.', '');
	echo '%</div>' . "\r\n" . '</div>' . "\r\n";
}

echo '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n";

// INFORMAÇÕES DE PREÇO
if ($status == '1') {
	echo '<div class="container app-main"><div class="campanha-preco porApenas font-xs d-flex align-items-center justify-content-center mt-2 mb-2 font-weight-500">' . "\r\n" . '<div class="item d-flex align-items-center font-xs me-2">' . "\r\n";

	if (!empty($date_of_draw)) {
		echo '<span class="ms-2 me-1">Campanha</span>' . "\r\n" . '<div class="tag btn btn-sm bg-white bg-opacity-50 font-xss box-shadow-08">' . "\r\n";
		$dataFormatada = date('d/m/y', strtotime($date_of_draw));
		$horaFormatada = date('H\\hi', strtotime($date_of_draw));
		$date_of_draw = $dataFormatada . ' às ' . $horaFormatada;
		echo $date_of_draw;
		echo '</div>' . "\r\n";
	}

	echo '</div>' . "\r\n" . '<div class="item d-flex align-items-center font-xs">' . "\r\n" . '<div class="me-1">por apenas</div>' . "\r\n" . '<div class="tag btn btn-sm bg-cor-primaria text-cor-primaria-link box-shadow-08">R$ ';
	echo (isset($price) ? format_num($price, 2) : '');
	echo '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n";
}

// CARD DE INCENTIVO
if ($status == '1') {
	echo '<div class="app-card card mb-2">' . "\r\n" . '<div class="card-body text-center">' . "\r\n" . '<p class="font-xs">Quanto mais comprar, maiores são as suas chances de ganhar!</p>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n";
}

// AVISO DE NÚMEROS ESGOTADOS
if ($status_display == '6') {
	echo '<div class="alert alert-warning font-xss mb-2 mt-2">Todos os números já foram reservados ou pagos</div>' . "\r\n";
}

// SEÇÃO DE DESCONTOS
$discount_qty = (isset($discount_qty) ? $discount_qty : '');
$discount_amount = (isset($discount_amount) ? $discount_amount : '');
if ($discount_qty && $discount_amount && $enable_discount == 1) {
	$discount_qty = json_decode($discount_qty, true);
	$discount_amount = json_decode($discount_amount, true);
	$discounts = [];

	foreach ($discount_qty as $qty_index => $qty) {
		foreach ($discount_amount as $amount_index => $amount) {
			if ($qty_index === $amount_index) {
				$discounts[$qty_index] = ['qty' => $qty, 'amount' => $amount];
			}
		}
	}

	if (isset($discounts)) {
		$max_discount = count($discounts);
	} else {
		$max_discount = 0;
	}

	if ($status == '1') {
		echo '<div class="app-promocao-numeros mb-2">' . "\r\n" . '<div class="app-title mb-2">' . "\r\n" . '<h1>📣 Promoção</h1>' . "\r\n" . '<div class="app-title-desc">Compre mais barato!</div>' . "\r\n" . '</div>' . "\r\n" . '<div class="app-card card">' . "\r\n" . '<div class="card-body pb-1">' . "\r\n" . '<div class="row px-2">' . "\r\n";
		$count = 0;

		foreach ($discounts as $discount) {
			echo '<div class="col-auto px-1 mb-2">' . "\r\n";

			if ($user_id) {
				echo '<button onclick="qtyExpress(\'';
				echo $discount['qty'];
				echo '\', true);" class="btn btn-success w-100 btn-sm py-0 px-2 text-nowrap font-xss">' . "\r\n";
			} else {
				echo '<span id="add_to_cart"></span>' . "\r\n" . '<button data-bs-toggle="modal" data-bs-target="#loginModal" onclick="qtyExpress(\'';
				echo $discount['qty'];
				echo '\', true);" class="btn btn-success w-100 btn-sm py-0 px-2 text-nowrap font-xss">' . "\r\n";
			}

			echo '<span class="font-weight-500">' . "\r\n" . '<b class="font-weight-600"><span id="discount_qty_';
			echo $count;
			echo '">';
			echo $discount['qty'];
			echo '</span></b> <small>por R$</small> <span class="font-weight-600"><span id="discount_amount_';
			echo $count;
			echo '" style="display:none">';
			echo $discount['amount'];
			echo '</span>' . "\r\n";
			$discount_price = ($price * $discount['qty']) - $discount['amount'];
			echo number_format($discount_price, 2, ',', '.');
			echo '</span></span></button>' . "\r\n" . '</div>' . "\r\n";
			++$count;
		}

		echo '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n";
	}
}

// PROMOÇÃO SIMPLES
if (($enable_sale == 1) && $enable_discount == 0 && $status == '1') {
	echo '<div class="app-promocao-numeros mb-2">' . "\r\n" . '<div class="app-title mb-2">' . "\r\n" . '<h1>📣 Promoção</h1>' . "\r\n" . '<div class="app-title-desc">Compre mais barato!</div>' . "\r\n" . '</div>' . "\r\n" . '<div class="app-card card">' . "\r\n" . '<div class="card-body pb-1">' . "\r\n" . '<div class="row px-2">' . "\r\n" . '<div class="col-auto px-1 mb-2">' . "\r\n" . '<button onclick="qtyExpress(\'';
	echo $sale_qty;
	echo '\', false);" class="btn btn-success w-100 btn-sm py-0 px-2 text-nowrap font-xss"><span class="font-weight-500">Comprando' . "\r\n" . '<b class="font-weight-600"><span>';
	echo $sale_qty;
	echo ' cotas</span></b> sai por apenas<small> R$</small> <span class="font-weight-600">' . "\r\n";
	echo number_format($sale_price, 2, ',', '.');
	echo '</span> cada</span></button>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n";
}

// SELEÇÃO DE NÚMEROS E COMPRA
if (($paid_and_pending < $qty_numbers) && $status == '1') {
	echo '<div class="app-vendas-express mb-2">
        <div class="numeros-select d-flex align-items-center justify-content-center flex-column">
            <div class="vendasExpressNumsSelect v2">
                <div onclick="qtyExpress(' . $qty_select_1 . ', false);" class="item mb-2">
                    <div class="item-content flex-column p-2">
                        <h3 class="mb-0"><small class="item-content-plus font-xsss">+</small>' . $qty_select_1 . '</h3>
                        <p class="item-content-txt font-xss text-uppercase mb-0">Selecionar</p>
                    </div>
                </div>
                <div onclick="qtyExpress(' . $qty_select_2 . ', false);" class="item mb-2">
                    <div class="item-content flex-column p-2">
                        <h3 class="mb-0"><small class="item-content-plus font-xsss">+</small>' . $qty_select_2 . '</h3>
                        <p class="item-content-txt font-xss text-uppercase mb-0">Selecionar</p>
                    </div>
                </div>
                <div onclick="qtyExpress(' . $qty_select_3 . ', false);" class="item mb-2 mais-popular">
                    <div class="item-content flex-column p-2">
                        <h3 class="mb-0"><small class="item-content-plus font-xsss">+</small>' . $qty_select_3 . '</h3>
                        <p class="item-content-txt font-xss text-uppercase mb-0" style="color:#fff;">Selecionar</p>
                    </div>
                </div>
                <div onclick="qtyExpress(' . $qty_select_4 . ', false);" class="item mb-2">
                    <div class="item-content flex-column p-2">
                        <h3 class="mb-0"><small class="item-content-plus font-xsss">+</small>' . $qty_select_4 . '</h3>
                        <p class="item-content-txt font-xss text-uppercase mb-0">Selecionar</p>
                    </div>
                </div>
                <div onclick="qtyExpress(' . $qty_select_5 . ', false);" class="item mb-2">
                    <div class="item-content flex-column p-2">
                        <h3 class="mb-0"><small class="item-content-plus font-xsss">+</small>' . $qty_select_5 . '</h3>
                        <p class="item-content-txt font-xss text-uppercase mb-0">Selecionar</p>
                    </div>
                </div>
                <div onclick="qtyExpress(' . $qty_select_6 . ', false);" class="item mb-2">
                    <div class="item-content flex-column p-2">
                        <h3 class="mb-0"><small class="item-content-plus font-xsss">+</small>' . $qty_select_6 . '</h3>
                        <p class="item-content-txt font-xss text-uppercase mb-0">Selecionar</p>
                    </div>
                </div>
            </div>

            <div class="vendasExpressNums app-card card mb-2 w-100 font-xs">
                <div class="card-body d-flex align-items-center justify-content-center font-xss p-1">
                    <div class="left pointer">
                        <div class="removeNumero numeroChange"><i class="bi bi-dash-circle"></i></div>
                    </div>
                    <div class="center">
                        <input class="form-control text-center qty" readonly value="' . (isset($min_purchase) ? $min_purchase : '') . '" aria-label="Quantidade de números" placeholder="' . (isset($min_purchase) ? $min_purchase : '') . '">
                    </div>
                    <div class="right pointer">
                        <div class="addNumero numeroChange"><i class="bi bi-plus-circle"></i></div>
                    </div>
                </div>
            </div>
        </div>';

	if ($user_id) {
		echo '<button id="add_to_cart" data-bs-toggle="modal" data-bs-target="#modal-checkout" class="btn btn-success w-100 py-3">';
	} else {
		echo '<span id="add_to_cart"></span>
        <button data-bs-toggle="modal" data-bs-target="#loginModal" class="btn btn-success w-100 py-3">';
	}

	echo '<div class="row align-items-center" style="line-height: 85%;">
            <div class="col pe-0 text-nowrap"><i class="bi bi-check2-circle me-1"></i><span>Quero participar</span></div>
            <div class="col-auto ps-0">
                <div class="pe-3">
                    <div><span id="total">R$ ';

	if (isset($price)) {
		$price_total = $price * $min_purchase;
		echo format_num($price_total, 2);
	}

	echo '</span></div>
                </div>
            </div>
        </div>
        </button>
    </div>
	<div class="mt-2">
		<!-- Opção 1 -->
		<div class="mb-1">
			<div class="btn w-100 text-center lh-1 bg-gradient-blue text-white" data-bs-toggle="modal" data-bs-target="#loginModal" onclick="setValue(100);">
				<div class="row mb-1 font-xs">
					<div class="col pe-0 ps-0">
						<div>100 Títulos</div>
						<div class="opacity-75 font-xs"><small>por R$ </small>9,00</div>
					</div>
					<div class="col-auto">
						<div>Recebe 1</div>
						<div class="font-xs">Roletas Instantâneas</div>
					</div>
					<div class="col-auto" style="font-size:30px">🎯</div>
				</div>
				<div class="row font-xss opacity-75">
					<div class="col-12 font-xss">
						1 chance(s) de contemplação nas Roletas Instantâneas.
					</div>
				</div>
			</div>
		</div>

		<!-- Opção 2 -->
		<div class="mb-1">
			<div class="btn w-100 text-center lh-1 bg-gradient-blue text-white" data-bs-toggle="modal" data-bs-target="#loginModal" onclick="setValue(300);">
				<div class="row mb-1 font-xs">
					<div class="col pe-0 ps-0">
						<div>300 Títulos</div>
						<div class="opacity-75 font-xs"><small>por R$ </small>27,00</div>
					</div>
					<div class="col-auto">
						<div>Recebe 3</div>
						<div class="font-xs">Roletas Instantâneas</div>
					</div>
					<div class="col-auto" style="font-size:30px">🎯</div>
				</div>
				<div class="row font-xss opacity-75">
					<div class="col-12 font-xss">
						3 chance(s) de contemplação nas Roletas Instantâneas.
					</div>
				</div>
			</div>
		</div>

		<!-- Opção 3 -->
		<div class="mb-1">
			<div class="btn w-100 text-center lh-1 bg-gradient-pink text-white" data-bs-toggle="modal" data-bs-target="#loginModal" onclick="setValue(600‬);">
				<div class="row mb-1 font-xs">
					<div class="col pe-0 ps-0">
						<div>600 Títulos</div>
						<div class="opacity-75 font-xs"><small>por R$ </small>54,00</div>
					</div>
					<div class="col-auto">
						<div>Recebe 6</div>
						<div class="font-xs">Roletas Instantâneas</div>
					</div>
					<div class="col-auto" style="font-size:30px">🎯</div>
				</div>
				<div class="row font-xss opacity-75">
					<div class="col-12 font-xss">
						06 chance(s) de contemplação nas Roletas Instantâneas.
					</div>
				</div>
			</div>
		</div>
	</div>';
}

// GANHADORES
if (!empty($draw_number)) {
	$winners_qty = 5;
	$draw_number = (isset($draw_number) ? $draw_number : '');
	if ($winners_qty && $draw_number) {
		$draw_winner = json_decode($draw_winner, true);
		$draw_number = json_decode($draw_number, true);
		$winners = [];

		foreach ($draw_winner as $qty_index => $name) {
			foreach ($draw_number as $amount_index => $number) {
				$query = $conn->query('SELECT CONCAT(firstname, \' \', lastname) as name, avatar FROM customer_list WHERE phone = \'' . $name . '\'');
				$rowCustomer = $query->fetch_assoc();

				if ($qty_index === $amount_index) {
					$winners[$qty_index] = ['name' => $rowCustomer['name'], 'number' => $number, 'image' => ($rowCustomer['avatar'] ? validate_image($rowCustomer['avatar']) : BASE_URL . 'assets/img/avatar.png')];
				}
			}
		}
	}

	$count = 0;
	foreach ($winners as $winner) {
		++$count;
		echo '<div class="app-card card bg-success text-white mb-2">' . "\r\n" . '<div class="card-body">' . "\r\n" . '<div class="row align-items-center">' . "\r\n" . '<div class="col-auto">' . "\r\n" . '<div class="rounded-pill" style="width: 56px; height: 56px; position: relative; overflow: hidden;">' . "\r\n" . '<div style="display: block; overflow: hidden; position: absolute; inset: 0px; box-sizing: border-box; margin: 0px;">' . "\r\n" . '<img alt="';
		echo $winner['name'];
		echo '" src="';
		echo $winner['image'];
		echo '" decoding="async" data-nimg="fill" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">' . "\r\n" . '<noscript></noscript>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<div class="col">' . "\r\n" . '<h5 class="mb-0" style="text-transform: uppercase;">';
		echo $count;
		echo 'º - ';
		echo $winner['name'];
		echo '&nbsp;<i class="bi bi-check-circle text-white-50"></i></h5>' . "\r\n" . '<div class="text-white-50"><small>Ganhador(a) com a cota ';
		echo $winner['number'];
		echo '</small></div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n";
	}
}

// DESCRIÇÃO DO PRODUTO
if ($description) {
	echo '<div class="app-card card font-xs mb-2 sorteio_sorteioDesc__TBYaL">' . "\r\n" . '<div class="card-body sorteio_sorteioDescBody__3n4ko">' . "\r\n";
	echo blockHTML($description);
	echo '</div>' . "\r\n" . '</div>' . "\r\n";
}

// GIRO DA SORTE E COTAS PREMIADAS
if ($status == '1') {
	if ($cotas_premiadas) {
		$sql = "SELECT valor_cotas FROM product_list WHERE id = $id";
		$result = mysqli_query($conn, $sql);

		if ($result && mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			$valor_cotas = $row['valor_cotas'];

			if (empty($valor_cotas)) {
				$dados_valor_cotas = json_encode([]);
			} else {
				$dados_valor_cotas = json_decode($valor_cotas, true);
			}
			if (json_last_error() !== JSON_ERROR_NONE) {
				echo 'Erro na decodificação JSON: ' . json_last_error_msg();
			}
		} else {
			$dados_valor_cotas = [];
		}

		echo '<div class="app-promocao-numeros flex-column mb-2">' . "\r\n" .
			'<div class="app-title mb-2">' . "\r\n" .
			'<div class="col-auto" style="font-size:30px">🎯</div>' . "\r\n" .
			'<h1>Giro da Sorte</h1>' . "\r\n" .
			'<div class="app-title-desc">Prêmios Instantâneos!</div>' . "\r\n" .
			'</div>' . "\r\n" .
			'<div class="app-titulos-premiados--lista d-flex flex-column mb-2 font-xs">' . "\r\n";

		$sql_roleta = "SELECT 
				r.*, 
				p.name AS produto_nome, 
				GROUP_CONCAT(CONCAT(c.firstname, ' ', c.lastname) SEPARATOR ', ') AS ganhadores_nomes
			FROM roleta r
			LEFT JOIN product_list p ON r.produto = p.id
			LEFT JOIN JSON_TABLE(r.ganhadores, '$[*]' 
				COLUMNS(ganhador_id INT PATH '$')
			) AS g ON g.ganhador_id IS NOT NULL
			LEFT JOIN customer_list c ON g.ganhador_id = c.id
			WHERE r.produto = " . $id . "
			GROUP BY r.id, p.name
			ORDER BY r.id ASC";

		$qr_roletas = $conn->query($sql_roleta);
		for ($i = 0; $roleta = $qr_roletas->fetch_assoc(); $i++) {
			$ganhadores = explode(',', $roleta['ganhadores_nomes']);
			foreach ($ganhadores as $ganhhador) {
				$partes_nome = explode(" ", $ganhhador);
				if ($ganhhador == '') {
					echo '<div class="app-titulos-premiados--item app-titulos-premiados--selected" style="background-color: white;">
						<div class="app-titulos-premiados--premiacao" style="color: black;">🎯&nbsp; 
							' . $roleta['nome'] . '
						</div>
						<div class="app-titulos-premiados--ganhador" style="color: black;">
							<span>Disponível</span>
						</div>
						</div>';
				} else {
					echo '<div class="app-titulos-premiados--item app-titulos-premiados--selected">
						<div class="app-titulos-premiados--premiacao">
							' . $roleta['nome'] . '
						</div>
						<div class="app-titulos-premiados--ganhador">
							<span>
							' . $partes_nome[0] . ' <i class="bi bi-trophy-fill text-warning"></i>
							</span>
						</div>
						</div>';
				}
			}
		}

		echo '</div>' . "\r\n" .
			'<hr style="margin-bottom:5px;">' . "\r\n" .
			'</div>' . "\r\n";

		$cotas_premiada = explode(',', $cotas_premiadas);
		echo '<div class="app-promocao-numeros flex-column mb-2">' . "\r\n" .
			'<div class="app-title mb-2">' . "\r\n" .
			'<h1>🔥 Cotas premiadas</h1>' . "\r\n" .
			'<div class="app-title-desc">Achou ganhou!</div>' . "\r\n" .
			'</div>' . "\r\n" .
			'<div class="app-titulos-premiados--lista d-flex flex-column mb-2 font-xs">' . "\r\n";

		$count = 0;
		foreach ($cotas_premiada as $cota) {
			$vcota = trim($cota); // Remove espaços em branco
			$find_orders_query = '
                SELECT o.*, c.firstname 
                FROM `order_list` o
                JOIN `customer_list` c 
                ON o.customer_id = c.id 
                WHERE o.product_id = \'' . $id . '\' 
                AND o.status = 2 
                AND o.order_numbers REGEXP \'' . $vcota . '\'';
			$order = $conn->query($find_orders_query);

			$orders = $order->num_rows;
			
			// Obter valor personalizado da cota
			$valor_personalizado = '';
			
			// DEBUG: Verificar se a cota existe no array
			echo "<!-- DEBUG: Procurando cota '$vcota' no array -->";
			echo "<!-- DEBUG: Chaves disponíveis: " . implode(', ', array_keys($dados_valor_cotas)) . " -->";
			
			if (isset($dados_valor_cotas[$vcota]) && !empty(trim($dados_valor_cotas[$vcota]))) {
				$valor_personalizado = $dados_valor_cotas[$vcota];
				echo "<!-- DEBUG: Valor encontrado para cota $vcota: " . htmlspecialchars($valor_personalizado) . " -->";
			} else {
				echo "<!-- DEBUG: Valor NÃO encontrado para cota $vcota -->";
			}
			
			echo "<!-- DEBUG: Cota $vcota - Valor: " . htmlspecialchars($valor_personalizado) . " -->";

			if ($orders > 0) {
				$first_order = $order->fetch_assoc();
				$customer_id = $first_order['customer_id'];
				$partes_nome = explode(" ", $first_order['firstname']);

				echo '<div class="app-titulos-premiados--item app-titulos-premiados--selected">
						<div class="app-titulos-premiados--titulo badge btn btn-success">
							' . $vcota . '
						</div>
						<div class="app-titulos-premiados--premiacao">
							' . (!empty($valor_personalizado) && trim($valor_personalizado) !== '' ? htmlspecialchars($valor_personalizado) : 'Cota ' . htmlspecialchars($vcota)) . '
						</div>
						<div class="app-titulos-premiados--ganhador">
							<span>
							' . $partes_nome[0] . ' <i class="bi bi-trophy-fill text-warning"></i>
							</span>
						</div>
						</div>';
			} else {
				// Verificar se alguém comprou esta cota
				$sql_comprador = "SELECT * FROM order_list WHERE FIND_IN_SET('$vcota', order_numbers) AND product_id=$id AND status=2";
				$result_comprador = $conn->query($sql_comprador);
				
				$cota_vendida = false;
				$nome_comprador = '';
				
				if ($result_comprador && $result_comprador->num_rows > 0) {
					$cota_vendida = true;
					$row_comprador = $result_comprador->fetch_assoc();
					$customerData = getCustomerDataById($row_comprador['customer_id']);
					if ($customerData) {
						$nome_comprador = $customerData['firstname'] . ' ' . $customerData['lastname'];
					}
				}
				
				// Aplicar classe baseada no status
				$classe_cota = $cota_vendida ? 'cota-vendida' : 'cota-disponivel';
				$texto_status = $cota_vendida ? $nome_comprador : 'Disponível';
				
				echo "<!-- DEBUG: Cota $vcota - Vendida: " . ($cota_vendida ? 'SIM' : 'NÃO') . " - Classe: $classe_cota -->";
				
				echo '<div class="app-titulos-premiados--item app-titulos-premiados--selected ' . $classe_cota . '">';
				echo '    <div class="app-titulos-premiados--titulo badge text-bg-light">';
				echo '        ' . htmlspecialchars($vcota);
				echo '    </div>';
				echo '    <div class="app-titulos-premiados--premiacao">';
				echo '        ' . (!empty($valor_personalizado) && trim($valor_personalizado) !== '' ? htmlspecialchars($valor_personalizado) : 'Cota ' . htmlspecialchars($vcota));
				echo '    </div>';
				echo '    <div class="app-titulos-premiados--ganhador">';
				echo '        <span>' . htmlspecialchars($texto_status) . '</span>';
				echo '    </div>';
				echo '</div>';
			}
			$count++;
		}

		echo '<hr style="margin-bottom:5px;">' . "\r\n" .
			'<span style="font-size: 0.75rem;">' . $cotas_premiadas_descricao . '</span>' . "\r\n" .
			'</div>' . "\r\n" .
			'</div>' . "\r\n";
	}
}

// RANKING
if (0 < $enable_ranking) {
	echo '<div class="app-title mb-2">' . "\r\n" . '<h1>🏆 Ranking</h1>' . "\r\n";

	if ($ranking_message) {
		echo '<br><div class="app-title-desc">';
		echo $ranking_message;
		echo '</div>' . "\r\n";
	}

	echo '</div>' . "\r\n" . '<div class="app-card top-compradores" style="padding: 20 0 10 10;border-radius:10px;margin-top:0px;margin-bottom:10px;">' . "\r\n";

	$requests = $conn->query("
        SELECT c.firstname, SUM(o.quantity) AS total_quantity
        FROM order_list o
        INNER JOIN customer_list c ON o.customer_id = c.id
        WHERE o.product_id = " . $id . " AND o.status = 2
        GROUP BY o.customer_id
        ORDER BY total_quantity DESC
        LIMIT " . $ranking_qty . "
        ");
	$count = 0;

	while ($row = $requests->fetch_assoc()) {
		++$count;

		if ($count == 1) {
			$medal = '🥇';
		} else if ($count == 2) {
			$medal = '🥈';
		} else if ($count == 3) {
			$medal = '🥉';
		} else {
			$medal = '👤';
		}

		echo '<div class="item-content flex-column" style="max-width:32.7%;min-width:32.7%;">' . "\r\n" . '<div class="text-center customer-details" style="border:1px solid;padding:10px;border-radius:5px;margin:5px;">' . "\r\n" . '<span style="font-size:20px;">';
		echo $medal;
		echo '</span><br>' . "\r\n" . '<span class="ganhador-name">';
		echo $row['firstname'];
		echo '</span>' . "\r\n";

		if ($enable_ranking_show == 1) {
			echo '<p class="font-xss mb-0">';
			echo $row['total_quantity'];
			echo ' COTAS</p>' . "\r\n";
		}

		echo '</div>' . "\r\n" . '</div>' . "\r\n";
	}

	echo '</div>' . "\r\n";
}

// MODAIS
echo '<div class="modal fade" id="modal-consultaCompras">' . "\r\n" . '<div class="modal-dialog modal-md">' . "\r\n" . '<div class="modal-content">' . "\r\n" . '<form id="consultMyNumbers">' . "\r\n" . '<div class="modal-header">' . "\r\n" . '<h6 class="modal-title">Consulta de compras</h6>' . "\r\n" . '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>' . "\r\n" . '</div>' . "\r\n" . '<div class="modal-body">' . "\r\n" . '<div class="form-group">' . "\r\n";

if ($enable_cpf != 1) {
	echo '<label class="form-label">Informe seu telefone</label>' . "\r\n" . '<div class="input-group mb-2">' . "\r\n" . '<input onkeyup="formatarTEL(this);" maxlength="15" class="form-control" aria-label="Número de telefone" maxlength="15" id="phone" name="phone" required="" value="">' . "\r\n" . '<button class="btn btn-secondary" type="submit" id="button-addon2">' . "\r\n" . '<div class=""><i class="bi bi-check-circle"></i></div>' . "\r\n" . '</button>' . "\r\n" . '</div>' . "\r\n";
} else {
	echo '<label class="form-label">Informe seu CPF</label>' . "\r\n" . '<div class="input-group mb-2">' . "\r\n" . '<input name="cpf" class="form-control" id="cpf" value="" maxlength="14" minlength="14" placeholder="000.000.000-00" oninput="formatarCPF(this.value)" required>' . "\r\n" . '<button class="btn btn-secondary" type="submit" id="button-addon2">' . "\r\n" . '<div class=""><i class="bi bi-check-circle"></i></div>' . "\r\n" . '</button>' . "\r\n" . '</div>' . "\r\n";
}

echo '</div>' . "\r\n" . '</div>' . "\r\n" . '</form>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n";

// Modal checkout
echo '<div class="modal fade" id="modal-checkout">' . "\r\n" . '<div class="modal-dialog modal-fullscreen-sm-down modal-dialog-centered">' . "\r\n" . '<div class="modal-content rounded-0">' . "\r\n" . '<span class="d-none">Usuário não autenticado</span>' . "\r\n" . '<div class="modal-header">' . "\r\n" . '<h5 class="modal-title">Checkout</h5>' . "\r\n" . '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>' . "\r\n" . '</div>' . "\r\n" . '<div class="modal-body checkout">' . "\r\n" . '<div class="alert alert-info p-2 mb-2 font-xs"><i class="bi bi-check-circle"></i> Você está adquirindo<span class="font-weight-500">&nbsp;<span id="qty_cotas"></span> cotas</span><span>&nbsp;da ação entre amigos</span><span class="font-weight-500">&nbsp;';
echo (isset($name) ? $name : '');
echo '</span>,<span>&nbsp;seus números serão gerados</span><span>&nbsp;assim que concluir a compra.</span></div>' . "\r\n" . '<div class="mb-3">' . "\r\n" . '<div class="card app-card">' . "\r\n" . '<div class="card-body">' . "\r\n" . '<div class="row align-items-center">' . "\r\n" . '<div class="col-auto">' . "\r\n" . '<div class="rounded-pill p-1 bg-white box-shadow-08" style="width: 56px; height: 56px; position: relative; overflow: hidden;">' . "\r\n" . '<div style="display: block; overflow: hidden; position: absolute; inset: 0px; box-sizing: border-box; margin: 0px;">' . "\r\n" . '<img src="';
echo validate_image($_settings->userdata('avatar'));
echo '" decoding="async" data-nimg="fill" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">' . "\r\n" . '<noscript></noscript>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<div class="col">' . "\r\n" . '<h5 class="mb-1">';
echo $_settings->userdata('firstname');
echo ' ';
echo $_settings->userdata('lastname');
echo '</h5>' . "\r\n" . '<div><small>';
echo formatPhoneNumber($_settings->userdata('phone'));
echo '</small></div>' . "\r\n" . '</div>' . "\r\n" . '<div class="col-auto"><i class="bi bi-chevron-compact-right"></i></div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<button id="place_order" data-id="';
echo ($_SESSION['ref'] ? $_SESSION['ref'] : '');
echo '" class="btn btn-success w-100 mb-2">Concluir reserva <i class="bi bi-arrow-right-circle"></i></button>' . "\r\n" . '<button type="button" class="btn btn-link btn-sm text-secondary text-decoration-none w-100 my-2"><a href="';
echo BASE_URL . 'logout?' . $_SERVER['REQUEST_URI'];
echo '">Utilizar outra conta</a></button>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n";

// Modal Aviso
echo '<button id="aviso_sorteio" data-bs-toggle="modal" data-bs-target="#modal-aviso" class="btn btn-success w-100 py-2" style="display:none"></button>' . "\r\n" . '<div class="modal fade" id="modal-aviso">' . "\r\n" . '<div class="modal-dialog modal-fullscreen-sm-down modal-dialog-centered">' . "\r\n" . '<div class="modal-content rounded-0">' . "\r\n" . '<div class="modal-header">' . "\r\n" . '<h5 class="modal-title">Aviso</h5>' . "\r\n" . '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>' . "\r\n" . '</div>' . "\r\n" . '<div class="modal-body checkout">' . "\r\n" . '<div class="alert alert-danger p-2 mb-2 font-xs aviso-content">' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n";

// Modal indique
echo '<div class="modal fade" id="modal-indique">' . "\r\n" . '<div class="modal-dialog modal-dialog-centered modal-lg">' . "\r\n" . '<div class="modal-content">' . "\r\n" . '<div class="modal-header">' . "\r\n" . '<h5 class="modal-title">Indique e ganhe!</h5>' . "\r\n" . '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>' . "\r\n" . '</div>' . "\r\n" . '<div class="modal-body text-center">Faça login para ter seu link de indicao, e ganhe at 0,00% de créditos nas compras aprovadas!</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n";

// BOTÕES DE COMPARTILHAMENTO E GRUPOS
if ($enable_groups == 1) {
	echo '<div class="sorteio_sorteioShare__247_t" style="z-index:10;">' . "\r\n" . '<div class="campanha-share d-flex mb-1 justify-content-between align-items-center">' . "\r\n";

	if ($enable_share == 1) {
		echo '<div class="item d-flex align-items-center">' . "\r\n" . '<a href="https://www.facebook.com/sharer/sharer.php?u=';
		echo BASE_URL;
		echo 'campanha/';
		echo $slug;
		echo '" target="_blank">' . "\r\n" . '<div alt="Compartilhe no Facebook" class="sorteio_sorteioShareLinkFacebook__2McKU" style="margin-right:5px;">' . "\r\n" . '<i class="bi bi-facebook"></i>' . "\r\n" . '</div>' . "\r\n" . '</a>' . "\r\n" . '<a href="https://t.me/share/url?url=';
		echo BASE_URL;
		echo 'campanha/';
		echo $slug;
		echo 'text=';
		echo $name;
		echo '" target="_blank">' . "\r\n" . '<div alt="Compartilhe no Telegram" class="sorteio_sorteioShareLinkTelegram__3a2_s" style="margin-right:5px;">' . "\r\n" . '<i class="bi bi-telegram"></i>' . "\r\n" . '</div>' . "\r\n" . '</a>' . "\r\n" . '<a href="https://www.twitter.com/share?url=';
		echo BASE_URL;
		echo 'campanha/';
		echo $slug;
		echo '" target="_blank">' . "\r\n" . '<div alt="Compartilhe no Twitter" class="sorteio_sorteioShareLinkTwitter__1E4XC" style="margin-right:5px;">' . "\r\n" . '<i class="bi bi-twitter"></i>' . "\r\n" . '</div>' . "\r\n" . '</a>' . "\r\n" . '<a href="https://api.whatsapp.com/send/?text=';
		echo $name;
		echo '%21%21%3A+';
		echo BASE_URL;
		echo 'campanha/';
		echo $slug;
		echo '&type=custom_url&app_absent=0" target="_blank"><div alt="Compartilhe no WhatsApp" class="sorteio_sorteioShareLinkWhatsApp__2Vqhy"><i class="bi bi-whatsapp"></i></div></a>' . "\r\n" . '</div>' . "\r\n";
	}

	echo '</div>' . "\r\n";

	if ($whatsapp_group_url) {
		echo '<a href="';
		echo $whatsapp_group_url;
		echo '" target="_blank">' . "\r\n" . '<div class="whatsapp-grupo">' . "\r\n" . '<div class="btn btn-sm btn-success mb-1 w-100"><i class="bi bi-whatsapp"></i> Grupo</div>' . "\r\n" . '</div>' . "\r\n" . '</a>' . "\r\n";
	}

	if ($telegram_group_url) {
		echo '<a href="';
		echo $telegram_group_url;
		echo '" target="_blank">' . "\r\n" . '<div class="telegram-grupo">' . "\r\n" . '<div class="btn btn-sm btn-info btn-block text-white mb-1 w-100"><i class="bi bi-telegram"></i> Telegram</div>' . "\r\n" . '</div>' . "\r\n" . '</a>' . "\r\n";
	}

	if ($support_number) {
		echo '<a href="https://api.whatsapp.com/send?phone=55';
		echo $support_number;
		echo '" target="_blank">' . "\r\n" . '<div class="suporte">' . "\r\n" . '<div class="btn btn-sm btn-warning mb-1 w-100"><i class="bi bi-headset"></i></i> Suporte</div>' . "\r\n" . '</div>' . "\r\n" . '</a>' . "\r\n";
	}

	echo '</div>' . "\r\n";
}

// JAVASCRIPT
echo '<script>
		function setValue($quant) {
			$(".qty").val($quant);
			calculatePrice($quant);
		}
	</script>';

echo '</div>' . "\r\n" . '<script>' . "\r\n" . '$(function(){' . "\r\n" . '$(\'#add_to_cart\').click(function(){' . "\r\n" . 'add_cart();' . "\r\n" . '})' . "\r\n" . '$(\'#place_order\').click(function(){' . "\r\n" . 'var ref = $(this).attr(\'data-id\');' . "\r\n" . 'place_order(ref);' . "\r\n" . '})' . "\r\n" . '$(".addNumero").click(function() {' . "\r\n" . 'let value = parseInt($(".qty").val());' . "\r\n" . 'value++;' . "\r\n" . '$(".qty").val(value);' . "\r\n" . 'calculatePrice(value);' . "\r\n" . '})' . "\r\n" . '$(".removeNumero").click(function() {' . "\r\n" . 'let value = parseInt($(".qty").val());' . "\r\n" . 'if (value <= 1) {' . "\r\n" . 'value = 1;' . "\r\n" . '} else {' . "\r\n" . 'value--;' . "\r\n" . '}' . "\r\n" . '$(".qty").val(value);' . "\r\n" . 'calculatePrice(value);' . "\r\n" . '})' . "\r\n" . 'function place_order($ref){' . "\r\n" . '$(\'#overlay\').fadeIn(300);' . "\r\n" . '$.ajax({' . "\r\n" . 'url:_base_url_+\'class/Main.php?action=place_order_process\',' . "\r\n" . 'method:\'POST\',' . "\r\n" . 'data:{ref: $ref, product_id: parseInt("';
echo (isset($id) ? $id : '');
echo '")},' . "\r\n" . 'dataType:\'json\',' . "\r\n" . 'error:err=>{' . "\r\n" . 'console.log(err)' . "\r\n" . '},' . "\r\n" . 'success:function(resp){' . "\r\n" . 'if(resp.status == \'success\'){ ' . "\r\n" . 'location.replace(resp.redirect)' . "\r\n" . '} else{' . "\r\n" . 'alert(resp.error);' . "\r\n" . 'location.reload();' . "\r\n" . '}' . "\r\n" . '}' . "\r\n" . '})' . "\r\n" . '}' . "\r\n" . '})' . "\r\n" . 'function formatCurrency(total) {' . "\r\n" . 'var decimalSeparator = \',\';' . "\r\n" . 'var thousandsSeparator = \'.\';' . "\r\n" . 'var formattedTotal = total.toFixed(2);' . "\r\n" . 'formattedTotal = formattedTotal.replace(\'.\', decimalSeparator);' . "\r\n" . 'var parts = formattedTotal.split(decimalSeparator);' . "\r\n" . 'parts[0] = parts[0].replace(/\\B(?=(\\d{3})+(?!\\d))/g, thousandsSeparator);' . "\r\n" . 'return parts.join(decimalSeparator);' . "\r\n" . '}' . "\r\n" . 'function calculatePrice(qty){' . "\r\n" . 'let price = \'';
echo $price;
echo '\';' . "\r\n" . 'let enable_sale = parseInt(\'';
echo $enable_sale;
echo '\');' . "\r\n" . 'let sale_qty = parseInt(\'';
echo $sale_qty;
echo '\');' . "\r\n" . 'let sale_price = \'';
echo $sale_price;
echo '\';' . "\r\n" . 'let available = parseInt(\'';
echo $available;
echo '\');' . "\r\n" . 'let total = price * qty;' . "\r\n" . 'var max = parseInt(\'';
echo (isset($max_purchase) ? $max_purchase : '');
echo '\');' . "\r\n" . 'var min = parseInt(\'';
echo (isset($min_purchase) ? $min_purchase : '');
echo '\');' . "\r\n" . 'if (qty > available) {' . "\r\n" . '$(\'.aviso-content\').html(\'Há apenas : \' + available + \' cotas disponíveis no momento.\');' . "\r\n" . '$(\'#aviso_sorteio\').click();' . "\r\n" . '$(".qty").val(available);' . "\r\n" . 'calculatePrice(available);' . "\r\n" . 'return;' . "\r\n" . '}' . "\r\n" . 'if (qty < min) {' . "\r\n" . '$(\'.aviso-content\').html(\'A quantidade mínima de cotas é de: \' + min + \'\');' . "\r\n" . '$(\'#aviso_sorteio\').click();' . "\r\n" . '$(".qty").val(min);' . "\r\n" . 'total = price * min;' . "\r\n" . 'calculatePrice(min);' . "\r\n" . 'return;' . "\r\n" . '}' . "\r\n" . 'if(qty > max){' . "\r\n" . '$(\'.aviso-content\').html(\'A quantidade máxima de cotas é de: \' + max + \'\');' . "\r\n" . '$(\'#aviso_sorteio\').click();' . "\r\n" . '$(".qty").val(max);' . "\r\n" . 'total = price * max;' . "\r\n" . 'calculatePrice(max);' . "\r\n" . 'return;' . "\r\n" . '}' . "\r\n" . 'var qtd_desconto = parseInt(\'';
echo $max_discount;
echo '\');' . "\r\n" . 'let dropeDescontos = [];' . "\r\n" . 'for (i = 0; i < qtd_desconto; i++) {' . "\r\n" . 'dropeDescontos[i] = {' . "\r\n" . 'qtd: parseInt($(`#discount_qty_${i}`).text()),' . "\r\n" . 'vlr: parseFloat($(`#discount_amount_${i}`).text())' . "\r\n" . '};' . "\r\n" . '}' . "\r\n" . 'var drope_desconto_qty = null;' . "\r\n" . 'var drope_desconto = null;' . "\r\n" . 'for (i = 0; i < dropeDescontos.length; i++) {' . "\r\n" . 'if (qty >= dropeDescontos[i].qtd) {' . "\r\n" . 'drope_desconto_qty = dropeDescontos[i].qtd;' . "\r\n" . 'drope_desconto = dropeDescontos[i].vlr;' . "\r\n" . '}' . "\r\n" . '}' . "\r\n" . 'var drope_desconto_aplicado = total;' . "\r\n" . 'var desconto_acumulativo = false;' . "\r\n" . 'var quantidade_de_numeros = drope_desconto_qty;' . "\r\n" . 'var valor_do_desconto = drope_desconto;' . "\r\n";

if ($enable_cumulative_discount == 1) {
	echo 'desconto_acumulativo = true;' . "\r\n";
}

echo 'if (desconto_acumulativo && qty >= quantidade_de_numeros) {' . "\r\n" . 'var multiplicador_do_desconto = Math.floor(qty / quantidade_de_numeros);' . "\r\n" . 'drope_desconto_aplicado = total - (valor_do_desconto * multiplicador_do_desconto);' . "\r\n" . '}' . "\r\n" . 'if (!desconto_acumulativo && qty >= drope_desconto_qty) {' . "\r\n" . 'drope_desconto_aplicado = total - valor_do_desconto;' . "\r\n" . '}' . "\r\n" . 'if (parseInt(qty) >= parseInt(drope_desconto_qty)) {' . "\r\n" . '$(\'#total\').html(\'De <strike>R$ \' + formatCurrency(total) + \'</strike> por R$ \' + formatCurrency(drope_desconto_aplicado));' . "\r\n" . '} else {' . "\r\n" . 'if(enable_sale == 1 && qty >= sale_qty){' . "\r\n" . 'total_sale = qty * sale_price;' . "\r\n" . '$(\'#total\').html(\'De <strike>R$ \' + formatCurrency(total) + \'</strike> por R$ \' + formatCurrency(total_sale));' . "\r\n" . '}else{' . "\r\n" . '$(\'#total\').html(\'R$ \' + formatCurrency(total));' . "\r\n" . '}' . "\r\n" . '}' . "\r\n" . '}' . "\r\n" . 'function qtyExpress(qty, opt) {' . "\r\n" . 'qty = parseInt(qty);' . "\r\n" . 'let value = parseInt($(".qty").val());' . "\r\n" . 'let qtyTotal = (value + qty);' . "\r\n" . 'if(opt === true){' . "\r\n" . 'qtyTotal = (qtyTotal - value);' . "\r\n" . '}' . "\r\n" . '$(".qty").val(qtyTotal);' . "\r\n" . 'calculatePrice(qtyTotal);' . "\r\n" . '}' . "\r\n" . 'function add_cart(){' . "\r\n" . 'let qty = $(\'.qty\').val();' . "\r\n" . '$(\'#qty_cotas\').text(qty);' . "\r\n" . '$.ajax({' . "\r\n" . 'url:_base_url_+"class/Main.php?action=add_to_card",' . "\r\n" . 'method:"POST",' . "\r\n" . 'data:{product_id: "';
echo (isset($id) ? $id : '');
echo '", qty: qty},' . "\r\n" . 'dataType:"json",' . "\r\n" . 'error:err=>{' . "\r\n" . 'console.log(err)' . "\r\n" . 'alert("[PP01] - An error occured.",\'error\');' . "\r\n" . '},' . "\r\n" . 'success:function(resp){' . "\r\n" . 'if(typeof resp== \'object\' && resp.status == \'success\'){' . "\r\n" . '}else if(!!resp.msg){' . "\r\n" . 'alert(resp.msg,\'error\');' . "\r\n" . '}else{' . "\r\n" . 'alert("[PP02] - An error occured.",\'error\');' . "\r\n" . '}' . "\r\n" . '}' . "\r\n" . '})' . "\r\n" . '}' . "\r\n" . '$(document).ready(function() {' . "\r\n" . '$(\'.qty\').on(\'keyup\', function() {' . "\r\n" . 'var value = parseInt($(this).val());' . "\r\n" . 'var min = parseInt(\'';
echo (isset($min_purchase) ? $min_purchase : '');
echo '\');' . "\r\n" . 'var max = parseInt(\'';
echo (isset($max_purchase) ? $max_purchase : '');
echo '\');' . "\r\n" . 'if (value < min) {' . "\r\n" . 'calculatePrice(min);' . "\r\n" . '$(\'.aviso-content\').html(\'A quantidade mínima de cotas é de: \' + min + \'\');' . "\r\n" . '$(\'#aviso_sorteio\').click();' . "\r\n" . '$(".qty").val(min);' . "\r\n" . '}' . "\r\n" . 'if(value > max){' . "\r\n" . 'calculatePrice(max);' . "\r\n" . '$(\'.aviso-content\').html(\'A quantidade máxima de cotas é de: \' + max + \'\');' . "\r\n" . '$(\'#aviso_sorteio\').click();' . "\r\n" . '$(".qty").val(max);' . "\r\n" . '}' . "\r\n" . '});' . "\r\n" . '});' . "\r\n" . '$(document).ready(function(){' . "\r\n" . '$(\'#consultMyNumbers\').submit(function(e){' . "\r\n" . 'e.preventDefault()' . "\r\n" . 'var tipo = "';
echo $search_type;
echo '";' . "\r\n" . '$.ajax({' . "\r\n" . 'url:_base_url_+"class/Main.php?action=" + tipo,' . "\r\n" . 'method:\'POST\',' . "\r\n" . 'type:\'POST\',' . "\r\n" . 'data:new FormData($(this)[0]),' . "\r\n" . 'dataType:\'json\',' . "\r\n" . 'cache:false,' . "\r\n" . 'processData:false,' . "\r\n" . 'contentType: false,' . "\r\n" . 'error:err=>{' . "\r\n" . 'console.log(err)' . "\r\n" . 'alert(\'An error occurred\')' . "\r\n" . '},' . "\r\n" . 'success:function(resp){' . "\r\n" . 'if(resp.status == \'success\'){' . "\r\n" . 'location.href = (resp.redirect)' . "\r\n" . '}else{' . "\r\n" . 'alert(\'Nenhum registro de compra foi encontrado\')' . "\r\n" . 'console.log(resp)' . "\r\n" . '}' . "\r\n" . '}' . "\r\n" . '})' . "\r\n" . '})' . "\r\n" . '})' . "\r\n" . 
        
        // Função para mostrar mais cotas
        'function mostrarMaisCotas() {' . "\r\n" .
            'const cotasOcultas = document.querySelectorAll(\'.cota-oculta\');' . "\r\n" .
            'const btnVerMais = document.getElementById(\'btnVerMais\');' . "\r\n" .
            'const btnVerMenos = document.getElementById(\'btnVerMenos\');' . "\r\n" .
            
            '// Mostrar todas as cotas ocultas com animação' . "\r\n" .
            'cotasOcultas.forEach((cota, index) => {' . "\r\n" .
                'setTimeout(() => {' . "\r\n" .
                    'cota.style.display = \'block\';' . "\r\n" .
                    'cota.style.opacity = \'0\';' . "\r\n" .
                    'cota.style.transform = \'translateY(20px)\';' . "\r\n" .
                    
                    'setTimeout(() => {' . "\r\n" .
                        'cota.style.transition = \'all 0.5s ease\';' . "\r\n" .
                        'cota.style.opacity = \'1\';' . "\r\n" .
                        'cota.style.transform = \'translateY(0)\';' . "\r\n" .
                    '}, 50);' . "\r\n" .
                '}, index * 100);' . "\r\n" .
            '});' . "\r\n" .
            
            '// Trocar botões' . "\r\n" .
            'btnVerMais.style.display = \'none\';' . "\r\n" .
            'btnVerMenos.style.display = \'inline-flex\';' . "\r\n" .
        '}' . "\r\n" .
        
        '// Função para mostrar menos cotas' . "\r\n" .
        'function mostrarMenosCotas() {' . "\r\n" .
            'const cotasOcultas = document.querySelectorAll(\'.cota-oculta\');' . "\r\n" .
            'const btnVerMais = document.getElementById(\'btnVerMais\');' . "\r\n" .
            'const btnVerMenos = document.getElementById(\'btnVerMenos\');' . "\r\n" .
            
            '// Ocultar cotas com animação' . "\r\n" .
            'cotasOcultas.forEach((cota, index) => {' . "\r\n" .
                'setTimeout(() => {' . "\r\n" .
                    'cota.style.transition = \'all 0.3s ease\';' . "\r\n" .
                    'cota.style.opacity = \'0\';' . "\r\n" .
                    'cota.style.transform = \'translateY(-20px)\';' . "\r\n" .
                    
                    'setTimeout(() => {' . "\r\n" .
                        'cota.style.display = \'none\';' . "\r\n" .
                    '}, 300);' . "\r\n" .
                '}, index * 50);' . "\r\n" .
            '});' . "\r\n" .
            
            '// Trocar botões' . "\r\n" .
            'setTimeout(() => {' . "\r\n" .
                'btnVerMenos.style.display = \'none\';' . "\r\n" .
                'btnVerMais.style.display = \'inline-flex\';' . "\r\n" .
            '}, 500);' . "\r\n" .
            
            '// Scroll suave para o topo das cotas' . "\r\n" .
            'document.querySelector(\'.app-titulos-premiados--lista\').scrollIntoView({' . "\r\n" .
                'behavior: \'smooth\',' . "\r\n" .
                'block: \'start\'' . "\r\n" .
            '});' . "\r\n" .
        '}' . "\r\n" .
'</script>';

?>

<script>
function mostrarMaisCotas() {
    // Mostrar cotas ocultas
    const cotasOcultas = document.querySelectorAll('.cota-oculta');
    cotasOcultas.forEach((cota, index) => {
        setTimeout(() => {
            cota.style.display = 'block';
            cota.style.opacity = '0';
            cota.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                cota.style.transition = 'all 0.5s ease';
                cota.style.opacity = '1';
                cota.style.transform = 'translateY(0)';
            }, 50);
        }, index * 100);
    });
    
    // Trocar botões
    document.getElementById('btnVerMais').style.display = 'none';
    document.getElementById('btnVerMenos').style.display = 'inline-flex';
}

function mostrarMenosCotas() {
    // Ocultar cotas extras
    const cotasOcultas = document.querySelectorAll('.cota-oculta');
    cotasOcultas.forEach((cota, index) => {
        setTimeout(() => {
            cota.style.transition = 'all 0.3s ease';
            cota.style.opacity = '0';
            cota.style.transform = 'translateY(-20px)';
            
            setTimeout(() => {
                cota.style.display = 'none';
            }, 300);
        }, index * 50);
    });
    
    // Trocar botões
    setTimeout(() => {
        document.getElementById('btnVerMenos').style.display = 'none';
        document.getElementById('btnVerMais').style.display = 'inline-flex';
        
        // Scroll suave para o topo das cotas
        document.querySelector('.ganhad').scrollIntoView({ 
            behavior: 'smooth', 
            block: 'start' 
        });
    }, 200);
}
</script>
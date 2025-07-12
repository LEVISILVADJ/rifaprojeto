<?php
// Decodded

$enable_footer = $_settings->info('enable_footer');
$enable_password = $_settings->info('enable_password');
$enable_email = $_settings->info('enable_email');
$enable_cpf = $_settings->info('enable_cpf');
$enable_two_phone = $_settings->info('enable_two_phone');
$text_footer = $_settings->info('text_footer');
$whatsapp_footer = $_settings->info('whatsapp_footer');
$instagram_footer = $_settings->info('instagram_footer');
$facebook_footer = $_settings->info('facebook_footer');
$twitter_footer = $_settings->info('twitter_footer');
$youtube_footer = $_settings->info('youtube_footer');

if (TRUE) {
    echo '<style>' . "\r\n";
    echo '.footer-gm {' . "\r\n";
    echo '    background: #343a40;' . "\r\n";
    echo '    color: #ffffff;' . "\r\n";
    echo '    padding: 40px 0 20px;' . "\r\n";
    echo '    position: relative;' . "\r\n";
    echo '    overflow: hidden;' . "\r\n";
    echo '}' . "\r\n";
    
    echo '.footer-gm::before {' . "\r\n";
    echo '    content: "";' . "\r\n";
    echo '    position: absolute;' . "\r\n";
    echo '    top: 0;' . "\r\n";
    echo '    left: 0;' . "\r\n";
    echo '    right: 0;' . "\r\n";
    echo '    height: 4px;' . "\r\n";
    echo '    background: linear-gradient(90deg, #00ff35, #00cc2a, #00ff35);' . "\r\n";
    echo '    background-size: 200% 100%;' . "\r\n";
    echo '    animation: shimmer 3s ease-in-out infinite;' . "\r\n";
    echo '}' . "\r\n";
    
    echo '@keyframes shimmer {' . "\r\n";
    echo '    0%, 100% { background-position: -200% 0; }' . "\r\n";
    echo '    50% { background-position: 200% 0; }' . "\r\n";
    echo '}' . "\r\n";
    
    echo '.social-icons {' . "\r\n";
    echo '    display: flex;' . "\r\n";
    echo '    justify-content: center;' . "\r\n";
    echo '    gap: 15px;' . "\r\n";
    echo '    margin: 20px 0;' . "\r\n";
    echo '}' . "\r\n";
    
    echo '.social-icon {' . "\r\n";
    echo '    display: flex;' . "\r\n";
    echo '    align-items: center;' . "\r\n";
    echo '    justify-content: center;' . "\r\n";
    echo '    width: 50px;' . "\r\n";
    echo '    height: 50px;' . "\r\n";
    echo '    border-radius: 50%;' . "\r\n";
    echo '    background: rgba(255, 255, 255, 0.1);' . "\r\n";
    echo '    backdrop-filter: blur(10px);' . "\r\n";
    echo '    border: 1px solid rgba(255, 255, 255, 0.2);' . "\r\n";
    echo '    color: #ffffff;' . "\r\n";
    echo '    text-decoration: none;' . "\r\n";
    echo '    transition: all 0.3s ease;' . "\r\n";
    echo '    position: relative;' . "\r\n";
    echo '    overflow: hidden;' . "\r\n";
    echo '}' . "\r\n";
    
    echo '.social-icon:hover {' . "\r\n";
    echo '    transform: translateY(-5px) scale(1.1);' . "\r\n";
    echo '    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);' . "\r\n";
    echo '}' . "\r\n";
    
    echo '.social-icon.whatsapp:hover {' . "\r\n";
    echo '    background: linear-gradient(135deg, #25d366, #128c7e);' . "\r\n";
    echo '    box-shadow: 0 10px 25px rgba(37, 211, 102, 0.4);' . "\r\n";
    echo '}' . "\r\n";
    
    echo '.social-icon.instagram:hover {' . "\r\n";
    echo '    background: linear-gradient(135deg, #e4405f, #833ab4, #fccc63);' . "\r\n";
    echo '    box-shadow: 0 10px 25px rgba(228, 64, 95, 0.4);' . "\r\n";
    echo '}' . "\r\n";
    
    echo '.social-icon.facebook:hover {' . "\r\n";
    echo '    background: linear-gradient(135deg, #1877f2, #42a5f5);' . "\r\n";
    echo '    box-shadow: 0 10px 25px rgba(24, 119, 242, 0.4);' . "\r\n";
    echo '}' . "\r\n";
    
    echo '.social-icon.twitter:hover {' . "\r\n";
    echo '    background: linear-gradient(135deg, #1da1f2, #0d8bd9);' . "\r\n";
    echo '    box-shadow: 0 10px 25px rgba(29, 161, 242, 0.4);' . "\r\n";
    echo '}' . "\r\n";
    
    echo '.social-icon.youtube:hover {' . "\r\n";
    echo '    background: linear-gradient(135deg, #ff0000, #cc0000);' . "\r\n";
    echo '    box-shadow: 0 10px 25px rgba(255, 0, 0, 0.4);' . "\r\n";
    echo '}' . "\r\n";
    
    echo '.green-sistemas-section {' . "\r\n";
    echo '    display: flex;' . "\r\n";
    echo '    flex-direction: column;' . "\r\n";
    echo '    align-items: center;' . "\r\n";
    echo '    gap: 15px;' . "\r\n";
    echo '    padding-top: 30px;' . "\r\n";
    echo '    border-top: 1px solid rgba(255, 255, 255, 0.1);' . "\r\n";
    echo '    margin-top: 30px;' . "\r\n";
    echo '}' . "\r\n";
    
    echo '.developed-by {' . "\r\n";
    echo '    font-size: 14px;' . "\r\n";
    echo '    color: #adb5bd;' . "\r\n";
    echo '    margin-bottom: 10px;' . "\r\n";
    echo '}' . "\r\n";
    
    echo '.green-sistemas-link {' . "\r\n";
    echo '    display: flex;' . "\r\n";
    echo '    align-items: center;' . "\r\n";
    echo '    gap: 12px;' . "\r\n";
    echo '    background: linear-gradient(135deg, rgba(0, 255, 53, 0.1), rgba(0, 204, 42, 0.1));' . "\r\n";
    echo '    border: 1px solid rgba(0, 255, 53, 0.2);' . "\r\n";
    echo '    border-radius: 12px;' . "\r\n";
    echo '    padding: 12px 24px;' . "\r\n";
    echo '    text-decoration: none;' . "\r\n";
    echo '    transition: all 0.3s ease;' . "\r\n";
    echo '    position: relative;' . "\r\n";
    echo '    overflow: hidden;' . "\r\n";
    echo '}' . "\r\n";
    
    echo '.green-sistemas-link:hover {' . "\r\n";
    echo '    transform: scale(1.05);' . "\r\n";
    echo '    background: linear-gradient(135deg, rgba(0, 255, 53, 0.2), rgba(0, 204, 42, 0.2));' . "\r\n";
    echo '    border-color: rgba(0, 255, 53, 0.4);' . "\r\n";
    echo '    box-shadow: 0 10px 25px rgba(0, 255, 53, 0.2);' . "\r\n";
    echo '}' . "\r\n";
    
    echo '.green-logo {' . "\r\n";
    echo '    width: 32px;' . "\r\n";
    echo '    height: 32px;' . "\r\n";
    echo '    transition: transform 0.3s ease;' . "\r\n";
    echo '    border-radius: 6px;' . "\r\n";
    echo '}' . "\r\n";
    
    echo '.green-sistemas-link:hover .green-logo {' . "\r\n";
    echo '    transform: scale(1.1);' . "\r\n";
    echo '}' . "\r\n";
    
    echo '.company-info h4 {' . "\r\n";
    echo '    font-size: 14px;' . "\r\n";
    echo '    font-weight: 600;' . "\r\n";
    echo '    color: #00ff35;' . "\r\n";
    echo '    margin: 0;' . "\r\n";
    echo '    transition: color 0.3s ease;' . "\r\n";
    echo '}' . "\r\n";
    
    echo '.company-info p {' . "\r\n";
    echo '    font-size: 12px;' . "\r\n";
    echo '    color: #adb5bd;' . "\r\n";
    echo '    margin: 0;' . "\r\n";
    echo '    transition: color 0.3s ease;' . "\r\n";
    echo '}' . "\r\n";
    
    echo '.green-sistemas-link:hover .company-info h4 {' . "\r\n";
    echo '    color: #00ff35;' . "\r\n";
    echo '}' . "\r\n";
    
    echo '.green-sistemas-link:hover .company-info p {' . "\r\n";
    echo '    color: #ffffff;' . "\r\n";
    echo '}' . "\r\n";
    
    echo '.whatsapp-icon {' . "\r\n";
    echo '    opacity: 0;' . "\r\n";
    echo '    transform: translateX(8px);' . "\r\n";
    echo '    transition: all 0.3s ease;' . "\r\n";
    echo '    color: #00ff35;' . "\r\n";
    echo '}' . "\r\n";
    
    echo '.green-sistemas-link:hover .whatsapp-icon {' . "\r\n";
    echo '    opacity: 1;' . "\r\n";
    echo '    transform: translateX(0);' . "\r\n";
    echo '}' . "\r\n";
    
    echo '.contact-hint {' . "\r\n";
    echo '    font-size: 12px;' . "\r\n";
    echo '    color: #6c757d;' . "\r\n";
    echo '    text-align: center;' . "\r\n";
    echo '}' . "\r\n";
    
    echo '@media (max-width: 768px) {' . "\r\n";
    echo '    .footer-gm { padding: 30px 15px 15px; }' . "\r\n";
    echo '    .social-icons { gap: 10px; }' . "\r\n";
    echo '    .social-icon { width: 45px; height: 45px; }' . "\r\n";
    echo '    .green-sistemas-link { padding: 10px 20px; gap: 10px; }' . "\r\n";
    echo '    .green-logo { width: 28px; height: 28px; }' . "\r\n";
    echo '}' . "\r\n";
    echo '</style>' . "\r\n";
    
    echo '<footer class="footer-gm">' . "\r\n";
    echo '    <div class="container">' . "\r\n";
    echo '        <div class="row justify-content-center">' . "\r\n";
    echo '            <div class="col-12">' . "\r\n";
    
    
    // Seção Green Sistemas
    echo '                <div class="green-sistemas-section">' . "\r\n";
    echo '                    <p class="developed-by">Desenvolvido com ❤️ por:</p>' . "\r\n";
    echo '                    <a href="https://wa.me/5511983723046" target="_blank" rel="noopener noreferrer" class="green-sistemas-link">' . "\r\n";
    echo '                        <img src="/uploads/glogo.png" alt="Green Sistemas Logo" class="green-logo" onerror="this.style.display=\'none\'">' . "\r\n";
    echo '                        <div class="company-info">' . "\r\n";
    echo '                            <h4>Green Sistemas</h4>' . "\r\n";
    echo '                            <p>Soluções em Tecnologia</p>' . "\r\n";
    echo '                        </div>' . "\r\n";
    echo '                        <div class="whatsapp-icon">' . "\r\n";
    echo '                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">' . "\r\n";
    echo '                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>' . "\r\n";
    echo '                            </svg>' . "\r\n";
    echo '                        </div>' . "\r\n";
    echo '                    </a>' . "\r\n";
    echo '                    <p class="contact-hint">Clique para entrar em contato via WhatsApp</p>' . "\r\n";
    echo '                </div>' . "\r\n";
    
    echo '            </div>' . "\r\n";
    echo '        </div>' . "\r\n";
    echo '    </div>' . "\r\n";
    echo '</footer>' . "\r\n";
}

echo "\r\n\r\n";

if (!$user_id) {
    echo '<form class="modal fade" id="loginModal">' . "\r\n" .
         '    <div class="modal-dialog modal-sm modal-fullscreen-md-down modal-dialog-centered">' . "\r\n" .
         '        <div class="modal-content rounded-0">' . "\r\n" .
         '            <div class="modal-header">' . "\r\n" .
         '                <h5 class="modal-title">Login</h5>' . "\r\n" .
         '                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>' . "\r\n" .
         '            </div>' . "\r\n" .
         '            <div class="modal-body app-form">' . "\r\n" .
         '                <p class="text-muted font-xs">Por favor, entre com seus dados ou faça um cadastro.</p>' . "\r\n" .
         '                <span id="aviso-login"></span>' . "\r\n" .
         '                <div class="mb-2">' . "\r\n" .
         '                    <div class="form-floating font-weight-500">' . "\r\n" .
         '                        <input onkeyup="formatarTEL(this);" maxlength="15" name="phone" id="phone" required class="form-control text-black" placeholder="(00) 0000-0000" value="">' . "\r\n" .
         '                        <label for="username">Telefone</label>' . "\r\n" .
         '                    </div>' . "\r\n" .
         '                </div>';

    if ($enable_password == '1') {
        echo '                <div class="mb-2">' . "\r\n" .
             '                    <div class="form-floating font-weight-500">' . "\r\n" .
             '                        <input type="password" name="password" id="password" class="form-control text-black" placeholder="Senha" required>' . "\r\n" .
             '                        <label for="password">Senha</label>' . "\r\n" .
             '                    </div>' . "\r\n" .
             '                </div>' . "\r\n" .
             '                <div class="btn btn-link btn-sm text-decoration-none mb-4 text-cardLink opacity-75">' . "\r\n" .
             '                    <a href="/recuperar-senha">Esqueci minha senha</a>' . "\r\n" .
             '                </div>';
    }

    echo '                <div class="d-flex justify-content-center align-items-center flex-column">' . "\r\n" .
         '                    <button type="submit" class="btn btn-wide-in btn-primary font-weight-500 rounded-pill mb-2">Continuar</button>' . "\r\n" .
         '                    <div class="btn btn-link btn-sm text-decoration-none">' . "\r\n" .
         '                        <a href="' . BASE_URL . 'cadastrar">Criar conta</a>' . "\r\n" .
         '                    </div>' . "\r\n" .
         '                </div>' . "\r\n" .
         '            </div>' . "\r\n" .
         '        </div>' . "\r\n" .
         '    </div>' . "\r\n" .
         '</form>' . "\r\n\r\n";

    if (isset($slug)) {
        echo '<span id="openCadastro" data-bs-toggle="modal" data-bs-target="#cadastroModal" style="display:none;"></span>' . "\r\n" .
             '<form class="modal fade" id="cadastroModal">' . "\r\n" .
             '    <div class="modal-dialog modal-sm modal-fullscreen-md-down modal-dialog-centered">' . "\r\n" .
             '        <div class="modal-content rounded-0">' . "\r\n" .
             '            <div class="modal-header">' . "\r\n" .
             '                <h5 class="modal-title">Cadastro</h5>' . "\r\n" .
             '                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>' . "\r\n" .
             '            </div>' . "\r\n" .
             '            <div class="modal-body app-form">' . "\r\n" .
             '                <p class="text-muted font-xs">Por favor, entre com seus dados para finalizar o cadastro.</p>' . "\r\n" .
             '                <span id="aviso-login"></span>' . "\r\n" .
             '                <div class="mb-2">' . "\r\n" .
             '                    <label for="firstname" class="form-label">Nome</label>' . "\r\n" .
             '                    <input type="text" name="firstname" class="form-control text-black" id="firstname" placeholder="Nome" required>' . "\r\n" .
             '                </div>' . "\r\n" .
             '                <div class="mb-2">' . "\r\n" .
             '                    <label for="lastname" class="form-label">Sobrenome</label>' . "\r\n" .
             '                    <input type="text" name="lastname" class="form-control text-black" id="lastname" placeholder="Sobrenome" required>' . "\r\n" .
             '                </div>';

        if ($enable_cpf == 1) {
            echo '                <div class="mb-2">' . "\r\n" .
                 '                    <label for="cpf" class="form-label">CPF</label>' . "\r\n" .
                 '                    <input id="cpf" name="cpf" type="text" class="form-control text-black" maxlength="14" pattern=".{14,}" placeholder="000.000.000-00" onkeydown="javascript: fMasc(this, mCPF);" required>' . "\r\n" .
                 '                </div>';
        }

        echo '                <div class="mb-2">' . "\r\n" .
             '                    <label for="phone" class="form-label">Telefone</label>' . "\r\n" .
             '                    <input onkeyup="formatarTEL(this);" maxlength="15" name="phone" id="phone" required class="phone form-control text-black" placeholder="(00) 0000-0000" value="">' . "\r\n" .
             '                </div>';

        if ($enable_two_phone == 1) {
            echo '                <div class="mb-2">' . "\r\n" .
                 '                    <label for="phone_confirm" class="form-label">Confirme seu telefone</label>' . "\r\n" .
                 '                    <input onkeyup="formatarTEL(this);" maxlength="15" name="phone_confirm" id="phone_confirm" required class="form-control text-black" placeholder="(00) 0000-0000" value="">' . "\r\n" .
                 '                </div>';
        }

        if ($enable_email == 1) {
            echo '                <div class="mb-2">' . "\r\n" .
                 '                    <label for="email" class="form-label">E-mail</label>' . "\r\n" .
                 '                    <input type="email" name="email" class="form-control text-black" id="email" placeholder="exemplo@exemplo.com" required>' . "\r\n" .
                 '                </div>';
        }

        if ($enable_password == '1') {
            echo '                <div class="mb-2">' . "\r\n" .
                 '                    <div class="form-floating font-weight-500">' . "\r\n" .
                 '                        <input type="password" name="password" id="password" class="form-control text-black" placeholder="Senha" required>' . "\r\n" .
                 '                        <label for="password">Senha</label>' . "\r\n" .
                 '                    </div>' . "\r\n" .
                 '                </div>' . "\r\n" .
                 '                <div class="btn btn-link btn-sm text-decoration-none mb-4 text-cardLink opacity-75">' . "\r\n" .
                 '                    <a href="/recuperar-senha">Esqueci minha senha</a>' . "\r\n" .
                 '                </div>';
        }

        if (!!$_settings->info('terms')) {
            echo '                <div class="alert alert-primary mt-3 font-xss">' . "\r\n" .
                 '                    Ao se cadastrar você concorda com nossos <a style="color:var(--incrivel-primaria);" href="' . BASE_URL . 'termos-de-uso" target="_blank">termos</a>.' . "\r\n" .
                 '                </div>';
        }

        echo '                <div class="d-flex justify-content-center align-items-center flex-column">' . "\r\n" .
             '                    <button type="submit" class="btn btn-wide-in btn-primary font-weight-500 rounded-pill mb-2">Continuar</button>' . "\r\n" .
             '                </div>' . "\r\n" .
             '            </div>' . "\r\n" .
             '        </div>' . "\r\n" .
             '    </div>' . "\r\n" .
             '</form>';
    }
}

// JavaScript permanece igual
echo "\r\n" . '<script>' . "\r\n\r\n";

echo '    function fMasc(objeto, mascara) {' . "\r\n" .
    '        obj = objeto;' . "\r\n" .
    '        masc = mascara;' . "\r\n" .
    '        setTimeout("fMascEx()", 1);' . "\r\n" .
    '    }' . "\r\n\r\n";

echo '    function fMascEx() {' . "\r\n" .
    '        obj.value = masc(obj.value);' . "\r\n" .
    '    }' . "\r\n\r\n";

echo '    function mCPF(cpf) {' . "\r\n" .
    '        cpf = cpf.replace(/\\D/g, "");' . "\r\n" .
    '        cpf = cpf.replace(/(\\d{3})(\\d)/, "$1.$2");' . "\r\n" .
    '        cpf = cpf.replace(/(\\d{3})(\\d)/, "$1.$2");' . "\r\n" .
    '        cpf = cpf.replace(/(\\d{3})(\\d{1,2})$/, "$1-$2");' . "\r\n" .
    '        return cpf;' . "\r\n" .
    '    }' . "\r\n\r\n";

echo '    function mascara(i) {' . "\r\n" .
    '        let valor = i.value.replace(/\\D/g, "");' . "\r\n\r\n" .
    '        if (isNaN(valor[valor.length - 1])) {' . "\r\n" .
    '            i.value = valor.slice(0, -1);' . "\r\n" .
    '            return;' . "\r\n" .
    '        }' . "\r\n\r\n" .
    '        i.setAttribute("maxlength", "14");' . "\r\n\r\n" .
    '        i.value = valor.replace(/(\\d{3})(\\d{3})(\\d{3})(\\d{2})/, "$1.$2.$3-$4");' . "\r\n" .
    '    }' . "\r\n\r\n";

echo '    $(document).ready(function () {' . "\r\n" .
    '        $(\'#form-cadastrar, #cadastroModal\').submit(function (e) {' . "\r\n" .
    '            e.preventDefault();' . "\r\n" .
    '            var phoneValue = $(\'.phone\').val();' . "\r\n" .
    '            var phoneConfirmValue = $(\'.phone_confirm\').val();' . "\r\n\r\n" .
    '            if ($(\'.phone\')) {' . "\r\n" .
    '                if (phoneValue.length < 15 || phoneValue.length > 15) {' . "\r\n" .
    '                    alert(\'Telefone inválido. Por favor corrija.\');' . "\r\n" .
    '                    return;' . "\r\n" .
    '                }' . "\r\n" .
    '            }' . "\r\n\r\n" .
    '            if (phoneConfirmValue) {' . "\r\n" .
    '                if (phoneConfirmValue != phoneValue) {' . "\r\n" .
    '                    alert(\'Telefone inválido. Por favor corrija\');' . "\r\n" .
    '                    return;' . "\r\n" .
    '                }' . "\r\n" .
    '            }' . "\r\n\r\n";

echo '            $.ajax({' . "\r\n" .
    '                url: _base_url_ + "class/Customer.php?action=registration",' . "\r\n" .
    '                method: \'POST\',' . "\r\n" .
    '                data: new FormData($(this)[0]),' . "\r\n" .
    '                dataType: \'json\',' . "\r\n" .
    '                cache: false,' . "\r\n" .
    '                processData: false,' . "\r\n" .
    '                contentType: false,' . "\r\n" .
    '                error: err => {' . "\r\n" .
    '                    console.log(err);' . "\r\n" .
    '                    alert(\'An error occurred\');' . "\r\n" .
    '                },' . "\r\n" .
    '                success: function (resp) {' . "\r\n" .
    '                    if (resp.status == \'success\') {' . "\r\n" .
    '                        $(\'.btn-close\').click();' . "\r\n" .
    '                        $(\'#overlay\').fadeIn(300);' . "\r\n" .
    '                        setTimeout(function () {' . "\r\n" .
    '                            $(\'#add_to_cart\').click();' . "\r\n" .
    '                        }, 1000);' . "\r\n" .
    '                        setTimeout(function () {' . "\r\n" .
    '                            $(\'#place_order\').click();' . "\r\n" .
    '                        }, 2000);' . "\r\n\r\n" .
    '                    } else if (resp.status == \'phone_already\') {' . "\r\n" .
    '                        alert(resp.msg);' . "\r\n" .
    '                    } else if (resp.status == \'cpf_already\') {' . "\r\n" .
    '                        alert(resp.msg);' . "\r\n" .
    '                    } else if (resp.status == \'email_already\') {' . "\r\n" .
    '                        alert(resp.msg);' . "\r\n" .
    '                    } else {' . "\r\n" .
    '                        alert(\'An error occurred\');' . "\r\n" .
    '                        console.log(resp);' . "\r\n" .
    '                    }' . "\r\n" .
    '                }' . "\r\n" .
    '            });' . "\r\n" .
    '        });' . "\r\n" .
    '    });' . "\r\n\r\n";

echo '    $(document).ready(function () {' . "\r\n" .
    '        $(\'#loginModal\').submit(function (e) {' . "\r\n" .
    '            e.preventDefault();' . "\r\n" .
    '            $.ajax({' . "\r\n" .
    '                url: _base_url_ + "class/Auth.php?action=login_customer",' . "\r\n" .
    '                method: \'POST\',' . "\r\n" .
    '                data: new FormData($(this)[0]),' . "\r\n" .
    '                dataType: \'json\',' . "\r\n" .
    '                cache: false,' . "\r\n" .
    '                processData: false,' . "\r\n" .
    '                contentType: false,' . "\r\n" .
    '                error: err => {' . "\r\n" .
    '                    console.log(err);' . "\r\n" .
    '                    alert(\'An error occurred\');' . "\r\n" .
    '                },' . "\r\n" .
    '                success: function (resp) {' . "\r\n" .
    '                    if (resp.status == \'success\') {' . "\r\n" .
    '                        ';

if (isset($slug)) {
    echo '                            $(\'.btn-close\').click();' . "\r\n" .
        '                            $(\'#overlay\').fadeIn(300);' . "\r\n" .
        '                            setTimeout(function () {' . "\r\n" .
        '                                $(\'#add_to_cart\').click();' . "\r\n" .
        '                            }, 1000);' . "\r\n" .
        '                            setTimeout(function () {' . "\r\n" .
        '                                $(\'#place_order\').click();' . "\r\n" .
        '                            }, 2000);' . "\r\n";
} else {
    echo '                            location.reload();' . "\r\n";
}

echo '                    } else if (!!resp.msg) {' . "\r\n";

if (!isset($slug)) {
    echo '                            var phone = $(\'#loginModal #phone\').val();' . "\r\n" .
        '                            $(\'#aviso-login\').html(\'<div style="color:red;font-size:14px;margin-bottom:10px;">Telefone ou senha incorretos!</div>\');' . "\r\n";
} else {
    echo '                            var phone = $(\'#loginModal #phone\').val();' . "\r\n" .
        '                            $(\'#cadastroModal #phone\').val(phone);' . "\r\n" .
        '                            $(\'#openCadastro\').click();' . "\r\n";
}

echo '                    } else {' . "\r\n" .
    '                        alert(\'An error occurred\')' . "\r\n" .
    '                        console.log(resp)' . "\r\n" .
    '                    }' . "\r\n" .
    '                }' . "\r\n" .
    '            })' . "\r\n" .
    '        })' . "\r\n" .
    '    })' . "\r\n" .
    '    function formatarTEL(e) {' . "\r\n" .
    '        v = e.value;' . "\r\n" .
    '        console.log("v:" + v);' . "\r\n" .
    '        console.log("v.length:" + v.length);' . "\r\n" .
    '        v = v.replace(/\\D/g, "");' . "\r\n" .
    '        v = v.replace(/^(\\d{2})(\\d)/g, "($1) $2");' . "\r\n" .
    '        console.log("v:" + v);' . "\r\n" .
    '        v = v.replace(/(\\d)(\\d{4})$/, "$1-$2");' . "\r\n" .
    '        e.value = v;' . "\r\n" .
    '    }' . "\r\n" .
    '    function formatarCPF(r) {' . "\r\n" .
    '        var e = (r = r.replace(/\\D/g, ""))' . "\r\n" .
    '            .replace(/(\\d{3})(\\d{3})(\\d{3})(\\d{2})/, "$1.$2.$3-$4");' . "\r\n" .
    '        document.getElementById("cpf").value = e;' . "\r\n" .
    '    }' . "\r\n" .
    '</script>' . "\r\n" .
    '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>' . "\r\n" .
    '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous" data-nscript="afterInteractive"></script>' . "\r\n" .
    '</body>' . "\r\n" .
    '</html>';
?>
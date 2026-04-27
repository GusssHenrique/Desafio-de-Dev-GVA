<?php

$nome_evento  = "TechDay 2026";
$data_evento  = "27 de abril de 2026";
$local_evento = "São Paulo, SP";

$tipos = [
    "estudante"    => "Estudante",
    "profissional" => "Profissional",
    "empreendedor" => "Empreendedor",
    "investidor"   => "Investidor",
    "professor"    => "Professor / Pesquisador",
];

$interesses = [
    "ia"        => "Inteligência Artificial",
    "mobile"    => "Dev Mobile",
    "web"       => "Dev Web",
    "dados"     => "Ciência de Dados",
    "seguranca" => "Segurança da Info.",
    "ux"        => "UX & Design",
    "cloud"     => "Cloud & DevOps",
    "empreend"  => "Empreendedorismo",
];

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscrição — <?= $nome_evento ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <div class="container">
        <div class="d-flex align-items-center gap-3">
            <img src="logo-gva.png" alt="GVA" style="height:30px;">
            <span class="logo-text"><?= $nome_evento ?></span>
        </div>
        <nav>
            <span><?= $data_evento ?></span>
            <span><?= $local_evento ?></span>
        </nav>
    </div>
</header>

<section class="hero">
    <div class="container">
        <p class="text-uppercase small mb-3" style="color:var(--muted);letter-spacing:.1em;">Evento de tecnologia</p>
        <h1 class="mb-3">Conectando pessoas<br>e <strong>ideias</strong>.</h1>
        <p class="mb-4" style="color:var(--muted);max-width:480px;">Dois dias de palestras, workshops e networking com os principais nomes do mercado tech.</p>
        <a href="#inscricao" class="btn-cta">Inscreva-se agora</a>
    </div>
</section>

<section id="inscricao">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">

                <h2 class="mb-1">Formulário de inscrição</h2>
                <p class="mb-4 small" style="color:var(--muted);">Campos marcados com * são obrigatórios.</p>

                <form id="formInscricao" novalidate>

                    <div class="bloco">
                        <p class="bloco-titulo">Dados pessoais</p>

                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome completo *</label>
                            <input type="text" id="nome" class="form-control" placeholder="Seu nome completo">
                            <div class="invalid-feedback">Preencha seu nome.</div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="email" class="form-label">E-mail *</label>
                                <input type="email" id="email" class="form-control" placeholder="voce@email.com">
                                <div class="invalid-feedback">Informe um e-mail válido.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="telefone" class="form-label">Telefone *</label>
                                <input type="tel" id="telefone" class="form-control" placeholder="(11) 99999-9999" maxlength="15">
                                <div class="invalid-feedback">Informe seu telefone.</div>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="cidade" class="form-label">Cidade *</label>
                                <input type="text" id="cidade" class="form-control" placeholder="Sua cidade">
                                <div class="invalid-feedback">Informe sua cidade.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="tipo" class="form-label">Tipo de participante *</label>
                                <select id="tipo" class="form-select">
                                    <option value="">Selecione...</option>
                                    <?php foreach ($tipos as $val => $label): ?>
                                        <option value="<?= $val ?>"><?= $label ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">Selecione uma opção.</div>
                            </div>
                        </div>
                    </div>

                    <div id="bloco-empreendedor" class="bloco" style="display:none;border-color:rgba(233,30,140,.2);background:rgba(233,30,140,.04);">
                        <p class="bloco-titulo">Sobre sua empresa</p>

                        <div class="mb-3">
                            <label for="empresa" class="form-label">Nome da empresa</label>
                            <input type="text" id="empresa" class="form-control" placeholder="Razão social ou nome fantasia">
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="segmento" class="form-label">Segmento</label>
                                <select id="segmento" class="form-select">
                                    <option value="">Selecione...</option>
                                    <option>Tecnologia</option>
                                    <option>Saúde</option>
                                    <option>Educação</option>
                                    <option>Finanças</option>
                                    <option>Outro</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="funcionarios" class="form-label">Funcionários</label>
                                <select id="funcionarios" class="form-select">
                                    <option value="">Selecione...</option>
                                    <option>Só eu</option>
                                    <option>2 a 10</option>
                                    <option>11 a 50</option>
                                    <option>Mais de 50</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="bloco">
                        <p class="bloco-titulo">Interesses <span style="text-transform:none;letter-spacing:0;font-weight:400;">(máx. 3)</span></p>

                        <div id="aviso-interesses" class="aviso" style="display:none;">
                            Limite atingido. Desmarque um item para trocar.
                        </div>

                        <div class="chips">
                            <?php foreach ($interesses as $val => $label): ?>
                                <label class="chip">
                                    <input type="checkbox" class="interesse-check" value="<?= $val ?>">
                                    <span><?= $label ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="bloco">
                        <p class="bloco-titulo">Mensagem</p>
                        <label for="mensagem" class="form-label">Dúvidas ou expectativas?</label>
                        <textarea id="mensagem" class="form-control" rows="4" maxlength="500" placeholder="Escreva aqui..."></textarea>
                        <div class="char-count"><span id="chars">0</span>/500</div>
                    </div>

                    <div class="bloco">
                        <div class="form-check">
                            <input type="checkbox" id="termos" class="form-check-input">
                            <label for="termos" class="form-check-label">
                                Li e concordo com os <a href="#">Termos de Uso</a> e <a href="#">Política de Privacidade</a>. *
                            </label>
                            <div class="invalid-feedback">Você precisa aceitar os termos.</div>
                        </div>
                    </div>

                    <button type="button" id="btn-resumo">Ver resumo da inscrição</button>

                </form>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-resumo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Resumo da inscrição</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="conteudo-resumo"></div>
            <div class="modal-footer">
                <button class="btn-sec" data-bs-dismiss="modal">Editar</button>
                <button id="btn-confirmar" class="btn-grad">Confirmar inscrição</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-confirmacao" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center p-5">
            <div class="sucesso-icon">✓</div>
            <h5>Inscrição confirmada!</h5>
            <p style="color:var(--muted);">Obrigado! Você receberá um e-mail de confirmação em breve.</p>
            <button class="btn-grad mt-3" data-bs-dismiss="modal">Fechar</button>
        </div>
    </div>
</div>

<footer>
    <div class="container">
        <span><?= $nome_evento ?></span>
        <span><?= $data_evento ?> · <?= $local_evento ?></span>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="app.js"></script>
</body>
</html>

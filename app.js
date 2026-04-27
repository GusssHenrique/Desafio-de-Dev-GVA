var rotulos = {
    tipos: {
        estudante: "Estudante", profissional: "Profissional",
        empreendedor: "Empreendedor", investidor: "Investidor", professor: "Professor / Pesquisador"
    },
    interesses: {
        ia: "Inteligência Artificial", mobile: "Dev Mobile", web: "Dev Web",
        dados: "Ciência de Dados", seguranca: "Segurança da Info.",
        ux: "UX & Design", cloud: "Cloud & DevOps", empreend: "Empreendedorismo"
    }
};

document.getElementById("tipo").addEventListener("change", function () {
    var bloco = document.getElementById("bloco-empreendedor");
    bloco.style.display = this.value === "empreendedor" ? "block" : "none";
    if (this.value !== "empreendedor")
        bloco.querySelectorAll("input, select").forEach(function (el) { el.value = ""; });
});

document.querySelectorAll(".interesse-check").forEach(function (cb) {
    cb.addEventListener("change", function () {
        var total = document.querySelectorAll(".interesse-check:checked").length;
        document.getElementById("aviso-interesses").style.display = total >= 3 ? "block" : "none";
        document.querySelectorAll(".interesse-check").forEach(function (el) {
            el.disabled = total >= 3 && !el.checked;
        });
    });
});

document.getElementById("mensagem").addEventListener("input", function () {
    document.getElementById("chars").textContent = this.value.length;
});

document.getElementById("telefone").addEventListener("input", function () {
    var n = this.value.replace(/\D/g, "").substring(0, 11);
    var v = "";
    if (n.length > 0) v = "(" + n.substring(0, 2);
    if (n.length >= 2) v += ") " + n.substring(2, 7);
    if (n.length >= 7) v += "-" + n.substring(7, 11);
    this.value = v;
});

function validar() {
    var ok = true;
    document.querySelectorAll(".is-invalid").forEach(function (el) { el.classList.remove("is-invalid"); });

    [["nome",     function (v) { return v.trim() !== ""; }],
     ["email",    function (v) { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v); }],
     ["telefone", function (v) { return v.trim() !== ""; }],
     ["cidade",   function (v) { return v.trim() !== ""; }],
     ["tipo",     function (v) { return v !== ""; }]
    ].forEach(function (par) {
        var el = document.getElementById(par[0]);
        if (!par[1](el.value)) { el.classList.add("is-invalid"); ok = false; }
    });

    var termos = document.getElementById("termos");
    if (!termos.checked) { termos.classList.add("is-invalid"); ok = false; }

    return ok;
}

function montarResumo() {
    var tipo = document.getElementById("tipo").value;
    var selecionados = Array.from(document.querySelectorAll(".interesse-check:checked"))
                           .map(function (cb) { return rotulos.interesses[cb.value]; });

    function linha(c, v) {
        return '<div class="resumo-linha"><span class="resumo-chave">' + c + '</span><span>' + (v || "—") + '</span></div>';
    }
    function bloco(t, c) {
        return '<div class="resumo-bloco"><p class="resumo-bloco-titulo">' + t + '</p>' + c + '</div>';
    }

    var html = bloco("Dados pessoais",
        linha("Nome",          document.getElementById("nome").value) +
        linha("E-mail",        document.getElementById("email").value) +
        linha("Telefone",      document.getElementById("telefone").value) +
        linha("Cidade",        document.getElementById("cidade").value) +
        linha("Participante",  rotulos.tipos[tipo])
    );

    if (tipo === "empreendedor") {
        html += bloco("Empresa",
            linha("Empresa",      document.getElementById("empresa").value) +
            linha("Segmento",     document.getElementById("segmento").value) +
            linha("Funcionários", document.getElementById("funcionarios").value)
        );
    }

    html += bloco("Interesses", linha("Selecionados", selecionados.join(", ") || "Nenhum"));
    html += bloco("Mensagem",   linha("Observações",  document.getElementById("mensagem").value));

    return html;
}

document.getElementById("btn-resumo").addEventListener("click", function () {
    if (!validar()) {
        var el = document.querySelector(".is-invalid");
        if (el) el.scrollIntoView({ behavior: "smooth", block: "center" });
        return;
    }
    document.getElementById("conteudo-resumo").innerHTML = montarResumo();
    new bootstrap.Modal(document.getElementById("modal-resumo")).show();
});

document.getElementById("btn-confirmar").addEventListener("click", function () {
    bootstrap.Modal.getInstance(document.getElementById("modal-resumo")).hide();
    document.getElementById("modal-resumo").addEventListener("hidden.bs.modal", function handler() {
        new bootstrap.Modal(document.getElementById("modal-confirmacao")).show();
        this.removeEventListener("hidden.bs.modal", handler);
    });
});

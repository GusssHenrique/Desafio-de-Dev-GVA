# Página de Inscrição em Evento
Desafio proposto: desenvolver uma página responsiva de inscrição para um evento, utilizando PHP, HTML5, CSS3, Bootstrap 5 e JavaScript puro, sem envio real do formulário.

# TechDay 2026 — Página de Inscrição

Página de inscrição para evento fictício desenvolvida para desafio de Estágio em Desenvolvimento de Software da GVA.

## Estrutura das pastas

```
event-inscricao/
├── index.php   → página principal do evento
├── style.css   → estilo (bootstrap customizado)
├── app.js      → interações com JavaScript puro
└── README.md   → arquivo de informações e instruções
```

---

## Como instalar o PHP

### Windows

1. Acesse https://windows.php.net/download
2. Na seção **VS16 x64 Non Thread Safe**, clique em **Zip** para baixar
3. Crie a pasta `C:\php` e extraia todo o conteúdo do arquivo `.zip` baixado dentro dela
4. Agora é necessário adicionar o PHP ao PATH do sistema para que o terminal o reconheça:
   - Pressione `Windows + S` e pesquise por **"Variáveis de ambiente"**
   - Clique em **"Editar as variáveis de ambiente do sistema"**
   - Na janela que abrir, clique no botão **"Variáveis de Ambiente..."** (canto inferior direito)
   - Na seção de baixo (**"Variáveis do sistema"**), localize a variável **Path** e clique duas vezes nela
   - Clique em **"Novo"** e digite: `C:\php`
   - Clique em **OK** em todas as janelas abertas para salvar
5. Abra um novo terminal (Prompt de Comando ou PowerShell) e rode `php -v` para confirmar que funcionou

---

### Mac

1. Abra o **Terminal** (pressione `Cmd + Espaço`, digite "Terminal" e pressione Enter)
2. Primeiro instale o Homebrew (gerenciador de pacotes do Mac) colando o comando abaixo e pressionando Enter:
   ```
   /bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
   ```
   Aguarde a instalação terminar (pode demorar alguns minutos)
3. Com o Homebrew instalado, instale o PHP:
   ```
   brew install php
   ```
4. Quando terminar, rode `php -v` para confirmar que funcionou

---

### Linux (Ubuntu/Debian)

1. Abra o terminal
2. Rode os comandos abaixo em ordem:
   ```
   sudo apt update
   sudo apt install php
   ```
3. Quando terminar, rode `php -v` para confirmar que funcionou

---

## Como rodar a aplicação

1. Abra o terminal de comando e navegue até a pasta do projeto (substitua `<PastaDestino>` pelo caminho real):

   **Windows:**

   ```
   cd C:\<PastaDestino>\event-inscricao
   ```

   **Mac/Linux:**

   ```
   cd ~/<PastaDestino>/event-inscricao
   ```

2. Suba o servidor:

   ```
   php -S localhost:8000
   ```

3. Acesse no navegador: **http://localhost:8000**

4. Para encerrar o servidor, volte ao terminal e pressione `Ctrl + C`
****

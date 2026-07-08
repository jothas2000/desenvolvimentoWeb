# 📄 Gestão de Conteúdo — CRUD com Arquivo de Texto

Sistema de gestão simples e funcional desenvolvido em **PHP puro**, sem dependência de base de dados SQL. Utiliza um arquivo de texto (`db.txt`) como armazenamento, sendo ideal para projetos pequenos, protótipos ou ambientes de aprendizagem.

---

## ✨ Funcionalidades

- **Autenticação de utilizador** — login protegido por sessão PHP.
- **CRUD completo** — criar, ler, editar e remover linhas no arquivo de texto.
- **Validação de inputs** — remove quebras de linha para preservar a estrutura do ficheiro.
- **Logout** — destrói a sessão de forma segura.
- **Interface responsiva** — CSS unificado e limpo.

---

## 🛠 Tecnologias Utilizadas

- **PHP 8.x** — processamento server-side puro (sem frameworks).
- **HTML5 + CSS3** — interface leve e responsiva.
- **Sessões PHP** — controlo de autenticação.
- **Arquivo de texto** — armazenamento simples baseado em ficheiro.

---

## 🚀 Como Executar (XAMPP)

### Pré-requisitos

- [XAMPP](https://www.apachefriends.org/) (PHP 8.x + Apache) instalado.

### Passos

1. **Iniciar o XAMPP** e ativar o módulo **Apache**.

2. **Colocar o projecto na pasta `htdocs`**:

   ```bash
   cp -r /caminho/do/projeto C:\xampp\htdocs\gestao-conteudo
   ```

3. **Criar o ficheiro de dados** (se não existir):

   ```bash
   cp data/db.example.txt data/db.txt
   ```
   > O ficheiro `data/db.txt` está no `.gitignore` e **não** é versionado.

4. **Abrir no navegador**:

   ```
   http://localhost/gestao-conteudo
   ```

### Credenciais Padrão

| Utilizador | Senha |
|------------|-------|
| `admin`    | `admin` |

> ⚠ Altere as credenciais no ficheiro `login.php` antes de utilizar em produção.

---

## 📁 Estrutura do Projecto

```
├── assets/
│   └── css/
│       └── style.css          # CSS unificado
├── includes/
│   └── auth.php               # Verificação de autenticação
├── data/
│   ├── db.txt                 # Base de dados (ignorado pelo git)
│   └── db.example.txt         # Ficheiro de exemplo
├── index.php                  # Página de login
├── login.php                  # Processamento do login
├── logout.php                 # Logout seguro
├── telaInicial.php            # Página principal (listagem)
├── inserir.php                # Formulário de nova linha
├── adicionar.php              # Processamento de inserção
├── editar.php                 # Formulário de edição
├── salvar.php                 # Processamento de edição
├── excluir.php                # Processamento de exclusão
├── .gitignore
└── README.md
```

---

## 🔒 Segurança

- Sessão regenerada (`session_regenerate_id`) após login bem-sucedido.
- Validação de autenticação em todas as páginas protegidas via `includes/auth.php`.
- Inputs sanitizados (remoção de `\r` e `\n`) para preservar a estrutura do ficheiro.
- Dados escapados com `htmlspecialchars` na saída.

---

📌 **Projecto mínimo, funcional e didáctico.** Ideal para quem está a aprender PHP ou precisa de um CRUD leve sem base de dados.

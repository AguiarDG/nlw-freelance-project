<p align="center">
  <a href="" rel="noopener">
 <img width=200px height=140px src="https://www.valuehost.com.br/blog/wp-content/uploads/2016/10/freelancer.jpg.webp" alt="Project logo"></a>
</p>

<h3 align="center">Sistema de Freelancers</h3>

<div align="center">

[![Status](https://img.shields.io/badge/status-active-success.svg)]()
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](/LICENSE)

</div>

---

<p align="center"> 
    <br> Projeto do curso de PHP da empresa Rocketseat.
</p>

## 📝 Menu

- [Sobre](#about)
- [Início](#getting_started)
- [Como utilizar](#usage)
- [Técnologias](#built_using)
- [Author](#author)

## 🧐 Sobre <a name = "about"></a>

Projeto desenvolvido durante o curso da empresa Rocketseat, para fixação do aprendizado sobre o Framework Laravel com Livewire, utilizei o banco de dados PostgreSQL em docker.

## 🏁 Início <a name = "getting_started"></a>

Essas instruções ajudarão você a obter uma cópia do projeto funcionando em sua máquina local para fins de desenvolvimento e teste.

### Prérequisitos

Antes de começar, você precisará instalar as seguintes ferramentas:

- [Git](https://git-scm.com)
- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/)
- [PHP 8.2+](https://php.net)
- [Laravel](https://laravel.com/docs/11.x/installation)
- SGBG de sua preferencia, utilizei o [pgAdmin 4](https://www.pgadmin.org)

### Instalação

Siga as etapas abaixo para configurar o ambiente de desenvolvimento.

1. Clone o repositório:

  ```bash
   git clone https://gitlab.com/aguiardg/nlw-freelance-project.git
   cd nlw-freelance-project
  ```

2. Crie um arquivo .env baseado no arquivo .env.example e preencha as variáveis conforme necessário.

3. Instale as dependências do projeto:

  ```bash
    npm install
  ```

4. Inicie o contêiner do PostgreSQL via Docker:

  ```bash
    docker-compose up -d
  ```

5. Crie um banco de dados (como especificado no arquivo .env) e depois execute o migrate (Criar as tabelas)
  - Caso não queira rodar o migrate, na raiz do projeto tem um dump do banco de dados
  ```bash
    php artisan migrate
  ```

6. Realizar o build do Frontend
  ```
    npm run build
  ```

7. Executar o projeto com o comando:

  ```bash
    php artisan serve
  ```

8. O projeto deve estar rodando na porta 8000:

  ```bash
    http://127.0.0.1:8000
  ```
## 🎈 Como utilizar <a name="usage"></a>

No momento o projeto exibe os projectos cadastrados no banco de dados e o usuario vai cadastradar as propostas de quantidade de horas que seriam gastas para aquele projeto.

## ⛏️ Técnologias <a name = "built_using"></a>

- [PostgreSQL](https://www.postgresql.org/) - Database
- [Laravel 11](https://www.laravel.com/) - Web Framework
- [Livewire](https://livewire.laravel.com/docs/quickstart) - Frontend Toolkit
- [Vite](https://vitejs.dev) - Compile Frontend Toolkit

## ✍️ Autor <a name="autor"></a>

- [@AguiarDG](https://gitlab.com/aguiardg)

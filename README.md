# 🕒 Sistema de Ponto Eletrônico

Este projeto é um sistema simples de **registro de ponto eletrônico**, desenvolvido com **PHP** e **MySQL**, que permite o controle de horários dos usuários. O sistema possui dois tipos de usuários: **comuns**, que registram seus horários, e **administradores**, que podem gerenciar os cadastros e visualizar os pontos registrados.

## 🚀 Funcionalidades

- Login com autenticação por e-mail e senha
- Registro de ponto com 4 tipos de marcação:
  - Entrada
  - Saída para almoço
  - Retorno do almoço
  - Saída final
- Cadastro e edição de usuários (admin)
- Listagem de todos os usuários (admin)
- Diferenciação entre usuários comuns e administradores

## 🛠 Tecnologias utilizadas

- PHP 8.x
- MySQL (ou MariaDB)
- HTML + CSS (estrutura básica)
- phpMyAdmin (para gerenciar o banco em desenvolvimento)


## Como executar o projeto

1. Clone o repositório:
   ```bash
   git clone https://github.com/Pedroshpg/ponto-eletr-nico.git

2. Importe o banco de dados:

Use o arquivo ponto_eletr__nico.sql para importar no phpMyAdmin ou via linha de comando no MySQL.

3. Coloque os arquivos .php em um servidor local, como:
XAMPP

Acesse http://localhost/login.php no navegador para utilizar o sistema.
🧾 Banco de dados
O banco possui duas tabelas principais:

usuarios: armazena nome, data de nascimento, e-mail, senha e tipo de acesso (admin ou comum)

registros: armazena os registros de ponto com data/hora e tipo (entrada, saída, etc.)


👨‍💻 Autor
Desenvolvido por Pedro Noleto



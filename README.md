# CutuCar Web App 🚘

Este projeto foi desenvolvido como atividade da disciplina de Web III do curso de Sistemas para Internet. Trata-se de um sistema CRUD desenvolvido em PHP que tem como finalidade gerenciar as vagas de um estacionamento. Com ele, é possível realizar operações de criação, leitura, atualização e exclusão de informações sobre os clientes, carros, vagas, tickets e tipos de veículos.

## 🔖 Sumário

- [Autores](#-autores)
- [Pré-requisitos e observações](#-pré-requisitos-e-observações)
- [Estrutura](#-estrutura)
- [Schemas](#-schemas)
  - [Carro](#carro)
  - [Cliente](#cliente)
  - [Ticket](#ticket)
  - [Tipo](#tipo)
  - [Usuário](#usuário)
  - [Vaga](#vaga)

## 👥 Autores

| <img src="https://avatars.githubusercontent.com/u/14907837?v=4" width=115> | <img src="https://avatars.githubusercontent.com/u/117425361?v=4" width=115> | <img src="https://avatars.githubusercontent.com/u/14957082?s=200&v=4" width=115> |
| :------------------------------------------------------------------------: | :-------------------------------------------------------------------------: | :-------------------------------------------------------------------------: |
|           [Mateus Seiboth](https://github.com/mateusseiboth)           |              [Flavio Henrique](https://github.com/flaviojrdev)              |               [ChatGPT](https://github.com/openai)                |

## 🧰 Pré-requisitos e observações

### Tecnologias

- 🐘 [PostgreSQL](https://www.postgresql.org/)
- 🐘 [PHP](https://www.php.net/)

### Usuário de testes

| Usuário  | Senha |
|----------|-------|
| osshiro  | teste |

### Cadastros criados

- Número de cadastros com relacionamento: **2**
- Número de cadastros simples: **4**

## 🏗️ Estrutura

O projeto segue uma estrutura MVC com as seguintes pastas:

- 📁 **models**: Contém os arquivos que definem as classes e funções que se relacionam com o banco de dados.
- 📁 **views**: Contém as páginas HTML que são exibidas aos usuários do sistema.
- 📁 **controllers**: Contém os arquivos que gerenciam as requisições do usuário e fazem a intermediação entre a camada de modelo e a camada de visualização.
- 📁 **JS**: Contém os arquivos JavaScript que são usados na construção da interface do usuário.
- 📁 **img**: Contém as imagens utilizadas no projeto.

## 🧱 Schemas

### Carro
| Chave     | Tipo de dado | 
|-----------|-------------|
| id        | `integer` (primary key) | 
| placa     | `varchar` | 
| cliente_id| `integer` (foreign key)|

### Cliente
| Chave     | Tipo de dado | 
|-----------|-------------|
| id        | `integer` (primary key) | 
| nome      | `varchar` | 
| cpf       | `varchar` | 
| telefone  | `varchar` | 

### Ticket
| Chave     | Tipo de dado | 
|-----------|-------------|
| id        | `integer` (primary key) | 
| carro_id  | `integer` | 
| vaga_id   | `integer` (foreign key)| 
| tipo_id   | `integer` (foreign key)| 
| hora_entrada | `timestamp` | 
| estado    | `boolean` | 
| hora_saida| `timestamp` | 
| total_pago| `numeric` | 

### Tipo
| Chave     | Tipo de dado | 
|-----------|-------------|
| id        | `integer` (primary key) | 
| preco     | `numeric` | 
| descr     | `varchar` | 

### Usuário
| Chave     | Tipo de dado | 
|-----------|-------------|
| id        | `integer` (primary key) | 
| username  | `varchar` | 
| password  | `varchar` | 

### Vaga
| Chave     | Tipo de dado | 
|-----------|-------------|
| id        | `integer` (primary key) | 
| estado    | `boolean` |

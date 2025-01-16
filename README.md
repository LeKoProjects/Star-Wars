# Projeto Catálogo Star Wars

Este projeto é um sistema web que utiliza a API do Star Wars como fonte de informações para exibir um catálogo de filmes e seus detalhes.

### Funcionalidades Principais
1. Listagem de todos os filmes, ordenados por data de lançamento.
2. Exibição dos detalhes de cada filme, incluindo:
   - Nome, Nº episódio, sinopse, data de lançamento, diretor, produtores, personagens e a idade do filme.
3. Registro de logs de todas as interações com a API no banco de dados.
4. Estilo responsivo utilizando Bootstrap.

---

## Requisitos do Projeto
- **PHP 7.4+**
- **MySQL**
- **Navegador Moderno** (com suporte a JavaScript)

### Requisitos Adicionais
- A API do Star Wars utilizada nesse projeto.
    https://swapi.dev/

---

## Instruções de Instalação

1. Clone o repositório ou extraia os arquivos.

   git clone (https://github.com/LeKoProjects/Star-Wars.git)

2. Configure o banco de dados:
   - Crie um banco de dados chamado `star_wars`.
   - Importe o arquivo `dump.sql` localizado na pasta `database/`.

   ```sql
   CREATE DATABASE star_wars;
   USE star_wars;
   SOURCE caminho/para/dump.sql;
   ```

3. Copie o arquivo `config/database.php.example` para `config/database.php`.
   Atualize as credenciais no arquivo `config/database.php`.
   ```php
   <?php
   return [
       'host' => 'localhost',
       'database' => 'star_wars',
       'username' => 'seu_usuario',
       'password' => 'sua_senha',
   ];
   ```

4. Inicie o servidor local:
   ```bash
   php -S localhost:8000 -t public
   ```

5. Acesse `http://localhost:8000` no navegador.

---

## Descrição da API Criada

### Endpoint 1: Catálogo
- **Rota:** `/catalogo`
- **Método:** `GET`
- **Descrição:** Retorna a lista de filmes ordenados por data de lançamento.

### Endpoint 2: Detalhes
- **Rota:** `/detalhes`
- **Método:** `GET`
- **Parâmetros:**
  - `id`: O ID do filme a ser consultado.
- **Descrição:** Retorna os detalhes do filme e a lista de personagens.

---

## Funcionalidades Implementadas

1. **Catálogo de Filmes**
   - Exibe a lista de filmes com título e data de lançamento.
   - Ordena por data de lançamento.

2. **Detalhes do Filme**
   - Exibe detalhes como título, episódio, sinopse, diretor, produtores, e personagens.
   - Calcula a idade do filme em anos, meses e dias.

3. **Logs de Interações**
   - Cada interação com os endpoints é registrada no banco de dados, incluindo:
     - Data e hora.
     - Tipo de requisição.
---

## Melhorias Aplicadas

1. **Estruturação em MVC**
   - Separção clara entre controladores, modelos e views.

2. **Estilização com Bootstrap**
   - Layout moderno e responsivo.

3. **Criação Automática de Tabelas no Banco de Dados**
   - Implementado um script que verifica a existência das tabelas no banco de dados e as cria automaticamente na primeira execução, garantindo que o sistema funcione sem erros mesmo em instalações iniciais.

---

## Como Rodar o Projeto

1. Certifique-se de que o banco de dados está configurado corretamente.
2. Suba o servidor local:
   ```bash
   php -S localhost:8000 -t public
   ```
3. Abra o navegador e acesse:
   ```url
   http://localhost:8000
   ```

4. Navegue pelo catálogo e clique em "Ver Detalhes" para explorar as funcionalidades.


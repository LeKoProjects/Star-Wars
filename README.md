# Projeto Catálogo Star Wars

Este projeto é um sistema web que utiliza a API do Star Wars como fonte de informações para exibir um catálogo de filmes e seus detalhes.

### Funcionalidades Principais
1. Listagem de todos os filmes, ordenados por data de lançamento.
2. Exibição dos detalhes de cada filme, incluindo:
   - Nome, Nº episódio, sinopse, data de lançamento, diretor, produtores, personagens e a idade do filme.
3. Registro de logs de todas as interações com a API no banco de dados.
4. Estilo responsivo utilizando Bootstrap.
5. Requisições dinâmicas com jQuery.

---

## Requisitos do Projeto
- **PHP 7.4+**
- **MySQL**
- **Servidor Web** (como Apache ou Nginx)
- **Navegador Moderno** (com suporte a JavaScript)

### Requisitos Adicionais
- A API do Star Wars deve estar acessível na internet.

---

## Instruções de Instalação

1. Clone o repositório ou extraia os arquivos.

   git clone <URL_DO_REPOSITORIO>(https://github.com/LeKoProjects/Star-Wars.git)

2. Configure o banco de dados:
   - Crie um banco de dados chamado `star_wars`.
   - Importe o arquivo `dump.sql` localizado na pasta `database/`.

   ```sql
   CREATE DATABASE star_wars;
   USE star_wars;
   SOURCE caminho/para/dump.sql;
   ```

3. Configure as credenciais do banco no arquivo `config/database.php`:
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
   - Separação clara entre controladores, modelos e views.

2. **Estilização com Bootstrap**
   - Layout moderno e responsivo.

---

## Dump do Banco de Dados
Certifique-se de exportar o banco de dados para um arquivo SQL e colocá-lo na pasta `database/`.

```bash
mysqldump -u seu_usuario -p star_wars > database/dump.sql
```

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


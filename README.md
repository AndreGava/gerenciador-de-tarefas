PT/EN

# Gerenciador de Tarefas - PHP e MySQL

Este é um projeto simples de um gerenciador de tarefas utilizando PHP puro e MySQL. Permite adicionar, editar, excluir e listar tarefas.

## Requisitos

- Servidor web com suporte a PHP (ex: Apache)
- MySQL

## Configuração do Banco de Dados

1. Crie um banco de dados chamado `gerenciador_tarefas`.
2. Crie a tabela `tarefas` com o seguinte comando SQL:

```sql
CREATE TABLE tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL
);
```

## Uso

1. Configure as credenciais do banco de dados no arquivo `index.php` (variáveis `$host`, `$user`, `$password` e `$dbname`).
2. Coloque o arquivo `index.php` no diretório do seu servidor web.
3. Acesse via navegador para usar o gerenciador de tarefas.

## Funcionalidades

- Adicionar nova tarefa
- Editar tarefa existente
- Excluir tarefa
- Listar todas as tarefas

## Observações

Este projeto é básico e não possui autenticação ou validação avançada. Use para fins de aprendizado ou como base para projetos maiores.
--------------------------------------------------------------------------------------------------------------------------------------

Task Manager - PHP and MySQL

This is a simple task manager project using pure PHP and MySQL. It allows you to add, edit, delete, and list tasks.

Requirements

    Web server with PHP support (e.g., Apache)

    MySQL

Database Configuration

    Create a database named gerenciador_tarefas.

    Create the tarefas table using the following SQL command:
    SQL

    CREATE TABLE tarefas (
    	id INT AUTO_INCREMENT PRIMARY KEY,
    	titulo VARCHAR(255) NOT NULL
    );

Usage

    Configure the database credentials in the index.php file ($host, $user, $password, and $dbname variables).

    Place the index.php file in your web server's directory.

    Access it via your browser to use the task manager.

Features

    Add a new task

    Edit an existing task

    Delete a task

    List all tasks

Notes

This is a basic project and does not include authentication or advanced validation. Use it for learning purposes or as a foundation for larger projects.

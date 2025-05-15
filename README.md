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

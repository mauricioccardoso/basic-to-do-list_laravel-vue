<p align="center">
  <img src="https://inbraep.com.br/wp-content/uploads/2017/10/cropped-favicon-192x192.png" alt="Logo Inbraep" width='100px'>
</p>

# INBRAEP - To-do List

## Desafio Nivel 3

---

### Tecnologias Utilizadas

- [Laravel 10](https://laravel.com/docs/10.x)
- [PHP 8](https://www.php.net/)
- [VUE 3](https://vuejs.org/)
- [AXIOS](https://axios-http.com/)

---

### Features Desenvolvidas

- Listar Tarefas
- Cadastrar Tarefas
- Editar Tarefas
- Concluir ou Abrir Tarefas
- Deletar Tarefas

### Outros

- API RESTFul
- Componetização

---

### Passos de configuração de Projeto

1. Fazer a cópia do projeto para sua máquina

```bash
git clone https://github.com/mauricioccardoso/inbraep-todoList.git
```

2. Acessa a pasta do projeto a partir do terminal e acessa a pasta backend

```bash
cd backend
```

---

# BackEnd

3. Fazer a instalação das dependências do laravel

```bash
composer install
```

4. Caso o laravel não gere um chave, usar o comando para gerar uma nova chave de criptografia

```bash
php artisan key:generate
```

5. Copiar o arquivo .env e configurar as variáveis de acordo com seu banco de dados. Ex:

```bash
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=todo_list
DB_USERNAME=user
DB_PASSWORD=password
```

6. Verificar e criar o banco de dados conforme sua ferramente de Banco de dados

7. Executar o comando para criar tabela

```bash
php artisan migrate
```

---

# Frontend

8. Retorne a pasta raiz e entre na pasta do frontend

```bash
cd ../frontend
```

9. Faça a instalação das dependências

```bash
yarn
```

ou

```bash
npm install
```

10. Se necessário, verifique e altere a url da api na variável "baseURL" no arquivo index da pasta http

11. Utilize o comando abaixo para inicia o projeto frontend

```bash
yarn dev
```

ou

```bash
npm run dev
```

---

Obs.: Para subir o servido backend localmente utilize o comando dentro da pasta backend

```bash
php -S localhost:8080 -t .\public\
```

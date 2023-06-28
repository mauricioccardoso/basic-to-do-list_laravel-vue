<p align="center">
  <img src="https://inbraep.com.br/wp-content/uploads/2017/10/cropped-favicon-192x192.png" alt="Logo Inbraep" width='100px'>
</p>

# INBRAEP - To-do List - Teste

## Desafio Nivel 3

### Tecnologias Utilizadas

- [Laravel 10](https://laravel.com/docs/10.x)
- [VUE 3](https://vuejs.org/)
- [PHP 8](https://www.php.net/)
- [Docker e Docker Compose](https://www.docker.com/)
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
- Responsividade
- Docker

---

### Passos de configuração de Projeto

1. Fazer a cópia do projeto para sua máquina

```bash
git clone https://github.com/mauricioccardoso/to-do-list-Teste-laravel-vue.git
```

1.1. Caso tenha o Docker e Docker compose configurado na sua máquina, siga para [Docker e Docker Compose](#configuração-com-docker-e-docker-compose).
Caso não tenha docker, continue para a coniguração do backend e frontend abaixo.

---

# BackEnd

2. Acessa a pasta do projeto a partir do terminal e acessa a pasta backend

```bash
cd backend
```

3. Fazer a instalação das dependências do laravel

```bash
composer install
```

4. Copiar o arquivo .env e configurar as variáveis de acordo com seu banco de dados. Ex:

```bash
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=todo_list
DB_USERNAME=user
DB_PASSWORD=password
```

5. Caso o laravel não gere um chave, usar o comando para gerar uma nova chave de criptografia

```bash
php artisan key:generate
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

Obs.: Para subir o servido backend localmente utilize o comando dentro da pasta backend

```bash
php -S localhost:8081 -t .\public\
```

---

# Configuração com Docker e Docker compose

1. Acessa a pasta raiz do projeto a partir do terminal ou com o editor de texto.

2. Na pasta "Backend", copiar o arquivo ".env.exemple" e renomear para ".env".
   Configurar as variáveis de ambiente do banco de dados seguindo as configurações feitas no arquivo docker-compose.yaml na opção "environment"
   Definindo uma senha nos dois arquivos.
   Ex:

```bash
DB_CONNECTION=mysql
DB_PORT=3306
DB_HOST=db-mysql            #database service name specified in docker-compose.yaml
DB_DATABASE=mydb            #database name specified in docker-compose.yaml
DB_USERNAME=root

#Set a password
DB_PASSWORD=mypassword       #database password specified in docker-compose.yaml
```

3. Voltar para a raiz do projeto e usar o comando para subir os containers

```bash
docker compose up -d
```

4. Após os containers estiverem prontos, acessar no navegador:

Frontend
[http://localhost:5173/](http://localhost:5173/)

Backend
[http://localhost:8081/](http://localhost:8081/)


Requer o Docker e Docker-compose instalados.
## Rodando a aplicação 

- Copiar o .env.example.
- Iniciar os Containers.
- Instalar depedências.
- Gerar chave.
- Rodar Migrations.
- acessar localhost/pacientes

```
cp .env.example .env
docker-compose up -d
docker exec -it bidbox composer install
docker exec -it bidbox npm install
docker exec -it bidbox php artisan key:generate
docker exec -it bidbox php artisan migrate
```
- **[Pacientes](http://localhost/pacientes)**

O arquivo Txt de teste está na pasta root do projeto.

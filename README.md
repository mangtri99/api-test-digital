## API TEST DIGITAL
This is a simple project API CRUD operation

### Requirement

 - PHP version 8.2 
 - Postman 
 - Database MySQL

### How to get started?
After clone this project, simply run

```bash
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan migrate --seed
    php artisan serve
```
Access application http://localhost:8000/

Note: You may need to change the base api url configuration in the .env file with the key API_BASE_URL. Please adjust it to your local configuration
Default is http://localhost:8000/api

### API Documentation
You can import collection and environtment located in `docs/` with postman 

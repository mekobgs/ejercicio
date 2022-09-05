# ejercicio Requiere PHP 8+

# Clonar
git clone https://github.com/eladesarrollo/ejercicio.git

# Ingresar al proyecto
cd ejercicio

# Instalar dependiencias
composer install

# Copiar variables por defecto
cp .env.example .env

# Crear llave
php artisan key:generate

# Iniciar servicio
php artisan serve

Verificar proyecto en:
http://localhost:8000

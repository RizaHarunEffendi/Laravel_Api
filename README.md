# laravel Api Basic


# Installasi
<li>git clone</li>
<li>Ketik <b>composer update </b> di terminal atau Command Prompt</li>
<li>Ketik <b>copy .env-example to .env </b>di terminal atau Command Prompt</li>
<li>Ketik <b>php artisan key:generate </b>di terminal atau Command Prompt</li>
<li>Buat database di PhpMyAdmin</li>
<li>Buka file <b>.env </b> cari <b>"DB_DATABASE = laravel"</b></li>
<li>Ganti nama Database pada <b>"DB_DATABASE = laravel" </b>sesuai dengan nama database yang dibuat</li>
<li>Ketik <b>php artisan migrate</b>di terminal atau Command Prompt</li>
<li>Ketik <b>php artisan serve </b>di terminal atau Command Prompt</li>

# EndPoint
1. Register
http://127.0.0.1:8000/api/register 

{
    "name" : "User",
    "email" : "user@gmail.com",
    "password" : 12345678
}

2. Login
http://127.0.0.1:8000/api/login

{
    "email" : "user@gmail.com",
    "password" : 12345678
}


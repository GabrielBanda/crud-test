# crud-test
Test de programacion con laravel 6

Para el proyecto se utilizo:

*SweetAlert v2
*Datatables boostrap v4
*Select2.js

Para montar el proyecto necesitas:

-Virtualizar el proyecto con el servidor 
-En mi caso xampp

/*
Reglas de virtualización:

<VirtualHost *:80> 
  DocumentRoot "D:\tuFolder\xampp\htdocs\proyectos\crud-test\public"
  ServerName www.crud-test.com
  <Directory "D:\tuFolder\xampp\htdocs\proyectos\crud-test\public">
    Require all granted
  </Directory>
</VirtualHost>

*/

-Modificar el archivo host en windows:

ruta: C:\Windows\System32\drivers\etc
-Dentro del documento poner la siguiente regla: 

127.0.0.1 www.crud-test.com


-Nombre de la base de datos: store

-En el archivo .env verificar ponerle la contraseña debido que no uso password en mi MySql















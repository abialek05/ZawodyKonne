# Website created with PHP/Blade using Laravel framework.
Functions:
- Add/Edit/Delete/View riders, horses, competitions, and competition entries.
- Option to search by specific words in competitions and competition entries.
 
- Home page
![image](https://github.com/abialek05/ZawodyKonne/assets/152793437/cd9531d1-ca7a-49bd-bfb6-8eac6ceca19f)

- All riders page
![image](https://github.com/abialek05/ZawodyKonne/assets/152793437/4b36caa8-b0a9-4983-8ac1-3a4181362054)

- Add new rider page
![image](https://github.com/abialek05/ZawodyKonne/assets/152793437/d0e5ef20-4eae-438d-8b2d-c67f5ce05f70)

- Delete rider dialog box
![image](https://github.com/abialek05/ZawodyKonne/assets/152793437/9cc87315-4e6c-4c45-b8ea-2f2fcda67d89)

- All horses page
![image](https://github.com/abialek05/ZawodyKonne/assets/152793437/9e7478d7-3e91-4bd0-bdf3-3213aa6a5796)

- Edit horse page
![image](https://github.com/abialek05/ZawodyKonne/assets/152793437/f772d639-576f-413c-b4db-7367cd757700)

- All competitions page
![image](https://github.com/abialek05/ZawodyKonne/assets/152793437/0afc7408-b331-4f80-a2cf-5b3d87fa80b3)

- Delete competition entry dialog box
![image](https://github.com/abialek05/ZawodyKonne/assets/152793437/a244c018-ad33-4bfb-9024-f357ed7fae29)

To run this program, you need to install xampp, composer and import the 'zawodykonnelaravel.sql' database.
Composer:
1. Download composer https://getcomposer.org/download/
2. Open the console and cd the project root directory
3. Run composer install or php composer.phar install
4. Run php artisan key:generate
5. Run php artisan migrate
6. Run php artisan serve

Database (used XAMPP):
1. Open admin page and create new database
2. Open the created database and choose the 'import' option from the men
3. Choose the 'zawodykonnelaravel.sql' file and press 'import'

Make sure that MySQL in XAMPP is enabled and server is running (php artisan serve) before accessing the website.

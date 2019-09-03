# SchooleBellChat
Web-based employee management system

#Pre-Requirment
1) PHP 7
2) MYSQLi
3) Composer-- For PHPunit Testing

#Installation
1 ) Download code form git repository OR Sourece Code
2 ) Start Apache Server and MySQLI Server and Database
2 ) For MYSQLi Connection: Start With open Config File.
3 ) Succesfuly database create after ( Register as Employee or Manager)
4 ) Only Managers are able to show search list functionality.  


How to Test PhpUnitTesting:
-- Install composer by -- composer require --dev phpunit/phpunit ^7 command
-- Check Version by  ./vendor/bin/phpunit --version
-- ./vendor/bin/phpunit --bootstrap vendor/autoload.php --(Write phpfile name for unittest)

Requirments & Secnerio:
1) Employee Registration
 --New Employee signUp by fill registration form( No DUPLICATE username)
2 ) Manager Registration
New Manager signUp by fill registration form( No DUPLICATE username)
2) Login
  --Login as CEO or Manager to check Employee Report
3) Search List page
   -- Manager able to search Employee by Following Filter:
   1) Search by date of joining
   2) Search by Name
   3) Search by Manager Name
   4) Search by Department
   5) Search By Salary
   6) Search By Age
   7) Search By Gender

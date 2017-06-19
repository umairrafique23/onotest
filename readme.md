# OnO

Ono is an open source General Purpose Repository System built by [Usman's Team](http://usman-blog.com)

### Packages Used
- Slugging: https://github.com/cviebrock/eloquent-sluggable#installation

##Installation
Clone this git Repository in your Computer and open the command prompt and go to your location e.g. if you have downloaded in 'F:/ono' then 
    cd F:/ono 
    f:
    composer install
After installing, rename '.env.example' to '.env' and CACHE_DRIVER should be set to array, fill out your database credentials and run following command

    php artisan migrate:refresh --seed 
    php artisan serve
Now you can access your project at localhost:8000 

    username: admin@admin.com
    password: admin
    
###Pre Requisites
php and composer should be installed and setup in path variables.
##Contact Me
 You can contact me at 'musmanakram at ciitlahore dot edu dot pk' or at http://www.usman-blog.com 
 
 
 

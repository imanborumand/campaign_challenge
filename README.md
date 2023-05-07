### About challenge

In this project, we can create challenges and users can participate in each challenge using their mobile number, and the amount determined for each challenge will be deposited into the user's wallet if the user takes action at the right time.

---

### Architecture

In this project, we used service, repository architecture.   
After receiving our requests in the controller, they are sent to the service to perform logical operations, and if the service needs to connect to the database through the repository layer, it receives information from the model and database and then returns the result to the controller.

---



#### Tools used:   
Laravel 10  
MySQL 8  
Redis 7  
Nginx  
Docker 


### How to run project:

For build project run follow command:
``` 
docker-compose build
```

Then enter the following command to run the project
``` 
docker-compose up -d
```

Now run the following commands in the terminal to receive packages and perform database migrations:

``` 
docker exec -it challenge-app composer install
```

``` 
docker exec -it challenge-app php artisan migrate
```

---

Now Project is running!  

For see the project home page open http://localhost:8085

---
#### postman collection
``` 
https://documenter.getpostman.com/view/2528321/2s93eWzsbc
```


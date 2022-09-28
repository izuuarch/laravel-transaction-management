

## About the project
Custom authentication
stripe api keys
php stripe library
api keys
polymorphism(one to one)
view transaction with pagination
super admin view transaction authorization
softdelete and delete

## details
custom authentication:
I used custom authentication to make the authentication more real and advanced than using the authentication packages
The user and the admin would be able to login from the same page
Then i created a middleware for both admin and user to be able to authenticate them to their respectful routes
But before i did that i assigned each user his role by hardcoding it in the database
If you check the codeflow you might see more on what i did for the authentication process

stripe api keys:
I used the most popular payment gateway, which is the stripe payment gateway for this project. I might move this further to more gateways, but due to timestamp for the project i decided to use just one gateway
php stripe library:
I used the composer package for stripe gateway to work on the project, which i hope i would be a contributor to the package soon.....

api keys:
The stripe api keys were stores the env file.

paymentcontroller: app/http/controllers/usercontroller/paymentcontroller
All the logic for the stripe payment gateway, thats where i wrote it and the rest
polymorphism(one to one):
when it comes to the way i stored the transaction details to the database i used the one to one relationship to do so, because it belongs to one user

view transaction with pagination:
i displayed the transaction by paginating it for the user and also called the paginate class to instantiate the usebootrapper() function statically in the app service provider, you can go through the code to see more

super admin view transaction authorization:
i used a middleware to authenticate the super admin and the normal admin on viewing the transactions page
The super admin would be able to view the view the page while the normal admin wouldnt be able to view the view the page at all

softdelete and delete:
I could remember when you guys interviewed me and asked about softdelete and delete
I told you guys i havent come accross it already
But guess what
I finally i cracked it up and is not a big deal

so the user can softdelete his transaction immediately he softdeletes it, it automatically becomes a trash
So i created a page where the user can view that trash and restore it or delete it permanently.


All these and more you would see in the code. Thanks for the time smartflowtech....

The route for the login: account/login
The route for registration: account/register.

The sql file for the project:
The superadmin login:
email:superadmin@admin.com
password:21995812
The normal admin login:
email:admin@admin.com
password:21995812
The user login:
email:jd@gmail.com
password:21995812


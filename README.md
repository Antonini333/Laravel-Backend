1
 # DentalClinicAppointments 
2
​
3
## What is DentalClinicAppointments ❓
4
​
5
### DentalClinicAppointments is, for now, the backend part of an application made for users of a dental clinic, where they can manage his appointments.  📑
6
​
7
### Edit: Now you can download the front-end part at https://github.com/Antonini333/frontend-dental-app
8
​
9
​
10
## 🔧🔧 Technologies:
11
​
12
- Javascript.
13
- NodeJS.
14
- Express.
15
- MongoDB.
16
- Mongoose.
17
- Mongo Atlas.
18
- Postman.
19
- Git.
20
- GitHub.
21
- Heroku.
22
​
23
## 👀 Dependencies:
24
- JWT.
25
- Bycrpt.
26
- RegEx.
27
​
28
​
29
​
30
# Getting Started
31
​
32
​
33
## Choose:
34
​
35
You can test the endpoints with the deployed app URL **(https://guarded-scrubland-93096.herokuapp.com)** or download the code, open it on vsCode and run in terminal:
36
 
37
   $ npm init -y 
38
   
39
   $ npm i express mongoose bcrypt jsonwebtoken 
40
   
41
​
42
## Important ❗
43
​
44
You will need to use Postman to make server petitions since we haven't a frontend yet.
￼
Commit changes
Commit summary￼Optional extended description
￼
￼ Commit directly to the main branch.
￼ Create a new branch for this commit and start a pull request. Learn more about pull requests.
￼Commit changes Cancel
© 2020 GitHub, Inc.
Terms
Privacy
￼Cookie Preferences
Security
Status
Help
Contact GitHub
Pricing
API
Training
Blog
About
# DentalClinicAppointments 

## What is DentalClinicAppointments ❓

### DentalClinicAppointments is, for now, the backend part of an application made for users of a dental clinic, where they can manage his appointments.  📑

### Edit: Now you can download the front-end part at https://github.com/Antonini333/frontend-dental-app


## 🔧🔧 Technologies:

- Javascript.
- NodeJS.
- Express.
- MongoDB.
- Mongoose.
- Mongo Atlas.
- Postman.
- Git.
- GitHub.
- Heroku.

## 👀 Dependencies:
- JWT.
- Bycrpt.
- RegEx.



# Getting Started


## Choose:

You can test the endpoints with the deployed app URL **(https://guarded-scrubland-93096.herokuapp.com)** or download the code, open it on vsCode and run in terminal:
 
   $ npm init -y 
   
   $ npm i express mongoose bcrypt jsonwebtoken 
   

## Important ❗

You will need to use Postman to make server petitions since we haven't a frontend yet.
Below there is a list of the endpoints you can reach:


# Users: 

-  https://guarded-scrubland-93096.herokuapp.com/users/register 🔛 **A new user is registered**  (POST method)

   Required parameters by body to register: "name", "email" and "password"

-  https://guarded-scrubland-93096.herokuapp.com/users/login 🔛 **User logs into his account**  (POST method)

   Required parameters by body to login: "name", "email"
   
-  https://guarded-scrubland-93096.herokuapp.com/users/logout 🔛 **User exits his acccount**  (POST method)

   Required parameters by body to logout: "name", "email"

-  https://guarded-scrubland-93096.herokuapp.com/users 🔛 **Show all users** (GET method)

-  https://guarded-scrubland-93096.herokuapp.com/users/:id 🔛 **Search a user by his id** (GET method)

-  https://guarded-scrubland-93096.herokuapp.com/users/email/:email 🔛 **Search a user by his email** (GET method)

-  https://guarded-scrubland-93096.herokuapp.com/users/:id 🔛 **Modify info of a user** (PUT method)

-  https://guarded-scrubland-93096.herokuapp.com/users/:id 🔛 **Delete a client by his id** (DELETE method)

- https://guarded-scrubland-93096.herokuapp.com/users/email/:email 🔛 **Delete a client by his id** (DELETE method) 


# Appointments: 

- https://guarded-scrubland-93096.herokuapp.com/appointments/show/INSERT-EMAIL-HERE 🔛 **Show appointments of user by date** (GET method)

  Required parameters by body: "date" // If you don't facilitate a date, all appointments of user will be shown.

- https://guarded-scrubland-93096.herokuapp.com/appointments/create/INSERT-EMAIL-HERE 🔛 **User can make a new appointment** (POST method) 

  Required parameters by body: "date", "symptoms"

- https://guarded-scrubland-93096.herokuapp.com/appointments/cancel/INSERT-EMAIL-HERE 🔛 **User can cancel an appointment previously made** (DELETE method)

  Required parameters by body: "date" // If you don't facilitate a date, all appointments of user will be erased.



# Screenshots:

## SIGN UP
 
 ![Screenshot](screenshotZ/register-user.png) 
 
 ## LOG IN
 
  ![Screenshot](screenshotZ/login.png) 

## LOG OUT

![Screenshot](screenshotZ/logout.png)
  
  ## SHOW ALL USERS
  
 ![Screenshot](screenshotZ/allusers.png) 
 
 ## CREATE APPOINTMENT
 
![Screenshot](screenshotZ/createapp.png)

## CHECK APPOINTMENTS

![Screenshot](screenshotZ/consultapp.png)

# DELETE APPOINTMENT 
![Screenshot](screenshotZ/deleteapp.png)

# Classroom Booking System
---
### Short Description:
A booking management system where Faculties in an university can book classrooms in advance with the approval of an Admin. Both users can perform basic CRUD operations.

Database is in the model directory.
For Admin, Username : 123-45678-1, password : 123
For Faculty, Username : 16-31237-1, password : Abc1234%

### Prerequisites
```
Apache Server for php (e.g., xampp), MySql
```

### Target Users of this application:
  - Administration personnel and Faculties in an education system (i.e., University, School).

## Download 
* Clone the repository
  ```
  git clone https://github.com/tanjimanasreen/Classroom-Booking-System.git
  ```
  
## Features :
* **User Access** :
  * User can sign in to the system.
  * User can register.
  * User can sign out from the system.
  * User can do live search.

* **User Control**  :
  * Admin Panel:
    * View and cancel bookings.
    * Create new bookings.
    * View booking history
    * Add courses, classroom or departments.
    * Approve and delete users.
    
  * Faculty (User) Panel:
    * View upcoming bookings.
    * Create and cancel bookings.
    * View booking history.

## Data Model
Import the model in your database available [here](https://github.com/tanjimanasreen/ClassroomBookingSystemExtended/tree/master/model) in `cbs.sql` file. 

### Database Connection:
``` 
<?php
function execute($query){

    $conn= mysqli_connect('localhost','root','','cbs');

        $result = mysqli_query($conn,$query);
        mysqli_close($conn);

        return $result;
}
?>
```
### Login Information
```
* Admin Username: 123-45678-1, Password : 123
* Faculty Username : 16-31237-1, Password : Abc1234%
```
---
### Relational Schema Diagram :
![alt text](https://github.com/tanjimanasreen/Classroom-Booking-System/blob/master/screenshots/schema.png "Realtional Schema")
---
### User Interface:
#### Login Page
![alt text](https://github.com/tanjimanasreen/Classroom-Booking-System/blob/master/screenshots/login_page.png "Login Page")
### Registration Page:
![alt text](https://github.com/tanjimanasreen/Classroom-Booking-System/blob/master/screenshots/user_registration.png "Registration Page")
---
#### Admin Panel:
![alt text](https://github.com/tanjimanasreen/Classroom-Booking-System/blob/master/screenshots/admin_1.png "Landing Page")
![alt text](https://github.com/tanjimanasreen/Classroom-Booking-System/blob/master/screenshots/admin_booking_log.png "Admin Booking Log")
![alt text](https://github.com/tanjimanasreen/Classroom-Booking-System/blob/master/screenshots/admin_bookings.png "Create Bookings")
![alt text](https://github.com/tanjimanasreen/Classroom-Booking-System/blob/master/screenshots/admin_cancel.png "Cancel Bookings")
---
#### Faculty Panel:
![alt text](https://github.com/tanjimanasreen/Classroom-Booking-System/blob/master/screenshots/user_1.png "Landing Page")
![alt text](https://github.com/tanjimanasreen/Classroom-Booking-System/blob/master/screenshots/user_booking_log.png "User Booking Log")
![alt text](https://github.com/tanjimanasreen/Classroom-Booking-System/blob/master/screenshots/user_bookings.png "Create Bookings")
![alt text](https://github.com/tanjimanasreen/Classroom-Booking-System/blob/master/screenshots/user_cancel.png "Cancel Bookings")

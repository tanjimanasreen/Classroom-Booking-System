# Classroom Booking System
---
### Short Description:
A booking management system where Faculties in an university can book classrooms in advance with the approval of an Admin. Both users can perform basic CRUD operations.

Database is in the model directory.
For Admin, Username : 123-45678-1, password : 123
For Faculty, Username : 16-31237-1, password : Abc1234%

### Prerequisites
```
xampp, mysql
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

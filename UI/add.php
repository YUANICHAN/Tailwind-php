<?php
    require 'db.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $firstname = $_POST['Fname'];
        $lastname = $_POST['Lname'];
        $email = $_POST['Email'];
        $reg_date = $_POST['RegDate'];
        $id = $_POST['ID'];
        $class = $_POST['Class'];
        $gender = $_POST['Gender'];
        $mobile = $_POST['Num'];
        $parents_name = $_POST['Pname'];
        $parents_mobile = $_POST['Pnum'];
        $dob = $_POST['Birth'];
        $blood = $_POST['Blood'];
        $address = $_POST['Address'];

        $file_name = $_FILES['pic']['name'];
        $file_tmp = $_FILES['pic']['tmp_name'];
        $upload_path = 'uploads/' . basename($file_name);
        move_uploaded_file($file_tmp, $upload_path);

        $sql = "INSERT INTO students (first_name, last_name, email, registration_date, ID, class, gender, mobile_number, parents_name, parents_mobile_number, date_of_birth, blood_group, Address, profile_file) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssssisssssssss",  $firstname, $lastname, $email, $reg_date, $id, $class, $gender,
        $mobile, $parents_name, $parents_mobile, $dob,
        $blood, $address, $file_name);

        if ($stmt->execute()) {
            header("Location: AddStudent.php?status=success");
        } else {
            header("Location: AddStudent.php?status=db_error");
        }
        exit();

        }  
?>
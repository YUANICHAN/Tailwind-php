<?php
    // $host = 'localhost';
    // $dbname = 'dbname';
    // $user = 'root';
    // $pass = '';
    // $charset = 'utf8mb4';

    // try{
    //     if($_SERVER['REQUEST_METHOD'] === "POST"){
    //         $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $pass);
    //         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //         $name = $_POST['name'];
    //         $age = $_POST['age'];
    //         $gender = $_POST['gender'];

    //         $sql = "UPDATE table SET name = :name, age = :age, gender = :gender";
    //         $stmt = $pdo->prepare($sql);

    //         if($name == null){
    //             echo 'Enter valid name';
    //             return;
    //         } elseif($age <= 0){
    //             echo 'Enter valid age';
    //             return;
    //         } 
            
    //         $stmt->execute([
    //             ':name' => 'Yuan',
    //             ':age' => 19,
    //             ':gender' => 'Male'
    //         ]);
    //     }
    // }catch(PDOException $e){
    //     die("Connection Error: " . $e->getMessage());
    // }

    // $host = 'localhost';
    // $dbname = 'Db_name?';
    // $user = 'root';
    // $pass = '';
    // $charset = 'utf8mb4';

    // try{
    //     $pdo = new PDO("mysl:host=$host;dbname=$dbname;charset=$charset", $user, $pass);
    //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    //     if($_SERVER['REQUEST_METHOD'] === "POST"){
    //         $name = $_POST['name'];
    //         $age = $_POST['age'];
    //         $gender = $_POST['gender'];

    //         $sql = "INSERT INTO table (name, age, gender) VALUES (:name, :age, :gender)";
    //         $stmt = $pdo->prepare($sql);
    //         $stmt->execute([
    //             ':name' => '$name',
    //             ':age' => '$age',
    //             ':gender' => 'gender'
    //         ]);
    //         if($stmt->rowCount() > 0){
    //             header('Location: phppage.php?status=success');
    //         } else {
    //             header('Location: phppage.php?status=error');
    //         }
    //         exit();
    //     }

    // } catch(PDOException $e){
    //     die("Connection error: " . $e->getMessage());
    // }

    // $host = 'localhost';
    // $dbname = 'Db_name?';
    // $user = 'root';
    // $pass = '';
    // $charset = 'utf8mb4';

    // try{
    //     $pdo = new PDO("mysl:host=$host;dbname=$dbname;charset=$charset", $user, $pass);
    //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    //     if(isset($_GET['id'])){
    //         $id = $_GET['id'];

    //         $SQL = "DELETE * FROM table WHERE id = :id";
    //         $stmt = $pdo->prepare($SQL);
    //         $stmt->execute([
    //             ':id' => $id
    //         ]);
    //         if($stmt->rowCount() > 0){
    //             header('Location: phppage.php?status=deleted');
    //         } else {
    //             header('Location: phppage.php?status=error');
    //         }
    //         exit();

    //     }else{
    //         header('Location: phppage.php?status=SELECT_ID');
    //     }
    // } catch(PDOException $e){
    //     die("Error: " . $e->getMessage());
    // }
    

    // $host = 'localhost';
    // $dbname = 'dbname';
    // $user = 'root';
    // $pass = '';
    // $charset = 'utf8mb4';

    // try{
    //     $pdo = new PDO("mysql:host=$host;dbname=$dname;charset=$charset", $user, $pass);
    //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    //     $search = filter_input(INPUT_POST, 'search', FILTER_VALIDATE_INT);

    //     $sql = "SELECT * FROM table WHERE id = :search";
    //     $stmt = $pdo->prepare($sql);
    //     $stmt->execute([
    //         ':search' => $search
    //     ]);
    //     if($stmt->rowCount() > 0){
    //         header("Location: php.php?search=$search");
    //     } else {
    //          header("Location: php.php?search=NOTVALID");
    //     }
    //     exit();
    // }catch(PDOEXception $e){
    //     die("Error: " . $e->getMessage());
    // }

    // $pdo = new PDO("mysql:host=localhost;dbname=your_db;charset=utf8mb4", 'root', '');
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //     $username = $_POST['username'];
    //     $password = $_POST['password'];

    //     $hashed = password_hash($password, PASSWORD_DEFAULT);

    //     $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    //     $stmt->execute(['username' => $username, 'password' => $hashed]);

    //     if($stmt->rowCount() > 0){
    //         header("Location: dash.php");
    //     } else {
    //         header("Location: register.php?status=FAILED");
    //     }
    //     exit();
    // }

    $pdo = new PDO("mysql:host=localhost;dbname=dbname;charset=charset", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT id, username, password FROM users WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':username' => $username
        ]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($user && password_verify($password, $user['password'])){
            session_start();
            $_SESSION['user_id'] = $user['id'];
            header("Location: dash.php");
        }else{
            header("Location: login.php?status=FAILED");
        }
        exit();
    }
?>
<?php
require 'db.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $gmail = $_POST['gmail'];
    $location = $_POST['location'];

    $stmt = $connection->prepare("UPDATE Info SET Firstname=?, Gmail=?, Location=? WHERE ID=?");
    $stmt->bind_param("sssi", $firstname, $gmail, $location, $id);
    $stmt->execute();
    header("Location: php.php");
    exit();
}

$editData = null;
if (isset($_POST['edit_id'])) {
    $id = $_POST['edit_id'];
    $stmt = $connection->prepare("SELECT * FROM Info WHERE ID=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $editData = $result->fetch_assoc();
}
?>

<?php
require 'db.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    if (is_numeric($id)) {
        $stmt = $connection->prepare("DELETE FROM Info WHERE ID = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();

        header("Location: php.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>

<body class="bg-gray-300">
    <div class="min-h-screen flex justify-center items-center">
        <div class="grid grid-cols-1 md:grid-cols-2 w-[90%] md:w-[80%] gap-4">

            <?php if ($editData): ?>
                <div class="w-full bg-yellow-100 rounded p-4 shadow space-y-4">
                    <h2 class="text-lg lg:text-xl font-bold text-center text-gray-800">Update Record</h2>
                    <form method="POST" class="space-y-4 flex flex-col items-center">
                        <input type="hidden" name="id" value="<?= $editData['ID'] ?>">
                        <div class="w-[90%] md:w-[70%]">
                            <label class="font-semibold">Firstname:</label>
                            <input type="text" name="firstname" value="<?= $editData['Firstname'] ?>" class="w-full px-4 py-2 border border-gray-800 rounded">
                        </div>
                        <div class="w-[90%] md:w-[70%]">
                            <label class="font-semibold">Gmail:</label>
                            <input type="text" name="gmail" value="<?= $editData['Gmail'] ?>" class="w-full px-4 py-2 border border-gray-800 rounded">
                        </div>
                        <div class="w-[90%] md:w-[70%]">
                            <label class="font-semibold">Location:</label>
                            <input type="text" name="location" value="<?= $editData['Location'] ?>" class="w-full px-4 py-2 border border-gray-800 rounded">
                        </div>
                        <button type="submit" name="update" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded">Update</button>
                    </form>
                </div>
            <?php endif; ?>

            <div class="w-full bg-white rounded p-8 shadow space-y-4 gap-4">
                <h1 class="text-lg lg:text-2xl text-gray-800 font-bold text-center">FORMS:</h1>
                <form action="add.php" method="POST" class="space-y-4 space-x-2 flex flex-col justify-center items-center w-full">
                    <div class="flex justify-center flex-col w-[90%] md:w-[80%] lg:w-[70%]">
                        <label for="" class="text-lg lg:text-xl text-gray-800 font-bold my-2">Firstname:</label>
                        <input type="text" id="firstname" name="firstname" class="px-4 py-2 border border-2 border-gray-800 rounded w-full">
                    </div>
                    <div class="flex justify-center flex-col w-[90%] md:w-[80%] lg:w-[70%]">
                        <label for="" class="text-lg lg:text-xl text-gray-800 font-bold">Gmail:</label>
                        <input type="text" id="gmail" name="gmail" class="px-4 py-2 border border-2 border-gray-800 rounded w-full ">
                    </div>
                    <div class="flex justify-center flex-col w-[90%] md:w-[80%] lg:w-[70%]">
                        <label for="" class="text-lg lg:text-xl text-gray-800 font-bold">Location:</label>
                        <input type="text" id="location"  name="location" class="px-4 py-2 border border-2 border-gray-800 rounded w-full">
                    </div>
                    <div class="flex justify-center w-[50%]">
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 w-full md:w-[60%] rounded">Save</button>
                    </div>
                </form>
            </div>
            <div class="w-full bg-white rounded p-8 shadow">
                <h1 class="text-lg lg:text-2xl text-gray-800 font-bold text-center my-4">TABLE:</h1>
                <div class="overflow-y-auto md:max-h-[300px]">
                    <table class="min-w-full text-sm border border-gray-800">
                        <thead class="bg-gray-200 text-gray-800 font-bold">
                            <tr>
                                <th class="px-4 py-2 border text-start">ID</th>
                                <th class="px-4 py-2 border text-start">Firstname</th>
                                <th class="px-4 py-2 border text-start">Gmail</th>
                                <th class="px-4 py-2 border text-start">Location</th>
                                <th class="px-4 py-2 border text-start">Time-in</th>
                                <th class="px-4 py-2 border text-start">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-200 text-gray-800 font-bold">
                            <?php
                                require 'db.php';

                                $sql = "SELECT * FROM Info";
                                $result = $connection->query($sql);

                                if (!$result) {
                                    die("Invalid Query: " . $connection->error);
                                }

                                while ($row = $result->fetch_assoc()) {
                                    echo "
                                    <tr class='hover:bg-gray-50'>
                                        <td class='px-4 py-2 border text-start'>{$row['ID']}</td>
                                        <td class='px-4 py-2 border text-start'>{$row['Firstname']}</td>
                                        <td class='px-4 py-2 border text-start'>{$row['Gmail']}</td>
                                        <td class='px-4 py-2 border text-start'>{$row['Location']}</td>
                                        <td class='px-4 py-2 border text-start'>{$row['Time_in']}</td>
                                        <td class='px-4 py-2 border text-start'>
                                            <div class='flex justify-center items-center gap-2'>
                                                <form method='POST' action=''>
                                                    <input type='hidden' name='edit_id' value='{$row['ID']}'>
                                                    <button type='submit' class='bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded'>Edit</button>
                                                </form>
                                               <a href='?delete={$row['ID']}' onclick='return confirm(\"Are you sure you want to delete this record?\")' class='bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded'>Delete</a>
                                        </td>
                                    </tr>";
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
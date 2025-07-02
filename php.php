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
            <div class="w-full bg-white rounded p-8 shadow space-y-4 gap-4">
                <h1 class="text-lg lg:text-2xl text-gray-800 font-bold text-center">FORMS:</h1>
                <form action="" method="POST" class="space-y-4 space-x-2 flex flex-col justify-center items-center w-full">
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
                <div class="overflow-auto">
                    <table class="min-w-full text-sm border border-gray-800">
                        <thead class="bg-gray-200 text-gray-800 font-bold">
                            <tr>
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
                                        <td class='px-4 py-2 border text-start'>{$row['Firstname']}</td>
                                        <td class='px-4 py-2 border text-start'>{$row['Gmail']}</td>
                                        <td class='px-4 py-2 border text-start'>{$row['Location']}</td>
                                        <td class='px-4 py-2 border text-start'>{$row['Time_in']}</td>
                                        <td class='px-4 py-2 border text-start'>
                                            <div class='flex justify-center items-center gap-2'>
                                                <button type='submit' class='bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded'>Update</button>
                                                <button type='submit' class='bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded'>Delete</button>
                                            </div>
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
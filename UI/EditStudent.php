<?php
require 'db.php';

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];

    $sql = "SELECT * FROM students WHERE ID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $student = $result->fetch_assoc();
    } else {
        echo "Student not found.";
        exit;
    }
} else {
    echo "No ID selected.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="flex flex-col min-h-screen bg-gray-100">

  <header class="sticky top-0 z-50 bg-indigo-950 text-white h-20 flex items-center justify-between px-4">
    <h1 class="text-xl font-bold">Student Management</h1>
    <button id="toggleSidebarBtn" class="sm:hidden">
      <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M3 5h14a1 1 0 010 2H3a1 1 0 010-2zm0 4h14a1 1 0 010 2H3a1 1 0 010-2zm0 4h14a1 1 0 010 2H3a1 1 0 010-2z" clip-rule="evenodd" />
      </svg>
    </button>
  </header>

  <div class="flex flex-1">
    <aside id="sidebar" class="fixed top-20 left-0 bg-indigo-950 text-white w-60 h-[calc(100vh-80px)] overflow-y-auto p-4 space-y-2 hidden sm:block">
      <a href="Dash.php" class="flex items-center gap-2 p-2 rounded hover:text-indigo-500">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
        <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" />
        </svg>
        <span>Dashboard</span>
      </a>
      
    <div class="space-y-1">
        <button id="studentDropdownBtn" class="w-full flex items-center justify-between gap-2 p-2 rounded text-indigo-500 hover:text-indigo-400 focus:outline-none">
            <span class="flex items-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zM8 11c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 2.01 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                </svg>
                <span>Students</span>
            </span>
            <svg id="arrowIcon" class="w-4 h-4 transition-transform duration-200" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 011.08 1.04l-4.25 4.25a.75.75 0 01-1.08 0L5.25 8.27a.75.75 0 01-.02-1.06z" clip-rule="evenodd" />
            </svg>
        </button>

        <div id="studentDropdownMenu" class="ml-7 space-y-1 hidden text-sm text-gray-300">
            <a href="AllStudent.php" class="block py-1 hover:text-indigo-400">- All Students</a>
            <a href="AddStudent.php" class="block py-1 hover:text-indigo-400">- Add Students</a>
            <a href="#" class="block py-1 text-indigo-400 hover:text-indigo-400">- Edit Students</a>
        </div>
    </div>

    </aside>

    <main class="flex-1 p-6 sm:ml-60">
        <div class="grid grid-cols-1 w-full p-2 bg-gray-200 rounded">
            <div class="my-4 mx-2">
                <h1 class="text-2xl font-bold text-indigo-950">Edit Students</h1>
            </div>
        </div>
        <div class="grid grid-cols-1 w-full p-2 bg-gray-200 my-4 rounded">
            <div class="my-4 mx-2">
                <h1 class="text-xl font-bold text-indigo-950">Basic Information</h1>
            </div>
            <hr class="my-4 border-t-4 border-gray-500" />
            <form method="POST" action="update.php" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4 px-4 bg-gray-200 text-gray-900 py-4 rounded">
            <div>
                <input type="hidden" name="ID" value="<?= htmlspecialchars($student['ID']) ?>">
                <label class="block text-sm font-semibold mb-1">First Name</label>
                <input type="text" value="<?= htmlspecialchars($student['first_name']) ?>" placeholder="Enter First Name" class="w-full px-4 py-2 rounded text-black" />
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Last Name</label>
                <input type="text" value="<?= htmlspecialchars($student['last_name']) ?>" placeholder="Enter Last Name" class="w-full px-4 py-2 rounded text-black" />
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Email</label>
                <input type="email" value="<?= htmlspecialchars($student['email']) ?>" placeholder="Email" class="w-full px-4 py-2 rounded text-black" />
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Registration Date</label>
                <input type="date" value="<?= htmlspecialchars($student['registration_date']) ?>" class="w-full px-4 py-2 rounded text-black" />
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">ID.</label>
                <input type="text" value="<?= htmlspecialchars($student['ID']) ?>" placeholder="ID" class="w-full px-4 py-2 rounded text-black" />
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Class</label>
                <input type="text" value="<?= htmlspecialchars($student['class']) ?>" placeholder="Class" class="w-full px-4 py-2 rounded text-black" />
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Gender</label>
                <select class="w-full px-4 py-2 rounded text-black">
                    <option disabled selected>Gender</option>
                    <option value="Male" <?= $student['gender'] === 'Male' ? 'selected' : '' ?>>Male</option>
                    <option value="Female" <?= $student['gender'] === 'Female' ? 'selected' : '' ?>>Female</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Mobile Number</label>
                <input type="text" value="<?= htmlspecialchars($student['mobile_number']) ?>" placeholder="Mobile Number" class="w-full px-4 py-2 rounded text-black" />
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Parents Name</label>
                <input type="text" value="<?= htmlspecialchars($student['parents_name']) ?>" placeholder="Parents Name" class="w-full px-4 py-2 rounded text-black" />
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Parents Mobile Number</label>
                <input type="text" value="<?= htmlspecialchars($student['parents_mobile_number']) ?>" placeholder="Parents Mobile Number" class="w-full px-4 py-2 rounded text-black" />
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Date of Birth</label>
                <input type="date" value="<?= htmlspecialchars($student['date_of_birth']) ?>" class="w-full px-4 py-2 rounded text-black" />
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Blood Group</label>
                <input type="text" value="<?= htmlspecialchars($student['blood_group']) ?>" placeholder="Blood Group" class="w-full px-4 py-2 rounded text-black" />
            </div>

           <div class="md:col-span-2">
                <label class="block text-sm font-semibold mb-1">Address</label>
                <textarea rows="2" name="Address" placeholder="Address" class="w-full px-4 py-2 rounded text-black"><?= htmlspecialchars($student['Address']) ?></textarea>
            </div>


            <div class="md:col-span-2 flex items-center gap-2">
                <input type="file" class="block" />
            </div>

            <div class="md:col-span-2 flex gap-2">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded">Update</button>
                <button type="button" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded">Cancel</button>
            </div>
        </form>
        </div>

    </main>
  </div>

  <script>
    const toggleBtn = document.getElementById('toggleSidebarBtn');
    const sidebar = document.getElementById('sidebar');

    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('hidden');
    });

    const dropdownBtn = document.getElementById('studentDropdownBtn');
    const dropdownMenu = document.getElementById('studentDropdownMenu');
    const arrowIcon = document.getElementById('arrowIcon');

    dropdownBtn.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
        arrowIcon.classList.toggle('rotate-180');
    });
  </script>

</body>
</html>
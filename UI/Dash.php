<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>Responsive Sidebar</title>
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
    <aside id="sidebar" class="fixed top-20 left-0 bg-indigo-950 text-white w-30 md:w-40 lg:w-50 xl:w-60 h-[calc(100vh-80px)] overflow-y-auto p-4 space-y-2 hidden sm:block">
      <a href="#" class="flex items-center gap-2 p-2 rounded bg-indigo-900 text-indigo-500 hover:text-indigo-500">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
        <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" />
        </svg>
        <span>Dashboard</span>
      </a>
      
    <div class="space-y-1">
        <button id="studentDropdownBtn" class="w-full flex items-center justify-between gap-2 p-2 rounded hover:text-indigo-400 focus:outline-none">
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

        <div id="studentDropdownMenu" class="ml-4 md:ml-5 lg:md:ml-7 space-y-1 hidden text-sm text-gray-300">
            <a href="AllStudent.php" class="block py-1 hover:text-indigo-400">- All Students</a>
            <a href="AddStudent.php" class="block py-1 hover:text-indigo-400">- Add Students</a>
            <a href="EditStudent.php" class="block py-1 hover:text-indigo-400">- Edit Students</a>
        </div>
    </div>

    </aside>

    <main class="flex-1 p-6 space-y-8 sm:ml-40 md:ml-50 lg:ml-55 xl:ml-60">
      <div class="flex justify-center">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 w-full md:w-[90%]">

          <div class="bg-gray-200 rounded shadow p-4 bg-gray-200 rounded shadow p-4">
           <div class="flex flex-col">
            <div class="flex justify-center items-center">
              <svg class="w-20 h-20 flex" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zM8 11c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 2.01 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                </svg>
            </div>
            <div class="flex-grow text-center">
              <h1 class="text-lg text=gray-800 font-bold">Total Students</h1>
              <h1 class="text-[3rem] text=gray-800 font-bold">0</h1>
            </div>
           </div>
          </div>

          <div class="bg-gray-200 rounded shadow p-4">
            <div class="flex flex-col">
              <div class="flex justify-center items-center">
                <svg class="w-20 h-20 flex" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zM8 11c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 2.01 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                  </svg>
              </div>
              <div class="flex-grow text-center">
                <h1 class="text-lg text=gray-800 font-bold">Total Courses</h1>
                <h1 class="text-[3rem] text=gray-800 font-bold">0</h1>
              </div>
           </div>
          </div>

          <div class="bg-gray-200 rounded shadow p-4">
            <div class="flex flex-col">
              <div class="flex justify-center items-center">
                <svg class="w-20 h-20 flex" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zM8 11c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 2.01 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                  </svg>
              </div>
              <div class="flex-grow text-center">
                <h1 class="text-lg text=gray-800 font-bold">Total Fees</h1>
                <h1 class="text-[3rem] text=gray-800 font-bold">$ 0</h1>
              </div>
           </div>
          </div>

          <div class="bg-gray-200 rounded shadow p-4">
            <div class="flex flex-col">
              <div class="flex justify-center items-center">
                <svg class="w-20 h-20 flex" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zM8 11c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 2.01 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                  </svg>
              </div>
              <div class="flex-grow text-center">
                <h1 class="text-lg text=gray-800 font-bold">Total Section</h1>
                <h1 class="text-[3rem] text=gray-800 font-bold">0</h1>
              </div>
           </div>
          </div>

        </div>
      </div>

     <div class="flex flex-row justify-center">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 w-full md:w-[90%] gap-3">
        <div class="p-4 bg-gray-200 rounded col-span-6 lg:col-span-4">
          <h2 class="text-lg font-semibold mb-2">Student Enrollment Over Time</h2>
          <canvas id="lineChart"></canvas>
        </div>

        <div class="p-4 bg-gray-200 rounded col-span-6 lg:col-span-2">
          <h2 class="text-lg font-semibold mb-2">Gender Distribution</h2>
          <canvas id="genderChart"></canvas>
        </div>

      </div>
    </div>
    </main>
  </div>
  <script src="dash.js"></script>
</body>
</html>



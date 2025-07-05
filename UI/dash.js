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

    fetch('enroll-data.php')
    .then(response => response.json())
    .then(data => {
        const ctx1 = document.getElementById('lineChart').getContext('2d');
        new Chart(ctx1, {
        type: 'line',
        data: {
            labels: data.labels,
            datasets: [{
            label: 'Enrolled Students',
            data: data.counts,
            backgroundColor: 'rgba(79, 70, 229, 0.2)',
            borderColor: 'rgba(79, 70, 229, 1)',
            borderWidth: 2,
            tension: 0.3
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
        });
    })
    .catch(error => console.error('Fetch error: ', error));

  fetch('gender-data.php')
  .then(response => response.json())
  .then(data => {
    const ctx2 = document.getElementById('genderChart').getContext('2d');
    new Chart(ctx2, {
      type: 'doughnut',
      data: {
        labels: data.labels,
        datasets: [{
          label: 'Gender',
          data: data.counts,
          backgroundColor: ['#6366F1', '#EC4899'],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom'
          }
        }
      }
    });
  })
  .catch(error => console.error('Fetch error: ', error));

  window.addEventListener('DOMContentLoaded', () => {
    fetch('data.php')
        .then(response => response.json())
        .then(data => {
        const studentCount = document.querySelectorAll('.text-lg.font-bold')[0].nextElementSibling;
        const courseCount = document.querySelectorAll('.text-lg.font-bold')[1].nextElementSibling;
        const feeAmount = document.querySelectorAll('.text-lg.font-bold')[2].nextElementSibling;

        studentCount.textContent = data.total_students;
        courseCount.textContent = data.total_courses;
        feeAmount.textContent = `$ ${data.total_fees}`;
        })
        .catch(error => console.error('Fetch error:', error));
    });


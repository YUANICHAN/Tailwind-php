function previewImage(input, imgId) {
  const file = input.files[0];
  const img = document.getElementById(imgId);

  if (file && file.type.startsWith('image/')) {
    const reader = new FileReader();
    reader.onload = function (e) {
      img.src = e.target.result;
      img.classList.remove('hidden');
    };
    reader.readAsDataURL(file);
  } else {
    img.src = "";
    img.classList.add('hidden');
  }
}

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

function closeModal() {
  document.getElementById("successModal").classList.add("hidden");
  const url = new URL(window.location.href);
  url.searchParams.delete("status");
  window.history.replaceState({}, document.title, url.toString());
}

window.onload = function () {
  const url = new URL(window.location.href);
  if (url.searchParams.get("status") === "success") {
    document.getElementById("successModal").classList.remove("hidden");
  }
};

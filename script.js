const hamburger = document.getElementById("hamburger");
const navItems = document.querySelector(".navbar-items");
const hero = document.getElementById("hero-section");
const prevBtn = document.getElementById("prevBtn");
const nextBtn = document.getElementById("nextBtn");

// Hamburger toggle
hamburger.addEventListener("click", () => {
  navItems.classList.toggle("show");
});

// Background slideshow logic
const backgrounds = [
  "Images/background image.png",
  "Images/hero-bg-2.jpg",
  "Images/hero-bg-3.jpg",
];

let currentIndex = 0;

function updateBackground() {
  hero.style.backgroundImage = `url('${backgrounds[currentIndex]}')`;
  hero.style.backgroundSize = "cover";
  hero.style.backgroundPosition = "center";
  hero.style.transition = "background-image 0.6s ease-in-out";
}

// Initial image on load
updateBackground();

// Navigation buttons
prevBtn.addEventListener("click", () => {
  currentIndex = (currentIndex - 1 + backgrounds.length) % backgrounds.length;
  updateBackground();
});

nextBtn.addEventListener("click", () => {
  currentIndex = (currentIndex + 1) % backgrounds.length;
  updateBackground();
});

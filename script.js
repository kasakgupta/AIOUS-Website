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

// Sponsors carousel
const imagePaths = [
  "Images/arc_global_logo.png",
  "Images/Autodesk_Logo.png",
  "Images/curiosity_logo.png",
  "Images/digitech_logo.png",
  "Images/hoosier_logo.png",
  "Images/Bs_solidworks_logo.png",
  "Images/Madame_logo.png",
  "Images/maxxis_logo.png",
  "Images/rs_management_logo.png",
  "Images/SAIL_Logo.png",
  "Images/valvoline_logo.png",
  "Images/wee_print_logo.png",
  "Images/lps_Bossard_Logo.png",
  "Images/aditya_constructions_logo.png",
  "Images/sona_logo.png",
  "Images/Ayurvet_logo.png",
  "Images/Siam_logo.png",
];

const slider = document.getElementById("slider");

// Clear existing images
slider.innerHTML = "";

// Populate two sets
const allImages = imagePaths.concat(imagePaths);
allImages.forEach(src => {
  const img = document.createElement("img");
  img.src = src;
  img.classList.add("slider-img");
  slider.appendChild(img);
});

window.addEventListener("load", () => {
  const imgWidth = document.querySelector(".slider-img").getBoundingClientRect().width;
  const imgGap = 20; // match your CSS gap
  const totalWidth = imagePaths.length * (imgWidth + imgGap);
  document.documentElement.style.setProperty("--scroll-width", `${totalWidth}px`);
});

//Team View More Button

const toggleBtn = document.getElementById('toggleMembersBtn');
  const extraMembers = document.querySelectorAll('.extra-member');
  let expanded = false;

  toggleBtn.addEventListener('click', () => {
    expanded = !expanded;

    extraMembers.forEach(member => {
      member.classList.toggle('hidden', !expanded);
    });

    toggleBtn.textContent = expanded ? 'Show Less' : 'Show More';
  });

// Scroll Effect
  document.addEventListener("DOMContentLoaded", function () {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("visible");
          } else {
            entry.target.classList.remove("visible"); // optional: remove if you want it to repeat
          }
        });
      },
      {
        threshold: 0.1,
      }
    );

    const elementsToAnimate = document.querySelectorAll(
      ".sponsors, .aboutUs, .team-section, .team-member, .aboutUs-box, .sponsor-box, .departments-section, .department-card,.achievements, .achievement-box, .achievement-box-right"
    );

    elementsToAnimate.forEach((el) => {
      el.classList.add("fade-in-up");
      observer.observe(el);
    });

    // Inject CSS
    const style = document.createElement("style");
    style.innerHTML = `
      .fade-in-up {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.8s ease, transform 0.8s ease;
      }
      .fade-in-up.visible {
        opacity: 1;
        transform: translateY(0);
      }
    `;
    document.head.appendChild(style);
  });

let userIP = "";

// Get IP address
fetch("https://api.ipify.org?format=json")
  .then(res => res.json())
  .then(data => userIP = data.ip);

document.getElementById("signupForm").addEventListener("submit", function(e) {
  e.preventDefault();

  const email = document.getElementById("email").value;

  // Create form data
  const formData = new FormData();
  formData.append("email", email);
  formData.append("ip", userIP);

  fetch("https://script.google.com/macros/s/AKfycbxoOj8th9M0oZWm-i4oHkOWiDJNQyTdrC2AfbicXYlxwz8UcaXZJHlxDGcg-KBqLm3luQ/exec", {
    method: "POST",
    body: formData
  })
  .then(() => {
    alert("Email saved successfully!");
    document.getElementById("signupForm").reset();
  })
  .catch(err => console.error(err));
});


const hamburger = document.getElementById("hamburger");
const navItems = document.querySelector(".navbar-items");
// const hero = document.getElementById("hero-section");
const prevBtn = document.getElementById("prevBtn");
const nextBtn = document.getElementById("nextBtn");

// Hamburger toggle
hamburger.addEventListener("click", () => {
  navItems.classList.toggle("show");
});

// Background slideshow logic
const hero = document.getElementById("hero-section");
if (hero) {
  const prevBtn = document.getElementById("prevBtn");
  const nextBtn = document.getElementById("nextBtn");

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

  updateBackground();

  if (prevBtn) {
    prevBtn.addEventListener("click", () => {
      currentIndex = (currentIndex - 1 + backgrounds.length) % backgrounds.length;
      updateBackground();
    });
  }

  if (nextBtn) {
    nextBtn.addEventListener("click", () => {
      currentIndex = (currentIndex + 1) % backgrounds.length;
      updateBackground();
    });
  }
}
// const backgrounds = [
//   "Images/hero-bg-2.jpg",
//   "Images/hero-bg-3.jpg",
// ];

// let currentIndex = 0;

// function updateBackground() {
//   hero.style.backgroundImage = `url('${backgrounds[currentIndex]}')`;
//   hero.style.backgroundSize = "cover";
//   hero.style.backgroundPosition = "center";
//   hero.style.transition = "background-image 0.6s ease-in-out";
// }

// // Initial image on load
// updateBackground();

// // Navigation buttons
// prevBtn.addEventListener("click", () => {
//   currentIndex = (currentIndex - 1 + backgrounds.length) % backgrounds.length;
//   updateBackground();
// });

// nextBtn.addEventListener("click", () => {
//   currentIndex = (currentIndex + 1) % backgrounds.length;
//   updateBackground();
// });

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
if (slider) {
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
}

document.addEventListener("DOMContentLoaded", () => {
  const track = document.querySelector(".carousel-track");
  const slides = document.querySelectorAll(".carousel-track img");

  if (!track || slides.length === 0) return; // safety check

  let currentIndex = 0;

  function updateCarousel() {
    track.style.transform = `translateX(-${currentIndex * 100}%)`;
  }

  // Auto-slide every 3 seconds
  setInterval(() => {
    currentIndex = (currentIndex + 1) % slides.length;
    updateCarousel();
  }, 3000);
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
      ".sponsors, .aboutUs, .team-section, .team-member, .aboutUs-box, .sponsor-box, .departments-section, .department-card,.achievements, .achievement-box, .achievement-box-right, .abt-ig , .team-carousel"
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
        transition: opacity 1.0s ease, transform 1.0s ease;
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

// ======================
// Contact Form Submission
// ======================
const contactForm = document.getElementById("contactForm");

if (contactForm) {
  let contactUserIP = "";

  fetch("https://api.ipify.org?format=json")
    .then(res => res.json())
    .then(data => contactUserIP = data.ip);

  contactForm.addEventListener("submit", function(e) {
    e.preventDefault();

    const formData = new FormData();
    formData.append("fullname", document.getElementById("fullname").value);
    formData.append("email", document.getElementById("email").value);
    formData.append("phone", document.getElementById("phone").value);
    formData.append("message", document.getElementById("message").value);
    formData.append("ip", contactUserIP);

    fetch("https://script.google.com/macros/s/AKfycbwjRCm2gqwRjHkmADjk3hH4KlhPQ29wU1GwCoH9zRv0bSHBQnPN7bjbdXagtGV6pfNZAA/exec", {
      method: "POST",
      body: formData
    })
    .then(res => res.text())
    .then(text => {
      let response;
      try {
        response = JSON.parse(text);
      } catch {
        alert("❌ Server returned invalid response.");
        return;
      }

      if (response.status === "success") {
        alert("✅ Message sent successfully!");
        contactForm.reset();
      } else if (response.status === "duplicate") {
        alert("⚠️ You have already sent this exact message.");
      } else {
        alert("❌ Something went wrong.");
      }
    })
    .catch(() => {
      alert("❌ Could not send message. Check connection.");
    });
  });
}
//depart js //
 const cards = document.querySelectorAll('.department-card');
        const cardScrollWrapper = document.getElementById('cardScrollWrapper');
        let activeIndex = 1; // Default active card (Vehicle Dynamics)

        /**
         * Scrolls the card container left or right by one card unit.
         * @param {number} direction - -1 for left, 1 for right.
         */
function scrollCardsHorizontal(direction) {
  const cardWidth = cards[0].offsetWidth;
  const gap = 25; // must match CSS 'gap'
  const scrollDistance = (cardWidth + gap) * 3; // scroll by 3 cards per click

  cardScrollWrapper.scrollLeft += direction * scrollDistance;

  // Adjust the active card visually
  let newIndex = activeIndex + direction * 3; // move active index by 3
  if (newIndex < 0) newIndex = 0;
  if (newIndex >= cards.length) newIndex = cards.length - 1;

  setTimeout(() => setActiveCard(newIndex), 400);
}



        /**
         * Updates the active card state and ensures the active card is centered in the viewport.
         * @param {number} newIndex - The index of the card to make active.
         */
        function setActiveCard(newIndex) {
            if (newIndex < 0 || newIndex >= cards.length) return;
            
            // 1. Update visual active state
            cards.forEach(card => card.classList.remove('is-active'));
            cards[newIndex].classList.add('is-active');
            activeIndex = newIndex;
            
            // 2. Scroll to center the active card
            const activeCard = cards[newIndex];
            const scrollWrapperWidth = cardScrollWrapper.offsetWidth;
            
            // Calculate the position required to center the card
            const scrollTarget = activeCard.offsetLeft - (scrollWrapperWidth / 2) + (activeCard.offsetWidth / 2);
            
            cardScrollWrapper.scrollLeft = scrollTarget;
        }

        // --- Event Handlers ---

        // Desktop/Tablet Click Handler (handles card activation and centers it)
        function handleCardClick(index) {
            setActiveCard(index);
        }
        
        // Touch/Tap Handler (handles card activation on touch devices and centers it)
        function handleCardTap(index) {
            // Use setTimeout to ensure the active state change is visible immediately on touch
            setTimeout(() => {
                setActiveCard(index);
            }, 50);
        }

        // --- Initialization ---
        
        window.onload = () => {
            // Initialize to the active card's position (index 1) and center it
            setActiveCard(activeIndex);
        }
// img js //

document.addEventListener('DOMContentLoaded', () => {
    const uniqueSliderContainer = document.querySelector('.unique-slider-container');
    const uniqueSliderItems = document.querySelectorAll('.unique-slider-item');
    const totalItems = uniqueSliderItems.length;
    let currentIndex = 0;

    if (totalItems === 0) return;

    function updateSlider() {
        const containerWidth = uniqueSliderContainer.parentElement.offsetWidth; // Width of the visible viewport area
        
        // Get the full computed width of one item, including its left/right margins
        const itemComputedStyle = getComputedStyle(uniqueSliderItems[0]);
        const itemWidth = uniqueSliderItems[0].offsetWidth + 
                          parseFloat(itemComputedStyle.marginLeft) + 
                          parseFloat(itemComputedStyle.marginRight);

        // Calculate the target offset to center the current item in the viewport.
        // Formula: (Viewport Center) - (Item Center) - (Total previous items' width)
        const offsetToCenter = (containerWidth / 2) - (itemWidth / 2);
        
        // Apply the transform to move the container
        // offsetToCenter centers the current item. We then subtract the total width of the slides
        // that have already passed (currentIndex * itemWidth).
        uniqueSliderContainer.style.transform = `translateX(${offsetToCenter - (currentIndex * itemWidth)}px)`;
    }

    // Function to advance the slide
    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalItems; // Loop back to 0 after the last slide
        updateSlider();
    }

    // Set an interval to change slides every 4 seconds (4000ms)
    setInterval(nextSlide, 4000);

    // Initial position update and responsiveness listeners
    updateSlider(); 
    window.addEventListener('resize', updateSlider);
});

particlesJS("sparkle-canvas", {
  particles: {
    number: { value: 220, density: { enable: true, value_area: 900 } }, // more particles
    color: { value: ["#9b59b6", "#5a79e9", "#ffffff", "#d4a0ff", "#6f4ff5"] }, // multiple colors
    shape: { type: "circle" },
    opacity: { value: 1.0, random: true },
    size: { value: 3.5, random: true },
    move: {
      enable: true,
      speed: 2,
      direction: "right",  // moving rightwards
      out_mode: "out"
    },
    line_linked: { enable: false }
  },
  interactivity: {
    detect_on: "canvas",
    events: { 
      onhover: { enable: true, mode: "repulse" }, 
      onclick: { enable: true, mode: "push" } 
    },
    modes: { 
      repulse: { distance: 100, duration: 0.4 },
      push: { particles_nb: 4 }
    }
  },
  retina_detect: true
});







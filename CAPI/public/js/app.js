document.addEventListener("DOMContentLoaded", () => {
  const menuToggle = document.querySelector('.bx-menu-alt-right');
  if (menuToggle) {
    menuToggle.addEventListener('click', function () {
      const navList = document.querySelector('nav ul');
      if (navList) {
        navList.classList.toggle('showMenu');
      }
    });
  }

  const counters = document.querySelectorAll(".quick-stats .stat h3[data-target]");

  const animateCounter = (counterEl) => {
    const target = Number(counterEl.getAttribute("data-target")) || 0;
    const durationMs = 1200;
    const startTime = performance.now();
    const startValue = 0;
    const endValue = target;

    const step = (now) => {
      const elapsed = now - startTime;
      const progress = Math.min(elapsed / durationMs, 1);
      const eased = 1 - Math.pow(1 - progress, 3); // easeOutCubic
      const value = Math.round(startValue + (endValue - startValue) * eased);
      counterEl.innerText = String(value);
      if (progress < 1) requestAnimationFrame(step);
    };
    requestAnimationFrame(step);
  };

  const typingElement = document.querySelector(".typing-animation");
  const text = "Preserving Saudi Heritage\nBuilding the Future."; // Text to animate
  if (typingElement) {
    typingElement.innerHTML = text; // Set the text for the animation
  }

  // Scroll reveal animations
  const revealElements = [
    // hero
    ...document.querySelectorAll('.hero .hero-content > *'),
    // quick stats
    ...document.querySelectorAll('.quick-stats .stat'),
    // services
    ...document.querySelectorAll('.service .service-header > *, .service .service-cards .card'),
    // projects
    ...document.querySelectorAll('.projects .projects-header > *, .projects .project-cards .card'),
    // about
    ...document.querySelectorAll('.about .about-header > *, .about .about-content img'),
    // footer columns
    ...document.querySelectorAll('footer .container > div')
  ];

  const addBaseRevealClasses = (el, index) => {
    el.classList.add('reveal');
    // choose a style based on context
    if (el.matches('.service .service-cards .card, .project-cards .card, .quick-stats .stat, footer .container > div')) {
      el.classList.add('fade-up');
    } else if (el.matches('.about .about-content img')) {
      el.classList.add('zoom-in');
    } else if (el.matches('.about .about-header *')) {
      el.classList.add('slide-left');
    } else {
      el.classList.add('fade-in');
    }
    el.style.transitionDelay = `${(index % 6) * 80}ms`;
  };

  revealElements.forEach(addBaseRevealClasses);

  const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('reveal-visible');
      } else {
        entry.target.classList.remove('reveal-visible');
      }
    });
  }, { root: null, rootMargin: '0px 0px -10% 0px', threshold: 0.15 });

  revealElements.forEach(el => revealObserver.observe(el));

  // Re-animate counters whenever in view
  const countersObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      const el = entry.target;
      if (entry.isIntersecting) {
        // reset before animating to ensure consistent replays
        el.innerText = '0';
        animateCounter(el);
      } else {
        // reset when leaving so it can animate again next time
        el.innerText = '0';
      }
    });
  }, { threshold: 0.3 });

  counters.forEach(el => countersObserver.observe(el));
});

let slides = document.querySelectorAll(".slideshow img");
let current = 0;
if (slides.length > 0) {
  function changeSlide() {
    slides[current].classList.remove("active");
    current = (current + 1) % slides.length;
    slides[current].classList.add("active");
  }
  setInterval(changeSlide, 3000); // change every 4 sec
}


let track = document.querySelector('.slideshow-track');
let slide = document.querySelectorAll('.slide');
let index = 0;
let visible = 4; // show 4 at a time

if (track && slide.length > 0) {
  function slideShow() {
    index++;
    if (index > slide.length - visible) {
      index = 0; // restart when reach end
    }
    track.style.transform = `translateX(-${index * (100 / visible)}%)`;
  }
  setInterval(slideShow, 3000); // every 3 sec
}



const toggle = document.querySelector('.nav-toggle');
const nav = document.querySelector('.main-nav');
if (toggle && nav) {
  toggle.addEventListener('click', () => {
    nav.classList.toggle('active');
  });
}
const langSwitch = document.querySelector(".lang-switch");

if (langSwitch) langSwitch.addEventListener("click", () => {
  document.documentElement.classList.toggle("rtl"); // toggle RTL class
  document.documentElement.setAttribute(
    "lang",
    document.documentElement.classList.contains("rtl") ? "ar" : "en"
  );

  // Swap button text
  langSwitch.textContent = langSwitch.textContent === "عربي" ? "EN" : "عربي";
});

// Chatbot widget logic
(function(){
  const fab = document.getElementById('chatbot-fab');
  const panel = document.getElementById('chatbot-panel');
  const form = document.getElementById('chatbot-form');
  const input = document.getElementById('chatbot-text');
  const messages = document.getElementById('chatbot-messages');
  const closeBtn = panel ? panel.querySelector('.chatbot-close') : null;

  // Only proceed on public layout pages
  if(!fab || !panel || !form || !input || !messages){ return; }

  // Show after DOM ready
  fab.style.display = 'flex';

  const companyInfo = {
    email: 'info@capi-ksa.com',
    phone: '+966-509776976',
    address: 'Said Ibn Zaqar, Aziziyah, Jeddah, Saudi Arabia',
    hours: 'Sun-Thu 9:00-18:00 (KSA)'
  };

  const faqs = [
    { q: ['what services','services you offer','offer'], a: 'We provide construction, design, and project management services. See Services page.' },
    { q: ['contact','email','phone','reach you'], a: `You can contact us at ${companyInfo.email} or ${companyInfo.phone}.` },
    { q: ['address','location','where are you'], a: `Our head office: ${companyInfo.address}.` },
    { q: ['hours','opening','support time'], a: `Our hours are ${companyInfo.hours}.` },
    { q: ['careers','job','apply'], a: 'View open roles on the Careers page. You can apply online there.' },
    { q: ['vendor','supplier','register'], a: 'Vendors can register via the Vendors page form.' },
    { q: ['website','about','company'], a: 'We are CAPI Global, your trusted partner in construction and design.' }
  ];

  function appendMessage(text, who){
    const div = document.createElement('div');
    div.className = `chat-msg ${who}`;
    div.textContent = text;
    messages.appendChild(div);
    messages.scrollTop = messages.scrollHeight;
  }

  function answerFor(text){
    const t = text.toLowerCase();
    for(const item of faqs){
      if(item.q.some(k => t.includes(k))){ return item.a; }
    }
    // Fallback: echo plus helpful links
    return 'I may not have that answer yet. Try asking about services, contact, address, hours, careers, or vendors. You can also visit our Contact page.';
  }

  function togglePanel(show){
    if(show){ panel.style.display = 'flex'; input.focus(); }
    else { panel.style.display = 'none'; }
  }

  fab.addEventListener('click', () => togglePanel(panel.style.display === 'none' || panel.style.display === ''));
  if(closeBtn){ closeBtn.addEventListener('click', () => togglePanel(false)); }

  // Greeting
  appendMessage('Hi! I\'m the CAPI Assistant. Ask me about services, contact details, address, hours, careers, or vendors.', 'bot');

  form.addEventListener('submit', (e) => {
    e.preventDefault();
    const text = input.value.trim();
    if(!text) return;
    appendMessage(text, 'user');
    input.value = '';
    setTimeout(() => {
      appendMessage(answerFor(text), 'bot');
    }, 200);
  });
})();


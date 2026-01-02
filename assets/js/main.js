// Menú responsive
const burger = document.getElementById("burger");
const nav = document.getElementById("nav");

if (burger && nav) {
  burger.addEventListener("click", () => nav.classList.toggle("show"));

  // Cierra menú al hacer click en un link
  document.querySelectorAll(".nav-link").forEach(a => {
    a.addEventListener("click", () => nav.classList.remove("show"));
  });
}

const links = document.querySelectorAll(".nav-link");
// Se ocultó clientes por el momento
const sections = ["inicio", "nosotros", "servicios", "contacto", "porque"]
  .map(id => document.getElementById(id));

window.addEventListener("scroll", () => {
  const y = window.scrollY + 120;
  let current = "inicio";

  sections.forEach(sec => {
    if (sec && sec.offsetTop <= y) current = sec.id;
  });

  links.forEach(l => {
    l.classList.toggle("active", l.getAttribute("href") === `#${current}`);
  });
});

const btnVideo = document.getElementById("btnVideo");
const modal = document.getElementById("videoModal");
const closeModal = document.getElementById("closeModal");
const videoFrame = document.getElementById("videoFrame");

//Enlace de video
const videoEmbed = "assets/videos/VIDEO PRUEBA 3.mp4";

function openModal() {
  modal.classList.add("show");
  modal.setAttribute("aria-hidden", "false");
  videoFrame.src = videoEmbed;
}
function closeVideoModal() {
  modal.classList.remove("show");
  modal.setAttribute("aria-hidden", "true");
  videoFrame.src = "";
}

if (btnVideo && modal) btnVideo.addEventListener("click", openModal);
if (closeModal) closeModal.addEventListener("click", closeVideoModal);
if (modal) modal.addEventListener("click", (e) => {
  if (e.target === modal) closeVideoModal();
});
// CONTACTO
const contactForm = document.getElementById("contactForm");
const contactMsg  = document.getElementById("contactMsg");

function showMsg(type, text) {
  if (!contactMsg) return;

  contactMsg.className = "contact-msg " + type;
  contactMsg.textContent = text;
  contactMsg.style.display = "block";

  requestAnimationFrame(() => contactMsg.classList.add("show"));

  clearTimeout(showMsg._t1);
  clearTimeout(showMsg._t2);
  showMsg._t1 = setTimeout(() => {
    contactMsg.classList.remove("show");
    showMsg._t2 = setTimeout(() => {
      contactMsg.style.display = "none";
    }, 350);
  }, 4500);
}

function setFieldError(el, message) {
  const wrap = el.closest(".field");
  if (!wrap) return;

  wrap.classList.add("has-error");
  el.classList.add("is-invalid");

  const msg = wrap.querySelector(".field-error");
  if (msg) msg.textContent = message;
}

function clearFieldError(el) {
  const wrap = el.closest(".field");
  if (!wrap) return;

  wrap.classList.remove("has-error");
  el.classList.remove("is-invalid");
}

function validateField(el){
  //Checkbox
  if (el.type === "checkbox") {
    if (!el.checked) {
      setFieldError(el, "Debes aceptar la Política de privacidad.");
      return false;
    }
    clearFieldError(el);
    return true;
  }

  //Inputs/textarea
  const value = (el.value || "").trim();

  if (value === "") {
    setFieldError(el, "El campo es obligatorio.");
    return false;
  }

  if (el.type === "email") {
    const ok = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
    if (!ok) {
      setFieldError(el, "Email inválido.");
      return false;
    }
  }

  clearFieldError(el);
  return true;
}

function validateForm(){
  if (!contactForm) return false;
  const requiredFields = contactForm.querySelectorAll("input[required], textarea[required]");
  const privacy = contactForm.querySelector("#privacy"); // 👈 ID del checkbox

  let ok = true;

  requiredFields.forEach(el => {
    if (!validateField(el)) ok = false;
  });
  if (privacy && !validateField(privacy)) ok = false;

  if (!ok) {
    const firstBad = contactForm.querySelector(".is-invalid");
    if (firstBad) firstBad.focus();
  }

  return ok;
}

if (contactForm && contactMsg) {
  contactForm.querySelectorAll("input[required], textarea[required]").forEach(el => {
    el.addEventListener("blur", () => validateField(el));
    el.addEventListener("input", () => {
      const wrap = el.closest(".field");
      if (wrap && wrap.classList.contains("has-error")) validateField(el);
    });
  });

  const privacy = contactForm.querySelector("#privacy");
  if (privacy) {
    privacy.addEventListener("change", () => validateField(privacy));
  }

  contactForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    if (!validateForm()) {
      showMsg("error", "Debes aceptar la Política de privacidad para continuar.");
      return;
    }
    showMsg("info", "Enviando mensaje...");

    const submitBtn = contactForm.querySelector("button[type='submit']");
    if (submitBtn) submitBtn.disabled = true;

    try {
      const res = await fetch(contactForm.action, {
        method: "POST",
        body: new FormData(contactForm),
      });

      if (!res.ok) throw new Error("HTTP " + res.status);
      contactForm.reset();
      contactForm.querySelectorAll(".field.has-error").forEach(f => f.classList.remove("has-error"));
      contactForm.querySelectorAll(".is-invalid").forEach(i => i.classList.remove("is-invalid"));

      showMsg("success", "Mensaje enviado correctamente. Nos pondremos en contacto contigo.");
    } catch (err) {
      showMsg("error", "No se pudo enviar el mensaje. Intenta nuevamente.");
    } finally {
      if (submitBtn) submitBtn.disabled = false;
    }
  });
}

// Carrusel de fondo en CONTACTO con 2 bolitas (infinito)
(function(){
  const section = document.getElementById("contacto");
  if (!section) return;

  const dots = section.querySelectorAll(".contact-dot");
  if (!dots.length) return;

  const slides = [
    "assets/img/slide1.png",
    "assets/img/slide2.png",
  ];

  let current = 0;
  let timer = null;

  function setSlide(i){
    current = (i + slides.length) % slides.length;
    section.style.backgroundImage = `url('${slides[current]}')`;
    dots.forEach((d, idx) => d.classList.toggle("active", idx === current));
  }

  function next(){ setSlide(current + 1); }

  dots.forEach(d => {
    d.addEventListener("click", () => {
      const i = parseInt(d.getAttribute("data-slide") || "0", 10);
      stop();
      setSlide(i);
      start();
    });
  });

  function start(){
    stop();
    timer = setInterval(next, 6000);
  }

  function stop(){
    if (timer) clearInterval(timer);
    timer = null;
  }

  section.addEventListener("mouseenter", stop);
  section.addEventListener("mouseleave", start);

  setSlide(0);
  start();
})();

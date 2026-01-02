<?php $page = "inicio"; ?>
<?php include __DIR__ . "/includes/header.php"; ?>
<section id="inicio" class="hero" style="background-image: url('assets/img/hero.jpg');">
<div class="hero-overlay"></div>

<div class="container hero-content">
<h1 class="hero-title">
    DIVERSIDAD Y<span> CALIDAD</span>
</h1>

<div class="hero-actions">
    <a class="btn btn-primary" href="#contacto">COTIZA CON NOSOTROS</a>
    <button class="btn btn-ghost" id="btnVideo">
    ▶ VIDEO PRESENTACIÓN
    </button>
</div>
</div>
<div class="modal" id="videoModal" aria-hidden="true">
<div class="modal-content">
    <button class="modal-close" id="closeModal">✕</button>
    <div class="ratio">
    <!-- Link de video-->
    <iframe id="videoFrame"
            src=""
            title="Video presentación"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
    </div>
</div>
</div>
</section>

<!-- SOBRE NOSOTROS -->
<section id="nosotros" class="about">
<div class="container about-grid">
<div class="about-img">
    <img src="assets/img/nosotros.jpg" alt="Equipo trabajando">
</div>

<div class="about-text">
    <h2>Sobre Nosotros</h2>

    <p>
    DIVCAL PE es una empresa deBPO especializada en Contact Center Omnicanal, que brinda soluciones integrales de atención al cliente, gestión 
    comercial y procesos operativos, adaptadas a las necesidades de cada organización. Acompañamos a empresas de diversos sectores en la optimización 
    de sus procesos y la mejora de la experiencia del cliente, integrando talento humano, tecnología y gestión estratégica.
    <p class="about-strong">
    Impulsamos la eficiencia operativa y la experiencia del cliente a través de soluciones BPO.

    </p>
</div>
</div>
</section>

<!-- SERVICIOS -->
<section id="servicios" class="services">
  <div class="container">
    <h2 class="section-title">Nuestros servicios</h2>

    <div class="cards">
      <article class="card">
        <div class="icon">🎧</div>
        <h3>ATENCIÓN AL<br>CLIENTE</h3>
        <p>Gestión de consultas, reclamos y seguimiento, garantizando una atención oportuna y de calidad.</p>
      </article>

      <article class="card">
        <div class="icon">🛠️</div>
        <h3>SOPORTE Y<br>POSTVENTA</h3>
        <p>Asistencia, seguimiento y solución de incidencias para fortalecer la relación con el cliente.</p>
      </article>

      <article class="card">
        <div class="icon">💬</div>
        <h3>GESTIÓN<br>OMNICANAL</h3>
        <p>Atención integrada a través de llamadas, WhatsApp, chat, correo electrónico y redes sociales.</p>
      </article>

      <article class="card">
        <div class="icon">📂</div>
        <h3>BACK OFFICE Y<br>PROCESOS</h3>
        <p>Gestión administrativa, actualización de bases de datos y soporte operativo interno.</p>
      </article>

      <article class="card">
        <div class="icon">📞</div>
        <h3>VENTAS Y<br>TELEVENTAS</h3>
        <p>Estrategias comerciales enfocadas en captación, fidelización y cierre de oportunidades.</p>
      </article>

      <article class="card">
        <div class="icon">📊</div>
        <h3>GESTIÓN Y<br>REPORTES</h3>
        <p>Monitoreo de indicadores, control de calidad y reportes para una toma de decisiones efectiva.</p>
      </article>
    </div>
  </div>
</section>


<!-- CONTACTO -->
<section id="contacto" class="contact">
<div class="container contact-grid">
<div class="contact-info">
    <h2>Contacto</h2>
    <p>¿Listo para conectar con el talento ideal? Escríbenos.</p>

    <ul class="contact-list">
    <li><strong>Ubicación:</strong> Lima, Perú</li>
    <li><strong>Email:</strong> contacto@divcalpe.com</li>
    <li><strong>WhatsApp:</strong> +51 997959646</li>
    </ul>
</div>

<form id="contactForm" class="contact-form" action="process/contact.php" method="POST">
  <h3 class="contact-form-title">PARA CONTRATAR NUESTROS SERVICIOS DÉJANOS TUS DATOS</h3>

  <div class="row">
    <div class="field">
      <label>Nombre <span class="req">*</span></label>
      <input type="text" name="nombre" required>
      <small class="field-error">El campo es obligatorio.</small>
    </div>

    <div class="field">
      <label>Apellidos <span class="req">*</span></label>
      <input type="text" name="apellidos" required>
      <small class="field-error">El campo es obligatorio.</small>
    </div>
  </div>

  <div class="row">
    <div class="field">
      <label>Correo electrónico <span class="req">*</span></label>
      <input type="email" name="email" required>
      <small class="field-error">El campo es obligatorio.</small>
    </div>

    <div class="field">
      <label>Número de teléfono <span class="req">*</span></label>
      <input type="text" name="telefono" required>
      <small class="field-error">El campo es obligatorio.</small>
    </div>
  </div>

  <div class="row">
    <div class="field">
      <label>Empresa <span class="req">*</span></label>
      <input type="text" name="empresa" required>
      <small class="field-error">El campo es obligatorio.</small>
    </div>

    <div class="field">
      <label>Cargo <span class="req">*</span></label>
      <input type="text" name="cargo" required>
      <small class="field-error">El campo es obligatorio.</small>
    </div>
  </div>

  <div class="field">
    <label>Mensaje <span class="req">*</span></label>
    <textarea name="mensaje" rows="5" required></textarea>
    <small class="field-error">El campo es obligatorio.</small>
  </div>

  <!-- Checkbox obligatorio -->
<div class="field">
  <label class="checkbox-label">
    <input type="checkbox" name="privacy" id="privacy">
    He leído y acepto la <a href="#" target="_blank">Política de privacidad de DIVCALPE</a>
  </label>
  <div class="field-error">Debes aceptar la Política de privacidad.</div>
</div>


  <button class="btn btn-primary" type="submit">Entremos en contacto</button>
  <p id="contactMsg" class="contact-msg"></p>

  <input type="hidden" name="csrf" value="<?php echo htmlspecialchars($_SESSION['csrf'] ?? ''); ?>">
</form>


</div>
<div class="contact-dots" aria-label="Carrusel contacto">
  <button type="button" class="contact-dot active" data-slide="0" aria-label="Slide 1"></button>
  <button type="button" class="contact-dot" data-slide="1" aria-label="Slide 2"></button>
</div>

</section>

<!-- POR QUÉ ELEGIRNOS -->
<section id="porque" class="why">
  <div class="container">
    <h2 class="why-title">¿Por qué elegir DIVCAL PE?</h2>

<div class="why-list">
  <div class="why-card">
    <div class="why-inner">
      <div class="why-front">
        <p>Enfoque BPO integral</p>
      </div>
      <div class="why-back">
        <div class="why-emoji">📌</div>
      </div>
    </div>
  </div>

  <div class="why-card">
    <div class="why-inner">
      <div class="why-front">
        <p>Soluciones adaptadas a cada cliente</p>
      </div>
      <div class="why-back">
        <div class="why-emoji">🎯</div>
      </div>
    </div>
  </div>

  <div class="why-card">
    <div class="why-inner">
      <div class="why-front">
        <p>Equipo capacitado y supervisado</p>
      </div>
      <div class="why-back">
        <div class="why-emoji">👥</div>
      </div>
    </div>
  </div>

  <div class="why-card">
    <div class="why-inner">
      <div class="why-front">
        <p>Atención omnicanal personalizada</p>
      </div>
      <div class="why-back">
        <div class="why-emoji">💬</div>
      </div>
    </div>
  </div>

  <div class="why-card">
    <div class="why-inner">
      <div class="why-front">
        <p>Control de calidad y reportes</p>
      </div>
      <div class="why-back">
        <div class="why-emoji">📊</div>
      </div>
    </div>
  </div>

  <div class="why-card">
    <div class="why-inner">
      <div class="why-front">
        <p>Orientación a resultados</p>
      </div>
      <div class="why-back">
        <div class="why-emoji">🚀</div>
      </div>
    </div>
  </div>
</div>

  </div>
</section>

<?php include __DIR__ . "/includes/footer.php"; ?>

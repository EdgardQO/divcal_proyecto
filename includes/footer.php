<?php include_once __DIR__ . "/../config.php"; ?>

</main>

<footer class="footer">
  <div class="container footer-inner">
    <img class="footer-logo" src="assets/img/logodivcalv1web1.png" alt="Divcal PE">
    <p class="footer-copy">© <?php echo date("Y"); ?> Divcal PE. Todos los derechos reservados.</p>
    <p class="footer-dev">Diseñado y desarrollado por el equipo de TI</p>

  </div>
</footer>

<!--WSP LOGO-->
<a href="https://wa.me/<?php echo $whatsapp_number; ?>?text=<?php echo $whatsapp_message; ?>"
   class="whatsapp-float"
   target="_blank"
   aria-label="WhatsApp">
  <img src="assets/img/whatsapp.png" alt="WhatsApp">
</a>

<script src="assets/js/main.js"></script>
</body>
</html>

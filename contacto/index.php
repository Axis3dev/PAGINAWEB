<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>AXIS 3D – Contacto</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/contacto.css">
  <script defer src="/assets/js/contacto.js"></script>
</head>
<body>
  <div class="wrap contacto-page">
    <header>
      <div class="mark">
        <div class="logo">A</div>
        <div class="brand">
          <h1>AXIS 3D</h1>
          <p>Tecnología + Soluciones</p>
        </div>
      </div>
    </header>

    <section class="hero">
      <h2>Contacto</h2>
      <p>Estamos listos para llevar tu proyecto de innovación al siguiente nivel. Escríbenos para cotizaciones de diseño y manufactura 3D, automatización, software y más.</p>
    </section>

    <section class="grid">
      <!-- Columna izquierda: datos y accesos rápidos -->
      <div class="panel">
        <h3>Accesos rápidos</h3>
        <div class="list">
          <a class="row" href="https://wa.me/526673163086" target="_blank" rel="noopener">
            <div class="ico">📞</div>
            <div><strong>WhatsApp / Teléfono</strong><small>+52 (667) 316 3086</small></div>
          </a>
          <a class="row" href="mailto:contacto@axis3d.mx">
            <div class="ico">✉️</div>
            <div><strong>Correo</strong><small>contacto@axis3d.mx</small></div>
          </a>
          <a class="row" href="https://axis3d.mx" target="_blank" rel="noopener">
            <div class="ico">🌐</div>
            <div><strong>Website</strong><small>axis3d.mx</small></div>
          </a>
          <a class="row" href="https://instagram.com/axis3d_cln" target="_blank" rel="noopener">
            <div class="ico">📷</div>
            <div><strong>Instagram</strong><small>@axis3d_cln</small></div>
          </a>
          <a class="row" href="https://www.tiktok.com/@axis3d_cln" target="_blank" rel="noopener">
            <div class="ico">📼</div>
            <div><strong>Tik Tok</strong><small>@axis3d_cln</small></div>
          </a>
          <a class="row" href="https://www.facebook.com/p/Axis3D-100050172473087/?locale=es_ES" target="_blank" rel="noopener">
            <div class="ico">📼</div>
            <div><strong>Facebook</strong><small>@axis3d_cln</small></div>
          </a>
        </div>

        <div class="services">
          <span class="chip">Diseño & Manufactura 3D</span>
          <span class="chip">Automatización Industrial</span>
          <span class="chip">Electrónica & IoT</span>
          <span class="chip">Software & Interfaces</span>
          <span class="chip">Prototipado Rápido</span>
        </div>

        <div class="btns">
          <a class="btn whatsapp" href="https://wa.me/526673163086" target="_blank" rel="noopener">Escríbenos por WhatsApp</a>
          <a class="btn mail" href="mailto:contacto@axis3d.mx">Enviar correo</a>
          <a class="btn primary" href="https://axis3d.mx/cotizar" target="_blank" rel="noopener">Solicitar cotización</a>
          <a class="btn" href="https://youtube.com" target="_blank" rel="noopener">Ver proyectos en YouTube</a>
        </div>
      </div>

      <!-- Columna derecha: formulario + QR -->
      <div class="panel">
        <h3>Cuéntanos tu proyecto</h3>
        <form id="contacto-form" action="/contacto/send.php" method="post" novalidate>
          <div class="stack">
            <div>
              <label for="nombre">Nombre</label>
              <input id="nombre" name="nombre" type="text" placeholder="Tu nombre completo" required />
            </div>
            <div>
              <label for="email">Correo</label>
              <input id="email" name="email" type="email" placeholder="tucorreo@dominio.com" required />
            </div>
          </div>
          <div class="stack">
            <div>
              <label for="telefono">Teléfono</label>
              <input id="telefono" name="telefono" type="tel" placeholder="(XXX) XXX XXXX" />
            </div>
            <div>
              <label for="servicio">Servicio</label>
              <select id="servicio" name="servicio" required>
                <option>Diseño / Impresión 3D</option>
                <option>Automatización / Control</option>
                <option>Electrónica / IoT</option>
                <option>Software / GUI</option>
                <option>Otro</option>
              </select>
            </div>
          </div>
          <div>
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" placeholder="Describe brevemente tu idea, plazos y objetivos" required></textarea>
          </div>

          <!-- Honeypot anti-spam -->
          <input type="text" name="empresa" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px" />

          <div class="aside">
            <button class="btn primary" type="submit">Enviar solicitud</button>
            <div class="qr">QR<br>axis3d.mx/contacto</div>
          </div>

          <div id="form-status" role="status" aria-live="polite"></div>
        </form>
      </div>
    </section>

    <footer>
      <div>© AXIS 3D • Culiacán, Sinaloa, México</div>
      <div class="social">
        <a class="badge" aria-label="Instagram" href="https://instagram.com/axis3d_cln" target="_blank" rel="noopener">📷</a>
        <a class="badge" aria-label="YouTube" href="#" target="_blank" rel="noopener">▶️</a>
        <a class="badge" aria-label="TikTok" href="#" target="_blank" rel="noopener">🎵</a>
        <a class="badge" aria-label="Facebook" href="#" target="_blank" rel="noopener">f</a>
      </div>
    </footer>
  </div>
</body>
</html>

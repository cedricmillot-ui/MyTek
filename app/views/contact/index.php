<section class="section-hero-mytek">
  <div class="container text-center">
    <h1>Contact</h1>
    <p class="hero-subtitle">
      Un projet, une question, ou besoin d’un avis ?<br>
      Écrivez-nous, on vous répond rapidement.
    </p>
    <div class="cta-container">
      <a href="/contact" class="btn-orange">Prendre rendez-vous</a>
    </div>
  </div>
</section>

<section class="section-form-mytek">
  <div class="container">
    <div class="form-card">
      <h2 class="text-center">Écrivez-nous</h2>
      <p class="text-center">Remplissez ce formulaire et nous revenons vers vous dès que possible.</p>

      <form id="contact-form" action="/contact/send" method="post" class="mytek-form">
        <div class="form-group">
          <label for="firstname">Prénom</label>
          <input type="text" id="firstname" name="firstname" placeholder="Votre prénom" required>
        </div>

        <div class="form-group">
          <label for="lastname">Nom</label>
          <input type="text" id="lastname" name="lastname" placeholder="Votre nom" required>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="votre@email.com" required>
        </div>

        <div class="form-group">
          <label for="message">Message</label>
          <textarea id="message" name="message" rows="5" placeholder="Comment pouvons-nous vous aider ?" required></textarea>
        </div>

        <div class="checkbox-container">
          <input type="checkbox" id="consent" name="consent" required>
          <label for="consent">
            J’accepte que ce message soit transmis par email. Les données ne sont <strong>pas sauvegardées</strong> sur le site.
            J’ai pris connaissance des <a href="/mentions">mentions légales</a>.
          </label>
        </div>

        <div class="h-captcha" data-sitekey="00000000-0000-0000-0000-000000000000"></div>

        <div class="text-center">
          <button type="submit" class="btn-orange submit-btn">Envoyer le message</button>
        </div>
      </form>
    </div>
  </div>
</section>
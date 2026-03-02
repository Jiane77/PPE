<?php
// ─────────────────────────────────────────────
//  Configuration
// ─────────────────────────────────────────────
$config = [
    'nom'          => 'AutoDrive',
    'promo_pct'    => '-40%',
    'prix_permis'  => '499€',
    'nb_agences'   => 73,
    'satisfaction' => 94,
    'delai_examen' => 45,
    'annee'        => date('Y'),
];

$offres = [
    ['icon' => '📱', 'titre' => 'Code de la route',        'prix' => 'GRATUIT',                              'classe' => 'free', 'lien' => '#code'],
    ['icon' => '🚗', 'titre' => 'Permis de conduire',      'prix' => "à partir de {$config['prix_permis']}", 'classe' => '',     'lien' => '#permis'],
    ['icon' => '💼', 'titre' => 'Permis CPF',              'prix' => '<strong>Finance</strong> ton permis',  'classe' => 'cpf',  'lien' => '#cpf'],
    ['icon' => '🏍️', 'titre' => 'Permis deux roues',       'prix' => "à partir de {$config['prix_permis']}", 'classe' => '',     'lien' => '#moto'],
    ['icon' => '🚲', 'titre' => 'Tous nos autres services','prix' => 'à partir de 19.99€',                   'classe' => '',     'lien' => '#autres'],
];

$features = [
    ['icon' => '📲', 'titre' => 'Application mobile intuitive',   'desc' => "Réserve tes leçons, suis ta progression, contacte ton moniteur en temps réel."],
    ['icon' => '👨‍🏫','titre' => 'Moniteurs certifiés BEPECASER', 'desc' => "Des enseignants passionnés et pédagogues pour t'accompagner jusqu'à l'examen."],
    ['icon' => '🗓️', 'titre' => 'Examen rapide garanti',          'desc' => "On te garantit une date d'examen sous {$config['delai_examen']} jours grâce à notre réseau."],
];

$temoignages = [
    ['initiale' => 'M', 'nom' => 'Marie L.',  'detail' => 'Permis B · Lyon',      'etoiles' => 5, 'texte' => "J'ai eu mon permis du premier coup ! Les moniteurs sont super pédagogues et l'appli vraiment pratique."],
    ['initiale' => 'T', 'nom' => 'Thomas R.', 'detail' => 'Permis CPF · Paris',   'etoiles' => 5, 'texte' => "Grâce au CPF j'ai financé la totalité de mon permis. Tout s'est passé en 3 mois, c'est vraiment efficace !"],
    ['initiale' => 'S', 'nom' => 'Sophie B.', 'detail' => 'Permis B · Marseille', 'etoiles' => 4, 'texte' => "Le code gratuit m'a permis de me préparer sans stress. Examen en 45 jours comme promis, vraiment top !"],
];

function etoiles(int $n): string {
    return str_repeat('★', $n) . str_repeat('☆', 5 - $n);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($config['nom']) ?> — Accueil</title>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Nunito:wght@400;600;700;800;900&family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<style>
/* ══════════════════════════════════════
   VARIABLES
══════════════════════════════════════ */
:root {
  --blue:       #2d4ef5;
  --blue-light: #e8ecff;
  --yellow:     #ffe830;
  --dark:       #0a0c10;
  --dark2:      #111318;
  --dark3:      #1a1d24;
  --accent:     #f5c842;
  --text:       #edeef2;
  --text-dim:   #8a8d9a;
  --border:     rgba(255,255,255,0.08);
  --gray:       #6b7280;
  --radius:     20px;
}

* { margin:0; padding:0; box-sizing:border-box; }
body { font-family:'Nunito',sans-serif; background:#fff; color:#1a1a2e; overflow-x:hidden; }

/* ══════════════════════════════════════
   NAVBAR BOOTSTRAP BLANC
══════════════════════════════════════ */
.navbar {
  background: #fff;
  border-bottom: 1px solid #f0f0f5;
  padding: 14px 0;
  position: sticky;
  top: 0;
  z-index: 1000;
  box-shadow: 0 2px 16px rgba(0,0,0,.06);
}
.navbar-brand {
  font-family: 'Poppins', sans-serif;
  font-weight: 800;
  font-size: 26px;
  color: #1a1a2e !important;
  letter-spacing: -1px;
}
.navbar-brand span { color: var(--blue); }
.nav-link {
  font-size: 14px;
  font-weight: 600;
  color: #444 !important;
  padding: 6px 12px !important;
  border-radius: 8px;
  transition: all .2s;
}
.nav-link:hover { color: var(--blue) !important; background: var(--blue-light); }
.btn-connect {
  border: 2px solid var(--blue);
  color: var(--blue) !important;
  border-radius: 50px;
  padding: 8px 22px !important;
  font-weight: 700;
  font-size: 14px;
  transition: all .2s;
}
.btn-connect:hover { background: var(--blue); color: #fff !important; }
.btn-signup {
  background: var(--yellow);
  color: #1a1a2e !important;
  border-radius: 50px;
  padding: 8px 22px !important;
  font-weight: 800;
  font-size: 14px;
  border: none;
  transition: all .2s;
}
.btn-signup:hover { background: #ffd600; transform: scale(1.04); }

/* ══════════════════════════════════════
   HERO
══════════════════════════════════════ */
.hero {
  background: linear-gradient(135deg, #fff8f8 0%, #ffe8e8 100%);
  padding: 80px 0 64px;
  position: relative;
  overflow: hidden;
}
.hearts-bg { position:absolute; inset:0; pointer-events:none; overflow:hidden; opacity:.25; }
@keyframes floatHeart {
  0%   { transform:translateY(100%) rotate(0deg);  opacity:0; }
  10%  { opacity:1; }
  90%  { opacity:.6; }
  100% { transform:translateY(-120px) rotate(20deg); opacity:0; }
}
.hero-title {
  font-family:'Poppins',sans-serif;
  font-size:clamp(26px,3.8vw,44px);
  font-weight:800;
  line-height:1.2;
  margin-bottom:20px;
  animation:slideIn .7s cubic-bezier(.22,1,.36,1) both;
}
.hero-title .promo {
  color:var(--blue);
  font-size:clamp(30px,4.5vw,52px);
  display:block;
  margin-top:6px;
}
@keyframes slideIn {
  from { opacity:0; transform:translateX(-30px); }
  to   { opacity:1; transform:translateX(0); }
}
.btn-cta-primary {
  background:var(--yellow);
  color:#1a1a2e;
  font-weight:800;
  font-size:15px;
  padding:16px 32px;
  border-radius:50px;
  border:none;
  display:inline-block;
  text-decoration:none;
  transition:all .2s;
  box-shadow:0 4px 20px rgba(255,232,48,.5);
}
.btn-cta-primary:hover { background:#ffd600; transform:translateY(-3px); color:#1a1a2e; }
.btn-cta-primary .price { color:var(--blue); }
.btn-cta-secondary {
  background:#fff;
  color:var(--blue);
  font-weight:700;
  font-size:14px;
  padding:15px 32px;
  border-radius:50px;
  border:2px solid #e0e0f0;
  display:inline-block;
  text-decoration:none;
  transition:all .2s;
}
.btn-cta-secondary:hover { border-color:var(--blue); transform:translateY(-2px); }
.hero-car { animation:floatCar 3s ease-in-out infinite; max-width:100%; filter:drop-shadow(0 20px 40px rgba(0,0,0,.15)); }
@keyframes floatCar { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-12px)} }

/* ══════════════════════════════════════
   OFFRES
══════════════════════════════════════ */
.offers-section { padding:80px 0 60px; background:#fff; }
.section-label { font-size:12px; font-weight:700; color:var(--blue); letter-spacing:2px; text-transform:uppercase; margin-bottom:8px; }
.section-title { font-family:'Poppins',sans-serif; font-size:clamp(26px,3.5vw,42px); font-weight:800; margin-bottom:48px; }
.section-title .accent { color:var(--blue); }
.offer-card {
  background:#fff;
  border-radius:var(--radius);
  border:2px solid #f0f0f8;
  padding:32px 20px;
  text-align:center;
  transition:all .3s;
  height:100%;
  cursor:pointer;
}
.offer-card:hover { border-color:var(--blue); transform:translateY(-6px); box-shadow:0 16px 40px rgba(45,78,245,.12); background:var(--blue-light); }
.offer-title { font-family:'Poppins',sans-serif; font-size:16px; font-weight:800; color:#1a1a2e; margin-bottom:4px; }
.offer-price { font-size:14px; font-weight:700; color:var(--blue); margin-bottom:20px; }
.offer-price.free { color:#10b981; font-size:17px; }
.offer-price.cpf  { color:#8b5cf6; }
.offer-icon { font-size:58px; height:88px; display:flex; align-items:center; justify-content:center; margin-bottom:16px; }
.offer-link { font-size:13px; font-weight:700; color:var(--blue); text-decoration:none; }

/* ══════════════════════════════════════
   STATS BAR
══════════════════════════════════════ */
.stats-bar { background:#f8f9ff; border-radius:20px; padding:32px 40px; margin-top:48px; }
.stat-item { text-align:center; padding:12px; }
.stat-item i { font-size:24px; color:var(--blue); margin-bottom:8px; display:block; }
.stat-num { font-family:'Poppins',sans-serif; font-size:20px; font-weight:800; color:#1a1a2e; }
.stat-num span { color:var(--blue); }
.stat-text { font-size:13px; color:var(--gray); font-weight:600; }

/* ══════════════════════════════════════
   RÉINVENTÉE
══════════════════════════════════════ */
.reinvented { padding:80px 0; background:#fff; }
.reinvented-title { font-family:'Poppins',sans-serif; font-size:clamp(26px,3.5vw,42px); font-weight:800; line-height:1.2; margin-bottom:12px; }
.reinvented-title .accent { color:var(--blue); }
.reinvented-sub  { font-size:17px; font-weight:700; color:var(--blue); margin-bottom:20px; }
.reinvented-desc { font-size:15px; color:var(--gray); line-height:1.8; margin-bottom:28px; }
.feature-item { display:flex; align-items:flex-start; gap:14px; margin-bottom:20px; }
.feature-icon { width:44px; height:44px; border-radius:12px; background:var(--blue-light); display:flex; align-items:center; justify-content:center; font-size:20px; flex-shrink:0; }
.feature-text h5 { font-size:15px; font-weight:700; color:#1a1a2e; margin-bottom:2px; }
.feature-text p  { font-size:13px; color:var(--gray); margin:0; }
.phone-mockup {
  background:linear-gradient(135deg,var(--blue) 0%,#6c8fff 100%);
  border-radius:36px;
  padding:12px;
  box-shadow:0 32px 64px rgba(45,78,245,.25);
  max-width:280px;
  margin:0 auto;
  animation:floatPhone 4s ease-in-out infinite;
}
.phone-screen { background:#fff; border-radius:28px; padding:24px 20px; min-height:360px; display:flex; flex-direction:column; gap:12px; }
.phone-header { font-weight:800; font-size:15px; color:#1a1a2e; text-align:center; }
.phone-card { background:var(--blue-light); border-radius:12px; padding:14px; font-size:13px; font-weight:600; color:var(--blue); }
.phone-card .time { font-size:11px; color:var(--gray); margin-top:4px; }
.phone-progress { background:#e8e8f8; border-radius:8px; height:5px; margin-top:8px; }
.phone-bar      { border-radius:8px; height:5px; }
@keyframes floatPhone { 0%,100%{transform:translateY(0) rotate(-2deg)} 50%{transform:translateY(-10px) rotate(-2deg)} }

/* ══════════════════════════════════════
   TÉMOIGNAGES
══════════════════════════════════════ */
.testimonials { background:var(--blue); padding:80px 0; }
.testimonials .section-label { color:var(--yellow); }
.testimonials .section-title { color:#fff; }
.testimonials .section-title .accent { color:var(--yellow); }
.testimonial-card { background:rgba(255,255,255,.1); backdrop-filter:blur(10px); border:1px solid rgba(255,255,255,.15); border-radius:20px; padding:28px; height:100%; }
.stars           { color:var(--yellow); font-size:16px; margin-bottom:12px; letter-spacing:2px; }
.testimonial-text { font-size:14px; color:rgba(255,255,255,.9); line-height:1.7; margin-bottom:20px; }
.testimonial-author { display:flex; align-items:center; gap:12px; }
.author-avatar { width:42px; height:42px; border-radius:50%; background:var(--yellow); display:flex; align-items:center; justify-content:center; font-weight:800; font-size:16px; color:#1a1a2e; flex-shrink:0; }
.author-name   { font-weight:700; font-size:14px; color:#fff; }
.author-detail { font-size:12px; color:rgba(255,255,255,.6); }

/* ══════════════════════════════════════
   CTA
══════════════════════════════════════ */
.cta-section { padding:80px 0; background:#fff; text-align:center; }
.cta-box { background:linear-gradient(135deg,#f8f9ff 0%,var(--blue-light) 100%); border-radius:32px; padding:64px 48px; border:2px solid #e8ecff; position:relative; overflow:hidden; }
.cta-box::after { content:'🚗'; position:absolute; font-size:140px; opacity:.05; bottom:-20px; right:-10px; }
.cta-box h2 { font-family:'Poppins',sans-serif; font-size:clamp(24px,3vw,38px); font-weight:800; color:#1a1a2e; margin-bottom:12px; }
.cta-box p  { font-size:16px; color:var(--gray); margin-bottom:32px; }

/* ══════════════════════════════════════
   FOOTER SOMBRE
══════════════════════════════════════ */
footer { background:var(--dark); color:rgba(255,255,255,.7); padding:56px 0 28px; }
.footer-logo { font-family:'Bebas Neue',sans-serif; font-size:28px; letter-spacing:3px; color:var(--accent); margin-bottom:12px; }
.footer-logo span { color:var(--text); }
.footer-desc { font-size:14px; margin-bottom:24px; line-height:1.7; }
footer h6 { color:#fff; font-weight:700; font-size:13px; margin-bottom:16px; letter-spacing:1px; text-transform:uppercase; }
footer ul { list-style:none; padding:0; }
footer ul li { margin-bottom:10px; }
footer ul li a { color:rgba(255,255,255,.5); text-decoration:none; font-size:14px; transition:color .2s; }
footer ul li a:hover { color:var(--accent); }
.footer-bottom { border-top:1px solid var(--border); margin-top:40px; padding-top:20px; font-size:13px; color:rgba(255,255,255,.35); }

/* ══════════════════════════════════════
   SCROLL REVEAL
══════════════════════════════════════ */
.reveal { opacity:0; transform:translateY(28px); transition:opacity .7s ease,transform .7s ease; }
.reveal.visible { opacity:1; transform:none; }

/* ══════════════════════════════════════
   RESPONSIVE
══════════════════════════════════════ */
@media(max-width:991px) {
  .cta-box { padding:40px 24px; }
}
</style>
</head>
<body>
<!-- ══════════════════════════════════════
     HERO
══════════════════════════════════════ -->
<section class="hero">
  <div class="hearts-bg" id="heartsContainer"></div>
  <div class="container">
    <div class="row align-items-center gy-4">
      <div class="col-lg-6">
        <p style="color:#e8421a;font-size:15px;font-weight:700;margin-bottom:8px">❤️ Parce qu'on vous aime vraiment,</p>
        <h1 class="hero-title">
          on a remplacé les fleurs par la meilleure promo de l'année.
          <em class="promo">Jusqu'à <?= htmlspecialchars($config['promo_pct']) ?> de réduction</em>
        </h1>
        <div class="d-flex flex-wrap gap-3 mt-4">
          <a href="inscription.php" class="btn-cta-primary">
            Passe ton permis <span class="price">à partir de <?= htmlspecialchars($config['prix_permis']) ?></span>
          </a>
          <a href="contact.php" class="btn-cta-secondary">
            <i class="bi bi-chat-dots me-2"></i>Contacte un conseiller
          </a>
        </div>
        <div class="d-flex gap-4 mt-4 flex-wrap">
          <div class="d-flex align-items-center gap-2">
            <div style="width:36px;height:36px;border-radius:50%;background:var(--yellow);display:flex;align-items:center;justify-content:center;font-size:14px;flex-shrink:0">⭐</div>
            <span style="font-size:13px;font-weight:700;color:#444">4.8/5 — 12 000+ avis</span>
          </div>
          <div class="d-flex align-items-center gap-2">
            <div style="width:36px;height:36px;border-radius:50%;background:#e8faf2;display:flex;align-items:center;justify-content:center;font-size:14px;flex-shrink:0">✅</div>
            <span style="font-size:13px;font-weight:700;color:#444">Agréé État</span>
          </div>
        </div>
      </div>

      <div class="col-lg-6 text-center">
        <svg class="hero-car" viewBox="0 0 520 320" xmlns="http://www.w3.org/2000/svg" style="width:100%;max-width:480px">
          <!-- Ballon cœur -->
          <circle cx="360" cy="55" r="36" fill="#ff6b6b"/>
          <path d="M345 45 C345 35 355 30 360 40 C365 30 375 35 375 45 C375 58 360 70 360 70 C360 70 345 58 345 45Z" fill="#ff4444"/>
          <line x1="360" y1="91" x2="355" y2="130" stroke="#ff8888" stroke-width="2" stroke-dasharray="4,3"/>
          <!-- Badge promo -->
          <circle cx="95" cy="138" r="44" fill="#ffe830"/>
          <text x="72" y="134" font-family="Poppins,sans-serif" font-weight="900" font-size="20" fill="#1a1a2e"><?= htmlspecialchars($config['promo_pct']) ?></text>
          <text x="78" y="152" font-family="Nunito,sans-serif" font-weight="700" font-size="11" fill="#1a1a2e">PROMO</text>
          <!-- Carrosserie -->
          <rect x="55" y="178" width="385" height="92" rx="18" fill="#ffffff" stroke="#dde" stroke-width="2"/>
          <path d="M118 178 C138 128 186 108 262 108 C338 108 372 132 388 178Z" fill="#ffffff" stroke="#dde" stroke-width="2"/>
          <!-- Vitres -->
          <path d="M143 178 C153 150 180 136 238 133 L238 178Z" fill="#b3d9ff" opacity=".75"/>
          <rect x="246" y="131" width="112" height="47" rx="7" fill="#b3d9ff" opacity=".75"/>
          <!-- Marque -->
          <rect x="88" y="200" width="198" height="40" rx="10" fill="rgba(45,78,245,.1)"/>
          <text x="100" y="225" font-family="Poppins,sans-serif" font-weight="800" font-size="20" fill="#2d4ef5"><?= htmlspecialchars($config['nom']) ?></text>
          <!-- Sticker smiley -->
          <circle cx="358" cy="215" r="28" fill="#ffe830"/>
          <text x="344" y="224" font-size="22">😊</text>
          <!-- Roues -->
          <circle cx="148" cy="272" r="34" fill="#2a2a3e" stroke="#444" stroke-width="3"/>
          <circle cx="148" cy="272" r="19" fill="#777" stroke="#999" stroke-width="2"/>
          <circle cx="148" cy="272" r="7" fill="#ccc"/>
          <circle cx="362" cy="272" r="34" fill="#2a2a3e" stroke="#444" stroke-width="3"/>
          <circle cx="362" cy="272" r="19" fill="#777" stroke="#999" stroke-width="2"/>
          <circle cx="362" cy="272" r="7" fill="#ccc"/>
          <!-- Phare -->
          <ellipse cx="436" cy="210" rx="18" ry="11" fill="#ffe830" opacity=".95"/>
        </svg>
      </div>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Cœurs flottants hero
const c = document.getElementById('heartsContainer');
for (let i = 0; i < 14; i++) {
  const h = document.createElement('div');
  h.innerHTML = '❤';
  h.style.cssText = `position:absolute;left:${Math.random()*100}%;bottom:-40px;font-size:${20+Math.random()*18}px;color:#ff8888;animation:floatHeart ${5+Math.random()*8}s ${Math.random()*5}s linear infinite`;
  c.appendChild(h);
}

// Scroll reveal
const obs = new IntersectionObserver(entries => {
  entries.forEach((e, i) => {
    if (e.isIntersecting) {
      setTimeout(() => e.target.classList.add('visible'), i * 100);
      obs.unobserve(e.target);
    }
  });
}, { threshold: 0.1 });
document.querySelectorAll('.reveal').forEach(el => obs.observe(el));
</script>
</body>
</html>
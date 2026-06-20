/* ═══════════════════════════════════════
   TICKETIN — MAIN JS
   AOS + Parallax + Luxury interactions
   ═══════════════════════════════════════ */

document.addEventListener('DOMContentLoaded', () => {

  /* ───────────────────────────────────────
     1. AOS INIT
  ─────────────────────────────────────── */
  AOS.init({
    duration: 700,
    easing: 'ease-out-cubic',
    once: true,          // animate once (performance)
    offset: 80,          // trigger 80px before entering viewport
    disable: 'mobile',   // disable on small screens for perf
  });

  /* ───────────────────────────────────────
     2. NAVBAR scroll state + active links
  ─────────────────────────────────────── */
  const nav = document.getElementById('nav');
  const btt = document.getElementById('btt');

  window.addEventListener('scroll', () => {
    const y = window.scrollY;
    nav.classList.toggle('scrolled', y > 60);
    btt.classList.toggle('visible', y > 400);
    updateActiveNav(y);
    handleParallax(y);
  }, { passive: true });

  function updateActiveNav(y) {
    document.querySelectorAll('section[id]').forEach(sec => {
      const top = sec.offsetTop - 100;
      const bot = top + sec.offsetHeight;
      const link = document.querySelector(`.nav-links a[href="#${sec.id}"]`);
      if (link) link.classList.toggle('active', y >= top && y < bot);
    });
  }

  /* ───────────────────────────────────────
     3. PARALLAX ENGINE
     Multiple layers at different speeds
  ─────────────────────────────────────── */
  const pxOrb1       = document.getElementById('pxOrb1');
  const pxOrb2       = document.getElementById('pxOrb2');
  const pxOrb3       = document.getElementById('pxOrb3');
  const pxGrid       = document.getElementById('pxGrid');
  const pxCardImg    = document.getElementById('pxCardImg');
  const pxSpotlight  = document.getElementById('pxSpotlightImg');
  const pxCountdown  = document.getElementById('pxCountdown');
  const sectionBgs   = document.querySelectorAll('.section-px-bg');

  // Spotlight & countdown section refs
  const spotlightSec  = document.getElementById('spotlight');
  const countdownSec  = document.getElementById('countdown');
  const categorySec   = document.getElementById('category');
  const contactSec    = document.getElementById('contact');

  function getSectionProgress(section) {
    if (!section) return 0;
    const rect = section.getBoundingClientRect();
    const vh = window.innerHeight;
    // 0 = just entered from bottom, 1 = fully scrolled past top
    return (vh - rect.top) / (vh + rect.height);
  }

  function handleParallax(scrollY) {
    // ── Hero orbs (fastest — they're in a fixed section)
    if (pxOrb1) pxOrb1.style.transform = `translateY(${scrollY * 0.18}px) translateX(${scrollY * 0.04}px)`;
    if (pxOrb2) pxOrb2.style.transform = `translateY(${scrollY * -0.12}px) translateX(${scrollY * -0.03}px)`;
    if (pxOrb3) pxOrb3.style.transform = `translateY(${scrollY * 0.08}px)`;
    if (pxGrid) pxGrid.style.transform  = `translateY(${scrollY * 0.06}px)`;

    // ── Hero card image — subtle inner zoom parallax
    if (pxCardImg) {
      const heroSection = document.getElementById('hero');
      const heroRect = heroSection?.getBoundingClientRect();
      if (heroRect && heroRect.bottom > 0) {
        const p = (window.innerHeight - heroRect.top) / (window.innerHeight + heroRect.height);
        const shift = (p - 0.5) * 40;
        pxCardImg.style.transform = `scale(1.1) translateY(${shift}px)`;
      }
    }

    // ── Spotlight image parallax
    if (pxSpotlight && spotlightSec) {
      const p = getSectionProgress(spotlightSec);
      const shift = (p - 0.5) * 80;
      pxSpotlight.style.transform = `scale(1.15) translateY(${shift}px)`;
    }

    // ── Countdown orb
    if (pxCountdown && countdownSec) {
      const p = getSectionProgress(countdownSec);
      const shift = (p - 0.5) * 60;
      pxCountdown.style.transform = `scale(1.2) translateY(${shift}px)`;
    }

    // ── Section blob backgrounds
    sectionBgs.forEach(bg => {
      const sec = bg.closest('section');
      if (!sec) return;
      const speed  = parseFloat(bg.dataset.pxSpeed  || '0.2');
      const dir    = bg.dataset.pxDir === 'down' ? 1 : -1;
      const p      = getSectionProgress(sec);
      const shift  = (p - 0.5) * 120 * speed * dir;
      bg.style.transform = `translateY(${shift}px) scale(1.1)`;
    });
  }

  /* ───────────────────────────────────────
     4. MOUSE PARALLAX on hero (desktop)
     Card subtly responds to cursor
  ─────────────────────────────────────── */
  const heroCard = document.getElementById('heroCard');
  const hero     = document.getElementById('hero');

  if (heroCard && window.matchMedia('(pointer: fine)').matches) {
    hero.addEventListener('mousemove', (e) => {
      const rect = hero.getBoundingClientRect();
      const cx = (e.clientX - rect.left) / rect.width  - 0.5;  // -0.5 to 0.5
      const cy = (e.clientY - rect.top)  / rect.height - 0.5;

      // Card 3D tilt
      heroCard.style.transform = `
        perspective(800px)
        rotateY(${cx * 10}deg)
        rotateX(${cy * -6}deg)
        translateZ(10px)
      `;

      // Orbs respond to mouse
      if (pxOrb1) pxOrb1.style.transform += ` translate(${cx * 30}px, ${cy * 20}px)`;
      if (pxOrb3) pxOrb3.style.transform += ` translate(${cx * -20}px, ${cy * -15}px)`;
    });

    hero.addEventListener('mouseleave', () => {
      heroCard.style.transform = '';
    });
  }

  /* ───────────────────────────────────────
     5. FLOATING PARTICLES in hero
  ─────────────────────────────────────── */
  const particleContainer = document.getElementById('heroParticles');
  if (particleContainer) {
    const PARTICLE_COUNT = 28;
    const colors = ['#d4af37', '#f0d060', '#00c4a7', '#7c5cbf', '#ffffff'];

    for (let i = 0; i < PARTICLE_COUNT; i++) {
      const p = document.createElement('div');
      p.className = 'particle';
      const size     = Math.random() * 4 + 1;
      const left     = Math.random() * 100;
      const duration = Math.random() * 12 + 8;
      const delay    = Math.random() * 10;
      const color    = colors[Math.floor(Math.random() * colors.length)];

      p.style.cssText = `
        left: ${left}%;
        width: ${size}px;
        height: ${size}px;
        background: ${color};
        animation-duration: ${duration}s;
        animation-delay: -${delay}s;
        opacity: ${Math.random() * 0.5 + 0.1};
      `;
      particleContainer.appendChild(p);
    }
  }

  /* ───────────────────────────────────────
     6. PROFILE DROPDOWN
  ─────────────────────────────────────── */
  window.toggleProfileMenu = () => {
    document.getElementById('profileMenu')?.classList.toggle('open');
  };
  document.addEventListener('click', (e) => {
    if (!document.querySelector('.profile-dropdown')?.contains(e.target)) {
      document.getElementById('profileMenu')?.classList.remove('open');
    }
  });

  /* ───────────────────────────────────────
     7. CATEGORY + EVENT FILTER
  ─────────────────────────────────────── */
  window.filterEvents = (cat, el) => {
    document.querySelectorAll('.catcard').forEach(c => c.classList.remove('active'));
    el.classList.add('active');
    filterEv(cat, null, true);
    document.getElementById('events')?.scrollIntoView({ behavior: 'smooth' });
  };

  window.filterEv = (cat, btn) => {
    if (btn) {
      document.querySelectorAll('.filtbtn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
    }
    document.querySelectorAll('.ecard').forEach((card, i) => {
      const cardCat = card.dataset.cat?.toLowerCase() || '';
      const show = cat === 'all' || cardCat.includes(cat);
      card.style.transition = `opacity .35s ${i * 0.04}s, transform .35s ${i * 0.04}s`;
      if (show) {
        card.style.display = '';
        requestAnimationFrame(() => {
          card.style.opacity = '1';
          card.style.transform = '';
        });
      } else {
        card.style.opacity = '0';
        card.style.transform = 'scale(.95) translateY(10px)';
        setTimeout(() => { if (card.style.opacity === '0') card.style.display = 'none'; }, 380);
      }
    });
  };

  /* ───────────────────────────────────────
     8. TICKET TYPE SELECTOR
  ─────────────────────────────────────── */
  document.querySelectorAll('.ttype').forEach(t => {
    t.addEventListener('click', () => {
      document.querySelectorAll('.ttype').forEach(x => x.classList.remove('selected'));
      t.classList.add('selected');
    });
  });

  /* ───────────────────────────────────────
     9. COUNTDOWN
  ─────────────────────────────────────── */
  const cdD = document.getElementById('cdD');
  const cdH = document.getElementById('cdH');
  const cdM = document.getElementById('cdM');
  const cdS = document.getElementById('cdS');
  const evEl = document.getElementById('eventDate');

  if (cdD && evEl) {
    const eventDate = new Date(evEl.value + 'T20:00:00');
    const fmt = n => String(n).padStart(2, '0');

    function tick(el, val) {
      if (el.textContent !== val) {
        el.textContent = val;
        el.classList.remove('tick');
        void el.offsetWidth;
        el.classList.add('tick');
      }
    }

    function updateCd() {
      let diff = Math.max(0, eventDate - new Date());
      tick(cdD, fmt(Math.floor(diff / 86400000)));
      diff %= 86400000;
      tick(cdH, fmt(Math.floor(diff / 3600000)));
      diff %= 3600000;
      tick(cdM, fmt(Math.floor(diff / 60000)));
      diff %= 60000;
      tick(cdS, fmt(Math.floor(diff / 1000)));
    }
    updateCd();
    setInterval(updateCd, 1000);
  }

  /* ───────────────────────────────────────
     10. MAGNETIC BUTTONS
  ─────────────────────────────────────── */
  if (window.matchMedia('(pointer: fine)').matches) {
    document.querySelectorAll('.btn-primary.btn-lg, .btn-outline').forEach(btn => {
      btn.addEventListener('mousemove', (e) => {
        const r = btn.getBoundingClientRect();
        const x = (e.clientX - r.left - r.width  / 2) * 0.1;
        const y = (e.clientY - r.top  - r.height / 2) * 0.12;
        btn.style.transform = `translateY(-2px) translate(${x}px,${y}px)`;
      });
      btn.addEventListener('mouseleave', () => { btn.style.transform = ''; });
    });

    /* ── Gold cursor glow ── */
    const glow = document.createElement('div');
    glow.style.cssText = `
      position:fixed;pointer-events:none;z-index:9997;
      width:280px;height:280px;border-radius:50%;
      background:radial-gradient(circle, rgba(212,175,55,.07) 0%, transparent 70%);
      transform:translate(-50%,-50%);
      transition:left .12s ease,top .12s ease;
    `;
    document.body.appendChild(glow);
    document.addEventListener('mousemove', e => {
      glow.style.left = e.clientX + 'px';
      glow.style.top  = e.clientY + 'px';
    });
  }

  /* ───────────────────────────────────────
     11. MARQUEE pause on hover
  ─────────────────────────────────────── */
  const track = document.querySelector('.marquee-track');
  if (track) {
    track.addEventListener('mouseenter', () => track.style.animationPlayState = 'paused');
    track.addEventListener('mouseleave', () => track.style.animationPlayState = 'running');
  }

  /* ───────────────────────────────────────
     12. MOBILE NAV links close on click
  ─────────────────────────────────────── */
  document.querySelectorAll('#mobile-nav a').forEach(a => {
    a.addEventListener('click', () => {
      document.getElementById('mobile-nav').classList.remove('open');
    });
  });

  /* ───────────────────────────────────────
     13. STATS number count-up animation
  ─────────────────────────────────────── */
  function countUp(el, target, duration = 1500) {
    const start = performance.now();
    const isPercent = el.querySelector('span')?.textContent.includes('%');
    const update = (now) => {
      const p = Math.min((now - start) / duration, 1);
      const ease = 1 - Math.pow(1 - p, 3); // ease-out cubic
      const current = Math.round(ease * target);
      // update just the text node (number), keep the <span>
      const span = el.querySelector('span');
      el.childNodes.forEach(n => { if (n.nodeType === 3) n.textContent = current; });
      if (p < 1) requestAnimationFrame(update);
    };
    requestAnimationFrame(update);
  }

  // Trigger count-up when hero stats enter view
  const statsObs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.querySelectorAll('.hstat-num').forEach(el => {
          const raw = el.textContent.replace(/[^0-9]/g, '');
          const target = parseInt(raw);
          if (!isNaN(target)) countUp(el, target, 1200);
        });
        statsObs.unobserve(e.target);
      }
    });
  }, { threshold: 0.5 });

  const heroStats = document.querySelector('.hero-stats');
  if (heroStats) statsObs.observe(heroStats);

  // Initial parallax call
  handleParallax(window.scrollY);

});

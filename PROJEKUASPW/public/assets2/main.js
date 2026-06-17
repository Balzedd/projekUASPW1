
// Countdown Timer — target: 28 Jul 2026
function runCountdown(){
  const target = new Date('2026-07-28T13:00:00+07:00').getTime();
  function tick(){
    const now = Date.now();
    const diff = target - now;
    if(diff <= 0){
      ['cdD','cdH','cdM','cdS'].forEach(id=>document.getElementById(id).textContent='00');
      return;
    }
    const d = Math.floor(diff/86400000);
    const h = Math.floor((diff%86400000)/3600000);
    const m = Math.floor((diff%3600000)/60000);
    const s = Math.floor((diff%60000)/1000);
    document.getElementById('cdD').textContent = String(d).padStart(2,'0');
    document.getElementById('cdH').textContent = String(h).padStart(2,'0');
    document.getElementById('cdM').textContent = String(m).padStart(2,'0');
    document.getElementById('cdS').textContent = String(s).padStart(2,'0');
  }
  tick();
  setInterval(tick,1000);
}
runCountdown();

// Filter events
function filterEv(cat, btn){
  document.querySelectorAll('.filtbtn').forEach(b=>b.classList.remove('active'));
  btn.classList.add('active');
  document.querySelectorAll('.ecard').forEach(c=>{
    if(cat==='all'||c.dataset.cat===cat){c.style.display='';} else {c.style.display='none';}
  });
}

// Filter categories (section)
function filterEvents(cat, el){
  document.querySelectorAll('.catcard').forEach(c=>c.classList.remove('active'));
  el.classList.add('active');
  document.querySelectorAll('.ecard').forEach(c=>{
    if(cat==='all'||c.dataset.cat===cat){c.style.display='';} else {c.style.display='none';}
  });
  document.getElementById('events').scrollIntoView({behavior:'smooth'});
}

// Ticket type selection
document.querySelectorAll('.ttype').forEach(t=>{
  t.addEventListener('click',function(){
    document.querySelectorAll('.ttype').forEach(tt=>tt.classList.remove('selected'));
    this.classList.add('selected');
  });
});

// Newsletter
function submitNL(){
  const v = document.getElementById('nlEmail').value.trim();
  if(!v||!v.includes('@')) return;
  const ok = document.getElementById('nlOk');
  ok.style.display='flex';
  document.getElementById('nlEmail').value='';
  setTimeout(()=>ok.style.display='none',4000);
}

// Contact
function submitContact(){
  const ok = document.getElementById('ctcOk');
  ok.style.display='flex';
  setTimeout(()=>ok.style.display='none',4000);
}

// Back to top
window.addEventListener('scroll',()=>{
  const btt = document.getElementById('btt');
  btt.style.display = window.scrollY>400?'flex':'none';
});

// Navbar active link on scroll
window.addEventListener('scroll',()=>{
  const sections = document.querySelectorAll('section[id]');
  let cur='';
  sections.forEach(s=>{
    if(window.scrollY>=s.offsetTop-80) cur=s.id;
  });
  document.querySelectorAll('.nav-links a').forEach(a=>{
    a.classList.remove('active');
    if(a.getAttribute('href')==='#'+cur) a.classList.add('active');
  });
});

function toggleProfileMenu() {
    document
        .getElementById("profileMenu")
        .classList.toggle("show");
}

window.onclick = function(event) {

    if (!event.target.closest('.profile-dropdown')) {

        let menu = document.getElementById("profileMenu");

        if (menu.classList.contains("show")) {
            menu.classList.remove("show");
        }
    }
}
(function(){"use strict";
const d=document;
const body=d.body;
const docEl=d.documentElement;
(function(){
  const btn = d.querySelector('.nav-toggle');
  const menu = d.getElementById('primary-nav');
  if(!btn || !menu) return;

  const lock = on => docEl.classList.toggle('no-scroll', !!on);
  const closeMenu = () => {
    menu.classList.remove('is-open');
    btn.setAttribute('aria-expanded', 'false');
    lock(false);
  };

  btn.addEventListener('click', () => {
    const open = menu.classList.toggle('is-open');
    btn.setAttribute('aria-expanded', open ? 'true' : 'false');
    lock(open);
  });

  menu.addEventListener('click', e => {
    if(e.target.closest('a')){
      closeMenu();
    }
  });

  window.addEventListener('resize', () => {
    if(window.innerWidth >= 1024){
      closeMenu();
    }
  });

  d.addEventListener('keydown', e => {
    if(e.key === 'Escape'){
      closeMenu();
    }
  });
})();
const yearEl=d.getElementById("anioFooter");if(yearEl){yearEl.textContent=String(new Date().getFullYear());}
const floatBtn=d.querySelector(".whatsapp-float");if(floatBtn){floatBtn.addEventListener("keydown",e=>{if(e.key==="Enter"||e.key===" "){floatBtn.click();}});}
const modals=d.querySelectorAll(".modal");const modalTriggers=d.querySelectorAll("[data-modal]");let lastFocused=null;function closeModal(modal){if(!modal)return;modal.setAttribute("hidden","hidden");body.classList.remove("modal-open");if(lastFocused){lastFocused.focus();}}
modalTriggers.forEach(trigger=>{const modalId=trigger.getAttribute("data-modal");const modal=d.getElementById(modalId);if(!modal)return;trigger.setAttribute("role","button");trigger.setAttribute("tabindex","0");const open=()=>{lastFocused=trigger;modal.removeAttribute("hidden");body.classList.add("modal-open");const focusable=modal.querySelector("button, [href], input, textarea");(focusable||modal).focus();};trigger.addEventListener("click",open);trigger.addEventListener("keydown",e=>{if(e.key==="Enter"||e.key===" "){e.preventDefault();open();}});modal.addEventListener("click",e=>{if(e.target===modal){closeModal(modal);}});modal.querySelectorAll("[data-close]").forEach(btn=>btn.addEventListener("click",()=>closeModal(modal)));});
d.addEventListener("keydown",e=>{if(e.key==="Escape"){modals.forEach(modal=>{if(!modal.hasAttribute("hidden")){closeModal(modal);}});}});
const filters=d.querySelectorAll(".btn-filter");const cards=d.querySelectorAll(".portfolio-card");if(filters.length&&cards.length){filters.forEach(btn=>btn.addEventListener("click",()=>{const active=btn.getAttribute("data-filter");filters.forEach(b=>b.classList.remove("active"));btn.classList.add("active");cards.forEach(card=>{const cat=card.getAttribute("data-category");if(active==="*"||cat===active){card.style.display="flex";}else{card.style.display="none";}});});}
const params=new URLSearchParams(window.location.search);const msg=params.get("msg");const status=params.get("status");const messageBox=d.getElementById("mensajeFormulario");if(messageBox&&msg){const decoded=decodeURIComponent(msg.replace(/\+/g," "));messageBox.textContent=decoded;messageBox.className=status==="success"?"success-message":"error-message";messageBox.focus?.();}
const form=d.querySelector("form.form");if(form){form.addEventListener("submit",async e=>{e.preventDefault();const formData=new FormData(form);if(form.querySelector("#empresa").value){return;}if(!form.checkValidity()){form.reportValidity();return;}try{const response=await fetch(form.action,{method:"POST",headers:{"Accept":"application/json"},body:new URLSearchParams(Array.from(formData.entries()))});const data=await response.json();mostrarMensaje(data.success,data.message);if(data.success){form.reset();}}catch(error){mostrarMensaje(false,"No se pudo enviar el mensaje. Intenta más tarde.");}});}function mostrarMensaje(exito,texto){const box=d.getElementById("mensajeFormulario");if(!box)return;box.textContent=texto;box.className=exito?"success-message":"error-message";box.setAttribute("role","status");box.focus?.();}
})();

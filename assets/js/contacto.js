document.addEventListener('DOMContentLoaded', () =>{
  const form = document.querySelector('#contacto-form');
  const status = document.querySelector('#form-status');
  if(!form || !status) return;

  form.addEventListener('submit', async (event) =>{
    event.preventDefault();
    status.textContent = 'Enviando...';
    const btn = form.querySelector('button[type="submit"]');
    if(btn) btn.disabled = true;

    try{
      const response = await fetch(form.action, { method:'POST', body: new FormData(form) });
      const data = await response.json();
      status.textContent = data.message || 'Listo.';
      if(data.ok) form.reset();
    }catch(error){
      status.textContent = 'Error de red. Intenta de nuevo.';
    }finally{
      if(btn) btn.disabled = false;
    }
  });
});

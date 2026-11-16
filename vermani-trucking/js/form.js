document.querySelectorAll('form[data-ajax]').forEach(f=>f.addEventListener('submit',async e=>{
e.preventDefault();const m=f.querySelector('.msg');m.className='msg';
if(!f.checkValidity()){f.reportValidity();return}
const btn=f.querySelector('button');btn.disabled=true;
try{const r=await fetch('contact.php',{method:'POST',body:new FormData(f)});const j=await r.json();
if(r.ok&&j.ok){m.className='msg ok';m.textContent='Thank you. Your message has been sent. We will contact you shortly.';f.reset()}
else throw 0}catch(_){m.className='msg er';m.textContent='Your message could not be sent. Please call 1-833-837-6264 or try again.'}
btn.disabled=false}));

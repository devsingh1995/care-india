const n=document.querySelector('nav'),b=document.querySelector('.burger'),t=document.getElementById('top');
b.onclick=()=>{const o=n.classList.toggle('open');b.setAttribute('aria-expanded',o)};
n.querySelectorAll('a').forEach(a=>a.onclick=()=>n.classList.remove('open'));
addEventListener('scroll',()=>t.style.display=scrollY>500?'block':'none');
t.onclick=()=>scrollTo({top:0});

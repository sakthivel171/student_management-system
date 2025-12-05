import './bootstrap';
setTimeout(() => {
    document.querySelectorAll('.alert-auto-hide').forEach(el => {
        el.style.display = 'none';
    });
}, 3000); 

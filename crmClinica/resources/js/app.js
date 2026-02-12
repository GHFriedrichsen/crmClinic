import './bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';
import 'bootstrap-icons/font/bootstrap-icons.css';

document.addEventListener('DOMContentLoaded', () => {
    const btnMenu = document.getElementById('toggle-sidebar'); // ID do seu botão na Navbar
    const layout = document.getElementById('app-layout');       // ID da div pai no Master

    if (btnMenu && layout) {
        btnMenu.addEventListener('click', () => {
            layout.classList.toggle('sidebar-collapsed');
            
            // Opcional: Salvar a preferência do usuário no navegador
            const isCollapsed = layout.classList.contains('sidebar-collapsed');
            localStorage.setItem('sidebarState', isCollapsed ? 'collapsed' : 'open');
        });
    }
});
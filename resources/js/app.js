import './bootstrap';

// Modal control
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('productModal');
    const openBtn = document.getElementById('openModalBtn');
    const closeBtn = document.getElementById('closeModalBtn');
    const cancelBtn = document.getElementById('cancelBtn');

    // Abrir modal
    if (openBtn) {
        openBtn.addEventListener('click', function() {
            modal.classList.add('active');
        });
    }

    // Fechar modal
    function closeModal() {
        modal.classList.remove('active');
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', closeModal);
    }

    if (cancelBtn) {
        cancelBtn.addEventListener('click', closeModal);
    }

    // Fechar modal ao clicar fora
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModal();
        }
    });

    // Fechar modal com ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.classList.contains('active')) {
            closeModal();
        }
    });

    // Auto-fechar alertas de sucesso após 5 segundos
    const alerts = document.querySelectorAll('.alert-success');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.animation = 'slideUp 0.3s ease';
            setTimeout(() => alert.remove(), 300);
        }, 5000);
    });
});

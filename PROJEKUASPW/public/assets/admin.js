// ════════════════════════════════════════════════════
// CUSTOM MODAL FUNCTIONS
// ════════════════════════════════════════════════════

(function() {
    'use strict';

    let deleteId = null;

    // ─── Show Delete Modal ───
    window.showDeleteModal = function(id, name) {
        deleteId = id;
        const messageEl = document.getElementById('deleteMessage');
        if (messageEl) {
            messageEl.innerHTML = `Apakah Anda yakin ingin menghapus transaksi dari <strong>${name}</strong>?`;
        }
        const modal = document.getElementById('deleteModal');
        if (modal) {
            modal.style.display = 'flex';
            document.body.classList.add('modal-open');
        }
    };

    // ─── Close Delete Modal ───
    window.closeDeleteModal = function() {
        const modal = document.getElementById('deleteModal');
        if (modal) {
            modal.style.display = 'none';
        }
        deleteId = null;
        document.body.classList.remove('modal-open');
    };

    // ─── Confirm Delete ───
    window.confirmDelete = function() {
        if (deleteId) {
            const form = document.getElementById(`delete-form-${deleteId}`);
            if (form) {
                form.submit();
            }
        }
    };

    // ─── Close Success Modal ───
    window.closeModal = function() {
        const modal = document.getElementById('successModal');
        if (modal) {
            modal.style.display = 'none';
            document.body.classList.remove('modal-open');
        }
    };

    // ─── Close modal on outside click ───
    document.addEventListener('DOMContentLoaded', function() {
        const deleteModal = document.getElementById('deleteModal');
        if (deleteModal) {
            deleteModal.addEventListener('click', function(e) {
                if (e.target === this) {
                    window.closeDeleteModal();
                }
            });
        }

        // ─── Auto close success modal after 3 seconds ───
        const successModal = document.getElementById('successModal');
        if (successModal && successModal.style.display !== 'none') {
            document.body.classList.add('modal-open');
            setTimeout(function() {
                window.closeModal();
            }, 3000);
        }

        // ─── Close modal with ESC key ───
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                window.closeDeleteModal();
                window.closeModal();
            }
        });
    });

})();
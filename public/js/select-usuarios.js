const btnActivarEliminar = document.getElementById('btn-activar-eliminar');
    const lista = document.getElementById('usuarios-list');
    const btnEliminar = document.getElementById('btn-eliminar-seleccionados');

    btnActivarEliminar.addEventListener('click', (e) => {
        e.preventDefault();

        btnEliminar.style.display = btnEliminar.style.display === 'none' ? 'inline-block' : 'none';

        lista.querySelectorAll('li').forEach(li => {
            if (li.querySelector('input[type="checkbox"]')) {
                li.querySelector('input[type="checkbox"]').remove();
            } else {
                const checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.name = 'usuarios[]';
                checkbox.value = li.dataset.id;
                li.prepend(checkbox);
            }
        });
    });
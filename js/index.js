function buscar(){
    const buscador = document.getElementById('buscador');
    if(buscador.value){
        fetch(`/index.php?nombre=${buscador.value}`)
        window.location.href = `index.php?nombre=${buscador.value}`;
    }else{
        fetch(`/index.php`)
        window.location.href = `index.php`;
    }
}

document.getElementById('buscador').addEventListener('keypress', e => {
    if (e.keyCode == 13) {
        buscar();
    }
});

document.getElementById('agregar').addEventListener('click', e => {
    window.location.href = `admin/pokemon.php`;
});

$('.btn__borrar').on('click',(e) => {
    e.preventDefault();
    $('.btn__borrar').removeClass('confirm-delete')
    e.currentTarget.classList.add('confirm-delete')
    var id = $('.confirm-delete').data('id');
    $('#modalBorrar').data('id', id).modal('show');
});

$('#modalBorrar').on('show.bs.modal', function() {
    var tit = $('.confirm-delete').data('nombre');

    $('#modalBorrar .modal-body p').html("Desea eliminar al pokemon " + '<b>' + tit +'</b>' + ' ?');
    var id = $(this).data('id')
});


$('#confirmar_delete').click(function() {
    var id = $('#modalBorrar').data('id');

    fetch(`http://localhost:8080/pokedex/API/deletePokemon.php`,
        {
            method: 'POST',
            body: JSON.stringify({id}),
            headers: {
                'Accept': 'application/json'
            }
        })
        .then(function(response) {
            return response.json().then(function(data) {
                console.log(data)
                console.log(data.ok)
                if (data.ok) {
                    window.location.href = `index.php`;
                } else {
                    document.getElementById('error').classList.toggle('d-none');
                }
            });
        })
        .catch(console.error);

    $('#modalBorrar').modal('hide');

});
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="sweetalert2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>




<script>
    $(document).ready(function() {
    $('#bitacora').DataTable();
    $('#reserva').DataTable();
    $('productos').DataTable();
    $('#usuario').DataTable();
    $('#example').DataTable();
} );

    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        M.Sidenav.init(elems, {});

        var elemDate = document.querySelectorAll('.datepicker');
        M.Datepicker.init(elemDate, {
            format: 'yyyy-mm-dd'
        });

        var elemSelect = document.querySelectorAll('select');
        M.FormSelect.init(elemSelect, {});
    });

    function showProgress(){
        var elem = document.getElementById('modal-wait');
        M.Modal.init(elem, {
            'dismissible' : false,
            'opacity' : 0.2
        });
        var instance = M.Modal.getInstance(elem);
        instance.open();
}

}

</script>

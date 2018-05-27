
$(function () {
	$('#datatable').DataTable({
      	'paging'      : true,
      	'lengthChange': false,
      	'searching'   : true,
      	'ordering'    : true,
      	'info'        : false,
      	'autoWidth'   : false,
      	'order': [[ 0, 'desc' ]],
      	'language': {
            'emptyTable': 'No hay datos registrados',
            'search': 'Buscar',
            'paginate': {
		        'first':      'Primero',
		        'last':       'Ultimo',
		        'next':       'Siguiente',
		        'previous':   'Anterior'
		    }

        }
    })
})	
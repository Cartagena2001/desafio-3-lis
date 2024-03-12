<table id="registros" class="display table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Monto</th>
            <th>Fecha</th>
            <th>Categoria Registro</th>
            <th>Tipo Registro</th>
            <th>Usuario</th>
            <th>Ver Factura</th>
        </tr>
    </thead>
    <tbody>
        <tr>

        </tr>
    </tbody>
</table>
<?php echo $this->section('scripts') ?>
<script>
    new DataTable('#registros', {
        ajax: `${hostUrl}api/dashboard/registro/getRegistros`,
        columns: [{
                data: 'monto'
            },
            {
                data: 'fecha'
            },
            {
                data: 'categoria_registro'
            },
            {
                data: 'tipo_registro',
                render: function(data, type, row) {
                    if (data == 'Salida') {
                        return '<span class="badge bg-warning">' + data + '</span>';
                    } else {
                        return '<span class="badge bg-success">' + data + '</span>';
                    }
                }
            },
            {
                data: 'nombre_completo'
            },
            {
                data: 'factura',
                render: function(data, type, row) {
                    return '<a href="' + hostUrl + 'assets/media/facturas/' + data + '" target="_blank">Ver Factura</a>';
                }
            }
        ],
        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando la pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    });
</script>
<?php echo $this->endSection() ?>
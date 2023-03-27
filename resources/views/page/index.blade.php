@extends('principal')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Clientes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Cliente v1</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body border m-2">
                    <h4 class="card-title">
                        <button class="btn btn-sm btn-success create" id="submit">Nuevo Cliente</button>
                    </h4>
                </div>
                <div class="card-body border">
                    <div class="responsive">
                        <table id="datatable" class="table table-striped table-bordered nowrap" style="width:100%">
                            <thead class="table-info">
                                <tr>
                                    <th>#</th>
                                    <th>Nombres</th>
                                    <th>Apelldios</th>
                                    <th>Zona</th>
                                    <th>DNI</th>
                                    <th>Estado Civil</th>
                                    <th>Fecha Nacimiento</th>
                                    <th>Teléfono</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <div 
            class="modal fade" 
            id="form_object" 
            tabindex="-1" 
            role="dialog" 
            aria-labelledby="modelTitleId" 
            data-backdrop="static" 
            data-keyboard="false"
        >
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title-modal"></h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input type="text" oninput="handleInputChange(event)" class="form-control" id="nombres" name="nombres" placeholder="Escriba su nombre">
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" oninput="handleInputChange(event)" class="form-control" id="apellidos" name="apellidos">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="zona">Zona</label>
                            <input type="text" oninput="handleInputChange(event)" class="form-control" id="zona" name="zona">
                        </div>
                        <div class="form-group">
                            <label for="dni">DNI</label>
                            <input type="text" oninput="handleInputChange(event)" class="form-control" id="dni" name="dni">
                        </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="estado_civil">Estado Civil</label>
                                <select oninput="handleInputChange(event)" class="form-control" id="estado_civil" name="estado_civil">
                                    <option value="">Seleccione una opcion</option>
                                    <option value="soltero">Soltero/a</option>
                                    <option value="casado">Casado/a</option>
                                    <option value="divorciado">Divorciado/a</option>
                                    <option value="viudo">Viudo/a</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                            <input type="date" oninput="handleInputChange(event)" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" oninput="handleInputChange(event)" class="form-control" id="telefono" name="telefono">
                        </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="close" type="button" class="btn btn-danger">Cancelar</button>
                    <button id="save" type="button" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    @push('cliente-component')
        {{-- Inicializacion DataTable --}}
        <script>
            $(() => {
                var table = $('#datatable').DataTable({
                    "ajax" : "{{route('cliente.baja')}}",
                    "columns" : [
                        {data : 'id'},
                        {data: 'nombres'},
                        {data: 'apellidos'},
                        {data: 'zona'},
                        {data: 'dni'},
                        {data: 'estado_civil'},
                        {data: 'fecha_nacimiento'},
                        {data: 'telefono'},
                        {data: 'action' , ordenable :false}
                    ],
                    "responsive": true,
                    // "scrollX": true,
                    "language": {
                        "search": '',
                        "lengthMenu": "_MENU_",
                        "zeroRecords": "No se encontraron registros",
                        "info": "",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(filtrados de _MAX_ registros totales)",
                    },
                    // "pagingType": "scrolling",
                    // "searching" : true,
                    "initComplete": function(settings, json) {
                        $(this.api().table().container()).addClass('table table-striped');
                        
                        var search = $(this).closest('.dataTables_wrapper').find('input[type="search"]');
                        search.attr('placeholder', 'Buscar');
                        search.attr('class','form-control form-control-sm');

                        var select = $(this).closest('.dataTables_wrapper').find('.dataTables_length select');
                            select.addClass('form-control form-control-sm');

                    },
                    // "columnDefs": [
                    //     { "width": "10%", "targets": 0 },
                    //     { "width": "10%", "targets": 1 },
                    //     { "width": "10%", "targets": 2 },
                    //     { "width": "10%", "targets": 3 },
                    //     { "width": "10%", "targets": 4 },
                    //     { "width": "40%", "targets": 5 },
                    //     { "width": "40%", "targets": 6 },
                    //     { "width": "40%", "targets": 7 },
                    //     { "width": "10%", "targets": 8 },
                    // ],
                    "autoWidth": true,
                    "headerCallback": function(thead, data, start, end, display) {
                        $(thead).find('th').css('border-bottom', '2px solid #ddd');
                        $(thead).find('th').css('background-color', '#f8f8f8');
                    }
                });
            });
        </script>

        {{-- Delete Object DataTable --}}
        <script>
            $(()=>{
                $(document).on('click','.delete',()=>{
                    let  id = $(".delete").attr("id");
                    Swal.fire({
                        title: 'Cancelar?',
                        text: `¿Quieres eliminar el registro con ID ${id}?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si!',
                        cancelButtonText : 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            let data = { "id" : id};
                            
                            fetch('/cliente/destroy', {
                                method: 'POST',
                                body: JSON.stringify(data),
                                headers: {
                                    'Content-type': 'application/json; charset=UTF-8',
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                Swal.fire({
                                    title :  'Eliminacion!',
                                    text  :  data.message,
                                    icon  : 'success',
                                    timer : 3000
                                });
                                $("#datatable").DataTable().ajax.reload();
                            })
                            .catch(error => {
                                console.error(error)
                            });
                        }
                    });
                });
            });
        </script>

        {{-- Add and Update Object DataTable --}}
        <script>
            let isEdit = false;

            let dataUpdate = {
                id : null,
                nombres : null,
                apellidos : null,
                zona : null,
                telefono: null,
                fecha_nacimiento : null,
                estado_civil : null,
                dni : null
            };

            // open modal - loading data 
            $(document).on('click','.update',()=>{
                let response = $(".update").attr("id");
                let cliente = JSON.parse(response); 
                $("#title-modal").text("Editar el cliente #"+cliente.id);
                $("#form_object").modal('show');
                dataUpdate = {...cliente};
                loadingCliente();
            });

            // open modal 
            $(document).on('click','.create',()=>{
                $("#title-modal").text("Crear un cliente");
                $("#form_object").modal('show');
            });

            // loading data
            function loadingCliente(){
                const cliente = {...dataUpdate};
                isEdit = true;

                $("#nombres").val(cliente.nombres);
                $("#apellidos").val(cliente.apellidos);
                $("#zona").val(cliente.zona);
                $("#telefono").val(cliente.telefono);
                $("#fecha_nacimiento").val(cliente.fecha_nacimiento);
                $("#estado_civil").val(cliente.estado_civil);
                $("#dni").val(cliente.dni);
            }

            // Close Modal
            $("#close").click(()=>{
                $("#form_object").modal("hide");
            });

            // save Object
            $("#save").click(()=>{
                if (isEdit) {
                    fetch('/cliente/update', {
                        method: 'POST',
                        body: JSON.stringify(dataUpdate),
                        headers: {
                            'Content-type': 'application/json; charset=UTF-8',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        Swal.fire({
                            title :  'Edición!',
                            text  :  data.message,
                            icon  : 'success',
                            timer : 3000
                        });
                        $("#datatable").DataTable().ajax.reload();
                        $("#form_object").modal("hide");
                    })
                    .catch(error => {
                        console.error(error)
                    });
                }else{
                    fetch('/cliente/save', {
                        method: 'POST',
                        body: JSON.stringify(dataUpdate),
                        headers: {
                            'Content-type': 'application/json; charset=UTF-8',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        Swal.fire({
                            title :  'Edición!',
                            text  :  data.message,
                            icon  : 'success',
                            timer : 3000
                        });
                        $("#datatable").DataTable().ajax.reload();
                        $("#form_object").modal("hide");
                    })
                    .catch(error => {
                        console.error(error)
                    });
                }
            });

            // change field
            function handleInputChange(event){
                const dataClone = {...dataUpdate};
                dataClone[event.target.name] = event.target.value;
                dataUpdate = {...dataClone};
            }

            // reset data 
            function resetData(){
                dataUpdate = {
                    id : null,
                    nombres : null,
                    apellidos : null,
                    zona : null,
                    telefono: null,
                    fecha_nacimiento : null,
                    estado_civil : null,
                    dni : null
                };
            }
        </script>
    @endpush
@endsection
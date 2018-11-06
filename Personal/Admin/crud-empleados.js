$('table').dataTable();
viewData();
$('#update').prop("disabled",true);

function viewData(){
    $.get('Crud-empleados-neg.php', function(data){
        $('tbody').html(data)
    })
}

function saveData(){
    var Vidempleado = $('#idempleado').val()
    var Vnombre = $('#nombre').val()
    var Vapellido = $('#apellido').val()
    var Vtipodoc = $('#selectipodoc').val()
    var Vdoc = $('#documento').val()
    var Vdireccion = $('#direccion').val()
    var Vemail = $('#email').val()
    var Vtelefono = $('#telefono').val()
    var Vrol = $('#selecrol').val()
    var Vgenero = $('#selecgenero').val()
    $.post('Crud-empleados-neg.php?p=add',{idemple:Vidempleado, nombre:Vnombre, apellido:Vapellido, tipodoc:Vtipodoc, doc:Vdoc, direccion:Vdireccion, email:Vemail, telefono:Vtelefono, rol:Vrol, genero:Vgenero}, function(data){
        viewData()
        $('#idempleado').val(' ')
        $('#nombre').val(' ')
        $('#apellido').val(' ')
        $('#selectipodoc').val(' ')
        $('#documento').val(' ')
        $('#direccion').val(' ')
        $('#email').val(' ')
        $('#telefono').val(' ')
        $('#selecrol').val(' ')
        $('#selecgenero').val(' ')
    })
}

function editData(Vidempleado,Vnombre,Vapellido,Vdoc,Vdireccion,Vemail,Vtelefono,Vtipodoc,Vrol,Vgenero) {
    $('#idempleado').val(Vidempleado)
    $('#nombre').val(Vnombre)
    $('#apellido').val(Vapellido)
    $('#documento').val(Vdoc)
    $('#direccion').val(Vdireccion)
    $('#email').val(Vemail)
    $('#telefono').val(Vtelefono)
    $('#selectipodoc').val(Vtipodoc)
    $('#selecrol').val(Vrol)
    $('#selecgenero').val(Vgenero)

    $('#idempleado').prop("readonly",true);
    $('#save').prop("disabled",true);
    $('#update').prop("disabled",false);
}

function updateData(){
    var Vidempleado = $('#idempleado').val()
    var Vnombre = $('#nombre').val()
    var Vapellido = $('#apellido').val()
    var Vtipodoc = $('#selectipodoc').val()
    var Vdoc = $('#documento').val()
    var Vdireccion = $('#direccion').val()
    var Vemail = $('#email').val()
    var Vtelefono = $('#telefono').val()
    var Vrol = $('#selecrol').val()
    var Vgenero = $('#selecgenero').val()
    $.post('Crud-empleados-neg.php?p=update', {idemple:Vidempleado, nombre:Vnombre, apellido:Vapellido, tipodoc:Vtipodoc, doc:Vdoc, direccion:Vdireccion, email:Vemail, telefono:Vtelefono, rol:Vrol, genero:Vgenero}, function(data){
        viewData()
        $('#idempleado').val('')
        $('#nombre').val('')
        $('#apellido').val('')
        $('#documento').val('')
        $('#direccion').val('')
        $('#email').val('')
        $('#telefono').val('')
        $('#selectipodoc').val('')
        $('#selecrol').val('')
        $('#selecgenero').val('')

        $('#idempleado').prop("readonly",false);
        $('#save').prop("disabled",false);
        $('#update').prop("disabled",true);
    })
}

function deleteData(idEmpleados){
    $.post('Crud-empleados-neg.php?p=delete', {idEmpleados:idEmpleados}, function(data){
        viewData()
    })
}

function removeConfirm(idEmpleados){
    var con = confirm('Esta seguro, quiere eliminar este registro?');
    if(con=='1'){
        deleteData(idEmpleados);
    }
}
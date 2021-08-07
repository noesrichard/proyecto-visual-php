
<h1>Profesores</h1>
<table id="dg" title="Profesores" class="easyui-datagrid" style="width:100%;height:500px" url="cargar.php" toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true">
    <thead>
        <tr>
            <th field="cedula" width="20%">Cedula</th>
            <th field="nombre" width="20%">Nombre</th>
            <th field="apellido" width="20%">Apellido</th>
            <th field="telefono" width="20%">Telefono</th>
            <th field="direccion" width="20%">Direccion</th>
        </tr>
    </thead>
    
</table>
<div id="toolbar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Nuevo Profesor</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar Profesor</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Eliminar Profesor</a>
</div>

<div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
    <form id="profesores.php" method="post" novalidate style="margin:0;padding:20px 50px">
        <h3>Informacion del profesor</h3>
        <div style="margin-bottom:10px">
            <input id="input-username" name="username" class="easyui-textbox" required="true" label="Nombre de Usuario" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input id="input-username" name="password" class="easyui-textbox" required="true" label="Contrase: " style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input id="input-cedula" name="cedula" class="easyui-textbox" required="true" label="Cedula: " style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="nombre" class="easyui-textbox" required="true" label="Nombre: " style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="apellido" class="easyui-textbox" required="true" label="Apellido:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="telefono" class="easyui-textbox" label="Telefono:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="direccion" class="easyui-textbox" label="Direccion:" style="width:100%">
        </div>
    </form>
</div>
<div id="dlg-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Save</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
</div>
<script type="text/javascript">
    var url;

    function newUser() {
        $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'New User');
        $('#fm').form('clear');
        url = 'save_user.php';
    }

    function editUser() {
        var row = $('#dg').datagrid('getSelected');
        if (row) {
            $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Edit User');
            $('#fm').form('load', row);
            url = 'update_user.php?id=' + row.id;
        }
    }

    function saveUser() {
        var cedula = document.getElementById("input-cedula").value;
        $('#fm').form('submit', {
            url: "profesores.php",
            iframe: false,
            onSubmit: function() {
                return $(this).form('validate');
            },
            success: function(result) {
                var result = eval('(' + result + ')');
                if (result.errorMsg) {
                    $.messager.show({
                        title: 'Error',
                        msg: result.errorMsg
                    });
                } else {
                    $('#dlg').dialog('close'); // close the dialog
                    document.getElementById("dg").innerHTML +=
                        `
                        <tr>
                            <td>hola</td>
                            <td>${cedula}</td>
                            <td>hola</td>
                            <td>hola</td>
                            <td>HOla</td>
                        </tr>
                    `
                }
            }
        });
    }

    function destroyUser() {
        var row = $('#dg').datagrid('getSelected');
        if (row) {
            $.messager.confirm('Confirm', 'Are you sure you want to destroy this user?', function(r) {
                if (r) {
                    $.post('destroy_user.php', {
                        id: row.id
                    }, function(result) {
                        if (result.success) {
                            $('#dg').datagrid('reload'); // reload the user data
                        } else {
                            $.messager.show({ // show error message
                                title: 'Error',
                                msg: result.errorMsg
                            });
                        }
                    }, 'json');
                }
            });
        }
    }
</script>
<?php
if ($_POST && isset($_POST["username"])) {
    $controller->crearProfesor($_POST["username"], $_POST["password"], 1, $_POST["cedula"], $_POST["nombre"], $_POST["apellido"], $_POST["telefono"], $_POST["direccion"]);
}
?>
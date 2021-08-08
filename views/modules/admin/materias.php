<h2>Materias</h2>

<table id="dg" title="Materias" class="easyui-datagrid" style="width:100%;height:500px" url="cargar.php?entidad=materia" toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true">
    <thead>
        <tr>
            <th field="id" width="50">ID</th>
            <th field="nombre" width="50">Nombre</th>
            <th field="descripcion" width="50">Descripcion</th>
            <th field="cedula_profesor" width="50">Profesor</th>
        </tr>
    </thead>
</table>
<div id="toolbar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Nuevo Materia</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar Materia</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Eliminar Materia</a>
</div>

<div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
    <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
        <h3>Informacion</h3>
        <div style="margin-bottom:10px">
            <input name="id" class="easyui-textbox" required="true" label="Id:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="nombre" class="easyui-textbox" required="true" label="Nombre:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="descripcion" class="easyui-textbox" required="true" label="Descripcion:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="cedula_profesor" class="easyui-textbox" required="true" label="Cedula Profesor:" style="width:100%">
        </div>
       
    </form>
</div>
<div id="dlg-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
</div>
<script type="text/javascript">
    var url;

    function newUser() {
        $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Nuevo Materia');
        $('#fm').form('clear');
        url = 'crear.php?entidad=materia';
    }

    function editUser() {
        var row = $('#dg').datagrid('getSelected');
        if (row) {
            $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Editar Materia');
            $('#fm').form('load', row);
            url = 'actualizar.php?entidad=materia';
        }
    }

    function saveUser() {
        $('#fm').form('submit', {
            url: url,
            iframe: false,
            onSubmit: function() {
                return $(this).form('validate');
            },
            success: function(result) {
                var result = eval('(' + result + ')');
                console.log(result);
                if (result.errorMsg) {
                    $.messager.show({
                        title: 'Error',
                        msg: result.errorMsg
                    });
                } else {
                    $('#dlg').dialog('close'); // close the dialog
                    $('#dg').datagrid('reload'); // reload the user data
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
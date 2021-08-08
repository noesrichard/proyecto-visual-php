<?php
    require_once "repo/RepoMateria.php"; 
    $repo = new RepoMateria(); 
    $materias = $repo->getMateriasPorProfesor($_SESSION["username"]); 
?>
<head>
    <link rel="stylesheet" href="css/notas.css">
</head>
<aside class="notas">
    <ul>
        <?php foreach($materias as $materia){ 
            echo('<li><a class="nombre-materia" onclick="cargarTablaMateria(\''.$materia['id'].'\')">'.$materia["nombre"].'</a></li>');
        }
        ?>
    </ul>
    <!-- onclick="cargarTablaMateria('.$materia['id'].')-->
</aside>
<script>
    function cargarTablaMateria(idMateria){ 
        $('#dg').datagrid({ 
            url: "cargar.php?materia="+idMateria
        });    
    }
</script>
<section>
    <table id="dg" title="My Users" class="easyui-datagrid" style="width:78%;height:500px"
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="cedula_alumno" width="50">Cedula</th>
                <th field="nombre_alumno" width="50">Nombre</th>
                <th field="apellido_alumno" width="50">Apellido</th>
                <th field="nota_uno" width="50">Nota Uno</th>
                <th field="nota_dos" width="50">Nota Dos</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">New User</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Edit User</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Remove User</a>
    </div>
    
    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            <h3>User Information</h3>
            <div style="margin-bottom:10px">
                <input name="cedula_alumno" class="easyui-textbox" required="true" label="Cedula: " style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="nota_uno" class="easyui-textbox" required="true" label="Nota Uno: " style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="nota_dos" class="easyui-textbox"  label="Nota Dos: " style="width:100%">
            </div>
            
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Save</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
    </div>
    <script type="text/javascript">
        var url;
        function newUser(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','New User');
            $('#fm').form('clear');
            url = 'save_user.php';
        }
        function editUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Edit User');
                $('#fm').form('load',row);
                url = 'update_user.php?id='+row.id;
            }
        }
        function saveUser(){
            $('#fm').form('submit',{
                url: url,
                iframe: false,
                onSubmit: function(){
                    return $(this).form('validate');
                },
                success: function(result){
                    var result = eval('('+result+')');
                    if (result.errorMsg){
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $('#dlg').dialog('close');        // close the dialog
                        $('#dg').datagrid('reload');    // reload the user data
                    }
                }
            });
        }
        function destroyUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $.messager.confirm('Confirm','Are you sure you want to destroy this user?',function(r){
                    if (r){
                        $.post('destroy_user.php',{id:row.id},function(result){
                            if (result.success){
                                $('#dg').datagrid('reload');    // reload the user data
                            } else {
                                $.messager.show({    // show error message
                                    title: 'Error',
                                    msg: result.errorMsg
                                });
                            }
                        },'json');
                    }
                });
            }
        }
    </script>
</section>
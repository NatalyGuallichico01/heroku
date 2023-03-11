<div class="campo">
    
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre"  value="<?php echo s($usuario->nombre);?>"/>
    </div>

    <div class="campo">
        <label for="apellido">Apellido: </label>
        <input type="text" id="apellido" name="apellido" placeholder="Ingresa tu apellido"  value="<?php echo s($usuario->apellido);?>"/>
    </div>

    <div class="campo">
        <label for="telefono">Teléfono: </label>
        <input type="telefono" id="telefono" name="telefono" placeholder="Ingresa tu teléfono"  value="<?php echo s($usuario->telefono);?>"/>
    </div>

    <!-- <div class="campo">
        <label for="rol">Rol: </label>
        <input type="email" id="email" name="email" placeholder="Ingresa tu rol"  value="<?php //echo s($usuario->admin);?>"/>
    </div> -->
    <div class="campo">
        <label for="rol">Rol: </label>
        <!-- <input type="email" id="email" name="email" placeholder="Ingresa tu rol"  value="<?php //echo s($usuario->admin);?>"/> -->
        <select name="admin" id="admin">
            <option value="0">Cliente</option>
            <option value="1">Administrador</option>
        </select>
    </div>

    <div class="campo">
        <label for="email">E-mail: </label>
        <input type="email" id="email" name="email" placeholder="Ingresa tu e-mail"  value="<?php echo s($usuario->email);?>"/>
    </div>
    
    <div class="campo">
        <label for="password">Contraseña: </label>
        <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña"  value="<?php echo s($usuario->password);?>"/>
    </div>

    
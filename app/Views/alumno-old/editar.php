<section id="Agregar alumno">
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
       
            <form action="/alumno/update/<?=$alumno->id;?>" method="post">
            <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="nombre"  class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="Nombre" class="form-control" value="<?= $alumno->nombre ?>">
                </div>
                <div class="mb-3">
                    <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" value="<?= $alumno->fechaNacimiento ?>">
                </div>
                <div class="mb-3">
                    <label for="sexo" class="form-label">Sexo</label>
                    <select name="sexo" id="Sexo" class="form-control">
                        <option value="HOMBRE" <?php if($alumno->sexo=="HOMBRE") echo 'selected'; ?>>HOMBRE</option>
                        <option value="MUJER"<?php if($alumno->sexo=="MUJER") echo 'selected'; ?>> MUJER</option>
                    </select>
                </div>
                <div class="md-3">
                    <input type="submit" value="Guardar" class="btn btn-primary">
                </div>
                
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>

    
</section>
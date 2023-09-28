<section id="Agregar alumno">
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
       
            <form action="/alumno/insert" method="post">
            <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="nombre"  class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="Nombre" class="form-control" value="<?= set_value('nombre') ?>">
                </div>
                <div class="mb-3">
                    <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="sexo" class="form-label">Sexo</label>
                    <select name="sexo" id="Sexo" class="form-control">
                        <option value="HOMBRE">HOMBRE</option>
                        <option value="MUJER">MUJER</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="sexo" class="form-label">Carrera</label>
                    <select name="sexo" id="Sexo" class="form-control">
                        <?php foreach($carreras as $carrera) :?>
                        <option value="HOMBRE"><?= $carrera->nombre ?></option>
                        <?php endforeach ?>
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
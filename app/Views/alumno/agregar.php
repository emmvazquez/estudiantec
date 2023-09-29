<div class="container">
    <div class="row">
       
        <div class="col-8">
            <form action="<?= base_url('alumno/insert'); ?>" method="POST">
            <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre">
                </div>
                
                <div class="mb-3">
                    <label for="fechaNacimiento" class="form-label">Fecha de nacimiento </label>
                    <input type="date" class="form-control" name="fechaNacimiento" 
                    id="fechaNAcimiento">
                </div>

                <div class="mb-3">
                    <label for="sexo">Sexo</label>
                    <select name="sexo" id="sexo" class="form-control">
                        <option value="Hombre">Hombre</option>
                        <option value="Mujer">Mujer</option>
                    </select>
                </div>

                <div class="mb-3">
                    <input type="submit" class="btn btn-success">
                </div>


            </form>

        </div>
        <div class="col-3"></div>
    </div>
</div>
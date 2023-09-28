<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Subir imagen de perfil</h2>
        </div>
        
    </div>
    <div class="row">
        <div class="col-12">
        <div class="mb-3">
            
            <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>

            <?= form_open_multipart('alumno/upload') ?>
            <?= csrf_field() ?>
                <label for="formFile" class="form-label">Selecciona tu foto de perfil</label>
                <input class="form-control" type="file" id="userfile" name="userfile" >
                <input type="submit" value="upload">
            </form>
        </div>
        </div>
    </div>
</div>
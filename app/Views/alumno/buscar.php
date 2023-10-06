
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="<?=base_url('index.php/alumno/buscar/'); ?>" method="GET">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre">
                <label for="sexo">Sexo</label>
                <select name="sexo" class="form-control">
                    <option value=""></option>
                    <option value="HOMBRE">HOMBRE</option>
                    <option value="MUJER">MUJER</option>
                </select>
                <input type="submit" 
                class="btn btn-success mt-4" value="Buscar">
            </form>
        </div>
    </div>
    <?php
    if(isset($alumnos)){
        //print_r($alumnos);
    }
    ?>
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <th>Nombre</th>
                    <th>Sexo</th>
                </thead>
                <tbody>
                <?php foreach($alumnos as $alumno) : ?>
                    <tr>
                        <td><?=$alumno->nombre ?></td>
                        <td><?=$alumno->sexo ?></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
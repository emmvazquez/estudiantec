<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Alumnos</h2>
            

            <table class="table">
                <thead>
                    <th>Nombre</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Sexo</th>
                </thead>
                <tbody>
                <?php foreach($alumnos as $alumno): ?>
                    <tr>
                        <td><?=$alumno->nombre ?></td>
                        <td><?=$alumno->fechaNacimiento ?></td>
                        <td><?=$alumno->sexo ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>


        </div>
    </div>
</div>



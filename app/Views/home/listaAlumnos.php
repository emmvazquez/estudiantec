<div class="container">
    <div class="row">
        <div class="col-12">
            <?php print_r($alumnos); ?>

            <?php foreach($alumnos  as $alumno) : ?>
                <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?=$alumno->nombre ?></h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary"><?=$alumno->fechaNacimiento ?></h6>
                    <p class="card-text">
                        Sexo : <?=$alumno->sexo ?>
                        Grado : <?=$alumno->grado?>
                        Grupo : <?=$alumno->grupo ?>
                    </p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
                </div>
            <?php endforeach ?>

        </div>
    </div>
</div>
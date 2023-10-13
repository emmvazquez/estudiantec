<div class="container">
    <div class="row">
    <?php 
        if(isset($validation)){
                print $validation->listErrors();
        }
    
     ?>
        <div class="col-12">
            <form action="<?= base_url('index.php/carrera/agregar');?>"  method="POST">
            <?= csrf_field() ?>
        
            <input type="text" name="carrera" class="form-control">
            <input type="text" name="acronimo" class="form-control">
            <input type="submit" class="btn btn-success">
                  

        
        </form>
        </div>
    </div>
</div>
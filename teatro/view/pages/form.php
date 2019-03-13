<form class="mb-4 p-2" method="POST" action="<?= htmlspecialchars( $_SERVER['SCRIPT_NAME'] ) ?>">
    <p style="font-size: 14px;"><span class="text-danger">* Ingrese solo números entre 1 y 5</span></p>
    <div class="form-group row">
        <label for="row" class="col-sm-4 col-form-label">Fila</label>
        <div class="col-sm-8">
            <input name="row" type="text" class="form-control <?= $cssClassRow ?>" id="row" placeholder="Fila" maxlength="1" value="<?= $data['row'] ?>">
            <div class="invalid-feedback"><?= $data['rowError'] ?></div>
        </div>
    </div>
    <div class="form-group row">
        <label for="col" class="col-sm-4 col-form-label">Puesto</label>
        <div class="col-sm-8">
            <input name="col" type="text" class="form-control <?= $cssClassCol ?>" id="col" placeholder="Puesto" maxlength="1" value="<?= $data['col'] ?>">
            <div class="invalid-feedback"><?= $data['colError'] ?></div>
        </div>
    </div>
    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-sm-4 pt-0">Acciones</legend>
            <div class="col-sm-8">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="action" <?php if (isset($action) && $action == "R") echo "checked";?> id="reservar" value="R">
                    <label class="form-check-label" for="reservar">Reservar</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="action" <?php if (isset($action) && $action == "V") echo "checked";?> id="comprar" value="V">
                    <label class="form-check-label" for="comprar">Comprar</label>
                </div>
                <div class="form-check disabled">
                    <input class="form-check-input" type="radio" name="action" <?php if (isset($action) && $action == "L") echo "checked";?> id="liberar" value="L">
                    <label class="form-check-label" for="liberar">Liberar</label>
                </div>
                <span class="" style="font-size: 80%;color: #dc3545;"><?= $data['actionError'] ?></span>
            </div>
        </div>
    </fieldset>
    
    <textarea name="hidden" class="form-control" id="" rows="3" style="display: none;"><?php
        foreach ($dataTable as $key => $data) {
            foreach ($data as $key => $value) {
                echo $value;
            }
        }
    ?></textarea>
    <button type="submit" class="btn btn-block btn-primary">Enviar</button>   
</form>
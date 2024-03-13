<div class="modal fade" id="entrada" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Monto</label>
                        <input type="text" class="form-control" id="monto" name="monto">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Subir foto de factura</label>
                        <input type="file" class="form-control" id="factura" name="factura">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Cageoria del registro</label>
                        <select class="form-control" id="categoria" name="categoria" placeholder="Seleciona la categoria">
                            <option></option>
                            <?php foreach ($categorias as $categorias) : ?>
                                <option value="<?php echo $categorias['id'] ?>"><?php echo $categorias['categoria_registro'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label for="message-text" class="col-form-label">Tipo de registro</label>
                        <select class="form-control" id="tipo" name="tipo" placeholder="Seleciona el tipo de registro">
                            <option></option>
                            <?php foreach ($tipos as $tipos) : ?>
                                <option value="<?php echo $tipos['id'] ?>"><?php echo $tipos['tipo_registro'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saveEntrada()" id="agregar">Agregar Registro</button>
            </div>
        </div>
    </div>
</div>
<?php echo $this->section('scripts') ?>
<script src="<?php echo base_url('assets/js/custom/registro/agregarRegistro.js') ?>"></script>
<script>
    IMask(document.getElementById('monto'), {
        mask: 'num',
        blocks: {
            num: {
                mask: Number,
            }
        }
    });

    var today = new Date();
    today.setDate(today.getDate() - 1);
    var formattedDate = today.toISOString().split('T')[0];
    document.getElementById('fecha').setAttribute('max', formattedDate);
</script>
<?php echo $this->endSection() ?>
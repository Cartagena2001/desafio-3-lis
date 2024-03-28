<div class="row">
    <div class="col-md-6">
        <h3>Salidas</h3>
        <table class="display table table-striped m-5" style="max-width: 500px;">
            <thead>
                <tr>
                    <th>Categoria Registro</th>
                    <th>Monto</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($salidas as $salida) : ?>
                    <tr>
                        <td><?= $salida['categoria_registro'] ?></td>
                        <td><?= $salida['monto'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Total:</th>
                    <th><?= '$' . number_format($totalSalidas, 2) ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="col-md-6">
        <h3>Entradas</h3>
        <table class="display table table-striped m-5" style="max-width: 500px;">
            <thead>
                <tr>
                    <th>Categoria Registro</th>
                    <th>Monto</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($entradas as $entrada) : ?>
                    <tr>
                        <td><?= $entrada['categoria_registro'] ?></td>
                        <td><?= $entrada['monto'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Total:</th>
                    <th><?= '$' . number_format($totalEntradas, 2) ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

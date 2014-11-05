<table class="table">
    <tbody>
        <?php foreach ($_POST as $key => $value) { ?>
        <tr>
            <th><?= $key; ?></th>
            <td><?= $value; ?></td>
        </tr>
        <?php } ?>

        <?php if (isset($_POST['Ds_Merchant_Amount'])) { ?>
        <tr>
            <th>Total Import (Ds_Merchant_Amount)</th>
            <td><?= preg_replace('/([0-9]{2})$/', ',$1', $_POST['Ds_Merchant_Amount']); ?>&euro;</td>
        </tr>
        <?php } ?>
    </tbody>
</table>

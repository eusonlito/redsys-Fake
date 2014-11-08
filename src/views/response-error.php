<div class="alert alert-danger"><?= $error->getMessage(); ?></div>

<div class="form-group">
    <a href="<?= empty($_POST['Ds_Merchant_UrlKO']) ? getenv('HTTP_REFERER') : $_POST['Ds_Merchant_UrlKO']; ?>" class="btn btn-danger form-control">
        Back without response to server
    </a>
</div>
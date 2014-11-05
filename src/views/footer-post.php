<footer>
    <div class="well">
        Response will return to <strong>Ds_Merchant_UrlOK</strong> if success payment is selected and to <strong>Ds_Merchant_UrlKO</strong> if error is selected.
        Also a post request will be sent to <strong>Ds_Merchant_MerchantURL</strong> with payment status.
    </div>

    <form method="post">
        <?php foreach ($_POST as $key => $value) { ?>
        <input type="hidden" name="<?= $key; ?>" value="<?= htmlentities($value); ?>" />
        <?php } ?>

        <div class="row">
            <div class="col-sm-8">
                <div class="form-group">
                    <select name="Ds_Response" class="form-control" required>
                        <option value="">Value to Ds_Response code</option>

                        <?php foreach ($Fake->getMessages('^0') as $error) { ?>
                        <option value="<?= $error['code']; ?>"><?= '['.$error['code'].'] '.$error['message']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <button type="submit" name="action" value="success" class="btn btn-success form-control">
                        Response with success payment
                    </button>
                </div>
            </div>
        </div>
    </form>

    <hr />

    <form method="post">
        <?php foreach ($_POST as $key => $value) { ?>
        <input type="hidden" name="<?= $key; ?>" value="<?= htmlentities($value); ?>" />
        <?php } ?>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <select name="Ds_Response" class="form-control" required>
                        <option value="">Value to Ds_Response code response</option>

                        <?php foreach ($Fake->getMessages('^[1-9]') as $error) { ?>
                        <option value="<?= $error['code']; ?>"><?= '['.$error['code'].'] '.$error['message']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <select name="Ds_ErrorCode" class="form-control" required>
                        <option value="">Value to Ds_ErrorCode code response</option>

                        <?php foreach ($Fake->getMessages('^SIS') as $error) { ?>
                        <option value="<?= $error['code']; ?>"><?= '['.$error['code'].'] '.$error['message']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" name="action" value="error" class="btn btn-danger form-control">
                Response with error in payment
            </button>
        </div>
    </form>
</footer>

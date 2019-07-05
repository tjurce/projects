<div class="data col-lg-12">
    <div>
        <div>
            <h3>Izbriši račun?</h3>
        </div>
        <div class="form-contact" ng-controller="customer_Controller">
            <form action="scripts/php/deleteAccount_form.php" method="post">
                <button class="btn btn-primary contact-button" type="submit" name="deleteProfile">Izbriši</button>
                <div class="ng-hide" ng-hide="contact-inputB"><input class="ng-hide" id="contact-inputB" type="text" name="id" value="{{customer[0].CustomerID}}"><br></div>
            </form>
        </div>
    </div>
</div>
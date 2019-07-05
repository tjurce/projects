<div class="data col-lg-12">
    <div>
        <div>
            <h3>Promjenite lozinku!</h3>
        </div>
        <div class="form-contact" ng-controller="customer_Controller">
            <form action="scripts/php/updatePassword_form.php" method="post">
                <input id="contact-inputB" type="password" name="old_password" placeholder="Stara lozinka"><br>
                <input id="contact-inputB" type="password" name="new_password" placeholder="Nova lozinka"><br>
                <input id="contact-inputB" type="password" name="confirm_new_password" placeholder="Potvrdite novu lozinku"><br>
                <button class="btn btn-primary contact-button" type="submit" name="updateProfile">Potvrdite novu lozinku</button>
                <div class="ng-hide" ng-hide="contact-inputB"><input class="ng-hide" id="contact-inputB" type="text" name="id" value="{{customer[0].CustomerID}}"><br></div>
            </form>
        </div>
    </div>
</div>
<div class="data col-lg-12">
    <div>
        <div>
            <h3>Promjenite vaše podatke!</h3>
        </div>
        <div class="form-contact" ng-controller="customer_Controller">
            <form action="scripts/php/updateProfile_form.php" method="post">
                <input id="contact-inputB" type="text" name="first_name" placeholder="Ime..." value="{{customer[0].CustomerFirstName}}"><br>
                <input id="contact-inputB" type="text" name="last_name" placeholder="Prezime..." value="{{customer[0].CustomerLastName}}"><br>
                <input id="contact-inputB" type="text" name="country" placeholder="Država..." value="{{customer[0].CustomerCountry}}"><br>
                <input id="contact-inputB" type="text" name="city" placeholder="Grad..." value="{{customer[0].CustomerCity}}"><br>
                <input id="contact-inputB" type="text" name="address" placeholder="Adresa..." value="{{customer[0].CustomerAddress}}"><br>
                <button class="btn btn-primary contact-button" type="submit" name="updateProfile">Spremite nove podatke</button>
                <div class="ng-hide" ng-hide="contact-inputB"><input class="ng-hide" id="contact-inputB" type="text" name="id" value="{{customer[0].CustomerID}}"><br></div>
            </form>
        </div>
    </div>
</div>
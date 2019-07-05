<div class="data">
    <div class="col-lg-12" ng-controller="customer_Controller">
        <div class="data-table">
            <table cellpadding="100">
                <tr>
                    <td><h1>Ime:</h1></td>
                    <td>{{customer[0].CustomerFirstName}}</td>
                </tr>
                <tr>
                    <td><h1>Prezime:</h1></td>
                    <td>{{customer[0].CustomerLastName}}</td>
                </tr>
                <tr>
                    <td><h1>Korisničko ime:</h1></td>
                    <td>{{customer[0].CustomerUsername}}</td>
                </tr>
                <tr>
                    <td><h1>Država:</h1></td>
                    <td>{{customer[0].CustomerCountry}}</td>
                </tr>
                <tr>
                    <td><h1>Grad:</h1></td>
                    <td>{{customer[0].CustomerCity}}</td>
                </tr>
                <tr>
                    <td><h1>Adresa:</h1></td>
                    <td>{{customer[0].CustomerAddress}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
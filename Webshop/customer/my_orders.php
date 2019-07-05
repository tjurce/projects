<div class="cart_wrapper" ng-controller="customer_Controller">
    <div ng-repeat="o in orders">
        <div class="row custom_cart">
            <div class="col-lg-3">
                <p>{{o.OrderID}}</p>
            </div>
            <div class="col-lg-3">
                <p>{{o.ProductID}}</p>
            </div>
            <div class="col-lg-3">
                <p>{{o.Quantity}}</p>
            </div>
            <div class="col-lg-3">
                <p>{{o.OrderDate}}</p>
            </div>
            <div ng-repeat="pro in products"></div>
        </div>
    </div>
</div>
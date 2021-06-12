
<!-- <script src="js/checkout.js"></script> -->

<html>
    <head>
       <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src='https://libs.na.bambora.com/customcheckout/1/customcheckout.js'></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
          .container {
    /* background-color: rgb(189, 222, 245); */
    margin: 10px auto;

    width: 100%;

    border: none;
    border-radius: 4px;
}

#checkout-form {
    margin: 10px;
}

/* card images are added to card number */
#card-number {
    background-image: none;

    background-origin: content-box;
    background-position: calc(100% + 40px) center;
    background-repeat: no-repeat;
    background-size: contain;
}

/* feedback is displayed after tokenization */
#feedback {
    position: relative;
    left: 15px;
    display: inline-block;
    background-color: transparent;
    border: 0px solid rgba(200, 200, 200, 1);
    border-radius: 4px;
    transition: all 100ms ease-out;
    padding: 11px;
}

#feedback.error {
    color: red;
    border: 1px solid;
}

#feedback.success {
    color: seagreen;
    border: 1px solid;
}


.rows{
    margin: auto;
    width: 50%;
    background-color: rgb(189, 222, 245);
    padding: 6rem;
}@media (min-width: 768px){
.form-inline .form-group {
    display: inline-block;
    margin-bottom: 2rem;
    vertical-align: middle;
}
}
       
        </style>
   </head>
<body>
<div class="container">
    <div class="row rows">
        <!-- Add form -->
        <form id="checkout-form" class="form-inline  text-center">
            <div class="form-group col-xs-12 has-feedback" id="card-number-bootstrap">
                <div id="card-number" class="form-control"></div>
                <label class="help-block" for="card-number" id="card-number-error"></label>
            </div>
            <div class="form-group col-xs-12 has-feedback" id="card-cvv-bootstrap">
                <div id="card-cvv" class="form-control"></div>
                <label class="help-block" for="card-cvv" id="card-cvv-error"></label>
            </div>
            <div class="form-group col-xs-12 has-feedback" id="card-expiry-bootstrap">
                <div id="card-expiry" class="form-control"></div>
                <label class="help-block" for="card-expiry" id="card-expiry-error"></label>
            </div>
            <div class="col-xs-12 text-center">
                <button id="pay-button" type="submit" class="btn btn-primary disabled" disabled="true">Pay</button>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 text-center">
        <div id="feedback"></div>
    </div>
</div>
<script src="js/checkout.js"> </script>
</body>
</html>
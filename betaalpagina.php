<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4DBBFF;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>

<h2>Winkelwagentje</h2>
  <div class="col-75">
    <div class="container">
      <form action="/action_page.php">

        <div class="row">
          <div class="col-50">
            <h3>Factuuradres</h3>
            <label for="fname"><i class="fa fa-user"></i> Volledige Naam</label>
            <input type="text" id="fname" name="firstname" placeholder="Pietje Bell">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="PietjeBell@gmail.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Addres</label>
            <input type="text" id="adr" name="address" placeholder="Dieperenweg 2">
            <label for="city"><i class="fa fa-institution"></i> Stad</label>
            <input type="text" id="city" name="city" placeholder="Hasselt">

            <div class="row">
              <div class="col-50">
                <label for="provincie">Provincie</label>
                <input type="text" id="provincie" name="provincie" placeholder="Overijssel">
              </div>
              <div class="col-50">
                <label for="postcode">Postcode</label>
                <input type="text" id="postcode" name="postcode" placeholder="8062PK">
              </form>
              </div>
            </div>
          </div>
          </div>
        </div>

            <br><br>
            <div class="container">
              <form>
            <h3>Betalingspagina</h3>
            <label for="fname">Betaaltypen</label>
            <div class="icon-container">
              <img src="ideal.png" width="30.86" height="24">
            </div>

            <input type="submit" value="Verdergaan naar betaalpagina" class="btn">
            <input type="checkbox" checked="checked" name="sameadr"> <p>Leveradres hetzelfde als factuuradres</p>



            Kaarthouder
            <input type="text" id="khouder" name="kaarthouder" placeholder="Pietje Bell">
            Bankrekeningnummer
            <input type="text" id="bnum" name="bankrekeningnummer" placeholder="NL24RABO2311232311">
            Banknaam
            <input type="text" id="banknaam" name="banknaam" placeholder="Rabobank">




          </form>
    </div>
  </div>
<br><br>
  <div class="col-25">
    <div class="container">
      <h4>Mandje <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>
      <p><a href="#">Product 1</a> <span class="price">15 Euro</span></p>
      <p><a href="#">Product 2</a> <span class="price">5 Euro</span></p>
      <p><a href="#">Product 3</a> <span class="price">8 Euro</span></p>
      <p><a href="#">Product 4</a> <span class="price">2 Euro</span></p>
      <hr>
      <p>Totaal <span class="price" style="color:black"><b>30 Euro</b></span></p>
    </div>
  </div>


</body>
</html>

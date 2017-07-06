<!DOCTYPE html>
<html>
  <head>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/styles.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-toggleable-md navbar-inverse bg-primary fixed-top">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="/">TRADR</a>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Buy stuff<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Sell stuff</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="drugs.php">Drugs</a>
          </li>
          <!--<li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>-->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Log in?</a>
              <a class="dropdown-item" href="#">Members page?</a>
              <a class="dropdown-item" href="#">Log out?</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
          <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <div class="container">
      <div class="starter-template">
        <h1>NXTopia Marketplace listing: Tags: Domains</h1>
        <p class="lead">Go on, buy something. Currently connected to Node: http://163.172.157.87 on Port 7877.</p>
      </div>
      <div id="result"></div>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>-->
    <!--<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="./js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->

    <script>
        $.getJSON(
          'http://163.172.157.87:7877/nxt', 
          {"requestType": "searchDGSGoods", "tag": "domains"}, function(request) 
        {
          var rows;
          if (request) {
            $.each(request.goods, function(key, data) {
              rows += '<tr>';
              rows += '<td>'+data.name+'</td>';
              rows += '<td>'+data.priceNQT+' NXT</td>';
              rows += '<td>'+data.quantity+'</td>';
              rows += '<td>'+data.sellerRS+'</td>';
              rows += '</tr>';
            });
          } else {
            rows = '<tr><td>If you see nothing here, that means you\'re either not logged in to your NXT client, or your blockchain hasn\'t been completely downloaded</td></tr>';
          }
          var tableHead = '<div class="table-responsive"><table class="table table-striped"><thead><tr><th>Item</th><th>Price</th><th>Quantity</th><th>Seller ID</th></tr></thead><tbody>';
          var tableEnd = '</tbody></table></div>';
          $("#result").html(tableHead + rows + tableEnd);
        });
    </script>
  

</body>
</html>
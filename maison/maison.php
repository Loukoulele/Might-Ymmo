<div id="tour" class="bg-1">
  <div class="container">
    <h3 class="text-center" style="padding-bottom:2em">Notre sélection du mois</h3>

    <div class="row text-center">
      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="images/appart1.jpg" alt="Paris" class="img-fluid">
          <p><strong>Suisse</strong></p>
          <p>Appartement Fribourg</p>
          <!--<button class="btn" data-toggle="modal" data-target="#myModal">Interesser ? Voir !</button>-->
          <button class="btn"><a href="appart/appart.php">Intéressé ? Voir !</a></button>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="images/appart2.jpg" alt="New York" class="img-fluid">
          <p><strong>France</strong></p>
          <p>Appartement Paris</p>
          <!--<button class="btn" data-toggle="modal" data-target="#myModal">Interesser ? Voir !</button>-->
          <button class="btn"><a href="appart/appart.php">Intéressé ? Voir !</a></button>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="images/appart3.jpg" alt="San Francisco" class="img-fluid">
          <p><strong>San Francisco</strong></p>
          <p>Sunday 29 November 2015</p>
          <!--<button class="btn" data-toggle="modal" data-target="#myModal">Interesser ? Voir !</button>-->
          <button class="btn"><a href="appart/appart.php">Intéressé ? Voir !</a></button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="">Suisse</h4>
          <button type="button" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" action="index.php" method="post">
            <div class="form-group">
              <label for="nom"><span class="glyphicon glyphicon-shopping-cart"></span> Intéressé, dites-le nous !</label>
              <p>Nom<p>
              <input type="text" class="form-control" id="nom" placeholder="Votre nom">
            </div>
            <div class="form-group">
              <label for="mess"><span class="glyphicon glyphicon-user"></span> Message</label>
              <input type="text" class="form-control" id="mess" placeholder="Entrer un message">
            </div>
            <div class="form-group">
              <label for="tel"><span class="glyphicon glyphicon-user"></span> Téléphone</label>
              <input type="text" class="form-control" id="tel" placeholder="Entrer votre n°">
            </div>
              <button type="submit" class="btn btn-block">Send
                <span class="glyphicon glyphicon-ok"></span>
              </button>
              <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
                <span class="glyphicon glyphicon-remove"></span> Cancel
              </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

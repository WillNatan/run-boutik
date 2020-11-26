<?php
$ROOT = '../';
include_once($ROOT.'layout/back/header.php'); ?>
<h4>Dashboard <small>Overview</small></h4>
<div class="container-fluid mt-3">
  <div class="row">
    <div class="col-md-9 mb-3">
      <div class="dash-card">
        <div class="dash-header">
          <h5>Derniers résultats</h5>
        </div>
        <div class="dash-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Miniature</th>
                  <th>Nom</th>
                  <th>Nb. d'avis</th>
                  <th>Nb. Clics</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><img src="<?php echo $ROOT ?>img/uploads/burger.png" width="50" alt="Miniature"></td>
                  <td>Big Mac</td>
                  <td><span class="badge badge-primary">687</span></td>
                  <td><span class="badge badge-success">12 884</span></td>
                </tr>
                <tr>
                  <td><img src="<?php echo $ROOT ?>img/uploads/burger.png" width="50" alt="Miniature"></td>
                  <td>Big Mac</td>
                  <td><span class="badge badge-primary">687</span></td>
                  <td><span class="badge badge-success">12 884</span></td>
                </tr>
                <tr>
                  <td><img src="<?php echo $ROOT ?>img/uploads/burger.png" width="50" alt="Miniature"></td>
                  <td>Big Mac</td>
                  <td><span class="badge badge-primary">687</span></td>
                  <td><span class="badge badge-success">12 884</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="dash-card">
        <div class="dash-header">
          <h5>Nb. de produits</h5>
          <small>En favoris</small>
        </div>
        <div class="dash-body">
          <div class="card-number">
            <h1>877</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include_once($ROOT.'layout/back/footer.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include '../app/views/templates/partials/_head.php'; ?>
  </head>

  <body>
    <!-- Fixed navbar -->
    <?php include '../app/views/templates/partials/_nav.php'; ?>

    <div class="container theme-showcase" role="main" class="row">
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Theme example</h1>
        <p>
          This is a template showcasing the optional theme stylesheet included
          in Bootstrap. Use it as a starting point to create something more
          unique by building on or modifying it.
        </p>
      </div>

      <div class="col-md-6">
        <div class="page-header">
          <h1>FORMULAIRE</h1>
        </div>
        <form action="">
          <div>
            <label for="test">Test</label>
            <input type="text" id="test" name="test" placeholder="test" />
          </div>
          <div>
            <input type="submit" class="btn btn-lg btn-primary" />
          </div>
        </form>
      </div>

      <div class="col-md-12">
        <div class="page-header">
          <h1>LISTE DES POSTS</h1>
        </div>

        <table class="table table-bordered">
          <thead>
            <tr>
              <th>id</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Username</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>
                <button type="button" class="btn btn-primary">Modifier</button>
                <button type="button" class="btn btn-secondary">
                  Supprimer
                </button>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>
                <button type="button" class="btn btn-primary">Modifier</button>
                <button type="button" class="btn btn-secondary">
                  Supprimer
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-12">
        <div class="page-header">
          <h1>Alerts</h1>
        </div>
        <div class="alert alert-success" role="alert">
          <strong>Well done!</strong> You successfully read this important alert
          message.
        </div>
        <div class="alert alert-info" role="alert">
          <strong>Heads up!</strong> This alert needs your attention, but it's
          not super important.
        </div>
        <div class="alert alert-warning" role="alert">
          <strong>Warning!</strong> Best check yo self, you're not looking too
          good.
        </div>
        <div class="alert alert-danger" role="alert">
          <strong>Oh snap!</strong> Change a few things up and try submitting
          again.
        </div>
      </div>
    </div>

    <!-- /container -->

   <?php include '../app/views/templates/partials/_script.php'; ?>
  </body>
</html>

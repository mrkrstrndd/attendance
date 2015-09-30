<!DOCTYPE html>
<html ng-app="myApp">
    <head>
        <meta name="csrf-token" content="<% csrf_token()  %>" />
        <title>Laravel</title>

        <script src="../public/js/angular.min.js"></script>
        <script src="../public/js/angular-animate.min.js"></script>
        <script src="../public/js/ui-router.min.js"></script>
        <script src="../public/js/moment.min.js"></script>
        <script src="../public/js/angular-moment.min.js"></script>
        <script src="../public/js/jquery.js"></script>
        <script src="../public/js/main.js"></script>


        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../public/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../public/css/main.css" />
    </head>
    <body>      

        <div class="container" ng-controller="studCtrl">
            <div class="col-md-4" style="top: 5em">
                <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <td>Student ID</td>
                        <td>Time In</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr ng-repeat="x in user">
                        <td>{{ x.fk_user_id }}</td>
                        <td>{{ x.created_at | amDateFormat:'MM-DD-YYYY HH:mm'  }}</td>
                      </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-3 col-md-offset-2" style="margin-top:5em">
              <form ng-submit="submit()">
                  <div class="form-group">
                    <input type="text" class="form-control" ng-model="creduser" id="exampleInputEmail1" placeholder="ID #" required />
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" ng-model="credpass" id="exampleInputPassword1" placeholder="Password" required  />
                  </div>
                  <button class="btn btn-danger btn-length">Enter</button>
              </form>
              <p class="bg-danger error-text fade-in-out" ng-show="error">Try Again!</p>
            </div>

        </div>


    </body>
</html>

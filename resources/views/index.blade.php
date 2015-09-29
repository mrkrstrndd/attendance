<!DOCTYPE html>
<html ng-app="myApp">
    <head>
        <meta name="csrf-token" content="<% csrf_token()  %>" />
        <title>Laravel</title>

        <script src="../public/js/angular.min.js"></script>
        <script src="../public/js/ui-router.min.js"></script>
        <script src="../public/js/moment.min.js"></script>
        <script src="../public/js/angular-moment.min.js"></script>
        <script type="text/javascript" src="../public/js/jquery.js"></script>
        <script>

         var myApp = angular.module('myApp', ['ui.router','angularMoment']);

         myApp.controller('studCtrl' , function ($scope, $http){

             $scope.user = [];

             $http.get('../public/attendance').success(function (response){
                $scope.user = response.user;
                console.log(response);
             })

             $scope.send = function() {
                var data = { Country : 'Metodia', City :'Thailand'}
                $scope.names.push(data);
             }
             $scope.time = new Date();

              $scope.submit = function (){
                if( this.creduser && this.credpass  )
                {
                  var CSRF_TOKEN = document.getElementsByTagName("meta")[0].getAttribute("content");  
                  $http.post('../public/attendance', { _token: CSRF_TOKEN, uname: this.creduser, passwd: this.credpass })
                    .then(function (response){
                      console.log(response.data.user_id);
                      var data = { 'fk_user_id' : response.data.user_id, 'created_at' : new Date() };
                      $scope.user.push(data);
                      $scope.creduser = "";
                      $scope.credpass = "";
                    });
                }
              }
         });



        </script>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../public/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../public/css/main.css" />
    </head>
    <body>      

        <div class="container" ng-controller="studCtrl">
            <div class="col-md-6" style="top: 5em">
                <table>
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
            <div class="col-md-3">
              <form ng-submit="submit()">
                  <div class="form-group">
                    <input type="text" class="form-control" ng-model="creduser" id="exampleInputEmail1" placeholder="ID #" required />
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" ng-model="credpass" id="exampleInputPassword1" placeholder="Password" required  />
                  </div>
                  <button class="btn btn-danger btn-length">Enter</button>
              </form>
<!--               <p> {{ time }}</p>
              <p>{{ time | amParse:'YYYY.MM.DD HH:mm:ss' }}</p>
              <p>{{ time | amDateFormat:'MM.DD.YYYY HH:mm:ss' }}</p> -->
<!--               <button ng-click="send()">Login</button> -->

            </div>     

        </div>

        <!-- We'll also add some navigation: -->
<!--         <a ui-sref="state1">State 1</a>
        <a ui-sref="state2">State 2</a>
 -->

    </body>
</html>

<!DOCTYPE html>
<html ng-app="myApp">
    <head>
        <meta name="csrf-token" content="<% csrf_token()  %>" />
        <title>Laravel</title>

        <script type="text/javascript" src="../public/js/angular.min.js"></script>
        <script type="text/javascript" src="../public/js/ui-router.min.js"></script>
        <script type="text/javascript" src="../public/js/jquery.js"></script>
        <script>

         var myApp = angular.module('myApp', ['ui.router']);

         myApp.controller('studCtrl' , function ($scope, $http){
             $http.get("http://www.w3schools.com/angular/customers.php")
                .success(function (response) {$scope.names = response.records;});
         });

         myApp.controller('logCtrl', function ($scope, $http){

            $scope.submit = function (){

            //get TOKEN
            var CSRF_TOKEN = document.getElementsByTagName("meta")[0].getAttribute("content");

            $http.post('../public/user', { _token:CSRF_TOKEN , uname: this.creduser, passwd:this.credpass })
                .then(function (response){
                    console.log(response);
                }, function (failed){
                    console.log('failed');
                });

            // $http.get('../public/user')
            //     .success(function (response)
            //     {
            //         console.log(response);   
            //     });


            }
         });

        </script>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../public/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../public/css/main.css" />
    </head>
    <body>      
        <div class="container" ng-controller="studCtrl">
            <div class="col-md-6">
                <table>
                    <thead>
                    </thead>
                    <tbody>
                      <tr ng-repeat="x in names">
                        <td>{{ x.Name }}</td>
                        <td>{{ x.Country }}</td>
                      </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-3" ng-controller="logCtrl">
              <form ng-submit="submit()">
                  <div class="form-group">
                    <input type="text" class="form-control" ng-model="creduser" id="exampleInputEmail1" placeholder="ID #">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" ng-model="credpass" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <button class="btn btn-danger btn-length">Enter</button>
              </form>
            </div>
        </div>

        <!-- We'll also add some navigation: -->
<!--         <a ui-sref="state1">State 1</a>
        <a ui-sref="state2">State 2</a>
 -->

    </body>
</html>

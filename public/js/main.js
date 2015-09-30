     var myApp = angular.module('myApp', ['ngAnimate','ui.router','angularMoment']);

         myApp.controller('studCtrl' , function ($scope, $http, $timeout){

              $scope.user = [];

              $http.get('../public/attendance').success(function (response){
                $scope.user = response.user;               
              });

              $scope.send = function() {
                var data = { Country : 'Metodia', City :'Thailand'}
                $scope.names.push(data);
              }

              $scope.submit = function (){
                if( this.creduser && this.credpass  )
                {
                  var CSRF_TOKEN = document.getElementsByTagName("meta")[0].getAttribute("content");  
                  $http.post('../public/attendance', { _token: CSRF_TOKEN, uname: this.creduser, passwd: this.credpass })
                    .then(function (response){
                      if(response.status === 200){

                        var data = { 'fk_user_id' : response.data.user_id, 'created_at' : new Date() };
                        $scope.user.push(data);     

                      } else{

                        $scope.error = true;
                        $timeout(function(){
                          $scope.error = false;
                        },3000);

                      }                  
                      $scope.creduser = "";
                      $scope.credpass = "";
                    });
                }
              }
         });



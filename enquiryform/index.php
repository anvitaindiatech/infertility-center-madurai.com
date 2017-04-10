<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "test";
// Create connection

$con = mysql_connect($servername,$username,$password,$db) or die("Error " . mysql_error($con));
// Check connection
if ($con) {
  echo "Connected successfully";
} 



?>
<html>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<body>

<h2>Validation Example</h2>

<form ng-app="myApp" ng-controller="validateCtrl"
name="myForm" novalidate ng-submit="insertData()" >

<p>name:<br>
<input type="text" name="name" ng-model="name" required>
<span style="color:red" ng-show="myForm.name.$dirty && myForm.name.$invalid">
<span ng-show="myForm.name.$error.required">name is required.</span>
</span>
</p> 

<p>phone number:<br>
<input type="number" name="phone" ng-model="phone" required ng-minlength="10" ng-maxlength="10">
<span style="color:red" ng-show="myForm.phone.$dirty && myForm.phone.$invalid">
<span ng-show="myForm.phone.$error.required && registration.phone.$error.number">phone number is required.</span>
<span class="error" ng-show="myForm.phone.$error.minlength">Phone no  less that 10 char.</span>
      <span class="error" ng-show="myForm.phone.$error.maxlength">Phone no  more than 10 char.</span>
   
</span>
</p>

<p>Username:<br>
<input type="text" name="user" ng-model="user" required>
<span style="color:red" ng-show="myForm.user.$dirty && myForm.user.$invalid">
<span ng-show="myForm.user.$error.required">Username is required.</span>
</span>
</p>

<p>Email:<br>
<input type="email" name="email" ng-model="email" required>
<span style="color:red" ng-show="myForm.email.$dirty && myForm.email.$invalid">
<span ng-show="myForm.email.$error.required">Email is required.</span>
<span ng-show="myForm.email.$error.email">Invalid email address.</span>
</span>
</p>

<p>
<input type="submit" name="submit" ng-click="insertData()">
</p>

</form>

<script>
var app = angular.module('myApp', []);
app.controller('validateCtrl', function($scope,$http) {
	$scope.name = 'visak';
	 $scope.phone = '9656653149';
    $scope.user = 'John Doe';
    $scope.email = 'john.doe@gmail.com';
	 $scope.insertData=function(){		
   window.location.href = "insert";
    
   
}
});
</script>

</body>
</html>

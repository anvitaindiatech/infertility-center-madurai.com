
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
 <script type="text/javascript">
 angular.module('myApp', ['ionic'])
.controller('MyCtr', function($scope, $filter) {
            var date = new Date();
            $scope.date-format-ddMMyyyy = $filter('date')(new Date(), 'dd/MM/yyyy');
            $scope.date-format-ddMMMMyyyy = $filter('date')(new Date(), 'dd, MMMM yyyy');
            $scope.date-format-HHmmss = $filter('date')(new Date(), 'HH:mm:ss');
            $scope.date-format-hhmmsstt = $filter('date')(new Date(), 'hh:mm:ss a');
        });
</script>
 
<div ng-app="myApp" ng-controller="MyCtr">
        dd/MM/yyyy format - <div ng-bind = "date-format-ddMMyyy"></div>
        dd, MMMM yyyy format - <div ng-bind = "date-format-ddMMMMyyyy"></div>
        24 Hour time- <div ng-bind = "date-format-HHmmss"></div>
        12 Hour time- <div ng-bind = "date-format-hhmmsstt"></div>
</div>
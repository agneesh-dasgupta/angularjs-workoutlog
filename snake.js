angular.module('workout', [])
.controller('workoutControl', function($scope, $http){
	$scope.newWorkout = function (){
		console.log("reached");
		$http.post("add_workout.php", {
			'newname':$scope.newname,
			'newhours':$scope.newhours
		}).then(function(response){
			alert("successful!");
		}, function(error){
			console.error(error)
		});
	}
	$scope.showWorkout = function(){
		$http.get("show_user_workouts.php").then(function(response){
			console.log("reached");
			$scope.userworkouts = response.data;
		});
	}
	$scope.getAverage = function(){
		$http.get("average_workouts.php").then(function(response){

			$scope.avg = response.data;
		});
	};
	$scope.showAllWorkout = function(){
		$http.get("show_all_workouts.php").then(function(response){
			console.log("reached");
			$scope.allworkouts = response.data;
		});
	}	
});
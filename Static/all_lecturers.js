"use strict";

// This code will get the PDapp
var  SSapp= angular.module("SSapp", []);

// Code here will Create the lecturer controller and request for lecturers data from the backend

SSapp.controller("lecturerController", function($scope, $http) {
    //This code will get lecturers data from the backend and display to the frontend 
    $http.get('/lecturers').then(function(response) {
        $scope.lecturers = response.data;
    });
    //Adding a deleteLecturer function
    // This code will send a delete notification to the server
    $scope.deleteLecturer = function(Lecturer_ID) {
    // This code will send delete notification to /lecturer/Lecturer_ID endpoint
        $http.delete("/lecturer/" + Lecturer_ID).then(function(response) {
      // This code will refresh the list after successfull deletion
            $http.get("/lecturers").then(function(response) {
                $scope.lecturers = response.data;
                });
            });
        };
    //Inserting a new lecturers availalbility to the table
    //
    $scope.updateLecturer = function(code) {
        console.log('$scope:', $scope.lecturers, 'code:',code)
        $http.put("/lecturer/" + code['Lecturer_ID'], code).then(function(response) {
            $scope.lecturer = new Lecturers ($scope.lecturers.Name,$scope.lecturers.Lecturer_ID,$scope.lecturers.Gender ,$scope.lecturers.Availability);
            console.log('what now', $scope.lecturer)
            console.log('$scope1:', $scope.lecturer, 'code1:',code['Lecturer_ID'])
            $http.get("/lecturer/"+code['Lecturer_ID']).then(function(response) {
            $scope.lecturer = response.data;
            });
        });
    };


    //$scope.new_doctor = new Lecturer("", "","","");
        // This code will send a put notification to the server
    $scope.createLecturer = function() {
        // This code will send post a message the to /lecturers endpoint
        $http.post("/lecturers", $scope.new_lecturer).then(function(response) {
            // This will reset new_lecturer to empty to accept new entry 
            $scope.new_lecturer = new Lecturers("", "","","");
            // This code will refresh the list after successfull addition
            $http.get("/lecturers").then(function(response) {
                $scope.lecturers = response.data;
            });
        });
    };
});
"use strict";


//This code will get "PDApp" from the webpage
var SSApp = angular.module("SSApp", []);

//This code creates the students controller and requests students data from the backend    
SSApp.controller("studentController", function($scope, $http) {
    //document.getElementById("selected").style.display = "none"

    //This coode will 
    $http.get('/students').then(function(response) {
        $scope.students = response.data; //linking the students json data
    });
    
    // This code will send a update message to the server
    $scope.updateStudent = function(code) {
        // This code will send update message to Students endpoint
        $http.put("/student/" + code).then(function(response) {
            $scope.student = new Students($scope.student.Student_ID, $scope.student.S_First_Name,$scope.student,S_Last_Name,$scope.student.DOB, $scope.student.Gender, $scope.student.Subject);
            // This code will refresh the list of Students after the request is completed
            $http.get("/students/").then(function(response) {
                $scope.students = response.data;
            });
        });
    };

    //This code will send delete request to the server
    $scope.deleteStudent = function(Student_ID) {
        //sending a delete request to the server endpoint
        $http.delete("/student/" + Student_ID).then(function(response) {
            // this code will refresh the students list
            $http.get("/students/").then(function(response) {
                $scope.students = response.data;
            });
        });
    }; 
    //this code will send create request to the server
    $scope.createStudent = function() {
        //sending a create request to the server endpoint
        $http.post("/students", $scope.new_student).then(function(response) {
            $scope.new_student = new Students("", "", "", "", "", "", "", "");
            $http.get("/students").then(function(response) { 
                $scope.students = response.data;
            });
        });
    };
});
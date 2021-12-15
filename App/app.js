"use strict";

// student support classes are used in the application layer 
const studentsupport = require("../studentsupport.js");

// Establishing communication between the application layer and the data layer
const data = require("../data/data.js");

// This code is going to import express from the npm library
const express = require("express");

// Express application is created 
var app = express();

// Add JSON parsing to accept incoming data from the frontend
app.use(express.json());

// Location of the static files are added 
app.use(express.static("Static")); // s=S

// This is the start for student endpoints

// This code will add /students endpoint
app.get("/students", function(req, res) {
  // This code will return all students from the students table 
  data.getStudents(function(students) {
      res.json(students);
  });
});

// Add /students post endpoint
app.post("/students", function(req, res) {
// Call createStudent on data
  data.addStudent(req.body, function() {
    res.send("OK");
  });
});

// This code will add a single /student endpoint
app.get("/student/:code", function(req, res) {
  // This code will return a single student from the students table 
  data.getStudent(req.params.code, function(student) {
      res.json(student);
  });
});

// This code will update a single /student endpoint
app.put("/student/:code", function(req, res) {
  data.updateStudent(req.body, function() {
      res.send("OK");
  });
});


//Asking the data layer to remove a student
// Add a /student delete endpoint
app.delete("/student/:Student_ID", function(req, res) {
  // This will call deleteStudent on the data
  data.deleteStudent(req.params.Student_ID, function() {
    // After successful deletion there will be an OK response to the browser
    res.send("OK");
  });
});

app.put("/students", function(req, res) {
  // Call function on data
  data.updateStudent(req.body, function() {
    res.send("OK");
  });
});

// Student endpoints stop here

// This is the start for lecturer endpoints

//This code will Add /lecturers endpoint
app.get("/lecturers" , function(req, res) {
  // This code will return "all lecturers" from the lecturers table 
  data.getLecturers(function(lecturers) {
    res.json(lecturers);
  });
});


// Add /lectuerers post endpoint
app.post("/lecturers", function(req, res) {
  // Call addLecturer on data
  data.addLecturer(req.body, function() {
    res.send("OK");
  });
});

// This is the code for Adding a single /lecturer endpoint
app.get("/lecturer/:doc", function(req, res) {
  // This code will Call getLecturer on data
  data.getLecturer(req.params.doc, function(doc) {
      res.json(doc);
  });
});
//Asking the data layer to remove a doctors availability
// Add a /lecturer delete endpoint
app.delete("/lecturer/:Lecturer_ID", function(req, res) {
  // This will call deleteLecturer on the data
  data.deleteLecturer(req.params.Lecturer_ID, function() {
    // After successful deletion there will be an OK response to the browser
    res.send("OK");
  });
});

app.put("/lecturers", function(req, res) {
  // Call function on data
  data.updateLecturerAvailability(req.body, function() {
    res.send("OK");
  });
});




// Lecturer endpoints stop here


// To start the server
// This code will allow the application layer to listen communication from the front end on port 3000
app.listen(3000, function(err) {
  // In case of an error
  if (err) {
    return console.error(err.message);
  }
  //When theres no error
  console.log("You have launched the Server.");
});


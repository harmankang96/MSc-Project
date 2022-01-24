"use strict";

// This code will import SQLite library.
const sqlite3 = require("sqlite3").verbose();

// This code instructs the application layer to use studentsupport classes
const studentsupport = require("../studentsupport.js");

// This code will connect to the studentsupport database.
var db = new sqlite3.Database("data/StudentSupport.db", function(err) {
    // this code will run in case of an error
    if (err) {
        return console.error(err.message);
    }
    // This code will run if there is no error
    console.log("You are now Connected to studentsupport database.");
});


//Code here will expose doctor data information

// This code will export getLecturers function 
exports.getLecturers = function(callback) {
    // SQL statement for showing all lecturers created
    var sql = `SELECT * FROM lecturers`;
    // To execute the SQL query and the return all lecturers
    db.all(sql, function(err, rows) {
        // This code will check for any errors and if any run the code
        if (err) {
            return console.error(err.message);
        }
        // Create an array for Lecturers
        var lecturers = [];
        // This code will Loop through each row  to create Lecturer objects
        for (var row of rows) {
            // To create a lecturer object
            var lec = new studentsupport.Lecturers(row.Name, row.Lecturer_ID, row.Gender, row.Availability);
            // This code will push each lecturer to the array created above
            lecturers.push(lec);
        }
        // callback function will be executed with this code
        callback(lecturers);
    });
};

// This code will export getLecturer function
exports.getLecturer = function(lec, callback) {
    // SQL statement for showing a single lecturer created
    var sql = `
        SELECT * FROM Lecturers
        WHERE Lecturer_ID = '${lec}'`;
    // The code below will execute the query above and return just a row of data.
    db.get(sql, function(err, row) {
        // To check for errors, this code will be excuted and if any the error msg will be displayed
        if (err) {
            return console.error(err.message);
        }
        // This code will create a lecturer object
        var lecturer = new studentsupport.Lecturers(row.Name, row.Lecturer_ID, row.Gender, row.Availability);
        // After the code above is excuted then this code will return a lecturer
        callback(lecturer);
    });
};

//Adding  a deleteLecturer function
// This code will delete a Lecturer from the database
exports.deleteLecturer = function(Lecturer_ID, callback) {
    // SQL delete statement
    var sql = `DELETE FROM Lecturers WHERE Lecturer_ID='${Lecturer_ID}'`;
    // This code will execute the above SQL delete statement
    db.exec(sql, function(err) {
      // After the SQL statement, a callback function will be executed
        callback();
        });
    };

    // This code will add a lecturer to the lecturers database as entered from the front end
exports.addLecturer = function(lecturer, callback) {
    // This is the SQL insert statement to enter new lecturer availability information
    var sql = `INSERT INTO Lecturers VALUES ('${lecturer.Name}', '${lecturer.Lecturer_ID}','${lecturer.Gender}', '${lecturer.Availability}')`;
    // This code will execute SQL insert statement above
    db.exec(sql, function(err) {
      // After the SQL statement, a callback function will be executed
        callback();
        });
    };
    





// Communication with the lecturers database stops here


//The following code will broadcast Students data
// This code will Export getStudents function
exports.getStudents = function(callback) {
    // Creating SQL statements for Students and connecting keys
    var sql =`SELECT * FROM students`;
    
    // This code will execute query and return data from Students class
    db.all(sql, function(err, rows) {
        // Check if there is an error
    if (err) {
        return console.error(err.message);
    }
    // This code will create an array of Students
        var students= [];
        // This code will loop through rows creating Student objects
        for (var row of rows) {
            // This code will create student object
            var pat = new studentsupport.Students(row.Student_ID, row.S_First_Name, row.S_Last_Name, row.DOB, row.Gender, row.Course);
            // This code will add students to array
            students.push(stu);
        }
        // This code will execute callback function
        callback(students);
    });
};

//This code will export getStudent function
exports.getStudent = function(stu, callback) {
    // This code will create SQL statement
    var sql =`
            SELECT * FROM Students
            WHERE Student_ID ='${stu}'
    `;
    //This code will execute query and only one row
    db.get(sql, function(err, row) {
        if (err) {
            return console.error(err.message);
        }
         
        //This code will create a student object
        var student = new studentsupport.Students(row.Student_ID, row.S_First_Name, row.S_Last_Name, row.DOB, row.Gender, row.Course);
        callback(student)
    });
};


//Adding  a deleteStudent function
// This code will delete a student from the database
exports.deleteStudent = function(Student_ID, callback) {
    // SQL delete statement
    var sql = `DELETE FROM Students WHERE Student_ID='${Student_ID}'`;
    // This code will execute the above SQL delete statement
    db.exec(sql, function(err) {
      // After the SQL statement, a callback function will be executed
        callback();
        });
    };


// Add a student to the database
exports.addStudent = function(student, callback) {
    // Create SQL insert statement
    var sql = `INSERT INTO Students VALUES ('${student.Student_ID}', '${student.S_First_Name}','${student.S_Last_Name}','${student.Gender}','${student.DOB}','${student.Course}')`;
    // Execute SQL insert statement
    db.exec(sql, function(err) {
      // Once completed, execute callback function
        callback();
    });
};

    exports.updateStudent = function(students, callback) {
        console.log('data.js, updateStudent:', students)  
        var sql = `UPDATE Students
        SET Subject="${students.Subject}"
        WHERE Student_ID="${students.Student_ID}"`;
        // Execute SQL update statement
        db.exec(sql, function(err) {
          // Once completed, execute callback function
        callback();
        });
    };

//Student data broadcasting ends here



"use strict";

class Students {
    // This is the patient ID number
Student_ID;
  // This is Student's first name
S_First_Name;
  // This is Student's last name 
S_Last_Name;
  //This will show Student's date of birth
DOB;
  //This will show Gender
Gender;
  //This will show all subject tkane to Students
Subject;
  //This will show exams carried out for Students
Exams;
  //This will show the Results of the Students
Results; 

  // To definie constructor
constructor(Student_ID, S_First_Name, S_Last_Name, DOB, Gender, Subject, Exams, Results) {
    this.Student_ID = Student_ID;
    this.S_First_Name = S_First_Name;
    this.S_Last_Name = S_Last_Name;
    this.DOB = DOB;
    this.Gender = Gender;
    this.Subject = Subject;
    this.Exams = Exams;
    this.Results = Results;
    }
}

class Students {
  // This is Student's ID number
  Student_ID;
  // This is Student's first name
  S_First_Name;
  // This is Student's last name 
  S_Last_Name;
  //This is Student's Date of birth
  DOB;
  //This is Student's Gender
  Gender;
  

  constructor(Student_ID, S_First_Name, S_Last_Name, DOB, Gender) {
    this.Patient_ID = Patient_ID;
    this.P_First_Name = P_First_Name;
    this.P_Last_Name = P_Last_Name;
    this.DOB = DOB;
    this.Gender = Gender;

  }
} 




// Lecturers frontend setup
class Lecturers {
  // This is the lecturers full name
  Name;
  // This is the lecturers identification
  Lecturer_ID;
  // This shows the lecturers gender
  Gender;
  // This is the lecturers availability date
  Availability;
  
  constructor(Name, Lecturer_ID, Gender, Availability) {
    this.Name = Name;
    this.Lecturer_ID = Lecturer_ID;
    this.Gender = Gender;
    this.Availability = Availability;
  } 
}
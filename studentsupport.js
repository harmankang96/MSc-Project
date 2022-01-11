"use strict";

exports.Students = class {
  // This is the patient ID number
  Student_ID;
  // This is Patient's first name
  S_First_Name;
  // This is Patient's last name 
  S_Last_Name;
  //This will show Patient's medical diagnosis
  DOB;
  //This will show Drug_ID
  Gender;
  //This will show all drug names prescribed to Patients
  Subject;

  // To definie constructor
  constructor(Student_ID, S_First_Name, S_Last_Name, DOB, Gender, Subject) {
    this.Student_ID = Student_ID;
    this.S_First_Name = S_First_Name;
    this.S_Last_Name = S_Last_Name;
    this.DOB = DOB;
    this.Gender = Gender;
    this.Subject = Subject;
  }
} 



exports.Lecturers = class {
  // This is the doctors full name
  Name;
  // This is the doctors identification
  Lecturer_ID;
  // This shows the doctors gender
  Gender;
  // This is the doctors availability date
  Availability;
  
 
  constructor(Name, Lecturer_ID, Gender, Availability) {
    this.Name = Name;
    this.Lecturer_ID = Lecturer_ID;
    this.Gender = Gender;
    this.Availability = Availability;

  } 
}
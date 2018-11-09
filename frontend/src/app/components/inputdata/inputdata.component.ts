import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { FormGroup, FormBuilder, Validators, FormArray } from '@angular/forms';
import { EmpdataService } from '../.././service/empdata.service';

@Component({
  selector: 'app-inputdata',
  templateUrl: './inputdata.component.html',
  styleUrls: ['./inputdata.component.css']
})
export class InputdataComponent implements OnInit {
  registrationForm: FormGroup;
  constructor(private _router: Router, private _EmpdataService: EmpdataService, private _formBuilder: FormBuilder) { }

  ngOnInit() {
    this.registrationForm = this._formBuilder.group({
      Name: [null, [Validators.required, Validators.maxLength(50), Validators.pattern('^[A-Za-z ]*[A-Za-z]+$')]],
      Address: [null, [Validators.required, Validators.maxLength(200),
        Validators.pattern('^[A-Za-z0-9,./:-]+( [a-zA-Z0-9,./:-]+)*$')]],
      Salary: [null, [Validators.required, Validators.maxLength(6), Validators.pattern('^[0-9]+')]],
    });
  }


  // Function to enter new data into the database emp_salaries
  register() {
    // console.log(this.registrationForm.value);
    this._EmpdataService.xpost('addData' , this.registrationForm.value).subscribe(
    (res: any) => {
       // console.log(res);
         this._router.navigate(['']);
      },
      (error: any) => {
       // console.log(error);
       window.alert('Please Enter All info correctly');
      }
    );
  }


  // Function to go back to All Data Page
  back() {
    this._router.navigate(['']);
  }

}

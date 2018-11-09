import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HttpClientModule } from '@angular/common/http';
import { ReactiveFormsModule, FormsModule } from '@angular/forms';
import {NgxPaginationModule} from 'ngx-pagination';

import { AppComponent } from './app.component';
import { EmpDataComponent } from './components/empData/empData.component';
import { NotfoundComponent } from './components/notfound/notfound.component';
import { EmpdataService } from './service/empdata.service';
import { InputdataComponent } from './components/inputdata/inputdata.component';


const route: Routes = [
  {
    path: '',
    component: EmpDataComponent
  },
  {
    path: 'addData',
    component: InputdataComponent
  },
  {
    path: 'notfound',
    component: NotfoundComponent
  },
  {
    path: '**',
    redirectTo: 'notfound'
  }
];
@NgModule({
  declarations: [
    AppComponent,
    EmpDataComponent,
    NotfoundComponent,
    InputdataComponent,
  ],
  imports: [
    BrowserModule, ReactiveFormsModule, RouterModule.forRoot(route), FormsModule, HttpClientModule, NgxPaginationModule
  ],
  providers: [EmpdataService],
  bootstrap: [AppComponent]
})
export class AppModule { }

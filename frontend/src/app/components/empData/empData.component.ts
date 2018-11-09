import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { EmpdataService } from '../.././service/empdata.service';

@Component({
  selector: 'app-empData',
  templateUrl: './empData.component.html',
  styleUrls: ['./empData.component.css']
})
export class EmpDataComponent implements OnInit {
  public myData: any[] = [];
  public PagiData: any[] = [];
  public SalCount;
  public Next;
  public Previous;
  public currentPage = 1;
  public totalDataCount;
  public itemsPerPage = 10;
  public totPage;
  public pageData;
  public pageNo;
  public pos = 0;

  constructor(private _router: Router, private _empService: EmpdataService) {}

  ngOnInit() {
    // this.alldata();
    this.distinctSalaryCount();
    this.paginatedData(1, 0);
  }

  // Function to show all Employee data
  // alldata() {
  //   this._empService.data().subscribe(
  //     (res: any) => {
  //       this.myData = res.empSalarys;
  //     },
  //     (error: any) => {
  //       window.alert('No data in database');
  //     }
  //   );
  // }

  // Function to find the number of distinct salaries
  distinctSalaryCount() {
    this._empService.xget('count').subscribe(
      (res: any) => {
        this.SalCount = res.SalaryCount;
      },
      (error: any) => {
      }
    );
    // this._empService.count().subscribe(
    //   (res: any) => {
    //     this.SalCount = res.SalaryCount;
    //   },
    //   (error: any) => {
    //   }
    // );
  }

  // Function to search data according the highest salary of employee
  // searchdata(rank: HTMLInputElement) {
  //   this._empService.search(rank.value).subscribe(
  //     (res: any) => {
  //       this.PagiData = res.empSalary;
  //     },
  //     (error: any) => {
  //       window.alert('Enter values in limit');
  //     }
  //   );
  // }

  // Function to navigate page control to inputdata component
  inputdata() {
    this._router.navigate(['addData']);
  }

  // Function to present paginated data for all data and searched data from backend
  paginatedData(no = 1, rank = 0) {
    this.pos = rank;
    if (this.pos !== 0 && (this.pos > this.SalCount || this.pos < 1)) {
      // this.totalDataCount = 0;
      // this.totPage = 1;
      // this.PagiData = [];
      window.alert('Enter values in limit');
      this.paginatedData(this.currentPage, 0);
    } else {
    this.currentPage = no;
    this._empService.xget('page/' + this.currentPage + '/' + this.pos).subscribe(
      (res: any) => {
        // console.log(res);
        this.totalDataCount = res.totdatacount;
        this.totPage = Math.ceil(this.totalDataCount / this.itemsPerPage);
        this.PagiData = res.Data;
      },
      (error: any) => {
      //  console.log(error);
      // window.alert('Enter values in limit');
      }
    );
    }
  }

     // Function for First page
     first() {
      this.pageNo = 1;
      if (this.currentPage <= 1) {
      } else {
      this.currentPageNumber(this.pageNo, this.pos);
      }
    }

    // Function for Previous page
  previous() {
    this.pageNo = this.currentPage - 1;
    if (this.currentPage <= 1) {
    } else {
    this.currentPageNumber(this.pageNo, this.pos);
    }
  }

  // Function for Next page
  next() {
    this.pageNo = this.currentPage + 1;
    if (this.currentPage >= this.totPage) {

    } else {
    this.currentPageNumber(this.pageNo, this.pos);
    }
  }

  // Function for Last page
  lastPage() {
    this.pageNo = this.totPage;
    if (this.currentPage >= this.totPage) {

    } else {
    this.currentPageNumber(this.pageNo, this.pos);
    }
  }

  // Function to check Last page
  isLastPage() {
    if (this.currentPage === this.totPage) {
      // console.log('last page');
      return false;
    } else {
      return true;
    }
  }

  // Function for Current page number
  currentPageNumber(no, posi) {
    this.paginatedData(no, posi);
  }

  // Function to check First page
  isFirstPage() {
    if (this.currentPage === 1) {
      // console.log('last page');
      return false;
    } else {
      return true;
    }
  }
}

import { Injectable } from '@angular/core';
import { Observable } from '../../../node_modules/rxjs';
import { HttpClient } from '@angular/common/http';

@Injectable()

export class EmpdataService {

  private url = 'http://localhost/Php/cakePhp/empDataManipulation/backend/';

  constructor(private _httpClient: HttpClient) { }

// data(): Observable<any> {
//   return this._httpClient.get(
//     'http://192.168.12.194/Php/cakePhp/backend/'
//   );
// }

// count(): Observable<any> {
//   return this._httpClient.get(
//     this.url + 'count'
//   );
// }

// search(rank: any): Observable<any> {
//   return this._httpClient.get(
//     'http://192.168.12.194/Php/cakePhp/backend/view/' + rank
//   );
// }

xpost(link: any, params: any): Observable<any> {
  return this._httpClient.post(
    this.url + link,
    params
  );
}

// pagination(no: any, rank: any): Observable<any> {
//   return this._httpClient.get(
//     this.url + 'page/' + no + '/' + rank
//   );
// }

xget(extrainfo: any): Observable<any> {
  return this._httpClient.post(
    this.url + extrainfo, null);
}
}

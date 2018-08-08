import { Injectable } from '@angular/core';
import {Observable} from "rxjs";
import 'rxjs/add/operator/map';  
import 'rxjs/add/operator/catch';
import { EnvironmentService } from "./../shared/environment/environment.service";
import { HttpClient, HttpErrorResponse } from '@angular/common/http';

@Injectable()
export class ImdbService {

  constructor(
  		private _http: HttpClient,
    	private environmentService: EnvironmentService
  	) {}

  // Get Movie Detail By Title Search
  // Method : GET
  // API Route Name : title
  getIMDBData($title){
    let url = this.environmentService.setApiServiceById('title', $title)
    return this._http.get(url)
        .map(res=> res)
        .catch(this.handleError)
  }

  // Error Handler
  private handleError (error: HttpErrorResponse | any) {
    let errMsg: string;
    errMsg = error.error
    console.error(errMsg);
    return Observable.throw(errMsg);
  }

}

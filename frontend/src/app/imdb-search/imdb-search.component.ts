import { Component,ViewChild, OnInit } from '@angular/core';
import { ModalDirective } from 'ngx-bootstrap/modal';
import { ImdbService } from "./imdb.service";

@Component({
  selector: 'app-imdb-search',
  templateUrl: './imdb-search.component.html',
  styleUrls: ['./imdb-search.component.css']
})
export class ImdbSearchComponent implements OnInit {

  imdbData = {search_txt:'', year:'', filter_by:''}
  message = ''
  resData = {status:'false'}
  
  constructor(
  		private imdbService: ImdbService
    ) { }

  ngOnInit() {
  }

  // Get Movie Detail By Title Search
  // Service Name : ImdbService
  // Method : GET
  getIMDBData() {
    var imdbData = this.imdbData
    
    if (imdbData.filter_by != '') {
      if (imdbData.filter_by == '1') {
        this.imdbService.getIMDBDataByID(imdbData.search_txt)
          .subscribe((response) => {
            this.resData = response.data
            if (this.resData.status == 'false') {
                this.message = response.data.message
            } else {
                this.message = ''
            }
        });
      } else if (imdbData.filter_by == '2') {
        if (imdbData.year != '') {
          this.imdbService.getIMDBDataByKeyword(imdbData.search_txt, imdbData.year)
            .subscribe((response) => {
              this.resData = response.data
              if (this.resData.status == 'false') {
                  this.message = response.data.message
              } else {
                  this.message = ''
              }
          });
        } else {
          this.imdbService.getIMDBData(imdbData.search_txt)
            .subscribe((response) => {
              this.resData = response.data
              if (this.resData.status == 'false') {
                  this.message = response.data.message
              } else {
                  this.message = ''
              }
          });
        }
      }
    } else {
      this.imdbService.getIMDBData(imdbData.search_txt)
            .subscribe((response) => {
              this.resData = response.data
              if (this.resData.status == 'false') {
                  this.message = response.data.message
              } else {
                  this.message = ''
              }
          });
    }
  }

}

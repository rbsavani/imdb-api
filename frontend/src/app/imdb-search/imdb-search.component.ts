import { Component,ViewChild, OnInit } from '@angular/core';
import { ModalDirective } from 'ngx-bootstrap/modal';
import { ImdbService } from "./imdb.service";

@Component({
  selector: 'app-imdb-search',
  templateUrl: './imdb-search.component.html',
  styleUrls: ['./imdb-search.component.css']
})
export class ImdbSearchComponent implements OnInit {

  imdbData = {title:''}
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
    var title = this.imdbData.title
    this.imdbService.getIMDBData(title)
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

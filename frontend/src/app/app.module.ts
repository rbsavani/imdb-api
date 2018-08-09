import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule } from '@angular/forms';
import { BsDropdownModule } from 'ngx-bootstrap/dropdown';
import { TooltipModule } from 'ngx-bootstrap/tooltip';
import { ModalModule } from 'ngx-bootstrap';
import { HttpModule } from '@angular/http';
import { Ng4LoadingSpinnerModule } from 'ng4-loading-spinner';
import { NgxPaginationModule } from 'ngx-pagination';
import { SweetAlert2Module } from '@toverux/ngx-sweetalert2';
import { AlertModule } from 'ngx-bootstrap/alert'; 
import { EnvironmentModule } from './shared';
import { FormValidationModule } from './shared';
import { NotificationModule } from './shared';

// Component
import { AppRoutingModule }     from './app-routing.module';
import { AppComponent } from './app.component';
import { ImdbService } from "./imdb-search/imdb.service";
import { SnotifyModule, SnotifyService, ToastDefaults } from 'ng-snotify';
import { ImdbSearchComponent } from './imdb-search/imdb-search.component';

@NgModule({
  declarations: [
    AppComponent,
    ImdbSearchComponent,
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    FormsModule,
    HttpModule,
    EnvironmentModule,
    FormValidationModule,
    NotificationModule,
    BsDropdownModule.forRoot(),
    TooltipModule.forRoot(),
    ModalModule.forRoot(),
    Ng4LoadingSpinnerModule.forRoot(),
    AlertModule.forRoot(),
    SweetAlert2Module.forRoot(),
    NgxPaginationModule,
    AppRoutingModule,
    SnotifyModule,
    ModalModule.forRoot()
  ],
  providers: [
    ImdbService,
    { provide: 'SnotifyToastConfig', useValue: ToastDefaults},
    SnotifyService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }

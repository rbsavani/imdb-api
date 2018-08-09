import { NgModule }             from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
 
import { ImdbSearchComponent }   from './imdb-search/imdb-search.component';
import { PublicGuard, ProtectedGuard } from 'ngx-auth';

const routes: Routes = [
  { 
    path: '', 
    redirectTo: '/imdb-search', 
    pathMatch: 'full' 
  },
  {
    path: 'imdb-search',
    component: ImdbSearchComponent 
  },
  // { path: 'book/add', canActivate: [ ProtectedGuard ], component: BooksAddComponent },
  // { path: 'book/update/:id', canActivate: [ ProtectedGuard ], component: BooksUpdateComponent },
  // { path: 'login', canActivate: [ PublicGuard ], component: LoginComponent },
  // { path: 'logout', canActivate: [ ProtectedGuard ], component: LogoutComponent },
  // { path: 'about', component: AboutComponent },
  // { path: 'register', canActivate: [ PublicGuard ], component: RegisterComponent },
  { path: '**', pathMatch: 'full', redirectTo: '/' } // catch any unfound routes and redirect to home page
];
 
@NgModule({
  imports: [ RouterModule.forRoot(routes) ],
  exports: [ RouterModule ]
})
export class AppRoutingModule {}
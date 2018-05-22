/*class ErrorsController {
    constructor() { this.ErrorsController      = {}; }
    get( field ){
       if ( this.ErrorsController[field]){
        return this.ErrorsController[field][0];     }
    }
   record   ( errors ) {    this.ErrorsController = errors;                          }
   clear    ( field  ) {    delete this.ErrorsController[field] ;                  }
   has      ( field  ) {    return this.ErrorsController.hasOwnProperty( field );  }
   any      (        ) {    return Object.keys(this.ErrorsController).length > 0 ; }
   clearall (        ) {    this.ErrorsController      = {};                        }
}
*/

let ErrorsController = {
  methods:{
    constructor() {
      this.ErrorsController      = {};
       },
      get( field ){
         if ( this.ErrorsController[field]){
          return this.ErrorsController[field][0];     }
      },
     record   ( errors ) {
      this.ErrorsController = errors;
       },
     clear    ( field  ) {
          delete this.ErrorsController[field] ;
        },
     has      ( field  ) {
          return this.ErrorsController.hasOwnProperty( field );
        },
     any      () {
        return Object.keys(this.ErrorsController).length > 0 ;
      },
     clearall () {
          this.ErrorsController      = {};
      }
  }
}

export default ErrorsController



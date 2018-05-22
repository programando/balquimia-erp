<template>
      <div>
        <div class="row" >

          <div class="col-sm-8 col-sm-offset-2">
            <div class="box box-primary">
              <div class="box-header with-border">
              <h3 >{{ Windows_Title }}

                <button class="btn  pull-right bg-blue" @click="ModalOpen('NuevoRegistro')"> Crear Nuevo Registro</button>

                </h3>
              </div>

              <div class="box-body">
                <table  class="display table-bordered table-striped table-condensed" style="width:100%;">
                  <thead>
                    <tr>
                      <th v-text="Table_Column1"></th>
                      <th v-text="Table_Column2"></th>
                      <th v-text="Table_Column3"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="Registro in DatosTabla" :key="DatosTabla.id_cargo">
                      <td v-text="Registro.nom_cargo"></td>
                      <td>
                        <div v-if="Registro.inactivo"> <span class="bg-red"> &nbsp; Inactiva &nbsp;</span></div>
                      </td>
                      <td class="text-center"width="15px">

                        <button type="button" class="btn btn-success btn-xs"   title="Editar registro"
                        @click="ModalOpen('ActualizarRegistro', Registro )">
                        <i class="fa  fa-pencil" ></i>
                      </button>


                      <button type="button" class="btn btn-danger btn-xs"   title="Eliminar registro"
                      @click="BorrarShowForm( Registro.id_cargo, Registro.nom_cargo )">
                      <i class="fa fa-trash-o" ></i>
                    </button> &nbsp;

                  </td>
                </tr>
              </tbody>
            </table>
            <div class="text-center">
              <nav>
                <ul class="pagination pg-amber">
                  <li  v-if="pagination.current_page > 1">
                    <a  href="#" @click.prevent="cambiarPagina(pagination.current_page - 1)">
                      <i class="fa fa-chevron-circle-left"></i></a>
                    </li>
                    <li  v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                      <a  href="#" @click.prevent="cambiarPagina(page)" v-text="page"></a>
                    </li>
                    <li  v-if="pagination.current_page < pagination.last_page">
                      <a  href="#" @click.prevent="cambiarPagina(pagination.current_page + 1)">
                        <i class="fa fa-chevron-circle-right"></i>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>

            </div>
          </div>
        </div>




          <!-- MODAL PARA EDITAR Y GRABAR NUEVOS REGISTROS -->
          <div class="modal fade" :class="{'mostrar':ModalShowNewEdit}" tabindex="-1" role="dialog" >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header bg-blue">
                  <button type="button" class="close"  aria-label="Close" @click="ModalClose()">
                    <span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" v-text="ModalTitle"></h4>
                </div>
                <div class="modal-body">

                  <form action="" method="post" enctype="multipart/form-data" @keydown="errors.clear($event.target.name)">
                      <label>Nombre/Descripción del Cargo :</label>

                      <div class="form-group has-feedback" :class = "{ 'has-error': errors.has('nom_cargo')}">
                        <div class="form-line"  >
                          <input type="text" class="form-control"
                            autofocus = "autofocus"
                            name      = 'nom_cargo'
                            v-model   = "nom_cargo"
                             >
                        </div>

                        <i class="fa  fa-hand-o-right error" v-if="errors.has('nom_cargo')"></i>
                        <label class="error"  v-if="errors.has('nom_cargo')" v-text="errors.get('nom_cargo')"></label>

                      </div>
                      <!-- Campo Inactivo -->
                       <div v-if="tipoAccion==2">
                          <input type="checkbox" id="md_checkbox_21"
                            v-model="inactivo" :checked="inactivo" name="inactivo">
                          <label for="md_checkbox_21" v-if="inactivo" v-text="Modal_Campo_Inactivo"></label>
                          <label for="md_checkbox_21" v-if="!inactivo" v-text="Modal_Campo_Activo"></label>
                      </div>
                      <input type="hidden" v-model="id_cargo">
                  </form>

                </div>

                <div class="modal-footer">
                  <button type="button" class="btn bg-deep-orange"                      @click="ModalClose()">Cerrar</button>
                  <button type="button" class="btn btn-success"    v-if="tipoAccion==1" @click="Grabar()"     :disabled="errors.any()">Grabar Registro</button>
                  <button type="button" class="btn btn-success"    v-if="tipoAccion==2" @click="Actualizar()" :disabled="errors.any()">Actualizar Registro</button>
                </div>

              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div> <!--Fin del modal-->

         <!-- MODAL PARA BORRAR REGSITRO -->
        <div class="modal fade"  tabindex="-1" role="dialog" :class="{'mostrar-borrar':ModalShowDelete}">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-red">
                <button type="button" class="close" aria-label="Close" @click="ModalClose()">
                  <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Eliminar registro ?</h4>
              </div>
              <div class="modal-body">
                <p>Confirma que desea borrar el registro : <br>
                  &nbsp;&nbsp;&nbsp;<strong v-text="nom_cargo"> </strong>&nbsp; ?</p>
                <input type="hidden" v-model="id_cargo">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn bg-deep-orange" @click="ModalClose()">Cerrar</button>
                <button type="button" class="btn btn-success"    @click="Borrar()">Eliminar registro</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>   <!-- Fin del modal Eliminar -->



    </div>
    </div>
</template>




<script>



class ErrorsController {
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

//import FormClass from '../../formClass.js';

    export default {

        mounted() {
            this.Listar();
           },


        data: function() {
            return {
                 errors             : new ErrorsController,
                 id_cargo             : 0,
                 nom_cargo            : '',
                 inactivo           : '',
                 DatosTabla             : [],
                 RutaBase           : '/cargos',
                 ModalShowDelete    : 0,
                 ModalShowNewEdit   : 0,
                 ModalTitle         : '',
                 TextoDeleted       : 'Registro eliminado con éxito !!!',
                 TextoIntegridadRef : 'No es posible borrar el registro porque causaría inconsistencias en la base de datos !',
                 TextoSave          : 'Registro grabado con éxito !!!',
                 TextoUpdate        : 'Registro actualizado con éxito !!!',
                 tipoAccion         : 0,
                 pagination : {
                      'total'        : 0,
                      'current_page' : 0,
                      'per_page'     : 0,
                      'last_page'    : 0,
                      'from'         : 0,
                      'to'           : 0,
                  },
                  offset : 3,
                  Windows_Title        : 'Cargos',
                  Table_Column1        : 'Descripción Cargo',
                  Table_Column2        : 'Estado',
                  Table_Column3        : 'Editar/Eliminar',
                  Modal_Campo_Inactivo : 'Cargo INACTIVO',
                  Modal_Campo_Activo   : 'Cargo ACTIVO',
              }
       },


      computed:{
                isActived: function(){
                    return this.pagination.current_page;
                },
                //Calcula los elementos de la paginación
                pagesNumber: function() {
                    if(!this.pagination.to) {
                        return [];
                    }
                    var from = this.pagination.current_page - this.offset;
                    if(from < 1) {
                        from = 1;
                    }
                    var to = from + (this.offset * 2);
                    if(to >= this.pagination.last_page){
                        to = this.pagination.last_page;
                    }
                    var pagesArray = [];
                    while(from <= to) {
                        pagesArray.push(from);
                        from++;
                    }
                    return pagesArray;
                }

            },

         methods: {
            Listar: function( page=1 ){
                let Me  = this;
                let URL = Me.RutaBase  +'?page=' + page ;
                axios.get( URL   ).then(function ( response ) {
                    Me.DatosTabla     =  response.data.Registros.data;
                    Me.pagination     =  response.data.pagination;
                })
                .catch(  this.onFail );
            },

            cambiarPagina(page,buscar,criterio){
                let me = this;
                //Actualiza la página actual
                me.pagination.current_page = page;
                //Envia la petición para visualizar la data de esa página
                me.Listar(page);
            },

            Grabar(){
                let Me = this;
                axios.post( Me.RutaBase,{'nom_cargo' : Me.nom_cargo
                }).then(function ( response ) {
                    Me.ModalClose();
                    Me.Listar();
                    toastr.success( Me.TextoSave );
                })
                .catch(  this.onFail );
            },

            Actualizar(){
                let Me   = this;
                let URL  = Me.RutaBase + '/'+Me.id_cargo;
                let Data = Me.UnidadesMedida;
                axios.put( URL ,{'nom_cargo' : Me.nom_cargo, 'id_cargo' : Me.id_cargo, 'inactivo' : Me.inactivo
                }).then(function ( response ) {
                    Me.ModalClose();
                    Me.Listar();
                    toastr.success( Me.TextoUpdate );
                }).catch(  this.onFail );
            },


            Borrar(){
                  let Me = this;
                  var url = Me.RutaBase   + '/'+this.id_cargo;
                  axios.delete(url).then(response => {
                    Me.ModalClose();
                    Me.Listar();
                    toastr.success( Me.TextoDeleted );
                  }).catch( error => {
                      toastr.error( Me.TextoIntegridadRef );
                    });
               },

            BorrarShowForm( IdRegistro, NomMedida ){
                    this.id_cargo          = IdRegistro;
                    this.nom_cargo         = NomMedida;
                    this.ModalShowDelete = 1;
            },


            onFail: function (error){
              this.errors.record( error.response.data.errors);
           },


            ModalOpen: function( accion, data=[] ){
                switch ( accion ){
                    case "NuevoRegistro":  {
                        this.ModalShowNewEdit = 1;
                        this.ModalTitle       ='Crear Cargo';
                        this.nom_cargo          = '';
                        this.tipoAccion       = 1;
                        break;
                    }
                    case "ActualizarRegistro" : {
                        this.id_cargo           = data.id_cargo;
                        this.inactivo         = data.inactivo;
                        this.nom_cargo          = data.nom_cargo;
                        this.ModalShowNewEdit = 1;
                        this.ModalTitle       ='Modificar Cargo';
                        this.tipoAccion       = 2;
                        break;
                    }
                }
            },

            ModalClose(){
                this.errors.clearall();
                this.id_cargo           = '';
                this.nom_cargo          = '';
                this.ModalShowDelete  = 0;
                this.ModalShowNewEdit = 0;
                this.ModalTitle       = '';

            },
         },

    };
</script>



<style >
        .modal-content{
             width: 100% !important;
              position: absolute !important;
        }

        .mostrar{
            display: list-item !important;
            opacity: 1 !important;
            position: absolute !important;
            background-color: #3c29297a !important;
        }


        .mostrar-borrar{
            display: list-item !important;
            opacity: 1 !important;
            position: absolute !important;
            background-color: #3c29297a !important;

        }

        .centrar{
          margin: 0 auto;
        }

</style>

<template>
      <div>
        <div class="row" >

          <div class="col-sm-10 col-sm-offset-1">
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
                      <th> Sub-Lineas</th>
                      <th v-text="Table_Column4"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="Registro in DatosTabla" :key="DatosTabla.id_linea">
                       <td v-text="Registro.cod_linea"></td>
                      <td v-text="Registro.nom_linea"></td>
                      <td>
                        <div v-if="Registro.inactivo"> <small><span class="bg-red">&nbsp; Inactiva &nbsp;</span></small></div>
                      </td>

                      <td>
                          <sublineas :Registro="Registro"></sublineas>
                      </td>

                      <td class="text-center"width="15px">
                          <button type="button" class="btn btn-success btn-xs"   title="Editar registro"
                          @click="ModalOpen('ActualizarRegistro', Registro )">
                          <i class="fa  fa-pencil" ></i>
                        </button>


                        <button type="button" class="btn btn-danger btn-xs"   title="Eliminar registro"
                        @click="BorrarShowForm( Registro.id_linea, Registro.nom_linea )">
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

                    <div class="form-group ">
                       <div v-if="tipoAccion==1" class="form-group "  has-feedback :class = "{ 'has-error': errors.has('cod_linea')}">
                      <div class="row" >
                         <div class="col-sm-3">
                             <label for="codlinea" class="control-label">Código:</label>
                         </div>
                           <div class="col-sm-5 form-line">
                             <input type="text" class="form-control" name = 'cod_linea' v-model   = "cod_linea" >
                             <i class="fa  fa-hand-o-right error" v-if="errors.has('cod_linea')"></i>
                            <label class="error"  v-if="errors.has('cod_linea')" v-text="errors.get('cod_linea')"></label>
                         </div>

                      </div>
                    </div>

                      <div class="form-group " has-feedback :class = "{ 'has-error': errors.has('nom_linea')}">
                      <div class="row" >
                         <div class="col-sm-3">
                             <label for="codlinea" class="control-label">Nombre Línea:</label>
                         </div>
                           <div class="col-sm-9 form-line">
                             <input type="text" class="form-control" name = 'nom_linea' v-model   = "nom_linea" >
                                                      <i class="fa  fa-hand-o-right error" v-if="errors.has('nom_linea')"></i>
                        <label class="error"  v-if="errors.has('nom_linea')" v-text="errors.get('nom_linea')"></label>
                         </div>

                      </div>
                    </div>
                </div>
                      <!-- Campo Inactivo -->
                     <div class="form-group">
                       <div v-if="tipoAccion==2">
                          <input type="checkbox" id="md_checkbox_21"
                            v-model="inactivo" :checked="inactivo" name="inactivo">
                          <label for="md_checkbox_21" v-if="inactivo" v-text="Modal_Campo_Inactivo"></label>
                          <label for="md_checkbox_21" v-if="!inactivo" v-text="Modal_Campo_Activo"></label>
                      </div>
                      <input type="hidden" v-model="id_linea">
                    </div>


                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-12">
                            <label v-if="Registro.sub_lineas_count > 0"  class="control-label">Sub-Líneas asociadas:</label>
                            <sublineas :Registro="Registro"></sublineas>
                          </div>
                     </div>
                    </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-12">
                            <label   class="control-label"> Asociar Sub-Líneas</label>

                            <div class="form-group">
                               <select class            = "form-control select2" v-model="sublineasagregadas"
                                        multiple        = "multiple"
                                        name            = "sublineas[]"
                                        style           = "width: 100%;"  >
                                      <option v-for="SubLinea in SubLineasFaltantes" :value="SubLinea.id_sub_linea">
                                      {{ SubLinea.nom_sub_linea }}</option>
                                </select>
                            </div>


                          </div>
                     </div>
                    </div>

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
                  &nbsp;&nbsp;&nbsp;<strong v-text="nom_linea"> </strong>&nbsp; ?</p>
                <input type="hidden" v-model="id_linea">
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


    export default {

        mounted() {
            this.Listar();
           },


        data: function() {
            return {
                 errors             : new ErrorsController,
                 id_linea             : 0,
                 nom_linea            : '',
                 inactivo           : '',
                 cod_linea          :'',
                 DatosTabla             : [],
                 RutaBase           : '/lineas',
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
                  Windows_Title        : 'Líneas de Producto',
                  Table_Column1        : 'Cód.',
                  Table_Column2        : 'Nombre Línea',
                  Table_Column3        : '  Estado...',
                  Table_Column4        : 'Editar/Eliminar',
                  Modal_Campo_Inactivo : 'Línea INACTIVA',
                  Modal_Campo_Activo   : 'Línea ACTIVA',
                  Registro             : {},
                  SubLineasFaltantes            : {},
                  sublineasagregadas : {},
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
                axios.get( URL   )
                  .then(function ( response ) {
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
                axios.post( Me.RutaBase,{'nom_linea' : Me.nom_linea, 'cod_linea': Me.cod_linea
                }).then(function ( response ) {
                    Me.ModalClose();
                    Me.Listar();
                    toastr.success( Me.TextoSave );
                })
                .catch(  this.onFail );
            },

            Actualizar(){
                let Me   = this;
                let URL  = Me.RutaBase + '/'+Me.id_linea;
                let Data = Me.UnidadesMedida;
                axios.put( URL ,{'nom_linea' : Me.nom_linea, 'id_linea' : Me.id_linea, 'inactivo' : Me.inactivo, 'cod_linea': Me.cod_linea
                }).then(function ( response ) {
                    Me.ModalClose();
                    Me.Listar();
                    toastr.success( Me.TextoUpdate );
                }).catch(  this.onFail );
            },


            Borrar(){
                  let Me = this;
                  var url = Me.RutaBase   + '/'+this.id_linea;
                  axios.delete(url).then(response => {
                    Me.ModalClose();
                    Me.Listar();
                    toastr.success( Me.TextoDeleted );
                  }).catch( error => {
                      toastr.error( Me.TextoIntegridadRef );
                    });
               },

            BorrarShowForm( IdRegistro, NomMedida ){
                    this.id_linea          = IdRegistro;
                    this.nom_linea         = NomMedida;
                    this.ModalShowDelete = 1;
            },

            SubLineasFaltantesPorLinea( idLinea) {
                let Me  = this;
                let URL = '/sublineas-linea/'+ idLinea;
                Me.SubLineasFaltantes = {};
                axios.get( URL   )
                  .then(function ( response ) {
                      console.log( response.data);
                      Me.SubLineasFaltantes = response.data;
                })
                .catch( error =>{
                    console.log ( error );
                } );
            },

            onFail: function (error){
              this.errors.record( error.response.data.errors);
           },


            ModalOpen: function( accion, data=[] ){
                switch ( accion ){
                    case "NuevoRegistro":  {
                        this.ModalShowNewEdit = 1;
                        this.ModalTitle       ='Crear Línea';
                        this.nom_linea          = '';
                        this.tipoAccion       = 1;
                        break;
                    }
                    case "ActualizarRegistro" : {
                        this.SubLineasFaltantesPorLinea(data.id_linea);
                        this.id_linea           = data.id_linea;
                        this.inactivo         = data.inactivo;
                        this.nom_linea          = data.nom_linea;
                        this.cod_linea        = data.cod_linea;
                        this.ModalShowNewEdit = 1;
                        this.ModalTitle       ='Modificar Línea';
                        this.tipoAccion       = 2;
                        this.Registro         = data;
                        break;
                    }
                }
            },

            ModalClose(){
                this.errors.clearall();
                this.id_linea           = '';
                this.nom_linea          = '';
                this.cod_linea         = '';
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

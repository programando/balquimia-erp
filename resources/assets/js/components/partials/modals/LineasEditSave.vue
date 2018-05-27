<template>
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
                       <div v-if="tipoAccion==2">
                          <input type="checkbox" id="md_checkbox_21"
                            v-model="inactivo" :checked="inactivo" name="inactivo">
                          <label for="md_checkbox_21" v-if="inactivo" v-text="Modal_Campo_Inactivo"></label>
                          <label for="md_checkbox_21" v-if="!inactivo" v-text="Modal_Campo_Activo"></label>
                      </div>
                      <input type="hidden" v-model="id_linea">
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


</template>

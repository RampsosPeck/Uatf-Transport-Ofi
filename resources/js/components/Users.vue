<template>
    <div class="container">
        <div class="row justify-content-center">
              <div class="col-md-12 mt-5">
                <div class="card card-info">
                  <div class="card-header ">

                    <div class="card-title ">LISTA DE USUARIOS</div> 
                    <div class="card-tools">
                        
                    <button class="btn btn-success pull-left" @click="newModal" >Nuevo Usuario <i class="fas fa-user-plus fa-fw"></i></button>
                    
                    </div>
                    
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0" style="background-color: #afe7f4;">
                    <table class="table table-hover table-striped">
                        <tbody>
                          <tr>
                            <th>Nro.</th> 
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Celular</th> 
                            <th>Cédula</th>
                            <th>R.U.</th>
                            <th>TIPO</th>
                            <th>Creación</th>
                            <th>Opciones</th>
                          </tr>
                          <tr v-for="user in users.data" :key="user.id">
                            <td v-text="user.id"></td> 
                            <td v-text="user.name"></td>
                            <td v-text="user.email"></td> 
                            <td v-text="user.phone"></td>
                            <td v-text="user.cedula"></td>
                            <td v-text="user.ru"></td>
                            <td>{{ user.type }}</td>
                            <td>{{ user.created_at | myDate }}</td>
                            <td>
                                  <a href="#" @click="editModal(user)" data-toggle="tooltip" data-placement="left" title="Editar Usuario">
                                      <i class="fas fa-edit blue"></i>
                                  </a> /
                                <template v-if="user.active">  
                                  <a href="#" @click="desactivateUser(user.id)" data-toggle="tooltip" data-placement="right" title="Desactivar Usuario">
                                     <i class="fas fa-trash red"></i>
                                  </a>
                                </template>
                                <template v-else>
                                  <a href="#" @click="activateUser(user.id)" data-toggle="tooltip" data-placement="right" title="Activar Usuario">
                                     <i class="fas fa-user green"></i>
                                  </a>
                                </template>
                            </td>
                          </tr>
                        </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer d-block mx-auto py-12 fondomio">
                     <pagination :data="users" @pagination-change-page="getResults"></pagination>

                  </div>
                </div>
                <!-- /.card -->
              </div>
        </div> 
        <!-- Modal -->
            <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                     

                    <h5 v-show="!editmode" class="modal-title text-center yellow"   id="addNewLabel">
                        <b>UNIVERSIDAD AUTÓNOMA TOMÁS FRÍAS <br> DEPTO. DE INFRAESTRUCTURA</b> <br>
                        <center><img class="img-rounded" width="120" src="/img/people.png"></center>
                      Transporte Universitario | Nuevo Usuario</h5>

                      <h5 v-show="editmode" class="modal-title text-center yellow"   id="addNewLabel">
                        <b>UNIVERSIDAD AUTÓNOMA TOMÁS FRÍAS <br> DEPTO. DE INFRAESTRUCTURA</b> <br>
                        <center><img class="img-rounded" width="120" src="/img/update.png"></center>
                      Actualizar Usuario</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                <form @submit.prevent="editmode ? updateUser() : createUser()" >
                       
                  <div class="modal-body">   
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label text-md-right yellow">Nombre y Apellido:</label>
                            <div class="col-md-8">
                                <input v-model="form.name" type="text" name="name"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" placeholder="Ing./Lic./Doc.">
                                  <has-error :form="form" field="name"></has-error>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="entity" class="col-sm-4 col-form-label text-md-right yellow">Entidad:</label>
                            <div class="col-md-8">
                                <input v-model="form.entity" type="text" name="entity"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('entity') }" placeholder="Entidad o Carrera">
                                  <has-error :form="form" field="entity"></has-error>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right yellow">Email:</label>
                            <div class="col-md-8">
                                <input v-model="form.email" type="email" name="email"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" placeholder="Correo electrónico">
                                  <has-error :form="form" field="email"></has-error>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="cedula" class="col-sm-2 col-form-label text-md-right yellow">C.I.:</label>
                            <div class="col-md-4">
                                <input v-model="form.cedula" type="text" name="cedula"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('cedula') }" placeholder="Nro. de Carnet">
                                  <has-error :form="form" field="cedula"></has-error>
                            </div>

                            <label for="phone" class="col-sm-2 col-form-label text-md-right yellow">Celular:</label>
                            <div class="col-md-4">
                                <input v-model="form.phone" type="number" name="phone"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }" placeholder="Teléfono">
                                  <has-error :form="form" field="phone"></has-error>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ru" class="col-sm-2 col-form-label text-md-right yellow">R.U.:</label>
                            <div class="col-md-4">
                                <input v-model="form.ru" type="number" name="ru"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('ru') }" placeholder="Nro. de Carnet">
                                  <has-error :form="form" field="ru"></has-error>
                            </div>
          
                            <label for="saldo" class="col-sm-2 col-form-label text-md-right yellow">Saldo:</label>
                            <div class="col-md-4">
                                <input v-model="form.saldo" type="number" name="saldo"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('saldo') }" placeholder="Saldo/Crédito">
                                  <has-error :form="form" field="saldo"></has-error>
                            </div>
                        </div>

                        <div class="form-group row"> 
                            <label for="genero" class="col-sm-2 col-form-label text-md-right yellow">Género:</label>
                            <div class="col-md-4">
                              <select name="genero" v-model="form.genero" id="genero" class="form-control" :class="{'is-invalid': form.errors.has('genero') }">
                                  <option value="">Seleccione un género</option>
                                  <option value="masculino">Masculino</option>
                                  <option value="femenino">Femenino</option>
                                  <option value="otro">Otro</option>
                              </select>
                              <has-error :form="form" field="genero"></has-error>
                            </div>

                            <label for="type" class="col-sm-2 col-form-label text-md-right yellow">Tipo:</label>
                            <div class="col-md-4">
                              <select name="type" v-model="form.type" id="type" class="form-control" :class="{'is-invalid': form.errors.has('type') }">
                                  <option value="">Seleccione el rol del Usuario</option> 
                                  <option value="Jefatura">Jefatura</option>
                                  <option value="Supervisor">Supervisor</option>
                                  <option value="Docente">Docente</option>
                                  <option value="Estudiante">Estudiante</option>
                                  <option value="Conductor">Conductor</option>
                                  <option value="Portero">Portero</option>
                                  <option value="Administrativo">Administrativo</option>
                              </select>
                              <has-error :form="form" field="type"></has-error>
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
                    <button v-show="editmode" type="submit" class="btn btn-info">ACTUALIZAR</button>
                    <button v-show="!editmode" type="submit" class="btn btn-primary">GUARDAR</button>
                  </div>

                </form>  
                </div>
              </div>
            </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                editmode: false,
                users : {},
                form: new Form({
                    id: '',
                    entity: '',
                    name: '',
                    cedula: '',
                    phone: '',
                    ru: '',
                    email: '',
                    password: '',
                    type_id: '',
                    active: '',
                    avatar: ''
                })
            }
        },
        methods: {
            getResults(page = 1) {
              axios.get('api/user?page=' + page)
                .then(response => {
                  this.users = response.data;
                });
            },
            updateUser(id){
                this.$Progress.start();

                this.form.put('api/user/'+this.form.id)
                .then(() => {
                    $('#addNew').modal('hide');
                    swal.fire(
                        'Actualizado!',
                        'La información fue actualizada.',
                        'success'
                    )
                    this.$Progress.finish();
                    Fire.$emit('AfterCreate');
                })
                .catch(() => {
                    this.$Progress.fail();
                });
            },
            editModal(user){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(user);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            activateUser(id){
                swal.fire({
                  title: '¿Estás seguro?',
                  text: "Quieres activar al usuario?",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si, activar!'
                }).then((result) => {
                       
                      if(result.value)
                        {
                            this.form.get('api/user/'+id).then(()=>{
                                
                                swal.fire(
                                    'Activado!',
                                    'El usuario fué activado con éxito.',
                                    'success' 
                                )
                                Fire.$emit('AfterCreate');      
                            }).catch(()=>{
                                swal.fire({
                                    type: 'error',
                                    title: 'Oops algó salio mal vuelva a intentar!',
                                    showConfirmButton: false,
                                    timer: 3000
                                  })
                            })
                        }
                        
                })
            },
            desactivateUser(id){
                swal.fire({
                  title: '¿Estás seguro?',
                  text: "Quieres desactivar al usuario?",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si, desactivar!'
                }).then((result) => {
                       
                      if(result.value)
                        {
                            this.form.delete('api/user/'+id).then(()=>{
                                
                                swal.fire(
                                    'Desactivado!',
                                    'El usuario fué deactivado con éxito.',
                                    'success' 
                                )
                                Fire.$emit('AfterCreate');      
                            }).catch(()=>{
                                swal.fire({
                                    type: 'error',
                                    title: 'Oops algó salio mal vuelva a intentar!',
                                    showConfirmButton: false,
                                    timer: 3000
                                  })
                            })
                        }
                        
                })
            },
            loadUsers(){
                axios.get("api/user").then(({ data }) => (this.users = data));
            },
            createUser(){
           
                this.$Progress.start(); 
                this.form.post('api/user')
                .then(()=>{

                    Fire.$emit('AfterCreate');
                    $('#addNew').modal('hide')

                    //toast.fire({
                    swal.fire({
                      type: 'success',
                      title: 'Usuario creado correctamente',
                      showConfirmButton: false,
                      timer: 3000
                    })

                    this.$Progress.finish();

                })
                .catch(()=>{
                   this.$Progress.fail();
                    swal.fire({
                      type: 'error',
                      title: 'Oops algó salio mal vuelva a intentar!',
                      showConfirmButton: false,
                      timer: 3000
                    })
                })

            }
        },
        created() {
            Fire.$on('searching',()=> {
              let query = this.$parent.search; 
              axios.get('api/findUser?q=' + query)
              .then((data)=>{
                  this.users = data.data
              
              })
              .catch(()=>{
                  
              })
            })

            this.loadUsers();
            Fire.$on('AfterCreate',() => {
                this.loadUsers();
            });
        }
    }
</script>
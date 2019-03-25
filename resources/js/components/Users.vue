<template>
    <div class="container">
        <div class="row justify-content-center">
              <div class="col-md-12 mt-5">
                <div class="card card-info">
                  <div class="card-header ">

                    <div class="card-title ">LISTA DE USUARIOS</div> 
                    <div class="card-tools">
                        
                    <button class="btn btn-success pull-left" data-toggle="modal" data-target="#addNew">Nuevo Usuario <i class="fas fa-user-plus fa-fw"></i></button>
                    
                    </div>
                    
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0" style="background-color: #afe7f4;">
                    <table class="table table-hover table-striped">
                        <tbody>
                          <tr>
                            <th>Nro.</th>
                            <th>Entidad</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Celular</th>
                            <th>Saldo</th>
                            <th>Cédula</th>
                            <th>R.U.</th>
                            <th>TIPO</th>
                            <th>Creación</th>
                            <th>Opciones</th>
                          </tr>
                          <tr v-for="user in users" :key="user.id">
                            <td v-text="user.id"></td>
                            <td v-text="user.entity"></td>
                            <td v-text="user.name"></td>
                            <td v-text="user.email"></td>
                            <td v-text="user.phone"></td>
                            <td v-text="user.phone"></td>
                            <td v-text="user.cedula"></td>
                            <td v-text="user.ru"></td>
                            <td>{{ user.type | upText }}</td>
                            <td>{{ user.created_at | myDate }}</td>
                            <td>
                                 <a href="#" @click="editModal(user)">
                                      <i class="fas fa-edit blue"></i>
                                 </a> /
                                 <a href="#" @click="deleteUser(user.id)">
                                     <i class="fas fa-trash red"></i>
                                  </a>
                            </td>
                          </tr>
                        </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
        </div> 
        <!-- Modal -->
            <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                     

                    <h5 class="modal-title text-center yellow"   id="addNewLabel">
                        <b>UNIVERSIDAD AUTÓNOMA TOMÁS FRÍAS <br> DEPTO. DE INFRAESTRUCTURA</b> <br>
                        <center><img class="img-rounded" width="120" src="/img/people.png"></center>
                      Transporte Universitario | Nuevo Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                <form @submit.prevent="createUser()">
                       
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
                                  <option value="administrator">Administrador</option>
                                  <option value="jefatura">Jefatura</option>
                                  <option value="supervisor">Supervisor</option>
                                  <option value="docente">Docente</option>
                                  <option value="estudiante">Estudiante</option>
                                  <option value="conductor">Conductor</option>
                                  <option value="portero">Portero</option>
                                  <option value="administrativo">Administrativo</option>
                              </select>
                              <has-error :form="form" field="type"></has-error>
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
                    <button type="submit" class="btn btn-primary">GUARDAR</button>
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
            loadUsers(){
                axios.get("api/user").then(({ data }) => (this.users = data.data));
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

            this.loadUsers();
            Fire.$on('AfterCreate',() => {
                this.loadUsers();
            });
        }
    }
</script>
<style> 
.widget-user-header{ 
    background-image: url(/img/infra.jpg);
    background-position: center center;
    background-size: cover; 
    height: 375px !important;   
} 

 
.widget-user .widget-user-image > img { 
    border: 0px solid #ffffff;
}
 
</style>
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-3">
                <div class="card card-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header text-white"  >
                        <h3 class="widget-user-username font-weight-bold">{{ this.form.name }}</h3>
                        <h5 class="widget-user-desc">{{ this.form.type }}</h5>
                      </div>
                      <div class="widget-user-image">
                        <img class="img-circle"  :src="getProfilePhoto()" alt="User Avatar">
                      </div> 
                </div>
                    <div class="card card-info">
                        <div class="card-header p-2 text-center font-weight-bold"> 
                               Perfil de Usuario 
                        </div>
                        <div class="card-body fondomio" >
                            
                         <div class="form-horizontal">
                            <div class="form-group row">
                                <label for="entity" class="col-md-4 col-form-label text-md-right">Entidad:</label>
                                <div class="col-sm-8"> 
                                  <input type="text" v-model="form.entity" class="form-control" id="entity" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nombre:</label>
                                <div class="col-sm-8"> 
                                  <input type="text" v-model="form.name" class="form-control"   disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email:</label>
                                <div class="col-sm-8"> 
                                  <input type="text" v-model="form.email" class="form-control"   disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cedula" class="col-md-2 col-form-label text-md-right">Cédula:</label>
                                <div class="col-sm-4"> 
                                  <input type="text" v-model="form.cedula" class="form-control"   disabled>
                                </div>
                             
                                <label for="ru" class="col-md-2 col-form-label text-md-right">R.U.:</label>
                                <div class="col-sm-4"> 
                                  <input type="text" v-model="form.ru" class="form-control"   disabled>
                                </div>
                            </div>
                        </div>

                        </div>
                    </div>
                    
                    <div class="card card-info">
                        <div class="card-header p-2 text-center font-weight-bold"> 
                               Datos Modificables
                        </div>
                        <div class="card-body fondomio">
                            
                             <form class="form-horizontal"> 
                                <div class="form-group row">
                                    <label for="phon" class="col-md-2 col-form-label text-md-right">Nro. Tel.:</label>
                                    <div class="col-sm-4"> 
                                      <input type="text" v-model="form.phone" class="form-control" id="phone" placeholder="Nro. Celular" :class="{ 'is-invalid': form.errors.has('phone')}">
                                      <has-error :form="form" field="phone"></has-error>
                                    </div>
                                 
                                    <label for="pass" class="col-md-2 col-form-label text-md-right">Clave:</label>
                                    <div class="col-sm-4"> 
                                      <input type="password" v-model="form.password" class="form-control" id="password" 
                                      placeholder="Contraseña" :class="{ 'is-invalid': form.errors.has('password')}">
                                      <has-error :form="form" field="password"></has-error>
                                    </div> 
                                </div>
                                <div class="form-group row">
                                    <label for="avatar" class="col-md-4 col-form-label text-md-right">Foto de Perfil:</label> 
                                    <div class="col-sm-8">
                                      <input type="file" @change="updateProfile" name="avatar" class="form-input" :class="{ 'is-invalid': form.errors.has('avatar')}">
                                      <has-error :form="form" field="avatar"></has-error> 
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-3 text-center">
                                        <button @click.prevent="updateInfo" type="submit" class="btn bg-success btn-block">Actualizar 
                                        </button>                
                                    </div>  
                                </div>
                            </form>

                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                form: new Form({
                    id:'',
                    entity:'',
                    name:'',
                    email:'',
                    cedula:'',
                    ru:'',
                    phone:'',
                    password: '',
                    type: '', 
                    avatar: ''

                })
            }
        },
        mounted(){
            console.log('estas montado')
        },
        methods: {
            getProfilePhoto(){
                let avatar = (this.form.avatar.length > 200) ? this.form.avatar : "img/profile/"+ this.form.avatar;
                return avatar;
               // return "img/profile/"+ this.form.photo;
            },
            updateInfo(){
                this.$Progress.start();
                this.form.put('api/profile/')
                .then(()=>{

                    Fire.$emit('AfterCreate');
                    swal.fire({
                      type: 'info',
                      title: 'Usuario actualizado'
                    })

                    this.$Progress.finish();
                })
                .catch(()=>{
                    swal.fire({
                      type: 'error',
                      title: 'Oops...',
                      text: 'Ocurrió un error.!'
                    })
                    this.$Progress.fail();
 
                });
            },
            updateProfile(e){
                let file = e.target.files[0];
                //console.log(file);
                let reader = new FileReader(); 
                if(file['size'] < 2111775 )
                {
                    reader.onloadend = (file) => {
                        //console.log('RESULT', reader.result)
                        this.form.avatar = reader.result;
                    }
                    reader.readAsDataURL(file);
                }else{
                    swal.fire({
                      type: 'error',
                      title: 'Oops...',
                      text: 'La imagen es demaciado grande!'
                    })
                }
            }
        },
        created(){
            axios.get("api/profile").then(({data}) => ( this.form.fill(data)));
 
        }
    }
</script>

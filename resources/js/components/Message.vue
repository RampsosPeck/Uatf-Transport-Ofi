<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card card-info">
                    <div class="card-header text-center">Enviar mensaje</div>
                  <form @submit.prevent="createMessage" @keydown="form.onKeydown($event)">
                    <div class="card-body" style="background-color: #afe7f4;">
                        <!--@if(Auth()->user()->cedula == 10519606)
                        <div class="form-group">
                            <select name="recipient_id" class="form-control{{ $errors->has('recipient_id') ? ' is-invalid' : '' }}">
                                <option value="">Selecciona el usuario</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('recipient_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                        </div>
                        @else 
                            <input type="hidden" id="recipient_id" name="recipient_id" value="1">
                            <p><strong>Para: </strong> ADMINISTRADOR DEL SITIO WEB DE INFRAESTRUCTURA</p>
                        @endif--> 
                        <div class="form-group">
                            <select name="recipient_id" v-model="form.recipient_id" id="recipient_id" class="form-control" :class="{'is-invalid': form.errors.has('recipient_id') }" placeholder="Seleccione un Usuario" >  
                               
                                    <option v-for="user in users" :key="user.id" v-bind:value="user.id" >
                                     {{ user.name }} - {{ user.entity }}
                                    </option>  
                              
                            </select>  
                            <has-error :form="form" field="recipient_id"></has-error>
                        </div>
                        <div class="form-group"> 
                            <textarea  type="text"  v-model="form.body" name="body" id="body" class="form-control" :class="{ 'is-invalid': form.errors.has('body')}" aria-describedby="fileHelp" placeholder="Escribe aqui tu mensaje"></textarea>
                            <has-error :form="form" field="body"></has-error>
                        </div>
                        <div class="form-group">
                            <button :disabled="form.busy" type="submit" class="btn btn-success btn-block">ENVIAR</button>
                        </div>
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
                    recipient_id: '',
                    body: '', 
                })
            }
        }, 
        mounted() {
            console.log('Component mounted.')
        }, 
        methods: {
            createMessage(){
           
                this.$Progress.start(); 
                this.form.post('api/messages')
                .then(()=>{

                    Fire.$emit('AfterCreate'); 
                    this.form.reset();
                    //toast.fire({
                    swal.fire({
                      type: 'success',
                      title: 'Mensaje enviado correctamente',
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
            axios.get("api/messages").then(({ data }) => (this.users = data));
        }
    }
</script>
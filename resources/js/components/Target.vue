 
</style>
<template>
    <div class="container">
        <div class="row justify-content-center">
              <div class="col-md-12 mt-5">
                <div class="card card-info">
                  <div class="card-header ">

                    <div class="card-title ">LISTA TARJETAS</div> 
                    <div class="card-tools">
                        
                    <button class="btn btn-success pull-left"  >Nuevo Usuario <i class="fas fa-user-plus fa-fw"></i></button>
                    
                    </div>
                    
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0" style="background-color: #afe7f4;">
                    <table class="table table-hover table-striped">
                        <tbody>
                          <tr>
                            <th>Nro.</th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Entidad</th>
                            <th>BarCode</th>
                            <th>Saldo</th> 
                            <th>Opciones</th>
                          </tr>
                          <tr v-for="target in targets.data" :key="target.id">
                            
                            <td class="text-center" v-text="target.id"></td>
                            <td v-text="target.code"></td>
                            <td >{{ target.user.name   }}</td>
                            <td >{{ target.user.entity }}</td>
                            <td v-text="target.barCode"></td>
                            <td>{{ target.cuenta.saldo }}</td> 
                            <td>
                                 
                            </td>
                          </tr>
                        </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                   <div class="card-footer d-block mx-auto py-12 fondomio">
                     <pagination :data="targets" @pagination-change-page="getResults"></pagination>

                  </div>
                </div>
                <!-- /.card -->
              </div>
        </div>  
    </div>
</template>

<script>
    export default {
        data(){
            return {
                targets : {},  
            }
        },
        methods: {
            getResults(page = 1) {
              axios.get('api/target?page=' + page)
                .then(response => {
                  this.targets = response.data;
                });
            },
            loadTargets(){
                axios.get("api/target").then(({ data }) => (this.targets = data));
            }
        },
        created() { 

            this.loadTargets();
            Fire.$on('AfterCreate',() => {
                this.loadTargets();
            });
        } 
    }
</script>
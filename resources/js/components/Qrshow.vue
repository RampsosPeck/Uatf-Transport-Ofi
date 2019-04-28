<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card card-info">
                    <div class="card-header text-center">Mi Código QR</div>

                    <div class="card-body text-center" style="background-color: #afe7f4;">
                       
                        <!--<div v-vue-q-art="config"></div>  --> 
               
                        <vue-q-art :config="config" v-model="config.value=cuenta.QRcode" class="fondomiobor"></vue-q-art>
 
                        
                         <br>
                         <h4><i> <b>{{ msg }}</b> </i></h4>
                         <span class="float-right text-primary">Saldo: {{ cuenta.saldo }} Bs.</span>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import VueQArt from 'vue-qart'
 
     
    export default {
 
      components: {VueQArt}, 
      data() {
        return {
          cuenta : {}, 
                     
          msg: 'Escanea el código cuando desees usar un servicio de la U.A.T.F.',
          config: {
            value: '',
            imagePath: '/img/startupbus.png',
            filter: 'color',
            size: 400, 
          },
          download: false          
        }
      }, 
      mounted() {
             
      },
      created() {
            axios.get("/api/qrshow").then(({data}) => ( this.cuenta = data)); 
      },
      methods: {
         
      },  
    }
</script> 
 
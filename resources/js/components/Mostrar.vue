<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card card-info">
                    <div class="card-header text-center">Mensaje</div>

                    <div class="card-body" style="background-color: #afe7f4;">
                         <p>{{ mensaje.body }}</p>
                    </div>
                    <div class="card-footer fondomio">
                    	<p> <b>En fecha:</b> {{ mensaje.created_at|myHour }} </p>
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
                mensaje: {}, 
            }
        }, 
        mounted() {
        	 
            //console.log('Component mounted el mensaje.')
        },  
        created() { 
               var id = this.$route.params.id;
		       //axios.get("/messages/",id).then(({ data }) => (this.mensaje = data.data));
		       axios.get(`/api/messages/${id}`).then(({ data }) => (this.mensaje = data));
			   //console.log(window.location.pathname) 
        }
    }
</script>
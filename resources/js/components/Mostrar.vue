<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card card-info">
                    <div class="card-header text-center">Mensaje</div>

                    <div class="card-body" style="background-color: #afe7f4;">
                         
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
                mensaje: {}
            }
        }, 
        mounted() {
              console.log(window.location.pathname) 
		       var id = this.$route.params.id;
		       axios.get("/messages/",id).then(({ data }) => (this.mensaje = data.data));
        },
        created() { 
            //axios.get("api/messages").then(({ data }) => (this.users = data));

               
        }
    }
</script>
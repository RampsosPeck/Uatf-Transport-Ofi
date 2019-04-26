<template>
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-md-8 mt-5">
                <div class="card card-info">
                    <div class="card-header text-center">LISTA DE MENSAJES</div>
                    <div v-if="notifications.length" class="card-body" style="background-color: #afe7f4;">
                        <li v-for="notification in notifications" >

                            <a @click="messageDestroy(notification)" href="" class="btn float-right btn-danger" ><i class="fa fa-star"> Eliminar </i></a>

                            <a @click="markAsRead(notification)"  :href="notification.data.link" class="dropdown-item">  
                                <div class="media"> 
                                  <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                      <b> Mensaje </b> 
                                    </h3>
                                    <p class="text-sm" v-text="notification.data.text"></p>
                                    <p class="text-sm text-muted text-center"><i class="fas fa-clock mr-1"></i> {{ notification.data.hour|myHour }} </p>
                                  </div>
                                </div> 
                            </a>       
                            <div class="dropdown-divider" style="color: 1px solid #4dc0b5 !important;"></div>
                        </li> 
                    </div> 
                    <div v-else class="card-body" style="background-color: #afe7f4;">
                        <p> <i>  No existen mensajes </i></p>
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
                notifications: {},
            }
        }, 
        mounted() {
            axios.get("/api/notificaciones").then( data  => {this.notifications = data.data });
        },
        methods:{
            messageDestroy(notification){
                axios.delete("/api/notifications/"+notification.id)
            }
        } 
    }
</script>
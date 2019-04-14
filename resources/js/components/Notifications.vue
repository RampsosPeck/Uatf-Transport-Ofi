<template> 
    <li class="nav-item dropdown" v-if="notifications.length" >
        <a class="nav-link" data-toggle="dropdown" href="/notifications">
          <!--<img src="{{ asset('/img/mail.png') }}"   class="brand-image " >-->
            <i class="nav-icon fas fa-cogs purple"></i>
            <span class="badge badge-danger" v-text="notifications.length"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <li v-for="notification in notifications" :key="notification.id" v-bind:value="notification.id">
              <!-- <a  :href="notification.data.link" class="dropdown-item">
                 Message Start  -->
            <router-link @click="markAsRead(notification)" :to="'/messages/' + notification.data.link"  class="dropdown-item"> 

                <div class="media">
                   <!-- <img src=" " alt="User Avatar" class="img-size-50 mr-3 img-circle">-->
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Notificación
                      <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
                    </h3>
                    <p class="text-sm" v-text="notification.data.text"></p>
                    <p class="text-sm text-muted text-center"><i class="fas fa-clock mr-1"></i> {{ notification.data.hour|myHour }} </p>
                  </div>
                </div>
                <!-- Message End 
              </a>-->
            </router-link>              
              <div class="dropdown-divider"></div>
          </li> 
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
    </li>
</template>

<script> 
    export default {
        data(){
            return {
                notifications: {}
            }
        }, 
        mounted() {
            console.log('Component mounted.')
        },  
        methods: {
            markAsRead(notification){
                axios.patch('/notificaciones/' + notification.id);
            }
        },
        created() { 
            axios.get("api/notifications").then( res  => {this.notifications = res.data; }) 
        }
    }
</script>
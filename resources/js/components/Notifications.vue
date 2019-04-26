<template> 
    <li class="nav-item dropdown" >
        <a @click="isDropdownOpen = ! isDropdownOpen" class="nav-link"  :href="linkToNotifications">
          <img src="/img/mail.png"   class="brand-image " >
          
            <span v-if="notifications.length"  class="badge badge-danger" v-text="notifications.length"></span>
        </a>
        <div v-if="notifications.length"  :class="dropdownClases">
          <li v-for="notification in notifications" >
              <!-- <router-link   :to="notification.data.link"  class="dropdown-item"> 
                 Message Start  -->
            <a @click="markAsRead(notification)"  :href="notification.data.link" class="dropdown-item">
            

                <div class="media">
                 
                   <!-- <img src=" " alt="User Avatar" class="img-size-50 mr-3 img-circle">-->
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      <b> Mensaje </b>
                     <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
                    </h3>
                    <p class="text-sm" v-text="notification.data.text"></p>
                    <p class="text-sm text-muted text-center"><i class="fas fa-clock mr-1"></i> {{ notification.data.hour|myHour }} </p>
                  </div>
                </div>
                <!-- Message End 
              </router-link> -->
               </a>          
              <div class="dropdown-divider" style="color: 1px solid #4dc0b5 !important;"></div>
          </li> 
          <a @click="markAllAsRead" href="#" class="dropdown-item dropdown-footer text-danger"><b> Marcar todo como leido</b></a>
        </div>
    </li>
</template>

<script> 
    export default {
        data(){
            return {
                notifications: {},
                isDropdownOpen: false
            }
        }, 
        mounted() {
            axios.get("/api/notifications").then( data  => {this.notifications = data.data }); 
        },  
        methods: {
            markAsRead(notification){
                axios.patch('/api/notificaciones/' + notification.id).then( data => {
                    this.notifications = data.data;
                });
            },
            markAllAsRead(){
                this.notifications.forEach(notification => {
                    this.markAsRead(notification);
                });
            }
        },
        computed: {
            dropdownClases(){
                return ['dropdown-menu dropdown-menu-lg dropdown-menu-right fondomiobor', this.isDropdownOpen ? 'show' : ''];
            },
            linkToNotifications(){
                return this.notifications.length ? "#" : "/notificaciones" ;
            }
        }  
    }
</script>
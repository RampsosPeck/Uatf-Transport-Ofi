<style> 
 .widget-user-headere{
    background-image: url(/img/ceo.jpg);
    background-position: center center;
    background-size: cover;
    height: 300px !important; 
    padding-top: 20px;
    padding-left: 20px;   
}
 
.widget-user .widget-user-image > img {
    border: 1px solid #ffffff;
}
 
.widget-user-image { 
    top: 250px !important; 
}

</style>
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-3">
                <div class="card card-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-headere text-white"  >
                        <h3 class="widget-user-username font-weight-bold">{{ this.form.name }}</h3>
                        <h5 class="widget-user-desc">{{ this.form.type }}</h5>
                      </div>
                      <div class="widget-user-image">
                        <img class="img-circle"  src="/img/adminceo.png"   >
                      </div> 
                        <div class="card-footer" style="background-color: #011620;">
                            <div class="row">
                              <div class="col-sm-4 border-right ">
                                <div class="description-block">

                                  <h5 class="description-header"><font color="white">CELULAR</font></h5>
                                  <span class="description-text small"><font color="white">{{ this.form.phone }}</font></span>
                                </div>
                                <!-- /.description-block -->
                              </div>
                              <!-- /.col -->
                              <div class="col-sm-4 border-right">
                                <div class="description-block">
                                  <h5 class="description-header"><font color="white">E-MAIL</font></h5>
                                  <span class="description-text small"><font color="white">{{ this.form.email }}</font></span>
                                </div>
                                <!-- /.description-block -->
                              </div>
                              <!-- /.col -->
                              <div class="col-sm-4">
                                <div class="description-block">
                                  <h5 class="description-header"><font color="white">PRODUCTOS</font></h5>
                                  <span class="description-text small"><font color="white">Fifteen</font></span>
                                </div> 
                              </div> 
                            </div> 

                            <div  style="background-color: #011620;" transition="fade">
                                <div class="owl-carousel owl-theme">
                                    <div class="item"> <img src="/img/and/lara1.jpg" class="rounded" style=" height:100px;" alt="Responsive image"> </div>
                                    <div class="item"> <img src="/img/and/vue1.jpg" class="rounded" style=" height:100px;" alt="Responsive image"> </div>
                                    <div class="item"> <img src="/img/and/nginx1.jpg" class="rounded" style=" height:100px;" alt="Responsive image"> </div>
                                    <div class="item"> <img src="/img/and/sass1.jpg" class="rounded" style=" height:100px;" alt="Responsive image"> </div>
                                    <div class="item"> <img src="/img/and/bootstrap1.jpg" class="rounded" style=" height:100px;" alt="Responsive image"></div>
                                     <div class="item"> <img src="/img/and/kali1.png" class="rounded" style=" height:100px;" alt="Responsive image"> </div>
                                     <div class="item"> <img src="/img/and/debian1.png" class="rounded" style=" height:100px;" alt="Responsive image"> </div> 
                                     <div class="item"> <img src="/img/and/oauth1.png" class="rounded" style=" height:100px;" alt="Responsive image"> </div>
                                     <div class="item"> <img src="/img/and/vue2.png" class="rounded" style=" height:100px;" alt="Responsive image"> </div>
                                     <div class="item"> <img src="/img/and/webpack.png" class="rounded" style=" height:100px;" alt="Responsive image"> </div>
                                </div>   
                            </div>
                        </div>
                </div>    
            </div>
        </div>
    </div>
</template>

 
<script>
    import 'owl.carousel/dist/assets/owl.carousel.css';
    import 'owl.carousel';
    
    export default {
        data(){
            return {
                form: new Form({
                    id:'',
                    entity:'',
                    name:'',
                    email:'',
                    phone:'',
                    type: '',  

                })
            }
        }, 
        mounted() {
            $(document).ready(function(){ 
              var owl = $('.owl-carousel');
                owl.owlCarousel({
                center: true,
                rtl:false,
                loop:true,
                margin:10,
                nav:true,
                items:9, 
                autoplay:true,
                autoplayTimeout:1000,
                autoplayHoverPause:true, 
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:true,
                        loop:true
                    },
                    600:{
                        items:3,
                        nav:false,
                        loop:true
                    },
                    1000:{
                        items:5,
                        nav:true,
                        loop:true
                    }
                }
            });
            $('.play').on('click',function(){
                owl.trigger('play.owl.autoplay',[1000])
            })
            $('.stop').on('click',function(){
                owl.trigger('stop.owl.autoplay')
            })
            });
        },
        created(){
            axios.get("api/profiles").then(({data}) => ( this.form.fill(data)));
 
        }
    }
</script>
 
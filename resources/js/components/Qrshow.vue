<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card card-info">
                    <div class="card-header text-center">Mi Código QR</div>

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
        methods: {
            
        },
        created(){
            axios.get("api/user").then(({data}) => ( this.form.fill(data)));
 
        }
    }
</script>

<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card card-info">
                    <div class="card-header text-center">DEVELOPER</div>

                    <div class="card-body" style="background-color: #afe7f4;">
                        <passport-clients></passport-clients>
                        <passport-authorized-clients></passport-authorized-clients>
                        <passport-personal-access-tokens>
                        </passport-personal-access-tokens>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
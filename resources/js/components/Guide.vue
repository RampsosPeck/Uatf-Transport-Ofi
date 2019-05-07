<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-5">
                <div class="card card-info">
                    <div class="card-header text-center">MANUAL DE USUARIO</div>

                    <div class="card-body" style="background-color: #afe7f4;">
                       <!-- <pdf src="/img/manual.pdf"></pdf>  -->
                       <pdf
                            v-for="i in numPages"
                            :key="i"
                            :src="src"
                            :page="i"
                            style="display: contents; width: 100%"
                        ></pdf>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import pdf from 'vue-pdf'
    var loadingTask = pdf.createLoadingTask('/img/manual.pdf');
    export default {
        components: {
            pdf
        },
        data() {
            return {
                src: loadingTask,
                numPages: undefined,
            }
        },
        mounted() {

            this.src.then(pdf => {

                this.numPages = pdf.numPages;
            });
        }
    }
</script>
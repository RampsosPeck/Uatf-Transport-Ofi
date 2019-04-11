<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-3">
                <div class="card card-info">
                    <div class="card-header text-center">CONTROL DE PASAJEROS</div>

                    <div class="card-body" style="background-color: #afe7f4;">
                        <div>
                            <p class="error">{{ error }}</p>

                            <p class="decode-result">Last result: 
                                <b>{{ result }}</b>
                            </p>

                            <qrcode-stream @decode="onDecode" @init="onInit" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template> 

<script>
export default {
  data () {
    return {
      result: '',
      error: ''
    }
  },

  methods: {
    onDecode (result) {
      this.result = result
    },

    async onInit (promise) {
      try {
        await promise
      } catch (error) {
        if (error.name === 'NotAllowedError') {
              swal.fire({
                type: 'error',
                title: 'Necesitas conceder permiso de acceso a la cámara.',
                showConfirmButton: false,
                timer: 3000
              })
            this.error = "ERROR: Necesitas conceder permiso de acceso a la cámara."
        } else if (error.name === 'NotFoundError') {
            swal.fire({
                type: 'error',
                title: 'No hay cámara en este dispositivo.',
                showConfirmButton: false,
                timer: 3000
              })
            this.error = "ERROR: No hay cámara en este dispositivo."
        } else if (error.name === 'NotSupportedError') {
              swal.fire({
                type: 'error',
                title: 'Contexto seguro requerido (HTTPS, localhost).',
                showConfirmButton: false,
                timer: 3000
              })
            this.error = "ERROR: Contexto seguro requerido (HTTPS, localhost)"
        } else if (error.name === 'NotReadableError') {
              swal.fire({
                type: 'error',
                title: '¿La cámara ya está en uso?.',
                showConfirmButton: false,
                timer: 3000
              })
            this.error = "ERROR: ¿La cámara ya está en uso?"
        } else if (error.name === 'OverconstrainedError') {
              swal.fire({
                type: 'error',
                title: '¿Las cámaras instaladas no son adecuadas.',
                showConfirmButton: false,
                timer: 3000
              })
            this.error = "ERROR: Las cámaras instaladas no son adecuadas."
        } else if (error.name === 'StreamApiNotSupportedError') {
            swal.fire({
                type: 'error',
                title: 'La API de transmisión no es compatible con este navegador.',
                showConfirmButton: false,
                timer: 3000
              })
          this.error = "ERROR: La API de transmisión no es compatible con este navegador."
        }
      }
    }
  }
}
</script>

<style scoped>
.error {
  font-weight: bold;
  color: red;
}
</style>

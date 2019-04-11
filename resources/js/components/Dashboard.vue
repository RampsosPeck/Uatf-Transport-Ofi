<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-3">
                <div class="card card-info">
                    <div class="card-header text-center">PANEL DE CONTROL</div>

                    <div class="card-body" style="background-color: #afe7f4;">
                            <h5 class="mt-4 mb-2 text-center">RECARGA DE CRÉDITO</h5>
                      <div class="row justify-content-center mt-3">
                          <div class="col-md-4 col-sm-6 col-12">
                            <div class="info-box bg-info-gradient">
                              <span class="info-box-icon"><i class="fas fa-money-bill-alt"></i></span>

                              <div class="info-box-content">
                                <span class="info-box-text">Pagos desde:</span>
                                <span class="info-box-number">2 - 5 - 10 - 20 - 50 - 100 Bs.</span>

                                <div class="progress">
                                  <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description text-center">
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#moneyModal">
                                      REALIZAR
                                    </button>
                                </span>
                              </div> 
                            </div> 
                          </div>
                      </div>
                      <!-- Modal -->
                      
                      <!-- END Modal -->
                    <!-- =========================================================== -->
                        <h5 class="mt-4 mb-2 text-center">Control Diario</h5>
                        <div class="row">
                          <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box bg-info-gradient">
                              <span class="info-box-icon"><i class="fa fa-credit-card"></i></span>

                              <div class="info-box-content">
                                <span class="info-box-text">Crédito DÍA</span>
                                <!--<?php $tot = 0; ?>
                                @foreach($totalBs as $totalb)
                                    <?php $tot = $tot+$totalb;  ?>
                                @endforeach  -->
                                <span class="info-box-number">453 Bs.</span>

                                <div class="progress">
                                  <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description">
                                  Recargado en el Día
                                </span>
                              </div>
                              <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                          </div>
                          <!-- /.col -->
                          <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box bg-success-gradient">
                              <span class="info-box-icon"><i class="fa fa-users"></i></span>

                              <div class="info-box-content">
                                <span class="info-box-text">Usuarios\Bus</span>
                                <!-- <?php $totUbus = 0; ?>
                                @foreach($bsUsers as $bsUser)
                                    <?php $totUbus = $totUbus+$bsUser;  ?>
                                @endforeach  -->
                                <span class="info-box-number">456 Bs.</span>

                                <div class="progress">
                                  <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description">
                                  Servicio de Bus
                                </span>
                              </div>
                              <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                          </div>
                          <!-- /.col -->
                          <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box bg-warning-gradient">
                              <span class="info-box-icon"><i class="fas fa-bus-alt"></i></span>

                              <div class="info-box-content">
                                <span class="info-box-text">Vehículo\Parqueo</span>
                                 <!--<?php $totUve = 0; ?>
                                @foreach($bsUvehis as $bsUvehi)
                                    <?php $totUve = $totUve+$bsUvehi;  ?>
                                @endforeach -->
                                <span class="info-box-number">453 Bs.</span>

                                <div class="progress">
                                  <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description">
                                  Servicio de Parqueo
                                </span>
                              </div>
                              <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                          </div>
                          <!-- /.col -->
                          <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box bg-danger-gradient">
                              <span class="info-box-icon"><i class="fas fa-hand-holding-usd"></i></span>

                              <div class="info-box-content">
                                <span class="info-box-text">Total adquirido</span>
                                <span class="info-box-number">452 Bs.</span>

                                <div class="progress">
                                  <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description">
                                  Monto registrado
                                </span>
                              </div>
                              <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- =========================================================== -->
                         <!-- Small Box (Stat card) -->
                            <h5 class="mb-2 mt-4 text-center">Control General</h5>
                            <div class="row">
                              <div class="col-lg-3 col-6">
                                <!-- small card -->
                                <div class="small-box bg-info">
                                  <div class="inner">
                                    <h3>453</h3>

                                    <p>Usuarios registrados</p>
                                  </div>
                                  <div class="icon">
                                    <i class="fa fa-users"></i>
                                  </div>
                                  <a href="/" class="small-box-footer">
                                    Mas info...<i class="fa fa-arrow-circle-right"></i>
                                  </a>
                                </div>
                              </div>
                              <!-- ./col -->
                              <div class="col-lg-3 col-6">
                                <!-- small card -->
                                <div class="small-box bg-success">
                                  <div class="inner">
                                     <!--   <?php $usoTotE = 0; ?>
                                    @foreach($bsUs as $bsU)
                                        <?php $usoTotE = $usoTotE+$bsU;  ?>
                                    @endforeach

                                    <?php $usoTotV = 0; ?>
                                    @foreach($bsUvs as $bsUv)
                                        <?php $usoTotV = $usoTotV+$bsUv;  ?>
                                    @endforeach  -->
                                    <h3> 86 <sup style="font-size: 20px"> Bs.</sup></h3>

                                    <p>Total Registrados</p>
                                  </div>
                                  <div class="icon">
                                    <i class="fas fa-dollar-sign"></i>
                                  </div>
                                  <a href="#" class="small-box-footer">
                                    Mas info... <i class="fa fa-arrow-circle-right"></i>
                                  </a>
                                </div>
                              </div>
                              <!-- ./col -->
                              <div class="col-lg-3 col-6">
                                <!-- small card -->
                                <div class="small-box bg-warning">
                                  <div class="inner">
                                  <!--  <?php $usoTotR = 0; ?>
                                    @foreach($totalBtot as $totalBto)
                                        <?php $usoTotR = $usoTotR+$totalBto;  ?>
                                    @endforeach-->
                                    <h3> 56 <sup style="font-size: 20px"> Bs.</sup></h3>

                                    <p>Total Recargado</p>
                                  </div>
                                  <div class="icon">
                                    <i class="fas fa-file-invoice-dollar"></i>
                                  </div>
                                  <a href="/" class="small-box-footer">
                                    Mas info...<i class="fa fa-arrow-circle-right"></i>
                                  </a>
                                </div>
                              </div>
                              <!-- ./col -->
                              <div class="col-lg-3 col-6">
                                <!-- small card -->
                                <div class="small-box bg-danger">
                                  <div class="inner">
                                   <!-- <h3> {{ $crediCe }} </h3> -->
                                    <h3> 12 </h3>

                                    <p>Usuarios sin crédito</p>
                                  </div>
                                  <div class="icon">
                                    <i class="fas fa-money-bill"></i>
                                  </div>
                                  <a href="/" class="small-box-footer">
                                    Mas info...<i class="fa fa-arrow-circle-right"></i>
                                  </a>
                                </div>
                              </div>
                              <!-- ./col -->
                            </div>
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

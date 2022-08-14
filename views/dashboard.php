<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4>Dashboard</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap mt-2 mt-md-0">
        <button type="button" data-toggle="modal" data-target="#modalExchangeRate"
            class="btn btn-primary btn-icon-text mb-2 mb-md-0 mr-2">
            <i class="btn-icon-prepend mr-2" data-feather="dollar-sign"></i>
            Tipo de cambio
        </button>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-outline-primary dropdown-toggle btn-icon-text mb-2 mb-md-0" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="btn-icon-prepend mr-2" data-feather="grid"></i> Accesos directos
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="main?module=add-sale"><i data-feather="chevron-right" class="icon-dd"></i> Generar Venta</a>
                <?php  if($_SESSION['rol'] == 0) { ?><a class="dropdown-item" href="main?module=add-purchase"><i data-feather="chevron-right" class="icon-dd"></i> Generar Compra</a><?php } ?>
            </div>
        </div>
    </div>
</div>

<!-- div class="row">
          <div class="col-lg-7 col-xl-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0">Monthly sales</h6>
                  <div class="dropdown mb-2">
                    <button class="btn p-0" type="button" id="dropdownMenuButton4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                    </div>
                  </div>
                </div>
                <p class="text-muted">Sales are activities related to selling or the number of goods or services sold in a given time period.</p>
                <div id="monthlySalesChart"></div>
              </div> 
            </div>
          </div>
          <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">Cloud storage</h6>
                  <div class="dropdown mb-2">
                    <button class="btn p-0" type="button" id="dropdownMenuButton5" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                    </div>
                  </div>
                </div>
                <div id="storageChart"></div>
                <div class="row mb-3">
                  <div class="col-6 d-flex justify-content-end">
                    <div>
                      <label class="d-flex align-items-center justify-content-end tx-10 text-uppercase fw-bolder">Total storage <span class="p-1 ms-1 rounded-circle bg-secondary"></span></label>
                      <h5 class="fw-bolder mb-0 text-end">8TB</h5>
                    </div>
                  </div>
                  <div class="col-6">
                    <div>
                      <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span class="p-1 me-1 rounded-circle bg-primary"></span> Used storage</label>
                      <h5 class="fw-bolder mb-0">~5TB</h5>
                    </div>
                  </div>
                </div>
                <div class="d-grid">
                  <button class="btn btn-primary">Upgrade storage</button>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-12 col-xl-12 stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0">10 Poductos mas vendidos</h6>
                  <div class="dropdown mb-2">
                    <button class="btn p-0" type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-hover mb-0">
                    <thead>
                      <tr>
                        <th class="pt-0">#</th>
                        <th class="pt-0">Project Name</th>
                        <th class="pt-0">Start Date</th>
                        <th class="pt-0">Due Date</th>
                        <th class="pt-0">Status</th>
                        <th class="pt-0">Assign</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>NobleUI jQuery</td>
                        <td>01/01/2022</td>
                        <td>26/04/2022</td>
                        <td><span class="badge bg-danger">Released</span></td>
                        <td>Leonardo Payne</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>NobleUI Angular</td>
                        <td>01/01/2022</td>
                        <td>26/04/2022</td>
                        <td><span class="badge bg-success">Review</span></td>
                        <td>Carl Henson</td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>NobleUI ReactJs</td>
                        <td>01/05/2022</td>
                        <td>10/09/2022</td>
                        <td><span class="badge bg-info">Pending</span></td>
                        <td>Jensen Combs</td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>NobleUI VueJs</td>
                        <td>01/01/2022</td>
                        <td>31/11/2022</td>
                        <td><span class="badge bg-warning">Work in Progress</span>
                        </td>
                        <td>Amiah Burton</td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td>NobleUI Laravel</td>
                        <td>01/01/2022</td>
                        <td>31/12/2022</td>
                        <td><span class="badge bg-danger">Coming soon</span></td>
                        <td>Yaretzi Mayo</td>
                      </tr>
                      <tr>
                        <td>6</td>
                        <td>NobleUI NodeJs</td>
                        <td>01/01/2022</td>
                        <td>31/12/2022</td>
                        <td><span class="badge bg-primary">Coming soon</span></td>
                        <td>Carl Henson</td>
                      </tr>
                      <tr>
                        <td class="border-bottom">3</td>
                        <td class="border-bottom">NobleUI EmberJs</td>
                        <td class="border-bottom">01/05/2022</td>
                        <td class="border-bottom">10/11/2022</td>
                        <td class="border-bottom"><span class="badge bg-info">Pending</span></td>
                        <td class="border-bottom">Jensen Combs</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div> 
            </div>
          </div>
        </div> <!-- row -->

<!-- row -->
<div class="row">
    <div class="col-12 col-md-4 grid-margin stretch-card cantidad-alumnos">
        <div class="card overflow-hidden bg-primary text-dark">
            <div class="card-header">Caja</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 col-md-12 col-xl-8">
                        <h3 id="dashboard_box" class="my-2 text-center text-dark"></h3>
                    </div>
                    <div class="col-6 col-md-12 col-xl-4 text-center">
                        <i class="fas fa-dollar-sign fa-2x text-dark" style="font-size: 4em !important;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4 grid-margin stretch-card">
        <div class="card overflow-hidden bg-warning text-dark">
            <div class="card-header">
                Compras
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-6 col-md-12 col-xl-8">
                        <h3 id="dashboard_purchases" class="my-2 text-center text-dark"></h3>
                    </div>
                    <div class="col-6 col-md-12 col-xl-4 text-center">
                        <i class="fas fa-cart-plus fa-2x text-dark" style="font-size: 4em !important;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4 grid-margin stretch-card ">
        <div class="card overflow-hidden text-white bg-success">
            <div class="card-header">Ventas</div>
            <div class="card-body">
                <div class="row">
                <div class="col-6 col-md-12 col-xl-8">
                        <h3 id="dashboard_sales" class="my-2 text-center text-dark"></h3>
                    </div>
                    <div class="col-6 col-md-12 col-xl-4 text-center">
                        <i class="fas fa-shopping-cart fa-2x text-dark" style="font-size: 4em !important;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row -->

<!-- row -->
<div class="row">
    <div class="col-12 col-md-4 grid-margin stretch-card cantidad-alumnos">
        <div class="card overflow-hidden bg-info text-dark">
            <div class="card-header">
                Clientes
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 col-md-12 col-xl-5">
                        <h3 id="dashboard_clients" class="my-2 text-center text-dark">0</h3>
                    </div>
                    <div class="col-6 col-md-12 col-xl-7 text-center">
                        <i class="fas fa-user-plus fa-2x text-dark" style="font-size: 4em !important;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4 grid-margin stretch-card">
        <div class="card overflow-hidden bg-danger text-white">
            <div class="card-header">
                Proveedores
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 col-md-12 col-xl-5">
                        <h3 id="dashboard_providers" class="my-2 text-center text-white">0</h3>
                    </div>
                    <div class="col-6 col-md-12 col-xl-7 text-center">
                        <i class="fas fa-users fa-2x text-white" style="font-size: 4em !important;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4 grid-margin stretch-card ">
        <div class="card overflow-hidden text-white bg-dark">
            <div class="card-header">Articulos</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 col-md-12 col-xl-5">
                        <h3 id="dashboard_articles" class="my-2 text-center text-white">0</h3>
                    </div>
                    <div class="col-6 col-md-12 col-xl-7 text-center">
                        <i class="fa fa-th fa-2x text-white" style="font-size: 4em !important;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row -->

<div class="modal fade" id="modalExchangeRate" tabindex="-1" role="dialog" aria-labelledby="modalExchangeRate"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tipo de cambio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formExchangeRate">
                <div class="modal-body">
                    <input type="hidden" value="update_exchange_rate" name="option">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" id="exchange_rate" name="exchange_rate" class="form-control" placeholder="Tipo de cambio">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>

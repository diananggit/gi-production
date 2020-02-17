<!--add bundle modal-->
<div class="modal fade" id="modal_add_bundle" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Bundle</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times</span>
                </button>
            </div>
            <form method="post" id="form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <!-- <input type="hidden" name="id_barang" id="id_barang"> -->
                                <label>Size: </label>
                                <!-- <input type="text" id="no_inventaris" name="no_inventaris" class="form-control"> -->
                                <select id="size" name="size" class="select2 form-control" style="width: 100%"></select>
                            </div>

                            <div class="form-group">
                                <label>PCS EACH BUNDLE: </label>
                                <input type="number" id="pcs_each_bundle" name="pcs_each_bundle" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>QTY: </label>
                                <input type="number" id="qty_modal" name="qty_modal" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btnCreateBundle">Create Bundle</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end add bundle modal-->

<!--show bundle modal-->
<div class="modal fade" id="modal_show_bundle" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Show Bundle</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times</span>
                </button>
            </div>
            <form method="post" id="form">
                <div class="modal-body">
                    <div class="row">
                        <table id="showBundleTable" class="table table-border table-striped" width="100%" >
                            <thead>
                                <th>#</th>  
                                <th>SIZE</th>
                                <th>QTY</th>
                                <th>NO BUNDLE</th>
                            </thead>
                            <tfoot>
                                <th>#</th> 
                                <th>SIZE</th>
                                <th>QTY</th>
                                <th>NO BUNDLE</th>
                            </tfoot>
                          </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>                
            </form>
        </div>
    </div>
</div>
<!--end show bundle modal-->

<!--show cutting done modal-->
<div class="modal fade modal-info" id="modal_cutting_done" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Show Bundle</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times</span>
                </button>
            </div>
            <form method="post" id="form">
                <div class="modal-body">
                    <div class="row">
                        <table id="showCuttingDoneTable" class="table table-border table-striped" width="100%" autoWidth="true" >
                            <thead>
                                <th>#</th>  
                                <th>SIZE</th>
                                <th>QTY</th>
                                <th>NO BUNDLE</th>
                                <th>CUTTING DATE</th>
                                <!-- <th>Actions</th> -->
                            </thead>
                            <tfoot>
                                <th>#</th> 
                                <th>SIZE</th>
                                <th>QTY</th>
                                <th>NO BUNDLE</th>
                                <th>CUTTING DATE</th>                                
                                <!-- <th>Actions</th> -->
                            </tfoot>
                          </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="btnSaveSelected" class="btn btn-success"><i class="fa fa-checked"></i> Save Selected</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end cutting done modal-->
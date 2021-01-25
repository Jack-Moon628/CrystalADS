<div id="modifyWalletModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content border-0">
            <div class="modal-header mb-2">
                <h5 class="modal-title ml-4">Modify Wallet</h5>
            </div>

            <div class="modal-body mt-0 pt-0 text-center" style="max-height: 500px; overflow-y: auto;">
                <div class="w-100 mt-3 p-3 mb-3 text-primary bg-light">
                    <i class="fas fa-dollar-sign p-1 pl-2"></i>
                    <span id="amountWallet" class="ml-3 d-inline-block">
                        0.00
                    </span>
                </div>

                <hr>

                <form id="modifyWalletForm" action="" method="POST">
                    @CSRF
                    @method('PUT')

                    <div class="text-left form-group mt-3 pl-4 pr-4">
                        <span>Credit Amount</span>
                        <input id="creditWallet" name="value" type="text" class="form-control" placeholder="0.00">
                    </div>

                    <div class="text-left form-group mt-1 mb-3 pl-4 pr-4">
                        <span>Action</span>

                        <select name="action" class="form-control">
                            <option value="add">Add</option>
                            <option value="subtract">Subtract</option>
                        </select>
                    </div>
                </form>
            </div>

            <div class="text-center p-2 pr-3 border-top mt-3">
                <a class="menu-item text-primary" style="display: inline-block; width: 48%; text-align: center;" href="#" onclick="submitDomainForm()">
                    <span class="item-title">Submit</span>
                </a>

                <a class="menu-item" style="display: inline-block; width: 48%; text-align: center;" href="#" onclick="$('#viewLogModal').modal('toggle');">
                    <span class="item-title">Cancel</span>
                </a>
            </div>
        </div>
    </div>
</div>
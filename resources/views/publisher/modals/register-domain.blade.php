<div id="registerDomainModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content border-0">
            <div class="modal-header mb-2">
                <h5 class="modal-title ml-4">Register a Domain</h5>
            </div>

            <div class="modal-body mt-0 pt-0 text-center" style="max-height: 500px; overflow-y: auto;">
                <form id="domainForm" action="/publisher/domain" method="POST">
                    @CSRF

                    <div class="text-left form-group mt-3 mb-3 pl-4 pr-4">
                        <span>Domain Name</span>
                        <input name="name" type="text" class="form-control" placeholder="www.cryptalads.com">
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
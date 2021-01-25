<div id="securityModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <div class="modal-header border-0">
                <h5 class="modal-title border-0" id="detailsModalTitle">
                    Manage Security Settings
                </h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="userSecurityForm" action="/" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div id="accountDetails" class="account-details-wrapper">
                        <div class="input-group">
                            <small class="form-control bg-light text-dark border-0">ID</small>
                            <input id="securityId" type="text" class="form-control border-light w-75" disabled>
                        </div>

                        <div class="input-group mt-2">
                            <small class="form-control bg-light text-dark border-0">Email</small>
                            <input id="securityEmail" type="text" class="form-control border-light w-auto" disabled>
                        </div>
                    </div>

                    <div class="form-check p-2 bg-light rounded w-100 text-center mt-2 mb-2">
                        <input type="checkbox" class="form-check-input" id="securityRestrict" name="securityRestrict">
                        <label class="form-check-label" for="securityRestrict">Restrict User</label>
                    </div>

                    <div class="form-check p-2 bg-light rounded w-100 text-center mt-2 mb-2">
                        <input type="checkbox" class="form-check-input" id="securityDisable" name="securityDisable">
                        <label class="form-check-label" for="securityDisable">Disable User (Disables Authentication)</label>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="button" class="toggle-button ripple text-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="toggle-button ripple text-primary" value="Update">
                </div>
            </form>
        </div>
    </div>
</div>
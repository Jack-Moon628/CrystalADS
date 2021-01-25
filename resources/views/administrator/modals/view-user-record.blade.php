<div id="detailsModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <div class="modal-header border-0">
                <h5 class="modal-title border-0" id="detailsModalTitle">
                    User Record
                </h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div id="accountDetails" class="account-details-wrapper">
                    <div class="input-group">
                        <small class="form-control bg-light text-dark border-0">ID</small>
                        <input id="userId" type="text" class="form-control border-light w-75" disabled>
                    </div>

                    <div class="input-group mt-2">
                        <small class="form-control bg-light text-dark border-0">Email</small>
                        <input id="userEmail" type="text" class="form-control border-light w-auto">
                    </div>

                    <div class="input-group mt-2">
                        <small class="form-control bg-light text-dark border-0">Username</small>
                        <input id="userName" type="text" class="form-control border-light w-auto">
                    </div>

                    <div class="input-group mt-2">
                        <small class="form-control bg-light text-dark border-0">Country</small>
                        <input id="userCountry" type="text" class="form-control border-light w-auto">
                    </div>

                    <div class="input-group mt-2">
                        <small class="form-control bg-light text-dark border-0">Account Type</small>

                        <select id="userAccountType" class="form-control border-light w-auto">
                            <option value="1">Advertiser</option>
                            <option value="2">Publisher</option>
                            <option value="3">Administrator</option>
                            <option value="4">Restricted</option>
                            <option value="5">Staff</option>
                            <option value="6">Awaiting Setup</option>
                        </select>
                    </div>

                    <div class="input-group mt-2">
                        <small class="form-control bg-light text-dark border-0">Domain Name</small>
                        <input id="userDomain" type="text" class="form-control border-light w-auto">
                    </div>

                    <div class="input-group mt-2">
                        <small class="form-control bg-light text-dark border-0">First Name</small>
                        <input id="userFirstname" type="text" class="form-control border-light w-auto">
                    </div>

                    <div class="input-group mt-2">
                        <small class="form-control bg-light text-dark border-0">Last Name</small>
                        <input id="userLastname" type="text" class="form-control border-light w-auto">
                    </div>

                    <div class="input-group mt-2">
                        <small class="form-control bg-light text-dark border-0">Address</small>
                        <input id="userAddress" type="text" class="form-control border-light w-auto">
                    </div>

                    <div class="input-group mt-2">
                        <small class="form-control bg-light text-dark border-0">City</small>
                        <input id="userCity" type="text" class="form-control border-light w-auto">
                    </div>

                    <div class="input-group mt-2">
                        <small class="form-control bg-light text-dark border-0">ZIP Code</small>
                        <input id="userZipcode" type="text" class="form-control border-light w-auto">
                    </div>

                    <div class="input-group mt-2">
                        <small class="form-control bg-light text-dark border-0">State</small>
                        <input id="userState" type="text" class="form-control border-light w-auto">
                    </div>

                    <div class="input-group mt-2">
                        <small class="form-control bg-light text-dark border-0">Phone</small>
                        <input id="userPhone" type="text" class="form-control border-light w-auto">
                    </div>

                    <div class="input-group mt-2">
                        <small class="form-control bg-light text-dark border-0">Company</small>
                        <input id="userCompany" type="text" class="form-control border-light w-auto">
                    </div>
                </div>

                <div id="userCreated" class="w-auto toggle-button ripple mt-3 d-inline-block"></div>
                <div id="userUpdated" class="w-auto toggle-button ripple mt-3 d-inline-block"></div>
            </div>

            <div class="modal-footer border-0">
                <button type="button" class="toggle-button ripple text-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="toggle-button ripple text-primary" onclick="updateUserRecord()">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div id="accountApprovalSettingModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <div class="modal-header border-0">
                <h5 class="modal-title border-0" id="detailsModalTitle">
                    Account Approval Required
                </h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body border-bottom">
                <div class="alert alert-info" role="alert">
                  <p class="mb-0">
                      If this setting is on, when a user registers an account to the application, they must wait until a staff member manually appoves their account.
                  </p>
                </div>
            </div>

            <div class="modal-footer border-0">
                <button type="button" class="toggle-button ripple text-secondary" data-dismiss="modal">Cancel</button>

                <form id="accountApprovalSettingForm" action="/administrator/settings/1" method="POST">
                    @csrf
                    @method('PUT')

                    @if($settings[0]->active)
                        <input name="switch" type="hidden" value="0">
                        <input type="submit" class="toggle-button ripple text-danger" value="Turn Off">
                    @else
                        <input name="switch" type="hidden" value="1">
                        <input type="submit" class="toggle-button ripple text-success" value="Turn On">
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
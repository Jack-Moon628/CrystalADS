<div id="viewLogModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content border-0">
            <div class="modal-header mb-2">
                <h5 class="modal-title ml-4">View Log</h5>
            </div>

            <div class="modal-body mt-0 pt-0 text-center" style="max-height: 500px; overflow-y: auto;">
                <div class="details-form">
                    <div class="input-item">
                        <span>Action Account</span>
                        <input id="actionAccountLog" type="text" disabled>
                    </div>

                    <div class="input-item">
                        <span>Target Account</span>
                        <input id="targetAccountLog" type="text" disabled>
                    </div>

                    <div class="input-item">
                        <span>Reason</span>

                        <textarea id="reasonLog" disabled>
                            
                        </textarea>
                    </div>
                </div>
            </div>

            <div class="text-center p-2 pr-3 border-top mt-3">
                <a class="menu-item" style="display: inline-block; width: 100%; text-align: center;" href="#" onclick="$('#viewLogModal').modal('toggle');">
                    <span class="item-title">Close Window</span>
                </a>
            </div>
        </div>
    </div>
</div>
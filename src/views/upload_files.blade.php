@push('styles')
<link href="{{ bower('fine-uploader/dist/fine-uploader-new.css') }}" rel="stylesheet">
<style>
    #trigger-upload {
        color: white;
        font-size: 14px;
        padding: 7px 20px;
        margin-left: 10px;
        background: #0085a3 none;
    }
</style>
@endpush
<p class="text-info">{{ $info_text }}</p>
<script type="text/template" id="qq-template-validation">
    <div class="qq-uploader-selector qq-uploader"
         qq-drop-area-text="{{ $drop_area_text }}">
        <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
            <div role="progressbar" aria-valuenow="0" aria-valuemin="0"
                 aria-valuemax="100"
                 class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
        </div>
        <div class="qq-upload-drop-area-selector qq-upload-drop-area"
             qq-hide-dropzone>
            <span class="qq-upload-drop-area-text-selector"></span>
        </div>
        <div class="files">
            <div class="qq-upload-button-selector qq-upload-button">
                <div>Select {{ $multiple ? 'files' : 'file' }}</div>
            </div>
            @if((isset($autoUpload) && !$autoUpload))
                <button type="button" id="trigger-upload" class="btn btn-primary">
                    <i class="fa fa-upload"></i> Upload
                </button>
            @endif
        </div>
        <span class="qq-drop-processing-selector qq-drop-processing">
                <span>Processing dropped {{ $multiple ? 'files' : 'file' }}...</span>
                <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
            </span>
        <ul class="qq-upload-list-selector qq-upload-list" aria-live="polite"
            aria-relevant="additions removals">
            <li>
                <div class="qq-progress-bar-container-selector">
                    <div role="progressbar" aria-valuenow="0" aria-valuemin="0"
                         aria-valuemax="100"
                         class="qq-progress-bar-selector qq-progress-bar"></div>
                </div>
                <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                <img class="qq-thumbnail-selector" qq-max-size="100"
                     qq-server-scale>
                <span class="qq-upload-file-selector qq-upload-file"></span>
                <span class="qq-upload-size-selector qq-upload-size"></span>
                <button type="button"
                        class="qq-btn qq-upload-cancel-selector qq-upload-cancel">
                    Cancel
                </button>
                <button type="button"
                        class="qq-btn qq-upload-retry-selector qq-upload-retry">
                    Retry
                </button>
                <button type="button"
                        class="qq-btn qq-upload-delete-selector qq-upload-delete">
                    Delete
                </button>
                <span role="status"
                      class="qq-upload-status-text-selector qq-upload-status-text"></span>
            </li>
        </ul>

        <dialog class="qq-alert-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <div class="qq-dialog-buttons">
                <button type="button" class="qq-cancel-button-selector">Close
                </button>
            </div>
        </dialog>

        <dialog class="qq-confirm-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <div class="qq-dialog-buttons">
                <button type="button" class="qq-cancel-button-selector">No</button>
                <button type="button" class="qq-ok-button-selector">Yes</button>
            </div>
        </dialog>

        <dialog class="qq-prompt-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <input type="text">
            <div class="qq-dialog-buttons">
                <button type="button" class="qq-cancel-button-selector">Cancel
                </button>
                <button type="button" class="qq-ok-button-selector">Ok</button>
            </div>
        </dialog>
    </div>
</script>
<div id="upload-data"
     data-waiting-path="{{ bower('fine-uploader/dist/placeholders/waiting-generic.png') }}"
     data-not-available="{{ bower('fine-uploader/dist/placeholders/not_available-generic.png') }}"
     data-upload-endpoint="{{ $upload_endpoint }}" data-rules="{{ $upload_rules }}"
     data-auto-upload="{{ $autoUpload or true }}" data-single-notification="{{ $single_notification or true }}">
</div>

@push('scripts')
<script src="{{ bower('fine-uploader/dist/jquery.fine-uploader.js') }}"></script>
<script>
    var el = $("#upload-data");
    var token = $('meta[name="csrf-token"]').attr('content');
    var singleNotification = el.data('single-notification') || true;
    el.fineUploader({
        template: 'qq-template-validation',
        request: {
            endpoint: el.data('upload-endpoint'),
            customHeaders: {
                'X-CSRF-TOKEN': token
            }
        },
        deleteFile: {
            enabled: true,
            forceConfirm: true,
            endpoint: el.data('upload-endpoint'),
            customHeaders: {
                'X-CSRF-TOKEN': token
            }
        },
        thumbnails: {
            placeholders: {
                waitingPath: el.data('waiting-path'),
                notAvailablePath: el.data('not-available')
            }
        },
        callbacks: {
            onDeleteComplete: function (id, xhr, isError) {
                leantony.notify({type: isError ? 'error' : 'success', text: xhr.responseText})
            },
            onComplete: function (id, name, responseJson, xhr) {
                console.log(xhr);
                if (!singleNotification) {
                    if (responseJson.success) {
                        leantony.notify({type: 'success', text: responseJson.message || 'File uploaded successfully'});
                        if (responseJson.reloadPage) {
                            leantony.utils.loadLink(location.href, 1000);
                        }
                    } else {
                        leantony.notify({
                            type: 'error',
                            text: "Apologies :(. An error occurred on the server. We're working on it.."
                        })
                    }
                }
            },
            onAllComplete: function (succeeded, failed) {
                if (succeeded.length) {
                    leantony.notify({type: 'success', text: succeeded.length + 'file(s) were uploaded successfully'});
                } else {
                    leantony.notify({type: 'error', text: failed.length + 'file(s) failed to upload.'});
                }
            }
        },
        autoUpload: el.data('auto-upload'),
        validation: el.data('rules')
    });

    @if(isset($autoUpload) && !$autoUpload)
        $('#trigger-upload').click(function () {
        el.fineUploader('uploadStoredFiles');
    });
    @endif
</script>
@endpush
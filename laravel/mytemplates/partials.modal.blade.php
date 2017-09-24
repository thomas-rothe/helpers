<div id="{{ $id }}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">{{ $label }}</h4>
            </div>
            <div class="modal-body">
                @yield('modal-body')
            </div>
        </div>
    </div>
</div>

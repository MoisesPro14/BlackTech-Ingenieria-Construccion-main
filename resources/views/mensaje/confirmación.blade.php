<!---mensaje para validacion de campos obligatorios -->
@if ($errors->any())
    <div class="alert" style="background-color: #707171 !important;" role="alert">
        <strong>¡ Registro incorrecto! </strong>
        @foreach ($errors->all() as $error)
            <span class="badge badge-danger">{{ $error }}</span>
        @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

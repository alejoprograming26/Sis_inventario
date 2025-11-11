<div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="nombre">Nombre <b>(*)</b></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-box"></i></span>
                    </div>
                    <select name="producto_id" id="producto_id" class="form-control select2" required>
                        <option value="">Seleccione un producto</option>
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->id }}"
                                {{ old('producto_id') == $producto->id ? 'selected' : '' }}>
                                {{ $producto->codigo . ' - ' . $producto->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @error('producto_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="lote">Lote <b>(*)</b></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-box"></i></span>
                    </div>
                    <input type="text" name="lote_id" id="lote_id" class="form-control" placeholder="Lote"
                        required>
                </div>
                @error('lote_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="cantidad">Cantidad <b>(*)</b></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-box"></i></span>
                    </div>
                    <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="Cantidad"
                        required>
                </div>
                @error('cantidad')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="precio_unitario">Precio Unitario <b>(*)</b></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <input type="number" name="precio_unitario" id="precio_unitario" class="form-control"
                        placeholder="Precio Unitario" required>
                </div>
                @error('precio_unitario')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="fecha_vencimiento">Fecha de Vencimiento <b>(*)</b></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="form-control"
                        placeholder="Fecha de Vencimiento">
                </div>
                @error('fecha_vencimiento')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1">
            <div style="height: 37px"></div>
            <button type="button" class="btn btn-success" id="btn-agregar-producto">
                <i class="fas fa-plus" wire:click="prueba"></i> Agregar
            </button>
        </div>
        <hr>
        cantidad:{{ $cantidad }}
    </div>

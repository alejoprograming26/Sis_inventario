<div>
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="productoId">Nombre <b>(*)</b></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-box"></i></span>
                            </div>
                            <select wire:model="productoId" class="form-control" required>
                                <option value="">Seleccione un producto</option>
                                @foreach ($productos as $producto)
                                    <option value="{{ $producto->id }}">{{ $producto->codigo }} -
                                        {{ $producto->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('productoId')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="codigoLote">Lote <b>(*)</b></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-box"></i></span>
                            </div>
                            <input type="text" name="" id="" wire:model="codigoLote"
                                class="form-control" placeholder="Lote" required>
                        </div>
                        @error('codigoLote')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cantidad">Cantidad <b>(*)</b></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-box"></i></span>
                            </div>
                            <input type="number" wire:model="cantidad" id="cantidad" class="form-control"
                                placeholder="Cantidad" required>
                        </div>
                        @error('cantidad')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="precioCompra">Precio Compra (Unitario) <b>(*)</b></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-money-bill"></i></span>
                            </div>
                            <input type="number" wire:model="precioCompra" class="form-control"
                                placeholder="Precio de Compra" required>
                        </div>
                        @error('precioCompra')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="precioVenta">Precio de Venta <b>(*)</b></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                            </div>
                            <input type="number" wire:model="precioVenta" class="form-control"
                                placeholder="Precio de Venta" required>
                        </div>
                        @error('precioVenta')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="fechaVencimiento">Fecha de Vencimiento <b>(*)</b></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" name="" wire:model="fechaVencimiento" id=""
                                class="form-control" placeholder="Fecha de Vencimiento">
                        </div>
                        @error('fechaVencimiento')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    @if ($compra->detalles->count() > 0)
                        <h5><b>Productos de la Compra</b></h5>
                        <table class="table table-striped table-bordered table-sm">
                            <thead>
                                <tr class="text-center">
                                    <th>Nr</th>
                                    <th>Producto</th>
                                    <th>Lote</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario</th>
                                    <th>Subtotal</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($compra->detalles as $detalle)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $detalle->producto->nombre }}</td>
                                        <td>{{ $detalle->lote->codigo_lote }}</td>
                                        <td>{{ $detalle->cantidad }}</td>
                                        <td>{{ $detalle->precio_unitario }}$</td>
                                        <td>{{ $detalle->subtotal }}$</td>
                                        <td>
                                            <button class="btn btn-danger btn-sm"
                                                wire:click="eliminarItem({{ $detalle->id }})"><i
                                                    class="fas fa-trash-alt"></i>Eliminar</button>
                                        </td>

                                    </tr>
                                @endforeach
                        </table>
                        <hr>
                    @else
                        <h5 class="text-center text-muted">No hay productos agregados a la Compra.</h5>
                    @endif

                    <h5 class="text-right"><b>Total de la Compra: </b> {{ $totalCompra }}$</h5>
                </div>

            </div>

        </div>
    </div>
    <div class="row">

        <div class="col-md-1">
            <div style="height: 33px"></div>
            <button type="button" class="btn btn-success" id="btn-agregar-producto" wire:click="agregarItems" <i
                class="fas fa-plus"></i> Agregar
            </button>
        </div>


        <div x-data
            x-on:mostrar-alert.window="Swal.fire({
                icon: $event.detail.icono,
                title: $event.detail.mensaje,
                showConfirmButton: false,
                timer: 2000
            })">
        </div>
    </div>

</div>

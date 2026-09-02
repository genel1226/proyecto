<div>
    {{-- Titulo y boton del modal --}}
    <div class="flex justify-between py-4">
        <div class="order-first">
            <div class="flex text-2xl">
                <div class="p-1">
                    <flux:icon name="rectangle-stack" />
                </div>
                Planes
            </div>
        </div>

        {{-- Modal --}}
        <div class="order-last">
            <flux:modal.trigger name="edit-profile">
                <flux:button>
                    <flux:icon name="plus" />Plan
                </flux:button>
            </flux:modal.trigger>

            <flux:modal name="edit-profile" class="w-full max-w-3xl!" :dismissible="false">
                <form wire:submit.prevent="store">
                    <div class="space-y-6">
                        <div class="flex">
                            <flux:icon name="plus" />
                            <flux:heading size="lg">Plan</flux:heading>
                        </div>

                        <flux:separator />

                        <div class="grid grid-cols-2 gap-4">
                            <flux:input label="Nombre" placeholder="Nombre del Plan" wire:model="nombre" />

                            <flux:input label="Sigla" type="text" placeholder="Sigla del Plan" wire:model="sigla" />

                            <flux:input label="Monto" type="number" placeholder="Monto del Plan" wire:model="monto" />

                            <flux:input label="Cantidad de Usuarios" type="number" placeholder="Cantidad de Usuarios"
                                wire:model="cantidad_u" />

                            <div>
                                <flux:label>Lapso</flux:label>
                                <flux:select wire:model="lapso" placeholder="Seleccione Lapso del Plan">
                                    <flux:select.option>Mensual</flux:select.option>
                                    <flux:select.option>Semestral</flux:select.option>
                                    <flux:select.option>Anual</flux:select.option>
                                </flux:select>
                            </div>

                            <div>
                                <flux:label>Tipo de Licencia</flux:label>
                                <flux:select wire:model="tipo_licencia" placeholder="Seleccione Tipo de Licencia">
                                    <flux:select.option>Basica</flux:select.option>
                                    <flux:select.option>Media</flux:select.option>
                                    <flux:select.option>Completa</flux:select.option>
                                    <flux:select.option>Personalizada</flux:select.option>
                                </flux:select>
                            </div>

                            <div class="col-span-2">
                                <div class="grid grid-cols-4">
                                    <div class="space-y-2">
                                        <label class="text-sm font-medium">Color</label>

                                        <br>

                                        <input type="color" wire:model="color_bagde"
                                            class="h-10 w-20 p-1 rounded cursor-pointer border">
                                    </div>

                                    <flux:checkbox.group wire:model="es_personalizable" label="Personalizable">
                                        <flux:checkbox label="Marque si es personalizable?" value="1" />
                                    </flux:checkbox.group>

                                    <div class="col-span-2">
                                        <flux:input label="Cantidad minima de Usuarios" type="number"
                                            placeholder="Cantidad Minima de Usuarios" wire:model="cantidad_min" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <flux:spacer />

                        <div class="flex justify-between ">

                            <div class="order-first">
                                <flux:button variant="ghost">Cancelar</flux:button>
                            </div>

                            <div class="order-last">
                                <flux:button type="submit" variant="primary">Save changes</flux:button>
                            </div>

                        </div>
                    </div>
                </form>    
            </flux:modal>
        </div>

    </div>
    <div>
        {{-- Tabla con PowerGrid --}}
        <livewire:plans.plans_table />
    </div>
</div>

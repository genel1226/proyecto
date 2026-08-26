<div>
    {{-- You must be the change you wish to see in the world. - Mahatma Gandhi --}}
    esto son los plans
    {{-- Modal Create --}}
    <div class="flex justify-between w-max">
        <div class="order-last">
            <flux:modal.trigger name="edit-profile">
                <flux:button>Edit profile</flux:button>
            </flux:modal.trigger>

            <flux:modal name="edit-profile" class="md:w-96">
                <div class="space-y-6">
                    <div>
                        <flux:heading size="lg">Update profile</flux:heading>
                        <flux:text class="mt-2">Make changes to your personal details.</flux:text>
                    </div>

                    <flux:input label="Name" placeholder="Your name" />

                    <flux:input label="Date of birth" type="date" />

                    <div class="flex">
                        <flux:spacer />

                        <flux:button type="submit" variant="primary">Save changes</flux:button>
                    </div>
                </div>
            </flux:modal>
        </div>

    </div>
    <livewire:plans.plans_table />
</div>

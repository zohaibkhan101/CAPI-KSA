<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Suppliers') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4">

        <!-- Suppliers Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Suppliers Dashboard</h1>
        </div>

        <!-- Suppliers Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            @foreach ($suppliers as $supplier)
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold mb-2">{{ $supplier->legal_name }}</h3>
                    <p class="text-gray-600 mb-1"><strong>Type:</strong> {{ $supplier->vendor_type }}</p>
                    <p class="text-gray-600 mb-1"><strong>Email:</strong> {{ $supplier->contact_email }}</p>
                    <p class="text-gray-600 mb-4"><strong>Mobile:</strong> {{ $supplier->contact_mobile }}</p>

                    <div class="flex flex-wrap gap-2">
                        <!-- View Details -->
                        <button onclick="document.getElementById('modal-{{ $supplier->id }}').classList.remove('hidden')"
                            class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                            View
                        </button>

                        <!-- Edit Supplier -->
                        <a href="{{ url('/admin/suppliers/'.$supplier->id.'/edit') }}"
                            class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                            Edit
                        </a>

                        <!-- Delete Supplier -->
                        <form action="{{ url('/admin/suppliers/'.$supplier->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')"
                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                Delete
                            </button>
                        </form>

                        <!-- Contact via Email -->
                        <a href="mailto:{{ $supplier->contact_email }}?subject=Supplier Inquiry&body=Dear {{ $supplier->legal_name }},%0D%0A%0D%0A"
                            class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">
                            Contact
                        </a>
                    </div>

                    <!-- Supplier Modal -->
                    <div id="modal-{{ $supplier->id }}" class="fixed inset-0 bg-black bg-opacity-40 hidden flex items-center justify-center z-50">
                        <div class="bg-white rounded-lg shadow-lg max-w-3xl w-full p-6 relative">
                            <button onclick="document.getElementById('modal-{{ $supplier->id }}').classList.add('hidden')"
                                class="absolute top-2 right-2 text-gray-500 hover:text-red-500 text-2xl font-bold">✕</button>
                            <h3 class="text-xl font-bold mb-4">{{ $supplier->legal_name }}</h3>
                            <p><strong>Vendor Type:</strong> {{ $supplier->vendor_type }}</p>
                            <p><strong>Organization Type:</strong> {{ $supplier->organization_type }}</p>
                            <p><strong>Address:</strong> {{ $supplier->address_street }}, {{ $supplier->city }}, {{ $supplier->country }}</p>
                            <p><strong>Contact:</strong> {{ $supplier->contact_first_name }} {{ $supplier->contact_last_name }}</p>
                            <p><strong>Email:</strong> {{ $supplier->contact_email }}</p>
                            <p><strong>Mobile:</strong> {{ $supplier->contact_mobile }}</p>

                            <div class="mt-4 flex gap-3">
                                @if ($supplier->company_profile)
                                    <a href="{{ asset('storage/'.$supplier->company_profile) }}" target="_blank"
                                        class="bg-gray-800 text-white px-3 py-1 rounded hover:bg-gray-900">View Profile</a>
                                @endif
                                @if ($supplier->company_cr)
                                    <a href="{{ asset('storage/'.$supplier->company_cr) }}" target="_blank"
                                        class="bg-gray-800 text-white px-3 py-1 rounded hover:bg-gray-900">View CR</a>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

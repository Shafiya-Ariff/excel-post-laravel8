<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Upload Excel
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="container max-w-7xl mx-auto sm:px-6 lg:px-8" style="width: 50%">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
                @if (session('error'))
                    <div class="alert alert-error">
                        {{ session('error') }}
                    </div>
                @endif
            <form action="{{route('upload')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="custom-file">
                    <input type="file" accept=".csv" name="excel" class="custom-file-input" id="customFile" />
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary btn-sm" style="margin-top: 10px">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

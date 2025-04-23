
    @extends('components.elayout')
@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Company Policies</h2>

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col" class="text-end">Download</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($policies as $policy)
                    <tr>
                        <td>{{ $policy->title }}</td>
                        <td class="text-end">
                            <!--
                            <a href="{{ asset('storage/' . $policy->file_path) }}"
                               class="btn btn-sm btn-primary"
                               target="_blank"
                               download>
                                Download
                            </a>
                            -->
                            <a href="{{ route('company-policies.download', $policy->id) }}" class="btn btn-sm btn-success">
                             Download PDF
                             </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center">No company policies available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

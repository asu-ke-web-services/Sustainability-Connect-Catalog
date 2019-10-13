<h2>History</h2>

    <div class="table-responsive">
        <table class="table table-hover">
{{--
        @foreach($internship->revisionHistory as $history)
            <tr>
                <th>{{ $history->userResponsible()->first_name }} changed {{ $history->fieldName() }}</th>
                <td>{{ $history->oldValue() }} to {{ $history->newValue() }}</td>
            </tr>
        @endforeach
 --}}
        </table>
    </div>

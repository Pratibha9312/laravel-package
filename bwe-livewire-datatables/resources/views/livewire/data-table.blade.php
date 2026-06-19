<div style="padding:40px; display:flex; justify-content:center;">

    <div style="width:900px;">


        <!-- SEARCH -->
        <div style="margin-bottom:20px; display:flex; justify-content:center;">

            <input
                type="text"
                wire:model.live="search"
                placeholder="Search..."
                style="width:300px; padding:10px; border:1px solid #ccc; border-radius:8px;"
            >

        </div>

        <!-- TABLE -->
        <div style="background:white; border:1px solid #ddd; border-radius:10px; overflow:hidden;">

            <table style="width:100%; border-collapse:collapse;">

                <thead style="background:#f3f4f6;">

                    <tr>

                        @foreach($columns as $column)

                            <th
                                wire:click="sort('{{ $column['field'] }}')"
                                style="padding:12px; text-align:left; cursor:pointer;"
                            >
                                {{ $column['label'] }}

                                @if($sortField === $column['field'])
                                    {{ $sortDirection === 'asc' ? '↑' : '↓' }}
                                @endif
                            </th>

                        @endforeach

                    </tr>

                </thead>

                <tbody>

                    @forelse($rows as $row)

                        <tr style="border-top:1px solid #eee;">

                            @foreach($columns as $column)

                                <td style="padding:12px;">
                                    {{ $row->{$column['field']} }}
                                </td>

                            @endforeach

                        </tr>

                    @empty

                        <tr>
                            <td colspan="{{ count($columns) }}" style="padding:20px; text-align:center;">
                                No records found
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>
        

        <!-- PAGINATION -->
        <div style="margin-top:20px; display:flex; justify-content:center; gap:6px;">

    @if ($rows->onFirstPage())
        <span style="padding:6px 10px; border:1px solid #ccc; color:#aaa;">
            Prev
        </span>
    @else
        <a href="{{ $rows->previousPageUrl() }}"
           style="padding:6px 10px; border:1px solid #ccc; text-decoration:none;">
            Prev
        </a>
    @endif

    @foreach ($rows->getUrlRange(1, $rows->lastPage()) as $page => $url)

        @if ($page == $rows->currentPage())
            <span style="
                padding:6px 10px;
                border:1px solid #000;
                background:#000;
                color:#fff;
            ">
                {{ $page }}
            </span>
        @else
            <a href="{{ $url }}"
               style="padding:6px 10px; border:1px solid #ccc; text-decoration:none;">
                {{ $page }}
            </a>
        @endif

    @endforeach

    @if ($rows->hasMorePages())
        <a href="{{ $rows->nextPageUrl() }}"
           style="padding:6px 10px; border:1px solid #ccc; text-decoration:none;">
            Next
        </a>
    @else
        <span style="padding:6px 10px; border:1px solid #ccc; color:#aaa;">
            Next
        </span>
    @endif

</div>

    </div>

</div>

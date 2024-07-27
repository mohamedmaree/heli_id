<div class="position-relative">
    {{-- table loader  --}}
    {{-- <div class="table_loader">
        {{ __('admin.loading') }}
    </div> --}}
    {{-- table loader  --}}
    {{-- table content --}}
    <table class="table " id="tab">
        <thead>
            <tr>
                <th>{{ __('admin.service_provider_name') }}</th>
                <th>{{ __('admin.the_amount') }}</th>
                <th>{{ __('admin.order_status') }}</th>
                <th>{{ __('admin.order_procedures') }}</th>
                <th>{{ __('admin.control') }}</th>
                <th>{{ __('admin.date') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($settlements as $settlement)
                <tr class="delete_row">
                    <td>{{ $settlement->transactionable?->name }}</td>
                    <td>{{ $settlement->amount }}</td>
                    <td>@lang('site.' . $settlement->status)</td>

                    <td>
                        @if ($settlement->status == 'pending')
                            <button type="button" class="btn btn-sm btn-success accept-btn" data-toggle="modal"
                                data-target="#acceptModal" data-id="{{ $settlement->id }}"
                                data-amount="{{ $settlement->amount }}" title="{{ __('admin.accept_order') }}">
                                <i class="fa fa-check" style="color: white"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger cancel-btn" data-toggle="modal"
                                data-target="#cancelModal" data-id="{{ $settlement->id }}"
                                title="{{ __('admin.refuse_order') }}">
                                <i class="fa fa-times" style="color: white"></i>
                            </button>
                        @endif
                    </td>
                    <td class="product-action">
                        <span class="text-primary"><a href="{{ route('admin.settlements.show', ['id' => $settlement->id]) }}" class="btn btn-warning btn-sm"><i class="feather icon-eye"></i> {{ __('admin.show') }}</a></span>
                        {{-- <span class="action-edit text-primary"><a href="{{ route('admin.settlements.edit', ['id' => $settlement->id]) }}" class="btn btn-primary btn-sm"><i class="feather icon-edit"></i>{{ __('admin.edit') }}</a></span> --}}
                        {{-- <span class="delete-row btn btn-danger btn-sm" data-url="{{ url('admin/settlements/' . $settlement->id) }}"><i class="feather icon-trash"></i>{{ __('admin.delete') }}</span> --}}
                    </td>
                    <td>{{ \Carbon\Carbon::parse($settlement->created_at)->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- table content --}}
    {{-- no data found div --}}
    @if ($settlements->count() == 0)
        <div class="d-flex flex-column w-100 align-center mt-4">
            <img src="{{ asset('admin/app-assets/images/pages/404.png') }}" alt="">
            <span class="mt-2" style="font-family: cairo">{{ __('admin.there_are_no_matches_matching') }}</span>
        </div>
    @endif
    {{-- no data found div --}}

</div>
{{-- pagination  links div --}}
@if ($settlements->count() > 0 && $settlements instanceof \Illuminate\Pagination\AbstractPaginator)
    <div class="d-flex justify-content-center mt-3">
        {{ $settlements->links() }}
    </div>
@endif
{{-- pagination  links div --}}

@extends('layout.template')
@section('konten')

    @php
        $id = '';
        $amount = '';
    @endphp
    <div class="mb-3">
        <h3>Invoice</h3>
        @if ($invoices->isEmpty())
            <hr>
            <h4 class="text-center">There is No Payment Yet !</h4>
            <hr>
        @else
            <table class="table" border="4">
                <thead>
                    <th scope="col">No</th>
                    <th scope="col">Inv ID</th>
                    <th scope="col">Project ID</th>
                    <th scope="col">Client</th>
                    <th scope="col">Total Amount</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </thead>
                @foreach ($invoices as $inv)
                    <tbody>
                        @php
                            $id = $inv->id;
                            $amount = $inv->total_amount;
                        @endphp
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td scope="row">{{ $inv->id }}</td>
                        <td scope="row">{{ $inv->project_id }}</td>
                        <td scope="row">{{ $inv->client_id }}</td>
                        @if ($inv->status == 'Down-Payment (DP)')
                            <td scope="row">
                                <strike>{{ $inv->total_amount }}</strike> ||
                                {{ $inv->total_amount - ($inv->total_amount * 35) / 100 }}
                            </td>
                        @elseif ($inv->status == 'Full-Payment')
                            <td scope="row">
                                <strike>{{ $inv->total_amount }}</strike> || 0
                            </td>
                        @else
                            <td scope="row">{{ $inv->total_amount }}</td>
                        @endif

                        <td scope="row">{{ $inv->due_date }}</td>
                        <td scope="row">{{ $inv->status }}</td>
                        @if ($inv->status == 'Pending')
                            <td scope="row"><a class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" href="#">Pay</a></td>
                        @elseif ($inv->status == 'Down-Payment (DP)')
                            <td scope="row"><a class="btn btn-outline-success" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal1" href="#">Pay</a></td>
                        @else
                            <td scope="row"><a class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal1" href="#">Detail</a></td>
                            </td>
                        @endif

                    </tbody>
                @endforeach
            </table>
        @endif
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bill</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold custcoltext">Create Invoice</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('client.project.invoice.bill') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="mb-3">
                                    <label for="">Invoice ID</label>
                                    <input type="text" class="form-control" value="{{ $id }}" readonly>
                                    <input type="hidden" name="invoice_id" class="form-control"
                                        value="{{ $id }}">
                                </div>

                                <div class="mb-3">
                                    <label for="">Company Bank Account</label>
                                    <input type="text" class="form-control" value="{{ $companyRef->bank_account }}"
                                        disabled>
                                    <input type="hidden" name="company_reference_id" class="form-control"
                                        value="{{ $companyRef->id }}">
                                </div>

                                <div class="mb-3">
                                    <label for="">Status Pembayaran</label>
                                    <input type="text" class="form-control" value="Down-Payment (DP) 35%" readonly>
                                    <input type="hidden" name="status" class="form-control" value="Down-Payment (DP)">
                                </div>

                                <div class="mb-3">
                                    <label for="">Amount Paid</label>
                                    <input type="text" class="form-control" value="{{ ($amount * 35) / 100 }}" readonly>
                                    <input type="hidden" name="amount_paid" class="form-control"
                                        value="{{ ($amount * 35) / 100 }}">
                                </div>

                                <div class="mb-3">
                                    <label for="">Proof of Payment</label>
                                    <input type="file" name="proof_of_payment" class="form-control" value="">
                                </div>

                                <div class="modal-footer">
                                    <a href="{{ route('client.payment') }}" class="btn btn-dark">Cancel</a>
                                    <button class="btn btn-success">Continue</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal2 -->

    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModal1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModal1Label">Bill</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold custcoltext">Create Invoice</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('client.project.invoice.bill') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="mb-3">
                                    <label for="">Invoice ID</label>
                                    <input type="text" class="form-control" value="{{ $id }}" readonly>
                                    <input type="hidden" name="invoice_id" class="form-control"
                                        value="{{ $id }}">
                                </div>

                                <div class="mb-3">
                                    <label for="">Company Bank Account</label>
                                    <input type="text" class="form-control" value="{{ $companyRef->bank_account }}"
                                        disabled>
                                    <input type="hidden" name="company_reference_id" class="form-control"
                                        value="{{ $companyRef->id }}">
                                </div>

                                <div class="mb-3">
                                    <label for="">Status Pembayaran</label>
                                    <input type="text" class="form-control" value="Full-Payment" readonly>
                                    <input type="hidden" name="status" class="form-control" value="Full-Payment">
                                </div>

                                <div class="mb-3">
                                    <label for="">Amount Paid</label>
                                    <input type="text" class="form-control"
                                        value="{{ $inv->total_amount - ($inv->total_amount * 35) / 100 }}" readonly>
                                    <input type="hidden" name="amount_paid" class="form-control"
                                        value="{{ $inv->total_amount - ($inv->total_amount * 35) / 100 }}">
                                </div>

                                <div class="mb-3">
                                    <label for="">Proof of Payment</label>
                                    <input type="file" name="proof_of_payment" class="form-control" value="">
                                </div>

                                <div class="modal-footer">
                                    <a href="{{ route('client.payment') }}" class="btn btn-dark">Cancel</a>
                                    <button class="btn btn-success">dd</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection

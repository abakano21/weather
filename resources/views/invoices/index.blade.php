@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Invoice') }}</div>

                <div class="d-flex flex-row-reverse">
                    <div class="text-right">
                        <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#exampleModal">
                            Launch demo modal
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <invoice-index></invoice-index>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Invoice
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">                        
                <form action="#">

                    <div class="form-group">
                        <label for="school_name">School Name</label>
                        <input v-model="school_name" type="text" class="form-control" id="school_name" placeholder="Enter School Name">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea v-model="description" class="form-control" id="description" rows="3"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input v-model="amount" type="text" class="form-control" id="amount" placeholder="Enter Amount">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <slot name="footer">
                    <button type="button" class="btn btn-primary">Create</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </slot>
            </div>
        </div>
    </div>
</div>

@endsection


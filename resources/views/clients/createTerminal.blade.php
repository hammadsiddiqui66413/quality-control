@extends('layouts.master')
@section('cardTitle', 'Create Terminals')

@section('body')
<section>
    <div class="container">
        <form method="POST" action="{{ route('client.storeTerminal') }}">
            @csrf
            <div class="row  w-70 clearfix add-plan">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover" id="tab_logic">
                        <thead>
                            <tr>
                                <th class="text-center"> # </th>
                                <th class="text-center"> Plan </th>
                                <th class="text-center"> Price </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id='addr0'>
                                <td>1</td>
                                <td>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text mb-0" for="inputGroupSelect01">Options</label>
                                        <select class="form-select plan" id=""  name="plan_id[]">
                                            <option selected disabled>Choose Plans</option>
                                            @foreach ($plans as $plan)
                                            <option value="{{$plan->id}}">{{$plan->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                                <td class="amount">
                                    <input readonly type="number" name='amount[]' value="" class="form-control"/>
                                </td>
                            </tr>
                            <tr id='addr1'></tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row clearfix m-top-20">
                <div class="col-md-12">
                <button id="add_row" class="btn btn-success" type="button">Add Plan</button>
                <button id='delete_row' class="pull-right btn btn-danger" type="button">Delete Plan</button>
                </div>
            </div>

            <div class="row m-top-20">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary w-20" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Checkout <i class="fa fa-money" aria-hidden="true"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Please proceed to confirm?
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn">Proceed</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        @include('adminPartials.error')
    </div>
</section>
@endsection

@section('scripts')


@endsection


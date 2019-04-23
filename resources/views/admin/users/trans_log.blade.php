<style>
#badge span{
    text-transform: capitalize;
    font-size:15px !important
}
</style>
<ul class="list-group list-group-flush">
    <li class="list-group-item" id="badge">
    <span class="badge badge-default bg-primary float-right" id="badge">{{$transLog->type}}</span>
    Gateway
    </li>
    <li class="list-group-item"  id="badge">
    <span class="badge badge-default  bg-primary float-right">{{str_replace("_"," ",$transLog->payment_method)}}</span>
        Payment Method
    </li>
    <li class="list-group-item"  id="badge">
    <span class="badge badge-default  bg-primary float-right">{{$transLog->amount}}</span>
        Amount
    </li>
    <li class="list-group-item" id="badge">
    <span class="badge badge-default  bg-primary float-right">{{$transLog->trans_id}}</span>
    Transaction Id
    </li>
    <li class="list-group-item" id="badge">
    <span class="badge badge-default  bg-primary float-right">{{$transLog->state}}</span>
        State
    </li>
    <li class="list-group-item" id="badge">
        <span class="badge badge-default  bg-primary float-right">{{$transLog->invoice_number}}</span>
        Invoice Number
    </li>
    <li class="list-group-item" id="badge">
        <span class="badge badge-default bg-primary float-right">{{Carbon\Carbon::parse($transLog->created_at)->toFormattedDateString()}}</span>
        Created at
    </li>
</ul>

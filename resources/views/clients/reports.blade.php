<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Report</title>

<style>

ul {
    width: 100%;
}

li {
    list-style:none;
    width: 50%;
    float: left;
    display: inline-block;
}

.main-table {

}

.main-table td, #main-table th {
    border-bottom: 1px solid #ddd;
    padding: 8px;
    width: auto;

}

#second-table  td, #second-table th {
    border: 1px solid #ddd;
    padding: 8px;
    width: auto;
}

#second-table {
    position: relative;
    top: 15%;
}

.table-responsive{
    text-align: center;
    width: 100%;
}

..table-responsive .table{
    width: auto;
}


</style>
</head>

<body>
    <div class="main py-4">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="col-12 px-0">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="row">
                                <ul>
                                    <li>
                                        <table class="main-table table">
                                            <tbody>
                                                <tr>
                                                    <td class="left">
                                                        <strong>Client</strong>
                                                    </td>
                                                    <td class="right"><strong>{{$client->first_name}} {{$client->last_name}}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="left">
                                                        <strong>Email</strong>
                                                    </td>
                                                    <td class="right">{{$client->email}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="left">
                                                        <strong>Terminal</strong>
                                                    </td>
                                                    <td class="right">{{$terminal->username}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </li>
                                    <li>
                                        <table class="main-table table">
                                            <tbody>
                                                <tr>
                                                    <td class="left">
                                                        <strong>Job</strong>
                                                    </td>
                                                    <td class="right">Job-{{$job->id}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="left">
                                                        <strong>Device ID</strong>
                                                    </td>
                                                    <td class="right">{{$job->ud_id}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </li>
                                </ul>
                                <div class="col-12 col-xl-12  pt-5" style="padding-top:20px;">
                                    <div class="table-responsive">
                                        <table id="second-table" class=" table-responsive table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center p-0 v-a-m">Sr.</th>
                                                    <th class="text-center">Test</th>
                                                    <th class="text-center">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($reports as $report)
                                                <tr>
                                                    <td style="text-align:center;" class="p-0 v-a-m">{{$i++}}</td>
                                                    <td style="text-align:center;">{{$report->test->name}}</td>
                                                    <td style="text-align:center;">{{$report->status}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
 
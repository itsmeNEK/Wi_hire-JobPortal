@extends('layouts.adminMaster')

@section('title', 'Mail-Inbox')

@section('customCSS')
    @parent
    <!-- custom -->
    <link rel="stylesheet" type="text/css" href="/css/profile.css">
    <link rel="stylesheet" type="text/css" href="/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="/css/mail.css">
@endsection


@section('body')
    @parent

@section('report', 'bg-danger')

<br>
<div id="main">
    <div id="exTab2">
        <div class="d-flex justify-content-center">
            <div class="container rounded bg-white ">
                <div class="row" style="margin-top:45px;">
                    <div class="com-md-4 col-md-offset-4">
                        <div class="card-header">
                            <h3 class="h3 rounded fw-bold text-start text-black pb-3">Website Issues Reports
                            </h3>
                            <table>
                                <thead>
                                    <tr>
                                        <th style="width: 1%"></th>
                                        <th style="width: 30%" scope="col">Subject</th>
                                        <th style="width: 10%" scope="col">Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($inbox_info as $info )
                                        {{-- inbox have content --}}
                                        @if ($info->active == '1')
                                            <tr>
                                                <th style="width: 1%">
                                                    <i class="iActive text-danger bi bi-circle-fill small"></i>
                                                </th>
                                                <td data-label="Subject">
                                                    <a class="text-black text-decoration-none"
                                                        href="admin_Reports_view/{{ Crypt::encrypt($info->id) }}">
                                                        <b>{{ $info->subject }}</b>
                                                    </a>
                                                </td>
                                                <td data-label="Time">
                                                    <a class="text-black text-decoration-none"
                                                        href="admin_Reports_view/{{ Crypt::encrypt($info->id) }}">
                                                        <b>{{ Carbon\Carbon::parse($info->created_at)->diffForHumans() }}
                                                        </b>
                                                    </a>
                                                </td>
                                            </tr>
                                        @elseif($info->active == '0')
                                            <tr>
                                                <th style="width: 1%">
                                                    <i class="iActive text-danger bi bi-circle small"></i>
                                                </th>
                                                <td data-label="Subject">
                                                    <a class="text-black text-decoration-none"
                                                        href="admin_Reports_view/{{ Crypt::encrypt($info->id) }}">
                                                        {{ $info->subject }}
                                                    </a>
                                                </td>
                                                <td data-label="Time">
                                                    <a class="text-black text-decoration-none"
                                                        href="admin_Reports_view/{{ Crypt::encrypt($info->id) }}">
                                                        {{ Carbon\Carbon::parse($info->created_at)->diffForHumans() }}
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                    @empty
                                        <tr>
                                            <td data-label="">
                                                <b></b>
                                            </td>
                                            <td data-label="Subject">
                                                <b>No Mail Yet</b>
                                            </td>
                                            <td data-label="Time">
                                                <b>No Mail Yet</b>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                        </div>
                        <br>
                        <span>
                            {{ $inbox_info->links('vendor.pagination.custom_pagination') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- table  mail -->

</div>

@endsection

@section('customJS')
@parent
<script nonce="EDNnf03nceIOfn39fn3e9h3sdfa">
    var s = document.createElement('script')
    s.src = "/js/mail.js";
    document.head.appendChild(s);
</script>
@endsection

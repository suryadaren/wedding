@extends('mail.layout')

@section('title', $subject)

@section('content')
    
<table width="100%" style="font-size:12px;" cellspacing="0">

                    <!-- Email Body -->
    <tr>
        <td class="body" width="100%" cellpadding="0" cellspacing="0" style="font-family: Arial, Helvetica, sans-serif; box-sizing: border-box; background-color: #FFFFFF; border-bottom: 1px solid #EDEFF2; border-top: 1px solid #EDEFF2; margin: 0; padding: 0; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
            <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" style="font-family: Arial, Helvetica, sans-serif; box-sizing: border-box; background-color: #FFFFFF; margin: 0 auto; padding: 0; width: 570px; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 570px;">
                <!-- Body content -->
                <tr>
                    <td class="content-cell" style="font-family: Arial, Helvetica, sans-serif; box-sizing: border-box; padding: 35px">
                        <p style="font-family: Arial, Helvetica, sans-serif; box-sizing: border-box; color: #242729; font-size: 14px; line-height: 1.5em; margin-top: 0; text-align: left;">
                            Hi, {{$pemesanan->customer->nama_lengkap}}.<br /><br />
                            Wedding Organizer telah menentukan opsi tanggal meeting.
                            silahkan konfirmasi pada sistem Wedding.co untuk menentukan tanggal meeting.

                            <br /><br />
                            <table>
                                <tr>
                                    <td>
                                        Wedding Organizer
                                    </td>
                                    <td>
                                        {{$pemesanan->paket->wedding_organizer->nama_perusahaan}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Paket
                                    </td>
                                    <td>
                                        {{$pemesanan->paket->nama_paket}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tanggal
                                    </td>
                                    <td>
                                        {{$pemesanan->tanggal}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Alamat
                                    </td>
                                    <td>
                                        {{$pemesanan->alamat}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Pengantin Pria
                                    </td>
                                    <td>
                                        {{$pemesanan->nama_pengantin_pria}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Pengantin Wanita
                                    </td>
                                    <td>
                                        {{$pemesanan->nama_pengantin_wanita}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Opsi Tanggal Meeting
                                    </td>
                                    <td>
                                        @foreach($tanggal_meeting as $t)
                                        {{$t}}
                                        <br>
                                        @endforeach
                                    </td>
                                </tr>
                            </table>
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
@stop
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
                            Hi Admin Sistem Wedding.co<br /><br />
                             {{$pembayaran->customer->nama_lengkap}} Telah melakukan pembayaran DP, dengan pemesanan dibawah ini. 
                            <br /><br />
                            <table>
                                <tr>
                                    <td>
                                        Wedding Organizer
                                    </td>
                                    <td>
                                        {{$pembayaran->pemesanan->paket->wedding_organizer->nama_perusahaan}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Paket
                                    </td>
                                    <td>
                                        {{$pembayaran->pemesanan->paket->nama_paket}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tanggal
                                    </td>
                                    <td>
                                        {{$pembayaran->pemesanan->tanggal}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Alamat
                                    </td>
                                    <td>
                                        {{$pembayaran->pemesanan->alamat}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Pengantin Pria
                                    </td>
                                    <td>
                                        {{$pembayaran->pemesanan->nama_pengantin_pria}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Pengantin Wanita
                                    </td>
                                    <td>
                                        {{$pembayaran->pemesanan->nama_pengantin_wanita}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Total Pembayaran (DP)
                                    </td>
                                    <td>
                                        Rp. {{$pembayaran->jumlah}},-
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Nama Bank
                                    </td>
                                    <td>
                                        {{$pembayaran->nama_bank}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Nomor Rekening
                                    </td>
                                    <td>
                                        {{$pembayaran->nomor_rekening}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Nama Pemilik Rekening
                                    </td>
                                    <td>
                                        {{$pembayaran->nama_pemilik}}
                                    </td>
                                </tr>
                            </table>
                            <br>
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
@stop
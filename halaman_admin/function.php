<?php

function tanggal_indo($tanggal){

    $bulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
}

function bulan($tanggal){

    $bulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    $split = explode('-', $tanggal);
    return $bulan[(int)$split[1]].' '.$split[0];
}

function bulan_tampil($tanggal){

    $bulan = array(1 => 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
    $split = explode('-', $tanggal);
    return $bulan[(int)$split[1]];
}

function tanggal_tabel($tanggal){

    $bulan = array(1 => 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Juni', 'Juli', 'Agust', 'Sept', 'Okt', 'Nov', 'Des');
    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
}

?>
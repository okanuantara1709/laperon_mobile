<?php
namespace App\Helpers;
use Carbon\Carbon;

class AppHelper{
	/**
	*@example : GlobalHelper::selected($var1,$var2)
	*@retrun : boolean
	*/
    public static function selected($var1,$var2) {
        if($var1 == $var2){
        	return 'selected';
        }
    }


    /**
	*@example : GlobalHelper::selected($sting,$var2)
	*@retrun : boolean
	*@param 1 : string explode to array
	*@param 2 : string
	*/
    public static function selected_array($var1,$var2,$object=false) {
        // $var1 = (array) $var1;
    	foreach ($var1 as $key => $value) {
            if($object == false){
                if($value == $var2){
                	return 'selected';
                }
            }else{
                if($value->$object == $var2){
                    return 'selected';
                }
            }
        }
    }

    // untuk membuat nilai terbilang
    public static function terbilang($x, $style=3) {
        function kekata($x) {
            $x = abs($x);
            $angka = array("", "satu", "dua", "tiga", "empat", "lima",
            "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
            $temp = "";
            if ($x <12) {
                $temp = " ". $angka[$x];
            } else if ($x <20) {
                $temp = kekata($x - 10). " belas";
            } else if ($x <100) {
                $temp = kekata($x/10)." puluh". kekata($x % 10);
            } else if ($x <200) {
                $temp = " seratus" . kekata($x - 100);
            } else if ($x <1000) {
                $temp = kekata($x/100) . " ratus" . kekata($x % 100);
            } else if ($x <2000) {
                $temp = " seribu" . kekata($x - 1000);
            } else if ($x <1000000) {
                $temp = kekata($x/1000) . " ribu" . kekata($x % 1000);
            } else if ($x <1000000000) {
                $temp = kekata($x/1000000) . " juta" . kekata($x % 1000000);
            } else if ($x <1000000000000) {
                $temp = kekata($x/1000000000) . " milyar" . kekata(fmod($x,1000000000));
            } else if ($x <1000000000000000) {
                $temp = kekata($x/1000000000000) . " trilyun" . kekata(fmod($x,1000000000000));
            }     
                return $temp;
        }  

        if($x<0) {
            $hasil = "minus ". trim(kekata($x));
        } else {
            $hasil = trim(kekata($x));
        }     
        switch ($style) {
            case 1:
                $hasil = strtoupper($hasil);
                break;
            case 2:
                $hasil = strtolower($hasil);
                break;
            case 3:
                $hasil = ucwords($hasil);
                break;
            default:
                $hasil = ucfirst($hasil);
                break;
        }     
        return $hasil;
    }

    public static function renderVaksin($bulan_vaksin,$bulan,$pendataan,$vaksin,$bayi){
        $text = '';
        foreach($pendataan as $value){
            if($value->vaksin_id == $vaksin->id){
                // $text = "V";
                $tgl_pendataan = date('Y-m-d',strtotime($value->tgl_pendataan));
                $tgl_lahir = \Carbon\Carbon::createFromFormat('Y-m-d',"$bayi->tgl_lahir");
                $tgl_vaksin = \Carbon\Carbon::createFromFormat('Y-m-d',"$tgl_pendataan");
                $umur = $tgl_lahir->diffInMonths($tgl_vaksin);
                if($umur == $bulan){                   
                    $text = "<i class='fa fa-check' title='$value->tgl_pendataan' ></i>";
                }
            }
        }

        if($bulan_vaksin == 1){
           $bg = "background-color:#cecee7'";
        }else if($bulan_vaksin == 2){
            $bg = "background-color:yellow'";
        }else if($bulan_vaksin ==3){
            $bg = "background-color:gray'";
        }else if($bulan_vaksin ==4){
            $bg = "background-color:red'";
        }
        $render = "<td style='$bg' class='text-center'>$text</td>";
        return $render;
    }
}